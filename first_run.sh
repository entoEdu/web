#!/usr/bin/env bash
cp ./htdocs/app/config/sample.local.neon ./htdocs/app/config/local.neon
chmod 777 ./htdocs/temp ./htdocs/log
./composer.sh
./npm.sh config set bin-links true && npm install #protože node v docker má tuhle direktivu asi false či co - prostě nevytváří node_modules/.bin
#na lokále to za boha nešlo nainstalovat, pomohlo až
# npm cache clean --force
./npm.sh rebuild node-sass
./webpack.sh