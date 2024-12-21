<?php
echo basename($_SERVER['SCRIPT_NAME']);
echo '<hr>';
echo basename($_SERVER['SCRIPT_FILENAME']);

// Kalau urlnya gini : index.php?username=12
// Coba tambahin ini
echo basename($_SERVER['SCRIPT_NAME'], '?' . $_SERVER['QUERY_STRING']);
echo '<hr>';
echo basename($_SERVER['SCRIPT_FILENAME'], '?' . $_SERVER['QUERY_STRING']);

echo pathinfo($_SERVER['SCRIPT_NAME'], PATHINFO_FILENAME);
echo '<hr>';
echo pathinfo($_SERVER['SCRIPT_FILENAME'], PATHINFO_FILENAME);
?>