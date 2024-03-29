INSERT INTO
    `ea_roles` (`id`, `name`, `slug`, `is_admin`, `appointments`, `customers`, `services`, `users`, `system_settings`, `user_settings`)
VALUES
    (1, 'Administrator', 'admin', 1, 15, 15, 15, 15, 15, 15),
    (2, 'Provider', 'provider', 0, 15, 15, 0, 0, 0, 15),
    (3, 'Customer', 'customer', 0, 0, 0, 0, 0, 0, 0);

INSERT INTO
    `ea_settings` (`name`, `value`)
VALUES
    ('company_working_plan',
     '{"sunday":{"start":"09:00","end":"18:00","breaks":[{"start":"14:30","end":"15:00"}]},"monday":{"start":"00:00","end":"18:00","breaks":[ {"start":"14:30","end":"15:00"}]},"tuesday":{"start":"00:00","end":"18:00","breaks":[ {"start":"14:30","end":"15:00"}]},"wednesday":{"start":"00:00","end":"18:00","breaks":[ {"start":"14:30","end":"15:00"}]},"thursday":{"start":"00:00","end":"18:00","breaks":[ {"start":"14:30","end":"15:00"}]},"friday":{"start":"00:00","end":"18:00","breaks":[ {"start":"14:30","end":"15:00"}]},"saturday":{"start":"00:00","end":"18:00","breaks":[ {"start":"14:30","end":"15:00"}]}}'),
    ('book_advance_timeout', '30'),
    ('google_analytics_code', ''),
    ('customer_notifications', '1'),
    ('date_format', 'DMY'),
    ('require_captcha', '0');

INSERT INTO `ea_migrations` VALUES ('9');
