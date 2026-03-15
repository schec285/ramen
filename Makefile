# 環境切替: dev / stg / prod
ENV ?= dev
ALLOWED_ENVS := dev stg prod

# ENV が不正ならエラー
ifneq ($(ENV),$(filter $(ENV),$(ALLOWED_ENVS)))
$(error ENVが不正: $(ALLOWED_ENVS)のいずれかにしてください)
endif

# アプリケーションディレクトリ
APP_DIR=src

# 取得元.env ファイル
ENV_FILE=$(APP_DIR)/env/.env.$(ENV)

# Docker Compose ファイル
COMPOSE_FILES=-f docker/docker-compose.yml -f docker/$(ENV)/docker-compose.$(ENV).yml

# docker compose コマンド判定
DOCKER_COMPOSE := $(shell command -v docker-compose 2> /dev/null)

ifeq ($(DOCKER_COMPOSE),)
DC=docker compose
else
DC=docker-compose
endif

DC := $(DC) $(COMPOSE_FILES)

# ----------------------
# コマンド定義
# ----------------------

# コンテナをバックグラウンドで起動
up:
	@echo "Starting $(ENV) environment..."
	$(DC) up -d

# コンテナ停止
down:
	@echo "Stopping $(ENV) environment..."
	$(DC) down

# ログ確認
logs:
	$(DC) logs -f

# コンテナ内で Artisan 実行
artisan:
	$(DC) exec app php artisan $(filter-out $@,$(MAKECMDGOALS))

# npm 実行（Node.jsプロジェクト用）
npm:
	$(DC) exec app npm $(filter-out $@,$(MAKECMDGOALS))

# DB マイグレーション
migrate:
	$(DC) exec app php artisan migrate $(filter-out $@,$(MAKECMDGOALS))

# DB リセット + マイグレーション + シード
dbreset:
	$(DC) exec app php artisan migrate:fresh --seed

# ビルド
build:
	$(DC) build

# 初期処理
init:
	cp $(ENV_FILE) $(APP_DIR)/.env
	$(DC) up -d --build
	$(DC) exec app sh -c "if [ ! -d vendor ]; then composer install; fi"
	sleep 3
	$(DC) exec app php artisan key:generate
	$(DC) exec app php artisan migrate --force --seed

devseed:
	$(DC) exec app php artisan db:seed --class=Database\\Seeders\\Dev\\TestSeeder

# ヘルプ表示
help:
	@echo "Usage:"
	@echo "  make up ENV=dev     # 開発環境起動 (デフォルト)"
	@echo "  make up ENV=stg     # ステージング環境起動"
	@echo "  make up ENV=prod    # 本番環境起動"
	@echo "  make down           # コンテナ停止"
	@echo "  make logs           # ログ確認"
	@echo "  make migrate        # DBマイグレーション"
	@echo "  make dbreset        # DBリセット + マイグレーション"
	@echo "  make build          # イメージビルド"
	@echo "  make artisan CMD=...# コンテナ内で artisan 実行"
	@echo "  make npm CMD=...    # コンテナ内で npm 実行"
	@echo "  make init           # 初期処理 (環境変数コピー + ビルド + マイグレーション)"
	@echo "  make devseed        # 開発用テストデータ投入"

# ----------------------
# 補助
# ----------------------
# artisan / npm の引数を Makefile で渡すための trick
%:
	@: