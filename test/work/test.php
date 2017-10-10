<?php
///////////////////////////////////////////////////////////////////////////////
// FORM CREATED WITH ARCLAB WEB FORM BUILDER 4.31
// COPYRIGHT 2015, ARCLAB SOFTWARE http://www.arclab.com
// FILE FORMAT: UTF-8 WITHOUT BOM
// DO NOT EDIT THE CODE BELOW!
///////////////////////////////////////////////////////////////////////////////
// SET ERROR REPORTING LEVEL
error_reporting(E_ERROR);
///////////////////////////////////////////////////////////////////////////////
// CHECK PHP VERSION
if(!function_exists('phpversion'))die('PHP version 5 (or higher) required!');
if(version_compare(phpversion(),'5.0.0','<'))die('PHP version 5 required. Detected: '.phpversion());
///////////////////////////////////////////////////////////////////////////////
// CHECK FOR GD EXTENSION AND MBSTRING
if(!function_exists('gd_info'))die('PHP GD extension not installed!');
if(!function_exists('mb_strpos'))die('PHP mbstring not enabled!');
mb_internal_encoding('UTF-8');
///////////////////////////////////////////////////////////////////////////////
// FILTER-FUNCTION USED FOR GET/POST
function A_513F($a)
{
if(mb_detect_encoding($a)=="UTF-8"&&mb_check_encoding($a,"UTF-8")) 
return $a; 
else 
return utf8_encode($a); 
}
function A_5135($a)
{
if(is_array($a))
{$num=count($a);
for($x=0;$x<$num;$x++)$a[$x]=htmlspecialchars(A_513F($a[$x]),ENT_QUOTES,'UTF-8');
return $a;}
else
{$b=htmlspecialchars(A_513F($a),ENT_QUOTES,'UTF-8');
return trim($b);}
}
///////////////////////////////////////////////////////////////////////////////
// FILTER-FUNCTION AGAINST MAIL HEADER INJECTION
function A_5117($a)
{
$b=htmlspecialchars_decode($a,ENT_QUOTES);
$r=array('/(\n+)/i','/(\r+)/i','/(\t+)/i','/(%0A+)/i','/(%0D+)/i','/(%08+)/i','/(%09+)/i');
$b=preg_replace($r,'',$b);
return $b;
}
///////////////////////////////////////////////////////////////////////////////
// VALUE OUTPUT
function A_518A($a)
{
if(is_array($a))$a=implode(',',$a);
return $a;
}
///////////////////////////////////////////////////////////////////////////////
// EMAIL SYNTAX CHECK
function A_516F($a)
{
return preg_match('/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i',$a);
}
///////////////////////////////////////////////////////////////////////////////
// SESSION
$A_5140=session_id();
if(empty($A_5140))
{
if(isset($_GET['sid'])){$A_5140=A_5135($_GET['sid']); session_id($A_5140);}
session_start();
if(empty($A_5140))$A_5140=session_id();
}
$A_512D="";
foreach ($_GET as $A_518F => $A_5149)
{if ($A_518F!="sid") $A_512D.="&amp;".A_5135($A_518F)."=".A_5135($A_5149);}
$A_5137=A_5135($_SERVER['SCRIPT_NAME'])."?sid=".$A_5140.$A_512D;
$A_5141=0;
$A_513E=A_5135($_SERVER['SCRIPT_NAME'])."?sid=".$A_5140;
///////////////////////////////////////////////////////////////////////////////
// PHP UTF-8 SUPPORT
function A_5187($a)
{return mb_strlen($a,'UTF-8');}
function A_517C($a,$b)
{return mb_strpos($a,$b,0,'UTF-8');}
///////////////////////////////////////////////////////////////////////////////
function A_51A0()
{
$A_5159=$GLOBALS["A_5137"];
header("Content-Type: text/html;charset=UTF-8");
echo "<!doctype html>
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
<title>TEST VERSION</title>
<!--*************** START Arclab Web Form Builder CSS ***************-->
<style type=\"text/css\">
#arclabwfb *,#arclabwfb *:before,#arclabwfb *:after { white-space:normal; position:relative; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; box-sizing:border-box }
#arclabwfb p { margin:0; padding:0; }
#arclabwfb hr { height:1px; border:none; color:#000; background-color:#000; }
.aft { border:0; border-spacing:0; border-collapse:collapse; padding:0; font-family:Arial; font-size:15px; width:800px; margin:0 auto; }
.aft-rowsp { margin:0; padding:0; height:20px; }
.aft-spc { margin:0; padding:5px 0 0 0; }
.aft-spbo { margin:0; padding:0 0 5px 0; }
.aft-spv { margin:0; padding:0; height:5px; }
.aft-error { margin:0; padding:5px 0 0 0; color:#FF6600;}
.aft2 { margin:0; padding:0; border:0; border-spacing:0; border-collapse:collapse; font-family:Arial; font-size:100%; width:100%; }
.afl { margin:0; padding:0; font-family:inherit; font-size:inherit; width:20%; text-align:left; vertical-align:top; }
.afl-lab { }
.afl2 { margin:0; font-family:inherit; font-size:inherit; text-align:left; vertical-align:top; }
.afr { margin:0; padding:0; font-family:inherit; font-size:inherit; width:80%; text-align:left; vertical-align:top; }
.afr2 { margin:0; padding:0; font-family:inherit; font-size:inherit; text-align:left; vertical-align:top; }
.afi { margin:0; font-family:inherit; font-size:inherit; padding:2px; border:1px solid #707070; }
.afi-drop { margin:0; font-family:inherit; font-size:inherit; padding:1px; border:1px solid #707070; }
.afi2 { margin:0; font-family:inherit; }
.afi-b1 { margin:0 5px 0 0; font-family:inherit; font-size:inherit; }
.afi-b2 { margin:0 5px 0 0; font-family:inherit; font-size:inherit; }
.afi-b3 { margin:0 5px 0 0; font-family:inherit; font-size:inherit; }
.afi-b4 { margin:0 5px 0 0; font-family:inherit; font-size:inherit; }
.afi-cht { display:table; }
.afi-chl { display:table-cell; float:left; vertical-align:top; }
.afi-chr { display:table-cell; clear:both; vertical-align:top; }
.afi-el { margin: 2px 5px 0 0; vertical-align:top; }
.afi-en { margin: 2px 5px 0 5px; vertical-align:top; }
</style>
<!--*************** END - Arclab Web Form Builder CSS ***************-->
</head>
<body>
<div>
<!--*************** Form made with Arclab Web Form Builder 4.31 - Testversion ***************-->
<form action=\"$A_5159\" method=\"post\" enctype=\"multipart/form-data\">
<div id=\"arclabwfb\" style=\"text-align:center;\">
<table class=\"aft\">
";}
function A_519C()
{echo "</table>
<script type=\"text/javascript\">
function af_htmlencode(af_str)
{
var af_ret=af_str;
af_ret=af_ret.replace(/&/g,'&amp;');
af_ret=af_ret.replace(/</g,'&lt;');
af_ret=af_ret.replace(/>/g,'&gt;');
af_ret=af_ret.replace(/\"/g,'&quot;');
af_ret=af_ret.replace(/'/g,'&#39;');
af_ret=af_ret.replace(/(?:\\r\\n|\\r|\\n)/g, '<br />');
return af_ret;
}
function af_update(af_name,af_type)
{
var af_sfid = \"afid_\"+af_name+\"_afid\";
var af_ob = document.getElementsByTagName(\"*\");
var af_out=\"\";
switch (af_type)
{
case 1:
{
var af_ele=document.getElementsByName(af_name+\"[]\");
for (var z=0;z<af_ele.length;z++)
{
if (af_ele[z].checked)
{
if(af_out!=\"\")af_out+=\",\"; af_out+=af_ele[z].value;
}}
}
break;
default:
{
var af_ele=document.getElementsByName(af_name);
for (var z=0;z<af_ele.length;z++)
{
if(af_out!=\"\")af_out+=\",\";
af_out+=af_ele[z].value;
}}
break;
}
for (var i=0; i<af_ob.length;i++)
{
var af_id=af_ob[i].id;
if (af_id.search(af_sfid)!=-1)
{
document.getElementById(af_id).innerHTML=af_htmlencode(af_out);
}}
}
</script>
</div>
</form>
<!--*************** Form made with Arclab Web Form Builder 4.31 - Testversion ***************-->
</div>
</body>
</html>";}
// --- ARCLAB WEBFORM CLASSES ---
class A_519E
{
public $A_519B='';
public $A_5198='';
public $A_5143='';
public $A_519A='';
public $A_5122='';
public $A_5133='';
public $A_5107=false;
public $A_50FE='';
public $A_5151='';
public $A_5186='';
public $A_518D='';
public $A_517F='';
public $A_5189='';
public $A_5180='';
public $A_5181='';
public $A_5182='';
public $A_518E='';
public $A_5167='';
public $A_517A='';
public $A_515F='';
public $A_5176='';
public $A_515D='';
public $A_515C='';
public $A_5192=0;
public $A_5196=0;
public $A_5191=0;
public $A_5193=0;
public $A_5199=0;
public $A_5190=0;
public $A_5194=0;
public $A_5195=0;
public $A_518B=0;
public $A_518C=0;
public $A_517E=0;
public $A_5185=0;
public $A_5184=0;
public $A_517D=0;
public $A_514F=0;
public $A_514D=0;
public $A_5152=0;
public $A_5146=0;
public $A_5150=0;
public $A_513C=array();
public $A_5145=array();
public function A_5165(){return false;}
public function A_5103(){$this->A_519D ($this->A_5165());}
public function A_512C ()
{
$af_label=""; $af_input="";
if ($this->A_518B==1) {$af_label=" style=\"text-align:left;\""; $af_input=" style=\"text-align:left;\"";}
if ($this->A_518B==2) {$af_label=" style=\"text-align:left;\""; $af_input=" style=\"text-align:center;\"";}
if ($this->A_518B==3) {$af_label=" style=\"text-align:left;\""; $af_input=" style=\"text-align:right;\"";}
if ($this->A_518B==4) {$af_label=" style=\"text-align:center;\""; $af_input=" style=\"text-align:left;\"";}
if ($this->A_518B==5) {$af_label=" style=\"text-align:center;\""; $af_input=" style=\"text-align:center;\"";}
if ($this->A_518B==6) {$af_label=" style=\"text-align:center;\""; $af_input=" style=\"text-align:right;\"";}
if ($this->A_518B==7) {$af_label=" style=\"text-align:right;\""; $af_input=" style=\"text-align:left;\"";}
if ($this->A_518B==8) {$af_label=" style=\"text-align:right;\""; $af_input=" style=\"text-align:center;\"";}
if ($this->A_518B==9) {$af_label=" style=\"text-align:right;\""; $af_input=" style=\"text-align:right;\"";}
if (empty($this->A_517A)) echo"<tr><td class=\"afl afl-lab\"$af_label>$this->A_5122</td><td class=\"afr\"$af_input>";
if ($this->A_517A=='TOPLEFT') echo"<tr><td colspan=\"2\" class=\"afl2 aft-spbo\"$af_label>$this->A_5122</td></tr><tr><td colspan=\"2\" class=\"afr\"$af_input>";
if ($this->A_517A=='TOPC') echo"<tr><td class=\"afl\">&nbsp;</td><td class=\"afl2 aft-spbo\"$af_label>$this->A_5122</td></tr><tr><td class=\"afl\">&nbsp;</td><td class=\"afr\"$af_input>";
if ($this->A_517A=='HIDELEFT') echo"<tr><td colspan=\"2\" class=\"afr2\"$af_input>";
if ($this->A_517A=='HIDEC') echo"<tr><td class=\"afl\">&nbsp;</td><td class=\"afr\"$af_input>";
}
public function A_5116($htm)
{
$v="<span id=\"afid_First_Name_afid_".$GLOBALS['A_5141']."\">".A_518A($GLOBALS['A_50DD'])."</span>";$htm=str_replace("[First_Name]",$v,$htm);$GLOBALS['A_5141']++;
$v="<span id=\"afid_Last_Name_afid_".$GLOBALS['A_5141']."\">".A_518A($GLOBALS['A_5074'])."</span>";$htm=str_replace("[Last_Name]",$v,$htm);$GLOBALS['A_5141']++;
$v="<span id=\"afid_Email_afid_".$GLOBALS['A_5141']."\">".A_518A($GLOBALS['A_5074'])."</span>";$htm=str_replace("[Email]",$v,$htm);$GLOBALS['A_5141']++;
$v="<span id=\"afid_Message_afid_".$GLOBALS['A_5141']."\">".A_518A($GLOBALS['A_5074'])."</span>";$htm=str_replace("[Message]",$v,$htm);$GLOBALS['A_5141']++;
return $htm;
}}
class A_5173 extends A_519E
{
public function A_5165()
{
$A_511A=false;
$A_5119=false;
$len=A_5187($this->A_5198);
if ($len==0&&$this->A_5107)$A_5119=true;
if ($this->A_5191==1)
{
for ($i=0;$i<$len;$i++){if(A_517C('0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
if($this->A_5196!=0){if($len<$this->A_5196)$A_511A=true;}
if($this->A_5192!=0){if($len>$this->A_5192)$A_511A=true;}
if ($this->A_5107==false&&$len==0)$A_511A=false;
if($A_511A||$A_5119)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_511A=false;
$A_5119=false;
$len=A_5187($this->A_5198);
if ($len==0&&$this->A_5107)$A_5119=true;
if ($this->A_5191==1)
{
for ($i=0;$i<$len;$i++){if(A_517C('0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
if($this->A_5196!=0){if($len<$this->A_5196)$A_511A=true;}
if($this->A_5192!=0){if($len>$this->A_5192)$A_511A=true;}
if ($this->A_5107==false&&$len==0)$A_511A=false;
$value=$this->A_5198;
$this->A_512C ();
echo"<input type=\"text\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$value\" class=\"afi\" style=\"width:$this->A_518D;\"";
if($this->A_5192!=0)echo" maxlength=\"$this->A_5192\"";
echo" />";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
if($A_5139&&$A_511A&&$A_5119==false)echo"<div class=\"aft-error\">$this->A_5151</div>";
echo"</td></tr>\n";
}}
class A_5168 extends A_519E
{
public function A_5165()
{
if (!$this->A_5107) return false;
if (empty($this->A_5198)) return true;
return false;
}
public function A_519D ($A_5139)
{
$value=$this->A_5198;
$this->A_512C ();
echo"<textarea rows=\"$this->A_5192\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" class=\"afi\" style=\"width:$this->A_518D;white-space:pre-wrap;\">$value</textarea>";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_5161 extends A_519E
{
public function A_5165()
{
if (!$this->A_5107&&empty($this->A_5198)&&empty($this->A_5189)) return false;
$A_5119=empty($this->A_5198);
$A_5139=false;
if($this->A_5192==1&&$this->A_5198!=$this->A_5189)$A_5139=true;
$len=A_5187($this->A_5198);
if($this->A_5196>0&&$len<$this->A_5196)$A_5139=true;
if($this->A_5191>0&&$len>$this->A_5191)$A_5139=true;
for ($i=0;$i<$len;$i++){if(A_517C($this->A_5186,$this->A_5198[$i])===FALSE)$A_5139=true;}
if($A_5139||$A_5119)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
$A_511A=false;
if (empty($this->A_5198)&&empty($this->A_5189)) $A_5119=true;
if($this->A_5192==1 && $this->A_5198!=$this->A_5189) $A_511A=true;
$len=A_5187($this->A_5198);
if($this->A_5196>0&&$len<$this->A_5196)$A_511A=true;
if($this->A_5191>0&&$len>$this->A_5191)$A_511A=true;
for ($i=0;$i<$len;$i++){if(A_517C($this->A_5186,$this->A_5198[$i])===FALSE)$A_511A=true;}
$this->A_512C ();
echo"<input type=\"password\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$this->A_5198\" class=\"afi\" style=\"width:$this->A_517F;\"";
if($this->A_5191!=0)echo" maxlength=\"$this->A_5191\"";
echo" />";
if($this->A_5192==1)
{echo"<div class=\"aft-spc\">$this->A_518D</div>";
echo"<div class=\"aft-spc\"><input type=\"password\" name=\"$this->A_519B"."_RET"."\" value=\"$this->A_5189\" class=\"afi\" style=\"width:$this->A_517F;\"";
if($this->A_5191!=0)echo" maxlength=\"$this->A_5191\"";
echo" /></div>";}
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
if($A_5139&&$A_511A&&$A_5119==false)echo"<div class=\"aft-error\">$this->A_5151</div>";
echo"</td></tr>\n";
}}
class A_515E extends A_519E
{
public function A_5165()
{
if (!$this->A_5107&&empty($this->A_5198)&&empty($this->A_5189)) return false;
$A_5119=empty($this->A_5198);
$A_511A=false;
if($this->A_5192==1&&$this->A_5198!=$this->A_5189)$A_511A=true;
if (!A_516F($this->A_5198))$A_511A=true;
if($A_511A||$A_5119)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
$A_511A=false;
if (empty($this->A_5198)&&empty($this->A_5189)) $A_5119=true;
if($this->A_5192==1&&$this->A_5198!=$this->A_5189)$A_511A=true;
if (!A_516F($this->A_5198))$A_511A=true;
$this->A_512C ();
echo"<input type=\"text\" maxlength=\"255\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$this->A_5198\" class=\"afi\" style=\"width:$this->A_518D;\" />";
if($this->A_5192==1){echo"<div class=\"aft-spc\">$this->A_5186</div><div class=\"aft-spc\"><input type=\"text\" maxlength=\"255\" name=\"$this->A_519B"."_RET"."\" value=\"$this->A_5189\" class=\"afi\" style=\"width:$this->A_518D;\" /></div>";}
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
if($A_5139&&$A_511A&&$A_5119==false)echo"<div class=\"aft-error\">$this->A_5151</div>";
echo"</td></tr>\n";
}}
class A_5179 extends A_519E
{
public function A_5165()
{
$this->A_5198=str_replace(",",".",$this->A_5198);
$A_511A=false;
if (substr_count($this->A_5198,".")>1) $A_511A=true;
$len=A_5187($this->A_5198);
if($this->A_5192==0)
{
for ($i=0;$i<$len;$i++){if(A_517C('+-.0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
if($this->A_5192==1)
{
for ($i=0;$i<$len;$i++){if(A_517C('+-.0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
if ($this->A_5198!=round($this->A_5198,2))$A_511A=true;
}
if($this->A_5192==2)
{
for ($i=0;$i<$len;$i++){if(A_517C('.0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
if ($this->A_5198!=round($this->A_5198,2))$A_511A=true;
}
if($this->A_5192==3)
{
for ($i=0;$i<$len;$i++){if(A_517C('0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
if($this->A_5192==4)
{
for ($i=0;$i<$len;$i++){if(A_517C('+-0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
if($this->A_514F!=0){if($this->A_5198<$this->A_514F)$A_511A=true;}
if($this->A_514D!=0){if($this->A_5198>$this->A_514D)$A_511A=true;}
if ($this->A_5193==1) $this->A_5198=str_replace(".",",",$this->A_5198);
if($A_511A)return true;else return false;
}
public function A_519D ($A_5139)
{
$this->A_5198=str_replace(",",".",$this->A_5198);
$A_511A=false;
if (substr_count($this->A_5198,".")>1) $A_511A=true;
$len=A_5187($this->A_5198);
for ($i=1;$i<$len;$i++){if(A_517C('.0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
if($this->A_5192==0)
{
for ($i=0;$i<$len;$i++){if(A_517C('+-.0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
if($this->A_5192==1)
{
for ($i=0;$i<$len;$i++){if(A_517C('+-.0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
if ($this->A_5198!=round($this->A_5198,2))$A_511A=true;
}
if($this->A_5192==2)
{
for ($i=0;$i<$len;$i++){if(A_517C('.0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
if ($this->A_5198!=round($this->A_5198,2))$A_511A=true;
}
if($this->A_5192==3)
{
for ($i=0;$i<$len;$i++){if(A_517C('0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
if($this->A_5192==4)
{
for ($i=0;$i<$len;$i++){if(A_517C('+-0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
$af_nalign="left";
if ($this->A_5199==1) $af_nalign="center";
if ($this->A_5199==2) $af_nalign="right";
if ($this->A_5193==1) $this->A_5198=str_replace(".",",",$this->A_5198);
if($this->A_514F!=0){if($this->A_5198<$this->A_514F)$A_511A=true;}
if($this->A_514D!=0){if($this->A_5198>$this->A_514D)$A_511A=true;}
$this->A_512C ();
echo"<input type=\"text\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$this->A_5198\" class=\"afi\" style=\"width:$this->A_518D; text-align:$af_nalign;\" />";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_511A)echo"<div class=\"aft-error\">$this->A_5151</div>";
echo"</td></tr>\n";
}}
class A_5160 extends A_519E
{
public function A_5165()
{
$A_511A=true;
if (!empty($this->A_5186)&&$this->A_5198==$this->A_5186) $A_511A=false;
if (!empty($this->A_517F)&&$this->A_5198==$this->A_517F) $A_511A=false;
if (!empty($this->A_5189)&&$this->A_5198==$this->A_5189) $A_511A=false;
if (!empty($this->A_5180)&&$this->A_5198==$this->A_5180) $A_511A=false;
if (!empty($this->A_5181)&&$this->A_5198==$this->A_5181) $A_511A=false;
if (!empty($this->A_5182)&&$this->A_5198==$this->A_5182) $A_511A=false;
if (!empty($this->A_518E)&&$this->A_5198==$this->A_518E) $A_511A=false;
if (!empty($this->A_5167)&&$this->A_5198==$this->A_5167) $A_511A=false;
return $A_511A;
}
public function A_519D ($A_5139)
{
$A_511A=true;
if (!empty($this->A_5186)&&$this->A_5198==$this->A_5186) $A_511A=false;
if (!empty($this->A_517F)&&$this->A_5198==$this->A_517F) $A_511A=false;
if (!empty($this->A_5189)&&$this->A_5198==$this->A_5189) $A_511A=false;
if (!empty($this->A_5180)&&$this->A_5198==$this->A_5180) $A_511A=false;
if (!empty($this->A_5181)&&$this->A_5198==$this->A_5181) $A_511A=false;
if (!empty($this->A_5182)&&$this->A_5198==$this->A_5182) $A_511A=false;
if (!empty($this->A_518E)&&$this->A_5198==$this->A_518E) $A_511A=false;
if (!empty($this->A_5167)&&$this->A_5198==$this->A_5167) $A_511A=false;
$this->A_512C ();
echo"<input type=\"password\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$this->A_5198\" class=\"afi\" style=\"width:$this->A_518D;\"";
echo" />";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_511A&&$A_5139)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_5171 extends A_519E
{
public function A_5165()
{
$A_511A=false;
$A_5119=false;
$A_511A_2=false;
$A_5119_2=false;
$len=A_5187($this->A_5198);
$len_2=A_5187($this->A_5143);
if ($len==0&&($this->A_5107&&($this->A_5195==0||$this->A_5195==1)))$A_5119=true;
if ($len_2==0&&($this->A_5107&&($this->A_5195==0||$this->A_5195==2)))$A_5119_2=true;
if ($this->A_5196==1)
{
for ($i=0;$i<$len;$i++){if(A_517C('0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
if ($this->A_5191==1)
{
for ($i=0;$i<$len_2;$i++){if(A_517C('0123456789',$this->A_5143[$i])===FALSE)$A_511A_2=true;}
}
if($this->A_5193!=0){if($len<$this->A_5193)$A_511A=true;}
if($this->A_5190!=0){if($len>$this->A_5190)$A_511A=true;}
if($this->A_5199!=0){if($len_2<$this->A_5199)$A_511A_2=true;}
if($this->A_5194!=0){if($len_2>$this->A_5194)$A_511A_2=true;}
if (($this->A_5107==false||($this->A_5107==true&&$this->A_5195==2))&&$len==0)$A_511A=false;
if (($this->A_5107==false||($this->A_5107==true&&$this->A_5195==1))&&$len_2==0)$A_511A_2=false;
if($A_511A||$A_5119||$A_511A_2||$A_5119_2)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_511A=false;
$A_5119=false;
$A_511A_2=false;
$A_5119_2=false;
$len=A_5187($this->A_5198);
$len_2=A_5187($this->A_5143);
if ($len==0&&($this->A_5107&&($this->A_5195==0||$this->A_5195==1)))$A_5119=true;
if ($len_2==0&&($this->A_5107&&($this->A_5195==0||$this->A_5195==2)))$A_5119_2=true;
if ($this->A_5196==1)
{
for ($i=0;$i<$len;$i++){if(A_517C('0123456789',$this->A_5198[$i])===FALSE)$A_511A=true;}
}
if ($this->A_5191==1)
{
for ($i=0;$i<$len_2;$i++){if(A_517C('0123456789',$this->A_5143[$i])===FALSE)$A_511A_2=true;}
}
if($this->A_5193!=0){if($len<$this->A_5193)$A_511A=true;}
if($this->A_5190!=0){if($len>$this->A_5190)$A_511A=true;}
if($this->A_5199!=0){if($len_2<$this->A_5199)$A_511A_2=true;}
if($this->A_5194!=0){if($len_2>$this->A_5194)$A_511A_2=true;}
if (($this->A_5107==false||($this->A_5107==true&&$this->A_5195==2))&&$len==0)$A_511A=false;
if (($this->A_5107==false||($this->A_5107==true&&$this->A_5195==1))&&$len_2==0)$A_511A_2=false;
if($this->A_517A=="TOP")
{
echo"<tr><td colspan=\"2\" style=\"padding:0;\"><table class=\"aft2\"><tr>";
echo"<td class=\"afl2 aft-spbo\" style=\"width:$this->A_5180;\">$this->A_515F</td>";
echo"<td style=\"width:".$this->A_518E.";\">&nbsp;</td>";
echo"<td class=\"afl2 aft-spbo\" style=\"width:$this->A_5182;\">$this->A_5176</td>";
echo"</tr></td>";
echo"<td class=\"afr2\" style=\"width:$this->A_5180\">";
echo"<input type=\"text\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$this->A_5198\" class=\"afi\" style=\"width:100%;\"";
if($this->A_5190!=0)echo" maxlength=\"$this->A_5190\"";
echo" />";
echo"<td style=\"width:".$this->A_518E.";\">&nbsp;</td>";
echo"<td class=\"afr2\" style=\"width:$this->A_5182\">";
echo"<input type=\"text\" name=\"$this->A_518D\" onchange=\"af_update('$this->A_518D,0)\" value=\"$this->A_5143\" class=\"afi\" style=\"width:100%;\"";
if($this->A_5194!=0)echo" maxlength=\"$this->A_5194\"";
echo" />";
echo"</td></tr>";
if(!empty($this->A_5133))echo"<tr><td colspan=\"3\" class=\"afr2\"><div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div></td></tr>";
if($A_5139&&$A_5119)
{
echo"<tr><td colspan=\"3\" class=\"afr2\"><div class=\"aft-error\">$this->A_50FE</div></td></tr>";
}
else
{
if($A_5139&&$A_5119_2)echo"<tr><td colspan=\"3\" class=\"afr2\"><div class=\"aft-error\">$this->A_50FE</div></td></tr>";
}
if($A_5139&&$A_511A&&$A_5119==false)echo"<tr><td colspan=\"3\" class=\"afr2\"><div class=\"aft-error\">$this->A_515D</div></td></tr>";
if($A_5139&&$A_511A_2&&$A_5119_2==false)echo"<tr><td colspan=\"3\" class=\"afr2\"><div class=\"aft-error\">$this->A_515C</div></td></tr>";
echo"</table></td></tr>\n";
}
else
{
// normal
echo"<tr><td colspan=\"2\" style=\"padding:0;\"><table class=\"aft2\"><tr>";
echo"<td class=\"afl2 afl-lab\" style=\"width:$this->A_5189;\">$this->A_515F</td>";
echo"<td class=\"afr2\" style=\"width:$this->A_5180\">";
echo"<input type=\"text\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$this->A_5198\" class=\"afi\" style=\"width:100%;\"";
if($this->A_5190!=0)echo" maxlength=\"$this->A_5190\"";
echo" />";
echo"<td style=\"width:".$this->A_518E.";\">&nbsp;</td>";
echo"<td class=\"afl2 afl-lab\" style=\"width:$this->A_5181;\">$this->A_5176</td>";
echo"<td class=\"afr2\" style=\"width:$this->A_5182\">";
echo"<input type=\"text\" name=\"$this->A_518D\" onchange=\"af_update('$this->A_518D',0)\" value=\"$this->A_5143\" class=\"afi\" style=\"width:100%;\"";
if($this->A_5194!=0)echo" maxlength=\"$this->A_5194\"";
echo" />";
echo"</td></tr>";

if(!empty($this->A_5133))echo"<tr><td>&nbsp;</td><td colspan=\"4\" class=\"afr2\"><div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div></td></tr>";
if($A_5139&&$A_5119)
{
echo"<tr><td>&nbsp;</td><td colspan=\"4\" class=\"afr2\"><div class=\"aft-error\">$this->A_50FE</div></td></tr>";
}
else
{
if($A_5139&&$A_5119_2)echo"<tr><td>&nbsp;</td><td colspan=\"4\" class=\"afr2\"><div class=\"aft-error\">$this->A_50FE</div></td></tr>";
}
if($A_5139&&$A_511A&&$A_5119==false)echo"<tr><td>&nbsp;</td><td colspan=\"4\" class=\"afr2\"><div class=\"aft-error\">$this->A_515D</div></td></tr>";
if($A_5139&&$A_511A_2&&$A_5119_2==false)echo"<tr><td>&nbsp;</td><td colspan=\"4\" class=\"afr2\"><div class=\"aft-error\">$this->A_515C</div></td></tr>";
echo"</table></td></tr>\n";
}}
}
class A_5156 extends A_519E
{
public function A_5165()
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
if($A_5119&&$this->A_5107)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
$this->A_512C ();
echo"\n<select size=\"1\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" class=\"afi-drop\" style=\"width:$this->A_5186;\">";
$elements=count($this->A_5145);
for ($i=0;$i<$elements;$i++)
{
$elementvalue=$this->A_5145[$i];
$elementname=$this->A_513C[$i];
$selected='';
if(is_array($value)){if(in_array($elementvalue,$value))$selected=" selected=\"selected\"";}else{if($value==$elementvalue)$selected=" selected=\"selected\"";}
echo"<option$selected value=\"$elementvalue\">$elementname</option>";
}
echo"</select>\n";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_516A extends A_519E
{
public function A_5165()
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
if($A_5119&&$this->A_5107)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
$this->A_512C ();
echo"\n<select size=\"$this->A_5192\" name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" class=\"afi\" style=\"width:$this->A_5186;\">";
$elements=count($this->A_5145);
for ($i=0;$i<$elements;$i++)
{
$elementvalue=$this->A_5145[$i];
$elementname=$this->A_513C[$i];
$selected='';
if(is_array($value)){if(in_array($elementvalue,$value))$selected=" selected=\"selected\"";}else{if($value==$elementvalue)$selected=" selected=\"selected\"";}
echo"<option$selected value=\"$elementvalue\">$elementname</option>";
}
echo"</select>\n";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_5172 extends A_519E
{
public function A_5165()
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
if($A_5119&&$this->A_5107)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
$this->A_512C ();
echo"\n<select multiple size=\"$this->A_5192\" name=\"".$this->A_519B."[]\" onchange=\"af_update('".$this->A_519B."[]',1)\" class=\"afi\" style=\"width:$this->A_5186;\">";
$elements=count($this->A_5145);
for ($i=0;$i<$elements;$i++)
{
$elementvalue=$this->A_5145[$i];
$elementname=$this->A_513C[$i];
$selected='';
if(is_array($value)){if(in_array($elementvalue,$value))$selected=" selected=\"selected\"";}else{if($value==$elementvalue)$selected=" selected=\"selected\"";}
echo"<option$selected value=\"$elementvalue\">$elementname</option>";
}
echo"</select>\n";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_5158 extends A_519E
{
public function A_5165()
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
if($A_5119&&$this->A_5107)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
$this->A_512C ();
$elements=count($this->A_5145);
for ($i=0;$i<$elements;$i++)
{
$elementvalue=$this->A_5145[$i];
$elementname=$this->A_513C[$i];
$selected='';
if(is_array($value)){if(in_array($elementvalue,$value))$selected=" checked=\"checked\"";}else{if($value==$elementvalue)$selected=" checked=\"checked\"";}
echo"<div class=\"afi-cht\"><div class=\"afi-chl\"><input type=\"radio\"$selected name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$elementvalue\" class=\"afi-el\" /></div><div class=\"afi-chr\">$elementname</div></div>";
if (i+1<$elements)echo"<div class=\"aft-spv\"></div>";
}
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_5162 extends A_519E
{
public function A_5165()
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
if($A_5119&&$this->A_5107)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
$this->A_512C ();
$elements=count($this->A_5145);
for ($i=0;$i<$elements;$i++)
{
$elementvalue=$this->A_5145[$i];
$elementname=$this->A_513C[$i];
$selected='';
if($i!=0)echo"&nbsp;";
if(is_array($value)){if(in_array($elementvalue,$value))$selected=" checked=\"checked\"";}else{if($value==$elementvalue)$selected=" checked=\"checked\"";}
echo"<input type=\"radio\"$selected name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$elementvalue\"";
if($i==0)echo"class=\"afi-el\"";else echo"class=\"afi-en\"";
echo" />$elementname";
}
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_5155 extends A_519E
{
public function A_5165()
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
if($A_5119&&$this->A_5107)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
$this->A_512C ();
$elements=count($this->A_5145);
for ($i=0;$i<$elements;$i++)
{
$elementvalue=$this->A_5145[$i];
$elementname=$this->A_513C[$i];
$selected='';
if(is_array($value)){if(in_array($elementvalue,$value))$selected=" checked=\"checked\"";}else{if($value==$elementvalue)$selected=" checked=\"checked\"";}
echo"<div class=\"afi-cht\"><div class=\"afi-chl\"><input type=\"checkbox\"$selected name=\"".$this->A_519B."[]\" onchange=\"af_update('".$this->A_519B."[]',1)\" value=\"$elementvalue\" class=\"afi-el\" /></div><div class=\"afi-chr\">$elementname</div></div>";
if (i+1<$elements)echo"<div class=\"aft-spv\"></div>";
}
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_5163 extends A_519E
{
public function A_5165()
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
if($A_5119&&$this->A_5107)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
$value=$this->A_5198;
if(!is_array($value)&&!empty($value))$value=explode(',',$value);
if(empty($value))$A_5119=true;
if(is_array($value)){if(empty($value[0]))$A_5119=true;}
$this->A_512C ();
$elements=count($this->A_5145);
for ($i=0;$i<$elements;$i++)
{
$elementvalue=$this->A_5145[$i];
$elementname=$this->A_513C[$i];
$selected='';
if($i!=0)echo"&nbsp;";
if(is_array($value)){if(in_array($elementvalue,$value))$selected=" checked=\"checked\"";}else{if($value==$elementvalue)$selected=" checked=\"checked\"";}
echo"<input type=\"checkbox\"$selected name=\"".$this->A_519B."[]\" onchange=\"af_update('".$this->A_519B."[]',1)\" value=\"$elementvalue\" ";
if($i==0)echo"class=\"afi-el\"";else echo"class=\"afi-en\"";
echo" />$elementname";
}
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_5157 extends A_519E
{
public function A_5165()
{
return false;
}
public function A_519D ($A_5139)
{
$this->A_512C ();
$checked='';if($this->A_5198==$this->A_518D)$checked=" checked=\"checked\"";
echo"<div class=\"afi-cht\"><div class=\"afi-chl\"><input type=\"checkbox\"$checked name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$this->A_518D\" class=\"aft-el\" /></div><div class=\"afi-chr\">$this->A_5189</div></div>";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
echo"</td></tr>\n";
}}
class A_5164 extends A_519E
{
public function A_5165()
{
$A_5119=false;
if(empty($this->A_5198)||$this->A_5198!=$this->A_518D)$A_5119=true;
if($A_5119&&$this->A_5107)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
if(empty($this->A_5198)||$this->A_5198!=$this->A_518D)$A_5119=true;
$this->A_512C ();
$checked='';if($this->A_5198==$this->A_518D)$checked=" checked=\"checked\"";
echo"<div class=\"afi-cht\"><div class=\"afi-chl\"><input type=\"checkbox\"$checked name=\"$this->A_519B\" onchange=\"af_update('$this->A_519B',0)\" value=\"$this->A_518D\" class=\"afi-el\" /></div><div class=\"afi-chr\">$this->A_5189</div></div>";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_515B extends A_519E
{
public function A_5165()
{
$A_511A=false;
$A_5119=false;
$len=A_5187($this->A_5198);
if ($len==0&&$this->A_5107)$A_5119=true;
if ($this->A_5107==false&&$len==0)$A_511A=false;
if ($this->A_5198=="<ERROR>")$A_511A=true;
if($A_511A||$A_5119)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_511A=false;
$A_5119=false;
$len=A_5187($this->A_5198);
if ($len==0&&$this->A_5107)$A_5119=true;
if ($this->A_5107==false&&$len==0)$A_511A=false;
if ($this->A_5198=="<ERROR>"){$A_511A=true; $this->A_5198="";}
$value=$this->A_5198;
$this->A_512C ();
echo"<input type=\"file\" name=\"AF_".$this->A_519B."_UF\"  onchange=\"af_update('$this->A_519B',0)\" class=\"afi2\" style=\"width:$this->A_5186;\"";
echo" />";
echo"<input type=\"hidden\" name=\"$this->A_519B\" value=\"$value\">";
if(!empty($value))echo"<div class=\"aft-spc\">$this->A_518D $value</div>";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
if($A_5139&&$A_511A&&$A_5119==false)echo"<div class=\"aft-error\">$this->A_5151</div>";
echo"</td></tr>\n";
}}
class A_5154 extends A_519E
{
public function A_514B($value)
{
$len=A_5187($value);
if ($len==0)return false;
for ($i=0;$i<$len;$i++){if(A_517C('0123456789',$value[i])===FALSE)return false;}
return true;
}
public function A_5165()
{
if (!$this->A_514B($this->A_5182))return true;
if (!$this->A_514B($this->A_518E))return true;
if (!$this->A_514B($this->A_5167))return true;
return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
if (!$this->A_514B($this->A_5182))$A_5119=true;
if (!$this->A_514B($this->A_518E))$A_5119=true;
if (!$this->A_514B($this->A_5167))$A_5119=true;
$this->A_512C ();
echo"<select size=\"1\" name=\"".$this->A_519B."_DAY\" onchange=\"af_update('".$this->A_519B."_DAY',0)\" class=\"afi-drop\">";
if ($this->A_5107) echo"<option> </option>";
for ($i=1;$i<=31;$i++)
{
echo"<option";
if($i==$this->A_5182)echo' selected>';else echo'>';
echo"$i</option>";
}
echo "</select>&nbsp;\n";
echo"<select size=\"1\" name=\"".$this->A_519B."_MONTH\" onchange=\"af_update('".$this->A_519B."_MONTH',0)\" class=\"afi-drop\">";
if ($this->A_5107) echo"<option> </option>";
for ($i=0;$i<12;$i++)
{
$im=$i+1;
$month=$this->A_5181[$i];
echo"<option value=\"$im\"";
if($im==$this->A_518E)echo' selected>';else echo'>';
echo"$month</option>";
}
echo "</select>&nbsp;\n";
echo"<select size=\"1\" name=\"".$this->A_519B."_YEAR\" onchange=\"af_update('".$this->A_519B."_YEAR',0)\" class=\"afi-drop\">";
if ($this->A_5107) echo"<option> </option>";
for ($i=$this->A_5192;$i<=$this->A_5196;$i++)
{
echo"<option";
if($i==$this->A_5167)echo' selected>';else echo'>';
echo"$i</option>";
}
echo "</select>\n";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE --$this->A_5182 $this->A_518E $this->A_5167</div>";
echo"</td></tr>\n";
}}
class A_516C extends A_519E
{
public function A_517B($d,$m,$y)
{   
if(($m=(date('m')-$m))<0){$y++;}else{if($m==0&&date('d')-$d<0)$y++;}
return date('Y') - $y;
}
public function A_514B($value)
{
$len=A_5187($value);
if ($len==0)return false;
for ($i=0;$i<$len;$i++){if(A_517C('0123456789',$value[i])===FALSE)return false;}
return true;
}
public function A_5165()
{
if (!$this->A_514B($this->A_5182))return true;
if (!$this->A_514B($this->A_518E))return true;
if (!$this->A_514B($this->A_5167))return true;
$age=$this->A_517B($this->A_5182,$this->A_518E,$this->A_5167);
if($age<$this->A_5193||$age>$this->A_5199)return true;else return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
if (!$this->A_514B($this->A_5182))$A_5119=true;
if (!$this->A_514B($this->A_518E))$A_5119=true;
if (!$this->A_514B($this->A_5167))$A_5119=true;
$A_511A=false;
$age=$this->A_517B($this->A_5182,$this->A_518E,$this->A_5167);
if($age<$this->A_5193||$age>$this->A_5199)$A_511A=true;
$this->A_512C ();
echo"<select size=\"1\" name=\"".$this->A_519B."_DAY\" onchange=\"af_update('".$this->A_519B."_DAY',0)\" class=\"afi-drop\">";
if ($this->A_5107) echo"<option> </option>";
for ($i=1;$i<=31;$i++)
{
echo"<option";
if($i==$this->A_5182)echo' selected>';else echo'>';
echo"$i</option>";
}
echo "</select>&nbsp;\n";
echo"<select size=\"1\" name=\"".$this->A_519B."_MONTH\" onchange=\"af_update('".$this->A_519B."_MONTH',0)\" class=\"afi-drop\">";
if ($this->A_5107) echo"<option> </option>";
for ($i=0;$i<12;$i++)
{
$im=$i+1;
$month=$this->A_5181[$i];
echo"<option value=\"$im\"";
if($im==$this->A_518E)echo' selected>';else echo'>';
echo"$month</option>";
}
echo "</select>&nbsp;\n";
echo"<select size=\"1\" name=\"".$this->A_519B."_YEAR\" onchange=\"af_update('".$this->A_519B."_YEAR',0)\" class=\"afi-drop\">";
if ($this->A_5107) echo"<option> </option>";
for ($i=$this->A_5192;$i<=$this->A_5196;$i++)
{
echo"<option";
if($i==$this->A_5167)echo' selected>';else echo'>';
echo"$i</option>";
}
echo "</select>&nbsp;\n";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_511A&&!$A_5119)echo"<div class=\"aft-error\">$this->A_5151</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_516D extends A_519E
{
public function A_514B($value)
{
$len=A_5187($value);
if ($len==0)return false;
for ($i=0;$i<$len;$i++){if(A_517C('0123456789',$value[i])===FALSE)return false;}
return true;
}
public function A_5165()
{
if (!$this->A_514B($this->A_518E))return true;
if (!$this->A_514B($this->A_5167))return true;
return false;
}
public function A_519D ($A_5139)
{
$A_5119=false;
if (!$this->A_514B($this->A_518E))$A_5119=true;
if (!$this->A_514B($this->A_5167))$A_5119=true;
$this->A_512C ();
echo"<select size=\"1\" name=\"".$this->A_519B."_MONTH\" onchange=\"af_update('".$this->A_519B."_MONTH',0)\" class=\"afi-drop\">";
if ($this->A_5107) echo"<option> </option>";
for ($i=0;$i<12;$i++)
{
$im=$i+1;
$month=$this->A_5181[$i];
echo"<option value=\"$im\"";
if($im==$this->A_518E)echo' selected>';else echo'>';
echo"$month</option>";
}
echo "</select>&nbsp;\n";
echo"<select size=\"1\" name=\"".$this->A_519B."_YEAR\" onchange=\"af_update('".$this->A_519B."_YEAR',0)\" class=\"afi-drop\">";
if ($this->A_5107) echo"<option> </option>";
for ($i=$this->A_5192;$i<=$this->A_5196;$i++)
{
echo"<option";
if($i==$this->A_5167)echo' selected>';else echo'>';
echo"$i</option>";
}
echo "</select>\n";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
if($A_5139&&$A_5119)echo"<div class=\"aft-error\">$this->A_50FE</div>";
echo"</td></tr>\n";
}}
class A_5174 extends A_519E
{
public function A_519D ($A_5139)
{echo"<tr><td colspan=\"2\" class=\"afr2\">&nbsp;</td></tr>\n";}
}
class A_5169 extends A_519E
{
public function A_519D ($A_5139)
{
if($this->A_517A=="HIDELEFT")
{
echo"<tr><td class=\"afl\">&nbsp;</td><td class=\"afr\">";
}
else
{
echo"<tr><td colspan=\"2\" class=\"afr2\">";
}
echo $this->A_5116($this->A_5186)."</td></tr>\n";
}}
class arclabform_input53 extends A_519E
{
public function A_519D ($A_5139)
{
$style="";
if(!empty($this->A_518D))$style.="font-size:$this->A_518D;";
if(!empty($this->A_517F))$style.="color:$this->A_517F;";
if(!empty($this->A_5181))$style.="font-weight:$this->A_5181;";
if(!empty($this->A_5182))$style.="text-align:$this->A_5182;";
if(!empty($this->A_5189))$style.="margin-top:$this->A_5189;";
if(!empty($this->A_5180))$style.="margin-bottom:$this->A_5180;";
if(!empty($style))$style=" style=\"$style\"";
if($this->A_517A=="HIDELEFT")
{
echo"<tr><td class=\"afl\">&nbsp;</td><td class=\"afr\">";
}
else
{
echo"<tr><td colspan=\"2\" class=\"afr2\">";
}
echo"<h$this->A_5196$style>$this->A_5186</h$this->A_5196>";
if($this->A_5192==1)echo"<hr>";
if(!empty($this->A_5133))echo"<div class=\"aft-spc\">".$this->A_5116($this->A_5133)."</div>";
echo"</td></tr>\n";
}}
class A_516B extends A_519E
{
public function A_519D ($A_5139)
{echo"<tr><td colspan=\"2\" class=\"afr2\">$this->A_5186</td></tr>\n";}
}
class A_5178 extends A_519E
{
public function A_519D ($A_5139)
{echo"<tr><td colspan=\"2\" class=\"afr2\">$this->A_5186</td></tr>\n";}
}
class A_516E extends A_519E
{
public function A_519D ($A_5139)
{echo"<tr><td colspan=\"2\" class=\"afr2\">$this->A_5186</td></tr>\n";}
}
class A_5175 extends A_519E
{
public function A_519D ($A_5139)
{
echo"<tr><td colspan=\"2\" class=\"afr2\"><div style=\"text-align:$this->A_518D;\">";
if(!empty($this->A_517F))echo"<a href=\"$this->A_517F\" target=\"_blank\">";
echo"<img src=\"$this->A_5186\"";
if($this->A_5192!=0)echo" width=\"$this->A_5192\"";
if($this->A_5196!=0)echo" height=\"$this->A_5196\"";
echo">";
if(!empty($this->A_517F))echo"</a>";
echo"</div></td></tr>";
}}
$A_50F1=null;
class A_5166 extends A_519E
{
public function A_5165()
{
if (isset($_POST['g-recaptcha-response']))
{
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$this->A_5180."&response=".A_5135($_POST['g-recaptcha-response']));
    $response = json_decode($response, true);
if($response["success"] === true)
{$GLOBALS['A_50F1']=null; return false;}
else
{$GLOBALS['A_50F1']="ERROR"; return true;}
}
else {$GLOBALS['A_50F1']="no-input"; return true;}
}
public function A_519D ($A_5139)
{
if($this->A_517A=="HIDELEFT")
{echo"<tr><td class=\"afl\">&nbsp;</td><td class=\"afr\">\n";}
else
{echo"<tr><td colspan=\"2\" class=\"afr2\">\n";}
if ($this->A_518E=="dark")
{echo ("<div class=\"g-recaptcha\" data-sitekey=\"$this->A_5189\" data-theme=\"dark\"></div>");}
else
{echo ("<div class=\"g-recaptcha\" data-sitekey=\"$this->A_5189\"></div>");}
echo ("<script type=\"text/javascript\" src=\"https://www.google.com/recaptcha/api.js?hl=$this->A_5181\"></script>");
if($A_5139&&$GLOBALS['A_50F1']!=null) echo"<div class=\"aft-error\">".$this->A_50FE."</div>";
echo"\n</td></tr>\n";
$GLOBALS['A_50F1']=null;
}}
class A_5177 extends A_519E
{
public $A_514E=array("SEBP1FIXNHD34WATK2Y9MCRVL8","CFYAPKL2HS9ETVIR43NBXMDW18","D93WH1BNECILVAXSRMFYTKP248","VLK9RIYSTXAPEBM4WN23DHC1F8","E1PSMIHBWNTX2DLV4C9KYRFA38","CP3TNR2DFMAVKSW1EB94YLHXI8","BS34Y2ED1R9CKVATPHWNFXLIM8","N9PM13E4XCYTBKWFLHISAVDR28","FBAE2D4M1IY3PKLSW9NCXTHVR8","IY1RED9XLWAFPBS3HK4NMV2TC8","KXHIPEWL9B1AFYCVMDNR4T2S38","TAS9ILVCEB3KFXRYPHMN42DW18","9AYCNS1BHP4LXEKIVF3R2WMDT8","143APXIRVCM92EWKSFDTLBHNY8","D9LSTNWVXY3BAFE2PKMHC41IR8","2KF3TV4MN1DYEPBCWLRXI9SAH8","NXK3HCI41RSTADVWMYBPEF92L8","PWAFYVE4X3S9KLBCTIN1DM2RH8","HMK2TP9DWRXSYVLEI3BC1A4FN8","49KWBRNYLDIPVTSXH3A1CE2FM8","EFSI1PXM9LYH3WCTVRDANB4K28","KRLYTBC21PNWVMI94FDXAEH3S8","STD2LFMB4CR9VKIYNEW1H3XAP8","BHCDPS9NYIWFLMR4X1A3KT2EV8","TAICNMW12VYHSEBR943PXLDFK8","FN9M4EK1RD3CTSPABYWLXH2VI8","XVD3WMHLBA92R1YTINF4CESPK8");
public $A_5153 = "ABCDEF2HI3KLMN9P1RST4VWXY8";
public function A_5165()
{
if(!isset($this->A_5198[4])) return true;
$A_513D=$this->A_5186;
$key6=A_517C($this->A_514E[0],$A_513D[0]);
$pngtext=$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[1])].$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[2])].$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[3])].$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[4])].$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[5])];
if(strtoupper($this->A_5198)==$pngtext) return false; else return true;
}
public function A_519D ($A_5139)
{
$A_5131=rand(0,5);
$A_5128=$A_5131+rand(1,5);
$A_5134=$A_5128+rand(1,5);
$A_511C=$A_5134+rand(1,5);
$A_5130=$A_511C+rand(1,5);
$A_5129=rand(1,25);
$hash=$A_5131+$A_5128+$A_5134+$A_511C+$A_5130;
$hash=$hash*64;
$A_5101=$this->A_514E[0][$A_5129].$this->A_514E[0][$A_5131].$this->A_514E[0][$A_5128].$this->A_514E[0][$A_5134].$this->A_514E[0][$A_511C].$this->A_514E[0][$A_5130];
$A_510E=$this->A_514E[0][$A_5129].$this->A_514E[$A_5129][$A_5131].$this->A_514E[$A_5129][$A_5128].$this->A_514E[$A_5129][$A_5134].$this->A_514E[$A_5129][$A_511C].$this->A_514E[$A_5129][$A_5130];
$_SESSION['arclabimg']=$A_510E;
$img_url=$GLOBALS['A_513E']."&amp;ahash=$hash";
if($this->A_517A=="HIDELEFT")
{
echo"<tr><td class=\"afl\">&nbsp;</td><td class=\"afr\">";
}
else
{
echo"<tr><td colspan=\"2\" class=\"afr2\">";
}
echo"<img src=\"".$img_url."\" width=\"133\" height=\"42\" alt=\"Captcha\">";
echo"<div class=\"aft-spc\">".$this->A_5133."</div>";
echo"<div class=\"aft-spc\"><input type=\"text\" name=\"".$this->A_519B."\" class=\"afi\" size=\"5\" maxlength=\"5\" /></div>";
if($A_5139) echo"<div class=\"aft-error\">".$this->A_50FE."</div>";
echo"</td></tr>\n";
}
public function A_519F_5 ($pngtext)
{
$pngsource='iVBORw0KGgoAAAANSUhEUgAAAnAAAAASCAIAAABU0nSMAAAAK3RFWHRDcmVhdGlvbiBUaW1lAEZyIDExIE5vdiAyMDExIDIxOjI5OjEyICswMTAwOqAqNAAAAAd0SU1FB9sLDQImB2+pbWkAAAAJcEhZ'
.'cwAATiAAAE4gARZ9md4AAAAEZ0FNQQAAsY8L/GEFAAAX5ElEQVR42u2dd3gUVRfGA6GoKAKBUENAlBA0IEoVEkCQHkMJoYXQglRFpEMCKiKdgHSUHmpACCC9Kb0LUUE60glSYqICKt/v2ft888wzMzt7'
.'Z3YJ/JHzB8/uzM7Jveee8573vTO7ZHr8+LFXhmVYhmVYhmVYhrlnWWQ+lJaW9u677+bMmdPX13f27NnPPfec/B8IDAz09/d/+eWXef3XX3/98ccfL774Yvny5du2bfvKK69YGuvly5fXr19/8uTJc+fO'
.'/fvvv0WLFq1Ro0bDhg1feukleyPJmjUrY6hdu3ZYWBivrc4oc+bM//zzj3Kct88//zx+vv76axvxUXuz4YrpLFy48Pjx45cuXcqUKVPBggVDQkKaNWsmGZxn1pjX4sWLjx49eu3atSxZslStWrVdu3b5'
.'8uV72uN6+kb+k719+/Zt1KiR/iyr/+qrr86ZM0fSGwW1atWqXbt23bhxw9vbm7Rs1aoVHiwNSZ3Mjx49evDgQWpqaoECBapUqYI3e6sWFxeXlJQkPxGX46GyypQpExkZ+cYbb7i7BhYHU7hwYdCPkRBt'
.'khkgzZYtG6f+++8/XluFDsU2bdq0bNkyeyF6Ruzjjz/evXv3O++8M378eDUUs2Rdu3YlXNWrV+/UqZO5k549e+7fv79BgwbDhg0jhzVncdK/f//k5ORq1ap98MEHloZ36NCh+fPn03dYNZKHkThrXlIN'
.'NTExkXFQGCw/0Ma05YfCheT033//fevWLTDx3r17xIt+RnccMmRI8eLFJf1MmjRp5cqVgAjpCMhS9jdv3rx9+zbL0KtXr9dee83qSHBCmV28eJG39CGASfRaeT+8uHPnjiLx8Ub38vHxsbRUht6suiIU'
.'EREROXLkyJUrF5WJt6tXr27evPns2bP9+vWTnJeXKxS2itHuXwj8NWnSpFChQoJt/PrrrxwhrQcNGkQmuD+GJUuWLF++PHfu3HXr1m3RosWTnk5QUNB7770Hm6xVq1b+/Pn1H4AMAY6kAcs3efJkc298'
.'BoJLF6xcuXLevHk1Z+/evSs/MGL70UcfkYHkD+X5+++/kzxnzpzp0qULDEbejzqZcfLnn3+mpKQAGsyIqbFq+nGa26xZs/bt22ebFBqOhwk+fPgQ6KDkS5UqJeMHrFi7dq1gdbyGsJIALGKdOnXkifiV'
.'K1fu379PedIkKHM/Pz9yGK0C/nCcRmsVOoT99NNP8+bNgyXIX4KEeOGFF6ZMmWJYRCgWVor2P3LkSMPLkTGsCEsDa1cfB9JDQ0PJSQpq+vTpefLkUZ89f/48QI3bMWPG6H1+8cUXZBopTT4DZcrxCRMm'
.'sGosYps2bVzOCyfUwokTJ7Zs2VKvXj3NWQoW/4xZxpXafvjhBzpoQEAA1cFgmMiXX37prHlJNVSkD42wUqVKP//8s+AR8qMRrHDjxo3KEVB+6NChkDLgbPDgwTJOvvrqK2QKOVeuXDkkKWUABEBGRo8e'
.'ffDgwYkTJ8bExGhWV2YkFNXOnTvJHrKcDBg4cKC9GbljHvHG9Fl1cghYBK8JDvPq0aMH5UrcunXrJunHHIUtYbRHLhwxYgQToadCOdETsJ8+ffqAj/Hx8ZKZox4DOKg+8v3338+YMaNkyZJvvvmmfDd1'
.'ZzpgH1Ty+vXrTKFjx476D0DPyWfSGzbt0hsVBEZTEcgaclhzlj8k40QYcQDIAMoOHTq8/fbb2bNnp7iAp0WLFtE5DHu/oRkm848//ogguHDhAoSYDi0f5FGjRm3bto11B8XsBdxwPKdOnSJ5iF5CQkJs'
.'bKxLJ7BVIJgmATGlEdJQf/vtN1IRdGax6MqS/Z4L1W9BZ2gidMHe1ITBEtB2xYoVY7nlr0KiIbngB4YNdfXq1WIT0dnlSDTo0S+//KKBXMEFGQzMnk4RHBysOcvx119/3dAnfxEJWLNmTcJCBpYoUYKD'
.'6Byugit07txZZluUa2EJ1DJNvXTp0urZUXr4h5pHRkYyDEtBpneydu3atXv//fdJABoz0QOCDJMns0t3QgUiTwFoChj+oskMc4MKaWgpJUqDJAOIl4wHFMm0adOQ2FAb8FSQSqQ3aQFtLFy4MGm9YMEC'
.'mZFoOCADCw8P37FjB7mF+qHy7c3IHfOItxUrVvAvRBWCJraSaK6gIShG25D3Y47CljDaIxcuXbqUC+GDYneOWp05cyZ0XnKl1AYoq8cgtHuRIkVIia5du6bPdDCwmAQ+cuTIo0ePNKfossyXsxStZAsB'
.'62EDlCR0SnOKhiH/eARYA6IRB7gy3ZQjJBJIDSGjpcnPTl9iGCMEg+hAe/bskfTDiqOi+NNly5Y9ffq07YZqWFxEGHXF1GgJMk6IA+2BhgoHmj17NgwPuGCEDIzXhM7e2KhTjYazavBmOg09lTbGdOQv'
.'bNy4MXOHMxmeXbNmDQoeoubs8pCQEMiEPnqsF8crVKiQkpJCiDRnt2/fni1bNvirM7fkCbx5/fr1cXFxDx1GtOnZ7du3l9mAFEbatG7dGpEKGColRqAodjoFI6dbW40zgaIHh4WFURpAa1RUFKVKhzb8'
.'sOuGSpGDO61atYKgkYvM09lKGBqDIBc1B0kmeIckU4B0MA3os2Esxo4dC++Q2dXkL4Ia+uPMLjo6mqKVnJfhjGybR7xB50FPjZIAE61yMVDY/AP2HmGzBO5qgxBwobqcUJne3t6WNriEUVTKGGjJSCWg'
.'H1dDhw7V3255QtPBKHK4KSJVzwkQUsnJySQ5tJWKlXQI4wa/li9frtHN/zlM0gmDYVSVKlVSH4SwQp0tcRfWxVCuwYdITj2HcGZoAhYa2Q2kQhpsR9tZccGHOCXpdt26deAPeh22QYf2ciihRo0aLVmy'
.'BFRdvHixvbERq5w5c9q7VtiECROArAEDBiA55BPGy9G6mP6tW7egd5pTiBxkPYtl8oALTesXh2loJQkMDnfo0IH01vQbqo9EAmODgoJMBgZ3QRmjBFBKNGDSLyAgwNLukZejI1DgSUlJMANxZNKkSZBg'
.'FtHqrVNhdA3WXdnfypo1K2/FzW+9uW6o3377LYhWv359XoeGhrIGCF750dCANXE/f/48QhMUq1WrlowHaCCTqVKliuFZ9G5iYqKkyNBs+imGnoNBw0Ptzcgd86w3tZHxvr6+ZKT8JeS9SXeh/p0F0Nws'
.'gbuJUSQ9e/YklWGLVq8Vz6SIOXbv3p1pwjaAJAGR6Tkd8Agiry+ilStXArINGzakhUj2HrEPCUwcPnw4Pj7e9pCICdHQ3w6E+AK7liJjCDTAq6/DJP0kJCTQKpo1a+bl4HCWnoJUm2FxMRiUEG4lb6B6'
.'ORqznsNxOepw79699sbm7TB713o5blh89913PXr0aNmyJcsnfytXWPPmzWl7+iQE7emmzsBWGHyibNmyqampZ8+eVQ6yXmRjmzZtkDfFixcngWHDytndu3dzVYkSJQwljdrmzp3LZ1ggcoB06t27t9XI'
.'kC1wnU2bNiF2Ee6ME7nMX4elOeuC5oZEhrOiv5kUGbVq1arMmTM7a14u7qESMnC5cePGYgeAxhMbGwshouYl76wwH4hG586dWXWa1smTJ8lCgk7ISAUZD6dOnSpTpoy86rdh1AaDvHbtmqUZUau8Vh4j'
.'svGIr6E32640xuV0izp16shfQrqon1vWGCvuDgS4Y1BOf39/hkdNfvrpp02bNrXqgdIiaXkxcuRIsrp06dL48eDWvaQBFkwhX758J06cQFUorYKlP3DgQEREBMoA1iKDj2CEuCPVoEEDdNK+ffuQUMou'
.'DlkkPyoUJAIXpquusi1btjBaS/d39PmDKDly5MiMGTNIaZNdRI2Fh4er31rtFoopxUWoUQJ37tzhBRqa1ed4q1atJAcDQI8fPx6pVLJkyadVAmq7cuUKOgxU/OSTT7wc/d5lo9IYZGXBggUHDx4UrEUx'
.'mnSRIkUqV65sfjmkEA4HNVH4+tatW9E2ISEhvCYJd+zYgT5RHttBFFFrMo9V8zGAi44TGBg4cOBA+Qcq1YYE79+/P0tWoUIFZAC1AIEw2W02N0IN3Vy4cOG8efNoRvDCjh074tDwwy4a6tKlSyn+ihUr'
.'ijSCsdaoUQN0o3qZs8xo0NrwcTo8V8FZyGkvx50kyFGlSpWc3aNWGzXg5+dnY5dP3sT9DEn+osyIcmVS9p7LNfFm25Xa5syZw9rXr1/f0lOahlyB17dv37537x7F84TEtEuDTZMDtB+qlJwEtUloSz2D'
.'6SC2IK1ix4Xip0On8yxYVlHVwcHBe/bsUT8wn5iYCJCJfSDAUWavHm8FChQQrydOnAiWAZGskcBWPMhvJ9Aqxo0bN3/+/KioKPo9q0w3HT16NKBmaYLq/GHJYKiwZxYLUGNgTZo0sRE0ZIq9fRGv/xcX'
.'QyJ7YVEgCSwE+cVg6KaSX9ubPHkySgB0RmaROYULFy5WrFhQUBDt4ak0V2bRpUuXggUL0k0FKsKbrd7coeVwLRVx+vRppdOQkywWeegyMugz6ohiVPoxwaH5CTwnvQkaSkz5Qtf27dvpI/xRmbEhvhG7'
.'5MyZM2ds3PIURjOGHPTq1YuVQk9LijdDW716NXqXRIJ0EnyyEaKAW8Pm5aKhQs3QJRs2bICA4I4+ikd0qnxDhV1SEupHG6BXYCIQwHIOHTqU2Zp7gLPQ6qC6NnbnJA0gYAkl/etn5I551pswmNS0adNC'
.'Q0N79Ohh6UJDrgA4svQPHjwAqSk2D45T3kqVKpWUlOTlSJ4OHTqQ4rByyQwURpBv3LgxatQo6gGERY2R1aKBpZsRQKGJgaGZM2eqGyoVS4MUD0YScBlNBp9QKCBuBw8eHBcXl5CQQHw4Qq+FJkoOrG/f'
.'vgyAhrp3715YC4G6dOlSdHQ00bbUzJT8wXgBe2YurB0aesCAAfbUhjsmigvsEm9Z/UGDBrEKH374ofz9Sz6P3lq3bt2yZcs2b94MANJTgVRqAfFqvjv6JKxbt270qj59+ij6j0ywcZsZSnrYYUpDXbVq'
.'FX1a5ksc1apVS05Ovnz5soDltLQ0GjO6VgjW8uXLE6Vz584BGtQpZ0kGCLHM7SeQcMKECWAXnyfazvqWSyP50ZQQIP40vd829YmPj6egGA+6GUIgbgb369cvNjZ22LBh+uZlxvG5ktGwVFTX8ePHjx07'
.'BsgSI7qpKDmZAVFF5J/6CIlIAU+ZMgWYprO69ICYYNn098+FMZ6dO3cioezFSxhrL/+0rX5G7phnvWFTp05FntasWTMmJsZqGind/cCBAwjcXx0GtUdn0GIRHE9LoSpG8kB+L1y4sHbtWqvXgu9MZ8iQ'
.'IbQu5gJ8qG/zpINR5IK0kdI+Pj4UFFEVAyPaFH+hQoW8HG1J0qG620VGRpJIsHLc8hZBIK/gaaLQC1g8a80LBvDZZ5+BGgzM0q8xKPlz6NAhIgyqPnr0CCaE2HXziVZ7pikuYAfQpztSI1ZdIbYAaIAC'
.'/dS9e3eoDJps1qxZVEo6Twq6DPyyQC1atKApBgYGChHfqVMnw+9iOTNYHRLzyJEjypEtW7YgW13u93o5MhntiO4Xz/ru2rXL19dXLdmrV68OJiMxeU3AySLatsstQHAG8U02wsBghBDf2bNnW7rpoDbx'
.'syTkgNXvrKttxIgRYM7YsWOFvGbi0AWYK3M3fB7NrOQWLVpEOrJyBw8eJPSs4mOHQa6hJ5J34509+Ie8YKrO2qTaateuDfCpF15t27dv/+abb5iwzGCc0W1giMWW/JUJZzOyZ86ePbZhpCOKn3WJiooi'
.'IDZImXl3Z+lt383yoKF4cufObeOrFBQqyQyOQDiuOGzGjBm2v5Jhw9SaMiwsjOQXzQ8gQxlUrFhRnHr48KG9Tc5p06bt379/+PDhdESUgcntcL2RhOQMQ2KVT5482bNnT7QL/MnSnoTH2aGbpiku0HDu'
.'3LkXL14E6EF5ez6B6fbt29NcySUgEfWT/vOCqaB2qHS0BHOBBoGQ169fB5blnYhdX0BDtD2YATkDpZPcCa9bty5/VzzICclA8avlGmfPnz9/4sQJL8dOMmdlbqBCCGif5cqVA8Gio6NRwDiBtdgOFH9X'
.'/reDDA0KDuCI78WqQ0eqAyD6z5s11HXr1uFIT1jq1avHPOmyMgMyefCP2ebKlculB5iX+MqXWHi1paWlgYnkgQyrYiSG/YBExDkYVK1aNXdmZM/ALI88ActykI6UR58+fchFe07MuzsoL7+L6BGDDEJ1'
.'qSv1QaAEwuvn52fVG0ghngZnjgkJCdBq0hiEtTEw23f1FNWIHARuxPf6jx49SkYp6Sf5iO+/DlMfofkNHDgQ5U1nZaXEU80yFhAQUKVKFQpBfXDr1q2MqkKFCvKz4/Mevy+jn6alazXFBTjCFWAMgJsM'
.'lwoKCqpfv/79+/f1p4BB6uXq1avpPC+hahgSdUEHhTahlni7fv16q9s2ERERdAXxnVFYHd1U/kd7RBcQDZXMyZEjh/qhsxo1aigNVZx1eTeUxkn3oq6R4FkcFh8fD2lISkpibPaCTKW7+d0kHx8flkmT'
.'AOfOnXvJYfrPO22o27ZtY0qoQ33zgOnDpu/cuSPzPRPIlIYpMz7k5siRI2lv5l9LElasWDFqAEY5fvx4+KB4Fhcis3HjRmQu6ENh6H9oSmYkt2/fTkxMpP0QtcDAQMnf9tT7cdPc//8JoIpNmzbNkydP'
.'TEzMW2+9ZduPeXe3DQG2LwwODmaNKDCB9ThB0sXFxbHomt9hcWl58+ZVU2+AdcmSJZs3b6Y9WxUrzpiZTByUtUboFC1adM2aNeJeIzxa7PcK/5Lh0mcOlQKW9e3b9+bNm/JbxyEhIYwBbiHaw61bt5Yu'
.'XQoaAkbiuU15exL/2YY7PvXXDhky5NSpU4jLTZs2ubwcwS2gRn8KSQBey0iCJx0r+rq977I3a9ZMYXWAOVmt+S6yiVFBkCfUJ+zE29vb399fSWAvB2jzFs4qzubPn58jJt4IJiyQKvj888+VT4qfAKI8'
.'V6xYIbOXqTf4q23uKyw8PFyoZHJGMF0aPIOkORp+8cSp4KCiGI0z0da6devY2Njdu3e7vGMMeyIW7du3ByYoVJBRefCPeGke2nZmdF8KYNmyZXQOempKSoq4sUdGQq6nTJki8wywfiR3794FdKgKaDjC'
.'TjLEih/NL9rY+7oLg7H0pWxDGzRoEFDIcrRt25bOQaIzL/EFPqvjMS9y2xBg78Lhw4ejk+Dd1BvZTGaLWDVwmCVXhEKTJI0aNerduzdKhRCVKFFC/kaLO4xKzVfatGmDoIQfpKamwlzVn5EJl7PMmT59'
.'OlqBspd/jHnYsGGUwOrVq48fP06cxeMk8LOJEyda2ozxSDJ70KfhtbRA5jtmzJi0tDTxW3cmHqAmZBqADtrAVOBkJBIIQCOZP38+rUJyW+uJxooEtrd1JLYuDx8+DLHLnj07K67Z2zQ3ZAxovHDhQvif'
.'/oFwUnrBggXibJkyZUz8kP/0LXK+cuXKmrpu2bIlvAdkGzduHEtm9RvJ7gcZCNq5c+fMmTPFxnVycjIUnGiL7+8ZXPDYyIBj8oyGJ35fRm9UXZEiRUgm8UPPJubl0N2gFSMoWLAgy8Zo0IL9+/cXHVHe'
.'ANbmzZszKuGEbGC2JLfk5fqRMEeKhH5M0OWHofiBoZRUGZQNVCLJLE2KJEbuW7pEb0qeQVThd2JgNsYDqQwLC7N31rZbc0MfAH8QZ9oh06xateqiRYvsjSE0NFRzkDQmPuXLl+/Vq5egIDIGflWvXr1d'
.'u3ZRUVHhDouIiOBtdHS0pTGIrewcOXJQDry2Gi6TzBk7dizhwq18fC5cuABHpKi5kH+7d+8u7qdaMo8kswd9OruWdQdG/Pz8YOouncB4YBVwFNg/hJWlKVu2bIDDunTp4gwh0zNW7riKiYkBSwEKUnru'
.'3LmWrqVZejnuUxIcxKjmrNh/Fmc3bNhg4icyMpJPElUojv4sCMBiAWvowvSMjGI0UXgVnADygVYpUKAAaYDyNvxwpscZ/x9qhv3ffHx8yF1nDy6an7Xt9ulODUIGmoifRZX8wf1MmTLBqKhVOJnYUFK+'
.'OgxwWBpDcHAw7LtWrVrKVzuekXBlmNoQJVOnTj127NjFixch3zAqiB2oavVX8Z5BY2ri3idZRyrK/3oUduPGDfH7+Hnz5r106ZLm9rn4LiKVhW45c+ZM+v+IylOxjIaaYRmWYRmWYRnmAfsfnvJj44Jg'
.'sXIAAAAASUVORK5CYII=';
$captcha_img=imagecreatetruecolor(133,42);imagefilledrectangle($captcha_img,0,0,133,42,imagecolorallocate($captcha_img,255,255,255));
$x1=rand(2,10);$y1=rand(2,22);
$x2=rand(27,35);$y2=rand(2,22);
$x3=rand(52,60);$y3=rand(2,22);
$x4=rand(78,86);$y4=rand(2,22);
$x5=rand(100,108);$y5=rand(2,22);
$abc=imagecreatefromstring(base64_decode($pngsource));
$pos=A_517C($this->A_5153,$pngtext[0]);
imagecopy($captcha_img,$abc,$x1,$y1,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[1]);
imagecopy($captcha_img,$abc,$x2,$y2,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[2]);
imagecopy($captcha_img,$abc,$x3,$y3,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[3]);
imagecopy($captcha_img,$abc,$x4,$y4,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[4]);
imagecopy($captcha_img,$abc,$x5,$y5,$pos*24,0,24,18);
for ($i=1;$i<26;$i++){$col=rand(34,142);imageline($captcha_img,$i*5+1,2,$i*5+1,39,imagecolorallocate($captcha_img,$col,$col,$col));}
for ($i=1;$i<8;$i++){$col=rand(34,142); imageline($captcha_img,2,$i*5+1,130,$i*5+1,imagecolorallocate($captcha_img,$col,$col,$col));}
imagerectangle($captcha_img,0,0,132,41,imagecolorallocate($captcha_img,64,64,64));
header('Content-Type: image/png'); imagepng($captcha_img);
imagedestroy($captcha_img); imagedestroy($abc);
}
public function A_519F_4 ($pngtext)
{
$pngsource='';
$captcha_img=imagecreatetruecolor(133,42);imagefilledrectangle($captcha_img,0,0,133,42,imagecolorallocate($captcha_img,255,255,255));
$x1=rand(2,10);$y1=rand(2,22);
$x2=rand(27,35);$y2=rand(2,22);
$x3=rand(52,60);$y3=rand(2,22);
$x4=rand(78,86);$y4=rand(2,22);
$x5=rand(100,108);$y5=rand(2,22);
$abc=imagecreatefromstring(base64_decode($pngsource));
$pos=A_517C($this->A_5153,$pngtext[0]);
imagecopy($captcha_img,$abc,$x1,$y1,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[1]);
imagecopy($captcha_img,$abc,$x2,$y2,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[2]);
imagecopy($captcha_img,$abc,$x3,$y3,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[3]);
imagecopy($captcha_img,$abc,$x4,$y4,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[4]);
imagecopy($captcha_img,$abc,$x5,$y5,$pos*24,0,24,18);
for ($i=0;$i<5;$i++)imageline($captcha_img,rand(1,131),rand(1,39),rand(1,131),rand(1,39),imagecolorallocate($captcha_img,rand(0,100),rand(0,100),rand(0,100)));
imagerectangle($captcha_img,0,0,132,41,imagecolorallocate($captcha_img,64,64,64));
header('Content-Type: image/png'); imagepng($captcha_img);
imagedestroy($captcha_img); imagedestroy($abc);
}
public function A_519F_3 ($pngtext)
{
$captcha_img=imagecreatetruecolor(95,30);imagefilledrectangle($captcha_img,0,0,94,29,imagecolorallocate($captcha_img,255,255,255));
$x1=rand(5,10);$y1=rand(3,12);$x2=rand(20,25);$y2=rand(3,12);$x3=rand(35,47);$y3=rand(3,12);$x4=rand(58,63);$y4=rand(3,12);$x5=rand(75,80);$y5=rand(3,12);
$col=rand(30,80);imagestring($captcha_img,5,$x1,$y1,$pngtext[0],imagecolorallocate($captcha_img,$col,$col,$col));
$col=rand(30,80);imagestring($captcha_img,5,$x2,$y2,$pngtext[1],imagecolorallocate($captcha_img,$col,$col,$col));
$col=rand(30,80);imagestring($captcha_img,5,$x3,$y3,$pngtext[2],imagecolorallocate($captcha_img,$col,$col,$col));
$col=rand(30,80);imagestring($captcha_img,5,$x4,$y4,$pngtext[3],imagecolorallocate($captcha_img,$col,$col,$col));
$col=rand(30,80);imagestring($captcha_img,5,$x5,$y5,$pngtext[4],imagecolorallocate($captcha_img,$col,$col,$col));
$captcha_img2=imagecreatetruecolor(133,42); imagecopyresampled($captcha_img2, $captcha_img, 0, 0, 0, 0, 133, 42, 95, 30);
for ($i=1;$i<43;$i++){$col=rand(60,200);imageline($captcha_img2,$i*3+1,rand(2,39),$i*3+1,rand(2,39),imagecolorallocate($captcha_img2,$col,$col,$col));}
for ($i=1;$i<13;$i++){$col=rand(60,200);imageline($captcha_img2,rand(2,130),$i*3+1,rand(2,130),$i*3+1,imagecolorallocate($captcha_img2,$col,$col,$col));}
imagerectangle($captcha_img2,0,0,132,41,imagecolorallocate($captcha_img,64,64,64));
header('Content-Type: image/png'); imagepng($captcha_img2);
imagedestroy($captcha_img);imagedestroy($captcha_img2);
}
public function A_519F_2 ($pngtext)
{
$pngsource='';
$captcha_img=imagecreatetruecolor(133,42);imagefilledrectangle($captcha_img,0,0,133,42,imagecolorallocate($captcha_img,255,255,255));
$x1=rand(2,10);$y1=rand(2,22);
$x2=rand(27,35);$y2=rand(2,22);
$x3=rand(52,60);$y3=rand(2,22);
$x4=rand(78,86);$y4=rand(2,22);
$x5=rand(100,108);$y5=rand(2,22);
$abc=imagecreatefromstring(base64_decode($pngsource));
$pos=A_517C($this->A_5153,$pngtext[0]);
imagecopy($captcha_img,$abc,$x1,$y1,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[1]);
imagecopy($captcha_img,$abc,$x2,$y2,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[2]);
imagecopy($captcha_img,$abc,$x3,$y3,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[3]);
imagecopy($captcha_img,$abc,$x4,$y4,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[4]);
imagecopy($captcha_img,$abc,$x5,$y5,$pos*24,0,24,18);
for ($i=0;$i<7;$i++)imageline($captcha_img,rand(1,131),rand(1,39),rand(1,131),rand(1,39),imagecolorallocate($captcha_img,rand(2,15),rand(9,54),rand(16,91)));
imagerectangle($captcha_img,0,0,132,41,imagecolorallocate($captcha_img,64,64,64));
header('Content-Type: image/png'); imagepng($captcha_img);
imagedestroy($captcha_img); imagedestroy($abc);
}
public function A_519F_1 ($pngtext)
{
$pngsource='';
$captcha_img=imagecreatetruecolor(133,42);imagefilledrectangle($captcha_img,0,0,133,42,imagecolorallocate($captcha_img,255,255,255));
$x1=rand(2,10);$y1=rand(2,22);
$x2=rand(27,35);$y2=rand(2,22);
$x3=rand(52,60);$y3=rand(2,22);
$x4=rand(78,86);$y4=rand(2,22);
$x5=rand(100,108);$y5=rand(2,22);
$abc=imagecreatefromstring(base64_decode($pngsource));
$pos=A_517C($this->A_5153,$pngtext[0]);
imagecopy($captcha_img,$abc,$x1,$y1,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[1]);
imagecopy($captcha_img,$abc,$x2,$y2,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[2]);
imagecopy($captcha_img,$abc,$x3,$y3,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[3]);
imagecopy($captcha_img,$abc,$x4,$y4,$pos*24,0,24,18);
$pos=A_517C($this->A_5153,$pngtext[4]);
imagecopy($captcha_img,$abc,$x5,$y5,$pos*24,0,24,18);
$color=imagecolorallocate($captcha_img,0,0,0);
for ($i=0;$i<5;$i++)imageline($captcha_img,rand(1,131),rand(1,39),rand(1,131),rand(1,39),$color);
imagerectangle($captcha_img,0,0,132,41,imagecolorallocate($captcha_img,64,64,64));
header('Content-Type: image/png'); imagepng($captcha_img);
imagedestroy($captcha_img); imagedestroy($abc);
}
public function A_519F ($A_513D,$A_514C)
{
if(!isset($A_513D[5])) return;
$key6=A_517C($this->A_514E[0],$A_513D[0]);
$pngtext=$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[1])].$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[2])].$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[3])].$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[4])].$this->A_514E[0][A_517C($this->A_514E[$key6],$A_513D[5])];
$hash=A_517C($this->A_514E[$key6],$A_513D[1])+A_517C($this->A_514E[$key6],$A_513D[2])+A_517C($this->A_514E[$key6],$A_513D[3])+A_517C($this->A_514E[$key6],$A_513D[4])+A_517C($this->A_514E[$key6],$A_513D[5]);
$A_514C=$A_514C/64;
if($hash!=$A_514C) return;
$showcap=$this->A_5192;
if($showcap==0)$showcap=rand(1,5);
if($showcap==1)$this->A_519F_1($pngtext);
if($showcap==2)$this->A_519F_2($pngtext);
if($showcap==3)$this->A_519F_3($pngtext);
if($showcap==4)$this->A_519F_4($pngtext);
if($showcap==5)$this->A_519F_5($pngtext);
}}
class A_515A extends A_519E
{
public function A_519D ($A_5139)
{
if($this->A_517A=="HIDELEFT")
{
echo"<tr><td class=\"afl\">&nbsp;</td><td class=\"afr\">";
}
else
{
echo"<tr><td colspan=\"2\" class=\"afr2\">";
}
if(!empty($this->A_517F))echo"<input type=\"submit\" class=\"afi-b3\" name=\"af_page_submit\" value=\"$this->A_517F\" />";
if(!empty($this->A_5186))echo"<input type=\"submit\" class=\"afi-b1\" name=\"af_page_back\" value=\"$this->A_5186\" />";
if(!empty($this->A_518D))echo"<input type=\"submit\" class=\"afi-b2\" name=\"af_page_next\" value=\"$this->A_518D\" />";
if(!empty($this->A_5189))echo"<input type=\"submit\" class=\"afi-b4\" name=\"af_page_reset\" value=\"$this->A_5189\" />";
echo"</td></tr>\n";
}}
if(isset($_GET['sid'])&&isset($_GET['ahash'])) 
{
$A_51A1=new A_5177();
$A_51A1->A_5192=5;
$A_51A1->A_519F(A_5135($_SESSION['arclabimg']),A_5135($_GET['ahash']));
exit(0);
}
$A_5118=1;
$A_5100=2;
$A_5074=base64_decode("KioqIFRlc3QgVmVyc2lvbiAqKio=");
$A_514A=0;
$A_5183=0;
if(isset($_POST["af_from"]))$A_514A=A_5135($_POST['af_from']);
if(isset($_POST["af_page_back"])||isset($_POST["af_page_back_x"]))$A_5183=$A_514A-1;
if(isset($_POST["af_page_next"])||isset($_POST["af_page_next_x"]))$A_5183=$A_514A+1;
if(isset($_POST["af_page_submit"])||isset($_POST["af_page_submit_x"]))$A_5183=$A_5100;
if(isset($_POST["af_page_reset"])||isset($_POST["af_page_reset_x"])){$A_514A=0;$A_5183=0;}
if($A_5183<1||$A_5183>$A_5100){$A_514A=0;$A_5183=0;}
if($A_514A==$A_5100){$A_514A=0;$A_5183=0;}
if($A_5183==$A_5100&&$A_514A!=$A_5100-1){$A_514A=0;$A_5183=0;}
$A_50DD='';if($A_514A==0)$A_50DD="";
if($A_514A!=0&&isset($_POST["First_Name"]))$A_50DD=A_5135($_POST["First_Name"]);
$A_50EC='';if($A_514A==0)$A_50EC="";
if($A_514A!=0&&isset($_POST["Last_Name"]))$A_50EC=A_5135($_POST["Last_Name"]);
$A_511D='';if($A_514A==0)$A_511D='';
if($A_514A!=0&&isset($_POST["Email"]))$A_511D=A_5135($_POST["Email"]);
$A_511D_RET='';if($A_514A==0)$A_511D_RET='';
if($A_514A!=0&&isset($_POST["Email_RET"]))$A_511D_RET=A_5135($_POST["Email_RET"]);
$A_5104='';if($A_514A==0)$A_5104="";
if($A_514A!=0&&isset($_POST["Message"]))$A_5104=A_5135($_POST["Message"]);
$A_50CE='';if($A_514A==0)$A_50CE='';
if($A_514A!=0&&isset($_POST["Captcha_1_6"]))$A_50CE=A_5135($_POST["Captcha_1_6"]);
function A_5142($A_5147)
{
$A_5197=false;
if($A_5147==1)
{$A_50DE=new A_5173();
$A_50DE->A_519B="First_Name";
$A_50DE->A_519A=10;
$A_50DE->A_5198=$GLOBALS['A_50DD'];
$A_50DE->A_5122="First Name:<span style=\"color:#FF6600\"> *</span>";
$A_50DE->A_5133="FIRST NAME";
$A_50DE->A_5107=true;
$A_50DE->A_50FE="This field is required. Please enter a value.";
$A_50DE->A_5151="The input has an invalid format.";
$A_50DE->A_518D="50%";
$A_50DE->A_5196=1;
if($A_50DE->A_5165()==true)$A_5197=true;
$A_50EF=new A_5173();
$A_50EF->A_519B="Last_Name";
$A_50EF->A_519A=10;
$A_50EF->A_5198=$GLOBALS['A_50EC'];
$A_50EF->A_5122="Last Name:<span style=\"color:#FF6600\"> *</span>";
$A_50EF->A_5133="Last Name";
$A_50EF->A_5107=true;
$A_50EF->A_50FE="This field is required. Please enter a value.";
$A_50EF->A_5151="The input has an invalid format.";
$A_50EF->A_518D="50%";
$A_50EF->A_5196=1;
if($A_50EF->A_5165()==true)$A_5197=true;
$A_511B=new A_515E();
$A_511B->A_519B="Email";
$A_511B->A_519A=13;
$A_511B->A_5198=$GLOBALS['A_511D'];
$A_511B->A_5122="Email:<span style=\"color:#FF6600\"> *</span>";
$A_511B->A_5107=true;
$A_511B->A_50FE="This field is required. Please enter a value.";
$A_511B->A_5151="The entered email address is incorrect.";
$A_511B->A_5186="Please retype the email for verification:";
$A_511B->A_518D="100%";
$A_511B->A_5189=$GLOBALS['A_511D_RET'];
$A_511B->A_5192=1;
if($A_511B->A_5165()==true)$A_5197=true;
$A_5102=new A_5168();
$A_5102->A_519B="Message";
$A_5102->A_519A=11;
$A_5102->A_5198=$GLOBALS['A_5104'];
$A_5102->A_5122="Message:";
$A_5102->A_518D="100%";
$A_5102->A_5192=5;
if($A_5102->A_5165()==true)$A_5197=true;
$A_50CD=new A_5177();
$A_50CD->A_519B="Captcha_1_6";
$A_50CD->A_519A=98;
$A_50CD->A_5122="Captcha";
$A_50CD->A_5133="Please enter the characters displayed:";
$A_50CD->A_5107=true;
$A_50CD->A_50FE="Please enter the numbers and letters in the order in which they are displayed.";
$A_50CD->A_517A="HIDELEFT";
$A_50CD->A_5192=5;
$A_50CD->A_5198=$GLOBALS['A_50CE'];
if(isset($_SESSION['arclabimg']))$A_50CD->A_5186=$_SESSION['arclabimg'];
if($A_50CD->A_5165()==true)$A_5197=true;
}
return $A_5197;
}
function A_5115($A_5147,$A_5139)
{
if($A_5147!=1)
{
echo"<tr><td colspan=\"2\" class=\"afr2\">";$value=$GLOBALS['A_50DD'];if(is_array($value))$value=implode(',',$value);echo"<input type=\"hidden\" name=\"First_Name\" value=\"$value\" />\n";
$value=$GLOBALS['A_50EC'];if(is_array($value))$value=implode(',',$value);echo"<input type=\"hidden\" name=\"Last_Name\" value=\"$value\" />\n";
$value=$GLOBALS['A_511D'];if(is_array($value))$value=implode(',',$value);echo"<input type=\"hidden\" name=\"Email\" value=\"$value\" />\n";
$value=$GLOBALS['A_511D_RET'];if(is_array($value))$value=implode(',',$value);echo"<input type=\"hidden\" name=\"Email_RET\" value=\"$value\" />\n";
$value=$GLOBALS['A_5104'];if(is_array($value))$value=implode(',',$value);echo"<input type=\"hidden\" name=\"Message\" value=\"$value\" />\n";
echo"</td></tr>\n";
}
if($A_5147==1)
{
echo "<tr><td colspan=\"2\" class=\"afr2\"><input type=\"hidden\" name=\"af_from\" value=\"1\" /></td></tr>";
$A_506D=new arclabform_input53();
$A_506D->A_519B="STATIC_HEADING_1_1";
$A_506D->A_519A=53;
$A_506D->A_5122="STATIC_HEADING";
$A_506D->A_5133="AC TRANSPORT SERVICES BOOKING FORM";
$A_506D->A_5186="Sample: Autoresponder";
$A_506D->A_517F="navy";
$A_506D->A_5189="10px";
$A_506D->A_5180="0px";
$A_506D->A_5192=1;
$A_506D->A_5196=2;
if($A_5139==true) $A_506D->A_5103(); else $A_506D->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_50DE=new A_5173();
$A_50DE->A_519B="First_Name";
$A_50DE->A_519A=10;
$A_50DE->A_5198=$GLOBALS['A_50DD'];
$A_50DE->A_5122="First Name:<span style=\"color:#FF6600\"> *</span>";
$A_50DE->A_5133="FIRST NAME";
$A_50DE->A_5107=true;
$A_50DE->A_50FE="This field is required. Please enter a value.";
$A_50DE->A_5151="The input has an invalid format.";
$A_50DE->A_518D="50%";
$A_50DE->A_5196=1;
if($A_5139==true) $A_50DE->A_5103(); else $A_50DE->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_50EF=new A_5173();
$A_50EF->A_519B="Last_Name";
$A_50EF->A_519A=10;
$A_50EF->A_5198=$GLOBALS['A_50EC'];
$A_50EF->A_5122="Last Name:<span style=\"color:#FF6600\"> *</span>";
$A_50EF->A_5133="Last Name";
$A_50EF->A_5107=true;
$A_50EF->A_50FE="This field is required. Please enter a value.";
$A_50EF->A_5151="The input has an invalid format.";
$A_50EF->A_518D="50%";
$A_50EF->A_5196=1;
if($A_5139==true) $A_50EF->A_5103(); else $A_50EF->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_511B=new A_515E();
$A_511B->A_519B="Email";
$A_511B->A_519A=13;
$A_511B->A_5198=$GLOBALS['A_511D'];
$A_511B->A_5122="Email:<span style=\"color:#FF6600\"> *</span>";
$A_511B->A_5107=true;
$A_511B->A_50FE="This field is required. Please enter a value.";
$A_511B->A_5151="The entered email address is incorrect.";
$A_511B->A_5186="Please retype the email for verification:";
$A_511B->A_518D="100%";
$A_511B->A_5189=$GLOBALS['A_511D_RET'];
$A_511B->A_5192=1;
if($A_5139==true) $A_511B->A_5103(); else $A_511B->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_5102=new A_5168();
$A_5102->A_519B="Message";
$A_5102->A_519A=11;
$A_5102->A_5198=$GLOBALS['A_5104'];
$A_5102->A_5122="Message:";
$A_5102->A_518D="100%";
$A_5102->A_5192=5;
if($A_5139==true) $A_5102->A_5103(); else $A_5102->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_50CD=new A_5177();
$A_50CD->A_519B="Captcha_1_6";
$A_50CD->A_519A=98;
$A_50CD->A_5122="Captcha";
$A_50CD->A_5133="Please enter the characters displayed:";
$A_50CD->A_5107=true;
$A_50CD->A_50FE="Please enter the numbers and letters in the order in which they are displayed.";
$A_50CD->A_517A="HIDELEFT";
$A_50CD->A_5192=5;
$A_50CD->A_5198=$GLOBALS['A_50CE'];
if(isset($_SESSION['arclabimg']))$A_50CD->A_5186=$_SESSION['arclabimg'];
if($A_5139==true) $A_50CD->A_5103(); else $A_50CD->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_50C1=new A_515A();
$A_50C1->A_519B="STATIC_Button_1_7";
$A_50C1->A_519A=99;
$A_50C1->A_5122="STATIC_Button";
$A_50C1->A_517F="Submit Form";
$A_50C1->A_517A="HIDELEFT";
if($A_5139==true) $A_50C1->A_5103(); else $A_50C1->A_519D(false);
}
if($A_5147==9950)
{
$A_5060=new A_516E();
$A_5060->A_519B="STATIC_Line_9950_1";
$A_5060->A_519A=62;
$A_5060->A_5122="STATIC_Line";
$A_5060->A_5186="<hr>";
$A_5060->A_517A="HIDELEFT";
$A_5060->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_5043=new A_5169();
$A_5043->A_519B="STATIC_TextHTML_9950_2";
$A_5043->A_519A=52;
$A_5043->A_5122="STATIC_TextHTML";
$A_5043->A_5186="<P align=center><FONT size=7>OK!</FONT></P><P align=center><FONT size=5>The form submission has been sent successfully</FONT></P>";
$A_5043->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_5067=new A_516E();
$A_5067->A_519B="STATIC_Line_9950_3";
$A_5067->A_519A=62;
$A_5067->A_5122="STATIC_Line";
$A_5067->A_5186="<hr>";
$A_5067->A_517A="HIDELEFT";
$A_5067->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_5064=new A_5169();
$A_5064->A_519B="STATIC_Text_9950_4";
$A_5064->A_519A=52;
$A_5064->A_5122="STATIC_Text";
$A_5064->A_5186="<P align=center>Click on \"Success Page\" in the section \"Form\" to edit this page.</P>";
$A_5064->A_519D(false);
}
if($A_5147==9951)
{
$A_5062=new A_516E();
$A_5062->A_519B="STATIC_Line_9951_1";
$A_5062->A_519A=62;
$A_5062->A_5122="STATIC_Line";
$A_5062->A_5186="<hr>";
$A_5062->A_517A="HIDELEFT";
$A_5062->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_5045=new A_5169();
$A_5045->A_519B="STATIC_TextHTML_9951_2";
$A_5045->A_519A=52;
$A_5045->A_5122="STATIC_TextHTML";
$A_5045->A_5186="<P align=center><FONT size=7>OOpppps ...</FONT></P><P align=center><FONT size=5>An error occurred processing your request!</FONT></P><P align=center><FONT color=#800000 size=2>If you are testing the form and you always get the error page, then either php mail is not enabled on the web server or there is no default email address setup in the php config on the web server.</FONT></P>";
$A_5045->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_505E=new A_516E();
$A_505E->A_519B="STATIC_Line_9951_3";
$A_505E->A_519A=62;
$A_505E->A_5122="STATIC_Line";
$A_505E->A_5186="<hr>";
$A_505E->A_517A="HIDELEFT";
$A_505E->A_519D(false);
echo "<tr><td colspan=\"2\" class=\"aft-rowsp\"></td></tr>";
$A_506B=new A_5169();
$A_506B->A_519B="STATIC_Text_9951_4";
$A_506B->A_519A=52;
$A_506B->A_5122="STATIC_Text";
$A_506B->A_5186="<P align=center>Click on \"Error Page\" in the section \"Form\" to edit this page.</P>";
$A_506B->A_519D(false);
}}
function A_5112 ($A_513A,$A_513B,$A_5138,$A_5148)
{
$mime="";
if( !empty($A_513A)&&is_file($A_513A))
{
$mime.="--$A_5148\r\n";
$mime.="Content-Type: $A_513B;\r\n name=".mb_encode_mimeheader($A_5138)."\r\n";
$mime.="Content-Disposition: attachment;\r\n filename=".mb_encode_mimeheader($A_5138)."\r\n";
$mime.="Content-Transfer-Encoding: base64\r\n\r\n";
$file=fopen($A_513A,'rb');
$att=fread($file,filesize($A_513A));
fclose($file);
@unlink($A_513A);
$att=chunk_split(base64_encode($att));
$mime.=$att."\r\n";
if(empty($att))$mime="";
}
return $mime;
}
function A_5144 ($recipient,$subject,$message,$header1,$header2)
{
$uploads=0;
if($uploads==0)
{
$header=$header1."\n".$header2;
return mb_send_mail ($recipient,$subject,$message,$header);
}
else
{
$A_5148="----=NextPart_".md5(time());
$att="";
$A_5124="";
///////////////////////////////////////////////////////////////////////////////
// CLEAN UP OLD TEMPORARY UPLOAD FILES
///////////////////////////////////////////////////////////////////////////////
$A_5124=rtrim($A_5124,"\\/");
if(!empty($A_5124)&&!is_file($A_5124))
{
foreach(glob($A_5124."/*.awfbul") as $cleanfile)
{
if (is_file($cleanfile))
{if((time()-filectime($cleanfile))>(60*60)) @unlink($cleanfile);}
}}
///////////////////////////////////////////////////////////////////////////////
if (!empty($att))
{
$header=$header1;
$header.="\nContent-Type: multipart/mixed;\n boundary=\"$A_5148\"";
$header=str_replace("\n","\r\n",$header);
$mime ="This is a multi-part message in MIME format.\r\n\r\n";
$mime.="--$A_5148\r\n";
if (stristr($header2,"8bit")===FALSE)
{$header2.="\nContent-Transfer-Encoding: base64";}
$mime.=str_replace("\n","\r\n",$header2);
$mime.="\r\n\r\n";
if (stristr($header2,"8bit")===FALSE)$message=chunk_split(base64_encode($message));
$mime.=$message."\r\n";
$mime.=$att."--$A_5148--\r\n";
return mail($recipient,mb_encode_mimeheader($subject),$mime,$header);
}
else
{
$header=$header1."\n".$header2;
return mb_send_mail ($recipient,$subject,$message,$header);
}}
}function A_5188()
{
$A_50EB=A_5135($_SERVER["REMOTE_ADDR"]);
$A_50F9=A_5135($_SERVER["SCRIPT_NAME"]);
$A_50F0=A_5135($_SERVER["SERVER_NAME"]);
$A_5121=A_5135(date("r"));
$A_50D2=A_5135(date("m/d/Y"));
$A_50D8=A_5135(date("d.m.Y"));
$A_5125=A_5135(date("YmdHis"));
$A_510B=A_5135(date("H:i"));
$A_50FC=A_5135(date("g:i A"));
mb_language('uni');
///////////////////////////////////////////////////////////////////////////////
// MESSAGE BODY
$message="<html>\r\n"
."<head>\r\n"
."<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n"
."</head>\r\n"
."<body>\r\n"
."<table style=\"width:100%;border:0;padding:5px;font-family:Calibri,Arial,sans-serif;font-size:15px;\">\r\n"
."<tr>\r\n"
."<td style=\"width:20%;vertical-align:top;color:#606060\">\r\n"
."First Name:\r\n"
."</td>\r\n"
."<td style=\"width:80%;vertical-align:top;color:#000000\">\r\n"
."".A_518A($GLOBALS["A_50DD"])."\r\n"
."</td>\r\n"
."</tr>\r\n"
."<tr>\r\n"
."<td style=\"width:20%;vertical-align:top;color:#606060\">\r\n"
."Last Name:\r\n"
."</td>\r\n"
."<td style=\"width:80%;vertical-align:top;color:#000000\">\r\n"
."".A_518A($GLOBALS["A_5074"])."\r\n"
."</td>\r\n"
."</tr>\r\n"
."<tr>\r\n"
."<td style=\"width:20%;vertical-align:top;color:#606060\">\r\n"
."Email:\r\n"
."</td>\r\n"
."<td style=\"width:80%;vertical-align:top;color:#000000\">\r\n"
."<a href=\"mailto:".A_518A($GLOBALS["A_5074"])."\">\r\n"
."".A_518A($GLOBALS["A_5074"])."\r\n"
."</a>\r\n"
."</td>\r\n"
."</tr>\r\n"
."<tr>\r\n"
."<td style=\"width:20%;vertical-align:top;color:#606060\">\r\n"
."Message:\r\n"
."</td>\r\n"
."<td style=\"width:80%;vertical-align:top;color:#000000\">\r\n"
."".nl2br($GLOBALS["A_5074"])."\r\n"
."</td>\r\n"
."</tr>\r\n"
."</table>\r\n"
."</body>\r\n"
."</html>";
///////////////////////////////////////////////////////////////////////////////
$subject="Contact Form Message";
$recipient="larry.steed@ati147.com";
$header1="From: ".A_5117($GLOBALS["A_511D"])."\nMIME-Version: 1.0";
$header2="Content-type: text/html; charset=utf-8";
$header1.="\nReply-To: "."larry.steed@ati147.com";
if (!A_5144($recipient,$subject,$message,$header1,$header2))return false;
///////////////////////////////////////////////////////////////////////////////
// AUTORESPONDER
$message="<html>\r\n"
."<head>\r\n"
."<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n"
."</head>\r\n"
."<body>\r\n"
."<table style=\"width:100%;border:0;padding:5px;font-family:Calibri,Arial,sans-serif;font-size:15px;\">\r\n"
."<tr><td colspan=\"2\" style=\"width:100%;color:#000000\">\r\n"
."<h2>[Name], Thank you for contacting us!</h2>\r\n"
."You have completed our web form ".$A_50F0."".$A_50F9." on ".$A_50D2." at ".$A_50FC.". The form was submitted from the client IP address: ".$A_50EB.".<br><br>\r\n"
."</td></tr>\r\n"
."<tr>\r\n"
."<td style=\"width:20%;vertical-align:top;color:#606060\">\r\n"
."First Name:\r\n"
."</td>\r\n"
."<td style=\"width:80%;vertical-align:top;color:#000000\">\r\n"
."".A_518A($GLOBALS["A_50DD"])."\r\n"
."</td>\r\n"
."</tr>\r\n"
."<tr>\r\n"
."<td style=\"width:20%;vertical-align:top;color:#606060\">\r\n"
."Last Name:\r\n"
."</td>\r\n"
."<td style=\"width:80%;vertical-align:top;color:#000000\">\r\n"
."".A_518A($GLOBALS["A_5074"])."\r\n"
."</td>\r\n"
."</tr>\r\n"
."<tr>\r\n"
."<td style=\"width:20%;vertical-align:top;color:#606060\">\r\n"
."Email:\r\n"
."</td>\r\n"
."<td style=\"width:80%;vertical-align:top;color:#000000\">\r\n"
."<a href=\"mailto:".A_518A($GLOBALS["A_5074"])."\">\r\n"
."".A_518A($GLOBALS["A_5074"])."\r\n"
."</a>\r\n"
."</td>\r\n"
."</tr>\r\n"
."<tr>\r\n"
."<td style=\"width:20%;vertical-align:top;color:#606060\">\r\n"
."Message:\r\n"
."</td>\r\n"
."<td style=\"width:80%;vertical-align:top;color:#000000\">\r\n"
."".nl2br($GLOBALS["A_5074"])."\r\n"
."</td>\r\n"
."</tr>\r\n"
."</table>\r\n</body>\r\n</html>";
///////////////////////////////////////////////////////////////////////////////
$recipient=A_5117($GLOBALS["A_511D"]);
if(!A_516F($recipient))return false;
$subject="[Name], thank you for contacting us";
$header="From: \nMIME-Version: 1.0\nContent-type: text/html; charset=utf-8";
return mb_send_mail($recipient,$subject,$message,$header);
}
if ($A_5183==$A_5100)
{
if (A_5142($A_514A)==false&&$A_514A==$A_5118)
{
if(A_5188())
{
unset($_SESSION['arclabimg']);
$A_50FF=0;
if ($A_50FF!=1)
{
A_51A0();
A_5115(9950,false);
A_519C();
}}
else 
{
unset($_SESSION['arclabimg']);
A_51A0();
A_5115(9951,false);
A_519C();
}}
else
{
A_51A0();
A_5115($A_514A,true);
A_519C();
}}
else
{
$A_5139=false;
if ($A_514A!=0)
{
if(!isset($_POST["af_page_back"])&&!isset($_POST["af_page_back_x"])&&!isset($_POST["af_page_reset"])&&!isset($_POST["af_page_reset_x"]))$A_5139=A_5142($A_514A);
if($A_5139)$A_5183=$A_514A;
}
else
{
$A_5183=1;
}
A_51A0();
A_5115($A_5183,$A_5139);
A_519C();
}
?>