<?php
session_start();
session_destroy();
/*include"header.php";
echo '<h3 class="tq">Thank You! </h3><br><br>';
include"footer.php";*/
header("location: index.php");
?>
