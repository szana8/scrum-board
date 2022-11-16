FROM php:8.1-fpm-alpine

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apk add --no-cache \
  icu-dev \
  libxml2-dev \
  libssh2-dev \
  bash \
  libpq-dev \
  libzip-dev \
  libpng-dev \
  g++ \
  $PHPIZE_DEPS \
  rabbitmq-c-dev && \
  docker-php-ext-configure intl && docker-php-ext-install \
  pdo \
  pgsql \
  pdo_pgsql \
  intl \
  opcache \
  bcmath \
  gd \
  sockets \
  zip && \
  pecl install amqp-1.11.0beta && docker-php-ext-enable amqp && \
  pecl install ssh2-1.3.1 && docker-php-ext-enable ssh2 && \
  apk del g++ \
    $PHPIZE_DEPS && \
  rm -rf /var/cache/apk/* /tmp/pear/* /usr/src/*


RUN apk add --no-cache \
    $PHPIZE_DEPS \
    tzdata \
    git \
    bash-completion \
    unzip \
    gnupg \
    nodejs \
    npm && \
  echo -e "source /etc/profile.d/bash_completion.sh\nPS1='\u@\h:\w\$ '\n" > /root/.bashrc && \
  echo "------NODEJS VERSION------" && \
  node --version && \
  echo "------NPM VERSION------" && \
  npm -v && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
  echo "------COMPOSER VERSION------" && \
  composer --version && \
  npm install yarn@1.22.10 -g && \
  echo "------YARN VERSION------" && \
  yarn --version && \
  pecl install pcov && \
  docker-php-ext-enable pcov && \
  apk del $PHPIZE_DEPS \
    tzdata && \
  rm -rf /tmp/pear /var/cache/apk/* /usr/src/*

# Copy php settings into image
# COPY ./docker/php/php-ini-overrides.ini /usr/local/etc/php/conf.d/99-base-overrides.ini

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
# USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
