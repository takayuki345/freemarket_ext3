# フリマアプリ

## Dockerビルド
1. `git clone git@github.com:takayuki345/freemarket.git`
2. DockerDesktopアプリを起動する
3. `docker compose up -d --build`

### Laravel環境構築
1. `docker compose exec php bash`
2. `composer install`
3. .env.exampleファイルから.envをコピー作成し、以下のように環境変数の値をメンテナンスする
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

        （中略）

MAIL_FROM_ADDRESS=test@example.com
```
4. アプリケーションキーの作成
``` bash
php artisan key:generate
```
5. マイグレーションの実行
``` bash
php artisan migrate
```
6. シーディングの実行
``` bash
php artisan db:seed
```
7. シンボリックリンクの作成
``` bash
php artisan storage:link
```

## 使用技術（実行環境）
- php 7.4.9
- Laravel 8.83.29
- Mysql 8.0.26

## ER図
![ER図](ER_Diagram.jpg)

## URL
- 開発環境：http://localhost/
***（アクセス権の問題で`sudo chmod 777 -R src`が必要となる場合があります）***
- pypMyAdmin：http://localhost:8080/
- MailHog：http://localhost:8025/

## 備考
- テスト用のユーザー「test1」、「test2」、「test3」があらかじめ作成されます。それぞれのメールアドレス／パスワードは「test1@test／test1test1」、「test2@test／test2test2」、「test3@test／test3test3」となっております。もちろん、会員登録で新規作成も可能です。