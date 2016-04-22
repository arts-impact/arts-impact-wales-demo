# Proper's WordPress Docker starter

Proper Design's starter docker-compose image. Spins up a 

##Dependencies
* Docker
* Docker Compose
* DNSMaq (for local development)

##Getting started

To get started:

* Spin up an HTTPS-PORTAL network (add instructions and repo on how to do this)
* dnsmasq locally, resolving IP on the server
* Set environment variables depending on where this is being spun up
  * Set these locally in ~/.bash_profile or on the server by following this http://stackoverflow.com/questions/1641477/how-to-set-environment-variable-for-everyone-under-my-linux-system
  * export PROPERDOCKER_RESTART=true (prod) || false (local dev)
  * export PROPERDOCKER_DEBUG=false (prod) || true (local dev)
* The default WordPress admin username is 'proper'
* The admin password is generated dynamically and can be accessed by viewing the container logs. This might help: `docker exec -t ${PWD##*/} bash -c 'echo "$PROPERDOCKER_ADMIN_PASSWORD"'` (you can run that directly if your directory has the same name as your container, or, replace `${PWD##*/}` with the container you'd like to query)

## To-do
* PHP warnings/errors
* Migrate DB licence in wp-config
* DB pull
* Remove built-in themes
* Install plugins
* Think of solution for site URL. Is currently something.private
* Document how to set up the network
* Swap out wordpress:latest for wordpress:fpm