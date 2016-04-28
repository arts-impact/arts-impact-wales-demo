#!/bin/bash

jshon -e themes -a -e url -u < /proper-config.json | while read url; do \
    curl -Lo theme.zip "$url"; \
    unzip theme.zip; \
    rm theme.zip; \
  done