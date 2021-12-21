<?php

if (!function_exists('removeExif')) {
    /**
     * Remove EXIF from a JPEG file.
     * @param string $old Path to original jpeg file (input).
     * @param string $new Path to new jpeg file (output).
     */
    function removeExif($old, $new)
    {
        // Open the input file for binary reading
        $f1 = fopen($old, 'rb');
        // Open the output file for binary writing
        $f2 = fopen($new, 'wb');

        // Find EXIF marker
        while (($s = fread($f1, 2))) {
            $word = unpack('ni', $s)['i'];
            if ($word == 0xFFE1) {
                // Read length (includes the word used for the length)
                $s = fread($f1, 2);
                $len = unpack('ni', $s)['i'];
                // Skip the EXIF info
                fread($f1, $len - 2);
                break;
            } else {
                fwrite($f2, $s, 2);
            }
        }

        // Write the rest of the file
        while (($s = fread($f1, 4096))) {
            fwrite($f2, $s, strlen($s));
        }

        fclose($f1);
        fclose($f2);
    }
}


if (!function_exists('quickSort')) {
    /**
     * quickSort
     * @param $my_array
     * @return array
     */
    function quickSort($my_array)

    {
        $loe = $gt = array();
        if (count($my_array) < 2) {
            return $my_array;
        }
        $pivot_key = key($my_array);
        $pivot = array_shift($my_array);
        foreach ($my_array as $val) {
            if ($val <= $pivot) {
                $loe[] = $val;
            } elseif ($val > $pivot) {
                $gt[] = $val;
            }
        }
        return array_merge(quickSort($loe), array($pivot_key => $pivot), quickSort($gt));
    }
}

if (!function_exists('josephRing')) {

    /**
     * josephRing
     * @param $n
     * @param $m
     * @return mixed
     */
    function josephRing($n, $m)
    {
        $arr = range(1, $n);
        $i = 1;
        while (count($arr) > 1) {
            foreach ($arr as $k => $v) {
                if ($i == $m) {
                    unset($arr[$k]);
                    $i = 1;
                } else {
                    $i += 1;
                }
            }
        }
        return array_values($arr)[0];
    }
}