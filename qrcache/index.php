<?php

include "../include/phpqrcode.php";

QRcode::png($_GET["id"], false, "H", 10, 2);

?>