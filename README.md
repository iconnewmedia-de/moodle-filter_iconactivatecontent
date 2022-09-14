# Activate content by ICON #

The activate content filter by ICON lets you easily embed content from other platforms (often provided by a "Share -> embed" feature on social media) in any content in a GDPR-compliant way.
What we mean by GDPR-compliant is that the content won't be inserted until users have given their consent by activating it with a click.

To embed content, copy the embed code from the other platform and paste it into the Moodle platform, preceded by {iconactivate} and followed by {/iconactivate}.
For example, if you're on https://www.youtube.com/watch?v=dQw4w9WgXcQ, you click on "Share" beneath the video, then on "Embed" and copy the code.
Then on Moodle, inside a text editor for example (make sure you're in HTML view if it's a rich text editor like TinyMCE or Atto), you paste it and add the snippets mentioned above like so:

`
{iconactivate}
<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
{/iconactivate}
`

You can also add a custom headline, by writing "|headline:Your headline here" before the closing {/iconactivate}, so the complete code could look like this:
`
{iconactivate}
<iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
|headline: This never gets old
{/iconactivate}
`

If you leave this last part out, the default header will say "Recommended external content" (you can modify this default text through language customization of course).
The language id is "headline" for component "filter_iconactivatecontent".

## Installing via uploaded ZIP file ##

1. Log in to your Moodle site as an admin and go to _Site administration >
   Plugins > Install plugins_.
2. Upload the ZIP file with the plugin code. You should only be prompted to add
   extra details if your plugin type is not automatically detected.
3. Check the plugin validation report and finish the installation.

## Installing manually ##

The plugin can be also installed by putting the contents of this directory to

    {your/moodle/dirroot}/filter/iconactivatecontent

Afterwards, log in to your Moodle site as an admin and go to _Site administration >
Notifications_ to complete the installation.

Alternatively, you can run

    $ php admin/cli/upgrade.php

to complete the installation from the command line.

## License ##

2022 ICON Vernetzte Kommunikation GmbH <info@iconnewmedia.de>

This program is free software: you can redistribute it and/or modify it under
the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later
version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with
this program.  If not, see <https://www.gnu.org/licenses/>.
