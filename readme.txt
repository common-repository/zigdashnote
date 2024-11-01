=== ZigDashNote ===
Contributors: ZigPress
Donate link: https://www.zigpress.com/donations/
Tags: dashboard, widget, admin dashboard note, dashboard text widget, note to self, sticky note, zig, zigpress, classicpress
Requires at least: 4.0
Tested up to: 5.4
Requires PHP: 5.3
Stable tag: 1.0

Adds an editable panel to the admin dashboard for useful notes.

== Description ==

**Due to abuse received from plugin repository users we are ceasing development of free WordPress plugins and this is the last release of this plugin. It will be removed from the repository in due course. Our pro-bono plugin development will now be exclusively for the ClassicPress platform.**

ZigDashNote gives you a simple editable panel on the admin dashboard, where you can leave notes for yourself and fellow admins.

URLs will be made clickable and basic HTML is allowed if the user has the 'unfiltered_html' capability. The allowed tags are drawn from the WordPress $allowedposttags variable so they are the same as those allowed by the TinyMCE post editor. Script and iFrame tags are not allowed.

All users with access to the dashboard can use the widget.

Compatible with ClassicPress.

For further information and support, please visit [the ZigDashNote home page](https://www.zigpress.com/plugins/zigdashnote/).

= To Do =
* Add option to set minimum required capability to view and/or update the widget

== Installation ==

1. Unzip the installer and upload the resulting 'zigdashnote' folder to the `/wp-content/plugins/` directory.  Alternatively, go to Admin > Plugins > Add New and enter ZigDashNote in the search box.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to your dashboard, hover over the widget's title bar to see the 'Configure' link.
4. Click this link to edit and update the widget.

== Frequently Asked Questions ==

For further information and support, please visit [the ZigDashNote home page](https://www.zigpress.com/plugins/zigdashnote/).

== Changelog ==

= 1.0 =
* Notice of cessation of free WordPress plugin development
= 0.4.5 =
* Verified compatibility with WordPress 5.3.x
* Verified compatibility with ClassicPress 1.1.x
= 0.4.4 =
* Removed all plugin version detection code until the problem with get_plugin_data can be properly examined
= 0.4.3 =
* Fixed fatal error caused by calling get_plugin_data when code may not be running on an admin page
= 0.4.2 =
* Improved the way the plugin obtains its own version number
= 0.4.1 =
* Verified compatibility with WordPress 5.2.x
* Verified compatibility with ClassicPress 1.0.x
= 0.4 =
* Verified compatibility with WordPress 4.9.8
* Verified compatibility with ClassicPress 1.0.0-beta1
= 0.3.16 =
* Confirmed compatibility with WordPress 4.9.7
= 0.3.15 =
* Confirmed compatibility with WordPress 4.9
= 0.3.14 =
* Confirmed compatibility with WordPress 4.8.x
= 0.3.13 =
* Confirmed compatibility with WordPress 4.7
= 0.3.12 =
* Confirmed compatibility with WordPress 4.6.1
= 0.3.11 =
* Updated readme
= 0.3.10 =
* Confirmed compatibility with WordPress 4.5.3
= 0.3.9 =
* Fix for disappearing configure link on WordPress 4.4
* Confirmed compatibility with WordPress 4.4
* More elegant self-deactivation if PHP version below 5.3
* Increased minimum WordPress version to 4.0 in accordance with ZigPress policy of gradually dropping support for deprecated platforms
= 0.3.8 =
* Improved documentation
= 0.3.7 =
* Tweak to prevent PHP warning on disabling credit
= 0.3.6 =
* Confirmed compatibility with WordPress 4.3
= 0.3.5 =
* Confirmed compatibility with WordPress 4.2
* Increased minimum PHP version to 5.3 in accordance with ZigPress policy of gradually dropping support for deprecated platforms
= 0.3.4 =
* Confirmed compatibility with WordPress 4.1
* Minimum compatible version raised to 3.6
= 0.3.3 =
* Corrected some text content
= 0.3.2 =
* Confirmed compatibility with WordPress 3.9
= 0.3.1 =
* Confirmed compatibility with WordPress 3.5
= 0.3 =
* Coding style improvements and refactoring
* Updated plugin URL
* Confirmed compatibility with WordPress 3.4.2
= 0.2.3 =
* Confirmed compatibility with WordPress 3.3
= 0.2.2 =
* Fixed version number bug and updated requirements to comply with WordPress 3.2
= 0.2.1 =
* Confirmed compatibility with WordPress 3.1.1
= 0.2 =
* Added readme.txt in preparation for submission to WordPress.org
= 0.1 =
* First public release
