<?php
date_default_timezone_set('Asia/Jakarta');

/**
 * Database Connection
 */
$databaseHost       = 'localhost';
$databaseUsername   = 'root';
$databasePassword   = '';
$databaseName       = 'db_sistek_development';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
