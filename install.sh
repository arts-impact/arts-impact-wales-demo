#!/bin/bash

# This file mostly sets appropriate environment variables used to spin up the container.

if [ $PROPERDOCKER_STAGE = 'local' ] ; then
  export PROPERDOCKER_RESTART='false'
  export PROPERDOCKER_DEBUG='true'
elif [ $PROPERDOCKER_STAGE = 'staging' ] ; then
  export PROPERDOCKER_RESTART='true'
  export PROPERDOCKER_DEBUG='true'
elif [ $PROPERDOCKER_STAGE = 'prod' ] ; then
  export PROPERDOCKER_RESTART='false'
  export PROPERDOCKER_DEBUG='false'
else
  echo '$PROPERDOCKER_STAGE not set. Please set to "local", "staging", or "prod"'
fi

export PROPERDOCKER_NAME=$(basename $(pwd))
export PROPERDOCKER_DB=$(docker ps --filter ancestor=mariadb --format "{{.Names}}")
export PROPERDOCKER_ADMIN_USER=proper
export PROPERDOCKER_ADMIN_EMAIL="support@properdesign.rs"
export WPMDBP_LICENCE="b3ed61fe-2e1c-498a-807d-3c2407e5ad75"
export ACF_LICENCE="b3JkZXJfaWQ9MzMwMTJ8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTA3LTA3IDE2OjI4OjI0"

# Try to guess the most useful hostname
HOST=$(hostname)
if [[ $HOST == *".local"* ]]
then
  TEMP_URL="$PROPERDOCKER_NAME.private"
else
  TEMP_URL="$PROPERDOCKER_NAME$HOST"
fi

echo "Enter the hostname (i.e. full domain name without protocol) for this host. Defaults to $TEMP_URL if no hostname given."
read USER_URL

if [ -z "$USER_URL" ]; then
  PROPERDOCKER_URL=$TEMP_URL
else
  PROPERDOCKER_URL=$USER_URL
fi

export PROPERDOCKER_URL="$PROPERDOCKER_URL"


## Migrate DB
echo "Do you want to migrate a database from a remote site [Y/n]?"
read MIGRATE

if [ "$MIGRATE" == n ]; then
  # The user didn't want to migrate anything
  echo "Proceeding without migrate..."
elif [ "$MIGRATE" == Y ] || [ "$MIGRATE" == y ] || [ -z "$MIGRATE" ]; then
  export PROPERDOCKER_MIGRATEDB_URL="https://groundwork.staging.properdesign.co.uk"
  export PROPERDOCKER_MIGRATEDB_KEY="/Ck/pkh3PxgYrAIypPedoL4yX+npbf5AEjkjeda8"
  # echo "Enter the remote host URL that you want to pull from..."
  # read PROPERDOCKER_MIGRATEDB_URL
  # export PROPERDOCKER_MIGRATEDB_URL="$PROPERDOCKER_MIGRATEDB_URL"

  # echo "Enter the remote host key..."
  # read PROPERDOCKER_MIGRATEDB_KEY
  # export PROPERDOCKER_MIGRATEDB_KEY="$PROPERDOCKER_MIGRATEDB_KEY"
fi

echo "Installing site at $PROPERDOCKER_URL..."

# Check if there's already a container and save its password. Be nice.

PW=$(docker exec -t ${PWD##*/} bash -c 'echo "$PROPERDOCKER_ADMIN_PASSWORD"')

# The last command tries to get the password out of a running container. If that doesn't exist (i.e. the command failed), generate one
if [ ! $? -eq 0 ] ; then
  export PROPERDOCKER_ADMIN_PASSWORD=$(pwgen 10 1)
else
  export PROPERDOCKER_ADMIN_PASSWORD=$PW
fi

docker pull properdesign/wordpress-starter

docker-compose build
docker-compose up -d

# Run the install script inside the container
docker exec $PROPERDOCKER_NAME /scripts/install-wordpress.sh
