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

<form id="sign-up-form" name="sign-up-form" action="" method="post" enctype="multipart/form-data" class="m-5 w-2/3 lg:w-1/2 mx-auto">
    <div class="form-group flex flex-col my-2">
        <label for="lastname" class="form-control-label text-lg mb-2">Nom</label>
        <input type="text" id="lastname" name="lastname" placeholder=" " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" required>
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="firstname" class="form-control-label text-lg mb-2">Prénom</label>
        <input type="text" id="firstname" name="firstname" placeholder=" " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" required>
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="phoneNumber" class="form-control-label text-lg mb-2">Téléphone</label>
        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="+33 6 ..." class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" required>
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="birth" class="form-control-label text-lg mb-2">Date de naissance</label>
        <input type="date" id="birth" name="birth" placeholder=" " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" >
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="gender" class="form-control-label text-lg mb-2">Sexe</label>
        <label for="male">Homme</label>
            <input type="radio" name="gender" value="male" class="lg:w-1/3" checked> <br>
        <label for="female">Femme</label>
            <input type="radio" name="gender" value="female" class="lg:w-1/3"> <br>
        <label for="other">Autre</label>
            <input type="radio" name="gender" value="other" class="lg:w-1/3">
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="mailAddress" class="form-control-label text-lg mb-2">Mail</label>
        <input type="email" id="mailAddress" name="mailAddress" placeholder="(Optionnel)" class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1">
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="title" class="form-control-label text-lg mb-2">Mot de passe</label>
        <div class="flex flex-row justify-between w-full mx-4 mx-auto">
            <input type="password" id="typepass" name="password" placeholder=" " class="form-control flex-grow border-solid border-2 border-gray rounded-lg p-1" required>
            <input type="image" src="../../public/images/view-show.svg" class="mx-2 w-6" onclick="Toggle1()">
        </div>
    </div>
    <div>
        <script>
            // Change the type of input to password or text
            function Toggle1() {
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
        <div class="flex flex-row justify-between w-full mx-4 mx-auto">
        <input type="password" id="typepass2" name="password2" placeholder=" " class="form-control flex-grow border-solid border-2 border-gray rounded-lg p-1" required>
        <input type="image" src="../../public/images/view-show.svg" class="mx-2 w-6" onclick="Toggle2()">
        </div>
    </div>
    <div>
        <script>
            // Change the type of input to password or text
            function Toggle2() {
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
        <button  id="accountOwned" name="accountOwned" type="button" class="text-white py-2 px-4 rounded w-50 m-auto text-lg" style="background-color: #2980b9;">
            J'ai déjà un compte
        </button>
        <button id="sign-up-button" name="sign-up-button" type="submit" class="text-white py-2 px-4 rounded w-50 m-auto text-lg" style="background-color: #63c76a;">
            Créer mon compte
        </button>
    </div>
</form>
</body>
</html>