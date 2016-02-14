<?php
$data = $_POST['sel'];
$a = file_put_contents("test.json", $data);
echo $a;
?>