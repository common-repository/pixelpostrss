=== PixelPost RSS ===
Contributors: bitonio
Tags: pixelpost, photos, widget
Requires at least: 2.7
Tested up to: 2.7
Stable tag: 0.50

pixelpostRSS displays your PixelPost photos in a widget.

== Description ==

You are using Wordpress and [PixelPost](http://www.pixelpost.org/). You are probably interrested in showing your latest photos on your blog. pixelpostRSS display thumbnail from your Pixelpost photoblog. Click on the thumbnail and you open the full size photo.

== Installation ==

Installation is quite easy

= The manual way =

1. Upload `pixelpostrss.php` to the `/wp-content/plugins/pixelpostrss` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

= The automatic way =

Just search pixelpostRss from the Plugins menu and click Install.

== Screenshots ==

1. Sample widget with 9 images 75x75
2. Plugin settings

== Frequently Asked Questions ==

= How to change the thumbnail size? =

Login the PixelPost administration panel, go to the option menu and choose the thumbnail sub menu.
In the Thumbnail Size section, set the size you want and click Regenerate.

= I added new photo and nothing appear in my Wordpress blog =

pixelpostRSS use the Wordpress engine that use cache to provide the best performance. 

== Changelog ==

*   0.50 : tagging properly for SVN repository
*   0.13 : Remove hardcoded margin:0, add a id="pixelpostrss" to the div wrapping images
*   0.12 : Cleanup hardcoded thumbnail size
*   0.11 : First public version (not in Wordpress website)