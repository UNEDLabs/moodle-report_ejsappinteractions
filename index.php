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
 * Listing of all sessions for current user.
 *
 * @package   report_ejsappinteractions
 * @copyright  2015 Luis de la Torre and Félix García
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__ . '/../../config.php');
require_once(__DIR__ . '/locallib.php');

$courseid = required_param('id', PARAM_INT);
$coursemoduleid = optional_param('coursemoduleid', 0, PARAM_INT);

require_login($courseid, false);

$context = context_course::instance($courseid);
require_capability('report/ejsappinteractions:view', $context);

$PAGE->set_url('/report/ejsappinteractions/index.php');
$PAGE->set_context($context);
$PAGE->set_title(get_string('navigationlink', 'report_ejsappinteractions'));
$PAGE->set_heading(get_string('navigationlink', 'report_ejsappinteractions'));
$PAGE->set_pagelayout('admin');

// Create the breadcrumb.
$PAGE->add_report_nodes($USER->id, array(
    'name' => get_string('navigationlink', 'report_usersessions'),
    'url' => new moodle_url('/report/ejsappinteractions/index.php')
));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('navigationlink', 'report_ejsappinteractions'));

if ($coursemoduleid != 0) {
    $ejsappid = $DB->get_field('course_modules', 'instance', array('id' => $coursemoduleid));
} else {
    $ejsappid = 0;
}

// TODO: Create form elements to allow teachers to select the information they want to display (activity(s), user(s), session, chart type...)

// TODO: Call the appropriate function in locallib to get the data.

// For the moment, we display the information given by report_ejsappinteractions_user_clicks in locallib.php in a
// bar chart.
$userid = rand(0,20);
$sessionid = rand(0,10);
$data = report_ejsappinteractions_user_clicks($userid, $ejsappid, $sessionid);
$series1 = new \core\chart_series('', array($data));
$chart = new core\chart_bar();
$chart->add_series($series1);
$chart->set_title('Number of clicks for EJSApp activity with id=' . $ejsappid);
$chart->set_labels(array('User id'));
echo $OUTPUT->render($chart);

echo $OUTPUT->footer();