#!/bin/sh

# This sample script count the number of file beginning with "ledtest" into
#   /tmp folder. Just create and delete these sort of files to see the LED
#   light up or light off

find /tmp/ -type f -name "ledtest*" | wc -l
echo "8"
