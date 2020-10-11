FROM php:5.6-apache

RUN apt-get -y update && apt-get upgrade -y

# Install tools && libraries
RUN apt-get -y install --fix-missing apt-utils iputils-ping nano wget dialog \
    build-essential git curl libcurl3 libcurl3-dev zip libc-client2007e-dev \
    libmcrypt-dev libsqlite3-dev libsqlite3-0 mysql-client \
    zlib1g-dev libicu-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    libkrb5-dev \
    open-cobol gcc \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    && docker-php-ext-install imap

# PHP5 Extensions
RUN docker-php-ext-install curl \
    && docker-php-ext-install tokenizer \
    && docker-php-ext-install json \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo_sqlite \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install mysql \
    && docker-php-ext-install zip \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install exif \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && pecl install xdebug-2.5.5 && docker-php-ext-enable xdebug \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini


RUN echo 'export PATH=/usr/include/libcob:$PATH' >> ~/.bashrc

RUN a2enmod rewrite headers proxy proxy_http
EXPOSE 80
ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]