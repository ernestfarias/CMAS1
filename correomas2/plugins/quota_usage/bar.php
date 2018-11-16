<?php

/**
  * SquirrelMail Quota Usage Plugin
  * Copyright (c) 2001, 2002 Bill Shupp <hostmaster@shupp.org>
  * Copyright (c) 2003, 2004 Paul Lesneiwski <pdontthink@angrynerds.com>
  * Licensed under the GNU GPL. For full terms see the file COPYING.
  *
  * This file originally donated by Mike Smith <mike@ftl.com>
  *
  */


if (!defined('SM_PATH'))
   define('SM_PATH', '../../');


include_once(SM_PATH . 'include/validate.php');


global $warn_percent, $yellow_alert_percent;
include_once(SM_PATH . 'plugins/quota_usage/config.php');


sqgetGlobalVar('left', $width, SQ_GET);
$width -= 25;
sqgetGlobalVar('usage', $usage, SQ_GET);
sqgetGlobalVar('threshold', $quota, SQ_GET);
sqgetGlobalVar('zero', $zero, SQ_GET);

header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

header ('Content-type: image/png');
    
$im = @imagecreate ($width, 15)
  or die ('Cannot Initialize new GD image stream!');

$white = imagecolorallocate ($im, 255, 255, 255);
$green = imagecolorallocate ($im, 0, 128, 0);
$yellow = imagecolorallocate ($im, 255, 255, 0);
$red = imagecolorallocate ($im, 255, 0, 0);
$blue = imagecolorallocate ($im, 0, 0, 255);
$text_color = $blue;

if ( isset($zero) ) 
{
   $fill_width = $width/2;
   imagefilledrectangle ($im, 1,1,1,13,$white);
   imagestring ($im, 2, $fill_width, 1, '0%', $blue);
   imagepng ($im);
}
else 
{

    $percent = ($usage/$quota);
    $eval = round($percent*100, 1);

    switch(TRUE) 
    {

        case ( $eval < $yellow_alert_percent) :
	    $fill_width = round($width*$percent);
            $text_pos = ($width-$fill_width)/2.8+$fill_width;
	    $fill_color = $green;
	    break;

        case ( ($eval < $warn_percent) && ($eval >= $yellow_alert_percent) ) :
	    $fill_width = round($width*$percent);
	    $fill_color = $yellow;
	    $text_pos = ($fill_width*.50);
	    break;

	case ( $eval >= 100 ) :
	    $eval = 100;
	    $fill_width = $width-2;
	    $text_pos = ($fill_width*.45);
	    $fill_color = $red;
	    break;

        default:
	    $fill_width = round($width*$percent);
	    $text_pos = ($fill_width*.50);
	    $fill_color = $red;
	    break;

    } //end switch

    imagefilledrectangle ($im, 1, 1, $fill_width, 13, $fill_color);
    imagestring ($im, 2, $text_pos, 1, "$eval%", $text_color);
    imagepng ($im);

}


?>
