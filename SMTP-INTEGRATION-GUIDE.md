# Lead Form SMTP Integration

This PHP landing page sends every form lead to `enquiry@edwincorporatelawfirm.com` through Google Workspace / Gmail SMTP.

## Developer setup

1. Upload the complete project to a PHP-enabled hosting server. PHP 7.4 or newer is recommended.
2. In the project root, run:

   ```bash
   composer install --no-dev --optimize-autoloader
   ```

   This installs PHPMailer and creates the required `vendor/` directory.
3. Open the already-created `api/smtp-config.php` file.
4. Paste the existing Google **App Password** only in this line:

   ```php
   'password' => 'PASTE_APP_PASSWORD_HERE',
   ```

5. Do not change any other Google Workspace SMTP values:

   ```php
   'host' => 'smtp.gmail.com',
   'port' => 587,
   'encryption' => PHPMailer::ENCRYPTION_STARTTLS,
   'username' => 'enquiry@edwincorporatelawfirm.com',
   ```

6. Ensure PHP can create/write the `data/` directory. It stores a JSON backup of each lead at `data/leads.json`.
7. Submit one live test form and verify that the notification arrives at `enquiry@edwincorporatelawfirm.com`. The submitted customer's email is configured as Reply-To.

## Security

- Do not commit or publicly upload `api/smtp-config.php`.
- Do not send the App Password through public chat. Configure it directly on the server.
- The repository's `.gitignore` already excludes `api/smtp-config.php` and `data/leads.json`.
