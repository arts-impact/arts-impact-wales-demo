FROM properdesign/wordpress-starter

ENV force_update 100002 # Bump this up if you want to force a re-pull of themes and plugins

ADD proper-config.json /proper-config.json
WORKDIR /usr/src/wordpress/wp-content/plugins
RUN /bin/bash -c '/scripts/install-plugins.sh'
WORKDIR /usr/src/wordpress/wp-content/themes
RUN /bin/bash -c '/scripts/install-themes.sh'

WORKDIR /var/www/html

ENTRYPOINT ["/scripts/proper-entrypoint.sh"]
CMD ["apache2-foreground"]