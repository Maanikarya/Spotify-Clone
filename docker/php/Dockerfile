FROM php:8.2-fpm

# Install system dependencies Laravel needs
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions Laravel commonly needs
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer (PHP's package manager) into this image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory inside the container
WORKDIR /var/www

# Copy your project files into the container
COPY . .

# Install Laravel dependencies
RUN composer install

EXPOSE 9000
CMD ["php-fpm"]