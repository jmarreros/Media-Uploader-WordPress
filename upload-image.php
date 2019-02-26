<?php
/*
Plugin Name: Upload image example
Plugin URI: https://decodecms.com
description: Demo plugin for uploading images using media library
Version: 1.0
Author: Jhon Marreros
Author URI: https://decodecms.com
License: GPL2
*/

// Show Form
add_action( 'admin_menu', 'register_media_selector_settings_page' );

function register_media_selector_settings_page() {
	add_submenu_page( 'upload.php', 'Media Selector', 'Media Selector', 'manage_options', 'media-selector', 'dcms_media_selector_settings_callback' );
}

function dcms_media_selector_settings_callback() {
	?>
	<div class="wrap">
		<h1>Ejemplo Media Uploader</h1>
		<form method="post">
			<input id="image-url" type="text" name="image" />
			<input id="upload-button" type="button" class="button" value="Upload Image" />
			<input class="button" type="submit" value="Submit" />
		</form>
	</div>
	<?php
}

// Enqueu script
add_action("admin_enqueue_scripts", "dcms_insert_script_upload");

function dcms_insert_script_upload(){
	wp_enqueue_media();
    wp_register_script('my_upload', plugin_dir_url( __FILE__ ).'/js/upload.js', array('jquery'), '1', true );
    wp_enqueue_script('my_upload');
}



