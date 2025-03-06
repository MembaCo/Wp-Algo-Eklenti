<?php
/*
Plugin Name: ALGO Maintenance Mode
Plugin URI: https://algoit.co.uk/plugins/maintenance-mode
Description: ALGO IT Solutions Special Maintenance Mode
Version: 1.2
Author: Memba Co.
Author URI: https://algoit.co.uk
License: GPL v2 or later
Text Domain: algo-maintenance
*/

// Doğrudan erişimi engelle
if (!defined('ABSPATH')) {
    exit;
}

class ALGO_Maintenance {
    private static $instance = null;
    private $plugin_path;
    private $plugin_url;
    private $version = '1.0.0';

    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->plugin_path = plugin_dir_path(__FILE__);
        $this->plugin_url = plugin_dir_url(__FILE__);

        // Hooks
        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('template_redirect', array($this, 'check_maintenance_mode'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue_scripts'));
    }

    public function init() {
        load_plugin_textdomain('algo-maintenance', false, dirname(plugin_basename(__FILE__)) . '/languages/');
    }

    public function admin_enqueue_scripts($hook) {
        if ('settings_page_algo-maintenance' !== $hook) {
            return;
        }

        wp_enqueue_style('algo-maintenance-admin', $this->plugin_url . 'admin/css/admin.css', array(), $this->version);
        wp_enqueue_script('algo-maintenance-admin', $this->plugin_url . 'admin/js/admin.js', array('jquery'), $this->version, true);
    }

    public function enqueue_scripts() {
        if ($this->is_maintenance_active() && !current_user_can('manage_options')) {
            wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
            wp_enqueue_style('algo-maintenance', $this->plugin_url . 'assets/css/style.css', array(), $this->version);
            
            wp_enqueue_script('jquery');
            wp_enqueue_script('algo-starfield', $this->plugin_url . 'assets/js/starfield.js', array('jquery'), $this->version, true);
            wp_enqueue_script('algo-headlines', $this->plugin_url . 'assets/js/animated-headlines.js', array('jquery'), $this->version, true);
            wp_enqueue_script('algo-maintenance', $this->plugin_url . 'assets/js/main.js', array('jquery'), $this->version, true);
        }
    }

    public function add_admin_menu() {
        add_options_page(
            __('ALGO Maintenance Mode', 'algo-maintenance'),
            __('Maintenance Mode', 'algo-maintenance'),
            'manage_options',
            'algo-maintenance',
            array($this, 'render_settings_page')
        );
    }

    public function register_settings() {
        register_setting('algo_maintenance_settings', 'algo_maintenance_active');
        register_setting('algo_maintenance_settings', 'algo_maintenance_message');
        register_setting('algo_maintenance_settings', 'algo_maintenance_social');
    }

    public function render_settings_page() {
        if (!current_user_can('manage_options')) {
            return;
        }

        $default_message = 'Sitemiz bakımda, yakında döneceğiz.';
        $message = get_option('algo_maintenance_message', $default_message);
        $active = get_option('algo_maintenance_active', false);
        $social = get_option('algo_maintenance_social', array(
            'facebook' => 'https://www.facebook.com/AlgoBilisim',
            'twitter' => 'https://twitter.com/AlgoBilisim',
            'google' => '#',
            'instagram' => '#'
        ));

        include $this->plugin_path . 'admin/settings-page.php';
    }

    public function is_maintenance_active() {
        return get_option('algo_maintenance_active', false);
    }

    public function check_maintenance_mode() {
        if ($this->is_maintenance_active() && !current_user_can('manage_options') && !is_admin()) {
            include $this->plugin_path . 'templates/maintenance-page.php';
            exit;
        }
    }
}

// Eklentiyi başlat
ALGO_Maintenance::get_instance();