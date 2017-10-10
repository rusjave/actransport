<?php
require_once( dirname(__FILE__).'/form.lib.php' );

define( 'PHPFMG_USER', "bookings@actransportservices.com" ); // must be a email address. for sending password to you.
define( 'PHPFMG_PW', "5dc023" );

?>
<?php
/**
 * GNU Library or Lesser General Public License version 2.0 (LGPLv2)
*/

# main
# ------------------------------------------------------
error_reporting( E_ERROR ) ;
phpfmg_admin_main();
# ------------------------------------------------------




function phpfmg_admin_main(){
    $mod  = isset($_REQUEST['mod'])  ? $_REQUEST['mod']  : '';
    $func = isset($_REQUEST['func']) ? $_REQUEST['func'] : '';
    $function = "phpfmg_{$mod}_{$func}";
    if( !function_exists($function) ){
        phpfmg_admin_default();
        exit;
    };

    // no login required modules
    $public_modules   = false !== strpos('|captcha|', "|{$mod}|", "|ajax|");
    $public_functions = false !== strpos('|phpfmg_ajax_submit||phpfmg_mail_request_password||phpfmg_filman_download||phpfmg_image_processing||phpfmg_dd_lookup|', "|{$function}|") ;   
    if( $public_modules || $public_functions ) { 
        $function();
        exit;
    };
    
    return phpfmg_user_isLogin() ? $function() : phpfmg_admin_default();
}

function phpfmg_ajax_submit(){
    $phpfmg_send = phpfmg_sendmail( $GLOBALS['form_mail'] );
    $isHideForm  = isset($phpfmg_send['isHideForm']) ? $phpfmg_send['isHideForm'] : false;

    $response = array(
        'ok' => $isHideForm,
        'error_fields' => isset($phpfmg_send['error']) ? $phpfmg_send['error']['fields'] : '',
        'OneEntry' => isset($GLOBALS['OneEntry']) ? $GLOBALS['OneEntry'] : '',
    );
    
    @header("Content-Type:text/html; charset=$charset");
    echo "<html><body><script>
    var response = " . json_encode( $response ) . ";
    try{
        parent.fmgHandler.onResponse( response );
    }catch(E){};
    \n\n";
    echo "\n\n</script></body></html>";

}


function phpfmg_admin_default(){
    if( phpfmg_user_login() ){
        phpfmg_admin_panel();
    };
}



function phpfmg_admin_panel()
{    
    phpfmg_admin_header();
    phpfmg_writable_check();
?>    
<table cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td valign=top style="padding-left:280px;">

<style type="text/css">
    .fmg_title{
        font-size: 16px;
        font-weight: bold;
        padding: 10px;
    }
    
    .fmg_sep{
        width:32px;
    }
    
    .fmg_text{
        line-height: 150%;
        vertical-align: top;
        padding-left:28px;
    }

</style>

<script type="text/javascript">
    function deleteAll(n){
        if( confirm("Are you sure you want to delete?" ) ){
            location.href = "admin.php?mod=log&func=delete&file=" + n ;
        };
        return false ;
    }
</script>


<div class="fmg_title">
    1. Email Traffics
</div>
<div class="fmg_text">
    <a href="admin.php?mod=log&func=view&file=1">view</a> &nbsp;&nbsp;
    <a href="admin.php?mod=log&func=download&file=1">download</a> &nbsp;&nbsp;
    <?php 
        if( file_exists(PHPFMG_EMAILS_LOGFILE) ){
            echo '<a href="#" onclick="return deleteAll(1);">delete all</a>';
        };
    ?>
</div>


<div class="fmg_title">
    2. Form Data
</div>
<div class="fmg_text">
    <a href="admin.php?mod=log&func=view&file=2">view</a> &nbsp;&nbsp;
    <a href="admin.php?mod=log&func=download&file=2">download</a> &nbsp;&nbsp;
    <?php 
        if( file_exists(PHPFMG_SAVE_FILE) ){
            echo '<a href="#" onclick="return deleteAll(2);">delete all</a>';
        };
    ?>
</div>

<div class="fmg_title">
    3. Form Generator
</div>
<div class="fmg_text">
    <a href="http://www.formmail-maker.com/generator.php" onclick="document.frmFormMail.submit(); return false;" title="<?php echo htmlspecialchars(PHPFMG_SUBJECT);?>">Edit Form</a> &nbsp;&nbsp;
    <a href="http://www.formmail-maker.com/generator.php" >New Form</a>
</div>
    <form name="frmFormMail" action='http://www.formmail-maker.com/generator.php' method='post' enctype='multipart/form-data'>
    <input type="hidden" name="uuid" value="<?php echo PHPFMG_ID; ?>">
    <input type="hidden" name="external_ini" value="<?php echo function_exists('phpfmg_formini') ?  phpfmg_formini() : ""; ?>">
    </form>

		</td>
	</tr>
</table>

<?php
    phpfmg_admin_footer();
}



function phpfmg_admin_header( $title = '' ){
    header( "Content-Type: text/html; charset=" . PHPFMG_CHARSET );
?>
<html>
<head>
    <title><?php echo '' == $title ? '' : $title . ' | ' ; ?>PHP FormMail Admin Panel </title>
    <meta name="keywords" content="PHP FormMail Generator, PHP HTML form, send html email with attachment, PHP web form,  Free Form, Form Builder, Form Creator, phpFormMailGen, Customized Web Forms, phpFormMailGenerator,formmail.php, formmail.pl, formMail Generator, ASP Formmail, ASP form, PHP Form, Generator, phpFormGen, phpFormGenerator, anti-spam, web hosting">
    <meta name="description" content="PHP formMail Generator - A tool to ceate ready-to-use web forms in a flash. Validating form with CAPTCHA security image, send html email with attachments, send auto response email copy, log email traffics, save and download form data in Excel. ">
    <meta name="generator" content="PHP Mail Form Generator, phpfmg.sourceforge.net">

    <style type='text/css'>
    body, td, label, div, span{
        font-family : Verdana, Arial, Helvetica, sans-serif;
        font-size : 12px;
    }
    </style>
</head>
<body  marginheight="0" marginwidth="0" leftmargin="0" topmargin="0">

<table cellspacing=0 cellpadding=0 border=0 width="100%">
    <td nowrap align=center style="background-color:#024e7b;padding:10px;font-size:18px;color:#ffffff;font-weight:bold;width:250px;" >
        Form Admin Panel
    </td>
    <td style="padding-left:30px;background-color:#86BC1B;width:100%;font-weight:bold;" >
        &nbsp;
<?php
    if( phpfmg_user_isLogin() ){
        echo '<a href="admin.php" style="color:#ffffff;">Main Menu</a> &nbsp;&nbsp;' ;
        echo '<a href="admin.php?mod=user&func=logout" style="color:#ffffff;">Logout</a>' ;
    }; 
?>
    </td>
</table>

<div style="padding-top:28px;">

<?php
    
}


function phpfmg_admin_footer(){
?>

</div>

<div style="color:#cccccc;text-decoration:none;padding:18px;font-weight:bold;">
	:: <a href="http://phpfmg.sourceforge.net" target="_blank" title="Free Mailform Maker: Create read-to-use Web Forms in a flash. Including validating form with CAPTCHA security image, send html email with attachments, send auto response email copy, log email traffics, save and download form data in Excel. " style="color:#cccccc;font-weight:bold;text-decoration:none;">PHP FormMail Generator</a> ::
</div>

</body>
</html>
<?php
}


function phpfmg_image_processing(){
    $img = new phpfmgImage();
    $img->out_processing_gif();
}


# phpfmg module : captcha
# ------------------------------------------------------
function phpfmg_captcha_get(){
    $img = new phpfmgImage();
    $img->out();
    //$_SESSION[PHPFMG_ID.'fmgCaptchCode'] = $img->text ;
    $_SESSION[ phpfmg_captcha_name() ] = $img->text ;
}



function phpfmg_captcha_generate_images(){
    for( $i = 0; $i < 50; $i ++ ){
        $file = "$i.png";
        $img = new phpfmgImage();
        $img->out($file);
        $data = base64_encode( file_get_contents($file) );
        echo "'{$img->text}' => '{$data}',\n" ;
        unlink( $file );
    };
}


function phpfmg_dd_lookup(){
    $paraOk = ( isset($_REQUEST['n']) && isset($_REQUEST['lookup']) && isset($_REQUEST['field_name']) );
    if( !$paraOk )
        return;
        
    $base64 = phpfmg_dependent_dropdown_data();
    $data = @unserialize( base64_decode($base64) );
    if( !is_array($data) ){
        return ;
    };
    
    
    foreach( $data as $field ){
        if( $field['name'] == $_REQUEST['field_name'] ){
            $nColumn = intval($_REQUEST['n']);
            $lookup  = $_REQUEST['lookup']; // $lookup is an array
            $dd      = new DependantDropdown(); 
            echo $dd->lookupFieldColumn( $field, $nColumn, $lookup );
            return;
        };
    };
    
    return;
}


function phpfmg_filman_download(){
    if( !isset($_REQUEST['filelink']) )
        return ;
        
    $info =  @unserialize(base64_decode($_REQUEST['filelink']));
    if( !isset($info['recordID']) ){
        return ;
    };
    
    $file = PHPFMG_SAVE_ATTACHMENTS_DIR . $info['recordID'] . '-' . $info['filename'];
    phpfmg_util_download( $file, $info['filename'] );
}


class phpfmgDataManager
{
    var $dataFile = '';
    var $columns = '';
    var $records = '';
    
    function phpfmgDataManager(){
        $this->dataFile = PHPFMG_SAVE_FILE; 
    }
    
    function parseFile(){
        $fp = @fopen($this->dataFile, 'rb');
        if( !$fp ) return false;
        
        $i = 0 ;
        $phpExitLine = 1; // first line is php code
        $colsLine = 2 ; // second line is column headers
        $this->columns = array();
        $this->records = array();
        $sep = chr(0x09);
        while( !feof($fp) ) { 
            $line = fgets($fp);
            $line = trim($line);
            if( empty($line) ) continue;
            $line = $this->line2display($line);
            $i ++ ;
            switch( $i ){
                case $phpExitLine:
                    continue;
                    break;
                case $colsLine :
                    $this->columns = explode($sep,$line);
                    break;
                default:
                    $this->records[] = explode( $sep, phpfmg_data2record( $line, false ) );
            };
        }; 
        fclose ($fp);
    }
    
    function displayRecords(){
        $this->parseFile();
        echo "<table border=1 style='width=95%;border-collapse: collapse;border-color:#cccccc;' >";
        echo "<tr><td>&nbsp;</td><td><b>" . join( "</b></td><td>&nbsp;<b>", $this->columns ) . "</b></td></tr>\n";
        $i = 1;
        foreach( $this->records as $r ){
            echo "<tr><td align=right>{$i}&nbsp;</td><td>" . join( "</td><td>&nbsp;", $r ) . "</td></tr>\n";
            $i++;
        };
        echo "</table>\n";
    }
    
    function line2display( $line ){
        $line = str_replace( array('"' . chr(0x09) . '"', '""'),  array(chr(0x09),'"'),  $line );
        $line = substr( $line, 1, -1 ); // chop first " and last "
        return $line;
    }
    
}
# end of class



# ------------------------------------------------------
class phpfmgImage
{
    var $im = null;
    var $width = 73 ;
    var $height = 33 ;
    var $text = '' ; 
    var $line_distance = 8;
    var $text_len = 4 ;

    function phpfmgImage( $text = '', $len = 4 ){
        $this->text_len = $len ;
        $this->text = '' == $text ? $this->uniqid( $this->text_len ) : $text ;
        $this->text = strtoupper( substr( $this->text, 0, $this->text_len ) );
    }
    
    function create(){
        $this->im = imagecreate( $this->width, $this->height );
        $bgcolor   = imagecolorallocate($this->im, 255, 255, 255);
        $textcolor = imagecolorallocate($this->im, 0, 0, 0);
        $this->drawLines();
        imagestring($this->im, 5, 20, 9, $this->text, $textcolor);
    }
    
    function drawLines(){
        $linecolor = imagecolorallocate($this->im, 210, 210, 210);
    
        //vertical lines
        for($x = 0; $x < $this->width; $x += $this->line_distance) {
          imageline($this->im, $x, 0, $x, $this->height, $linecolor);
        };
    
        //horizontal lines
        for($y = 0; $y < $this->height; $y += $this->line_distance) {
          imageline($this->im, 0, $y, $this->width, $y, $linecolor);
        };
    }
    
    function out( $filename = '' ){
        if( function_exists('imageline') ){
            $this->create();
            if( '' == $filename ) header("Content-type: image/png");
            ( '' == $filename ) ? imagepng( $this->im ) : imagepng( $this->im, $filename );
            imagedestroy( $this->im ); 
        }else{
            $this->out_predefined_image(); 
        };
    }

    function uniqid( $len = 0 ){
        $md5 = md5( uniqid(rand()) );
        return $len > 0 ? substr($md5,0,$len) : $md5 ;
    }
    
    function out_predefined_image(){
        header("Content-type: image/png");
        $data = $this->getImage(); 
        echo base64_decode($data);
    }
    
    // Use predefined captcha random images if web server doens't have GD graphics library installed  
    function getImage(){
        $images = array(
			'A81A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7GB0YQximMLQii7EGsLYyhDBMdUASE5ki0ugYwhAQgCQW0ApUN4XRQQTJfVFLV4atmrYyaxqS+9DUgWFoqEijwxTG0BAU88BiKOqw6Q1oZQxhDHVEERuo8KMixOI+ACsey5h9ex8QAAAAAElFTkSuQmCC',
			'4E13' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZUlEQVR4nGNYhQEaGAYTpI37poiGMkxhCHVAFgsRAWJGhwAkMUagGGMIQ4MIkhjrFCBvCkNDAJL7pk2bGrZq2qqlWUjuC0BVB4ahoRAxERS34BJDdQvIzYyhDqhuHqjwox7E4j4AXAnLurzw+Y0AAAAASUVORK5CYII=',
			'CE80' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAX0lEQVR4nGNYhQEaGAYTpIn7WENEQxlCGVqRxURaRRoYHR2mOiCJBTSKNLA2BAQEIIs1gNQ5OogguS9q1dSwVaErs6YhuQ9NHVyMtSEQVQyLHdjcgs3NAxV+VIRY3AcAuXXL3HAdn+YAAAAASUVORK5CYII=',
			'8AC0' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZ0lEQVR4nGNYhQEaGAYTpIn7WAMYAhhCHVqRxUSmMIYwOgRMdUASC2hlbWVtEAgIQFEn0ujawOggguS+pVHTVqauWpk1Dcl9aOqg5omGYoqB1GHa4YjmFtYAkUYHNDcPVPhREWJxHwDWxM0E03d8zAAAAABJRU5ErkJggg==',
			'AAAB' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZklEQVR4nGNYhQEaGAYTpIn7GB0YAhimMIY6IImxBjCGMIQyOgQgiYlMYW1ldHR0EEESC2gVaXRtCISpAzspaum0lamrIkOzkNyHpg4MQ0NFQ11DA7Gah8cOZDEUNw9U+FERYnEfAL8OzXAKySiYAAAAAElFTkSuQmCC',
			'D1E7' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXUlEQVR4nGNYhQEaGAYTpIn7QgMYAlhDHUNDkMQCpjAGsAJpEWSxVlYsYgxgsQAk90UtBaLQVSuzkNwHVdfKgKl3ChaxABSxKSAxRgdUN7OGAt2MIjZQ4UdFiMV9AGqQyoSdXvBjAAAAAElFTkSuQmCC',
			'BA7E' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7QgMYAlhDA0MDkMQCpjCGMDQEOiCrC2hlbcUQmyLS6NDoCBMDOyk0atrKrKUrQ7OQ3AdWN4URzTzRUIcAdDERoGmMGHa4NqCKhQaAxVDcPFDhR0WIxX0AVdLMWMBvv2UAAAAASUVORK5CYII=',
			'48AF' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZklEQVR4nGNYhQEaGAYTpI37pjCGAHFoCLJYCGsrQyijA7I6xhCRRkdHRxQx1imsrawNgTAxsJOmTVsZtnRVZGgWkvsCUNWBYWioSKNrKKoYwxSgWAO6GKZekJsxxAYq/KgHsbgPAHY9yj5VMZqgAAAAAElFTkSuQmCC',
			'9BB2' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7WANEQ1hDGaY6IImJTBFpZW10CAhAEgtoFWl0bQh0EEEVA6lrEEFy37SpU8OWhq5aFYXkPlZXsLpGZDsYwOYFtCK7RQAiNoUBi1sw3cwYGjIIwo+KEIv7AKbmzUO9sOO9AAAAAElFTkSuQmCC',
			'58B6' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZUlEQVR4nGNYhQEaGAYTpIn7QkMYQ1hDGaY6IIkFNLC2sjY6BASgiIk0ujYEOgggiQUGgNQ5OiC7L2zayrCloStTs5Dd1wpWh2IeQyvEPBFkO7CIiUzBdAtrAKabByr8qAixuA8ADJTM0YQ9UDYAAAAASUVORK5CYII=',
			'1BD1' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXklEQVR4nGNYhQEaGAYTpIn7GB1EQ1hDGVqRxVgdRFpZGx2mIouJOog0ujYEhKLqBaprCIDpBTtpZdbUsKWropYiuw9NHUwMZB4xYiC3oIiJhoDdHBowCMKPihCL+wACpsqV8/S1lwAAAABJRU5ErkJggg==',
			'E701' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7QkNEQx2mMLQiiwU0MDQ6hDJMRRdzdASKooq1sjYEwPSCnRQatWra0lVRS5HdB1QXgKQOKsbogCnG2sDo6IAmJtLAEIrqvtAQoNgUhtCAQRB+VIRY3AcAeqzNJTqWvgUAAAAASUVORK5CYII=',
			'7ABA' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7QkMZAlhDGVpRRFsZQ1gbHaY6oIixtrI2BAQEIItNEWl0bXR0EEF2X9S0lamhK7OmIbmP0QFFHRiyNoiGujYEhoYgiYk0ANU1BKKoC2jA1AsWC2VEERuo8KMixOI+AKgozM0Nz07AAAAAAElFTkSuQmCC',
			'AF37' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7GB1EQx1DGUNDkMRYA0QaWBsdGkSQxESmgHgBKGIBrUAeUF0Akvuilk4NWzV11cosJPdB1bUi2xsaCjZvCgO6eQ0BAehirI2ODuhijKGMKGIDFX5UhFjcBwB+1M1DXu8AKgAAAABJRU5ErkJggg==',
			'32A5' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdElEQVR4nM2QMQ6AIAxFy8AN4D5lYC+JDHKaMnCDegQGOaWORR01sX97+W1eCuM2DH/KJ36ezAJiMilGYhtkg1OzuRpCmJlAjZwiKr+9jN7HWor2ExDLxG66B2TzlRm0nNDNLnzukvbz5HNk2vAH/3sxD34HaO7L6RFBxkMAAAAASUVORK5CYII=',
			'3291' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7RAMYQxhCGVqRxQKmsLYyOjpMRVHZKtLo2hAQiiI2hQEkBtMLdtLKqFVLV2ZGLUVx3xQgDAloRTWPIYChAV2M0YERTQzolgagW1DERANEQx1CGUIDBkH4URFicR8AkrHLtDsveP0AAAAASUVORK5CYII=',
			'B534' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7QgNEQxlDGRoCkMQCpog0sDY6NKKItYqASTR1IQyNDlMCkNwXGjV16aqpq6KikNwXMAWoqtHRAdU8oFhDYGgIqh1AsQA0t7C2soJFkd3MGILu5oEKPypCLO4DAIrR0IkUlnOdAAAAAElFTkSuQmCC',
			'0D09' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZklEQVR4nGNYhQEaGAYTpIn7GB1EQximMEx1QBJjDRBpZQhlCAhAEhOZItLo6OjoIIIkFtAq0ujaEAgTAzspaum0lamroqLCkNwHURcwFVNvQIMIhh0OKHZgcws2Nw9U+FERYnEfADAkzERxZbX5AAAAAElFTkSuQmCC',
			'8E41' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXUlEQVR4nGNYhQEaGAYTpIn7WANEQxkaHVqRxUSmiDQwtDpMRRYLaAWKTXUIxVAXCNcLdtLSqKlhKzOzliK7D6SOFc0OkHmsoQEYYljdgiYGdXNowCAIPypCLO4DAAv3zPU/x7H4AAAAAElFTkSuQmCC',
			'DB94' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7QgNEQxhCGRoCkMQCpoi0Mjo6NKKItYo0ugJJNLFWVqDqACT3RS2dGrYyMyoqCsl9IHUMIYEO6OY5NASGhqCJOQJdgsUtKGLY3DxQ4UdFiMV9AMhgz+e7N3awAAAAAElFTkSuQmCC',
			'1ABA' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7GB0YAlhDGVqRxVgdGENYGx2mOiCJiTqwtrI2BAQEoOgVaXRtdHQQQXLfyqxpK1NDgSSS+9DUQcVEQ10bAkND0M1rCERTh6lXNAQoFsqIIjZQ4UdFiMV9AGUyyiNYvitqAAAAAElFTkSuQmCC',
			'2D28' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdklEQVR4nM2QwQ2AMAhF6aEb4D548I6JLNEp8NANWnfQKSUxJiV61CjcXj4/L8B2GYU/7St+kbsJBCo1DAvm0BNzwzjjPOhI2F4bI+Uzdzgty5rWVFPrx5bL4PoCGSvB9UU1xp6hmgv5W5FuisLO+av/Pbg3fjsp+swXLldWcAAAAABJRU5ErkJggg==',
			'6B04' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7WANEQximMDQEIImJTBFpZQhlaEQWC2gRaXR0dGhFEWsQaWVtCJgSgOS+yKipYUtXRUVFIbkvZApIXaADit5WkUbXhsDQEDQxoB3Y3IIihs3NAxV+VIRY3AcAA/7OhURHhMUAAAAASUVORK5CYII=',
			'A58F' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7GB1EQxlCGUNDkMRYA0QaGB0dHZDViUwRaWBtCEQRC2gVCUFSB3ZS1NKpS1eFrgzNQnJfQCtDoyOaeaGhDI2umOZhEWNtRXdLQCtjCNDNKGIDFX5UhFjcBwA+OMoPeDMzBAAAAABJRU5ErkJggg==',
			'3431' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7RAMYWhlDGVqRxQKmMExlbXSYiqKylSEUKBOKIjaF0ZWh0QGmF+yklVFLl66aumopivumiLQiqYOaJxrq0BCAJgZyRwC6W1pZ0fRC3RwaMAjCj4oQi/sAZ1HMd6BrepUAAAAASUVORK5CYII=',
			'B989' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7QgMYQxhCGaY6IIkFTGFtZXR0CAhAFmsVaXRtCHQQQVEn0ujo6AgTAzspNGrp0qzQVVFhSO4LmMIYCFQ2FUVvKwPQvIAGVDEWkBiaHZhuwebmgQo/KkIs7gMA0G3NjOg/MW8AAAAASUVORK5CYII=',
			'2BB3' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZElEQVR4nGNYhQEaGAYTpIn7WANEQ1hDGUIdkMREpoi0sjY6OgQgiQW0ijS6NgQ0iCDrbgWpc2gIQHbftKlhS0NXLc1Cdl8AijowZHTANI+1AVNMpAHTLaGhmG4eqPCjIsTiPgDBYs18CE2ElgAAAABJRU5ErkJggg==',
			'DF7B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYklEQVR4nGNYhQEaGAYTpIn7QgNEQ11DA0MdkMQCpogAyUCHAGSxVoiYCLpYoyNMHdhJUUunhq1aujI0C8l9YHVTGDHNC2DEMI/RAU0M6BbWBlS9oQFgMRQ3D1T4URFicR8Arq3NGqbQ3vYAAAAASUVORK5CYII=',
			'B99A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7QgMYQxhCGVqRxQKmsLYyOjpMdUAWaxVpdG0ICAhAUQcSC3QQQXJfaNTSpZmZkVnTkNwXMIUx0CEErg5qHkOjQ0NgaAiKGEujYwOaOrBbHFHEIG5mRBEbqPCjIsTiPgCvAc0ySYc3uwAAAABJRU5ErkJggg==',
			'397B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7RAMYQ1hDA0MdkMQCprC2MjQEOgQgq2wVaXQAiokgi00BijU6wtSBnbQyaunSrKUrQ7OQ3TeFMdBhCiOaeQyNDgGMqOa1sgBNQxUDuYW1AVUv2M0NjChuHqjwoyLE4j4AqmfLgao2xYsAAAAASUVORK5CYII=',
			'C912' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nGNYhQEaGAYTpIn7WEMYQximMEx1QBITaWVtZQhhCAhAEgtoFGl0DGF0EEEWaxBpdJgCVI/kvqhVS5dmTQPRCPcFNDAGAtU1OqDoZQDpbWVAsYMFJDaFAd0tUxgC0N3MGOoYGjIIwo+KEIv7AMDqzKZCgAepAAAAAElFTkSuQmCC',
			'1708' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7GB1EQx2mMEx1QBJjdWBodAhlCAhAEhMFijk6OjqIoOhlaGVtCICpAztpZdaqaUtXRU3NQnIfUF0AkjqoGKMDa0MgmnmsDYwYdgB56G4JAYqhuXmgwo+KEIv7AJvuyTwh/LgvAAAAAElFTkSuQmCC',
			'C44B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7WEMYWhkaHUMdkMREWhmmMrQ6OgQgiQU0MoQyTHV0EEEWa2B0ZQiEqwM7KWrV0qUrMzNDs5DcFwA0kbURzbwG0VDX0EBU8xrBbkERA7oFLIasF5ubByr8qAixuA8AWBjMXkQQmIQAAAAASUVORK5CYII=',
			'C3FB' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXElEQVR4nGNYhQEaGAYTpIn7WEOAMDQw1AFJTKRVpJW1gdEhAEksoJGh0RUoJoIs1sCArA7spKhVq8KWhq4MzUJyH5o6mBimeVjswOYWsJsbGFHcPFDhR0WIxX0A28nLGdA/+TIAAAAASUVORK5CYII=',
			'0A73' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAeElEQVR4nM2Quw2AMAxEnSIbmH1MQX9IpGEEpnAKNojYIAWZkk/lCEoQ+Lonn/VkKpdR+lNe8XNC8AFBDPNwA2kvMIyTn0mhbBhmjhJFYfzGvKxTLnkyfudeIkXVbYKAqnucOLZSMw+O3W5pu04ORpXzV/97MDd+G1iCzTDyYygDAAAAAElFTkSuQmCC',
			'F62C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7QkMZQxhCGaYGIIkFNLC2Mjo6BIigiIk0sjYEOrCgigHJQAdk94VGTQtbtTIzC9l9AQ2irQytjA4MaOY5TMEiFsCIZgcrSCeaWxhDWEMDUNw8UOFHRYjFfQCSxMu61vWe5QAAAABJRU5ErkJggg==',
			'4BB2' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpI37poiGsIYyTHVAFgsRaWVtdAgIQBJjDBFpdG0IdBBBEmOdAlbXIILkvmnTpoYtDV21KgrJfQEQdY3IdoSGgswLaEV1C1hsCpoY2C2YbmYMDRkM4Uc9iMV9AIqPzVxG9KYuAAAAAElFTkSuQmCC',
			'FDD0' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAVElEQVR4nGNYhQEaGAYTpIn7QkNFQ1hDGVqRxQIaRFpZGx2mOqCKNbo2BAQEYIgFOogguS80atrK1FWRWdOQ3IemjoAYhh1Y3ILp5oEKPypCLO4DAAbmz1RspPSQAAAAAElFTkSuQmCC',
			'D261' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7QgMYQxhCGVqRxQKmsLYyOjpMRRFrFWl0bXAIRRVjAIrB9YKdFLV01dKlU1ctRXYfUN0UVkeHVjS9AawgEkWM0QFDbAprAyOa3tAA0VCgS0IDBkH4URFicR8A+0vNpWz2OkQAAAAASUVORK5CYII=',
			'F0D5' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7QkMZAlhDGUMDkMQCGhhDWBsdHRhQxFhbWRsC0cREGl0bAl0dkNwXGjVtZeqqyKgoJPdB1AFJDL3oYhA7RDDc4hCA6j6QmxmmOgyC8KMixOI+AGdczWW4QTfmAAAAAElFTkSuQmCC',
			'9DF5' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZElEQVR4nGNYhQEaGAYTpIn7WANEQ1hDA0MDkMREpoi0sjYwOiCrC2gVaXTFLubqgOS+aVOnrUwNXRkVheQ+VleQOqC5yDa3YooJQO1AFoO4hSEA2X1gNzcwTHUYBOFHRYjFfQAzqctzYI0iJQAAAABJRU5ErkJggg==',
			'D528' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcklEQVR4nGNYhQEaGAYTpIn7QgNEQxlCGaY6IIkFTBFpYHR0CAhAFmsVaWBtCHQQQRULAZIwdWAnRS2dunTVyqypWUjuC2hlaHRoZUAzDyg2hRHdvEaHADSxKaytjA6oekMDGENYQwNQ3DxQ4UdFiMV9ABFTzaSy78RbAAAAAElFTkSuQmCC',
			'E652' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7QkMYQ1hDHaY6IIkFNLC2sjYwBASgiIk0sjYwOoigijWwTmVoEEFyX2jUtLClmVmropDcF9Ag2gokGx3QzHNoCGhlQBNzbQiYwoDmFkZHhwB0NzOEMoaGDILwoyLE4j4AjdvNS9J6uY8AAAAASUVORK5CYII=',
			'5746' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdUlEQVR4nGNYhQEaGAYTpIn7QkNEQx0aHaY6IIkFNDA0OrQ6BASgi011dBBAEgsMYGhlCHR0QHZf2LRV01ZmZqZmIbuvlSGAtdERxTyGVkYH1tBABxFkO1pZgbY4ooiJTBEB2YyilzUALIbi5oEKPypCLO4DAFFQzNw6LiiEAAAAAElFTkSuQmCC',
			'1ADE' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYElEQVR4nGNYhQEaGAYTpIn7GB0YAlhDGUMDkMRYHRhDWBsdHZDViTqwtrI2BDqg6hVpdEWIgZ20MmvaytRVkaFZSO5DUwcVEw3FFMOmDiiG7pYQoBiamwcq/KgIsbgPAIN1yMsKom9pAAAAAElFTkSuQmCC',
			'DC2C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7QgMYQxlCGaYGIIkFTGFtdHR0CBBBFmsVaXBtCHRgQRNjAIohuy9q6bRVq1ZmZiG7D6yuldGBAV3vFEwxhwBGVDtAbnFgQHELyM2soQEobh6o8KMixOI+ACu/zOAgsFqQAAAAAElFTkSuQmCC',
			'3060' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZ0lEQVR4nGNYhQEaGAYTpIn7RAMYAhhCGVqRxQKmMIYwOjpMdUBW2craytrgEBCALDZFpNG1gdFBBMl9K6OmrUydujJrGrL7QOocHWHqoOaB9AaiiYHsCECxA5tbsLl5oMKPihCL+wAx9ctxqz3bhwAAAABJRU5ErkJggg==',
			'F79D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZElEQVR4nGNYhQEaGAYTpIn7QkNFQx1CGUMdkMQCGhgaHR0dHQLQxFwbAh1EUMVaWRFiYCeFRq2atjIzMmsakvuA6gIYQtD1MjowYJjH2sCIISbSwIjhFqAKNDcPVPhREWJxHwB3KcxS/F9aQAAAAABJRU5ErkJggg==',
			'A9E8' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZUlEQVR4nGNYhQEaGAYTpIn7GB0YQ1hDHaY6IImxBrC2sjYwBAQgiYlMEWl0BaoWQRILaAWJwdWBnRS1dOnS1NBVU7OQ3BfQyhjoimZeaCgDFvNYsIhhugVoHoabByr8qAixuA8ATADMiJI396gAAAAASUVORK5CYII=',
			'B9B0' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZElEQVR4nGNYhQEaGAYTpIn7QgMYQ1hDGVqRxQKmsLayNjpMdUAWaxVpdG0ICAhAUQcUa3R0EEFyX2jU0qWpoSuzpiG5L2AKYyCSOqh5DEDzAtHEWLDYgekWbG4eqPCjIsTiPgBgSM6+QnilMAAAAABJRU5ErkJggg==',
			'4C65' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpI37pjCGMoQyhgYgi4WwNjo6Ojogq2MMEWlwbUAVY50i0sDawOjqgOS+adOmrVo6dWVUFJL7AkDqHB0aRJD0hoaC9AagiDFMAdkR6IAqBnKLQwCK+8BuZpjqMBjCj3oQi/sAWkzL0rOVeVUAAAAASUVORK5CYII=',
			'640D' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7WAMYWhmmMIY6IImJTGGYyhDK6BCAJBbQAhRxdHQQQRZrYHRlbQiEiYGdFBm1dOnSVZFZ05DcFzJFpBVJHURvq2ioK4YYQyu6HUC3tKK7BZubByr8qAixuA8AjQvK8+V7UrQAAAAASUVORK5CYII=',
			'6FE7' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYUlEQVR4nGNYhQEaGAYTpIn7WANEQ11DHUNDkMREpog0sIJoJLGAFixiDRCxACT3RUZNDVsaumplFpL7QiDmtSLbG9AKFpuCRSwAWQziFkYHVDcDxUIdUcQGKvyoCLG4DwCii8t+dNEAOQAAAABJRU5ErkJggg==',
			'8734' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7WANEQx1DGRoCkMREpjA0ujY6NCKLBbQyNDoASTR1INEpAUjuWxq1atqqqauiopDcB1QXwNDo6IBqHqMDQ0NgaAiKGCuIRHOLSAMryGYUN4s0MKK5eaDCj4oQi/sA43fPDkGRbUAAAAAASUVORK5CYII=',
			'F561' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7QkNFQxlCGVqRxQIaRBoYHR2moouxNjiEoomFsDbA9YKdFBo1denSqauWIrsvoIGh0dXRAc0OoFhDALq9WMRYWxkx9DKGAN0cGjAIwo+KEIv7ALpPzZYHinIaAAAAAElFTkSuQmCC',
			'336A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaUlEQVR4nGNYhQEaGAYTpIn7RANYQxhCGVqRxQKmiLQyOjpMdUBW2crQ6NrgEBCALDaFoZW1gdFBBMl9K6NWhS2dujJrGrL7QOocHWHqkMwLDA3BFENRB3ELql6ImxlRzRug8KMixOI+AAODyyCVV7bQAAAAAElFTkSuQmCC',
			'BB95' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7QgNEQxhCGUMDkMQCpoi0Mjo6OiCrC2gVaXRtCEQVA6pjbQh0dUByX2jU1LCVmZFRUUjuA6ljCAloEEEzz6EBU8wRaIcIhlscApDdB3Ezw1SHQRB+VIRY3AcAWBDNTwaFvDEAAAAASUVORK5CYII=',
			'5BD1' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7QkNEQ1hDGVqRxQIaRFpZGx2mook1ujYEhCKLBQYA1TUEwPSCnRQ2bWrY0lVRS1Hc14qiDiYGMg/VXixiIlPAbkERYw0Auzk0YBCEHxUhFvcBABhzzauJFVg1AAAAAElFTkSuQmCC',
			'F604' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZklEQVR4nGNYhQEaGAYTpIn7QkMZQximMDQEIIkFNLC2MoQyNKKKiTQyOjq0ook1sDYETAlAcl9o1LSwpauioqKQ3BfQINrK2hDogG6ea0NgaAiamKOjAza3oIlhunmgwo+KEIv7AHa8zvJel172AAAAAElFTkSuQmCC',
			'9723' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAeElEQVR4nM2QMQ6AMAhF6cDugPehgztLL9FT4NAbVG/gYE9pExeIjhrlJwwvBF6AdimFP+UVP5QxcYLEhlGFOcbIYpgUmCcVJc9K7yrGb13a2va8ZeOHE8g5aS6XwFDB7RsKap90jCpp4OBcUEgxiXP+6n8P5sbvADsTy/H/+ohDAAAAAElFTkSuQmCC',
			'FD95' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYklEQVR4nGNYhQEaGAYTpIn7QkNFQxhCGUMDkMQCGkRaGR0dHRhQxRpdGwKxibk6ILkvNGrayszMyKgoJPeB1DmEAEk0vQ4NmGKOQDtEMNziEIDqPpCbGaY6DILwoyLE4j4Awy3NrHCgQ4QAAAAASUVORK5CYII=',
			'9362' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7WANYQxhCGaY6IImJTBFpZXR0CAhAEgtoZWh0bXB0EEEVa2UFqUdy37Spq8KWTl21KgrJfayuQHWODo3IdjCAzQOagCQmABGbwoDFLZhuZgwNGQThR0WIxX0A/GfL8chV4JMAAAAASUVORK5CYII=',
			'313C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZklEQVR4nGNYhQEaGAYTpIn7RAMYAhhDGaYGIIkFTGEMYG10CBBBVtnKGsDQEOjAgiw2hSGAodHRAdl9K6NWRa2aujILxX2o6qDmMYDNwyaGbEcAUC+6W0QDWEPR3TxQ4UdFiMV9ANJSyYBd3HBbAAAAAElFTkSuQmCC',
			'0567' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdklEQVR4nGNYhQEaGAYTpIn7GB1EQxlCGUNDkMRYA0QaGB0dGkSQxESmiDSwNqCKBbSKhLCCaCT3RS2dunTp1FUrs5DcF9DK0Ojq6NDKgKIXKNYQMIUB1Q6QWAADiltYWxkdHR1Q3cwYAnQzithAhR8VIRb3AQBYIctbtsXD3gAAAABJRU5ErkJggg==',
			'ECA4' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAY0lEQVR4nGNYhQEaGAYTpIn7QkMYQxmmMDQEIIkFNLA2OoQyNKKKiTQ4Ojq0oouxNgRMCUByX2jUtFVLV0VFRSG5D6Iu0AFDb2hgaAiamCuQRHcLuhjIzaxoYgMVflSEWNwHADyY0HiDLuGfAAAAAElFTkSuQmCC',
			'C781' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7WENEQx1CGVqRxURaGRodHR2mIosFNDI0ujYEhKKINTC0Mjo6wPSCnRS1atW0VaGrliK7D6guAEkdVIzRgbUhAFWskbUBXUykVaQBXS9riEgDQyhDaMAgCD8qQizuAwBh1sxKBuZ0owAAAABJRU5ErkJggg==',
			'1732' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdUlEQVR4nGNYhQEaGAYTpIn7GB1EQx1DGaY6IImxOjA0ujY6BAQgiYkCxRwaAh1EUPQytIJERZDctzJr1bRVU1etikJyH1BdAFBdowOKXqBoQ0ArqltYgWTAFFQxkQZWoFuQxURDRBoYQxlDQwZB+FERYnEfABiSyl8fSIwpAAAAAElFTkSuQmCC',
			'9A8C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7WAMYAhhCGaYGIImJTGEMYXR0CBBBEgtoZW1lbQh0YEERE2l0dHR0QHbftKnTVmaFrsxCdh+rK4o6CGwVDXUFmocsJgA0zxXNDpEpIL2obmENEGl0QHPzQIUfFSEW9wEAxX7LS7n5gXsAAAAASUVORK5CYII=',
			'5FE8' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXElEQVR4nGNYhQEaGAYTpIn7QkNEQ11DHaY6IIkFNIg0sDYwBARgiDE6iCCJBQagqAM7KWza1LCloaumZiG7rxXTPIgYqnkBWMREpmDqZQXZi+bmgQo/KkIs7gMA9ITL1URHmVUAAAAASUVORK5CYII=',
			'B102' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7QgMYAhimMEx1QBILmMIYwBDKEBCALNbKGsDo6OgggqKOIYC1IaBBBMl9oVGropauAhJI7oOqa0SxoxUs1sqAJsbo6DCFAc0OkFtQ3cwayjCFMTRkEIQfFSEW9wEASgjLa3Btyj4AAAAASUVORK5CYII=',
			'9A4A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcUlEQVR4nGNYhQEaGAYTpIn7WAMYAhgaHVqRxUSmMIYwtDpMdUASC2hlbWWY6hAQgCIm0ugQ6OggguS+aVOnrczMzMyahuQ+VleRRtdGuDoIbBUNdQ0NDA1BEhMAmYemTmQKphhrAKbYQIUfFSEW9wEAAvHM5pUv3rAAAAAASUVORK5CYII=',
			'FB49' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYElEQVR4nGNYhQEaGAYTpIn7QkNFQxgaHaY6IIkFNIi0MrQ6BASgigFVOTqIoKsLhIuBnRQaNTVsZWZWVBiS+0DqWIG60fQ2uoYCSXQ7Gh0w7WhEdwummwcq/KgIsbgPACxhzrR4dZE6AAAAAElFTkSuQmCC',
			'AD46' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7GB1EQxgaHaY6IImxBoi0MrQ6BAQgiYlMEQGqcnQQQBILaAWKBTo6ILsvaum0lZmZmalZSO4DqXNtdEQxLzQUKBYa6CCCbl6jI7pYK9B9KHoDWjHdPFDhR0WIxX0ATkPONzczAA4AAAAASUVORK5CYII=',
			'F644' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZElEQVR4nGNYhQEaGAYTpIn7QkMZQxgaHRoCkMQCGlhbGVodGlHFRBoZpjq0ook1MAQ6TAlAcl9o1LSwlZlZUVFI7gtoEG1lbXR0QDfPNTQwNARNzAGbWzDEMN08UOFHRYjFfQDZ4dAPrqlRqwAAAABJRU5ErkJggg==',
			'C391' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7WENYQxhCGVqRxURaRVoZHR2mIosFNDI0ujYEhKKINTC0sjYEwPSCnRS1alXYysyopcjuA6ljCAloRdPb6NCAJga0wxFNDOoWFDGom0MDBkH4URFicR8Acw/Mew1Z3JUAAAAASUVORK5CYII=',
			'7BE4' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAZklEQVR4nGNYhQEaGAYTpIn7QkNFQ1hDHRoCkEVbRVpZGxga0cQaXYEkitgUsLopAcjui5oatjR0VVQUkvsYHUDqGB2Q9bI2gMxjDA1BEhMBizGguCWgAWwHmhgWNw9Q+FERYnEfAIU+zWVk2FbdAAAAAElFTkSuQmCC',
			'7E62' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAa0lEQVR4nGNYhQEaGAYTpIn7QkNFQxlCGaY6IIu2ijQwOjoEBKCJsTY4Ooggi00BiTE0iCC7L2pq2NKpQArJfYxAXayODo3IdrA2gPQGtCK7RQQiNgVZLKAB4hZUMZCbGUNDBkH4URFicR8AYW/LnuzdEHAAAAAASUVORK5CYII=',
			'4B75' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAc0lEQVR4nGNYhQEaGAYTpI37poiGsIYGhgYgi4WItDI0BDogq2MMEWl0QBNjnQJU1+jo6oDkvmnTpoatWroyKgrJfQEgdVMYGkSQ9IaGAs0LQBVjmCLS6OjA6IAm1srawBCA4j6QmxsYpjoMhvCjHsTiPgCNgsu95HIuSAAAAABJRU5ErkJggg==',
			'9285' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAd0lEQVR4nM2QOw6AQAgFoaC3WO8DxfaYSONpsNgbqDewcE+pJX5KTeR1E8ibAPU2Dn/KJ36k2IOhaWBpooIiHPe0pDF7d2Ewikjm4LfMda22DUPwowwTCnuKzQWUXE+sKch0dKSzix+3Gv1IW2ODmX/wvxfz4LcDUSDKw8XxGy4AAAAASUVORK5CYII=',
			'1622' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdElEQVR4nGNYhQEaGAYTpIn7GB0YQxhCGaY6IImxOrC2Mjo6BAQgiYk6iDSyNgQ6iKDoBfECGkSQ3Lcya1oYkFgVheQ+RgfRVoZWhkYHVL2NDlOAouhiAQxTUMWAbnFgCEAWEw1hDGENDQwNGQThR0WIxX0A6vHIwR6g9sEAAAAASUVORK5CYII=',
			'E3D9' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXklEQVR4nGNYhQEaGAYTpIn7QkNYQ1hDGaY6IIkFNIi0sjY6BASgiDE0ujYEOoigirWyIsTATgqNWhW2dFVUVBiS+yDqAqaKYJgHtAlTDM0OTLdgc/NAhR8VIRb3AQBxic4UroFJCQAAAABJRU5ErkJggg==',
			'2F5C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbElEQVR4nGNYhQEaGAYTpIn7WANEQ11DHaYGIImJTBFpYG1gCBBBEgtoBYkxOrAg6waJTWV0QHHftKlhSzMzs1DcBzYp0AHZXkYHTDHWBpAdgSh2iAAho6MDiltCQ4G8UAYUNw9U+FERYnEfAPVDyl/1A1fPAAAAAElFTkSuQmCC',
			'D554' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7QgNEQ1lDHRoCkMQCpog0sDYwNKKItYLFWtHEQlinMkwJQHJf1NKpS5dmZkVFIbkvoJWh0aEh0AFVL1gsNATVvEZXoEtQ3cLayuiI6r7QAMYQhlAGFLGBCj8qQizuAwB4Tc+qdAtc5wAAAABJRU5ErkJggg==',
			'BD30' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXElEQVR4nGNYhQEaGAYTpIn7QgNEQxhDGVqRxQKmiLSyNjpMdUAWaxVpdGgICAhAVdfo0OjoIILkvtCoaSuzpq7MmobkPjR1SOYFYhHDsAPDLdjcPFDhR0WIxX0AUwfPhFwj0jwAAAAASUVORK5CYII=',
			'7061' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7QkMZAhhCGVpRRFsZQxgdHaaiirG2sjY4hKKITRFpdG2A64W4KWraytSpq5Yiu4/RAajO0QHFDtYGkN4AFDGRBpAdqGIBDWC3oImB3RwaMAjCj4oQi/sAB33LdWwCCN8AAAAASUVORK5CYII=',
			'DF1A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAYklEQVR4nGNYhQEaGAYTpIn7QgNEQx2mMLQiiwVMEWlgCGGY6oAs1irSwBjCEBCAJsYwhdFBBMl9UUunhq2atjJrGpL70NQhi4WG4DYP4RY0sdAAoFtCHVHEBir8qAixuA8A7RzMpxRr4CcAAAAASUVORK5CYII=',
			'5A83' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7QkMYAhhCGUIdkMQCGhhDGB0dHQJQxFhbWYGkCJJYYIBII1BZQwCS+8KmTVuZFbpqaRay+1pR1EHFRENd0cwLAKpDFxOZAtKL6hZWoL0OaG4eqPCjIsTiPgCn382PjUL3BgAAAABJRU5ErkJggg==',
			'4BBB' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXUlEQVR4nGNYhQEaGAYTpI37poiGsIYyhjogi4WItLI2OjoEIIkxhog0ujYEOoggibFOQVEHdtK0aVPDloauDM1Ccl/AFEzzQkMxzWOYglUMQy9WNw9U+FEPYnEfAC1bzFOX5a+hAAAAAElFTkSuQmCC',
			'F1AC' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAX0lEQVR4nGNYhQEaGAYTpIn7QkMZAhimMEwNQBILaGAMYACKi6CIsQYwOjo6sKCIMQSwNgQ6ILsvNGpV1NJVkVnI7kNThxALxSIGVIdpRwC6W0KBYihuHqjwoyLE4j4ANx7K4Z6VuWsAAAAASUVORK5CYII=',
			'10CC' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAWUlEQVR4nGNYhQEaGAYTpIn7GB0YAhhCHaYGIImxOjCGMDoEBIggiYk6sLayNgg6sKDoFWl0BZmA5L6VWdNWpgJJZPehqcMjhs0OLG4JwXTzQIUfFSEW9wEAh2XHs1alnvMAAAAASUVORK5CYII=',
			'0C82' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaElEQVR4nGNYhQEaGAYTpIn7GB0YQxlCGaY6IImxBrA2Ojo6BAQgiYlMEWlwbQh0EEESC2gVaWB0dGgQQXJf1NJpq1aFAmkk90HVNTqg6WUFkgwYdgRMYcDiFkw3M4aGDILwoyLE4j4AOMzMMYCdXtwAAAAASUVORK5CYII=',
			'97A2' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdklEQVR4nM2QMQ6AIAxFvwO7A96nDO41kcXTwMANkBu4cErLZImOmti/vfy0L0W9TcCf8omf4clTxk6K2YxIHsyKcUJ0zpHtWTKBg1V+Za/lqJvk8jMzWHpR30AayHjZoNgo26SX0bnYxrh3bmzx6w/+92Ie/E4AN8zKSnOiUQAAAABJRU5ErkJggg==',
			'6574' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAcElEQVR4nGNYhQEaGAYTpIn7WANEQ1lDAxoCkMREpogAyYBGZLGAFrBYK4pYg0gIQ6PDlAAk90VGTV26aumqqCgk94VMAalidEDR2woUC2AMDUERE2l0dGBAcwtrK2sDqhhrAGMIuthAhR8VIRb3AQBN4s6E28nSjwAAAABJRU5ErkJggg==',
			'A977' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdElEQVR4nGNYhQEaGAYTpIn7GB0YQ1hDA0NDkMRYA1hbGRoCGkSQxESmiDQ6oIkFtALFwKII90UtXbo0a+mqlVlI7gtoZQx0mMLQimxvaChDo0MAwxQGFPNYGh0dGAJQxVhbWYGuRBUDuhlNbKDCj4oQi/sAH7vMuLXrRbAAAAAASUVORK5CYII=',
			'6CA0' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAbklEQVR4nGNYhQEaGAYTpIn7WAMYQxmmMLQii4lMYW10CGWY6oAkFtAi0uDo6BAQgCzWINLA2hDoIILkvsioaauWrorMmobkvpApKOogeluBYqGYYq4NASh2gNwCFENxC8jNrEDVgyH8qAixuA8AAOzN499W+8UAAAAASUVORK5CYII=',
			'A3E8' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAXklEQVR4nGNYhQEaGAYTpIn7GB1YQ1hDHaY6IImxBoi0sjYwBAQgiYlMYWh0BaoWQRILaGVAVgd2UtTSVWFLQ1dNzUJyH5o6MAwNxWoeFjFMtwS0Yrp5oMKPihCL+wDQNMwvLJozYwAAAABJRU5ErkJggg==',
			'E32B' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7QkNYQxhCGUMdkMQCGkRaGR0dHQJQxBgaXRsCHURQxVoZgGIBSO4LjVoVtmplZmgWkvvA6loZMcxzmMKIbl6jQwC6GNAtDqh6QW5mDQ1EcfNAhR8VIRb3AQDlScvnlPqqZgAAAABJRU5ErkJggg==',
			'722A' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAdUlEQVR4nGNYhQEaGAYTpIn7QkMZQxhCGVpRRFtZWxkdHaY6oIiJNLo2BAQEIItNYWh0aAh0EEF2X9SqpatWZmZNQ3IfowNQZSsjTB0YsjYwBDBMYQwNQRITAakMQFUXAFTJ6IAuJhrqGhqIIjZQ4UdFiMV9AFTHyoL8/gIHAAAAAElFTkSuQmCC',
			'9E2C' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAb0lEQVR4nGNYhQEaGAYTpIn7WANEQxlCGaYGIImJTBFpYHR0CBBBEgtoFWlgbQh0YEETYwCKIbtv2tSpYatWZmYhu4/VFaiuldEBxWaQ3imoYgIgsQBGFDvAbnFgQHELyM2soQEobh6o8KMixOI+AF+fycg5bTXBAAAAAElFTkSuQmCC',
			'021F' => 'iVBORw0KGgoAAAANSUhEUgAAAEkAAAAhAgMAAADoum54AAAACVBMVEX///8AAADS0tIrj1xmAAAAaklEQVR4nGNYhQEaGAYTpIn7GB0YQximMIaGIImxBrC2MoQwOiCrE5ki0uiIJhbQytDoMAUuBnZS1NJVS1dNWxmaheQ+oLopDFMw9Aagi4mA+GhiQLc0oIsxOoiGOoY6oogNVPhREWJxHwCXMMhu/HJ4eAAAAABJRU5ErkJggg=='        
        );
        $this->text = array_rand( $images );
        return $images[ $this->text ] ;    
    }
    
    function out_processing_gif(){
        $image = dirname(__FILE__) . '/processing.gif';
        $base64_image = "R0lGODlhFAAUALMIAPh2AP+TMsZiALlcAKNOAOp4ANVqAP+PFv///wAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQFCgAIACwAAAAAFAAUAAAEUxDJSau9iBDMtebTMEjehgTBJYqkiaLWOlZvGs8WDO6UIPCHw8TnAwWDEuKPcxQml0Ynj2cwYACAS7VqwWItWyuiUJB4s2AxmWxGg9bl6YQtl0cAACH5BAUKAAgALAEAAQASABIAAAROEMkpx6A4W5upENUmEQT2feFIltMJYivbvhnZ3Z1h4FMQIDodz+cL7nDEn5CH8DGZhcLtcMBEoxkqlXKVIgAAibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkphaA4W5upMdUmDQP2feFIltMJYivbvhnZ3V1R4BNBIDodz+cL7nDEn5CH8DGZAMAtEMBEoxkqlXKVIg4HibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpjaE4W5tpKdUmCQL2feFIltMJYivbvhnZ3R0A4NMwIDodz+cL7nDEn5CH8DGZh8ONQMBEoxkqlXKVIgIBibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpS6E4W5spANUmGQb2feFIltMJYivbvhnZ3d1x4JMgIDodz+cL7nDEn5CH8DGZgcBtMMBEoxkqlXKVIggEibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpAaA4W5vpOdUmFQX2feFIltMJYivbvhnZ3V0Q4JNhIDodz+cL7nDEn5CH8DGZBMJNIMBEoxkqlXKVIgYDibbK9YLBYvLtHH5K0J0IACH5BAUKAAgALAEAAQASABIAAAROEMkpz6E4W5tpCNUmAQD2feFIltMJYivbvhnZ3R1B4FNRIDodz+cL7nDEn5CH8DGZg8HNYMBEoxkqlXKVIgQCibbK9YLBYvLtHH5K0J0IACH5BAkKAAgALAEAAQASABIAAAROEMkpQ6A4W5spIdUmHQf2feFIltMJYivbvhnZ3d0w4BMAIDodz+cL7nDEn5CH8DGZAsGtUMBEoxkqlXKVIgwGibbK9YLBYvLtHH5K0J0IADs=";
        $binary = is_file($image) ? join("",file($image)) : base64_decode($base64_image); 
        header("Cache-Control: post-check=0, pre-check=0, max-age=0, no-store, no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: image/gif");
        echo $binary;
    }

}
# end of class phpfmgImage
# ------------------------------------------------------
# end of module : captcha


# module user
# ------------------------------------------------------
function phpfmg_user_isLogin(){
    return ( isset($_SESSION['authenticated']) && true === $_SESSION['authenticated'] );
}


function phpfmg_user_logout(){
    session_destroy();
    header("Location: admin.php");
}

function phpfmg_user_login()
{
    if( phpfmg_user_isLogin() ){
        return true ;
    };
    
    $sErr = "" ;
    if( 'Y' == $_POST['formmail_submit'] ){
        if(
            defined( 'PHPFMG_USER' ) && strtolower(PHPFMG_USER) == strtolower($_POST['Username']) &&
            defined( 'PHPFMG_PW' )   && strtolower(PHPFMG_PW) == strtolower($_POST['Password']) 
        ){
             $_SESSION['authenticated'] = true ;
             return true ;
             
        }else{
            $sErr = 'Login failed. Please try again.';
        }
    };
    
    // show login form 
    phpfmg_admin_header();
?>
<form name="frmFormMail" action="" method='post' enctype='multipart/form-data'>
<input type='hidden' name='formmail_submit' value='Y'>
<br><br><br>

<center>
<div style="width:380px;height:260px;">
<fieldset style="padding:18px;" >
<table cellspacing='3' cellpadding='3' border='0' >
	<tr>
		<td class="form_field" valign='top' align='right'>Email :</td>
		<td class="form_text">
            <input type="text" name="Username"  value="<?php echo $_POST['Username']; ?>" class='text_box' >
		</td>
	</tr>

	<tr>
		<td class="form_field" valign='top' align='right'>Password :</td>
		<td class="form_text">
            <input type="password" name="Password"  value="" class='text_box'>
		</td>
	</tr>

	<tr><td colspan=3 align='center'>
        <input type='submit' value='Login'><br><br>
        <?php if( $sErr ) echo "<span style='color:red;font-weight:bold;'>{$sErr}</span><br><br>\n"; ?>
        <a href="admin.php?mod=mail&func=request_password">I forgot my password</a>   
    </td></tr>
</table>
</fieldset>
</div>
<script type="text/javascript">
    document.frmFormMail.Username.focus();
</script>
</form>
<?php
    phpfmg_admin_footer();
}


function phpfmg_mail_request_password(){
    $sErr = '';
    if( $_POST['formmail_submit'] == 'Y' ){
        if( strtoupper(trim($_POST['Username'])) == strtoupper(trim(PHPFMG_USER)) ){
            phpfmg_mail_password();
            exit;
        }else{
            $sErr = "Failed to verify your email.";
        };
    };
    
    $n1 = strpos(PHPFMG_USER,'@');
    $n2 = strrpos(PHPFMG_USER,'.');
    $email = substr(PHPFMG_USER,0,1) . str_repeat('*',$n1-1) . 
            '@' . substr(PHPFMG_USER,$n1+1,1) . str_repeat('*',$n2-$n1-2) . 
            '.' . substr(PHPFMG_USER,$n2+1,1) . str_repeat('*',strlen(PHPFMG_USER)-$n2-2) ;


    phpfmg_admin_header("Request Password of Email Form Admin Panel");
?>
<form name="frmRequestPassword" action="admin.php?mod=mail&func=request_password" method='post' enctype='multipart/form-data'>
<input type='hidden' name='formmail_submit' value='Y'>
<br><br><br>

<center>
<div style="width:580px;height:260px;text-align:left;">
<fieldset style="padding:18px;" >
<legend>Request Password</legend>
Enter Email Address <b><?php echo strtoupper($email) ;?></b>:<br />
<input type="text" name="Username"  value="<?php echo $_POST['Username']; ?>" style="width:380px;">
<input type='submit' value='Verify'><br>
The password will be sent to this email address. 
<?php if( $sErr ) echo "<br /><br /><span style='color:red;font-weight:bold;'>{$sErr}</span><br><br>\n"; ?>
</fieldset>
</div>
<script type="text/javascript">
    document.frmRequestPassword.Username.focus();
</script>
</form>
<?php
    phpfmg_admin_footer();    
}


function phpfmg_mail_password(){
    phpfmg_admin_header();
    if( defined( 'PHPFMG_USER' ) && defined( 'PHPFMG_PW' ) ){
        $body = "Here is the password for your form admin panel:\n\nUsername: " . PHPFMG_USER . "\nPassword: " . PHPFMG_PW . "\n\n" ;
        if( 'html' == PHPFMG_MAIL_TYPE )
            $body = nl2br($body);
        mailAttachments( PHPFMG_USER, "Password for Your Form Admin Panel", $body, PHPFMG_USER, 'You', "You <" . PHPFMG_USER . ">" );
        echo "<center>Your password has been sent.<br><br><a href='admin.php'>Click here to login again</a></center>";
    };   
    phpfmg_admin_footer();
}


function phpfmg_writable_check(){
 
    if( is_writable( dirname(PHPFMG_SAVE_FILE) ) && is_writable( dirname(PHPFMG_EMAILS_LOGFILE) )  ){
        return ;
    };
?>
<style type="text/css">
    .fmg_warning{
        background-color: #F4F6E5;
        border: 1px dashed #ff0000;
        padding: 16px;
        color : black;
        margin: 10px;
        line-height: 180%;
        width:80%;
    }
    
    .fmg_warning_title{
        font-weight: bold;
    }

</style>
<br><br>
<div class="fmg_warning">
    <div class="fmg_warning_title">Your form data or email traffic log is NOT saving.</div>
    The form data (<?php echo PHPFMG_SAVE_FILE ?>) and email traffic log (<?php echo PHPFMG_EMAILS_LOGFILE?>) will be created automatically when the form is submitted. 
    However, the script doesn't have writable permission to create those files. In order to save your valuable information, please set the directory to writable.
     If you don't know how to do it, please ask for help from your web Administrator or Technical Support of your hosting company.   
</div>
<br><br>
<?php
}


function phpfmg_log_view(){
    $n = isset($_REQUEST['file'])  ? $_REQUEST['file']  : '';
    $files = array(
        1 => PHPFMG_EMAILS_LOGFILE,
        2 => PHPFMG_SAVE_FILE,
    );
    
    phpfmg_admin_header();
   
    $file = $files[$n];
    if( is_file($file) ){
        if( 1== $n ){
            echo "<pre>\n";
            echo join("",file($file) );
            echo "</pre>\n";
        }else{
            $man = new phpfmgDataManager();
            $man->displayRecords();
        };
     

    }else{
        echo "<b>No form data found.</b>";
    };
    phpfmg_admin_footer();
}


function phpfmg_log_download(){
    $n = isset($_REQUEST['file'])  ? $_REQUEST['file']  : '';
    $files = array(
        1 => PHPFMG_EMAILS_LOGFILE,
        2 => PHPFMG_SAVE_FILE,
    );

    $file = $files[$n];
    if( is_file($file) ){
        phpfmg_util_download( $file, PHPFMG_SAVE_FILE == $file ? 'form-data.csv' : 'email-traffics.txt', true, 1 ); // skip the first line
    }else{
        phpfmg_admin_header();
        echo "<b>No email traffic log found.</b>";
        phpfmg_admin_footer();
    };

}


function phpfmg_log_delete(){
    $n = isset($_REQUEST['file'])  ? $_REQUEST['file']  : '';
    $files = array(
        1 => PHPFMG_EMAILS_LOGFILE,
        2 => PHPFMG_SAVE_FILE,
    );
    phpfmg_admin_header();

    $file = $files[$n];
    if( is_file($file) ){
        echo unlink($file) ? "It has been deleted!" : "Failed to delete!" ;
    };
    phpfmg_admin_footer();
}


function phpfmg_util_download($file, $filename='', $toCSV = false, $skipN = 0 ){
    if (!is_file($file)) return false ;

    set_time_limit(0);


    $buffer = "";
    $i = 0 ;
    $fp = @fopen($file, 'rb');
    while( !feof($fp)) { 
        $i ++ ;
        $line = fgets($fp);
        if($i > $skipN){ // skip lines
            if( $toCSV ){ 
              $line = str_replace( chr(0x09), ',', $line );
              $buffer .= phpfmg_data2record( $line, false );
            }else{
                $buffer .= $line;
            };
        }; 
    }; 
    fclose ($fp);
  

    
    /*
        If the Content-Length is NOT THE SAME SIZE as the real conent output, Windows+IIS might be hung!!
    */
    $len = strlen($buffer);
    $filename = basename( '' == $filename ? $file : $filename );
    $file_extension = strtolower(substr(strrchr($filename,"."),1));

    switch( $file_extension ) {
        case "pdf": $ctype="application/pdf"; break;
        case "exe": $ctype="application/octet-stream"; break;
        case "zip": $ctype="application/zip"; break;
        case "doc": $ctype="application/msword"; break;
        case "xls": $ctype="application/vnd.ms-excel"; break;
        case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
        case "gif": $ctype="image/gif"; break;
        case "png": $ctype="image/png"; break;
        case "jpeg":
        case "jpg": $ctype="image/jpg"; break;
        case "mp3": $ctype="audio/mpeg"; break;
        case "wav": $ctype="audio/x-wav"; break;
        case "mpeg":
        case "mpg":
        case "mpe": $ctype="video/mpeg"; break;
        case "mov": $ctype="video/quicktime"; break;
        case "avi": $ctype="video/x-msvideo"; break;
        //The following are for extensions that shouldn't be downloaded (sensitive stuff, like php files)
        case "php":
        case "htm":
        case "html": 
                $ctype="text/plain"; break;
        default: 
            $ctype="application/x-download";
    }
                                            

    //Begin writing headers
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: public"); 
    header("Content-Description: File Transfer");
    //Use the switch-generated Content-Type
    header("Content-Type: $ctype");
    //Force the download
    header("Content-Disposition: attachment; filename=".$filename.";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$len);
    
    while (@ob_end_clean()); // no output buffering !
    flush();
    echo $buffer ;
    
    return true;
 
    
}
?>