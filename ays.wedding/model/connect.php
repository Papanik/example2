<?php
try
{
    $dbh = new PDO('mysql:host=localhost;dbname=wedding', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /*if ($dbh) {
    	echo "string";
    }*/
		
    
}
	catch(PDOException $e)
{
    echo $e -> getMessage();
    die();
}


?>