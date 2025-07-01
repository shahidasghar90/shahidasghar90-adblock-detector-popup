<?php
/**
 * Plugin Name: AdBlock Detector Popup
 * Description: Detects AdBlock and shows a blurred popup asking the user to disable it.
 * Version: 1.0
 * Author: Shahid Asghar
 */

defined('ABSPATH') or die('No script kiddies please!');

function adblock_detector_enqueue_assets() {
    wp_enqueue_style('adblock-detector-style', plugin_dir_url(__FILE__) . 'style.css');
    wp_enqueue_script('adblock-detector-script', plugin_dir_url(__FILE__) . 'script.js', [], false, true);
}
add_action('wp_enqueue_scripts', 'adblock_detector_enqueue_assets');
