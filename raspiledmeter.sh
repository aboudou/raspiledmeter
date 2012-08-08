#!/bin/sh
# 
# Start / Shutdown script for RasPiLEDMeter
#

DIR=$(cd $(dirname "$0"); pwd)

case "$1" in
  start)

    for i in 4 17 18 21 22 23 24 25
    do
        # Disable header pins (in case they're were not previously disabled)
        echo $i > /sys/class/gpio/unexport
        # Enable header pins to use
        echo $i > /sys/class/gpio/export
        # Set them as output pins
        echo "out" > /sys/class/gpio/gpio$i/direction
        # Send low value to turn off LED
        echo "0" > /sys/class/gpio/gpio$i/value
    done
    
    # Start RasPiLEDMeter
    `which php` "${DIR}"/main.php &

    ;;
  stop)
    # Stop RasPiLEDMeter
    `which kill` `cat /var/run/raspiledmeter.pid`
    `which rm` /var/run/raspiledmeter.pid
 
    sleep(1)
    
    for i in 4 17 18 21 22 23 24 25
    do
        # Send low value to turn off LED
        echo "0" > /sys/class/gpio/gpio$i/value
        # Disable header pins
        echo $i > /sys/class/gpio/unexport
    done

    ;;

  *)
    echo "Usage: $0 {start|stop}" >&2
    exit 1

    ;;

esac

exit 0
