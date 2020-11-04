<!DOCTYPE html>
<html>
<head>
    <!-- Title -->
    <title>City+</title>
    <?php include('components/links.php')?>
</head>
<body>
<!-- Toastify Script -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php include('components/header.php')?>

<form id="sign-in-form" name="sign-in-form" action="" method="post" enctype="multipart/form-data" class="m-5 w-2/3 lg:w-1/2 mx-auto">
    <div class="form-group flex flex-col my-2">
        <label for="phoneNumber" class="form-control-label text-lg mb-2">Téléphone</label>
        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="+33 6 ..." class="form-control w-full mx-4 mx-auto border-solid border-2 border-gray rounded-lg p-1" required>
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
            // If user signed up before, fill
            var url = new URL(window.location.href);
            var phone = url.searchParams.get("phone");
            var password = url.searchParams.get("pwd");
            if(password && phone){
                document.getElementById("phoneNumber").value = phone;
                document.getElementById("typepass").value = password;
                console.log('before');
                Toastify({
                    text: "Compte créée avec succès ",
                    backgroundColor: "linear-gradient(to right, #21ce2d, #63c76a)",
                    className: "success",
                    gravity: "bottom",
                    duration: 2000,
                    close: true,
                }).showToast();
            }
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
    <a href="signupModel.php" class="text-xs underline" > Je n'ai pas de compte </a>
    <div class="text-center mt-5">
        <br>
        <button id="sign-in-button" name="sign-in-button" type="submit" class="text-white py-2 px-4 rounded w-50 m-auto text-lg" style="background-color: #63c76a;">
            Connexion
        </button>
    </div>
</form>

<?php
if(isset($connected) && $connected == false){
    echo '<script>
            Toastify({
                text: "Mauvais identifiants",
                backgroundColor: "linear-gradient(to right, #f90c1c, #f31818)",
                className: "error",
                duration: 2000,
                close: true,
                }).showToast();
            </script>';
}else if (isset($connected) && $connected == true){
    echo '<script>
        window.location.href = "homeModel.php";
    </script>';
}
?>

</body>
</html>
