<?php declare(strict_types=1);
/*
Plugin Name:  SOZO Upstream ACF
Description:  Restricts ACF field edits to WP_ENV=development
License:      GPL2
Version:      1.0.0
*/

/**
 * Blocks the user from making edits to ACF fields unless the environment is on local development
 *
 * @param WP_Screen|null $current_screen
 *
 * @return void
 */
function block_acf_screens(?WP_Screen $current_screen): void
{
    if (WP_ENV !== 'development') {
        if (function_exists('acf_is_screen')) {
            $blocked_screens = [
                'acf-field-group',
                'edit-acf-field-group',
                'custom-fields_page_acf-tools',
            ];
            foreach ($blocked_screens as $screen) {
                if (acf_is_screen($screen)) {
                    die('Please edit this on localhost. <a href="javascript:window.history.back()">Go back</a>.');
                }
            }
        }
    }

    return;
}

add_action('current_screen', 'block_acf_screens');
