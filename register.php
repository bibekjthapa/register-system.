<?php
// register_process.php


$errors = [
'name' => '', 'email' => '', 'password' => '', 'confirm_password' => ''
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


if (empty($name)) $errors['name'] = 'Name is required.';
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Valid email required.';
if (strlen($password) < 8) $errors['password'] = 'Password must be 8+ characters.';
if ($password !== $confirm_password) $errors['confirm_password'] = 'Passwords do not match.';


$hasError = false;
foreach ($errors as $e) if ($e !== '') $hasError = true;


if ($hasError) {
echo "<h3>Errors:</h3><ul>";
foreach ($errors as $field => $msg) if ($msg) echo "<li>$field: $msg</li>";
echo "</ul><a href='registration.html'>Go Back</a>";
} else {
echo "<p style='color:green;'>Registration successful!</p>";
}
}