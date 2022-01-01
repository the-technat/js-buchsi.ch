# Use offical ubuntu:21.10 image
FROM ubuntu:21.10

# Set timezone
ENV TZ=Europe/Zurich

# Set geographic area using above variable
# This is necessary, otherwise building the image doesn't work
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Remove annoying messages during package installation
ARG DEBIAN_FRONTEND=noninteractive

# Install packages: web server & PHP plus extensions
RUN apt-get update && apt-get install -y \
  apache2 \
  apache2-utils \
  ca-certificates \
  php \
  libapache2-mod-php \
  php-curl \
  php-dom \
  php-gd \
  php-intl \
  php-json \
  php-mbstring \
  php-xml \
  php-zip && \
  apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy virtual host configuration from current path over existing 000-default.conf
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Copy custom php.ini config into container
COPY php.ini /etc/php/8.0/apache2/php.ini

# Copy cert and key from current path to apache dir
RUN mkdir -p /etc/apache2/ssl/dev.js-buchsi.ch/
COPY ssl/cert.pem /etc/apache2/ssl/dev.js-buchsi.ch/cert.crt
COPY ssl/key.pem /etc/apache2/ssl/dev.js-buchsi.ch/key.key

# Remove default content (existing index.html)
RUN rm /var/www/html/*

# Activate Apache modules headers ssl & rewrite
RUN a2enmod headers rewrite ssl

# Change web server's user id to match local user, replace with your local user id
COPY entrypoint.sh /usr/local/bin/
ENTRYPOINT ["entrypoint.sh"]

# Tell container to listen to port 80,443 at runtime
EXPOSE ${HTTP_PORT} 
EXPOSE ${HTTPS_PORT}

# Start Apache web server
CMD [ "/usr/sbin/apache2ctl", "-DFOREGROUND" ]
