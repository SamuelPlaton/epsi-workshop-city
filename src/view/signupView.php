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
        <label for="mailAddress" class="form-control-label text-lg mb-2">Mail</label>
        <input type="email" id="mailAddress" name="mailAddress" placeholder="(Optionnel)" class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1">
    </div>
    <div class="form-group flex flex-col my-2">
        <label for="title" class="form-control-label text-lg mb-2">Mot de passe</label>
        <div class="flex flex-row justify-between w-full mx-4 mx-auto">
            <input type="password" id="typepass" name="password" placeholder=" " class="form-control flex-grow border-solid border-2 border-gray rounded-lg p-1" required>
            <button type="button" onclick="Toggle1()" class="mx-2 w-6">
                <img src="../../public/images/view-show.svg" alt="view"/>
            </button>
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
    <div class="form-group flex flex-col">
        <label for="title" class="form-control-label text-md mb-2">Entrez le mot de passe à nouveau</label>
        <div class="flex flex-row justify-between w-full mx-4 mx-auto">
        <input type="password" id="typepass2" name="password2" placeholder=" " class="form-control flex-grow border-solid border-2 border-gray rounded-lg p-1" required />
            <button type="button" onclick="Toggle2()" class="mx-2 w-6">
                <img src="../../public/images/view-show.svg" alt="view"/>
            </button>
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
    <div class="form-group flex flex-col">
        <label for="inline-checkbox1" class="form-check-label flex flex-row">
            <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input mx-2" required>
            <p class="text-xs"> En cochant cette case, j'autorise l'application à exploiter mes coordonnées GPS pour localiser mes reports. </p>
        </label>
    </div>
    <div class="text-center mt-5">
        <button id="sign-up-button" name="sign-up-button" type="submit" class="text-white py-2 px-4 rounded w-50 m-auto text-lg" style="background-color: #63c76a;">
            Créer mon compte
        </button>
    </div>
    <a href="signinModel.php" class="text-xs underline my-4" > Je n'ai pas de compte </a>
</form>
</body>
</html>