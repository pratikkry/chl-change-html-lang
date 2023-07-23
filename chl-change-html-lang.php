<?php

/**
 *
 * @link              https://profiles.wordpress.org/pratikkry
 * @since             1.0.0
 * @package           Chl_Change_Html_Lang
 *
 * @wordpress-plugin
 * Plugin Name:       CHL-Change HTML Lang
 * Plugin URI:        https://wordpress.org/plugins/chl-change-html-lang/
 * Description:       A simple and very lightweight WordPress SEO plugin for changing HTML language attribute value in the header. Navigate to Settings → General for changing HTML lang attributes.
 * Version:           1.1.5
 * Requires at least: 4.0
 * Requires PHP:      5.3
 * Author:            pratik
 * Author URI:        https://profiles.wordpress.org/pratikkry
 * License:           GPL v3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       chl-change-html-lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Create database field
/* Runs when plugin is activated */
register_activation_hook( __FILE__, 'chl_tag_activate' );

/* Runs on plugin deactivation*/
register_deactivation_hook( __FILE__, 'chl_tag_deactivate' );

function chl_tag_activate() {
    add_option( 'chl_custom_lang', 'en-US', '', 'yes' );
}

function chl_tag_deactivate() {
    delete_option( 'chl_custom_lang' );
}

add_action( 'admin_init', 'chl_settings_init' );
/* Register Settings Init */
function chl_settings_init() {
    $args = array(
            'type'              => 'string',
            'description'       => __( 'html lang.', 'chl-change-html-lang' ),
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
    <p class="description" id="chl-tag-description"><?php _e( 'Do not use &quot; &quot; before and after. It will be automatically added.', 'chl-change-html-lang' ) ?></p>
    <?php
}

add_filter( 'language_attributes', 'chl_change_html_lang_tag' );

// This function change language_attributes
function chl_change_html_lang_tag( $chl_tag ) {
    $chl_tag = 'lang="' . esc_attr( get_option( 'chl_custom_lang' ) ) . '"';
    return $chl_tag;
}

// If your locale is not supported by the facebook, Yoast plugin will output the best match for your language.
add_filter( 'wpseo_locale', 'chl_ystwpseo_change_og_locale' );

// Suport for Yoast SEO Open Graph
function chl_ystwpseo_change_og_locale( $locale ) {
    
    $locale = get_option( 'chl_custom_lang' );
    if (strpos($locale,'-') !== false) { // First check if the locale contains the string '-'
        $locale = str_replace('-', '_', $locale); //if yes, simply replace it with _ for open graph og:locale tag
    }
    
    return $locale;

}

add_filter( 'wpseo_schema_piece_language', 'chl_ystwpseo_change_schema_lang' );
// Suport for Yoast SEO Schema piece inLanguage
function chl_ystwpseo_change_schema_lang( $data ) {
    
    $data = get_option( 'chl_custom_lang' );
    if (strpos($data,'"') !== false) { // First check if the locale contains the string '"'
        $data = str_replace('"', '', $data); //if yes, simply remove it from the open graph og:locale tag
    }
    
    return $data;

}
