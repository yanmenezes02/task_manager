<pre><?php

use Src\Core\Connect;

require_once("api/vendor/autoload.php");

$conf = Connect::getInstace();

print_r($conf);