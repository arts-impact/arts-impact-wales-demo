#!/bin/bash

jshon -e plugins -a -e url -u < proper-config.json | while read plugin; do
  echo $plugin
done