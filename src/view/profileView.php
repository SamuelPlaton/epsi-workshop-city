<!DOCTYPE html>
<html>
<head>
    <!-- Title -->
    <title>City+</title>

    <?php include('components/links.php') ?>
    <style>

    </style>
</head>
<body>
<?php include('components/header.php') ?>
<br>
<br>
<br>

    <div class="mx-12">
        <div>
            <div class="flex">
            <img src="../../public/images/user.svg" class="w-5">
            <h1 class="mx-5"><b> MON PROFIL </b></h1>
            </div>
            <hr>
            <br>
            <p>
                Nom : <?php echo $_SESSION['name']; ?>
                <br><br>
                Prénom : <?php echo $_SESSION['fname']; ?><br><br>
            <hr><br>
                Numéro de téléphone : <?php echo $_SESSION['tel']; ?><br><br>
                Email : <?php echo $_SESSION['mail']; ?><br><br>
            </p>
        </div>
        <br>
        <br>
        <a href="../../src/model/chgProfileModel.php" class="text-white py-2 px-4 rounded w-50 m-auto text-lg" style="background-color: #63c76a;">Modifier mon compte</a>
    </div>
</body>