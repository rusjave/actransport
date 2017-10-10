<?php
require 'phpmailerautoload.php';
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
function ReplaceVariables($code)
{
   foreach ($_POST as $key => $value)
   {
      if (is_array($value))
      {
         $value = implode(",", $value);
      }
      $name = "$" . $key;
      $code = str_replace($name, $value, $code);
   }
   $code = str_replace('$ipaddress', $_SERVER['REMOTE_ADDR'], $code);
   return $code;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'form1')
{
   $mailto = 'larry.steed@ati147.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'AC Transport Booking Request';
   $message = 'Values submitted from web site form:';
   $success_url = '../thanks.html';
   $error_url = '';
   $error = '';
   $eol = "\n";
   $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
   $mail = new PHPMailer();
   $mail->Subject = stripslashes($subject);
   $mail->From = $mailfrom;
   $mail->FromName = $mailfrom;
   $mailto_array = explode(",", $mailto);
   for ($i = 0; $i < count($mailto_array); $i++)
   {
      if(trim($mailto_array[$i]) != "")
      {
         $mail->AddAddress($mailto_array[$i], "");
      }
   }
   $mail->AddReplyTo($mailfrom);
   if (!ValidateEmail($mailfrom))
   {
      $error .= "The specified email address is invalid!\n<br>";
   }

   if (!empty($error))
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $error, $errorcode);
      echo $errorcode;
      exit;
   }

   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response");
   $message .= $eol;
   $message .= "IP Address : ";
   $message .= $_SERVER['REMOTE_ADDR'];
   $message .= $eol;
   foreach ($_POST as $key => $value)
   {
      if (!in_array(strtolower($key), $internalfields))
      {
         if (!is_array($value))
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
         }
         else
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
         }
      }
   }
   $mail->CharSet = 'ISO-8859-1';
   if (!empty($_FILES))
   {
       foreach ($_FILES as $key => $value)
       {
          if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize)
          {
             $mail->AddAttachment($_FILES[$key]['tmp_name'], $_FILES[$key]['name']);
          }
      }
   }
   $mail->WordWrap = 80;
   $mail->Body = $message;
   if (!$mail->Send())
   {
      die('PHPMailer error: ' . $mail->ErrorInfo);
   }
   $successcode = file_get_contents($success_url);
   $successcode = ReplaceVariables($successcode);
   echo $successcode;
   exit;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Page</title>
<meta name="generator" content="">
<link href="actransport.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
<script>
function Validateresform2(theForm)
{
   var regexp;
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/;
   if (!regexp.test(theForm.Editbox1.value))
   {
      alert("Please enter only letter characters in the \"FName\" field.");
      theForm.Editbox1.focus();
      return false;
   }
   if (theForm.Editbox1.value == "")
   {
      alert("Please enter a value for the \"FName\" field.");
      theForm.Editbox1.focus();
      return false;
   }
   if (theForm.Editbox1.value.length < 2)
   {
      alert("Please enter at least 2 characters in the \"FName\" field.");
      theForm.Editbox1.focus();
      return false;
   }
   if (theForm.Editbox1.value.length > 20)
   {
      alert("Please enter at most 20 characters in the \"FName\" field.");
      theForm.Editbox1.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/;
   if (!regexp.test(theForm.Editbox2.value))
   {
      alert("Use Letters Only");
      theForm.Editbox2.focus();
      return false;
   }
   if (theForm.Editbox2.value == "")
   {
      alert("Use Letters Only");
      theForm.Editbox2.focus();
      return false;
   }
   if (theForm.Editbox2.value.length < 0)
   {
      alert("Use Letters Only");
      theForm.Editbox2.focus();
      return false;
   }
   if (theForm.Editbox2.value.length > 30)
   {
      alert("Use Letters Only");
      theForm.Editbox2.focus();
      return false;
   }
   regexp = /^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i;
   if (!regexp.test(theForm.Editbox3.value))
   {
      alert("Please enter a valid email address.");
      theForm.Editbox3.focus();
      return false;
   }
   if (theForm.Editbox3.value == "")
   {
      alert("Please enter a value for the \"Email\" field.");
      theForm.Editbox3.focus();
      return false;
   }
   regexp = /^[-+]?\d*\.?\d*$/;
   if (!regexp.test(theForm.Editbox4.value))
   {
      alert("Please enter only digit characters in the \"Phone\" field.");
      theForm.Editbox4.focus();
      return false;
   }
   regexp = /^[-+]?\d*\.?\d*$/;
   if (!regexp.test(theForm.Editbox5.value))
   {
      alert("Please enter only digit characters in the \"Mobile \" field.");
      theForm.Editbox5.focus();
      return false;
   }
   if (theForm.Combobox1.selectedIndex < 0)
   {
      alert("Please select one of the \"PickupLocation\" options.");
      theForm.Combobox1.focus();
      return false;
   }
   if (theForm.Editbox8.value == "")
   {
      alert("Please enter a value for the \"P/UorD/OLocation\" field.");
      theForm.Editbox8.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/;
   if (!regexp.test(theForm.Editbox9.value))
   {
      alert("Please enter only letter, digit and whitespace characters in the \"StreetAdd1\" field.");
      theForm.Editbox9.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/;
   if (!regexp.test(theForm.Editbox10.value))
   {
      alert("Please enter only letter, digit and whitespace characters in the \"StreetAdd2\" field.");
      theForm.Editbox10.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/;
   if (!regexp.test(theForm.Editbox11.value))
   {
      alert("Please enter only letter, digit and whitespace characters in the \"City\" field.");
      theForm.Editbox11.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/;
   if (!regexp.test(theForm.Editbox12.value))
   {
      alert("Please enter only letter, digit and whitespace characters in the \"StateProvReg\" field.");
      theForm.Editbox12.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-]*$/;
   if (!regexp.test(theForm.Editbox13.value))
   {
      alert("Please enter only letter, digit and whitespace characters in the \"Postal\" field.");
      theForm.Editbox13.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/;
   if (!regexp.test(theForm.Editbox14.value))
   {
      alert("Please enter only letter characters in the \"Country\" field.");
      theForm.Editbox14.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/;
   if (!regexp.test(theForm.Editbox15.value))
   {
      alert("Please enter only letter characters in the \"Airline\" field.");
      theForm.Editbox15.focus();
      return false;
   }
   if (theForm.Editbox15.value == "")
   {
      alert("Please enter a value for the \"Airline\" field.");
      theForm.Editbox15.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ0-9-]*$/;
   if (!regexp.test(theForm.Editbox16.value))
   {
      alert("Please enter only letter and digit characters in the \"FlightNumber\" field.");
      theForm.Editbox16.focus();
      return false;
   }
   if (theForm.Editbox16.value == "")
   {
      alert("Please enter a value for the \"FlightNumber\" field.");
      theForm.Editbox16.focus();
      return false;
   }
   regexp = /^[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ]*$/;
   if (!regexp.test(theForm.Editbox17.value))
   {
      alert("Please enter only letter characters in the \"StartCity\" field.");
      theForm.Editbox17.focus();
      return false;
   }
   if (theForm.Combobox2.selectedIndex < 0)
   {
      alert("Please select one of the \"NoPassengers\" options.");
      theForm.Combobox2.focus();
      return false;
   }
   if (theForm.Combobox3.selectedIndex < 0)
   {
      alert("Please select one of the \"VehType\" options.");
      theForm.Combobox3.focus();
      return false;
   }
   if (theForm.Combobox4.selectedIndex < 0)
   {
      alert("Please select one of the \"Share\" options.");
      theForm.Combobox4.focus();
      return false;
   }
   if (theForm.TextArea1.value.length < 1)
   {
      alert("Please enter at least 1 characters in the \"Comment\" field.");
      theForm.TextArea1.focus();
      return false;
   }
   if (theForm.TextArea1.value.length > 500)
   {
      alert("Please enter at most 500 characters in the \"Comment\" field.");
      theForm.TextArea1.focus();
      return false;
   }
   var extension = theForm.FileUpload1.value.substr(theForm.FileUpload1.value.lastIndexOf('.'));
   if ((extension.toLowerCase() != ".pdf") &&
       (extension != ""))
   {
      alert("The \"FileUploadIten\" field contains an unapproved filename.");
      theForm.FileUpload1.focus();
      return false;
   }
   var extension = theForm.FileUpload2.value.substr(theForm.FileUpload2.value.lastIndexOf('.'));
   if ((extension.toLowerCase() != ".bmp") &&
       (extension.toLowerCase() != ".jpg") &&
       (extension.toLowerCase() != ".png") &&
       (extension != ""))
   {
      alert("The \"FileUploadPic\" field contains an unapproved filename.");
      theForm.FileUpload2.focus();
      return false;
   }
   if (theForm.Combobox5.selectedIndex < 0)
   {
      alert("Please select one of the \"PUInstr\" options.");
      theForm.Combobox5.focus();
      return false;
   }
   if (theForm.Combobox6.selectedIndex < 0)
   {
      alert("Please select one of the \"ArrDay\" options.");
      theForm.Combobox6.focus();
      return false;
   }
   if (theForm.Combobox7.selectedIndex < 0)
   {
      alert("Please select one of the \"ArrMonth\" options.");
      theForm.Combobox7.focus();
      return false;
   }
   if (theForm.Combobox8.selectedIndex < 0)
   {
      alert("Please select one of the \"ArrYear\" options.");
      theForm.Combobox8.focus();
      return false;
   }
   if (theForm.Combobox9.selectedIndex < 0)
   {
      alert("Please select one of the \"ArrTimeHour\" options.");
      theForm.Combobox9.focus();
      return false;
   }
   if (theForm.Combobox10.selectedIndex < 0)
   {
      alert("Please select one of the \"ArrTimeMinutes\" options.");
      theForm.Combobox10.focus();
      return false;
   }
   if (theForm.Combobox11.selectedIndex < 0)
   {
      alert("Please select one of the \"ArrTimeAMPM\" options.");
      theForm.Combobox11.focus();
      return false;
   }
   return true;
}
</script>
</head>
<body>

<div id="wb_Form1" style="position:absolute;left:13px;top:6px;width:467px;height:1863px;z-index:57;">
<form name="resform2" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="ISO-8859-1" target="_blank" id="Form1" onsubmit="return Validateresform2(this)">
<input type="hidden" name="formid" value="form1">
<div id="wb_Text1" style="position:absolute;left:13px;top:68px;width:443px;height:99px;text-align:justify;z-index:0;">
<span style="color:#000000;font-family:Arial;font-size:16px;"><strong>AC Transport Services Pickup Form</strong></span><span style="color:#000000;font-family:Arial;font-size:13px;"><br>This information will only be shared with my booking staff and the drivers supervisor who will allocate your job. If you do not receive a response in 24 hours it means your request may not have been forwarded to our office. Please email details to our secondary address at bookings@actransportservices.com</span></div>
<div id="wb_Shape1" style="position:absolute;left:1px;top:4px;width:466px;height:57px;z-index:1;">
<img src="images/img0001.png" id="Shape1" alt="" style="width:466px;height:57px;"></div>
<div id="wb_ClipArt1" style="position:absolute;left:13px;top:9px;width:46px;height:47px;z-index:2;">
<img src="images/img0002.png" id="ClipArt1" alt="" style="width:46px;height:47px;"></div>
<hr id="Line1" style="position:absolute;left:7px;top:177px;width:460px;height:5px;z-index:3;">
<input type="text" id="Editbox1" style="position:absolute;left:13px;top:213px;width:166px;height:18px;line-height:18px;z-index:4;" name="FName" value="" maxlength="20" tabindex="1" title="First Name" placeholder="First Name">
<div id="wb_Text2" style="position:absolute;left:8px;top:197px;width:250px;height:16px;z-index:5;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Name:</span><span style="color:#FF0000;font-family:Arial;font-size:13px;"> *</span></div>
<input type="text" id="Editbox2" style="position:absolute;left:208px;top:213px;width:249px;height:18px;line-height:18px;z-index:6;" name="LName" value="" maxlength="30" tabindex="2" placeholder="Last Name">
<div id="wb_Text3" style="position:absolute;left:8px;top:247px;width:256px;height:16px;z-index:7;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Email: </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<input type="email" id="Editbox3" style="position:absolute;left:13px;top:263px;width:291px;height:18px;line-height:18px;z-index:8;" name="Email" value="" tabindex="3" placeholder="Email">
<div id="wb_Text4" style="position:absolute;left:7px;top:297px;width:256px;height:16px;z-index:9;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Phone:</span></div>
<input type="tel" id="Editbox4" style="position:absolute;left:13px;top:313px;width:291px;height:18px;line-height:18px;z-index:10;" name="Phone" value="" tabindex="4" placeholder="Phone">
<div id="wb_Text5" style="position:absolute;left:7px;top:347px;width:252px;height:16px;z-index:11;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Mobile Number:</span></div>
<input type="tel" id="Editbox5" style="position:absolute;left:13px;top:363px;width:291px;height:18px;line-height:18px;z-index:12;" name="Mobile " value="" tabindex="5" placeholder="Mobile Number">
<div id="wb_Text6" style="position:absolute;left:7px;top:404px;width:251px;height:16px;z-index:13;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Date Required (Arrival Date) </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<div id="wb_Text7" style="position:absolute;left:216px;top:404px;width:251px;height:16px;z-index:14;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Arrival or Pickup Time </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<div id="wb_Text8" style="position:absolute;left:9px;top:470px;width:447px;height:230px;text-align:justify;z-index:15;">
<span style="color:#000000;font-family:Arial;font-size:11px;">IMPORTANT NOTICE:<br></span><span style="color:#000000;font-family:Arial;font-size:9.3px;"><br>We do not accept reservations FOR NEW CUSTOMERS received within 24 hours of their scheduled arrival times. <br><br>This is because it does not give us sufficient time to confirm our pickup before they leave home. These short notice pickups have had a very high rate of failure in the past because people in this category make almost no attempt to find the driver before seeking out alternative transportation.<br><br>If you want to be an exception to this policy, you must email our reservations department at bookings@actransportservices.com. They will send you a email stating that it is a short-notice request. This email will have arrival instructions for meeting your driver. It will specify that we will not send a vehicle unless you confirm the instructions in that email. No confirmation, no vehicle will be dispatched.<br><br>If you don't have time to wait for the email confirmation you can try to call our office.<br><br>+63-977-770-6189<br><br>It will still be up to the manager on duty to determine if we will accept your short notice request.</span></div>
<div id="wb_Text9" style="position:absolute;left:7px;top:774px;width:244px;height:16px;z-index:16;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pickup Location: </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<select name="PickupLocation" size="1" id="Combobox1" style="position:absolute;left:9px;top:792px;width:285px;height:28px;z-index:17;" tabindex="12">
<option selected value="Please Select">Please Select</option>
<option value="Manila NAIA Terminal 1">Manila NAIA Terminal 1</option>
<option value="Manila NAIA Terminal 1">Manila NAIA Terminal 2</option>
<option value="Manila NAIA Terminal 3">Manila NAIA Terminal 3</option>
<option value="Manila NAIA Terminal 4">Manila NAIA Terminal 4</option>
<option value="Clark International (CRK)">Clark International (CRK)</option>
<option value="Other">Other</option>
</select>
<div id="wb_Text10" style="position:absolute;left:8px;top:830px;width:250px;height:16px;z-index:18;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pickup or Drop off Location: </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<input type="text" id="Editbox8" style="position:absolute;left:9px;top:846px;width:275px;height:18px;line-height:18px;z-index:19;" name="P/UorD/OLocation" value="" tabindex="13" placeholder="Pickup or Drop off Location">
<div id="wb_Text11" style="position:absolute;left:6px;top:887px;width:246px;height:16px;z-index:20;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Pickup or Drop off Address (If Known)</span></div>
<input type="text" id="Editbox9" style="position:absolute;left:13px;top:905px;width:433px;height:18px;line-height:18px;z-index:21;" name="StreetAdd1" value="" tabindex="14" placeholder="Street Address">
<input type="text" id="Editbox10" style="position:absolute;left:13px;top:938px;width:433px;height:18px;line-height:18px;z-index:22;" name="StreetAdd2" value="" tabindex="15" placeholder="Street Adress 2">
<input type="text" id="Editbox11" style="position:absolute;left:13px;top:971px;width:176px;height:18px;line-height:18px;z-index:23;" name="City" value="" tabindex="16" placeholder="City">
<input type="text" id="Editbox12" style="position:absolute;left:208px;top:971px;width:238px;height:18px;line-height:18px;z-index:24;" name="StateProvReg" value="" tabindex="17" placeholder="State/Province/Region">
<input type="text" id="Editbox13" style="position:absolute;left:13px;top:1004px;width:176px;height:18px;line-height:18px;z-index:25;" name="Postal" value="" tabindex="18" placeholder="Postal/Zip Code">
<input type="text" id="Editbox14" style="position:absolute;left:208px;top:1004px;width:238px;height:18px;line-height:18px;z-index:26;" name="Country" value="" tabindex="19" placeholder="Country">
<div id="wb_Text12" style="position:absolute;left:4px;top:1047px;width:250px;height:16px;z-index:27;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Airline: </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<input type="text" id="Editbox15" style="position:absolute;left:13px;top:1063px;width:176px;height:18px;line-height:18px;z-index:28;" name="Airline" value="" tabindex="20" placeholder="Airline">
<div id="wb_Text13" style="position:absolute;left:206px;top:1047px;width:250px;height:16px;z-index:29;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Flight Number: </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<input type="text" id="Editbox16" style="position:absolute;left:208px;top:1063px;width:176px;height:18px;line-height:18px;z-index:30;" name="FlightNumber" value="" tabindex="21" placeholder="Flight Number">
<div id="wb_Text14" style="position:absolute;left:4px;top:1099px;width:250px;height:16px;z-index:31;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Origin of Flight: (City)</span></div>
<input type="text" id="Editbox17" style="position:absolute;left:13px;top:1118px;width:176px;height:18px;line-height:18px;z-index:32;" name="StartCity" value="" tabindex="22" placeholder="Origin of Flight">
<select name="NoPassengers" size="1" id="Combobox2" style="position:absolute;left:13px;top:1173px;width:122px;height:28px;z-index:33;" tabindex="23">
<option value="Please Select">Please Select</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
</select>
<div id="wb_Text15" style="position:absolute;left:4px;top:1154px;width:250px;height:16px;z-index:34;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Number of Passengers: </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<div id="wb_Text16" style="position:absolute;left:205px;top:1154px;width:255px;height:16px;z-index:35;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Vehicle Type: </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<select name="VehType" size="1" id="Combobox3" style="position:absolute;left:208px;top:1173px;width:133px;height:28px;z-index:36;" tabindex="24">
<option value="Please Select">Please Select</option>
<option value="Car">Car</option>
<option value="Van">Van</option>
</select>
<div id="wb_Text17" style="position:absolute;left:4px;top:1210px;width:403px;height:16px;z-index:37;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Are you willing to share a ride with individuals on your same flight? </span><span style="color:#FF0000;font-family:Arial;font-size:13px;">*</span></div>
<select name="Share" size="1" id="Combobox4" style="position:absolute;left:13px;top:1229px;width:122px;height:28px;z-index:38;" tabindex="25">
<option value="Please Select">Please Select</option>
<option value="Yes">Yes</option>
<option value="No">No</option>
</select>
<div id="wb_Text18" style="position:absolute;left:4px;top:1268px;width:423px;height:16px;z-index:39;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Please add any remarks that will clarify your request please?</span></div>
<textarea name="Comment" id="TextArea1" style="position:absolute;left:3px;top:1291px;width:447px;height:90px;z-index:40;" rows="4" cols="72" tabindex="26" placeholder="Comment">
</textarea>
<div id="wb_Text19" style="position:absolute;left:4px;top:1405px;width:250px;height:16px;z-index:41;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Itenerary Upload (PDF)</span></div>
<input type="file" id="FileUpload1" style="position:absolute;left:1px;top:1439px;width:199px;height:21px;line-height:21px;z-index:42;" name="FileUploadIten" tabindex="27">
<div id="wb_Text20" style="position:absolute;left:216px;top:1397px;width:249px;height:32px;z-index:43;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Photo Upload (Optional used for the driver to recognize you) </span></div>
<input type="file" id="FileUpload2" style="position:absolute;left:211px;top:1438px;width:243px;height:22px;line-height:22px;z-index:44;" name="FileUploadPic" tabindex="28">
<div id="wb_Text21" style="position:absolute;left:2px;top:1482px;width:250px;height:16px;z-index:45;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">FaceBook Name:</span></div>
<div id="wb_Text22" style="position:absolute;left:3px;top:1542px;width:404px;height:16px;z-index:46;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">Have you read the Pickup instructions on our Services Page?</span></div>
<select name="PUInstr" size="1" id="Combobox5" style="position:absolute;left:6px;top:1560px;width:89px;height:28px;z-index:47;">
<option selected value="Yes">Yes</option>
<option value="No">No</option>
</select>
<div id="wb_Text23" style="position:absolute;left:3px;top:1614px;width:453px;height:32px;z-index:48;text-align:left;">
<span style="color:#000000;font-family:Arial;font-size:13px;">We will send you a Job Number for your reference and also to give to driver to confirm Identity.</span></div>
<input type="submit" id="Button1" name="" value="Submit" style="position:absolute;left:5px;top:1672px;width:96px;height:25px;z-index:49;">
<select name="ArrDay" size="1" id="Combobox6" style="position:absolute;left:6px;top:431px;width:53px;height:28px;z-index:50;" tabindex="6">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="15">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
<select name="ArrMonth" size="1" id="Combobox7" style="position:absolute;left:69px;top:431px;width:66px;height:28px;z-index:51;" tabindex="7">
<option value="JAN">JAN</option>
<option value="FEB">FEB</option>
<option value="MAR">MAR</option>
<option value="APR">APR</option>
<option value="MAY">MAY</option>
<option value="JUN">JUN</option>
<option value="JUL">JUL</option>
<option value="AUG">AUG</option>
<option value="SEP">SEP</option>
<option value="OCT">OCT</option>
<option value="NOV">NOV</option>
<option value="DEC">DEC</option>
</select>
<select name="ArrYear" size="1" id="Combobox8" style="position:absolute;left:143px;top:431px;width:61px;height:28px;z-index:52;" tabindex="8">
<option selected value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
</select>
<select name="ArrTimeHour" size="1" id="Combobox9" style="position:absolute;left:218px;top:431px;width:56px;height:28px;z-index:53;" tabindex="9" title="ArrTimeHour">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
</select>
<select name="ArrTimeMinutes" size="1" id="Combobox10" style="position:absolute;left:283px;top:431px;width:58px;height:28px;z-index:54;" tabindex="10">
<option value="15">15</option>
<option value="30">30</option>
<option value="45">45</option>
</select>
<select name="ArrTimeAMPM" size="1" id="Combobox11" style="position:absolute;left:351px;top:431px;width:56px;height:28px;z-index:55;" tabindex="11">
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
</form>
</div>
<input type="text" id="Editbox18" style="position:absolute;left:12px;top:1505px;width:266px;height:18px;line-height:18px;z-index:58;" name="FBName" value="" tabindex="29" placeholder="Facebook Name">
</body>
</html>