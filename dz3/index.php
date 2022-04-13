<?php

require('src/functions.php');

$json = task1();
file_put_contents("users.json", $json);
$new_json = file_get_contents("users.json");
echo '<pre>';
   print_r(task2($new_json));
echo '</pre>';
