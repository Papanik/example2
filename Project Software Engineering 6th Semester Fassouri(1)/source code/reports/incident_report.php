<?php
include '../model/connect.php';

include '../model/incident_functions.php';

session_start();
foreach ($_SESSION['Incidents_ID'] as $id )
{
    $incidents="SELECT * 
    FROM incidents,section   
    WHERE Incidents_ID='$id' ";

    $incidents_result=$dbh->query($incidents);


    foreach($incidents_result as $stixeia)
    {
        
         $Incidents_ID=$stixeia['Incidents_ID'];
         $Title=$stixeia['Title'];
        $Date_happened=$stixeia['Date_happened'];
        $Description=$stixeia['Description'];
        $Section_ID=$stixeia['Section_ID'];
        
        
       //-- section details -->
            
        $name=$stixeia['section_name'];
        
     
         
        
    }

?>

<HTML>
<HEAD>
<META NAME="Author" CONTENT="Crystal Reports 11.5">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<link rel="stylesheet" href="incidents.css">
</HEAD>
<button class="btn" onclick="window.print()" > Print Report </button>
<BODY>
<div id="my_div">


<style>    div {position:absolute; z-index:25}
    a {text-decoration:none}
    a img {border-style:none; border-width:0}
    .fci4dgajr4u8g-0 {font-size:14pt;color:#ffffff;font-family:Verdana;font-weight:bold;font-style:italic;}
    .fci4dgajr4u8g-1 {font-size:13pt;color:#ffffff;font-family:Arial;font-weight:bold;font-style:italic;}
    .fci4dgajr4u8g-2 {font-size:11pt;color:#000000;font-family:Arial;font-weight:normal;}
    .fci4dgajr4u8g-3 {font-size:10pt;color:#000000;font-family:Verdana;font-weight:normal;}
    .fci4dgajr4u8g-4 {font-size:10pt;color:#000000;font-family:Arial;font-weight:normal;}
    .fci4dgajr4u8g-5 {font-size:10pt;color:#000000;font-family:Arial;font-weight:bold;}
    .fci4dgajr4u8g-6 {font-size:13pt;color:#000000;font-family:Arial;font-weight:bold;}
    .fci4dgajr4u8g-7 {font-size:9pt;color:#000000;font-family:Arial;font-weight:normal;}
    .adi4dgajr4u8g-0 {background-color:#800000;layer-background-color:#800000;border-color:#000000;border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-style:outset;border-bottom-width:0;}
    .adi4dgajr4u8g-1 {background-color:#800000;layer-background-color:#800000;border-color:#ffffff;border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;}
    .adi4dgajr4u8g-2 {border-color:#000000;border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;}
</style>
    <div style="z-index:10;top:16px;left:0px;width:750px;height:166px;border-color:#ffffff;border-style:solid;border-width:1px;background-color:#ffffff;layer-background-color:#ffffff;"><table width="742px" height="158px">
        <tr>
            <td>&nbsp;
            </td>
        </tr>
    </table>
</div>
    
<div style="z-index:10;top:184px;left:0px;width:748px;height:796px;border-color:#800000;border-style:solid;border-width:2px;"><table width="739px" height="787px"><tr><td>&nbsp;</td></tr></table></div>
<div style="z-index:10;top:92px;left:0px;width:748px;height:84px;border-color:#ffffff;border-style:solid;border-width:2px;"><table width="739px" height="75px"><tr><td>&nbsp;</td></tr></table></div>
<div style="z-index:15;top:285px;left:600px;border-color:#000000;border-style:solid;border-width:0px;border-top-width:1px;width:136px;"></div>
<div style="z-index:15;top:308px;left:176px;border-color:#000000;border-style:solid;border-width:0px;border-top-width:1px;width:560px;"></div>
<div style="z-index:15;top:327px;left:80px;border-color:#000000;border-style:solid;border-width:0px;border-top-width:1px;width:656px;"></div>
<div style="z-index:15;top:347px;left:136px;border-color:#000000;border-style:solid;border-width:0px;border-top-width:1px;width:600px;"></div>
<div style="z-index:15;top:367px;left:120px;border-color:#000000;border-style:solid;border-width:0px;border-top-width:1px;width:384px;"></div>
<div style="z-index:15;top:367px;left:592px;border-color:#000000;border-style:solid;border-width:0px;border-top-width:1px;width:144px;"></div>
<div style="z-index:15;top:384px;left:0px;border-color:#800000;border-style:solid;border-width:0px;border-top-width:1px;width:751px;"></div>

<div style="z-index:15;top:588px;left:0px;border-color:#800000;border-style:solid;border-width:0px;border-top-width:1px;width:750px;"></div>
<div style="z-index:15;top:741px;left:0px;border-color:#800000;border-style:solid;border-width:0px;border-top-width:1px;width:750px;"></div>
<div style="z-index:15;top:788px;left:16px;border-color:#000000;border-style:solid;border-width:0px;border-top-width:1px;width:720px;"></div>
<div style="z-index:15;top:812px;left:16px;border-color:#000000;border-style:solid;border-width:0px;border-top-width:1px;width:720px;"></div>
<div style="z-index:15;top:836px;left:16px;border-color:#000000;border-style:solid;border-width:0px;border-top-width:1px;width:720px;"></div>
<div style="z-index:15;top:857px;left:0px;border-color:#800000;border-style:solid;border-width:0px;border-top-width:1px;width:752px;"></div>
<div style="z-index:3;clip:rect(0px,760px,240px,0px);top:0px;left:0px;width:760px;height:240px;"></div>
    
<div class="adi4dgajr4u8g-0" nowrap="true" style="z-index:25;top:112px;left:0px;width:753px;height:57px;">
    <table width="752px" border="0" cellpadding="0" cellspacing="0">
        <td align="center">
            <span class="fci4dgajr4u8g-0">Report&nbsp;Description:&nbsp;Incident</span>
        </td>
    </table>
</div>
    
<div style="z-index:5;top:116px;left:4px;width:753px;height:57px;background-color:#000000;layer-background-color:#000000;">
</div><div class="adi4dgajr4u8g-1" nowrap="true" style="z-index:25;top:186px;left:0px;width:752px;height:40px;">
    <table width="752px" border="0" cellpadding="0" cellspacing="0">
        <td align="center">
            <span class="fci4dgajr4u8g-1">To&nbsp;be&nbsp;completed&nbsp;by&nbsp;staff&nbsp;within&nbsp;12&nbsp;hours&nbsp;of&nbsp;incident/accident</span>
        </td>
    </table>
</div>
    
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:0px;left:270px;width:186px;height:104px;"><img src="Fasuri.png" border="0" width="186px" height="104px"></div>
<div style="z-index:3;clip:rect(0px,760px,14px,0px);top:240px;left:0px;width:760px;height:14px;"></div>
<div style="z-index:3;clip:rect(0px,760px,15px,0px);top:254px;left:0px;width:760px;height:15px;"></div>
<div style="z-index:3;clip:rect(0px,760px,23px,0px);top:269px;left:0px;width:760px;height:23px;"></div>
    
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:269px;left:16px;width:123px;height:16px;">
    <table width="123px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Date&nbsp;Happened:</span>
        </td>
    </table>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:269px;left:151px;width:161px;height:16px;">
    <span class="fci4dgajr4u8g-3">
    
    <?php echo $Date_happened; ?>
    
    </span>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:269px;left:504px;width:96px;height:19px;">
    <table width="96px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-4">Incident&nbsp;Time:</span>
        </td>
    </table>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,19px,0px);top:292px;left:0px;width:760px;height:19px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:292px;left:16px;width:160px;height:19px;">
    <table width="160px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Injured&nbsp;Person&nbsp;Name:</span>
        </td>
    </table>
</div>
<div style="z-index:3;clip:rect(0px,760px,20px,0px);top:311px;left:0px;width:760px;height:20px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:311px;left:16px;width:64px;height:19px;">
    <table width="64px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Address:</span>
        </td>
    </table>
</div>
<div style="z-index:3;clip:rect(0px,760px,20px,0px);top:331px;left:0px;width:760px;height:20px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:331px;left:16px;width:120px;height:19px;">
    <table width="120px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Phone&nbsp;Numbers:</span>
        </td>
</table>
</div>
<div style="z-index:3;clip:rect(0px,760px,27px,0px);top:351px;left:0px;width:760px;height:27px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:351px;left:16px;width:104px;height:15px;">
    <table width="104px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Male/Female:</span>
        </td>
    </table>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:351px;left:504px;width:88px;height:19px;">
    <table width="88px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-4">Date&nbsp;of&nbsp;Birth:</span>
        </td>
    </table>

    </div>
<div style="z-index:3;clip:rect(0px,760px,8px,0px);top:378px;left:0px;width:760px;height:8px;"></div>
<div style="z-index:3;clip:rect(0px,760px,15px,0px);top:386px;left:0px;width:760px;height:15px;"></div>
<div style="z-index:3;clip:rect(0px,760px,32px,0px);top:401px;left:0px;width:760px;height:32px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:401px;left:16px;width:40px;height:15px;">
    <table width="40px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Title:</span>
        </td>
    </table>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:401px;left:56px;width:223px;height:32px;">
    <span class="fci4dgajr4u8g-3">
    
    <?php echo $Title; ?>
        
    </span></div>
<div style="z-index:3;clip:rect(0px,760px,151px,0px);top:433px;left:0px;width:760px;height:151px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:433px;left:16px;width:92px;height:23px;">
    <table width="92px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Description:</span>
        </td>
    </table>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:513px;left:151px;width:110px;height:18px;">
    <span class="fci4dgajr4u8g-3">
    <?php echo $Incidents_ID; ?>
    
    </span></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:513px;left:16px;width:128px;height:16px;">
    <table width="128px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Incident&nbsp;Number:</span>
        </td>
    </table>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:537px;left:16px;width:123px;height:15px;">
    <table width="123px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Section&nbsp;Name:</span>
        </td>
    </table>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:537px;left:151px;width:170px;height:24px;">
    <span class="fci4dgajr4u8g-5">
    <?php echo  $name; ?> 
    </span></div>
    
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:457px;left:16px;width:728px;height:56px;">
    <span class="fci4dgajr4u8g-4">
    
    <?php echo $Description; ?>
    
    </span>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:561px;left:16px;width:123px;height:15px;">
    <table width="123px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">
            Section ID:
            </span>
        </td>
    </table>
</div>
  <div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:561px;left:151px;width:170px;height:24px;">
    <span class="fci4dgajr4u8g-5">
    <?php echo   $Section_ID; ?> 
    </span></div>  
    
<div style="z-index:3;clip:rect(0px,760px,11px,0px);top:584px;left:0px;width:760px;height:11px;"></div>
<div style="z-index:3;clip:rect(0px,760px,6px,0px);top:594px;left:0px;width:760px;height:6px;"></div>
<div style="z-index:3;clip:rect(0px,760px,19px,0px);top:600px;left:0px;width:760px;height:19px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:600px;left:16px;width:292px;height:19px;">
    <table width="292px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Does&nbsp;Injury&nbsp;require&nbsp;Hospital/Physician?:</span>
        </td>
    </table>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:600px;left:312px;width:176px;height:19px;">
    <table width="176px" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="left">
                <span class="fci4dgajr4u8g-2">Yes:_________________</span></td></tr></table></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:600px;left:488px;width:248px;height:19px;">
    <table width="248px" border="0" cellpadding="0" cellspacing="0">
        <tr><td align="left">
            <span class="fci4dgajr4u8g-2">No:____________________________</span>
            </td>
        </tr>
    </table>
</div>
<div style="z-index:3;clip:rect(0px,760px,5px,0px);top:619px;left:0px;width:760px;height:5px;"></div>
<div style="z-index:3;clip:rect(0px,760px,19px,0px);top:624px;left:0px;width:760px;height:19px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:624px;left:16px;width:720px;height:19px;">
    <table width="720px" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="left">
                <span class="fci4dgajr4u8g-2">Hospital&nbsp;Name:_____________________________________________________________________________</span>
            </td>
        </tr>
    </table>
</div>
<div style="z-index:3;clip:rect(0px,760px,6px,0px);top:643px;left:0px;width:760px;height:6px;"></div>
<div style="z-index:3;clip:rect(0px,760px,19px,0px);top:649px;left:0px;width:760px;height:19px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:649px;left:16px;width:720px;height:19px;">
    <table width="720px" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="left">
                <span class="fci4dgajr4u8g-2">Address:__________________________________________________________________________________</span>
            </td>
        </tr>
    </table>
</div>
<div style="z-index:3;clip:rect(0px,760px,6px,0px);top:668px;left:0px;width:760px;height:6px;"></div>
<div style="z-index:3;clip:rect(0px,760px,19px,0px);top:674px;left:0px;width:760px;height:19px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:674px;left:16px;width:720px;height:19px;">
    <table width="720px" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="left">
                <span class="fci4dgajr4u8g-2">Hospital&nbsp;Phone&nbsp;Numbers:_____________________________________________________________________</span>
            </td>
        </tr>
    </table>
</div>
<div style="z-index:3;clip:rect(0px,760px,14px,0px);top:693px;left:0px;width:760px;height:14px;"></div>
<div style="z-index:3;clip:rect(0px,760px,19px,0px);top:706px;left:0px;width:760px;height:19px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:706px;left:18px;width:718px;height:19px;">
    <table width="718px" border="0" cellpadding="0" cellspacing="0">
        <tr><td align="left">
            <span class="fci4dgajr4u8g-2">Injured&nbsp;person&nbsp;/&nbsp;Party&nbsp;Signature&nbsp;/&nbsp;Date:________________________/__________________________________</span>
            </td>
        </tr>
    </table>
</div>
<div style="z-index:3;clip:rect(0px,760px,8px,0px);top:725px;left:0px;width:760px;height:8px;"></div>
<div style="z-index:3;clip:rect(0px,760px,15px,0px);top:733px;left:0px;width:760px;height:15px;"></div>
<div style="z-index:3;clip:rect(0px,760px,101px,0px);top:748px;left:0px;width:760px;height:101px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:748px;left:16px;width:313px;height:24px;">
    <table width="313px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-6">Importan&nbsp;Notes&nbsp;and&nbsp;Instructions:</span>
        </td>
    </table>
</div>
<div style="z-index:3;clip:rect(0px,760px,35px,0px);top:849px;left:0px;width:760px;height:35px;"></div>
<div style="z-index:3;clip:rect(0px,760px,15px,0px);top:884px;left:0px;width:760px;height:15px;"></div>
<div style="z-index:3;clip:rect(0px,760px,32px,0px);top:899px;left:0px;width:760px;height:32px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:899px;left:496px;width:78px;height:16px;">
    <table width="78px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4dgajr4u8g-2">Print&nbsp;Date:</span>
        </td>
    </table>
</div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:899px;left:648px;width:87px;height:17px;">
    <span class="fci4dgajr4u8g-4">
    <?php echo date("h:i:sa"); ?>
    </span></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:899px;left:577px;width:66px;height:17px;">
    <span class="fci4dgajr4u8g-4">
        <?php echo date("d/m/Y"); ?>
    </span></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:899px;left:16px;width:472px;height:19px;">
    <table width="472px" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="left">
                <span class="fci4dgajr4u8g-2">Prepared&nbsp;By:___________________________________________</span>
            </td>
        </tr>
    </table>
</div>
<div style="z-index:3;clip:rect(0px,760px,15px,0px);top:931px;left:0px;width:760px;height:15px;"></div>
<div style="z-index:3;clip:rect(0px,760px,14px,0px);top:945px;left:0px;width:760px;height:14px;"></div>
<div style="z-index:3;clip:rect(0px,760px,16px,0px);top:984px;left:0px;width:760px;height:16px;"></div>
<div class="adi4dgajr4u8g-2" nowrap="true" style="z-index:25;top:984px;left:0px;width:760px;height:16px;text-align:center;">
 

 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php } 

?>
</BODY>
</HTML>