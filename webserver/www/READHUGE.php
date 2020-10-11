<?php
$time_start = microtime(true);
$total = 0;
$handle = @fopen("input.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $total += $buffer;
    }
    fclose($handle);
}
$time_end = microtime(true);

echo "\n\n $total";
