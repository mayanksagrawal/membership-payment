<?php

declare(strict_types=1);

defined('ABSPATH') || exit;

final class MPG_Plugin
{
    private static ?MPG_Plugin $instance = null;

    public static function instance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        $this->load();
        $this->hooks();
    }

    private function load(): void
    {
        require_once MPG_PATH . 'includes/class-activator.php';
        require_once MPG_PATH . 'includes/class-db.php';

        require_once MPG_PATH . 'admin/class-admin.php';
        require_once MPG_PATH . 'admin/class-settings.php';
    }

    private function hooks(): void
    {
        register_activation_hook(
            MPG_FILE,
            ['MPG_Activator', 'activate']
        );

        register_deactivation_hook(
            MPG_FILE,
            ['MPG_Activator', 'deactivate']
        );

        add_action(
            'plugins_loaded',
            [$this, 'init']
        );
    }

    public function init(): void
    {
        MPG_Admin::init();
        MPG_Settings::init();
    }
}
