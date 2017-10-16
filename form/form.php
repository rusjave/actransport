<?php

// if the from is loaded from WordPress form loader plugin,
// the phpfmg_display_form() will be called by the loader
if( !defined('FormmailMakerFormLoader') ){
    # This block must be placed at the very top of page.
    # --------------------------------------------------
	require_once( dirname(__FILE__).'/form.lib.php' );
    phpfmg_display_form();
    # --------------------------------------------------
};


function phpfmg_form( $sErr = false ){
		$style=" class='form_text' ";


?>






<div id='frmFormMailContainer'>

<form name="frmFormMail" id="frmFormMail" target="submitToFrame" action='<?php echo PHPFMG_ADMIN_URL . '' ; ?>' method='post' enctype='multipart/form-data' onsubmit='return fmgHandler.onSubmit(this);'>

<input type='hidden' name='formmail_submit' value='Y'>
<input type='hidden' name='mod' value='ajax'>
<input type='hidden' name='func' value='submit'>

<p><b><h2>AC Transport Services Pickup Form</h2></b>
<div align="justify">This information will only be shared with my booking staff and the drivers supervisor who will allocate your job. If you do not receive a response in 24 hours it means your request may not have been forwarded to our office. Please email details to our secondary address at bookings@actransportservices.com</div></p>
            
<ol class='phpfmg_form' >

<li class='field_block' id='field_0_div'><div class='col_label'>
	<label class='form_field'>First Name</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<input type="text" name="field_0"  id="field_0" value="<?php  phpfmg_hsc("field_0", ""); ?>" class='text_box'>
	<div id='field_0_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_1_div'><div class='col_label'>
	<label class='form_field'>Last Name</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<input type="text" name="field_1"  id="field_1" value="<?php  phpfmg_hsc("field_1", ""); ?>" class='text_box'>
	<div id='field_1_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_2_div'><div class='col_label'>
	<label class='form_field'>User email</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<input type="text" name="field_2"  id="field_2" value="<?php  phpfmg_hsc("field_2", ""); ?>" class='text_box'>
	<div id='field_2_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_3_div'><div class='col_label'>
	<label class='form_field'>Phone</label> <label class='form_required' >&nbsp;</label> </div>
	<div class='col_field'>
	<input type="text" name="field_3"  id="field_3" value="<?php  phpfmg_hsc("field_3", ""); ?>" class='text_box'>
	<div id='field_3_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_4_div'><div class='col_label'>
	<label class='form_field'>Local Mobile Phone</label> <label class='form_required' >&nbsp;</label> </div>
	<div class='col_field'>
	<input type="text" name="field_4"  id="field_4" value="<?php  phpfmg_hsc("field_4", ""); ?>" class='text_box' placeholder="ex. +63161002030">
	<div id='field_4_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_5_div'><div class='col_label'>
	<label class='form_field'>Arrival Date</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	
<?php
    $field_5 = array(
        'month' => "-MM- =,|01|02|03|04|05|06|07|08|09|10|11|12",
        'day' => "-DD- =,|01|02|03|04|05|06|07|08|09|10|11|12|13|14|15|16|17|18|19|20|21|22|23|24|25|26|27|28|29|30|31",
        'startYear' => date("Y")+0,
        'endYear' => date("Y")+20,
        'yearPrompt' => '-YYYY-',
        'format' => "mm/dd/yyyy",
        'separator' => "/",
        'field_name' => "field_5",
    );
    phpfmg_date_dropdown( $field_5 );
?>


	<div id='field_5_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_6_div'><div class='col_label'>
	<label class='form_field'>Arrival Time</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	
<?php
    $field_6 = array(
        'hour' => "HH=,default|01|02|03|04|05|06|07|08|09|10|11|12",
        'hourOpt' => "h12",
        'minute' => "MM=,default|00|15|30|45",
        'amfm' => "=,default|AM|PM",
        'second' => "",
        'field_name' => "field_6",
    );
    phpfmg_time_dropdown( $field_6 );
?>

<p><b><h2>IMPORTANT NOTICE:</h2></b>


<p>We do not accept reservations FOR NEW CUSTOMERS received within 24 hours of their scheduled arrival times. </p>

<p><div align="justify">This is because it does not give us sufficient time to confirm our pickup before they leave home. These short notice pickups have had a very high rate of failure in the past because people in this category make almost no attempt to find the driver before seeking out alternative transportation.</div></p>

<p><div align="justify">If you want to be an exception to this policy, you must email our reservations department at bookings@actransportservices.com. They will send you a email stating that it is a short-notice request. This email will have arrival instructions for meeting your driver. It will specify that we will not send a vehicle unless you confirm the instructions in that email. No confirmation, no vehicle will be dispatched.</div></p>

<p>If you don't have time to wait for the email confirmation you can try to call our office.</p>

<p>+63-977-770-6189</p>

<p>It will still be up to the manager on duty to determine if we will accept your short notice request.</p>

	<div id='field_6_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_7_div'><div class='col_label'>
	<label class='form_field'>Pickup Location</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<?php phpfmg_dropdown( 'field_7', "Manila NAIA Terminal 1|Manila NAIA Terminal 2|Manila NAIA Terminal 3|Manila NAIA Terminal 4|Clark International (CRK)|Other" );?>
	<div id='field_7_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_8_div'><div class='col_label'>
	<label class='form_field'>Drop Off Location</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<input type="text" name="field_8"  id="field_8" value="<?php  phpfmg_hsc("field_8", ""); ?>" class='text_box'>
	<div id='field_8_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_9_div'><div class='col_label'>
	<label class='form_field'>Pickup or Drop Off Location (If Known)</label> <label class='form_required' >&nbsp;</label> </div>
	<div class='col_field'>
	<textarea name="field_9" id="field_9" rows=4 cols=25 class='text_area'><?php  phpfmg_hsc("field_9"); ?></textarea>

	<div id='field_9_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_10_div'><div class='col_label'>
	<label class='form_field'>Airline</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<input type="text" name="field_10"  id="field_10" value="<?php  phpfmg_hsc("field_10", ""); ?>" class='text_box'>
	<div id='field_10_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_11_div'><div class='col_label'>
	<label class='form_field'>Flight Number</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<input type="text" name="field_11"  id="field_11" value="<?php  phpfmg_hsc("field_11", ""); ?>" class='text_box'>
	<div id='field_11_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_12_div'><div class='col_label'>
	<label class='form_field'>Number of Passengers</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<?php phpfmg_dropdown( 'field_12', "1|2|3|4|5|6|7" );?>
	<div id='field_12_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_13_div'><div class='col_label'>
	<label class='form_field'>Vehicle Type</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<?php phpfmg_dropdown( 'field_13', "Car|Van" );?>
	<div id='field_13_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_14_div'><div class='col_label'>
	<label class='form_field'>Are You willing to share a ride?</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<?php phpfmg_dropdown( 'field_14', "Yes|No" );?>
	<div id='field_14_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_15_div'><div class='col_label'>
	<label class='form_field'>Please add any remarks that will clarify your request please.</label> <label class='form_required' >&nbsp;</label> </div>
	<div class='col_field'>
	<textarea name="field_15" id="field_15" rows=4 cols=25 class='text_area'><?php  phpfmg_hsc("field_15"); ?></textarea>

	<div id='field_15_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_16_div'><div class='col_label'>
	<label class='form_field'>Itinerary</label> <label class='form_required' >&nbsp;</label> </div>
	<div class='col_field'>
	<input type="file" name="field_16"  id="field_16" value="" class='text_box' onchange="fmgHandler.check_upload(this);">
	<div id='field_16_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_17_div'><div class='col_label'>
	<label class='form_field'>Photo Upload (Optional used for the driver to recognize you)</label> <label class='form_required' >&nbsp;</label> </div>
	<div class='col_field'>
	<input type="file" name="field_17"  id="field_17" value="" class='text_box' onchange="fmgHandler.check_upload(this);">
	<div id='field_17_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_18_div'><div class='col_label'>
	<label class='form_field'>Your Facebook Name</label> <label class='form_required' >&nbsp;</label> </div>
	<div class='col_field'>
	<input type="text" name="field_18"  id="field_18" value="<?php  phpfmg_hsc("field_18", ""); ?>" class='text_box'>
	<div id='field_18_tip' class='instruction'></div>
	</div>
</li>

<li class='field_block' id='field_19_div'><div class='col_label'>
	<label class='form_field'>Have you read the Pickup Instructions on our Services Page?</label> <label class='form_required' >*</label> </div>
	<div class='col_field'>
	<?php phpfmg_dropdown( 'field_19', "Yes|No" );?>
	<div id='field_19_tip' class='instruction'></div>
	</div>
</li>


<li class='field_block' id='phpfmg_captcha_div'>
	<div class='col_label'></div><div class='col_field'>
	<?php phpfmg_show_captcha(); ?>
	</div>
</li>


            <li>
            <div class='col_label'>&nbsp;</div>
            <div class='form_submit_block col_field'>
	

                <input type='submit' value='Submit' class='form_button'>

				<div id='err_required' class="form_error" style='display:none;'>
				    <label class='form_error_title'>Please check the required fields</label>
				</div>
				


                <span id='phpfmg_processing' style='display:none;'>
                    <img id='phpfmg_processing_gif' src='<?php echo PHPFMG_ADMIN_URL . '?mod=image&amp;func=processing' ;?>' border=0 alt='Processing...'> <label id='phpfmg_processing_dots'></label>
                </span>
            </div>
            </li>
			<p>We will send you a Job Number for your reference and also to give to driver to confirm Identity. If you dont hear from us within 12 hours please contact us by email.</p>

</ol>
</form>

<iframe name="submitToFrame" id="submitToFrame" src="javascript:false" style="position:absolute;top:-10000px;left:-10000px;" /></iframe>

</div>
<!-- end of form container -->


<!-- [Your confirmation message goes here] -->
<div id='thank_you_msg' style='display:none;'>
Your form has been sent. Thank you! If you dont hear from us within 12 hours please contact us by email.
</div>


            







<?php

    phpfmg_javascript($sErr);

}
# end of form






function phpfmg_form_css(){
    $formOnly = isset($GLOBALS['formOnly']) && true === $GLOBALS['formOnly'];
?>
<style type='text/css'>
<?php 
if( !$formOnly ){
    echo"
body{
    margin-left: 18px;
    margin-top: 18px;
}

body{
    font-family : Verdana, Arial, Helvetica, sans-serif;
    font-size : 13px;
    color : #474747;
    background-color: transparent;
}

select, option{
    font-size:13px;
}
";
}; // if
?>

ol.phpfmg_form{
    list-style-type:none;
    padding:0px;
    margin:0px;
}

ol.phpfmg_form input, ol.phpfmg_form textarea, ol.phpfmg_form select{
    border: 1px solid #ccc;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
}

ol.phpfmg_form li{
    margin-bottom:5px;
    clear:both;
    display:block;
    overflow:hidden;
	width: 100%
}



.form_field, .form_required{
    font-weight : bold;
}

.form_required{
    color:red;
    margin-right:8px;
}

.field_block_over{
}

.form_submit_block{
    padding-top: 3px;
}

.text_box,.text_select {
    height: 32px;
}

.text_box, .text_area, .text_select {
    min-width:160px;
    max-width:300px;
    width: 100%;
    margin-bottom: 10px;
}

.text_area{
    height:80px;
}

.form_error_title{
    font-weight: bold;
    color: red;
}

.form_error{
    background-color: #F4F6E5;
    border: 1px dashed #ff0000;
    padding: 10px;
    margin-bottom: 10px;
}

.form_error_highlight{
    background-color: #F4F6E5;
    border-bottom: 1px dashed #ff0000;
}

div.instruction_error{
    color: red;
    font-weight:bold;
}

hr.sectionbreak{
    height:1px;
    color: #ccc;
}

#one_entry_msg{
    background-color: #F4F6E5;
    border: 1px dashed #ff0000;
    padding: 10px;
    margin-bottom: 10px;
}



#frmFormMailContainer input[type="submit"]{
    padding: 10px 25px; 
    font-weight: bold;
    margin-bottom: 10px;
    background-color: #FAFBFC;
}

#frmFormMailContainer input[type="submit"]:hover{
    background-color: #E4F0F8;
}

<?php phpfmg_text_align();?>    



</style>

<?php
}
# end of css
 
# By: formmail-maker.com
?>