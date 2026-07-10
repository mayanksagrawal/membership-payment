<?php
declare(strict_types=1);

defined('ABSPATH') || exit;

final class MPG_Activator
{
    public static function activate(): void
    {
        MPG_DB::createTables();

        add_option('mpg_version', MPG_VERSION);

        if (get_option('mpg_settings') === false) {

            add_option('mpg_settings', [
                'merchant_key' => '',
                'merchant_salt' => '',
                'mode' => 'live',
                'organisation_name' => '',
                'organisation_email' => ''
            ]);

        }

        flush_rewrite_rules();
    }

    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }
}
