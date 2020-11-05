<div id="header" class="w-100 p-2 flex flex-row justify-between items-center">
    <div>
        <button type="button" onclick="openMenuBar()">
            <!-- Burger Button -->
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-justify" fill="white" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
        <button type="button">
            <?php if(isset($_SESSION['token'])){
                echo '<a href="homeModel.php"><img class="application-icon" src="../../public/images/icon.png" alt="icon logo" /> </a>';
            }else{
                echo '<a href="signinModel.php"><img class="application-icon" src="../../public/images/icon.png" alt="icon logo" /> </a>';
            } ?>
        </button>
    </div>
    <h1 class="text-white text-2xl"> <?php if(isset($title)) echo $title;?> </h1>
    <?php if(isset($_SESSION['token'])){
    echo '<button type="button" onclick="window.location.href = \'disconnectModel.php\'">
        <!-- Log Button -->
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="white" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
        </svg>
    </button>';
    }else{
        echo '<div> </div>';
    } ?>
    <!-- Background menu -->
    <div id="hidebar" class="fixed h-screen w-screen bg-opacity-50 mx-4 top-0 bg-black hidden z-40"> </div>
    <!-- Hidden menu bar -->
    <div id="burgermenu" class="fixed top-0 -ml-4 w-2/3 lg:w-1/4 h-screen z-50" >
        <div class="flex justify-between">
            <button type="button">
                <img class="application-icon m-4" src="../../public/images/icon.png" alt="icon logo" />
            </button>
            <button onclick="closeMenuBar()" class="m-4">
                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-x" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>
        <div class="flex flex-col">
            <?php
            if(isset($_SESSION['idAdmin'])){
                echo '<div class="flex flex-row items-center m-auto py-1">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-award" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9.669.864L8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193l-1.51-.229L8 1.126l-1.355.702-1.51.229-.684 1.365-1.086 1.072L3.614 6l-.25 1.506 1.087 1.072.684 1.365 1.51.229L8 10.874l1.356-.702 1.509-.229.684-1.365 1.086-1.072L12.387 6l.248-1.506-1.086-1.072-.684-1.365z"/>
                    <path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
                  </svg>
                <a href="adminModel.php" class="link ml-2 text-white"> Administration </a>
            </div>';
            }
            if(isset($_SESSION['token'])){
                echo '
            <div class="flex flex-row items-center m-auto py-1">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-house" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                </svg>
                <a href="homeModel.php" class="link ml-2 text-white"> Accueil </a>
            </div>
            <div class="flex flex-row items-center m-auto py-1">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-plus" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                <a href="createTicketModel.php" class="link ml-2 text-white"> Poster un ticket </a>
            </div>
            <div class="flex flex-row items-center m-auto py-1">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>
                <a href="" class="link ml-2 text-white" > Mon profil </a>
            </div>
            <div class="flex flex-row items-center m-auto py-1">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-envelope" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                </svg>
                <a href="" class="link ml-2 text-white"> Aide </a>
            </div>
            <div class="flex flex-row items-center m-auto py-1">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                <a href="disconnectModel.php" class="link ml-2 text-white"> Déconnexion </a>
            </div>
               ';
            }else{
                echo '
            <div class="flex flex-row items-center m-auto py-1">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-right" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                <a href="signinModel.php" class="link ml-2 text-white"> Connexion </a>
            </div>
            <div class="flex flex-row items-center m-auto py-1">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-book" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1 2.828v9.923c.918-.35 2.107-.692 3.287-.81 1.094-.111 2.278-.039 3.213.492V2.687c-.654-.689-1.782-.886-3.112-.752-1.234.124-2.503.523-3.388.893zm7.5-.141v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                </svg>
                <a href="signupModel.php" class="link ml-2 text-white"> Inscription </a>
            </div>

';
            } ?>

        </div>
    </div>
</div>

<script type="text/javascript" src="../../public/js/header.js"></script>
