<?php
require_once __DIR__ . '/vendor/autoload.php';

use Tatib\Src\Core\Helper;

$encrypted_string = "VFJDN3cvWXNEZlA2dkNkdUlGWDlVZz09";
$decrypted_string = Helper::decrypt($encrypted_string);

echo $decrypted_string;
