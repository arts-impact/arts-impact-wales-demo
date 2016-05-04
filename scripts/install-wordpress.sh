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

  # Enable debug if we want it
  if [ ! $PROPERDOCKER_DEBUG = true ]; then
    echo 'define( "WP_DEBUG", true );' >> wp-config.php
    echo 'define( "WP_DEBUG_LOG", true );' >> wp-config.php
  fi

  echo "WordPress setup!"
fi

# Migrate a DB if we have all the deets
if [ -n "$PROPERDOCKER_MIGRATEDB_URL" ] && [ -n "$PROPERDOCKER_MIGRATEDB_KEY" ]; then
  echo "Migrating database with media files from $PROPERDOCKER_MIGRATEDB_URL..."
  # Try to do a migrate with media files. This might fail
  wp migratedb pull "$PROPERDOCKER_MIGRATEDB_URL" "$PROPERDOCKER_MIGRATEDB_KEY" --preserve-active-plugins --media=compare-and-remove

  if [ ! $? -eq 0 ] ; then
    echo "Migrating database with media files failed. Trying migrating database without media files..."
    wp migratedb pull "$PROPERDOCKER_MIGRATEDB_URL" "$PROPERDOCKER_MIGRATEDB_KEY" --preserve-active-plugins
    if [ $? -eq 0 ] ; then
      echo "Database migration successful."
    else
      echo "Database migration failed. Perhaps the Migrate DB versions are different ."
      MIGRATEDB_FAILED=true
    fi
  fi
fi

echo "§============================================================"
echo "§  Site URL:               $VIRTUAL_HOST"

if [ -z "$PROPERDOCKER_MIGRATEDB_URL" || "$MIGRATEDB_FAILED" = true ]; then
  # We set up a new database, so these details are probably right
  echo "§  Admin username:         $PROPERDOCKER_ADMIN_USER"
  echo "§  Admin password:         $PROPERDOCKER_ADMIN_PASSWORD"
else
  echo "§  Admin username:         From the database you pulled..."
  echo "§  Admin password:         From the database you pulled..."
fi

echo "§============================================================"
