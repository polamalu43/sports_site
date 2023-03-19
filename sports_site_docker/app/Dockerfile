FROM php:8.0-apache

# 設定ファイルをdockerコンテナ内のPHP、Apacheに読み込ませる
ADD php.ini /usr/local/etc/php/
ADD 000-default.conf /etc/apache2/sites-enabled/

# Composerのインストール
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# 必要なモジュールなどをインストール
RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
libpng-dev \
libpq-dev \
&& docker-php-ext-install pdo_mysql

#PostgreSQLでPDOを利用してDB接続ためにPDOドライバーをインストール
RUN docker-php-ext-install pdo_pgsql

# Laravelで必要になるmodRewriteを有効化する
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

# Node、npmインストール
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@8.19.3

# コンテナ内の作業ディレクトリ
WORKDIR /var/www/html/

# ユーザーを作成
ARG UID=1000
RUN useradd -m -u ${UID} afkstd43

# 作成したユーザーに切り替える
USER ${UID}

# ユーザーを作成
# ARG DOCKER_UID=1000
# ARG DOCKER_USER=docker
# ARG DOCKER_PASSWORD=docker
# RUN useradd -m --uid ${DOCKER_UID} --groups sudo ${DOCKER_USER} \
#   && echo ${DOCKER_USER}:${DOCKER_PASSWORD} | chpasswd

# 作成したユーザーに切り替える
# USER ${DOCKER_USER}