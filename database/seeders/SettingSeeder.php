<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("
        INSERT INTO `settings` (`id`, `group`, `type`, `key`, `value`, `locale`, `autoload`, `parent_id`, `created_at`, `updated_at`) VALUES
        (1, 'setting', 'site_open', 'site_open', 'yes', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (2, 'setting', 'site_title', 'site_title', 'Fresh Zone', 'en', 0, NULL, '2023-11-06 05:04:22', '2025-01-07 09:05:31'),
        (3, 'setting', 'site_url', 'site_url', 'http://127.0.0.1:8000', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (4, 'setting', 'website_url', 'website_url', 'http://127.0.0.1:8000', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (5, 'setting', 'admin_url', 'admin_url', 'admin', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (6, 'setting', 'admin_language', 'admin_language', 'ar', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (7, 'setting', 'site_email', 'site_email', 'info@systemira.com', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (8, 'setting', 'site_phone', 'site_phone', '01029936932', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (9, 'setting', 'table_limit', 'table_limit', '100', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (10, 'setting', 'ssl_certificate', 'ssl_certificate', 'no', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (11, 'setting', 'logo_image', 'logo_image', NULL, 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-11 14:36:35'),
        (12, 'social', 'facebook', 'facebook', 'https://www.facebook.com', 'en', 1, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (13, 'social', 'twitter', 'twitter', 'https://www.twitter.com', 'en', 1, NULL, '2023-11-06 05:04:22', '2023-11-19 05:45:53'),
        (14, 'social', 'snapchat', 'snapchat', '', 'ar', 1, NULL, '2023-11-11 14:28:57', '2023-11-11 14:28:57'),
        (15, 'social', 'youtube', 'youtube', 'https://youtube.com', 'en', 1, NULL, '2023-11-06 05:04:22', '2023-11-19 05:45:53'),
        (16, 'social', 'instagram', 'instagram', 'https://instagram.com', 'en', 1, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (17, 'social', 'whatsapp', 'whatsapp', '01029936932', 'en', 1, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (18, 'setting', 'user_type_debug', 'user_type_debug', 'super_admin,admin', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (19, 'setting', 'user_id_debug', 'user_id_debug', NULL, 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (20, 'setting', 'app_debug', 'app_debug', 'yes', 'en', 0, NULL, '2023-11-06 05:04:22', '2023-11-06 05:04:22'),
        (21, 'social', 'huawei', 'huawei', '', 'ar', 1, NULL, '2023-11-11 14:28:57', '2023-11-11 14:28:57'),
        (22, 'social', 'apple', 'apple', '', 'ar', 1, NULL, '2023-11-11 14:28:57', '2023-11-11 14:28:57'),
        (23, 'social', 'android', 'android', '', 'ar', 1, NULL, '2023-11-11 14:28:57', '2023-11-11 14:28:57'),
        (25, 'setting', 'site_language', 'site_language', 'en', 'ar', 0, NULL, '2023-11-11 14:36:35', '2024-10-05 07:51:39'),
        (26, 'setting', 'min_order', 'min_order', '2', 'ar', 0, NULL, '2023-11-11 14:36:35', '2025-01-05 08:45:14'),
        (27, 'setting', 'max_order', 'max_order', '500', 'ar', 0, NULL, '2023-11-11 14:36:35', '2025-01-01 19:12:08'),
        (28, 'setting', 'shipping', 'shipping', '0', 'ar', 0, NULL, '2023-11-11 14:36:35', '2023-11-11 14:36:35'),
        (29, 'setting', 'address', 'address', 'التجمع الخامس', 'ar', 0, NULL, '2023-11-11 14:36:35', '2023-11-11 16:36:07'),
        (30, 'social', 'tiktok', 'tiktok', '', 'ar', 1, NULL, '2023-11-11 17:04:12', '2023-11-11 17:04:12'),
        (31, 'setting', 'delivery_cost', 'delivery_cost', '10', 'ar', 0, NULL, '2023-11-19 05:44:31', '2025-01-01 19:31:41'),
        (32, 'setting', 'website', 'website', 'no', 'ar', 0, NULL, '2023-11-11 16:36:35', '2025-08-19 05:35:02'),
        (33, 'setting', 'is_web', 'is_web', 'no', 'ar', 0, NULL, '2023-11-11 16:36:35', '2025-08-19 05:35:02'),
        (34, 'setting', 'is_vue', 'is_vue', 'no', 'ar', 0, NULL, '2023-11-11 16:36:35', '2025-08-19 05:35:02'),
        (35, 'setting', 'service', 'service', 'yes', 'ar', 0, NULL, '2023-11-11 16:36:35', '2025-01-05 10:45:14'),
        (36, 'setting', 'print_color', 'print_color', '\r\n#7367F0', 'ar', 0, NULL, '2023-11-11 16:36:35', '2024-10-05 10:51:39'),
        (37, 'setting', 'default_country', 'default_country', '1', 'ar', 0, NULL, '2023-11-11 14:36:35', '2025-01-05 08:45:14'),
        (38, 'setting', 'primary_login', 'primary_login', 'phone', 'ar', 0, NULL, '2023-11-11 14:36:35', '2025-08-19 05:35:02'),
        (39, 'setting', 'is_color', 'is_color', '1', 'ar', 0, NULL, '2023-11-11 14:36:35', '2025-01-05 08:45:14'),
        (40, 'setting', 'sizes', 'sizes', 'no', 'ar', 0, NULL, '2025-08-14 05:37:36', '2025-08-19 05:46:53'),
        (41, 'setting', 'additions', 'additions', 'no', 'ar', 0, NULL, '2025-08-14 05:37:36', '2025-08-19 05:35:02'),
        (42, 'setting', 'tax', 'tax', '0', 'ar', 0, NULL, '2025-08-14 05:37:36', '2025-08-14 05:37:36'),
        (43, 'setting', 'fees', 'fees', '0', 'ar', 0, NULL, '2025-08-14 05:37:36', '2025-08-14 05:37:36'),
        (44, 'setting', 'social_login', 'social_login', 'yes', 'ar', 0, NULL, '2025-08-14 05:37:36', '2025-08-19 05:35:02'),
        (45, 'setting', 'colors', 'colors', 'yes', 'ar', 0, NULL, '2025-08-19 05:30:41', '2025-08-19 05:46:48'),
        (46, 'setting', 'is_return', 'is_return', 'yes', 'ar', 0, NULL, '2025-08-19 05:30:41', '2025-08-19 05:35:02');
        (47, 'setting', 'return_period_days', 'return_period_days', '20', 'ar', 0, NULL, '2025-08-19 05:30:41', '2025-08-19 05:35:02');
        ");
    }
}
