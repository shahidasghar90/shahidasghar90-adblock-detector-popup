<?php

add_action('admin_menu', 'adblock_detector_admin_menu');
add_action('admin_init', 'adblock_detector_register_settings');

function adblock_detector_admin_menu() {
    add_options_page(
        'AdBlock Detector Settings',
        'AdBlock Detector',
        'manage_options',
        'adblock-detector',
        'adblock_detector_settings_page'
    );
}

function adblock_detector_register_settings() {
    register_setting('adblock_detector_options', 'adblock_detector_enabled');
    register_setting('adblock_detector_options', 'adblock_detector_title');
    register_setting('adblock_detector_options', 'adblock_detector_message');
    register_setting('adblock_detector_options', 'adblock_detector_button');
}

function adblock_detector_settings_page() {
    ?>
    <div class="wrap">
        <h1>AdBlock Detector Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('adblock_detector_options'); ?>
            <?php do_settings_sections('adblock_detector_options'); ?>

            <table class="form-table">
                <tr>
                    <th scope="row">Enable Detection</th>
                    <td>
                        <select name="adblock_detector_enabled">
                            <option value="yes" <?php selected(get_option('adblock_detector_enabled'), 'yes'); ?>>Yes</option>
                            <option value="no" <?php selected(get_option('adblock_detector_enabled'), 'no'); ?>>No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Popup Title</th>
                    <td><input type="text" name="adblock_detector_title" value="<?php echo esc_attr(get_option('adblock_detector_title', 'Ad Blocker Detected')); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Popup Message</th>
                    <td><textarea name="adblock_detector_message" class="large-text"><?php echo esc_textarea(get_option('adblock_detector_message', 'Please disable your ad blocker to view the content.')); ?></textarea></td>
                </tr>
                <tr>
                    <th scope="row">Button Text</th>
                    <td><input type="text" name="adblock_detector_button" value="<?php echo esc_attr(get_option('adblock_detector_button', 'I’ve Disabled AdBlock')); ?>" class="regular-text"></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
