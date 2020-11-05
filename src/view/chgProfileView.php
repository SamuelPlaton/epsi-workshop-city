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
            <form id="sign-up-form" name="sign-up-form" action="" method="post" enctype="multipart/form-data" class="m-5 w-2/3 lg:w-1/2 mx-auto">
                <div class="form-group flex flex-col my-2">
                    <label for="lastname" class="form-control-label text-lg mb-2">Nouveau Nom</label>
                    <input type="text" id="lastname" name="lastname" placeholder="(Optionnel) " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" >
                </div>
                <div class="form-group flex flex-col my-2">
                    <label for="firstname" class="form-control-label text-lg mb-2">Nouveau Prénom</label>
                    <input type="text" id="firstname" name="firstname" placeholder="(Optionnel) " class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" >
                </div>
                <div class="form-group flex flex-col my-2">
                    <label for="phoneNumber" class="form-control-label text-lg mb-2">Nouveau Téléphone</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" placeholder="(Optionnel)" class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" >
                </div>
                <div class="form-group flex flex-col my-2">
                    <label for="mailAddress" class="form-control-label text-lg mb-2">Nouveau Mail</label>
                    <input type="email" id="mailAddress" name="mailAddress" placeholder="(Optionnel)" class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1">
                </div>
                <div class="form-group flex flex-col my-2">
                    <label for="title" class="form-control-label text-lg mb-2">Nouveau Mot de passe</label>
                    <div class="flex flex-row justify-between w-full mx-4 mx-auto">
                        <input type="password" id="typepass" name="password" placeholder="(Optionnel) " class="form-control flex-grow border-solid border-2 border-gray rounded-lg p-1" >
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
                    <label for="title" class="form-control-label text-md mb-2">Entrez le nouveau  mot de passe à nouveau</label>
                    <div class="flex flex-row justify-between w-full mx-4 mx-auto">
                        <input type="password" id="typepass2" name="password2" placeholder="(Optionnel) " class="form-control flex-grow border-solid border-2 border-gray rounded-lg p-1" />
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
                <a href="../../src/model/homeModel.php" class="block text-white py-2 px-4 rounded w-50 m-10 text-lg" style="background-color: #63c76a;">Valider</a>
            </form>
        </div>
    </div>
</body>