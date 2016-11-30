#!/bin/sh

#Shell
#Give the server permission to do work in this directory
cd /var/www/convertApp/public/

sudo ffmpeg -i sample.avi -strict -2 output.mp4

