<?php
declare(strict_types=1);

defined('ABSPATH') || exit;

final class MPG_DB
{
    public static function table(): string
    {
        global $wpdb;

        return $wpdb->prefix . 'membership_payments';
    }

    public static function createTables(): void
    {
        global $wpdb;

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        $charset = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE " . self::table() . " (

            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

            txnid VARCHAR(80) NOT NULL,

            customer_name VARCHAR(150) NOT NULL,

            mobile VARCHAR(20) NOT NULL,

            membership_no VARCHAR(50) NOT NULL,

            email VARCHAR(150) NOT NULL,

            gst_no VARCHAR(30) DEFAULT '',

            remarks TEXT,

            amount DECIMAL(12,2) NOT NULL,

            payment_status VARCHAR(20) DEFAULT 'Pending',

            payu_payment_id VARCHAR(100) DEFAULT '',

            bank_ref_no VARCHAR(100) DEFAULT '',

            gateway_response LONGTEXT,

            created_at DATETIME NOT NULL,

            updated_at DATETIME NOT NULL,

            PRIMARY KEY(id),

            UNIQUE KEY txnid (txnid),

            KEY membership_no (membership_no),

            KEY payment_status (payment_status)

        ) {$charset};";

        dbDelta($sql);
    }
}
