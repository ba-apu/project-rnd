FROM docker-hub.land.gov.bd/a2i_dashboard:v15

WORKDIR /var/www/html/
RUN rm -rf *
COPY . .

RUN composer install --no-scripts --no-autoloader

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html
RUN composer update --no-scripts

RUN php artisan cache:clear && \
    php artisan view:clear && \
    php artisan route:clear && \
    php artisan config:cache && \
    php artisan config:clear


COPY default.conf /etc/apache2/sites-enabled/000-default.conf


CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80 443
