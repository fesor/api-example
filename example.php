<?php

$i = 0;
for($j = 0;$j < 100; $j++) {
    if ($j % 10 === 0) {
        $i = $i + $j;
    }
}

echo $i;