#!/bin/bash

# This sample script calculate and shows CPU usage
# 
# Original code from Paul Colby: http://colby.id.au/node/39/

 
PREV_TOTAL=0
PREV_IDLE=0

# Beginning of the first test 
CPU=(`grep '^cpu ' /proc/stat `) # Get the total CPU statistics.
unset CPU[0]                          # Discard the "cpu" prefix.
IDLE=${CPU[4]}                        # Get the idle CPU time.
 
# Calculate the total CPU time.
TOTAL=0
for VALUE in "${CPU[@]}"; do
  let "TOTAL=$TOTAL+$VALUE"
done

# Remember the total and idle CPU times for the next check.
PREV_TOTAL="$TOTAL"
PREV_IDLE="$IDLE"

# Wait for 1 second for the next text
sleep 1

# Beginning of the second test
CPU=(`grep '^cpu ' /proc/stat`) # Get the total CPU statistics.
unset CPU[0]                          # Discard the "cpu" prefix.
IDLE=${CPU[4]}                        # Get the idle CPU time.

# Calculate the total CPU time.
TOTAL=0
for VALUE in "${CPU[@]}"; do
  let "TOTAL=$TOTAL+$VALUE"
done
 
# Calculate the CPU usage since we last checked.
let "DIFF_IDLE=$IDLE-$PREV_IDLE"
let "DIFF_TOTAL=$TOTAL-$PREV_TOTAL"
let "DIFF_USAGE=(1000*($DIFF_TOTAL-$DIFF_IDLE)/$DIFF_TOTAL+5)/10"

echo $DIFF_USAGE
echo 100 #Max usage is always 100%
