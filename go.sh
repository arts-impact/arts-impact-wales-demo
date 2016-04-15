#!/bin/bash

export PROPERDOCKER_NAME=$(basename $(pwd))
export PROPERDOCKER_HTTPSPORTAL=$(docker ps --filter ancestor=mariadb --format "{{.Names}}")

# Stop any other WordPress containers. No real need to other than just to keep things tidy
# docker stop $(docker ps -q --filter "name=wordpress")

docker-compose up -d