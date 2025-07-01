<?php
/**
 * Plugin Name: AdBlock Detector Popup
 * Description: Detects AdBlock and shows a customizable popup asking users to disable it.
 * Version: 1.1
 * Author: Shahid Asghar
 */

defined('ABSPATH') or die('No direct access');

require_once plugin_dir_path(__FILE__) . 'admin-settings.php';

function adblock_detector_enqueue_assets() {
    $enabled = get_option('adblock_detector_enabled', 'yes');
    if ($enabled !== 'yes') return;

    wp_enqueue_style('adblock-detector-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('adblock-detector-script', plugin_dir_url(__FILE__) . 'script.js', [], false, true);

    $data = [
        'title'   => get_option('adblock_detector_title', 'Ad Blocker Detected'),
        'message' => get_option('adblock_detector_message', 'Please disable your ad blocker to view the content.'),
        'button'  => get_option('adblock_detector_button', 'I’ve Disabled AdBlock')
    ];
    wp_localize_script('adblock-detector-script', 'adblockDetectorData', $data);
}
add_action('wp_enqueue_scripts', 'adblock_detector_enqueue_assets');
