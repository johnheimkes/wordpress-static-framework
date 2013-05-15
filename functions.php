<?php
/**
 * Main functions and definitions
 *
 * @package Static_Framework
 * @author John Heimkes IV <john@markupisart.com>
 */

add_action('after_setup_theme', array('NERD_Theme', 'after_setup_theme'));

/**
 * Constants
 */
// define('DISALLOW_FILE_EDIT', true);
define('STATIC_THEME_PATH_URL', get_template_directory_uri() . '/');
define('STATIC_THEME_PATH', get_template_directory() . '/');
define('STATIC_THEME_VER', '2.0');
define('STATIC_TEXT_DOMAIN', basename(dirname(__FILE__)));

/**
 * Theme init class
 *
 * @package Static_Framework
 * @author John Heimkes IV <john@markupisart.com>
 */
class Static_Theme
{
    const SHORT_DATE = 'n.d.Y';
    const LONG_DATE  = 'l F jS Y';

    /**
     * Do theme setup
     * Runs on after_setup_theme hook
     *
     * see after_setup_theme {@link http://goo.gl/hkECf}
     *
     * @return void
     */
    public static function after_setup_theme()
    {
        self::_includes();
        self::_widgets();

        /**
         * Theme Supports
         */
        add_theme_support('post-thumbnails');
        add_theme_support('custom-background');
        add_theme_support('custom-header');

        /**
         * Actions and filters
         */
        add_action('widgets_init', array('Static_Theme', 'widget_init'));
        add_action('wp_enqueue_scripts', array('Static_Theme', 'enqueue_scripts'));
        add_action('wp_enqueue_scripts', array('Static_Theme', 'enqueue_styles'));

    }

    /**
     * Add all includes here
     *
     * @return void
     */
    private static function _includes()
    {
        /**
         * Includes
         */
        include_once 'functions/register-post-types.php';
        include_once 'functions/register-taxonomies.php';
        include_once 'functions/register-menus.php';
        include_once 'functions/register-sidebars.php';
    }

    /**
     * Includes for widget class files
     *
     * @return void
     */
    private static function _widgets()
    {
        /**
         * Widgets
         */
        // include_once 'widgets/my-widget.php';
    }

    /**
     * Init Theme-specific Widgets
     * see Widgets_API {@link http://goo.gl/B2H6y}
     *
     */
    public static function widget_init()
    {
        // register all the widgets
        // register_widget('My_Widget');
    }

    /**
     * Enqueue scripts
     *
     * @return void
     */
    public static function enqueue_scripts()
    {
        // Global script
        wp_register_script(
            'static-global',
            STATIC_THEME_PATH_URL . 'assets/scripts/global.js',
            array('jquery'),
            STATIC_THEME_VER,
            true
        );

        wp_enqueue_script('static-global');

        // Comment reply script for threaded comments (registered in WP core)
        if (is_singular() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

    }

    /**
     * Register styles
     *
     * @global WP_Styles $wp_styles
     */
    public static function enqueue_styles()
    {
        global $wp_styles;

        // Primary Screen Stylesheet
        wp_register_style(
            'styles',
            STATIC_THEME_PATH_URL . 'style.css',
            null,
            STATIC_THEME_VER,
            'screen, projection'
        );

        // IE 9 Stylesheet
        wp_register_style(
            'static-ie9',
            STATIC_THEME_PATH_URL . 'css/ie9.css',
            array('static-screen'),
            STATIC_THEME_VER,
            'screen, projection'
        );

        // IE 8 Stylesheet
        wp_register_style(
            'static-ie8',
            STATIC_THEME_PATH_URL . 'css/ie8.css',
            array('static-screen'),
            STATIC_THEME_VER,
            'screen, projection'
        );


        // Conditional statements for IE stylesheets
        $wp_styles->add_data('static-ie9', 'conditional', 'lte IE 9');
        $wp_styles->add_data('static-ie8', 'conditional', 'lte IE 8');

        // Queue the stylesheets. Note that because static-screen was registered
        // with static-wysiwyg as a dependency, it does not need to be enqueued here.
        wp_enqueue_style('static-ie9');
        wp_enqueue_style('static-ie8');

    }
}