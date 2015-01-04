=== Official Archon Membership Management ===
Contributors: archonllc
Tags: archon, membership, shortcode, content, paywall
Requires at least: 3.0.1
Tested up to: 4.1.0
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

This is an official plugin developed by Archon llc. This plugin allows you to show or hide content based on a users privilege level.
The plugin offers multiple customization options:

1. You can set a level barrier to content with shortcodes.
2. The three current levels are Gold, Silver, and Bronze.
3. From the options page each level can be customized to show what ever the admin wants in place of the content.

== Installation ==

There are a few options for installing and setting up this plugin.

= Upload Manually =

1. Download and unzip the plugin
2. Upload the 'membership-management' folder into the '/wp-content/plugins/' directory
3. Go to the Plugins admin page and activate the plugin

= Install Via Admin Area = 

1. In the admin area go to Plugins > Add New and search for "Official Archon Membership Management"
2. Click install and then click activate

= To Setup the Plugin =
1. In the WordPress admin area click the Membership Management link
2. Set the level to one or multiple users to one of the levels in the dropdown
3. On the right under the "Upgrade code" tab enter and save what you would like to show if a user doesn't have the right level to view the content.

= How to Use the Shortcode =
1. Navigate to the post or page you would like to restrict based on membership level
2. Enter in the shortcode [membership management] around the content your would like to restrict ([membership management level=1] This is the content that should only show to a gold member [/membership management])
3. Customize the level that shows by adding the parameter 'level' with the the level number (1,2,3)
4. Examples are [membership management id=1] will show the Gold member content, [membership management id=2] will show Gold and Silver member content, [membership management id=3] will show Gold, Silver, and Bronze member content


== Frequently Asked Questions ==

= Will visitors not logged in be able to see the content? =

Any visitor that is either not logged in or doesn't have the right membership level won't be able to view the content that is restricted by the [membership management] short code.

= Can I make my own levels? =

At the time of this release the you can't. This feature is being worked on and will be coming soon.


== Screenshots ==

1. Membership Management options page

== Changelog ==

= 1.0 =
* Initial launch of the plugin
* Display testimonials saved by admin
* Option to choose which level shows based on Gold, Silver, or Bronze
* Ability to show different message per level

== Upgrade Notice ==

= 1.0 =
This is the first version of the plugin. No updates available yet.