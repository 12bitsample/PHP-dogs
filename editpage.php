<?php
require_once 'includes/functions.php';
$breed = getBreed();
$row = getDog();




// if(!isset($_GET['dog_id']))
// {
//     echo'error';
// }else{
//     $id = $_GET['dog_id'];
//     // $result = getDogs($id);  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Breeds Edit Page</title>
</head>
<body>
<h1>Dog Breeds Edit Page</h1>
    <form action="edit.php" method="post">
        <fieldset>
            <legend>Edit Dog Information</legend>
            <input type="hidden" name="dog_id" value="<?php echo $_GET['id']?>">
            <label for="name">Name:</label>
            <input type="text" name="dog_name" value="<?=$row['dog_name']?>" maxlength="100"><br>
            <label for="breed">Choose a Breed:</label>
            <select name="breed_id" id="breed">
            <?php foreach($breed as $breed):?>
                <option value="<?=$breed->breed_id?>"><?=$breed->breed_name === $row['breed_id'] ? 'selected' : ''?></option>
            <?php endforeach; ?>
            </select><br>
            <label for="age">Age:</label>
            <input type="number" name="age" value="<?=$row['age']?>"><br>
            <label for="fixed">Is Dog fixed?:</label>
            <input type="checkbox" name="is_fixed" id="completed" <?=$row['is_fixed'] ? 'checked' : ''?>><br>
            <label for="vax">Is Dog vaccinated?:</label>
            <input type="checkbox" name="is_vaccinated" id="completed" <?=$row['is_vaccinated'] ? 'checked' : ''?>><br>

            <button type="submit">Save changes</button>
        </fieldset>
    </form>

    

   

</body>
</html>