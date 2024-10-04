#!/bin/sh
# laravelコンテナに入ったらやることを1つのファイルにまとめました

# .env.exampleから.envを作成
cp .env.example .env

# composer.jsonにあるやつインストール
composer install

# laravelのキーを作成
php artisan key:generate

# テスト用データベースのためにも別のキーを作成
# php artisann key:generate --env=testing

# package.jsonにあるやつインストール
npm install -y

# migrate実行
php artisan migrate
