#!/bin/sh
# 
# Start / Shutdown script for RasPiLEDMeter
#

DIR=$(cd $(dirname "$0"); pwd)

case "$1" in
  start)

    # Start RasPiLEDMeter
    `which python` "${DIR}"/main.py &

    ;;
  stop)
    # Stop RasPiLEDMeter
    `which kill` `cat /var/run/raspiledmeter.pid`
    `which rm` /var/run/raspiledmeter.pid
    
    ;;

  *)
    echo "Usage: $0 {start|stop}" >&2
    exit 1

    ;;

esac

exit 0
