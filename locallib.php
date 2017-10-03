<?php
// This file is part of the Moodle plugin EJSApp Interactions
//
// EJSApp Interactions is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// EJSApp Interactions is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Lib API functions.
 *
 * @package   report_ejsappinteractions
 * @copyright  2015 Luis de la Torre and Félix García
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once(__DIR__ . '/lib.php');

/**
 * Show the number of clicks a user made over a lab application's elements.
 *
 * @param int $userid the id of the user whose information we want to display
 * @param int $ejsappid the id of the EJSApp activity whose information we want to display
 * @return int
 */
function report_ejsappinteractions_user_clicks($userid, $ejsappid, $sessionid) {
    // TODO: Get the data from the ejsapp_records table, do stuff and return the real value.
    // For the moment, we just return a fixed value.
    return $userid + round($ejsappid/100) + $sessionid;
}

/**
 * TODO: Define more functions that return interesting data on the use of the EJSApp lab applications.
 */