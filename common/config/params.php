<?php
$ini = parse_ini_file(__DIR__ . '/../../keys.ini');
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'noReplyEmail' => 'noreply@eventhub.com',
    'user.passwordResetTokenExpire' => 3600,
    'keys'=>$ini
];
