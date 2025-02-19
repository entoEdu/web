#!/usr/bin/env bash
ARGS="$@"

if [ $# -eq 0 ]; then
	COMMAND="install"
	else
	COMMAND=$ARGS
	fi

docker run --rm --interactive --tty \
  --volume $PWD/htdocs:/app \
  --volume ${COMPOSER_HOME:-$HOME/.composer}:/tmp \
  --user=$(id -u):$(id -g) \
  composer:2 $COMMAND
