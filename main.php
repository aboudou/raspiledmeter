<?php
  include('config.php');
  include('consts.php');

  // Get current pid
  $pid = getmypid();

  // Save current pid for later use
  $fhandle = fopen('/var/run/raspiledmeter.pid', 'c+');
  if (!$fhandle) {
    echo "Unable to write /var/run/raspiledmeter.pid \n";
    exit(-1);
  }
  fwrite($fhandle, $pid);
  fclose($fhandle);

  while (TRUE) {
    // Execute the script and get the output
    $out = array();
    exec($SCRIPT_PATH, $out);

    // Check for output format : number of lines
    if (count($out) != 2) {
      echo "Wrong output format for script $SCRIPT_PATH : two lines are expected\n";
      exit(-1);
    }

    $current_value = $out[0];
    $max_value = $out[1];

    // Check for output format : numeric values
    if (!is_numeric($current_value) || !is_numeric($max_value)) {
      echo "Wrong output format for script $SCRIPT_PATH : numeric values are expected\n";
      exit(-1);
    }

    // Calculate the number of leds to light on
    $led_number = round(($current_value / $max_value) * 8, 0);

    switch ($led_number) {
      case 0 :
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

      case 1:
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

      case 2:
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

      case 3:
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

      case 4:
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

      case 5:
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

      case 6:
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

      case 7:
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "0" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

      case 8:
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

     default:
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_01 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_02 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_03 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_04 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_05 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_06 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_07 . '/value');
         exec('echo "1" > /sys/class/gpio/gpio' . $LED_08 . '/value');
         break;

    }

    // Sleep for the specified time
    usleep($REFRESH_RATE * 1000);
  }
  
?>
