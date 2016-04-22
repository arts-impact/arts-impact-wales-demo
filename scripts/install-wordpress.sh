#!/bin/bash

cd /var/www/html

# Check if WP is installed

echo "Waiting for WordPress to be copied to volume..."

while [ ! -f index.php ]
do
  sleep 1
done

echo "WordPress copied."

echo "Waiting for the database to be available..." #This should probably really check if the DB exists, but this is harder than you might think as we don't have a local mysql client on this contianer (nor do we want to really). Could probably write a bit of PHP to do this
# while [ ! $(wp db tables) ]
# do
#   sleep 1
# done
sleep 5

echo "Database (probably) available. We just waited 5 seconds..."

if ! $(wp core is-installed)
then
  #Install WordPress
  echo "Running WP-CLI core install..."
  wp core install --url="$VIRTUAL_HOST" --title="$WORDPRESS_DB_NAME" --admin_user="$PROPERDOCKER_ADMIN_USER" --admin_password="$PROPERDOCKER_ADMIN_PASSWORD" --admin_email="$PROPERDOCKER_ADMIN_EMAIL"

  #Do a plugin update
  echo "Updating plugins..."
  wp plugin update --all

  echo "Activating plugins..."
  jshon -e plugins -a -e name -u < /proper-config.json | while read name; do \
    wp plugin activate $name
  done

  # Make Migrate DB happy
  echo 'define( "WPMDB_LICENCE", "b3ed61fe-2e1c-498a-807d-3c2407e5ad75" );' >> wp-config.php

  echo "WordPress setup!"
fi

echo "§====================================================="
echo "§  Site URL:               $VIRTUAL_HOST"
echo "§  Admin username:         $PROPERDOCKER_ADMIN_USER"
echo "§  Admin password:         $PROPERDOCKER_ADMIN_PASSWORD"
echo "§====================================================="
