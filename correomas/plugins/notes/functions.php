<?php
/**
 * functions.php
 *
 * @author Jimmy Conner <jimmy@sqmail.org>
 * @copyright Copyright &copy; 2005, Jimmy Conner (Licensed under the GNU GPL see "LICENSE")
 *
 * @package plugins
 * @subpackage notes
 * @version $Id: functions.php,v 1.1 2005/01/05 15:02:26 cigamit Exp $
 */

function notes_add_link() {
   //displayInternalLink('plugins/notes/notes.php', _("Notes"), 'right');
   displayInternalLink ('plugins/notes/notes.php', '<img src="/images/icons/notes_h.gif" border="0" align="absmiddle" hspace="3" alt="' . _("Notes") . '">');
   //echo "&nbsp;&nbsp;\n";
}

?>