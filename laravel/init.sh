#!/bin/sh
# laravelコンテナに入ったらやることを1つのファイルにまとめました

# composer.jsonにあるやつインストール
composer install

# laravelのキーを作成
php artisan key:generate

# テスト用データベースのためにも別のキーを作成
# php artisann key:generate --env=testing

# package.jsonにあるやつインストール
npm install -y
