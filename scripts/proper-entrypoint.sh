#!/bin/bash

# mute CMD from official wordpress image
sed -i -e 's/^exec "$@"/#exec "$@"/g' /entrypoint.sh

# execute bash script from official wordpress image
source /entrypoint.sh

# replace parent image wp-content with custom wp-content
rm -Rf ./wp-content/themes/* && cp -R /usr/src/wordpress/wp-content/themes/* ./wp-content/themes/
rm -Rf ./wp-content/plugins/* && cp -R /usr/src/wordpress/wp-content/plugins/* ./wp-content/plugins/
chown -R www-data:www-data .

# run additional updates to wp-content and wp-config.php here

# execute CMD
exec "$@"