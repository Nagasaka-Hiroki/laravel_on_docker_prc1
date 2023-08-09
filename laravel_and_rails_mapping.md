# LaravelとRailsの対応
## 概要
　詳細な内容については記述せず、処理内容と目的が近いものを対応として取ってイメージを掴むことを目的とする。

## 対応表
|項目|Ruby on Rails|Laravel|
|-|-|-|
|プロジェクトの作成|`rails new`|`composer create-project laravel/laravel`|
|コントローラ作成|`rails g controller controller_name`<br>同時にヘルパーのファイルを生成|`php artisan make:controller controller_name`|
|ビュー作成|`rails g controller`で同時生成|ディレクトリ&ファイルを自分で作成|
|モデル作成|`rails g model model_name field_name:type ...`<br>同時にマイグレーションやテストファイルを生成|`php artisan make:model model_name`<br>オプションでマイグレーションファイルなどを生成できる。|
|ビューにスクリプトを埋め込む|eRuby|Blade|
|ビューとロジックを分離する|ビューヘルパー|ビューコンポーザー|
|アクションの前後に処理を追加|フィルタ<br>`before_action`<br>`after_action`<br>`around_action`|ミドルウェア<br>`return $next($request);`<br>`return $respomse;`<br>フォームリクエスト、カスタムバリデーション|
|サーバーを起動|`rails server`|`php artisan serve`|
|コンソールを操作|`rails console`|`php artisan tinker`|
|ルーティングを表示|`rails routes`|`php artisan route:list`|

## 参考
- [【Laravel】ルートを確認できるartisan route:listコマンドを解説します｜たいらのエンジニアノート](https://www.tairaengineer-note.com/laravel-artisan-route-list-command/)
- [ルーティング 9.x Laravel](https://readouble.com/laravel/9.x/ja/routing.html)
