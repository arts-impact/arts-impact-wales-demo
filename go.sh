#!/bin/bash

export PROPERDOCKER_NAME=$(basename $(pwd))
export PROPERDOCKER_URL="$PROPERDOCKER_NAME".private
export PROPERDOCKER_DB=$(docker ps --filter ancestor=mariadb --format "{{.Names}}")

docker-compose up -d

# Alias wp to docker exec
wp="docker exec $PROPERDOCKER_NAME /bin/wp-cli.phar"

# Check if WordPress is already installed
$wp core is-installed --allow-root

if [ $? -eq 0 ]
then
  echo "WordPress already installed"
else
  export PROPERDOCKER_ADMIN_USER=proper
  export PROPERDOCKER_ADMIN_PASSWORD=$(pwgen 10 1)
  export PROPERDOCKER_ADMIN_EMAIL="support@properdesign.rs"
  export WPMDBP_LICENCE="b3ed61fe-2e1c-498a-807d-3c2407e5ad75"
  export ACF_LICENCE="b3JkZXJfaWQ9MzMwMTJ8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTA3LTA3IDE2OjI4OjI0"


  #Install WordPress
  echo "Running WP-CLI core install..."
  $wp core install --url="$PROPERDOCKER_URL" --title="$PROPERDOCKER_NAME" --admin_user="$PROPERDOCKER_ADMIN_USER" --admin_password="$PROPERDOCKER_ADMIN_PASSWORD" --admin_email="$PROPERDOCKER_ADMIN_EMAIL" --allow-root

  #Delete some jazz that we don't need most of the time. This should really be done with --skip-plugins and --skip-themes or wp-cli.yml, but it no worky. Don't know why
  echo "Deleting duff themes and plugins..."
  $wp plugin delete hello --allow-root
  $wp plugin delete akismet --allow-root
  $wp theme delete twentyfourteen --allow-root
  $wp theme delete twentyfifteen --allow-root
  $wp theme delete twentysixteen --allow-root

  # Install some jazz that we do want
  ## Migrate DB Pro and related bits
  echo "Installing non-duff plugins..."
  $wp plugin install "https://deliciousbrains.com/dl/wp-migrate-db-pro-latest.zip?licence_key=$WPMDBP_LICENCE&site_url="$PROPERDOCKER_URL --allow-root
  $wp plugin install "https://deliciousbrains.com/dl/wp-migrate-db-pro-media-files-latest.zip?licence_key=$WPMDBP_LICENCE&site_url="$PROPERDOCKER_URL --allow-root
  $wp plugin install "https://deliciousbrains.com/dl/wp-migrate-db-pro-cli-latest.zip?licence_key=$WPMDBP_LICENCE&site_url="$PROPERDOCKER_URL --allow-root

  ## Advanced Custom Fields
  $wp plugin install "http://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=$ACF_LICENCE" --allow-root

  #Do a plugin update
  echo "Updating plugins..."
  $wp plugin update --all --allow-root

  echo "WordPress setup!"

  echo "§====================================================="
  echo "§  Site URL:               $PROPERDOCKER_URL"
  echo "§  Admin username:         $PROPERDOCKER_ADMIN_USER"
  echo "§  Admin password:         $PROPERDOCKER_ADMIN_PASSWORD"
  echo "§  Admin email:            $PROPERDOCKER_ADMIN_EMAIL"
  echo "§====================================================="
fi