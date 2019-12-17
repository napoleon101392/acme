FROM ubuntu:16.04
COPY site-nginx.conf composer-install.sh /tmp/
RUN apt-get update -y && \
  apt-get install -y --no-install-recommends software-properties-common && \
  LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php && \
  apt-get update -y && \
  apt-get install -y --no-install-recommends \
  wget \
  curl \
  zip \
  unzip \
  vim \
  wkhtmltopdf \
  libxrender1 \
  git \
  cron \
  openssl \
  apt-utils \
  lynx-common \
  php-xdebug \
  php-gd \
  nginx \
  php7.2 \
  php7.2-fpm \
  php7.2-mbstring \
  php7.2-curl \
  php7.2-tokenizer \
  php7.2-dom \
  php7.2-zip \
  php7.2-mysql \
  php7.2-imap \
  php7.2-xml \
  php7.2-cli \
  php7.2-gd \
  php7.2-intl \
  php7.2-bcmath \
  php7.2-sqlite && \
  mv /tmp/site-nginx.conf /etc/nginx/sites-available/ && \
  mv /tmp/composer-install.sh /var/www/composer-install.sh && \
  rm /etc/nginx/sites-available/default && \
  ln -s /etc/nginx/sites-available/site-nginx.conf /etc/nginx/sites-enabled/site && \
  chown -R www-data:www-data /var/www && \
  find /var/www -type d -exec chmod 755 {} \; && \
  find /var/www -type f -exec chmod 644 {} \; && \
  echo "\ndaemon off;" >> /etc/nginx/site-nginx.conf && \
  sed -i -e "s/;\?daemonize\s*=\s*yes/daemonize = no/g" /etc/php/7.2/fpm/php-fpm.conf && \
  echo "\ncgi.fix_pathinfo = 0" >> /etc/php/7.2/fpm/php.ini && \
  echo "\nfile_uploads = On" >> /etc/php/7.2/fpm/php.ini && \
  echo "\nallow_url_fopen = On" >> /etc/php/7.2/fpm/php.ini && \
  echo "\nmemory_limit = 512M" >> /etc/php/7.2/fpm/php.ini && \
  echo "\nmax_execution_time = 360" >> /etc/php/7.2/fpm/php.ini && \
  echo "\nupload_max_filesize = 100M" >> /etc/php/7.2/fpm/php.ini && \
  echo "\npost_max_size = 100M" >> /etc/php/7.2/fpm/php.ini && \
  echo "\ndate.timezone = Asia\/Manila" >> /etc/php/7.2/fpm/php.ini && \
  curl -sL https://deb.nodesource.com/setup_10.x | bash - && \
  apt-get update -y && \
  apt-get install -y nodejs build-essential \
  chmod +x /var/www/composer-install.sh && \
  sh /var/www/composer-install.sh && \
  rm /var/www/composer-install.sh
EXPOSE 80
CMD ["/bin/bash"]
