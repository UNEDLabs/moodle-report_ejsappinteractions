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

/**
 * This function extends the course navigation options with the report items
 *
 * @param navigation_node $navigation The navigation node to extend
 * @param stdClass $course The course to object for the report
 * @param context $context
 */
function report_ejsappinteractions_extend_navigation_course($navigation, $course, $context) {
    if (has_capability('report/ejsappinteractions:view', $context)) {
        $navigation->add(get_string('navigationlink', 'report_ejsappinteractions'),
            new moodle_url('/report/ejsappinteractions/index.php', array('id'=>$course->id)),
            $navigation::TYPE_SETTING, null, null, new pix_icon('i/report', ''));
    }
}

/**
 * This function extends EJSApp module navigation options with the report items
 *
 * @param navigation_node $navigation The navigation node to extend
 * @param stdClass $cm
 */
function report_ejsappinteractions_extend_navigation_module($navigation, $cm) {
    if (has_capability('report/ejsappinteractions:view', context_course::instance($cm->course))) {
        $navigation->add(get_string('navigationlink', 'report_ejsappinteractions'),
            new moodle_url('/report/ejsappinteractions/index.php', array('id' => $cm->course, 'coursemoduleid' => $cm->id)),
            $navigation::TYPE_SETTING, null, 'ejsappreport');
    }
}