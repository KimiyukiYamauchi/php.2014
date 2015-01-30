<?php
$now = time();
$thu = strtotime('Thursday', $now);
$later = strtotime('next thursday', $now);
$before = strtotime('last thursday', $now);
print strftime("now: %c <br />", $now);
print strftime("thu: %c <br />", $thu);
print strftime("later: %c <br />", $later);
print strftime("before: %c <br />", $before);
