# ramen

ラーメンの記録、評価をするサイトです。

## システム構成

| ツール名 | バージョン |
| :------: | :--------: |
|   PHP    |   8.4.12   |
| MariaDB  |    10.5    |

## 使用技術/ツール

- [Google Fonts](https://fonts.google.com/icons)
- [リセットCSS](https://nicolas-cusan.github.io/destyle.css/)
- [GitHub markdownCSS-light](https://github.com/sindresorhus/github-markdown-css/blob/main/github-markdown-light.css)
- GoogleMap(Geocoding API / Maps Embed API(Place))

## 開発

### 環境構築

1. クローンする
1. 以下コマンドを実行

    ```shell
    docker compose -f docker-compose.yml -f docker-compose.dev.yml up -d
    docker compose exec php composer install
    docker compose exec php php artisan migrate --seed
    ```

### アクセス

- サイト
  - `localhost:8080`
- DB
  - `localhost:3306`
  - phpMyAdmin(`localhost:8081`)
