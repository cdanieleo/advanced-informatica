=== Plugin Name ===
Contributors: wassereimer
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2X2EH5MYGPLL4
Tags: ad, add, addthis, ads, adsense, adsense plugin, advertising, affilimatch, affilinet, align, alignment, amazon associates, any, audio, clicksor, code, codes, css, easy, flash, google, google adsense, html, infolinks, insert, java, javascript, keyword, keywords, multisite, network, offline, online, page, pages, php, place, placement, plugin, post, posts, shortcode, shortcodes, snippet, snippets, tag, tags, text, title, video, widget
Requires at least: 4.0
Tested up to: 4.8.1
Stable tag: 17.08
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A great Wordpress plugin to place any Code - anywhere you want.

== Description ==

Easy Code Placement provides a very easy way to place any Code where you want to have it. - You can use the WordPress Text Widget with an Shortcode in it or just place a Shortcode anywhere in Posts/Pages to display your code where you want to have it.

ATTENTION! CSS, Javascript and Flash Codes does have Problems at the moment. It will be fixed in the future!

= Which Codes? =

* Text
* PHP
* HTML
* AdSense or other Ads
* Video & Audio
* Everything you want

= Where? =

* Widget Area
* Title of Posts and Pages (only Text and without alignement)
* Content of Posts and Pages
* Menu (In Link-Text and Url must be "#")
* Tags
* Excerpts

= Features =
     
* Save unlimited Codes on options page
* Activate and Deactivate the Codes
* Set the alignment for the Codes
* Place a Code with a Shortcode
* Place a Code with the own Widget
* Remove Borders and the Design from the Widget (for example to use a Tracking Code that does not Display anything)
* Place a Code with the standard WordPress Text-Widget
* Choose who can manage the Plugin (Admin/Editor/Author/Contributor)
* Ready for translations
* Multisite/Network compatible
* Clean uninstall - No data left

= Languages =

* Englisch by wassereimer
* German by wassereimer

If you have translated this Plugin into an Language that is not listed here, please open a Support-Thread and place a link in it where i can download the files. Than i will add the Language in the next Version and place a "Thank you" above.

== Installation ==

= In WordPress =

* Go in your Dashboard to 'Plugins' -> 'Install'
* Search for 'Easy Code Placement'
* Click on 'Install'
* Activate the plugin through the 'Plugins' menu in WordPress
* Now you can go to the Settings-Page on 'Settings' -> 'Easy Code Placement'

= Manually =

* Download the Plugin
* Go in your Dashboard to 'Plugins' -> 'Install'
* Click on Upload
* Click on 'Choose file' and choose the downloaded Zip-file
* Click on 'Install'
* Activate the plugin through the 'Plugins' menu in WordPress
* Now you can go to the Settings-Page on 'Settings' -> 'Easy Code Placement'

== Screenshots ==

1. Options-Menu
2. Add new Code
3. Edit existing Code
4. Text-Widget with Shortcode inside
5. Own Widget with Shortcode-Selection
6. Settings
7. System Informations

== Changelog ==

= 17.08 =
* 04.08.2017
* Compatibility check for WordPress Version 4.8.1
* Updated clipboard.js to version 1.7.1
* Removed not used js from admin area
* Removed not used external plugins/scripts

= 16.11 =
* 06.11.2016
* Added UIkit 2.27.1
* Removed jQuery (using WP version now), Bootstrap (using UIkit now) and Font-Awesome (build into UIkit)
* Added a help question
* Fixed a wrong Text-Domain in two strings
* When shortcode is deleted and the widget is still on the page its not shown anymore
* Added tons of spaces and comments for a better readability of the code
* Updated the German translation
* Direct access to the plugin files is now checked and blocked

= 16.10 =
* 11.10.2016
* Changed versioning to year.month.revision
* Complete Mobile friendly now
* Shortcode delete must now be confirmed
* Added Tab-Navigation
* Added Help Page
* Added Button to Copy Shortcode to Clipboard
* Fixed that Plugin Page was shown under WP Settings even when User couldn´t access it
* Changed Table Layout
* Changed Form Layout
* Changed Layout to max 1000px
* Changed all Buttons
* Changed Pagination Layout
* Changed Screenshots
* Updated the German translation
* Added jQuery 3.1.1 (loaded on ECP Admin Page only)
* Added Bootstrap 3.3.7 (loaded on ECP Admin Page only)
* Added Font-Awesome 4.6.3 (loaded on ECP Admin Page only)
* Added clipboard.js 1.5.12 (loaded on ECP Admin Page only)

= 4.0.2 =
* 04.10.2016
* Quick and dirty fix for Output Buffer Errors on some Systems. Please Notice that all Functions worked as they should even when the Error came up.

= 4.0.1 =
* 01.10.2016
* Removed support for Yoast SEO Plugin fields
* Removed support for All in One SEO Pack Plugin fields
* Added the ability to disable the Design and Borders of the Widget (for example to use a Tracking Code that does not Display anything)
* Fixed a Problem with undefined Indexes when creating a Widget

= 4.0 =
* 01.10.2016
* Added own Widget to easily select a Code from a List
* Added support for All in One SEO Pack Plugin fields
* Added support for Yoast SEO Plugin fields
* Codes now also work in Post/Page Titles, Tags and Widget Titles
* Removed the double filtering for shortcode and PHP Code and combined them
* Removed the global Output Buffering - now only used for allowing PHP Code in a closed function that will have no effect on other Plugins or Functions
* Updated the German translation
* Changed the required WordPress Version to 4.0

= 3.2.1 =
* 23.09.2016
* Compatibility check for WordPress Version 4.6.1
* Fixed a Problem where the Back Button didn´t work
* Fixed an Error which caused that the Plugin didn´t work on Network-Sites

= 3.2 =
* 19.05.2016
* Compatibility check for WordPress Version 4.5.2
* Fixed a function name that could cause Problems
* Fixed an Error when deactivating and reactivating the Plugin
* Added a mouse over function to display the Date when a Code was added and last modified
* Added the Codes per Page to the System Informations Menu
* Updated the German translation
* Replaced the WordPress Table Class with a simple and self-written Version


= 3.1.1 =
* 24.01.2016
* Fixed the false configured text-domain
* Fixed hardcoded text to be translatable
* Added missing Strings to the German Translation
* Added a .pot File for translations
* Added a few tags
* Added a warning that CSS, Javascript and Flash Codes does have Problems at the moment

= 3.1 =
* 24.01.2016
* Compatibility check for WordPress Version 4.4.1
* Added an Option to choose who can manage the Plugin
* Added the Information who can manage the Plugin to the System Informationens site
* Donation-Page opens now in a new Tab
* Updated the German translation
* Secured the Output from the System Informations Site to prevent Errors
* Updated the existing Screenshots 5 and 6

= 3.0 =
* 30.09.2015
* Added an Information Page
* Added an Options Page
* Removed the p-Tag if the alignment is set to none - Thanks @ Steven
* Compatibility check for WordPress Version 4.3.1
* Updated the existing Screenshots and added two
* Updated the German translation

= 2.7 =
* 21.08.2015
* Added compatibility for Multisite/Network Sites
* FIX: After deactivating and activating the plugin, there was duplicated data in the options database
* Added more Tags to find the Plugin on the WordPress Website
* Update procedure runs now only on Dashboard sites to reduce the load on the Website

= 2.6.1 =
* 14.08.2015
* Compatibility check for WordPress Version 4.3

= 2.6 =
* 01.08.2015
* FIX: Shortcode dont work on post and pages

= 2.5.1 =
* 24.04.2015
* Compatibility check for WordPress Version 4.2

= 2.5 =
* 13.02.2015
* FIX: When edeting something the name of the shortcode disapears in the list and doesnt work anymore
* FIX: While Updating the version in data Table doesnt set to new version number
* Better Error handling - return instead of exit
* Added Banner for WordPress Plugin Page
* Added Icons for WordPress Plugin Installer

= 2.4.2 =
* 08.01.2015
* Turned off the error reporting from php for plugin releases

= 2.4.1 =
* 17.12.2014
* Compatibility check for WordPress Version 4.1
* Edited the Description that the Plugin also can be used for text

= 2.4 =
* 18.10.2014
* Removed buggy Update function for old Versions - There was enough time to Update the Plugin - Thanks @ Befuture BefDreamer

= 2.3 =
* 05.09.2014
* Compatibility check for WordPress Version 4.0 

= 2.2 =
* 18.08.2014
* Compatibility check for WordPress Version 3.9.2 
* FIX: Error while edeting that the Name already exists

= 2.1 =
* 22.07.2014
* Changed Screenshot 1

= 2.0 =
* 23.06.2014
* Added: WordPress Table Layout
* Added: Pagination
* Changed Update Routine
* Added: Update Routine when Version Skipping
* Code optimization
* Better Comparison Operator (Equal to Identical)

= 1.6 =
* 21.06.2014
* Updated German translation
* BUG: Added missing Information in Data Table
* Added check for existing name with error if found
* Code optimization

= 1.5 =
* 15.06.2014
* Added Screenshot from Widget with Shortcode in it
* Added Screenshot from Edit Page
* Changed existing Screenshots
* Alignment can now be changed on Options Page
* Changed Layout of Buttons to WP default
* New and better Buttons (Action)

= 1.4 =
* 14.06.2014
* Added Buttons instead of Text-Links
* Modified the WP Text Widget to work with PHP Code
* Added the Option to set the Alignment of the Code
* The Uninstall is Clean now - No Trah left!

= 1.3 =
* 01.06.2014
* A Maximum of 30 Chars is now allowed for name
* Added an Update routine
* Updated the German Translation
* Added Paypal Donate Button

= 1.2 =
* 29.05.2014
* Name and Code must be filled now
* Only letters and numbers now for Shortcode names
* Better documentation of the code
* Added error messages
* SECURITY: Secured get and post data
* Changed Layout for Add and Edit page
* Set alignment of headings and data
* Set fixed Table Layout (percenage not px)

= 1.1 =
* 28.05.2014
* FIX: Shortcode dont work

= 1.0 =
* 26.05.2014
* First Release (Stable)