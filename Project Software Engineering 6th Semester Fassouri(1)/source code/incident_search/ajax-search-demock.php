<?Php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************
//error_reporting(E_ERROR | E_PARSE | E_CORE_ERROR);
require "config.php";  // database connection
//////////
//////////////////////////////// Main Code sarts /////////////////////////////////////////////


$in=$_GET['txt'];
if(!ctype_alnum($in)){
echo "Data Error";
exit;
}

$msg="";
$msg="<select Incidents_ID=s1 size='15'>";
if(strlen($in)>0 and strlen($in) <20 )
{
$sql="select * from incidents where Title like '%$in%'";
foreach ($dbo->query($sql) as $nt) 
{

    $name=$nt['Title'];
    $id_incident=$nt['Incidents_ID'];
    $date=$nt['Date_happened'];

 
$msg .="<option value=$id_incident>$name  $date </option>";
//$msg .="<option value='$nt[name]'>";

}
}
$msg .='</select>';
echo $msg;
?>