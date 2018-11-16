<?php

/**
  * SquirrelMail Quota Usage Plugin
  * Copyright (c) 2001, 2002 Bill Shupp <hostmaster@shupp.org>
  * Copyright (c) 2003, 2004 Paul Lesneiwski <pdontthink@angrynerds.com>
  * Licensed under the GNU GPL. For full terms see the file COPYING.
  *
  */


/**
  * Display quota information above folder list
  *
  */
function display_quota_usage_left_do() 
{

   global $username, $key, $imapServerAddress, $imapPort, 
          $imap_stream, $imapConnection, 
          $UseSeparateImapConnection;


   // Detect if we have already connected to IMAP or not.
   // Also check if we are forced to use a separate IMAP connection
   //
   if ((!isset($imap_stream) && !isset($imapConnection)) || $UseSeparateImapConnection) 
   {
      $stream = sqimap_login($username, $key, $imapServerAddress, $imapPort, 10);
      $previously_connected = false;
   } 
   else if (isset($imapConnection)) 
   {
      $stream = $imapConnection;
      $previously_connected = true;
   } 
   else 
   {
      $previously_connected = true;
      $stream = $imap_stream;
   }


   global $fontsize, $warn_percent, $yellow_alert_percent, $use_fancy,
          $quota_usage_debug, $intro_text, $show_quota_intro_text,
          $use_1000KB_MB, $show_quota_count_intro_text, $intro_text_count,
          $left_size;


   include_once(SM_PATH . 'plugins/quota_usage/config.php');


   $usage = sqimap_get_quota($stream, 'INBOX');
   if ($quota_usage_debug) { echo "Usage is: <br />"; sm_print_r($usage); }
   if (strpos($usage[0], 'NOQUOTA') === FALSE) 
   {

      $taken = $usage[0];
      $total = $usage[1];
      $count = $usage[2];
      $maxcount = $usage[3];

      if ($taken !== '' && $total !== '')
         $percent = number_format(($taken / $total) * 100, 1);
      else 
         $percent = '';

      if ($count !== '' && $maxcount !== '')
         $countpercent = number_format(($count / $maxcount) * 100, 1);
      else 
         $countpercent = '';

// was:     $quota = number_format((($total * 1024) - 1023) / 1000000, 1);
      if ($use_1000KB_MB)
         $quota = number_format($total / 1000, 1);
      else
         $quota = number_format($total / 1024, 1);


      if ($percent !== '')
      {
         if ($percent >= $warn_percent) 
         {
            $percentcolor = '#FF0000';
         }
         else if (!empty($yellow_alert_percent) && $yellow_alert_percent > 0 
                 && $percent >= $yellow_alert_percent) 
         {
            $percentcolor = '#FFE349';
            //$percentcolor = 'yellow';
         } 
         else 
         {
            $percentcolor = 'green';
         }
      }
      else $percentcolor = '';


      if ($countpercent !== '')
      {
         if($countpercent >= $warn_percent) 
         {
            $countcolor = "#FF0000";
         } 
         else if (!empty($yellow_alert_percent) && $yellow_alert_percent > 0 
                 && $countpercent >= $yellow_alert_percent) 
         {
            $countcolor = "#FFE349";
            //$countcolor = 'yellow';
         } 
         else 
         {
            $countcolor = "green";
         }
      }
      else $countcolor = '';


      bindtextdomain('quota_usage', SM_PATH . 'plugins/quota_usage/locale');
      textdomain('quota_usage');

      if ($show_quota_intro_text && empty($intro_text)) 
         $intro_text = _("current usage:");

      $showing_quota = FALSE;

      if ($percentcolor !== '' && $use_fancy && function_exists('imagecreate'))
      {
         $showing_quota = TRUE;

         $alt = sprintf(_("%s%% of %sM"), $percent, $quota);

//         $alt = sprintf(_("%s out of %s"), human_readable_quota($taken * 1024),
//                                           human_readable_quota($total * 1024));

         echo "<center><font size=\"$fontsize\">" 
            . ($show_quota_intro_text ? $intro_text . '<br />' : '')
            . "\n"
            . "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"90%\">\n"
            . " <tr>\n"
            . "     <td align=\"middle\"><font size=\"$fontsize\"><strong>"
            . "$alt</strong></font>\n"
            . "     </td>\n"
            . " </tr>\n"
            . " <tr>\n"
            . "     <td align=\"middle\">\n"
            . '<img src="' . SM_PATH . "plugins/quota_usage/bar.php?left=$left_size&usage="
            . "$taken&threshold=$total\" alt=\"$alt\" title=\"$alt\"><br />\n"
            . "  </td></tr>\n"
            . "</table>\n";
      }
      else if ($percentcolor !== '')
      {
         $showing_quota = TRUE;

         echo "<center><font size=\"$fontsize\">" 
            . ($show_quota_intro_text ? $intro_text . '<br />' : '')
            . "\n"
            . "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"90%\">\n"
            . " <tr>\n"
            . "     <td align=\"middle\"><font size=\"$fontsize\"><strong>"
            . sprintf(_("%s%% of %sM"), $percent, $quota) . "</strong></font>\n"
            . "     </td>\n"
            . " </tr>\n"
            . " <tr bgcolor=\"#cccccc\">\n"
            . "     <td align=\"left\">\n"
            . "         <table border=\"0\" cellpadding=\"0\" width=\""
            . (($percent >= 100) ? "100" : $percent)."%\">\n"
            . "             <tr bgcolor=\"#cccccc\">\n"
            . "             <td bgcolor=\"$percentcolor\"><font size=\"$fontsize\">"
            . (($percent >= 100) ? '<center><strong>' . _("Over Quota!") . '</center></strong>' : '&nbsp')
            . "</font></td>\n"
            . "             </tr>\n"
            . "         </table>\n"
            . "     </td>\n"
            . " </tr>\n"
            . "</table>\n"
            . "</font></center>\n";
      }
      
      if ($countcolor !== '' && $use_fancy && function_exists('imagecreate'))
      {
         $showing_quota = TRUE;

         $alt = sprintf(_("%s%% of %s messages"), $countpercent, $maxcount);

//         $alt = sprintf(_("%s out of %s"), $count, $maxcount);

         echo "<center><font size=\"$fontsize\">" 
            . ($show_quota_count_intro_text ? $intro_text_count . '<br />' : '')
            . "\n"
            . "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"90%\">\n"
            . " <tr>\n"
            . "     <td align=\"middle\"><font size=\"$fontsize\"><strong>"
            . "$alt</strong></font>\n"
            . "     </td>\n"
            . " </tr>\n"
            . " <tr>\n"
            . "     <td align=\"middle\">\n"
            . '<img src="' . SM_PATH . "plugins/quota_usage/bar.php?left=$left_size&usage="
            . "$count&threshold=$maxcount\" alt=\"$alt\" title=\"$alt\"><br />\n"
            . "  </td></tr>\n"
            . "</table>\n";
      }
      else if ($countcolor !== '')
      {
         $showing_quota = TRUE;

         echo "<center><font size=\"$fontsize\">" 
            . ($show_quota_count_intro_text ? $intro_text_count . '<br />' : '')
            . "\n"
            . "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"90%\">\n"
            . " <tr>\n"
            . "     <td align=\"middle\"><font size=\"$fontsize\"><strong>"
            . sprintf(_("%s%% of %s messages"), $countpercent, $maxcount) . "</strong></font>\n"
            . "     </td>\n"
            . " </tr>\n"
            . " <tr bgcolor=\"#cccccc\">\n"
            . "     <td align=\"left\">\n"
            . "         <table border=\"0\" cellpadding=\"0\" width=\""
            . (($countpercent >= 100) ? "100" : $countpercent)."%\">\n"
            . "             <tr bgcolor=\"#cccccc\">\n"
            . "             <td bgcolor=\"$countcolor\"><font size=\"$fontsize\">"
            . (($countpercent >= 100) ? '<center><strong>' . _("Over Quota!") . '</center></strong>' : '&nbsp')
            . "</font></td>\n"
            . "             </tr>\n"
            . "         </table>\n"
            . "     </td>\n"
            . " </tr>\n"
            . "</table>\n"
            . "</font></center>\n";
      }
      
      bindtextdomain('squirrelmail', SM_PATH . 'locale');
      textdomain('squirrelmail');

      if ($showing_quota) echo '<p>';

   }

   if (!$previously_connected)
      sqimap_logout($stream);

}



/**
  * Display quota warning upon login if needed
  *
  */
function display_quota_usage_MOTD_do()
{

   global $username, $key, $imapServerAddress, $imapPort, 
          $imap_stream, $imapConnection,
          $UseSeparateImapConnection;


   // Detect if we have already connected to IMAP or not.
   // Also check if we are forced to use a separate IMAP connection
   //
   if ((!isset($imap_stream) && !isset($imapConnection)) || $UseSeparateImapConnection)
   {
      $stream = sqimap_login($username, $key, $imapServerAddress, $imapPort, 10);
      $previously_connected = false;
   }
   else if (isset($imapConnection))
   {
      $stream = $imapConnection;
      $previously_connected = true;
   }
   else
   {
      $previously_connected = true;
      $stream = $imap_stream;
   }


   global $yellow_alert_quota_MOTD, $critical_alert_quota_MOTD,
          $quota_usage_debug, $show_yellow_alert_MOTD_warning,
          $show_critical_alert_MOTD_warning, $use_1000KB_MB;


   include_once(SM_PATH . 'plugins/quota_usage/config.php');


   bindtextdomain('quota_usage', SM_PATH . 'plugins/quota_usage/locale');
   textdomain('quota_usage');


   $usage = sqimap_get_quota($stream, "INBOX");
   if ($quota_usage_debug) { echo "Usage is: <br />"; sm_print_r($usage); }
   if (strpos($usage[0], 'NOQUOTA') === FALSE) 
   {

      $taken = $usage[0];
      $total = $usage[1];
      $count = $usage[2];
      $maxcount = $usage[3];

      if ($taken !== '' && $total !== '')
         $percent = number_format(($taken/$total) * 100, 1);
      else 
         $percent = '';

      if ($count !== '' && $maxcount !== '')
         $countpercent = number_format(($count / $maxcount) * 100, 1);
      else 
         $countpercent = '';

// was:     $quota = number_format((($total * 1024) - 1023) / 1000000, 1);
      if ($use_1000KB_MB)
         $quota = number_format($total / 1000, 1);
      else
         $quota = number_format($total / 1024, 1);


      if (empty($critical_alert_quota_MOTD)) 
         $critical_alert_quota_MOTD = _("<strong>Warning:</strong> Your quota usage is currently ###PERCENT_USED###.  To avoid losing any email, you should immediately empty out your Trash and Sent folders and delete any emails with large attachments.");

      if (empty($yellow_alert_quota_MOTD)) 
         $yellow_alert_quota_MOTD = _("<strong>Warning:</strong> Your quota usage is currently ###PERCENT_USED###.  You may want to make sure you empty out your Trash and clean your Sent folder.");
   

      // display potential warnings in this order (first one wins):
      //   - size usage is critical
      //   - message count is critical
      //   - size usage is yellow alert
      //   - message count is yellow alert
      //
      if ($percent !== '' && $percent >= $warn_percent)
      {

         if ($show_critical_alert_MOTD_warning)
         {
            $critical_alert_quota_MOTD =
             str_replace('###PERCENT_USED###', $percent . '%', $critical_alert_quota_MOTD);
            global $motd;
            $motd .= $critical_alert_quota_MOTD;
         }

      }
      else if ($countpercent !== '' && $countpercent >= $warn_percent)
      {

         if ($show_critical_alert_MOTD_warning)
         {
            $critical_alert_quota_MOTD =
             str_replace('###PERCENT_USED###', $countpercent . '%', $critical_alert_quota_MOTD);
            global $motd;
            $motd .= $critical_alert_quota_MOTD;
         }

      } 
      else if ($percent !== '' && !empty($yellow_alert_percent) 
              && $yellow_alert_percent > 0 && $percent >= $yellow_alert_percent)
      {

         if ($show_critical_alert_MOTD_warning)
         {
            $yellow_alert_quota_MOTD =
             str_replace('###PERCENT_USED###', $percent . '%', $yellow_alert_quota_MOTD);
            global $motd;
            $motd .= $yellow_alert_quota_MOTD;
         }

      }
      else if ($countpercent !== '' && !empty($yellow_alert_percent) 
              && $yellow_alert_percent > 0 && $countpercent >= $yellow_alert_percent)
      {

         if ($show_critical_alert_MOTD_warning)
         {
            $yellow_alert_quota_MOTD =
             str_replace('###PERCENT_USED###', $countpercent . '%', $yellow_alert_quota_MOTD);
            global $motd;
            $motd .= $yellow_alert_quota_MOTD;
         }

      }

   }

   bindtextdomain('squirrelmail', SM_PATH . 'locale');
   textdomain('squirrelmail');

   if (!$previously_connected)
      sqimap_logout($stream);

}



/**
  * Gets current quota usage from IMAP server
  *
  * @param resource $imap_stream An open stream to the IMAP server
  * @param string $mailbox The mail folder for which to check quota 
  *                        usage
  *
  * @return array A four-element array, consisting of numbers in kilobytes
  *               representing (in this order):  
  *                  - storage used (size quota)
  *                  - total storage available (size quota)
  *                  - messages used (message count quota)
  *                  - total messages available (message count quota)
  *               If either size or message count quota is not available,
  *               the corresponding numbers will instead be returned as
  *               empty strings.
  *               If no quota is given or available, the first element
  *               in the return array is given as "NOQUOTA".
  *
  */
function sqimap_get_quota ($imap_stream, $mailbox) 
{

   global $quota_usage_debug;

   if (check_quota_capability($imap_stream)) 
   {

      $imap_command = "a001 GETQUOTAROOT \"$mailbox\"\r\n";

      fputs ($imap_stream, $imap_command);
      $read_ary = sqimap_read_data ($imap_stream, 'a001', true, $result, $message);

      if (check_sm_version(1, 5, 0))
         $read_ary = $read_ary['a001'];

      if ($quota_usage_debug) 
      {
         echo "IMAP command sent: $imap_command<br />";
         echo 'IMAP response recieved:';
         sm_print_r($read_ary);
      }

      foreach ($read_ary as $response)
      {
         $storageUsed = '';
         $storageTotal = '';
         $messagesUsed = '';
         $messagesTotal = '';
         if (is_array($response))
            foreach ($response as $resp)
            {
               if (strpos($resp, 'STORAGE') !== FALSE || strpos($resp, 'MESSAGE') !== FALSE)
               {
                  preg_match('/[(]([STORAGEMESSAGE0-9 ]+)[)]/', $resp, $matches);
                  $usageArray = explode(' ', $matches[1]);
                  if ($usageArray[0] == 'STORAGE')
                     list($storageUsed, $storageTotal) = array($usageArray[1], $usageArray[2]);
                  if (!empty($usageArray[3]) && $usageArray[3] == 'STORAGE')
                     list($storageUsed, $storageTotal) = array($usageArray[4], $usageArray[5]);
                  if ($usageArray[0] == 'MESSAGE')
                     list($messagesUsed, $messagesTotal) = array($usageArray[1], $usageArray[2]);
                  if (!empty($usageArray[3]) && $usageArray[3] == 'MESSAGE')
                     list($messagesUsed, $messagesTotal) = array($usageArray[4], $usageArray[5]);
                  return array($storageUsed, $storageTotal, $messagesUsed, $messagesTotal);
               }
            }
         else if (strpos($response, 'STORAGE') !== FALSE || strpos($response, 'MESSAGE') !== FALSE)
         {
            preg_match('/[(]([STORAGEMESSAGE0-9 ]+)[)]/', $response, $matches);
            $usageArray = explode(' ', $matches[1]);
            if ($usageArray[0] == 'STORAGE')
               list($storageUsed, $storageTotal) = array($usageArray[1], $usageArray[2]);
            if (!empty($usageArray[3]) && $usageArray[3] == 'STORAGE')
               list($storageUsed, $storageTotal) = array($usageArray[4], $usageArray[5]);
            if ($usageArray[0] == 'MESSAGE')
               list($messagesUsed, $messagesTotal) = array($usageArray[1], $usageArray[2]);
            if (!empty($usageArray[3]) && $usageArray[3] == 'MESSAGE')
               list($messagesUsed, $messagesTotal) = array($usageArray[4], $usageArray[5]);
            return array($storageUsed, $storageTotal, $messagesUsed, $messagesTotal);
         }
     }

   }

   return array('NOQUOTA');

}


/**
  * Determines if IMAP server can report quota information or not
  *
  * @param resource $imap_stream An open stream to the IMAP server
  *                              (optional if $capability is not empty)
  * @param array $capability The IMAP server's capability strings,
  *                          which, if given, is used as is instead 
  *                          of connecting to the IMAP server and 
  *                          asking for its capabilities (optional)
  *
  * @return boolean TRUE if IMAP server has QUOTA capability, FALSE otherwise
  *
  */
function check_quota_capability($imap_stream, $capability='') 
{

   // get CAPABILITY from IMAP server if needed
   //
   if (empty($capability))
   {
      fputs ($imap_stream, "a001 CAPABILITY\r\n");
      $capability = sqimap_read_data($imap_stream, 'a001', true, $a, $b);

      if (check_sm_version(1, 5, 0))
         $capability = $capability['a001'];
   }


   // parse CAPABILITIES, looking for QUOTA
   //
   foreach ($capability as $response)
   {
      if (is_array($response))
         foreach ($response as $resp)
         {
            if (strpos($resp, 'QUOTA') !== FALSE)
               return TRUE;
         }
         else if (strpos($response, 'QUOTA') !== FALSE)
            return TRUE;
   }


   return false;

}



/**
  * Convert quota size into a displayable number
  *
  * Donated by Mike Smith <mike@ftl.com>
  *
  */
function human_readable_quota($number, $base=1024,
            $suffixes=array(" B", " KB", " MB", " GB", " TB", " PB", " EB"))
{
   $usesuf = 0;
   $n = (float) $number; //Appears to be necessary to avoid rounding
   while( $n >= $base ) 
   {
      $n /= (float) $base;
      $usesuf++;
   }
   $places = 2 - floor( log10( $n ) );
   $places = max( $places, 0 );
   $retval = number_format( $n, $places, ".", "" ) . $suffixes[$usesuf];
   return $retval;
}



?>
