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

   function squirrelmail_plugin_init_addgraphics() {
      global $squirrelmail_plugin_hooks;
      $squirrelmail_plugin_hooks["left_main_before"]["addgraphics"] = "addgraph_left";
   }


   function addgraph_left() {

      if (defined('SM_PATH'))
         include_once(SM_PATH . 'plugins/addgraphics/functions.php');
      else
         include_once('../plugins/addgraphics/functions.php');

      addgraph_left_do();

   }


   function addgraphics_version()
   {
      return '2.1';
   }

?>
