<!DOCTYPE html>
<html>
<head>
	<!-- Title -->
	<title>City+</title>

	<?php include('components/links.php')?>
	<style>
        .content {
            padding: 10px;
        }
        .title {
            font-size: 18px;
            margin: 0 0 10px 10px;
        }
        .column {
            float: left;
            width: 32%;
            margin: 10px 10px auto;
            border:1px solid rgba(0,0,0,0.12);
            -webkit-box-shadow: 0px 10px 14px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 10px 14px -9px rgba(0,0,0,0.75);
            box-shadow: 0px 10px 14px -9px rgba(0,0,0,0.75);
        }
        .row-cust:after {
            content: "";
            display: table;
            clear: both;
        }
        .fullImage {
            position: fixed;
            top:0;
            left:0;
            background:rgba(0,0,0,0.8);
            width: 100%;
            height: 100%;
            z-index: 999999999;
            overflow-y: scroll;
        }

        .fullImage img {
            position: absolute;
            overflow-y: scroll;
            max-height: 100vh;
            max-width: 90%;
            margin: auto;
            top:0;
            bottom: 0;
            left:0;
            right: 0;
        }

        @media screen and (max-width: 1520px) {
            .column {
                width: 31%;
            }
        }
        @media screen and (max-width: 876px) {
            .column {
                width: 30%;
            }
        }
        @media screen and (max-width: 776px) {
            .column {
                width: 45%;
            }
        }
        @media screen and (max-width: 600px) {
            .column {
                width: 95%;
            }
        }
	</style>
</head>
<body style="background: #EFEFEF">
<!-- Toastify Script -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<?php include('components/header.php')?>
    <?php include('components/reportPopup.php')?>
    <div class="content">
        <div class="title">Tickets à proximité (50m)</div>
        <div id="noTickets">Aucune ticket dans les alentours!</div>
        <div class="row-cust" id="tickets">
            <!-- Généré par JS -->
        </div>
        <div id="fullImage" class="fullImage" onclick="closeImage()" style="display: none">
            <img src="" id="fullImageSrc" />
        </div>
        <div id="spacer" class="mb-24">
        <div id="footer" style="position: fixed;bottom: 0;left:0;right:0;width: 100%;background: white;padding:10px;border-top:2px solid #63c76a;
-webkit-box-shadow: 0px -2px 14px -9px rgba(0,0,0,0.75);
-moz-box-shadow: 0px -2px 14px -9px rgba(0,0,0,0.75);
box-shadow: 0px -2px 14px -9px rgba(0,0,0,0.75);">
            <a href="createTicketModel.php" style="padding: 5px 10px; width: 100%;background: #63c76a;color: white;display: block;text-align: center">
                Créer un ticket
            </a>
            <a href="myTicketsModel.php" style="padding: 5px 10px; width: 100%;background: #2980b9;color: white;display: block;text-align: center;margin-top: 5px">
                Mes tickets
            </a>
        </div>
    </div>
</body>
<?php
if(isset($errorReport) && $errorReport == true){
    echo '<script>
            Toastify({
                text: "Ticket déjà signalé",
                backgroundColor: "linear-gradient(to right, #f90c1c, #f31818)",
                className: "error",
                duration: 2000,
                close: true,
                }).showToast();
            </script>';
}else if(isset($errorReport) && $errorReport == false){
    echo '<script>
            Toastify({
                text: "Ticket signalé",
                backgroundColor: "linear-gradient(to right, #0071bb, #4a9ace)",
                className: "success",
                duration: 2000,
                close: true,
                }).showToast();
            </script>';
}
?>

<!-- JQuery Script -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script rel="script">
    var user_id = <?= $_SESSION['idUser'] ?>;
    // If user signed up before, fill
    var url = new URL(window.location.href);
    var sent = url.searchParams.get("sent");
    if(sent){
        Toastify({
            text: "Ticket envoyé",
            backgroundColor: "linear-gradient(to right, #0071bb, #4a9ace)",
            className: "success",
            gravity: "top",
            duration: 2000,
            close: true,
        }).showToast();
    }

    jQuery(function ($){
        $(document).ready(function() {
            $('#fullImage').css('display', 'none');
            // Check if body height is higher than window height :)
            $(window).resize(function () {
                calculHeight();
            })
            calculHeight();
            $('#tickets').on('click', '.btn-report', function(e){
                console.log('vote !');
            })
            $('#tickets').on('click', '.btn-vote', function(e){
                console.log('vote !');
            })
            refreshTickets();
        });
        function calculHeight() {
            if ($("body").height() > $(window).height()) {
                var heightFooter = $('#footer').height();
                heightFooter += 30;
                $('#spacer').css('margin-top', heightFooter+'px')
            } else {
                $('#spacer').css('margin-top', '0')
            }
        }
    });
    function openImage(url) {
        jQuery('#fullImageSrc').attr('src', url);
        jQuery('#fullImage').css('display', 'block');
    }
    function closeImage() {
        jQuery('#fullImage').css('display', 'none');
    }
    function refreshTickets() {
        var coordsTest = { long: -1.548970890971788, lat: 47.19398987251469 }; // A utiliser lors des tests
        window.navigator.geolocation.getCurrentPosition(successCallback, console.log);
        function successCallback(cb){
            var coordsUser = { long: cb.coords.longitude, lat: cb.coords.latitude };
            jQuery.ajax({
                type: "post",
                url: "../controller/getTicketsProximity.php",
                data: coordsUser,
                success: function(data) {
                    const elem = $("#tickets");
                    elem.empty();
                    data = JSON.parse(data);
                    if (data.length === 0) {
                        // TODO : Afficher un message à l'utilisateur
                        jQuery('#noTickets').show();
                    }
                    for (var k in data) {
                        jQuery('#noTickets').hide();
                        const v = data[k];
                        var imgSrc = '';
                        if (v['nbImg'] > 2) {
                            v['nbImg'] = 2; // On veut afficher que deux images
                        }
                        for(var i = 0; i < v['nbImg']; i++) {
                            var src = v['data'] + i + '.jpg';
                            imgSrc += `<img onclick="openImage('${src}')" src="${src}" alt="" class="object-cover" style="max-width: 150px;max-height: 150px;height: 150px;width: 150px; display: inline-block" />`;
                        }
                        var color_plus_one = 'black';
                        if (v['voted']) {
                            color_plus_one = '#27ae60';
                        }
                        elem.append(`<div class="column" style="background:white">
                    <div style="padding:10px">
                        <div class="flex flex-row items-center mt-2 mx-2 w-full">
                            <p class="font-semibold w-full text-center ml-6" >${v['cat_sentence']}</p>
                            <p class="mr-2" style="color: #63c76a">+${v['upvotes']}</p>
                        </div>
                        <p style="text-align: center;font-size: 14px">${v['sub_sentence']}</p>
                        <div style="text-align: center;margin-top: 10px">
                            ${imgSrc}
                        </div>
                    </div>
                    <div style="width: 100%;height:1px;background: rgba(0,0,0,0.5)"></div>
                    <div style="padding: 10px">
<form action="" method="post">
                        <input type="hidden" name="ticketId" value="${v['id']}">
                        <div style="float: left">
                            <button onclick="openPopup(${v['id']})" type="button" name="report" class="btn-report"><span class="material-icons" style="vertical-align: middle;color:#f90c1c">flag</span></button>
                        </div>
                        <div style="float: right">
                            <button name="vote" class="btn-vote"><span class="material-icons" style="vertical-align: middle;color:${color_plus_one}">exposure_plus_1</span></button>
                        </div>
</form>
                        <div style="clear:both"></div>
                    </div>
                </div>`);
                    }
                }
            })
        }
    }
</script>
</html>

