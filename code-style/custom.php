<?php
/**
 * Custom code style
 */
$max=15;
FOR($i=1;$i<=$max;$i++):
echo$i;
  IF($i%3===0 && $i%5===0) echo' divided by three and five';
  ELSE IF       ($i%3===0) echo' divided by three';
  ELSE IF       ($i%5===0) echo' divided by five';
echo'<br/>';
ENDFOR;
