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
 * This filter allows to make external content (embedded content from other platforms, such as iframes) embeddable in such a way
 * that they don't get shown until activated by the user
 *
 * @package    filter
 * @subpackage iconactivatecontent
 * @copyright  2022 ICON Vernetzte Kommunikation GmbH
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class filter_iconactivatecontent extends moodle_text_filter {

    public function filter($text, array $options = array()) {
        global $OUTPUT, $PAGE, $CFG;
        if (!preg_match_all('#{iconactivate}([\S\s]*)(?:\|headline:([^{]*))?{/iconactivate}#U', $text, $matches)) {
            return $text;
        }
        $commonplatforms = [
            'youtube.com' => 'youtube',
            'youtu.be' => 'youtube',
            'instagram.com' => 'instagram',
            'twitter.com' => 'twitter',
            'maps.google.com' => 'google_maps',
            'goo.gl/maps' => 'google_maps',
            'www.google.com/maps' => 'google_maps',
            'facebook.com' => 'facebook'
        ];
        foreach ($matches[1] as $key => $match) {
            if (empty($matches[2][$key])) {
                $headline = get_string('headline', 'filter_iconactivatecontent');
            } else {
                $headline = $matches[2][$key];
            }
            $infotext = get_string('infotext', 'filter_iconactivatecontent');
            $id = uniqid("filter-activatecontent-");
            $footer = get_string('footer', 'filter_iconactivatecontent');
            $icon = '';
            foreach ($commonplatforms as $url => $platform) {
                if (strpos($match, $url) > -1) {
                    $imgurl = $OUTPUT->image_url('icon_' . $platform, 'filter_iconactivatecontent');
                    $icon = '<img src="' . $imgurl . '">';
                }
            }
            $config = get_config('filter_iconactivatecontent');
            $style = '';
            if (isset($config->width)) {
                $width = trim($config->width);
                if (preg_match('/^([0-9]*)(px|%)?$/', $width, $widthmatch)) {
                    if (!isset($widthmatch[2])) {
                        $width .= 'px';
                    }
                    $style = ' style="max-width:' . $width . '" ';
                }
            }
            $context = array(
                'content' => $match,
                'headline' => $headline,
                'infotext' => $infotext,
                'footer' => $footer,
                'contentid' => $id,
                'icon' => $icon,
                'style' => $style
            );
            $replacement = $OUTPUT->render_from_template('filter_iconactivatecontent/view', $context);
            $text = str_replace($matches[0][$key], $replacement, $text);
        }
        $PAGE->requires->js_call_amd('filter_iconactivatecontent/activate', 'init');
        return $text;
    }

}
