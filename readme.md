# Laravel(Docker)の学習
## 概要
　Dockerで動かすLaravelについて学習する。<br />
参考書は以下を選択する。

- [PHPフレームワーク Laravel入門 第2版 - 秀和システム あなたの学びをサポート！](https://www.shuwasystem.co.jp/book/9784798060996.html)

## 開発環境
　開発環境について以下に列挙する。

|項目|バージョンまたはイメージ名|
|-|-|
|ホストOS|Ubuntu22.04|
|docker|24.0.4|
|docker compose|v2.19.1|
|php|8.1.21([php:8.1.21-zts-bullseye](https://hub.docker.com/layers/library/php/8.1.21-zts-bullseye/images/sha256-550261b4070fa89b047d77e60c21f4f37735bfe52ef016452e3bbbbc0fff4a94?context=explore))|
|composer|[composer:lts](https://hub.docker.com/layers/library/composer/lts/images/sha256-72aa420e4d4d2a048bed21fe34bb3d70e05c13ddd728c65ef0b2de1bd0e0edf4?context=explore)|
|Laravel|9.*|

## Laravelの準備
### Laravelのインストールとコンテナの立ち上げ方
　以下の要領でコマンドを実行し、開発及び実行環境を構築する。ディレクトリは`./prj`とする。

```bash
#事前にdocker pull composer:ltsを実行してイメージを入手する。

#Laravel 9.*をインストールする。
docker run -u=$(id -u):$(id -g) --rm --interactive --tty --volume $PWD:/app composer:lts create-project "laravel/laravel=9.*" ./prj
#コンテナの環境変数をセットする。
./gen_envfile.sh
#コンテナを立ち上げる。
docker compose up -d --build
```
