<?php

function errbit_wordpress_admin_menu () {
    add_menu_page( AW_TITLE, 'Errbit Wordpress', 'administrator', AW_SLUG, 'errbit_wordpress_settings' );
}

function errbit_wordpress_settings () {

    if ( ! function_exists( 'submit_button' ) ) {
			function submit_button() {
		echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>';
        }
    }

    include AW_DOCROOT . '/views/settings.php';
}