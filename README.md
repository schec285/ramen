# ramen

ラーメンの記録、評価をするサイトです。

## システム構成

|      ツール名      | バージョン |
| :----------------: | :--------: |
|       apache       |    2.4     |
|        PHP         |   8.4.12   |
|      Laravel       |  12.50.0   |
|      MariaDB       |    10.5    |
| vite(開発環境のみ) |   7.0.7    |

## 使用技術/ツール

### PHP/Laravel開発支援ツール

- [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)
- [larastan](https://github.com/nunomaduro/larastan)
- [Laravel Pint](https://github.com/laravel/pint)

### フロント

- [Google Fonts](https://fonts.google.com/icons)
- [リセットCSS](https://nicolas-cusan.github.io/destyle.css/)
- [GitHub markdownCSS-light](https://github.com/sindresorhus/github-markdown-css/blob/main/github-markdown-light.css)
- GoogleMap(Place API(New) / Maps Javascript API)

## 開発

### 初回環境構築

1. `git clone`でプロジェクトをクローンする
1. makeコマンドで初期構築(`make`がない場合は要インストール)
    ```shell
    make init
    ```

### 開発について

#### makeコマンド

Makefileを用意してるので、開発におけるCLI関連は`make`コマンドである程度作業できます。
詳しくは`make help`で確認するか、`Makefile`の内容を確認してください。

#### テストデータについて

`make devseed`でテストデータを投入できます。
固定でログインユーザ情報`test@example.com`:`test`が作成されます。
テストユーザは他にも用意されますが環境によって投入されるログイン情報は変わる為、必要に応じてDBで確認してください。パスワードは`test`固定となります。

### 開発環境

- ブラウザ
  - `localhost:8080`
  - phpMyAdmin(`localhost:8081`)
- DB
  - `localhost:3306`
- vite
  - `localhost:5173`
- xdebug
  - Port`9003`

#### デバッグ

xdebugを使用してPHPのデバッグが可能。本設定ではポート`9003`で接続する設定なので、ポート`9003`で待ち受けする設定にしてください。
VSCodeであれば`/.vscode/launch.example.json`をコピーして`launch.json`に変更してデバッグを起動してください。