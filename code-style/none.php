<?php
/**
 * Without code style
 */
$max=15;
FOR($i=1; $i<= $max;$i++)
{
  echo $i;
    IF ($i % 3 ===0 && $i%5 === 0)
    {
      echo " divided by three and five";
    } elseif ($i % 3 ===0)
        echo " divided by three";
    elseif ($i%5 === 0) echo' divided by five'; ECHO '<br/>';
}
