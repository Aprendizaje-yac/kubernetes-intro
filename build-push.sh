#!/bin/bash

IMG=$1
DIR=$2

docker build --no-cache -t hub.srv.unc.edu.ar/$USER/$IMG $DIR
docker push hub.srv.unc.edu.ar/$USER/$IMG

