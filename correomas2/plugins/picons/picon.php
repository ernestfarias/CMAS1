<?php
    // picons
    // version 0.3
    // by Thomas Thurman <thomas@thurman.org.uk>
    // Copyright (c) 2001, Thomas Thurman
    // Licensed under the GNU GPL-- see ../../COPYING
    // No warranties, express or implied, are attached to this code.
    //
    // This plugin gives each user the ability to add small icons,
    // known as "picons", to identify the senders of email messages.

    // You probably don't need to change anything.

    // Array of libraries, in the order to search them. You might
    // set these to local and distro copies, or just to one copy in
    // the plugins/picon directory, for example. When we're looking
    // up a particular icon path, all libraries will be searched in
    // turn before we go on to the next path, and so on.

    $libraries = array('/usr/local/lib/picon', '/usr/lib/picon');

    // Array of databases within each library. They'll be searched
    // in this order.

    $databases = array('users', 'misc', 'domains', 'unknown');

    ///// end of configuration section /////

    $dual = explode('@', $address);
    $user = $dual[0];
    $domain = array_reverse(explode('.', $dual[1]));

    header('Content-Type: image/gif');

    for ($known=1; $known>=0; $known--) {
        if ($known) $user=$dual[0]; else $user='unknown';

        for ($domain_cursor=count($domain);
            $domain_cursor>=0; $domain_cursor--) {

            reset($databases);
            do {

                reset($libraries);
                do {

                   $domain_part = '';

                   for ($i=0; $i<$domain_cursor; $i++)
                       $domain_part = $domain_part . '/' . $domain[$i];

                   if ($domain_part=='') $domain_part='/MISC';

                   try (current($libraries) . '/' . current($databases) .
                       $domain_part . '/' . $user . '/face.gif');

                } while (next($libraries));
            } while (next($databases));

            // Feature requested by Przemek Piotrowski:
            // if you specify a value for 'nodecay', we return blank.gif unless
            // we hit a picon on the first, most exact, search.
            if (isset($nodecay)) try ('blank.gif');
        }
    }

    try('blank.gif'); // Last chance...
    exit(0); // It just isn't our day. :(

    function try($filename) {
        if (@readfile($filename)) exit(1);
    }
?>