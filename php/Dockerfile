FROM php:8.2-apache

# 必要な PHP 拡張をインストール
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Apache のドキュメントルート
WORKDIR /var/www/html

# Apache の ServerName 警告を抑制
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf