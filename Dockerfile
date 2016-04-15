FROM conetix/wordpress-with-wp-cli

RUN apt-get update
RUN apt-get install pwgen

# Cleanup
#RUN apt-get clean

ADD ./scripts /scripts
RUN usermod -u 1000 www-data 

#CMD ["/bin/bash", "/scripts/setup-wordpress.sh"]