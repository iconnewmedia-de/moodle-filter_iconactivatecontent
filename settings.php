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
 * filter_iconactivatecontent admin settings.
 *
 * @package    filter_iconactivatecontent
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
    $ADMIN->add('filtersettings', new admin_category('filtericonactivatecontentfolder',
        get_string('filtername', 'filter_iconactivatecontent')));
    $settings = new admin_settingpage($section, get_string('settings', 'filter_iconactivatecontent'), 'moodle/site:config');

    $settings->add(new admin_setting_configtext('filter_iconactivatecontent/width',
            get_string('width', 'filter_iconactivatecontent'),
            '',
            900,
            PARAM_TEXT,
            60
        )
    );
    $ADMIN->add('filtericonactivatecontentfolder', $settings);
    $ADMIN->add('filtericonactivatecontentfolder', new admin_externalpage('filtericonactivatecontent_about',
        get_string('about', 'filter_iconactivatecontent'), new moodle_url('/filter/iconactivatecontent/about.php')));



    $settings = null;
}
