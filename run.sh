#!/bin/bash

sudo rm -rf vendor
rm -f composer.*

docker run -it --rm --name spaces-check \
  -v "$PWD":/usr/src/myapp \
  -w /usr/src/myapp \
  phpstorm/php-56-cli-xdebug-25 \
  ./in-docker.sh
