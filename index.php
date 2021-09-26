<?php

require_once 'vendor/autoload.php';

use App\PersonRegister;

$personRegister = new PersonRegister();

if (isset($_POST['addToRegister']))
{
    $personRegister->addPersonData(
        $_POST['name'],
        $_POST['surname'],
        $_POST['identityNumber'],
        $_POST['extraInfo']
    );
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

    <title>Person register</title>
</head>
<body>
    <div class="row">
        <div class="col">
            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Enter name:</label>
                    <input type="text" class="form-control w-50" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="surname" class="form-label">Enter surname:</label>
                    <input type="text" class="form-control w-50" id="surname" name="surname">
                </div>

                <div class="mb-3">
                    <label for="identityNumber" class="form-label">Enter identity number:</label>
                    <input type="text" class="form-control w-50" id="identityNumber" name="identityNumber">
                </div>

                <div class="mb-3">
                    <label for="extraInfo" class="form-label">Extra Info</label>
                    <textarea class="form-control w-50" id="extraInfo" name="extraInfo" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="addToRegister">Add to register</button>
            </form>
        </div>
        <div class="col">
            <form action="SearchedPerson.php" method="get">
                <div class="mb-3">
                    <label for="searchNumber" class="form-label">Enter identity number:</label>
                    <input type="text" class="form-control w-50" id="searchNumber" name="searchNumber">
                </div>

                <button type="submit" class="btn btn-primary" name="search">Search</button>
            </form>
        </div>
    </div>
</body>
</html>
