<?php
session_start();
define('_DIR_ROOT_', __DIR__);

if (!empty($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}
$folder =  str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', _DIR_ROOT_));
$web_root = $web_root . $folder;
define('_WEB_ROOT_', $web_root);
require_once "app/core/App.php";
require_once "app/core/controller.php";
require_once "app/core/DB.php";
require_once "app/library/PHPExcel.php";
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;