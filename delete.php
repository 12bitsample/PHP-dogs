<?php
require_once 'includes/functions.php';

deleteDogname($_GET['id'] ?? 0); // pass $_GET['id'] if exists, else 0
header('Location: form.php');