<?php
try
{
    $dbh = new PDO('mysql:host=localhost;dbname=fasouri', 'root', 'root');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
    
}
	catch(PDOException $e)
{
    echo $e -> getMessage();
    die();
}


?>