=== CHL-Change HTML Lang ===
Contributors: pratikkry
Tags: SEO, HTML lang, lang Attribute
Requires at least: 4.0
Tested up to: 6.3
Requires PHP: 5.3
Stable tag: 1.1.5
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

CHL-Change HTML Lang is a simple WordPress SEO plugin for changing HTML language attribute value in the header.

== Description ==
*CHL-Change HTML Lang is a simple WordPress SEO plugin for changing HTML language attribute(language_attributes();) value in header.*

Many of us use WordPress(Admin area UI) in the English version but write their content in another language. So by default WordPress uses English(en-US) language attribute for `<?php language_attributes(); ?>` used in **header.php**.
For example - If you write your content in Hindi language but use WordPress(Admin area UI) in English, your html language attribute must be **hi** or **hi-IN** for many reasons including SEO but WordPress echo html language attribute of installed locale version (en-US by default).
You can't change HTML language attribute directly so I created this plugin(CHL-Change HTML Lang) that allows you to change HTML language attribute from the dashboard.
**After activating this plugin simply visit *Settings → General* and change HTML lang tag.**

### Bug reports

Bug reports for CHL-Change HTML Lang are [welcomed on GitHub](https://github.com/pratikkry/chl-change-html-lang/).

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
= 1.1.5 =
* tested up to WordPress 6.3

= 1.1.4 =
* fixed Yoast Seo schema inLanguage data

= 1.1.3 =
* tested up to WordPress 6.0
* fixed Yoast og locale tag issue

= 1.1.2 =
* security fix

= 1.1.1 =
* Tested up to WordPress 5.3

= 1.1.0 =
* Tested up to 5.1.1

= 1.0.3 =
* Add support for Yoast Open Graph tag (og:locale)

= 1.0.2 =
* Bug Fix

= 1.0.1 =
* Small bug fixes

= 1.0 =
* Initial Release
