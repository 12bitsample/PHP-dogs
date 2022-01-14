<?php
require_once 'includes/functions.php';
$breed = getBreed();
$result = getDogs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog Breeds</title>
</head>
<body>
<h1>Dog Breeds</h1>
    <form action="submit.php" method="post">
        <fieldset>
            <legend>Enter Dog Information</legend>
            <label for="name">Name:</label>
            <input type="text" name="dog_name" maxlength="100"><br>
            <label for="breed">Choose a Breed:</label>
            <select name="breed_id" id="breed">
            <?php foreach($breed as $breed):?>
                <option value="<?=$breed->breed_id?>"><?=$breed->breed_name?></option>
            <?php endforeach; ?>
            </select><br>
            <label for="age">Age:</label>
            <input type="number" name="age"><br>
            <label for="fixed">Is Dog fixed?:</label>
            <input type="checkbox" name="is_fixed" value="fixed"><br>
            <label for="vax">Is Dog vaccinated?:</label>
            <input type="checkbox" name="is_vaccinated" value="vax"><br>

            <button type="submit">Save</button>
        </fieldset>
    </form>

    <table>
        <th>ID #</th>
        <th>Dog's Name</th>
        <th>Breed</th>
        <th>Age</th>
        <th>Fixed</th>
        <th>Vaccinated</th>
        
        <?php foreach($result as $row): ?>
            <tr>
                <td><?=$row->dog_id?></td>
                <td><?=$row->dog_name?></td>
                <td><?=$row->breed_name?></td> 
                <td><?=$row->age?></td>
                <td><?=$row->is_fixed? 'Yes' : 'No'?></td> 
                <td><?=$row->is_vaccinated? 'Yes' : 'No'?></td>
                <td><a onclick="return confirm('Are you sure?')" href="editpage.php?id=<?=$row->dog_id?>">Edit</a></li></td>
                <td><a onclick="return confirm('Are you sure?')" href="delete.php?id=<?=$row->dog_id?>">Delete</a></li></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>