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

### サーバーを起動して確認する
　サーバーを起動するためには、まずIPアドレスを調べる。コンテナに入って`hostname -i`で確認する、または`docker-compose.yml`からIPアドレスを確認する。（IPアドレスを`$IP_ADDRESS`として以下に記述する。）<br />
　コンテナのIPアドレス(`$IP_ADDRESS`)をもとにサーバを立ち上げる。以下のコマンドを実行し、`http://$IP_ADDRESS:8000/`にアクセスする。うまく行けば`Laravel`と書かれたページが表示される。

```bash
php artisan serve --host=$IP_ADDRESS
```

以下のコマンドでも起動する。
```bash
php artisan serve --host=$(hostname -i)
```

# 参考文献
## 一次情報
- [Laravel - The PHP Framework For Web Artisans](https://laravel.com/)
- [Laravel - ウェブ職人のためのPHPフレームワーク](http://laravel.jp/)

## 本やWeb上の情報
　記録に残っている参考にした本とサイトを記す。
- [PHPフレームワーク Laravel入門 第2版 - 秀和システム あなたの学びをサポート！](https://www.shuwasystem.co.jp/book/9784798060996.html)
- [［改訂第3版］Linuxコマンドポケットリファレンス：書籍案内｜技術評論社](https://gihyo.jp/book/2015/978-4-7741-7404-4)
- [Composer](https://getcomposer.org/)
- [Composer｜dockerhub](https://hub.docker.com/_/composer)
- [ComposerをDockerコンテナで動かす - Qiita](https://qiita.com/PitPat/items/dc1ad09f7936b8825473)
- [Composerの導入＆使い方（初心者の復習用） - Qiita](https://qiita.com/suke/items/770bccf8a43f9247daf5)
- [docker run するときにUID,GIDを指定する - Qiita](https://qiita.com/manabuishiirb/items/83d675afbf6b4eea90e4)
- [docker run｜Docker Documentation](https://docs.docker.com/engine/reference/commandline/run/)
- [シェルで現在のユーザーID・グループIDを取得する方法｜LFI](https://linuxfan.info/post-1813)
- [Packagist](https://repo.packagist.org/)
- [Laravelでインストール時にバージョン指定する方法](https://technolog.jp/laravel-version-install/)
- [artisan serve で任意のhost,portを指定する方法 - Qiita](https://qiita.com/do9iigane/items/32083f843db1e5a63fc3)
- [シェルスクリプトのデバッグ｜UNIX &amp; Linux コマンド・シェルスクリプト リファレンス](https://shellscript.sunone.me/debug.html)
- [bashのヒアドキュメントを活用する - Qiita](https://qiita.com/take4s5i/items/e207cee4fb04385a9952)
- [Dockerコンテナの内部IPアドレスを確認する方法 - Qiita](https://qiita.com/ponsuke0531/items/7e8e5081993a30afdc4a)

## メモ
　第5章はLaravelの機能である`DB`クラスからデータベースを動かす。内容的にはほとんどSQL文に近いこと、ほとんどのケースでORMを使ってコードを書くと思われるので第5章を飛ばして第6章に取り組む。とはいえ、5章での内容が作業に必要になるので、4章から6章に移動するために必要な操作を以下に記録する。

```bash
#step1
php artisan make:model Person -m #モデルとマイグレーションファイルを作成

#step2
#マイグレーションファイルを編集(下記参考)

#step3
touch database/database.sqlite #ファイルを作成

#step4
#設定ファイルの編集
# config/database.php のデフォルト設定をsqliteにする。
# .envファイルのDB_CONNECTIONをsqliteにする。
# .envファイルのDB_DATABASEをdatabase/database.sqliteにする。←database.php の設定と同じことを書いているがなぜだろう？ｰ>（※）

#step5
php artisan migrate　#マイグレーションを実行

#step6
php artisan make:seeder PeopleTableSeeder #シーダーを用意する。

#step7
#DatabaseSeeder.phpに作成したシーダーを登録。

#step8
php artisan db:seed #シーダーを実行する。

#step9
#helloapp.blade.phpにstyleを追加する。(表の見え方を追加)
```

マイグレーションファイルの記述は本とv9.xでは異なる。以下のドキュメントを参考に記述していく。
- [マイグレーション 9.x Laravel](https://readouble.com/laravel/9.x/ja/migrations.html)

---

（※）追記。  
公式ドキュメントを読んでいると設定についての記述があった。

はじめは以下の設定を記述していた。
```
DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=/home/user01/prj/database/database.sqlite
DB_USERNAME=root
DB_PASSWORD=
```
しかし、以下のページを確認すると上記は不要ですべて削除しても良いということだった。
- [データベースとマイグレーション｜インストール 9.x Laravel](https://readouble.com/laravel/9.x/ja/installation.html)

実際に削除した状態で実行したが問題なく動作した。

---