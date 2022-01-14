<?php
require_once 'includes/functions.php';

editDogname($_POST['id'] ?? 0); // pass $_GET['id'] if exists, else 0
header('Location: form.php');

// if(isset($_POST['submit'])){

//     $id = $_POST['id'];
//     $dogsName = $_POST['dog_name'];
//     $breedId = $_POST['breed_id'];
//     $age = $_POST['age'];
//     $isFixed = isset($_POST['is_fixed']) ? 1 : 0;
//     $isVax = isset($_POST['is_vaccinated']) ? 1 : 0;

//     editDogname($_POST['id'] ?? 0); // pass $_GET['id'] if exists, else 0
//     header('Location: form.php');
// }
