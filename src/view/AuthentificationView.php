<!DOCTYPE html>
<html>
<head>
    <!-- Title -->
    <title>City+</title>

    <?php include('components/links.php')?>
    <style>

    </style>
</head>
<body>
<?php include('components/header.php')?>

<form id="sign-up-form" action="" method="post" enctype="multipart/form-data" class="m-5 w-2/3 lg:w-1/2 mx-auto">
    <div class="form-group flex flex-col my-2">
        <label for="name" class="form-control-label text-lg mb-2">Nom</label>
        <input type="text" id="name" name="name" placeholder=" " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" required>
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="surname" class="form-control-label text-lg mb-2">Prénom</label>
        <input type="text" id="surname" name="surname" placeholder=" " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" required>
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="tel" class="form-control-label text-lg mb-2">Téléphone</label>
        <input type="text" id="tel" name="tel" placeholder="+33 6 ..." class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" required>
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="age" class="form-control-label text-lg mb-2">Âge</label>
        <input type="text" id="age" name="age" placeholder=" (Optionnel) " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" >
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="gender" class="form-control-label text-lg mb-2">Sexe</label>
        <input type="text" id="gender" name="gender" placeholder=" (Optionnel) " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" >
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="title" class="form-control-label text-lg mb-2">Mail</label>
        <input type="email" id="mail" name="mail" placeholder="(Optionnel)" class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1">
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="title" class="form-control-label text-lg mb-2">Mot de passe</label>
        <input type="password" id="typepass" name="password" placeholder=" " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" required>
    </div>
    <div>
        <input type="checkbox" onclick="Toggle()">
        <b>Voir le mot de passe</b>

        <script>
            // Change the type of input to password or text
            function Toggle() {
                var temp = document.getElementById("typepass");
                if (temp.type === "password") {
                    temp.type = "text";
                }
                else {
                    temp.type = "password";
                }
            }
        </script>
    </div>
    <br>
    <div class="form-group flex flex-col my-2">
        <label for="title" class="form-control-label text-lg mb-2">Entrez le mot de passe à nouveau</label>
        <input type="password" id="typepass2" name="password2" placeholder=" " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" required>
    </div>
    <div>
        <input type="checkbox" onclick="Toggle()">
        <b>Voir le mot de passe</b>

        <script>
            // Change the type of input to password or text
            function Toggle() {
                var temp = document.getElementById("typepass2");
                if (temp.type === "password") {
                    temp.type = "text";
                }
                else {
                    temp.type = "password";
                }
            }
        </script>
    </div>
    <br>
    <br>
    <div class="form-group flex flex-col my-2">
        <label for="inline-checkbox1" class="form-check-label ">
            <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input" required>
            En cochant cette case, j'autorise l'application à exploiter mes coordonnées GPS pour localiser mes reports.
        </label>
    </div>
    <div class="text-center mt-5">
        <br>
        <button id="submit-button" type="submit" class="text-white py-2 px-4 rounded w-50 m-auto text-lg">
            Créer mon compte
        </button>
    </div>
</form>

</body>
</html>