<?php
   /*
    *  addgraphics
    *  By Mark Motley <mmotley@la-mirada.net>
    *  Changes By Paul Lesneiwski <pdontthink@angrynerds.com>
    *  (c) 2000 (GNU GPL - see ../../COPYING)
    *
    *  This plugin adds a customized graphic at the top of the left-hand
    *  frame of the main SquirrelMail mailbox screen.
    *
    *  The graphic can be any size, but you should probably try to make
    *  it rather small (like 200 x 100).  It should also be a GIF with
    *  transparency to support changing of the background color by the
    *  user.
    *
    *  The graphic can be changed on a per-domain basis if you host
    *  more than one (virtual) domain.
    *
    *  See config.php for image specification.
    *
    */

   global $left_image, $differentImagePerDomain, $left_image_alt,
          $addgraphics_virtualDomains, $image_height, $image_width,
          $div_style;


   /*
    * Indicate the path and filename of the default image.  Make 
    * sure you put in the appropriate URI stuff.  If you place it 
    * in the "images" directory off the source Squirrelmail directory, 
    * '../images/<filename>' should usually suffice.
    */
   $left_image = '../images/spacer.gif';



   /*
    * Default alternate text for the image, in case user doens't let it load
    */
   $left_image_alt = '';



   /**
    * Assign a default URL if you want your image(s) to be clickable (the URL
    * will be opened in a new browser window) (the image will not be a link
    * if you leave this as an empty string)
    */
   $left_image_url = '';
   //$left_image_url = 'http://www.squirrelmail.org';




   /*
    * Specify optional default image width and height - this is mostly
    * useful for specifying zero width/height as default, which will
    * turn off image display.  Otherwise you should comment these lines
    * out (by placing two forward slashes in front of the lines).
    */
   //$image_width  = 308;
   //$image_height = 111;
   $image_width  = 0;
   //$image_height = 0;



   /*
    * The image is placed within <DIV></DIV> tags that
    * accept style attributes.  If you want more control
    * over how the image is displayed (different
    * positioning, add decoration, etc), you can fill
    * in CSS style attributes here.  If nothing is
    * specified, the image is merely centered above the
    * folder list.
    *
    * To learn more about CSS Style, see
    *   http://www.htmlhelp.com/reference/css/
    * List of available properties:
    *   http://www.htmlhelp.com/reference/css/properties.html
    *
    * Example: $div_style="position:absolute;top:200px;left:5px;";
    *
    * If you don't need to add any style changes, just
    * leave this line commented out (with two slashes in
    * front).
    */
    //$div_style='position:absolute;top:200px;left:5px;';



   /* 
    * Set this variable to 1 if you want to display a different image
    * for each of the domains you host. 
    */
   $differentImagePerDomain = 1;



   /*   
    * If you are using the same image for all domains or only host
    * one domain, you can ignore this setting.
    *
    * Indicate the path and filename of the images for each of the domains
    * you host - any that are left out will use the default image specified
    * above.  Also be sure to specify the alternate text for each one and
    * a URL if you want any of them to be clickable links.
    *
    * Specifying the image width is optional and usually not needed.
    *
    * Note that the name of the domain can be only partial.  That is,
    * "mydomain" is enough to represent "mydomain.com"
    */   
   $addgraphics_virtualDomains = array(

      'mydomain' => array(

         'left_image' => '../images/mydomain_logo.gif',
         'left_image_alt' => 'My Domain',
         'left_image_url' => '',   // this one won't be a link
         'div_style'      => 'position:absolute;top:200px;left:5px;',
         //'image_width' => 100,
         //'image_height'   => 100,

      ),

      'anotherdomain' => array(

         'left_image' => '../images/anotherdomain_logo.gif',
         'left_image_alt' => 'Another Domain',
         'left_image_url' => 'http://www.anotherdomain.org',   // this one will be a link

         //'div_style'      => 'text-align: center;',
         //'image_width' => 100,
         //'image_height'   => 100,

      ),

   );


?>
