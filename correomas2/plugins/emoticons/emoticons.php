<?php

/* Path for SquirrelMail required files. */
define('SM_PATH','../../');

/* SquirrelMail required files. */
require_once(SM_PATH . 'include/validate.php');

echo" <BR><TR><TD align=right>Emoticons:</td><TD align=left>";
		echo "
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/regular_smile.gif>');\"><img src=../plugins/emoticons/images/regular_smile.gif border=0 ALT=\"Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/teeth_smile.gif>');\"><img src=../plugins/emoticons/images/teeth_smile.gif border=0 ALT=\"Open-Mouthed Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/wink_smile.gif>');\"><img src=../plugins/emoticons/images/wink_smile.gif border=0 ALT=\"Winking Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/omg_smile.gif>');\"><img src=../plugins/emoticons/images/omg_smile.gif border=0 ALT=\"Surprised Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/tounge_smile.gif>');\"><img src=../plugins/emoticons/images/tounge_smile.gif border=0 ALT=\"Tounge-Out Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/shades_smile.gif>');\"><img src=../plugins/emoticons/images/shades_smile.gif border=0 ALT=\"Cool Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/angry_smile.gif>');\"><img src=../plugins/emoticons/images/angry_smile.gif border=0 ALT=\"Angry Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/confused_smile.gif>');\"><img src=../plugins/emoticons/images/confused_smile.gif border=0 ALT=\"Confused Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/embaressed_smile.gif>');\"><img src=../plugins/emoticons/images/embaressed_smile.gif border=0 ALT=\"Embarassed Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/sad_smile.gif>');\"><img src=../plugins/emoticons/images/sad_smile.gif border=0 ALT=\"Sad Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/cry_smile.gif>');\"><img src=../plugins/emoticons/images/cry_smile.gif border=0 ALT=\"Crying Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/whatchutalkingabout_smile.gif>');\"><img src=../plugins/emoticons/images/whatchutalkingabout_smile.gif border=0 ALT=\"Disappointed Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/angel_smile.gif>');\"><img src=../plugins/emoticons/images/angel_smile.gif border=0 ALT=\"Innocent Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/undecided.gif>');\"><img src=../plugins/emoticons/images/undecided.gif border=0 ALT=\"Undecided Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/dude_hug.gif>');\"><img src=../plugins/emoticons/images/dude_hug.gif border=0 ALT=\"Male Hug\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/girl_hug.gif>');\"><img src=../plugins/emoticons/images/girl_hug.gif border=0 ALT=\"Female Hug\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/girl_handsacrossamerica.gif>');\"><img src=../plugins/emoticons/images/girl_handsacrossamerica.gif border=0 ALT=\"Girl\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/guy_handsacrossamerica.gif>');\"><img src=../plugins/emoticons/images/guy_handsacrossamerica.gif border=0 ALT=\"Boy\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/heart.gif>');\"><img src=../plugins/emoticons/images/heart.gif border=0 ALT=\"Red Heart\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/broken_heart.gif>');\"><img src=../plugins/emoticons/images/broken_heart.gif border=0 ALT=\"Broken Heart\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/rose.gif>');\"><img src=../plugins/emoticons/images/rose.gif border=0 ALT=\"Red Rose\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/wilted_rose.gif>');\"><img src=../plugins/emoticons/images/wilted_rose.gif border=0 ALT=\"Wilted Rose\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/kiss.gif>');\"><img src=../plugins/emoticons/images/kiss.gif border=0 ALT=\"Kiss\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/beer_yum.gif>');\"><img src=../plugins/emoticons/images/beer_yum.gif border=0 ALT=\"Beer\"></a>
<BR>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/martini_shaken.gif>');\"><img src=../plugins/emoticons/images/martini_shaken.gif border=0 ALT=\"Martini\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/coffee.gif>');\"><img src=../plugins/emoticons/images/coffee.gif border=0 ALT=\"Coffee\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/bat.gif>');\"><img src=../plugins/emoticons/images/bat.gif border=0 ALT=\"Bat\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/bowwow.gif>');\"><img src=../plugins/emoticons/images/bowwow.gif border=0 ALT=\"Dog\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/kittykay.gif>');\"><img src=../plugins/emoticons/images/kittykay.gif border=0 ALT=\"Cat\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/cake.gif>');\"><img src=../plugins/emoticons/images/cake.gif border=0 ALT=\"Cake\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/present.gif>');\"><img src=../plugins/emoticons/images/present.gif border=0 ALT=\"Gift\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/clock.gif>');\"><img src=../plugins/emoticons/images/clock.gif border=0 ALT=\"Clock\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/devil_smile.gif>');\"><img src=../plugins/emoticons/images/devil_smile.gif border=0 ALT=\"Devil Smiley\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/envelope.gif>');\"><img src=../plugins/emoticons/images/envelope.gif border=0 ALT=\"Email\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/messenger.gif>');\"><img src=../plugins/emoticons/images/messenger.gif border=0 ALT=\"MSN Messenger\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/phone.gif>');\"><img src=../plugins/emoticons/images/phone.gif border=0 ALT=\"Phone Call\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/camera.gif>');\"><img src=../plugins/emoticons/images/camera.gif border=0 ALT=\"Camera\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/film.gif>');\"><img src=../plugins/emoticons/images/film.gif border=0 ALT=\"Movie\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/musical_note.gif>');\"><img src=../plugins/emoticons/images/musical_note.gif border=0 ALT=\"Music\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/asl.gif>');\"><img src=../plugins/emoticons/images/asl.gif border=0 ALT=\"Age/Sex/Location\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/handcuffs.gif>');\"><img src=../plugins/emoticons/images/handcuffs.gif border=0 ALT=\"Handcuffs\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/sun.gif>');\"><img src=../plugins/emoticons/images/sun.gif border=0 ALT=\"Sun\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/moon.gif>');\"><img src=../plugins/emoticons/images/moon.gif border=0 ALT=\"Moon\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/lightbulb.gif>');\"><img src=../plugins/emoticons/images/lightbulb.gif border=0 ALT=\"Light Bulb\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/star.gif>');\"><img src=../plugins/emoticons/images/star.gif border=0 ALT=\"Star\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/thumbs_down.gif>');\"><img src=../plugins/emoticons/images/thumbs_down.gif border=0 ALT=\"Thumbs Down\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/thumbs_up.gif>');\"><img src=../plugins/emoticons/images/thumbs_up.gif border=0 ALT=\"Thumbs Up\"></a>
			<a href=\"javascript:editor_insertHTML('body','<img src=../plugins/emoticons/images/rainbow.gif>');\"><img src=../plugins/emoticons/images/rainbow.gif border=0 ALT=\"Rainbow\"></a>
			 ";
echo "</td></tr>";

?>