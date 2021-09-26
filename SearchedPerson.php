<?php

require_once 'vendor/autoload.php';

use App\PersonRegister;

$personRegister = new PersonRegister();
$records = $personRegister->getPersonData();
$searchedPerson = $personRegister->searchByIdentityNumber($records,$_GET['searchNumber']);

if (isset($_POST['delete']))
{
    $personRegister->deleteEntry($_GET['searchNumber']);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
          crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Identity number</th>
            <th scope="col">Extra info</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <td><?php echo $searchedPerson['name']; ?></td>
                <td><?php echo $searchedPerson['surname']; ?></td>
                <td><?php echo $searchedPerson['identityNumber']; ?></td>
                <td><?php echo $searchedPerson['extraInfo']; ?></td>
            </tr>
        </tbody>
    </table>

    <form method="post">
        <button type="submit" class="btn btn-primary" name="delete">Delete</button>
    </form>
</body>
</html>
