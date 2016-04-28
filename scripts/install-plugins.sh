#!/bin/bash

jshon -e plugins -a -e url -u < /proper-config.json | while read url; do \
    curl -Lo plugin.zip "$url"; \
    unzip plugin.zip; \
    rm plugin.zip; \
  done