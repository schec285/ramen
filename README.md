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

1. クローンする
1. `src/.env.example`をコピーして同じディレクトリに`.env`を配置
1. 以下コマンドを実行

```shell
docker compose up -d
docker compose exec php composer install
docker compose exec php php artisan migrate
```
