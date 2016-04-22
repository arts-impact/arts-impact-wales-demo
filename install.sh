#!/bin/bash

# if $PROPERDOCKER_DEBUG && ! $PROPERDOCKER_RESTART ; then
#   echo "Running locally"
#   # export PROPERDOCKER_NAME=$(basename $(pwd))
#   # export PROPERDOCKER_URL="$PROPERDOCKER_NAME".private
#   # export PROPERDOCKER_DB=$(docker ps --filter ancestor=mariadb --format "{{.Names}}")

#   # docker-compose down
#   # docker-compose build
#   # docker-compose up -d
# else
#   echo "It looks like you're trying to run this on the server, or haven't properly set environement variables."
#   echo "If you're trying to run this locally, add the following to ~/.bash_profile:"
#   echo "export PROPERDOCKER_RESTART=false"
#   echo "export PROPERDOCKER_DEBUG=true"
# fi

export PROPERDOCKER_NAME=$(basename $(pwd))
export PROPERDOCKER_URL="$PROPERDOCKER_NAME".private
export PROPERDOCKER_DB=$(docker ps --filter ancestor=mariadb --format "{{.Names}}")
export PROPERDOCKER_ADMIN_USER=proper
export PROPERDOCKER_ADMIN_PASSWORD=$(pwgen 10 1)
export PROPERDOCKER_ADMIN_EMAIL="support@properdesign.rs"
export WPMDBP_LICENCE="b3ed61fe-2e1c-498a-807d-3c2407e5ad75"
export ACF_LICENCE="b3JkZXJfaWQ9MzMwMTJ8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTA3LTA3IDE2OjI4OjI0"

docker-compose build
docker-compose up -d

# Run the install script inside the container
docker exec $PROPERDOCKER_NAME /scripts/install-wordpress.sh
docker exec $PROPERDOCKER_NAME ls -lah wp-content/plugins