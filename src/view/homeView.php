<?php
$tickets = [
        [ 'nature' => 'Sécurité routière', 'probleme' => 'Nid-de-poule', 'imgs' => [ 'https://ste-foytoyota.com/wp-content/uploads/2017/05/4917.jpg' ] ],
        [ 'nature' => 'Végétal', 'probleme' => 'Plante morte', 'imgs' => [ 'https://astucesdegrandmere.net/wp-content/uploads/2018/11/plantes-fan%C3%A9es-mortes.png' ] ],
        [ 'nature' => 'Transport', 'probleme' => 'Abribus vandalisé', 'imgs' => [ 'https://cdn-s-www.leprogres.fr/images/82727D23-9236-4A1F-8694-A2BA802883B9/NW_raw/l-abribus-avenue-de-montlouis-a-ete-vandalise-photo-progres-virginie-founes-1584625106.jpg' ] ],
        [ 'nature' => 'Mobilier urbain', 'probleme' => 'Banc tagué', 'imgs' => [ 'https://www.bancspublics.net/images/banc_tag/tag_paris/banc-graffiti_paris_borddeseine_r11.jpg' ] ],
]
?>
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
	<?php include('components/header.php')?>
    <div class="content">
        <div class="title">Tickets à proximité (50m)</div>
        <div class="row-cust">
            <?php foreach ($tickets as $ticket) { ?>
                <div class="column" style="background:white">
                    <div style="padding:10px">
                        <p><b>Nature</b>: <?= $ticket['nature'] ?></p>
                        <p><b>Problème</b>: <?= $ticket['probleme'] ?></p>
                        <div style="text-align: center;margin-top: 10px">
	                        <?php foreach ($ticket['imgs'] as $img) { ?>
                                  <img onclick="openImage('<?= $img ?>')" src="<?= $img ?>" alt="" style="max-width: 150px;max-height: 150px;height: 150px;width: 150px; display: inline-block" />
	                        <?php } ?>
                        </div>
                    </div>
                    <div style="width: 100%;height:1px;background: rgba(0,0,0,0.5)"></div>
                    <div style="padding: 10px">
                        <div style="float: left">
                            <button><span class="material-icons" style="vertical-align: middle">flag</span></button>
                        </div>
                        <div style="float: right">
                            <button style="margin-right: 10px"><span class="material-icons" style="vertical-align: middle;">thumb_down</span></button>
                            <button><span class="material-icons" style="vertical-align: middle">thumb_up</span></button>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div id="fullImage" class="fullImage" onclick="closeImage()" style="display: none">
            <img src="" id="fullImageSrc" />
        </div>
        <div id="spacer" style="margin-top: 0">
        <div id="footer" style="position: fixed;bottom: 0;left:0;right:0;width: 100%;background: white;padding:10px;border-top:2px solid #63c76a;
-webkit-box-shadow: 0px -2px 14px -9px rgba(0,0,0,0.75);
-moz-box-shadow: 0px -2px 14px -9px rgba(0,0,0,0.75);
box-shadow: 0px -2px 14px -9px rgba(0,0,0,0.75);">
            <a href="#" style="padding: 5px 10px; width: 100%;background: #63c76a;color: white;display: block;text-align: center">
                Créer un ticket
            </a>
            <a href="#" style="padding: 5px 10px; width: 100%;background: #2980b9;color: white;display: block;text-align: center;margin-top: 5px">
                Mes tickets
            </a>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script rel="script">
    jQuery(function ($){
        $(document).ready(function() {
            $('#fullImage').css('display', 'none');
            // Check if body height is higher than window height :)
            $(window).resize(function () {
                calculHeight();
            })
            calculHeight();
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
</script>
</html>

