=== CHL-Change HTML Lang ===
Contributors: pratikthink, pratikkry
Tags: SEO, HTML lang, SEO Plugin, Language Attributes, pratikkry
Requires at least: 4.6
Tested up to: 5.0
Requires PHP: 5.2
Stable tag: 1.0.2
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

CHL-Change HTML Lang is a simple WordPress plugin that change html language attribute(language_attributes();) value in header.

== Description ==
*CHL-Change HTML Lang is a simple WordPress plugin that change html language attribute(language_attributes();) value in header.*

Many of us use WordPress(Admin area UI) in the English version but write their content in another language. So by default WordPress uses English(en-US) language attribute for `<?php language_attributes(); ?>` used in **header.php**.
For example - If you write your content in Hindi language but use WordPress(Admin area UI) in English, your html language attribute must be **hi** or **hi-IN** for many reasons including SEO but WordPress echo html language attribute of installed locale version (en-US by default).
You can't change HTML language attribute directly so I created this plugin(CHL-Change HTML Lang) that allows you to change HTML language attribute from the dashboard.
**After activating this plugin simply visit *Settings → General* and change HTML lang tag.**

== Installation ==
1. Go to your admin area and select Plugins → Add New from the menu.
2. Search for "CHL-Change HTML Lang".
3. Click install.
4. Click activate.
5. Navigate to Settings → General.

6. **OR** Go to your admin area and select Plugins → Add New from the menu. Upload the file `chl-change-html-lang.zip`.
7. Activate the plugin through the 'Plugins' menu in WordPress.
8. Navigate to Settings → General for changing HTML lang=

== Frequently Asked Questions ==
= Does this plugin support language_attributes(xhtml) ? =
Simply NO. Next time.

= I have lower version of WordPress installed than what this plugin requires? =
You can use it without any errors.

== Screenshots ==
1. Navigate to Settings → General for changing HTML lang=

== Changelog ==
= 1.0.3 =
* Add support for Yoast Open Graph tag (og:locale)

= 1.0.2 =
* Bug Fix

= 1.0.1 =
* Small bug fixes

= 1.0 =
* Initial Release
