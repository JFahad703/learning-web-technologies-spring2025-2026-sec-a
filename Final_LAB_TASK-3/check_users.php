<?php
session_start();
echo "<h2>Session Debug Info</h2>";
echo "<pre>";
echo "Session Status: " . session_status() . "\n";
echo "Users in Session: ";
print_r($_SESSION['users'] ?? 'No users registered');
echo "</pre>";
?>