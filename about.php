<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * About filter_iconactivatecontent.
 *
 * @package     filter_iconactivatecontent
 * @copyright   2022 ICON Vernetzte Kommunikation GmbH <pascal.collins@iconnewmedia.de>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__, 3).'/config.php');
require_once($CFG->libdir.'/adminlib.php');

$context = context_system::instance();

$pageparams = array();
admin_externalpage_setup('filtericonactivatecontent_about', '', $pageparams);
$siteurl = new moodle_url('/filter/iconactivatecontent/about.php', $pageparams);

$PAGE->set_url($siteurl);
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');

echo $OUTPUT->header();

$image = array('url' => $CFG->wwwroot.'/filter/iconactivatecontent/pix/ICON_logo.png',
    'title' => 'ICON Vernetzte Kommunikation GmbH',
    'attributes' => array('class' => 'about-image', 'style' => 'margin-bottom: 30px'));

$aboutlogo = html_writer::img($image['url'], $image['title'], $image['attributes']);

$params = array('aboutlink' => html_writer::link('https://moodle.org/plugins/filter_iconactivatecontent',
    get_string('plugindirectory', 'filter_iconactivatecontent'), array('target' => '_blank')),
    'aboutmail' => html_writer::link('mailto:info@iconnewmedia.de', 'info@iconnewmedia.de'),
    'abouticon' => 'ICON Vernetzte Kommunikation GmbH',
    'modiconactivatecontent' => html_writer::link('https://moodle.org/plugins/mod_iconactivatecontent',
        get_string('modiconactivatecontent', 'filter_iconactivatecontent'), array('target' => '_blank')));

$abouttext = html_writer::div(get_string('abouttext', 'filter_iconactivatecontent', $params), 'about-text');
$aboutfeedback = html_writer::div(get_string('aboutfeedbacktext', 'filter_iconactivatecontent', $params), 'aboutfeedback-text');

echo $OUTPUT->box($aboutlogo.$abouttext.$aboutfeedback, 'about-box');
echo $OUTPUT->footer();
