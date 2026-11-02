FROM dockette/web:php-84
RUN rm -rf /srv/www
COPY htdocs /srv
RUN chmod -R 777 /srv/log /srv/temp && mv /srv/app/config/production.neon /srv/app/config/local.neon