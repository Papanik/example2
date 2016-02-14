<?php
include '../model/connect.php';

include '../model/employee_functions.php';

session_start();

foreach ($_SESSION['employee_id'] as $id )
{

$employee ="SELECT * FROM employee,employee_details,employee_health,employee_relative,employee_section, employee_skills   
WHERE employee.employee_id= '$id' AND employee_details.employee_employee_id= '$id' AND 
employee_health.employee_employee_id= '$id' AND employee_relative.employee_employee_id= '$id'
AND employee_skills.employee_employee_id = '$id' ";

$employee_result=$dbh->query($employee);


foreach($employee_result as $stixeia)
    {
    
     $employee_id=$stixeia['employee_id'];
     $name=$stixeia["name"];
    $surname=$stixeia["surname"];
    $position=$stixeia['position'];
    $position_description=$stixeia["pos_description"];
    $employee_section_id=$stixeia["employee_section"];
    
   //-- employee details -->
        
    $address=$stixeia["address"];
    $town=$stixeia['town'];
    $telephone=$stixeia['telephone'];
    $date_of_birth=$stixeia['date_of_birth'];
    $place_of_birth=$stixeia['place_of_birth'];
    $SIN=$stixeia['SIN'];
    $id_card=$stixeia['id_card'];
    $hire_date=$stixeia['hire_date'];
    $num_of_hires=$stixeia['num_of_hires'];
    $photo=$stixeia['photo'];
    
    //-- employee health -->
    
    $disabilities=$stixeia['disabilities'];
    $skin=$stixeia['skin'];
    $diabetes=$stixeia['diabetes'];
    $breathing=$stixeia['breathing'];
    $epilipsey=$stixeia['epilipsey'];
    
    
       // employee relative -->
           
    $r_surname=$stixeia['R_surname'];  
    $r_name=$stixeia['R_name'];
    $r_home_tel=$stixeia['R_home_tel'];
    $r_work_tel=$stixeia['R_work_tel'];
    $r_mobile_tel=$stixeia['R_mobile_tel'];
           
       //-- employee section -->
           
    $section_name=$stixeia['employee_section_name'];
    
           
       //-- employee skills -->
           
    $greek=$stixeia['greek'];
    $english=$stixeia['english'];
    $french=$stixeia['french'];
    $russian=$stixeia['russian'];
    $other_1_stat=$stixeia['other_1_stat'];
    $other_2_stat=$stixeia['other_2_stat'];
    $other_1_name=$stixeia['other_1_name'];
    $other_2_name=$stixeia['other_2_name'];
    $diplomata=$stixeia['diplomas'];
       
     
    
    }





?>

<HTML>
    
<HEAD>
<META NAME="Author" CONTENT="Crystal Reports 11.5">
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

<link rel="stylesheet" href="employee_report.css">
</HEAD>
<button class="btn" onclick="window.print()" > Print Report </button>
<BODY>

<div id="my_div">


<style>


    div {position:absolute; z-index:25}
    a {text-decoration:none}
    a img {border-style:none; border-width:0}
    .fci4ddtfwhedc-0 {font-size:13pt;color:#6780b8;font-family:Verdana;font-weight:bold;}
    .fci4ddtfwhedc-1 {font-size:11pt;color:#000000;font-family:Arial;font-weight:normal;}
    .fci4ddtfwhedc-2 {font-size:10pt;color:#000000;font-family:Verdana;font-weight:normal;}
    .fci4ddtfwhedc-3 {font-size:10pt;color:#000000;font-family:Arial;font-weight:normal;}
    .fci4ddtfwhedc-4 {font-size:10pt;color:#000000;font-family:Arial;font-weight:bold;}
    .fci4ddtfwhedc-5 {font-size:13pt;color:#000000;font-family:@Gulim;font-weight:bold;}
    .fci4ddtfwhedc-6 {font-size:11pt;color:#000000;font-family:@Gulim;font-weight:bold;}
    .fci4ddtfwhedc-7 {font-size:11pt;color:#000000;font-family:Verdana;font-weight:normal;}
    .fci4ddtfwhedc-8 {font-size:8pt;color:#000000;font-family:Verdana;font-weight:normal;}
    .fci4ddtfwhedc-9 {font-size:9pt;color:#000000;font-family:Arial;font-weight:normal;}
    .adi4ddtfwhedc-0 {border-color:#000000;border-left-width:0;border-right-width:0;border-top-width:0;border-bottom-width:0;}
    .adi4ddtfwhedc-1 {border-color:#000000;border-style:solid;border-width:0px;border-left-style:solid;border-left-width:1;border-right-style:solid;border-right-width:1;border-top-style:solid;border-top-width:1;border-bottom-style:solid;border-bottom-width:1;}
    .adi4ddtfwhedc-2 {border-color:#ffffff;border-style:solid;border-width:0px;border-left-style:solid;border-left-width:1;border-right-style:solid;border-right-width:1;border-top-style:solid;border-top-width:1;border-bottom-style:solid;border-bottom-width:1;}
</style><div style="z-index:9;top:116px;left:744px;width:4px;height:56px;background-color:#5f7ba4;layer-background-color:#5f7ba4;clip:rect(0px,4px,56px,0px);"></div><div style="z-index:9;top:168px;left:8px;width:740px;height:4px;background-color:#5f7ba4;layer-background-color:#5f7ba4;clip:rect(0px,740px,4px,0px);"></div><div style="z-index:10;top:112px;left:4px;width:738px;height:54px;border-color:#5f7ba4;border-style:solid;border-width:1px;background-color:#eeeee0;layer-background-color:#eeeee0;"><table width="730px" height="46px"><tr><td>&nbsp;</td></tr></table></div>

  

<div style="z-index:3;clip:rect(0px,760px,163px,0px);top:0px;left:0px;width:760px;height:163px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:120px;left:4px;width:740px;height:32px;">
    <table width="740px" border="0" cellpadding="0" cellspacing="0">
        <td align="center">
            <span class="fci4ddtfwhedc-0">Report&nbsp;Description:Employee</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:0px;left:240px;width:203px;height:104px;">
    <img src="Fasuri.png" border="0" width="203px" height="104px">
    </div>
    
<div style="z-index:3;clip:rect(0px,760px,4px,0px);top:163px;left:0px;width:760px;height:4px;"></div>
    
<div style="z-index:3;clip:rect(0px,760px,131px,0px);top:167px;left:0px;width:760px;height:131px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:214px;left:310px;width:48px;height:16px;">
    <table width="48px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Name:</span>
        </td>
    </table>
    </div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:234px;left:310px;width:118px;height:16px;">
    <table width="118px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Section&nbsp;Number:
            </span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:258px;left:458px;width:159px;height:21px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $position_description; ?>
    </span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:257px;left:310px;width:143px;height:16px;">
    <table width="143px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Position&nbsp;description:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:279px;left:21px;width:99px;height:16px;">
    <table width="99px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Employee&nbsp;id:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:235px;left:21px;width:64px;height:16px;">
    <table width="64px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Position:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:215px;left:21px;width:75px;height:16px;">
    <table width="75px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Surname:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:178px;left:166px;width:90px;height:17px;">
    <span class="fci4ddtfwhedc-3">&nbsp;
    <?php echo date("h:i:sa"); ?>

    </span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:178px;left:101px;width:66px;height:17px;">
    <span class="fci4ddtfwhedc-3">
        <?php echo date("d/m/Y"); ?>

    </span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:178px;left:21px;width:78px;height:16px;">
    <table width="78px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-3">Print&nbsp;Date:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:279px;left:134px;width:57px;height:16px;">
    <span class="fci4ddtfwhedc-4">
    <?php echo  $employee_id; ?>
    </span>
    </div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:215px;left:458px;width:154px;height:16px;">
    <span class="fci4ddtfwhedc-4">
    <?php echo $name; ?>




    </span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:258px;left:21px;width:113px;height:16px;">
    <table width="113px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Section&nbsp;Name:</span>
        </td>
    </table>
</div>
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:258px;left:134px;width:154px;height:21px;">
    <span class="fci4ddtfwhedc-4"><?php echo $section_name; ?></span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:215px;left:134px;width:170px;height:19px;">
    <span class="fci4ddtfwhedc-4">
    <?php echo $surname; ?>
        
    </span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:237px;left:458px;width:170px;height:15px;">
    <span class="fci4ddtfwhedc-4">
    <?php echo $employee_section_id; ?>
        
    </span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:235px;left:134px;width:110px;height:19px;">
    <span class="fci4ddtfwhedc-2">
    <?php  echo $position; ?>
    </span>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,2px,0px);top:298px;left:0px;width:760px;height:2px;"></div>
<div style="z-index:3;clip:rect(0px,760px,35px,0px);top:299px;left:0px;width:760px;height:35px;"></div>
    
<div class="adi4ddtfwhedc-1" nowrap="true" style="z-index:25;top:301px;left:4px;width:741px;height:29px;">
    <table width="731px" border="0" cellpadding="0" cellspacing="0">
        <td align="center">
            <span class="fci4ddtfwhedc-5">General&nbsp;Information</span>
        </td>
    </table>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,24px,0px);top:334px;left:0px;width:760px;height:24px;"></div>
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:334px;left:21px;width:64px;height:16px;">
    <table width="64px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Address:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:334px;left:89px;width:539px;height:24px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $address; ?>
        
    </span>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,22px,0px);top:358px;left:0px;width:760px;height:22px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:358px;left:21px;width:51px;height:16px;">
    <table width="51px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Town:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:358px;left:418px;width:141px;height:16px;">
    <table width="141px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Telephone&nbsp;Number:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:358px;left:78px;width:125px;height:15px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $town; ?>
    </span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:358px;left:567px;width:135px;height:18px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $telephone; ?>
    </span>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,24px,0px);top:380px;left:0px;width:760px;height:24px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:380px;left:21px;width:99px;height:16px;">
    <table width="99px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Date&nbsp;of&nbsp;birth:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:380px;left:418px;width:102px;height:16px;">
    <table width="102px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Place&nbsp;of&nbsp;birth:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:380px;left:130px;width:89px;height:18px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $date_of_birth; ?>
    </span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:380px;left:528px;width:136px;height:15px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $place_of_birth; ?>
    </span>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,24px,0px);top:404px;left:0px;width:760px;height:24px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:404px;left:21px;width:197px;height:16px;">
    <table width="197px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Spcial&nbsp;Insurance&nbsp;Number&nbsp;:</span>
    </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:404px;left:418px;width:126px;height:16px;">
    <table width="126px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">I.D&nbsp;card&nbsp;number:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:404px;left:212px;width:99px;height:18px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $SIN; ?>
    </span>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:404px;left:545px;width:100px;height:18px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $id_card; ?>
    </span>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,23px,0px);top:428px;left:0px;width:760px;height:23px;"></div>
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:428px;left:21px;width:72px;height:16px;">
    <table width="72px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Hire&nbsp;date:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:428px;left:102px;width:117px;height:18px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $hire_date; ?>
    </span></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:428px;left:418px;width:131px;height:16px;">
    <table width="131px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Number&nbsp;of&nbsp;hires:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:428px;left:545px;width:80px;height:18px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $num_of_hires; ?>
    </span>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,6px,0px);top:451px;left:0px;width:760px;height:6px;"></div>
<div style="z-index:3;clip:rect(0px,760px,39px,0px);top:457px;left:0px;width:760px;height:39px;"></div>
    
<div class="adi4ddtfwhedc-1" nowrap="true" style="z-index:25;top:462px;left:10px;width:741px;height:29px;">
    <table width="731px" border="0" cellpadding="0" cellspacing="0">
        <td align="center">
            <span class="fci4ddtfwhedc-5">Contact&nbsp;person&nbsp;in&nbsp;case&nbsp;of&nbsp;emergency</span>
        </td>
    </table>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,24px,0px);top:495px;left:0px;width:760px;height:24px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:495px;left:485px;width:200px;height:24px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo  $r_name; ?>
    </span></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:495px;left:418px;width:55px;height:16px;">
    <table width="55px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Name:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:495px;left:106px;width:117px;height:16px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo  $r_surname; ?>
    </span></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:495px;left:21px;width:85px;height:16px;">
    <table width="85px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Surname:</span>
        </td>
    </table>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,24px,0px);top:519px;left:0px;width:760px;height:24px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:519px;left:564px;width:121px;height:18px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $r_home_tel; ?>
    </span></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:519px;left:418px;width:131px;height:16px;">
    <table width="131px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Home&nbsp;Tel.number:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:519px;left:164px;width:143px;height:18px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo  $r_work_tel; ?>
    </span></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:519px;left:22px;width:138px;height:16px;">
    <table width="138px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Work&nbsp;Tel.number:</span>
        </td>
    </table>

    </div>
    
<div style="z-index:3;clip:rect(0px,760px,20px,0px);top:543px;left:0px;width:760px;height:20px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:543px;left:166px;width:146px;height:18px;">
    <span class="fci4ddtfwhedc-2">
    <?php echo $r_mobile_tel; ?>
    </span></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:543px;left:21px;width:139px;height:16px;">
    <table width="139px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Mobile&nbsp;Tel.number:</span>
        </td>
    </table>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,9px,0px);top:563px;left:0px;width:760px;height:9px;"></div>
<div style="z-index:3;clip:rect(0px,760px,40px,0px);top:572px;left:0px;width:760px;height:40px;"></div>
    
<div class="adi4ddtfwhedc-1" nowrap="true" style="z-index:25;top:577px;left:9px;width:743px;height:29px;">
    <table width="733px" border="0" cellpadding="0" cellspacing="0">
        <td align="center">
            <span class="fci4ddtfwhedc-5">Health&nbsp;Information</span>
        </td>
    </table>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,16px,0px);top:612px;left:0px;width:760px;height:16px;"></div>
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:612px;left:21px;width:312px;height:16px;">
    <table width="312px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-6">Health&nbsp;problems&nbsp;or&nbsp;disabilities:</span>
        </td>
    </table>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,5px,0px);top:628px;left:0px;width:760px;height:5px;"></div>
<div style="z-index:3;clip:rect(0px,760px,18px,0px);top:633px;left:0px;width:760px;height:18px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:633px;left:18px;width:88px;height:16px;">
    <table width="88px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Disabilities:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:633px;left:110px;width:170px;height:15px;">
    <span class="fci4ddtfwhedc-3">
        
<?php

if( $disabilities == 1)
{
echo  'Yes'; 
}

else {
    echo 'No';
}

        ?>
        
    </span></div>
    
<div style="z-index:3;clip:rect(0px,760px,29px,0px);top:651px;left:0px;width:760px;height:29px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:656px;left:175px;width:77px;height:24px;">
    <table width="77px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-7">Diabetes:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:658px;left:18px;width:35px;height:15px;">
    <table width="35px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Skin:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:656px;left:366px;width:90px;height:24px;">
    <table width="90px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-7">Breathing:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:655px;left:565px;width:71px;height:24px;">
    <table width="71px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-7">Epilipsy:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:659px;left:64px;width:56px;height:15px;">
    <span class="fci4ddtfwhedc-3">
    <?php

if( $skin == 1)
{
echo  'Yes'; 
}

else {
    echo 'No';
}

 ?>
    </span></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:659px;left:267px;width:57px;height:15px;">
    <span class="fci4ddtfwhedc-3">
    <?php

if( $diabetes == 1)
{
echo  'Yes'; 
}

else {
    echo 'No';
}

        ?>
    </span></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:659px;left:471px;width:57px;height:15px;">
    <span class="fci4ddtfwhedc-3">
    <?php

if( $breathing == 1)
{
echo  'Yes'; 
}

else {
    echo 'No';
}

        ?>
    </span></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:659px;left:645px;width:70px;height:15px;">
    <span class="fci4ddtfwhedc-3">
    <?php

if( $epilipsey == 1)
{
echo  'Yes'; 
}

else {
    echo 'No';
}

        ?>
    </span></div>
    
<div style="z-index:3;clip:rect(0px,760px,11px,0px);top:680px;left:0px;width:760px;height:11px;"></div>
<div style="z-index:3;clip:rect(0px,760px,42px,0px);top:690px;left:0px;width:760px;height:42px;"></div>
    
<div class="adi4ddtfwhedc-1" nowrap="true" style="z-index:25;top:696px;left:10px;width:741px;height:29px;">
    <table width="731px" border="0" cellpadding="0" cellspacing="0">
        <td align="center">
            <span class="fci4ddtfwhedc-5">Foreign&nbsp;Languages</span>
        </td>
    </table>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,2px,0px);top:732px;left:0px;width:760px;height:2px;"></div>
<div style="z-index:3;clip:rect(0px,760px,21px,0px);top:734px;left:0px;width:760px;height:21px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:734px;left:18px;width:54px;height:16px;">
    <table width="54px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Greek:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:734px;left:155px;width:64px;height:15px;">
    <span class="fci4ddtfwhedc-3">
        <?php

if( $greek == 4)
{
echo  'Very Good'; 
}

else if( $greek == 3)
{
    echo 'Good';
}
else if( $greek == 2)
{
    echo 'Fair';
}
else if( $greek == 1)
{
    echo 'None';
}
        ?>
        
    </span>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,20px,0px);top:755px;left:0px;width:760px;height:20px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:755px;left:18px;width:56px;height:16px;">
    <table width="56px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">English:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:755px;left:155px;width:81px;height:15px;">
    <span class="fci4ddtfwhedc-3">
            <?php

if( $english == 4)
{
echo  'Very Good'; 
}

else if( $english == 3)
{
    echo 'Good';
}
else if( $english == 2)
{
    echo 'Fair';
}
else if( $english == 1)
{
    echo 'None';
}
        ?>
        
    </span></div>
    
<div style="z-index:3;clip:rect(0px,760px,18px,0px);top:775px;left:0px;width:760px;height:18px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:775px;left:18px;width:59px;height:16px;">
    <table width="59px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">French:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:775px;left:155px;width:81px;height:15px;">
    <span class="fci4ddtfwhedc-3">

         <?php
    if( $french == 4)
{
echo  'Very Good'; 
}

else if( $french  == 3)
{
    echo 'Good';
}
else if( $french  == 2)
{
    echo 'Fair';
}
else if( $french == 1)
{
    echo 'None';
}
        ?>
    </span>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,18px,0px);top:793px;left:0px;width:760px;height:18px;"></div>
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:793px;left:18px;width:51px;height:16px;">
    <table width="51px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Russian:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:793px;left:155px;width:81px;height:15px;">
    <span class="fci4ddtfwhedc-3">
             <?php
    if( $russian == 4)
{
echo  'Very Good'; 
}

else if( $russian   == 3)
{
    echo 'Good';
}
else if( $russian   == 2)
{
    echo 'Fair';
}
else if( $russian == 1)
{
    echo 'None';
}
        ?>
    </span></div>
    
<div style="z-index:3;clip:rect(0px,760px,27px,0px);top:811px;left:0px;width:760px;height:27px;"></div>
    
<div class="adi4ddtfwhedc-2" nowrap="true" style="z-index:25;top:811px;left:13px;width:139px;height:27px;">
    <table width="129px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-2">Other&nbsp;language:</span>
        </td>
    </table>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,27px,0px);top:837px;left:0px;width:760px;height:27px;"></div>
    
<div class="adi4ddtfwhedc-2" nowrap="true" style="z-index:25;top:837px;left:16px;width:124px;height:27px;">
    <table width="113px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-2">
            <?php echo $other_1_name; ?>
            </span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:839px;left:155px;width:81px;height:24px;">
    <span class="fci4ddtfwhedc-3">
                <?php
    if( $other_1_stat == 4)
{
echo  'Very Good'; 
}

else if( $other_1_stat   == 3)
{
    echo 'Good';
}
else if( $other_1_stat   == 2)
{
    echo 'Fair';
}
else if( $other_1_stat == 1)
{
    echo 'None';
}
        ?>
    
    </span></div>
  

    
   
<div class="adi4dfcdbqohc-0" nowrap="true" style="z-index:25;top:854px;left:155px;width:81px;height:24px;">
    <span class="fci4dfcdbqohc-2">
    <?php
    if( $other_2_stat == 4)
{
echo  'Very Good'; 
}

else if( $other_2_stat   == 3)
{
    echo 'Good';
}
else if( $other_2_stat   == 2)
{
    echo 'Fair';
}
else if( $other_2_stat == 1)
{
    echo 'None';
}
        ?>
    
    </span></div>
    
    
<div class="adi4dfcdbqohc-0" nowrap="true" style="z-index:25;top:854px;left:16px;width:124px;height:27px;">

    <span class="fci4dfcdbqohc-1">

    <?php echo $other_2_name; ?>
    </span>
</div>
    
<div style="z-index:3;clip:rect(0px,760px,6px,0px);top:902px;left:0px;width:760px;height:6px;"></div>

<div style="z-index:3;clip:rect(0px,760px,59px,0px);top:896px;left:0px;width:760px;height:59px;"></div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:890px;left:16px;width:124px;height:27px;">
    <table width="85px" border="0" cellpadding="0" cellspacing="0">
        <td align="left">
            <span class="fci4ddtfwhedc-1">Diplomas:</span>
        </td>
    </table>
</div>
    
<div class="adi4ddtfwhedc-0" nowrap="true" style="z-index:25;top:890px;left:155px;width:646px;height:48px;">
    <span class="fci4ddtfwhedc-8">
    <?php echo $diplomata; ?>
    </span></div>
    
    <pre>
        































































    </pre>
    

    
   
    </BODY>
</HTML>

<?php


}
?>
