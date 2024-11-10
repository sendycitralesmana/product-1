FROM php:8.3.7-cli

# Copy composer.lock dan composer.json ke /var/www
COPY composer.lock composer.json /src/

# Set sebagai working directory
WORKDIR /src

# Install dependencies yang diperlukan
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libpq-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    libgd-dev \
    net-tools \
    nano  \
    iputils-ping

# Hapus cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-external-gd
RUN docker-php-ext-install pdo pgsql pdo_pgsql mbstring zip exif pcntl
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /src

RUN composer install

COPY php.ini /usr/local/etc/php/

# start php-fpm server
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]