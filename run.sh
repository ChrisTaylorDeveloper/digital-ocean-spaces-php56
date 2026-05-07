#!/bin/bash

sudo rm -rf vendor
rm -f composer.*

source .env

docker run -it --rm --name spaces-check \
  -e CREDS_KEY="$CREDS_KEY" \
  -e CREDS_SECRET="$CREDS_SECRET" \
  -e BUCKET="$BUCKET" \
  -v "$PWD":/usr/src/myapp \
  -w /usr/src/myapp \
  phpstorm/php-56-cli-xdebug-25 \
  ./run-in-docker.sh
