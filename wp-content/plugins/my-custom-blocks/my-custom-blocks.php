<?php
/**
 * Plugin Name: My Custom Blocks
 * Description: A plugin to add custom Gutenberg blocks.
 * Version: 1.0
 * Author: Your Name
 */

defined('ABSPATH') || exit;

function my_custom_blocks_register() {
    // Automatically load index.js from build folder
    wp_register_script(
        'my-custom-block-js',
        plugins_url('build/index.js', __FILE__),
        ['wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n'],
        filemtime(plugin_dir_path(__FILE__) . 'build/index.js')
    );

    register_block_type('myplugin/hello-world', [
        'editor_script' => 'my-custom-block-js',
    ]);
}
add_action('init', 'my_custom_blocks_register');
