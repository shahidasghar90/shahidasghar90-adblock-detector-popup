# shahidasghar90-adblock-detector-popup

=== AdBlock Detector Popup ===
Contributors: yourname
Tags: adblock, adblocker detector, popup, ad blocker, disable adblock, content locker
Requires at least: 5.0
Tested up to: 6.5
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Detects AdBlock usage and shows a blurred popup asking the user to disable their ad blocker. Lightweight and user-friendly.

== Description ==

**AdBlock Detector Popup** helps you recover lost ad revenue by politely asking users to disable their ad blocker.

**Key Features:**
- Detects popular ad blockers (uBlock Origin, AdBlock Plus, etc.)
- Shows a clean popup overlay with blur effect
- Locks content interaction while AdBlock is enabled
- Button to re-check if AdBlock has been disabled
- Popup shows only once per browser session

== Installation ==

1. Upload the plugin folder `adblock-detector-popup` to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Done! The plugin will automatically start detecting AdBlock on the frontend.

== Frequently Asked Questions ==

= Will this plugin disable the AdBlock itself? =
No. Due to browser security, it's not possible to disable AdBlock automatically. The plugin simply detects it and requests the user to disable it manually.

= Is it compatible with caching plugins? =
Yes, it is JavaScript-based and works well with all major caching systems.

= Does it work on mobile browsers? =
Yes, the plugin works on most mobile browsers that support JavaScript.

== Screenshots ==

1. Blurred popup shown when AdBlock is detected.
2. Button to re-check if AdBlock has been disabled.

== Changelog ==

= 1.0 =
* Initial release with full AdBlock detection, popup display, blur effect, and session-based control.

== Upgrade Notice ==

= 1.0 =
This is the first release of AdBlock Detector Popup.

== License ==

This plugin is licensed under the GPLv2 or later. See https://www.gnu.org/licenses/gpl-2.0.html
