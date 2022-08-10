<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="sky-admin/w3.css">
<link rel="stylesheet" href="sky-admin/sky.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="sky-admin/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" href="myfiles/favicon-32x32.png" sizes="32x32" />

<head>
<?php if (file_exists("myfiles/settings.php")){include "myfiles/settings.php"; include "sky-admin/ismobile.php";}else{header( "Location: sky-admin/index.php" );} ?>
<title><?php echo $title ?></title>
<meta name="description" content="<?php echo $subtitle ?>">
<meta name="keywords" content="<?php echo $keywords ?>">
<meta name="author" content="<?php echo $author ?>">
</head>

<?php

 $fall = 0;
 if ($_REQUEST['name'] == ""){$fall++;}
 if ($_REQUEST['address'] == ""){$fall++;}
 if ($_REQUEST['pos'] == ""){$fall++;}
 if ($_REQUEST['complete_name'] == ""){$fall++;}
 if (($_REQUEST['h_phone'] == "") && ($_REQUEST['w_phone'] == "")){$fall++;}
 if (($_REQUEST['start'] == "") && ($_REQUEST['pay'] == "")){$fall++;}
 if (($_REQUEST['f_time'] == "") && ($_REQUEST['p_time'] == "")){$fall++;}
 if (($_REQUEST['regular'] == "") && ($_REQUEST['temporary'] == "")){$fall++;}
 if (($_REQUEST['auty'] == "") && ($_REQUEST['autn'] == "")){$fall++;}
 if (($_REQUEST['fely'] == "") && ($_REQUEST['feln'] == "")){$fall++;}
 if (($_REQUEST['funy'] == "") && ($_REQUEST['funn'] == "")){$fall++;}
 if (($_REQUEST['funy'] == "") && ($_REQUEST['funn'] == "")){$fall++;}
 if (($_REQUEST['pery'] == "") && ($_REQUEST['pern'] == "")){$fall++;}
 if ($fall > 0){echo "Application Error, please try again..."; exit;}

  mail($paypal, "Application", 
 "PERSONAL DATA

  Name (last, first, middle): ".$_REQUEST['name']."
  Street Address and/or Mailing Address: ".$_REQUEST['address']."
  Home Telephone Number: ".$_REQUEST['h_phone']."
  Work Telephone Number: ".$_REQUEST['w_phone']."
  Date you can start work: ".$_REQUEST['start']."
  Salary Desired: ".$_REQUEST['pay']."
  Do you have a High School Diploma or GED?: ".$_REQUEST['gedy']." ".$_REQUEST['gedn']."

  POSITION INFORMATION

  Position applying for: ".$_REQUEST['pos']."
  Hours: Full Time: ".$_REQUEST['f_time']." Part Time:".$_REQUEST['p_time']."
  Shifts: 1st: ".$_REQUEST['1st']." 2nd: ".$_REQUEST['2nd']." 3rd: ".$_REQUEST['3rd']." 4th: ".$_REQUEST['4th']." 5th: ".$_REQUEST['5th']."
  Status: Regular: ".$_REQUEST['regular']." Temp: ".$_REQUEST['temporary']."
  Are you authorized to work in the U.S. on an unrestricted basis?: ".$_REQUEST['auty']." ".$_REQUEST['autn']."
  Have you ever been convicted of a felony?: ".$_REQUEST['fely']." ".$_REQUEST['feln']."
  Have you been told the essential functions of the job or have you been viewed a copy of the job description listing the essential functions of the job?: ".$_REQUEST['funy']." ".$_REQUEST['funn']."
  Can you perform these essential functions of the job with or without reasonable accommodation?: ".$_REQUEST['pery']." ".$_REQUEST['pern']."

  QUALIFICATIONS

  School Name: ".$_REQUEST['school_name']." ".$_REQUEST['school_degree']." ".$_REQUEST['school_address']."
  Other: ".$_REQUEST['other_name']." ".$_REQUEST['other_degree']." ".$_REQUEST['other_address']."

  SPECIAL SKILLS: ".$_REQUEST['skills']."

  REFERENCES

  ".$_REQUEST['ref1_name']." ".$_REQUEST['ref1_address']." ".$_REQUEST['ref1_phone']." ".$_REQUEST['ref1_rel']."
  ".$_REQUEST['ref2_name']." ".$_REQUEST['ref2_address']." ".$_REQUEST['ref2_phone']." ".$_REQUEST['ref2_rel']."
  ".$_REQUEST['ref3_name']." ".$_REQUEST['ref3_address']." ".$_REQUEST['ref3_phone']." ".$_REQUEST['ref3_rel']."

  WORK HISTORY

  Company Name: ".$_REQUEST['cname1']."
  Company Adress: ".$_REQUEST['caddress1']."
  Start Date: ".$_REQUEST['cstart1']."
  End Date: ".$_REQUEST['cend1']."
  Supervisor's Name: ".$_REQUEST['csuper1']."
  Phone Number: ".$_REQUEST['cnumber1']."
  Starting Salary: ".$_REQUEST['cpay1']."
  Ending Salary: ".$_REQUEST['cepay1']."
  Reason for Leaving: ".$_REQUEST['cleave1']."
  May we contact your present employer? ".$_REQUEST['contact1y']." ".$_REQUEST['contact1n']."
  Duties: ".$_REQUEST['cduties1']."

  Company Name: ".$_REQUEST['cname2']."
  Company Adress: ".$_REQUEST['caddress2']."
  Start Date: ".$_REQUEST['cstart2']."
  End Date: ".$_REQUEST['cend2']."
  Supervisor's Name: ".$_REQUEST['csuper2']."
  Phone Number: ".$_REQUEST['cnumber2']."
  Starting Salary: ".$_REQUEST['cpay2']."
  Ending Salary: ".$_REQUEST['cepay2']."
  Reason for Leaving: ".$_REQUEST['cleave2']."
  May we contact your present employer? ".$_REQUEST['contact2y']." ".$_REQUEST['contact2n']."
  Duties: ".$_REQUEST['cduties2']."
 
  Applicant Signature: ".$_REQUEST['complete_name']."
  Date: ".$_REQUEST['complete_date']."

   ");

  echo "<div class='w3-container'>Application Sent...</div>";

?>