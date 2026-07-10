<?php
declare(strict_types=1);

defined('ABSPATH') || exit;

final class MPG_Settings
{
    public static function init(): void
    {
        add_action('admin_init', [self::class, 'register']);
    }

    public static function register(): void
    {
        register_setting(
            'mpg_settings_group',
            'mpg_settings'
        );
    }

    public static function page(): void
    {
        $settings = get_option('mpg_settings', []);

        ?>

        <div class="wrap">

            <h1>Membership Payment Settings</h1>

            <form method="post" action="options.php">

                <?php settings_fields('mpg_settings_group'); ?>

                <table class="form-table">

                    <tr>

                        <th>Merchant Key</th>

                        <td>

                            <input
                                type="text"
                                class="regular-text"
                                name="mpg_settings[merchant_key]"
                                value="<?php echo esc_attr($settings['merchant_key'] ?? ''); ?>">

                        </td>

                    </tr>

                    <tr>

                        <th>Merchant Salt</th>

                        <td>

                            <input
                                type="password"
                                class="regular-text"
                                name="mpg_settings[merchant_salt]"
                                value="<?php echo esc_attr($settings['merchant_salt'] ?? ''); ?>">

                        </td>

                    </tr>

                    <tr>

                        <th>Mode</th>

                        <td>

                            <select name="mpg_settings[mode]">

                                <option value="live" <?php selected($settings['mode'] ?? 'live', 'live'); ?>>Live</option>

                                <option value="test" <?php selected($settings['mode'] ?? 'live', 'test'); ?>>Test</option>

                            </select>

                        </td>

                    </tr>

                </table>

                <?php submit_button(); ?>

            </form>

        </div>

        <?php
    }
}
