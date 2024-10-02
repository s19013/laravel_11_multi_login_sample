FROM php:8.2-fpm-buster

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_HOME=/composer

# composerインストール
COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update

# 必要なパッケージインストール
# [--no-install-recommends] 不要なパッケージのインストールを防止
RUN apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev

# パッケージインストールで使用したキャッシュファイルを削除
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP拡張ライブラリをインストール
RUN docker-php-ext-install intl pdo_mysql zip bcmath

# Node.jsのインストール
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

WORKDIR /laravel
