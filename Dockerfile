FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN a2enmod rewrite

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

# Ensure only Apache's prefork MPM is enabled
RUN a2dismod mpm_event mpm_worker mpm_itk 2>/dev/null || true
RUN a2enmod mpm_prefork

# Railway uses PORT; default to 8080
ENV PORT=8080

RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf && \
    sed -i 's/<VirtualHost \*:80>/<VirtualHost *:8080>/' \
    /etc/apache2/sites-available/000-default.conf

EXPOSE 8080

CMD ["apache2-foreground"]