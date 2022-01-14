<?php
require_once 'includes/functions.php';

$errors = handleSubmit();

if ($errors) {
    foreach ($errors as $error) {
        print "<p>$error</p>";
    }

    print '<a href="form.php">Return to form</a>';
} else {
    header('Location: form.php');
}