#!/bin/bash

cd /var/www/html

# Check if WP is installed

if ! $(wp core is-installed)
then
  #Install WordPress
  echo "Running WP-CLI core install..."
  wp core install --url="$VIRTUAL_HOST" --title="$WORDPRESS_DB_NAME" --admin_user="$PROPERDOCKER_ADMIN_USER" --admin_password="$PROPERDOCKER_ADMIN_PASSWORD" --admin_email="$PROPERDOCKER_ADMIN_EMAIL"

  #Do a plugin update
  echo "Updating plugins..."
  wp plugin update --all

  echo "WordPress setup!"
fi

echo "§====================================================="
echo "§  Site URL:               $VIRTUAL_HOST"
echo "§  Admin username:         $PROPERDOCKER_ADMIN_USER"
echo "§  Admin password:         $PROPERDOCKER_ADMIN_PASSWORD"
echo "§====================================================="
