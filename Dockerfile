FROM conetix/wordpress-with-wp-cli

RUN apt-get update
RUN apt-get install pwgen

ADD ./scripts /scripts

CMD ["/bin/bash", "/scripts/setup-wordpress.sh"]