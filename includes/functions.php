<?php

function dbConnect(): ?PDO {
    try {
        $options = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];
        $host = 'mysql:dbname=dogsdb;host=127.0.0.1';
        $user = 'root';
        $pass = '';

        return new PDO($host, $user, $pass, $options);
    } catch (PDOException $e) {
        // log exception
        echo $e->getMessage();

        return null;
    }
}

function getDogs(): Traversable {
    try {
        $db = dbConnect();
        
        return $db->query('SELECT * FROM dogs d join breeds b on d.breed_id = b.breed_id');
    } catch (PDOException $e) {
        // log exception
        echo $e->getMessage();

        return [];
    }
}


function getBreed(): Traversable{
    try {
    
        
        return dbConnect()->query('SELECT * FROM breeds');
    } catch (PDOException $e) {
        // log exception
        echo $e->getMessage();

        return [];
    }

}

function handleSubmit(): array {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        return saveDogs(); 
        
    }

    
}

function saveDogs(): array {
    try {
        $errors = [];
        $dogsName = $_POST['dog_name'];
        $breedId = $_POST['breed_id'];
        $age = $_POST['age'];
        $isFixed = isset($_POST['is_fixed']) ? 1 : 0;
        $isVax = isset($_POST['is_vaccinated']) ? 1 : 0;
        
        if (empty($dogsName)) {
            array_push($errors, 'Name can not be empty');
        }

        if (empty($age)) {
            array_push($errors, 'Age can not be empty');
        }

        if (count($errors) === 0) {
        $sql = "INSERT INTO dogs(dog_name,breed_id,age,is_fixed,is_vaccinated) VALUES('$dogsName','$breedId','$age','$isFixed','$isVax')";
        dbConnect()->query($sql);
        }

        return $errors;
    } catch (PDOException $e) {
        // log exception
        echo $e->getMessage();
    }
}

function deleteDogname(int $id): void {
    try {
        if ($id <= 0) {
            return;
        }
        $sql = ("DELETE FROM dogs WHERE dog_id = $id");
        dbConnect()->query($sql);

    } catch (PDOException $e) {
        // log exception
        echo $e->getMessage();
    }
}

// function editDogname(int $id): void {
//     try {
//         if ($id <= 0) {
//             return;
//         }
//         $sql = "UPDATE dogs(dog_name,breed_id,age,is_fixed,is_vaccinated) WHERE dog_id = $id";
//         dbConnect()->query($sql)->execute(['$dogsName','$breedId','$age','$isFixed','$isVax']);

//     } catch (PDOException $e) {
//         // log exception
//         echo $e->getMessage();
//     }
//     header('Location: form.php');
// }

function editDogname(): Array {
    try {
        $errors = [];
        $id = $_POST['dog_id'];
        $dogsName = $_POST['dog_name'];
        $breedId = $_POST['breed_id'];
        $age = $_POST['age'];
        $isFixed = isset($_POST['is_fixed']) ? 1 : 0;
        $isVax = isset($_POST['is_vaccinated']) ? 1 : 0;
        
        if (empty($dogsName)) {
            array_push($errors, 'Name can not be empty');
        }

        if (empty($age)) {
            array_push($errors, 'Age can not be empty');
        }

        if (count($errors) === 0) {
            $sql = "UPDATE dogs SET dog_name = '$dogsName', breed_id = $breedId, age = $age, is_fixed = $isFixed, is_vaccinated = $isVax WHERE dog_id = $id";
            dbConnect()->query($sql);
            // $sql = "UPDATE dogs(dog_name,breed_id,age,is_fixed,is_vaccinated) WHERE dog_id = $id VALUES('$dogsName','$breedId','$age','$isFixed','$isVax')";
        // dbConnect()->query($sql);
        }
        return $errors;
        } catch (PDOException $e) {
        // log exception
        echo $e->getMessage();
    }
}

function getDog(): Array {
    try {
        $db = dbConnect();
        $id = $_GET['id'];
        $result = $db->prepare("SELECT * FROM dogs WHERE dog_id = '$id'");
        $result->execute();

        $row = $result->fetch(\PDO::FETCH_ASSOC);
        
        return $row;

    } catch (PDOException $e) {
        // log exception
        echo $e->getMessage();

        return [];
    }
}