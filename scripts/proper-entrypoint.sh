#!/bin/bash

# mute CMD from official wordpress image
sed -i -e 's/^exec "$@"/#exec "$@"/g' /entrypoint.sh

# execute bash script from official wordpress image
source /entrypoint.sh

# replace parent image wp-content with custom wp-content
# rm -Rf ./wp-content && cp -R /usr/src/<custom wp-content>/* .
# chown -R www-data:www-data .

# run additional updates to wp-content and wp-config.php here

# execute CMD
exec "$@"