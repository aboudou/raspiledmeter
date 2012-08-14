import os

(filepath, filename) = os.path.split(os.path.realpath(__file__))

"""
" Edit below this line to fit your needs
"""

# Path of the script which will get data for RasPiLEDMeter
#SCRIPT_PATH = filepath + "/scripts/dummy.sh"
#SCRIPT_PATH = filepath + "/scripts/filecount.sh"
SCRIPT_PATH = filepath + "/scripts/cpu.sh"

# Refresh rate (ms)
REFRESH_RATE = 1000
