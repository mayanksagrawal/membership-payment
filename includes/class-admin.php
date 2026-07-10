<?php
declare(strict_types=1);

defined('ABSPATH') || exit;

final class MPG_Admin
{
    public static function init(): void
    {
        add_action('admin_menu', [self::class, 'menu']);
    }

    public static function menu(): void
    {
        add_menu_page(
            'Membership Payment',
            'Membership Payment',
            'manage_options',
            'membership-payment',
            [self::class, 'dashboard'],
            'dashicons-money-alt',
            26
        );

        add_submenu_page(
            'membership-payment',
            'Dashboard',
            'Dashboard',
            'manage_options',
            'membership-payment',
            [self::class, 'dashboard']
        );

        add_submenu_page(
            'membership-payment',
            'Settings',
            'Settings',
            'manage_options',
            'membership-payment-settings',
            ['MPG_Settings', 'page']
        );
    }

    public static function dashboard(): void
    {
        echo '<div class="wrap">';
        echo '<h1>Membership Payment Gateway</h1>';
        echo '<p>Plugin installed successfully.</p>';
        echo '</div>';
    }
}
