#!/bin/bash

export PROPERDOCKER_NAME=$(basename $(pwd))
export PROPERDOCKER_URL="$PROPERDOCKER_NAME".private
export PROPERDOCKER_DB=$(docker ps --filter ancestor=mariadb --format "{{.Names}}")

docker-compose up -d