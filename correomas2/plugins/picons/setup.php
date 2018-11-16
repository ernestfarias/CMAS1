<?php
    // picons
    // version 0.4
    // by Thomas Thurman <thomas@thurman.org.uk>
    // Copyright (c) 2001, Thomas Thurman
    // Licensed under the GNU GPL-- see ../../COPYING
    // No warranties, express or implied, are attached to this code.
    //
    // This plugin gives each user the ability to add small icons,
    // known as "picons", to identify the senders of email messages.

    function squirrelmail_plugin_init_picons() {
        global $squirrelmail_plugin_hooks;
        $squirrelmail_plugin_hooks["message_icon"]["picons"] = "show_picon";
        $squirrelmail_plugin_hooks["options_display_inside"]["picons"] = "picon_options_show";
        $squirrelmail_plugin_hooks["options_display_save"]["picons"] = "picon_options_save";
        $squirrelmail_plugin_hooks["loading_prefs"]["picons"] = "picon_options_load";
    }

    // Called from the "message_icon" hook to do the displaying of an icon.
    // Args[1] is the From line of the email.
    // Args[2] is 0 if we're in a mailbox listing, 1 if we're displaying a whole email.

    function show_picon(&$Args) {
        global $picons_mailbox, $picons_from, $picons_decay;

        // It's possible they'll give us some weird funky addresses.
        
        if (preg_match("/.*\<(.*)\>.*/", $Args[1], $memories))
            $email = $memories[1];
        else if (preg_match("/.*&lt;(.*)&gt;.*/", $Args[1], $memories))
            // icky HTML escaping-- but we shall survive!
            $email = $memories[1];
        else if (preg_match("/(.*)\(.*\)/", $Args[1], $memories))
            $email = $memories[1];
        else if (preg_match("/\(.*\).*/", $Args[1], $memories))
            $email = $memories[1];
        else
            $email = $Args[1];

        if ($Args[2]==0) {
            $size = $picons_mailbox;
        } else {
            $size = $picons_from;
        }

        if ($size!=0) {
		echo '<img src="../plugins/picons/picon.php?address=' .
		trim($email);
		if ($picons_decay==0) echo "&nodecay=1";
                echo '" width="'. $size .'" height="'. $size
                . '" alt="" align="left" valign="baseline">';
        }

    }

    function picon_options_show() {
        global $picons_mailbox, $picons_from, $picons_decay;

        echo '<tr><td align="right" nowrap>Picons in mailboxes</td><td>';
        echo '<select name="picons_picon_mailbox">';
        picon_size_list($picons_mailbox);
        echo '</select>';
        echo '</td></tr>';

        echo '<tr><td align="right" nowrap>Picons in the "from" field of mail</td><td>';
        echo '<select name="picons_picon_from">';
        picon_size_list($picons_from);
        echo '</select>';
        echo '</td></tr>';

        echo '<tr><td align="right" nowrap>Graceful decay of picons</td><td>';
        echo '<select name="picons_picon_decay">';
        picon_print_option(0, $picons_decay, 'Only show exact matches on usernames');
        picon_print_option(1, $picons_decay, 'Search both usernames and domains');
        echo '</select>';
        echo '</td></tr>';

    }

    function picon_size_list($current) {
        picon_print_option( 0, $current, "No picons");
        picon_print_option(24, $current, "Small (24x24)");
        picon_print_option(36, $current, "Medium (36x36)");
        picon_print_option(48, $current, "Full size (48x48)");
    }

    function picon_print_option($value, $current, $name) {
        echo '<option value="' . $value. '"';
        if ($current==$value) {
            echo ' selected';
        }
        echo '>'. $name . "</option>\n";
    }

    function picon_options_load() {
        global $username, $data_dir;
        global $picons_mailbox, $picons_from, $picons_decay;

        $picons_mailbox = getPref($data_dir, $username, 'picons_mailbox');
        $picons_from = getPref($data_dir, $username, 'picons_from');
        $picons_decay = getPref($data_dir, $username, 'picons_decay');

        if ($picons_mailbox=="") { $picons_mailbox = 24; }
        if ($picons_from=="") { $picons_from = 48; }
        if ($picons_decay=="") { $picons_decay = 1; }
    }

    function picon_options_save() {
        global $username, $data_dir;
        global $picons_picon_mailbox, $picons_picon_from, $picons_picon_decay;

        setPref($data_dir, $username, 'picons_mailbox', $picons_picon_mailbox);
        setPref($data_dir, $username, 'picons_from', $picons_picon_from);
        setPref($data_dir, $username, 'picons_decay', $picons_picon_decay);
    }
?>
