<?php

/**
 *
 * @link              https://profiles.wordpress.org/pratikthink
 * @since             1.0.0
 * @package           Chl_Change_Html_Lang
 *
 * @wordpress-plugin
 * Plugin Name:       CHL-Change HTML Lang
 * Plugin URI:        https://www.gyanchowk.com/chl-change-html-lang
 * Description:       A simple WordPress plugin that change html language attribute value in header.
 * Version:           1.0.2
 * Author:            P. Kumar
 * Author URI:        https://profiles.wordpress.org/pratikthink
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       chl-change-html-lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Create database field
/* Runs when plugin is activated */
register_activation_hook(__FILE__,'chl_tag_activate');

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'chl_tag_deactivate' );

function chl_tag_activate() {
    add_option('chl_custom_lang', 'en-US', '', 'yes');
}

function chl_tag_deactivate() {
    delete_option('chl_custom_lang');
}

add_action( 'admin_init', 'chl_settings_init' );
/* Register Settings Init */
function chl_settings_init() {
    $args = array(
            'type' => 'string',
            'description'  => __( 'html lang.', 'chl-change-html-lang' ),
            'sanitize_callback' => 'sanitize_text_field',
        );
    register_setting( 'general', 'chl_custom_lang', $args );

    add_settings_section(
    'chltag_section_id',
    __( 'Change HTML Lang Attribute', 'chl-change-html-lang' ),
    'chltag_section_description',
    'general'
);
    add_settings_field( 'chltag_setting-id',
    'HTML lang=',
    'chltag_setting_function',
    'general',
    'chltag_section_id',
    array( 'label_for' => 'chltag_setting-id' )
);
}

function chltag_section_description(){
    _e( '<p>Have a problem, See: <a href="https://www.w3.org/International/articles/language-tags/">Documentation on Language tags in HTML(W3.org)</a></p>', 'chl-change-html-lang' );
}

function chltag_setting_function(){
        ?>
    <input name="chl_custom_lang" id="chl-tag-sid" value="<?php echo get_option( 'chl_custom_lang' ); ?>" class="chl-tag-sclass" type="text" maxlength="12">
    <p class="description" id="chl-tag-description"><?php _e( 'Add your custom html language attribute. eg. en, en-US, en-GB, hi, hi-IN etc.', 'chl-change-html-lang' ) ?></p>
    <p class="description" id="chl-tag-description"><?php _e( 'BE CAREFUL. Do not use &quot; &quot; before and after. It will be automatically added.', 'chl-change-html-lang' ) ?></p>
    <?php
}

// This function change language_attributes
function chl_change_html_lang_tag( $chl_tag ) {
    $chl_tag = 'lang="' . get_option( 'chl_custom_lang' ) . '"';
    return $chl_tag;
}
add_filter('language_attributes', 'chl_change_html_lang_tag');
