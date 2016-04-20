FROM wordpress:latest

# The guts from https://github.com/conetix/docker-wordpress-wp-cli added here so that we can use FPM
# rather than the default Apache image

# Add sudo in order to run wp-cli as the www-data user 
RUN apt-get update && apt-get install -y sudo less pwgen unzip jshon

# Add WP-CLI 
RUN curl -o /bin/wp-cli.phar https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
COPY scripts/wp-su.sh /bin/wp
RUN chmod +x /bin/wp-cli.phar

# Cleanup
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*


### Plugins ###
WORKDIR /usr/src/wordpress/wp-content/plugins/
RUN rm -Rf *

# Recursively add plugins from proper-config.json
RUN \
  jshon -e plugins -a -e url -u < /proper-config.json | while read url; do \
    curl -Lo plugin.zip "$url"; \
    unzip plugin.zip; \
    rm plugin.zip; \
  done

### Themes ###
WORKDIR /usr/src/wordpress/wp-content/themes/
RUN rm -Rf *

# Recursively add themes from proper-config.json
ENV force_theme 100001 # Bump this up if you want to force a re-pull of Proper Bear (or any other theme whose URL hasn't changed)
RUN \
  jshon -e themes -a -e url -u < /proper-config.json | while read url; do \
    curl -Lo theme.zip "$url"; \
    unzip theme.zip; \
    rm theme.zip; \
  done

ADD ./scripts /scripts
ADD proper-config.json /proper-config.json
RUN usermod -u 1000 www-data

WORKDIR /var/www/html

ENTRYPOINT ["/scripts/proper-entrypoint.sh"]
CMD ["apache2-foreground"]