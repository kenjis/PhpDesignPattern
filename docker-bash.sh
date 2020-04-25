#!/bin/bash

set -eux

docker run -it --rm --name PhpDesignPattern \
  -v "$PWD":/usr/src/myapp \
  -w /usr/src/myapp \
  php:7.4-cli \
  bash
