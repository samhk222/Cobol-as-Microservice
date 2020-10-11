<?php
$total = 0;
$handle = @fopen("input.txt", "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
        $total += $buffer;
    }
    fclose($handle);
}
echo "\n\n $total";
