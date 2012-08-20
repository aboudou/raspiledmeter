RasPiLEDMeter
=============

RasPiLEDMeter is a project for the [Raspberry Pi](http://raspberrypi.org) intended to provide a LED usage meter to the platform.

You can have more information into “doc” folder.

* [Project's website](https://goddess-gate.com/dc2/index.php/pages/raspiledmeter.en)
* [Youtube video](http://www.youtube.com/watch?v=CoBR-0CVNDo)

Requirements
------------

* First of all : a Raspberry Pi
* LED and resistors to build the LED usage meter. Assembly instructions are available at the following URL: [https://goddess-gate.com/dc2/index.php/pages/raspiledmeter.en](https://goddess-gate.com/dc2/index.php/pages/raspiledmeter.en)
* Python (with Debian / Raspbian : packages "python" and "python-dev")
* RPi.GPIO library (0.3.1a or newer) from [http://pypi.python.org/pypi/RPi.GPIO](http://pypi.python.org/pypi/RPi.GPIO)

To help you with the assembly, you may refer to the following files :

* raspiledmeter.sch : the circuit diagram to open with EAGLE 
  ([http://www.cadsoft.de/freeware.htm](http://www.cadsoft.de/freeware.htm))
* You may need to download and install [Raspberry Part](https://github.com/adafruit/Fritzing-Library/blob/master/AdaFruit.fzbz) for Fritzing
* raspiledmeter.fzz : the assembly mockup to open with Fritzing 
  ([http://fritzing.org/](http://fritzing.org/))


How to use RasPiLEDMeter
------------------------

You'll first have to build the LED usage meter, and plug it  to the Raspberry Pi
  (check [https://goddess-gate.com/dc2/index.php/pages/raspiledmeter.en](https://goddess-gate.com/dc2/index.php/pages/raspiledmeter.en) for information).

Then update "config.py" file to use one of the provided scripts (or write your
  own). If you want to write your own script, you may want to check "dummy.sh"
  file to have explanations on the expected output format.

When you're done, just launch RasPiLEDmeter with `./raspiledmeter.sh start` as
  root user and admire the usage meter working :-) When you want / need to stop
  it, just execute `./raspiledmeter.sh stop` as root user.


