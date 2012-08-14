#!/usr/bin/python
import RPi.GPIO as GPIO
import time
import array
import os
import signal
import subprocess

from config import *

### Functions definition

# Called on process interruption. Set all pins to "Input" default mode.
def endProcess(signalnum = None, handler = None):
    for gpioPinLed in gpioPinLedList:
        GPIO.setup(gpioPinLed, GPIO.IN)
    exit(0)

# Put pins to out mode and low state.
def initPins():
    for gpioPinLed in gpioPinLedList:
        GPIO.setup(gpioPinLed, GPIO.OUT)
        GPIO.output(gpioPinLed, GPIO.LOW)


### Main part

# Get current pid
pid = os.getpid()

# Save current pid for later use
try:
    fhandle = open('/var/run/raspiledmeter.pid', 'w')
except IOError:
    print "Unable to write /var/run/raspiledmeter.pid";
    exit(1)
fhandle.write(str(pid))
fhandle.close()

# Prepare handlers for process exit
signal.signal(signal.SIGTERM, endProcess)
signal.signal(signal.SIGINT, endProcess)

# Use Raspberry Pi board pin numbers
GPIO.setmode(GPIO.BOARD)
gpioPinLedList = [7, 11, 12, 13, 15, 16, 18, 22]

# Init output pins
initPins()

while True:
    try:
        p = subprocess.Popen(SCRIPT_PATH, stdout=subprocess.PIPE)
    except OSError:
        print ("Could not execute " + SCRIPT_PATH)
        exit(1)
    out, err = p.communicate()

    # Check for output format : number of lines
    if len(out.splitlines()) != 2:
        print ("Wrong output format for script " + SCRIPT_PATH 
        + ": two lines are expected.")
        exit(1)
    

    current_value = out.splitlines()[0]
    max_value = out.splitlines()[1]

    # Check for output format : numeric values
    if current_value.isdigit() == False or  max_value.isdigit() == False:
        print ("Wrong output format for script " + SCRIPT_PATH
        + ": numeric values are expected.")
        exit(1)

    # Calculate the number of LED to light on
    led_number = int(round((float(current_value) / float(max_value)) * len(gpioPinLedList), 0))

    # Light up the required number of LED
    loop = 0
    while loop < len(gpioPinLedList):
        if loop < led_number:
           GPIO.output(gpioPinLedList[loop], GPIO.HIGH)
        else:
           GPIO.output(gpioPinLedList[loop], GPIO.LOW)

        loop += 1

    time.sleep(REFRESH_RATE / 1000)
