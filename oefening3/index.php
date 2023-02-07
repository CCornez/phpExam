<?php

// create function getDiamond with default value 5;
function getDiamond($n = 5)
{
    /**
     * checks
     */

    // check if parameter is a number
    if (!is_numeric($n)) {
        return 'not a number ;)';
    }
    // check if parameter is smaller or equal to 3 and if it's a decimal
    // if one of the above is true, take the default value as parameter
    if ($n <= 3 || $n != floor($n)) {
        $n = 5;
    }
    // check if parameter is even, if so add 1 to make it uneven
    if (!($n % 2)) {
        $n++;
    }

    /**
     * for loop
     */

    // create variable str and strEnd to concatenate later
    $str = '';
    $strEnd = '';

    // start at 1 and end at $n with steps of 2
    for ($i = 1; $i <= $n; $i += 2) {

        // at longest line / end of the loop, add x between stars
        if ($i == $n) {
            $stars = str_repeat('* ', floor($i / 2));

            //add to the string: space + half the stars + x + half the stars + line break
            $str .= '&nbsp;' . $stars . 'x ' . $stars . '</br>';
        } else {
            // create variables: 
            // half the needed lines => (max number - number of iterations)/2
            $lines = str_repeat('_ ', (($n - $i) / 2));
            // fill the middle with stars => number of iterations
            $stars = str_repeat('* ', $i);
            // make a row: space + half the lines + the stars + half the lines + line break
            $row = '&nbsp;' . $lines . $stars . $lines . '</br>';

            // add row to string: at the end of $str and at the beginning of $strEnd
            // so $str is from small to big and $strEnd is from big to small
            $str .= $row;
            $strEnd = $row . $strEnd;
        }
    }
    // return the $str concatenated with $strEnd
    // it goes from small to big ($str) to small ($strEnd)
    return $str . $strEnd;
}

echo (getDiamond('12'));
echo (getDiamond(11));
echo (getDiamond(11.32));
echo (getDiamond('number'));
