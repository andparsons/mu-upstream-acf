<?php declare(strict_types=1);

namespace SOZO\Fixes;

use WP_Screen;

class UpstreamAcf
{

    /**
     * UpstreamAcf constructor.
     */
    public function __construct()
    {
        add_action('current_screen', [$this, 'block_acf_screens']);
    }

    /**
     * Blocks the user from making edits to ACF fields unless the environment is on local development
     *
     * @param WP_Screen|null $current_screen
     *
     * @return void
     */
    public function block_acf_screens(?WP_Screen $current_screen): void
    {
        if (WP_ENV !== 'develodpment') {
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
}