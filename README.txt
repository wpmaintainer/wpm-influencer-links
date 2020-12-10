=== Social Influencer Links ===
Contributors: theandystratton, wpmaintainer
Tags: instagram, social media, influencer, influencer links, landing page, link landing page, link page
Requires at least: 5.0
Tested up to: 5.6
Stable tag: trunk
Requires PHP: 7.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create your own hosted social media link landing page that can display a micro-profile, list of link buttons, and social media properties for your brand/influencer profiles.

== Description ==

Create your own, on-brand, brand/influencer landing page of links and social media shortcuts for use in social media profiles (Instagram, etc.).

== Frequently Asked Questions ==

= How do I create my links landing page? =

Simply create a new page in WordPress and check "Yes, activate this page." at the top. Once checked, you will see settings for the following:

* Theme (light or dark)
* Background Color (overrides the theme's background color)
* Text Color (overrides the theme's text color)
* Link Color (overrides the theme's link color in body text; you can override link buttons on the Edit Link page)
* Footer Content (content to display below your links)
* Social Media URLs (Facebook, Instagram, LinkedIn, Snapchat, TikTok and Twitter are supported)
* Embeds/Pixels/Tracking

= What are Embeds/Pixels/Tracking? =

We realize you may want to drop a Facebook pixel, Google Analytics, or something else on your Influencer Links page. Here you have the option to copy and paste any code you want in the following sections of the page's markup:

* Header: before the closing `</head>` tag
* Body: after the opening `<body>` tag
* Footer: before the closing `</body>` tag

There is also a checkbox available to disabled your site's default CSS.

= The design looks really messed up. Can you help? =

Edit your Influencer Links page, go to the Embeds tab, and check the box that says "Yes, disable all other CSS." and save the page.

Keep in mind, this will disable any CSS loaded by `wp_enqueue_style` on this page.

= How do I re-order the links? =

Add and edit your links under the "Influencer Links" post type. Links are sorted by date (newest first) then title (alphabetical order). If you want to sort with a drag and drop UI, you can use the [Simple Page Ordering](https://wordpress.org/plugins/simple-page-ordering/) plugin, free in the plugin repository.

== Screenshots ==

1. Creating your page with Gutenberg.
2. Creating your page with the Classic Editor.
3. Example page with a light theme.
4. Example page with a dark theme.

== Changelog ==

= 0.2 =
* Administrative clean up.

= 0.1.1 =
* Allow PHP 7.2; testing up to WP 5.6

= 0.1 =
* Initial release.