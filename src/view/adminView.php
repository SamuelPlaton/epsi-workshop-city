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
<!-- Toastify Script -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php include('components/header.php')?>
<?php
if($pendingTicketsCount > 0){
    echo '<h1 class="mt-5 mx-5 font-semibold"> Tickets en cours ('.$pendingTicketsCount.')</h1>';
}
?>
<div class="content flex flex-row flex-wrap justify-center">
    <?php foreach ($tickets as $key => $ticket) {
        echo
            '<div class="flex flex-col items-center bg-white rounded-lg shadow-lg m-4">
            <p class="font-semibold mt-2 mx-2"> '.$categoriesArray[$ticket['category']].'</p>
            <p class="text-sm mx-2"> '.$subCategoriesArray[$ticket['subCategory']].'</p>
            <p class="text-sm mx-2 text-gray-dark"> '.$statusArray[$ticket['status']].'</p>
            <div class="flex flex-row flex-wrap">';
        $fi = new FilesystemIterator($ticket['data'], FilesystemIterator::SKIP_DOTS);
        $filesNumber = iterator_count($fi);
        for($i = 0; $i < $filesNumber; $i++){
            echo '
                  <img src="'.$ticket["data"].$i.'.jpg" alt="ticket img" class=" w-32 h-32 m-2 object-cover shadow-lg"/>';
        }
        echo '
            </div>
            <form id="cancel-ticket" name="cancel-ticket" method="post" >
                <button type="submit" id="cancel-button" value="'.$ticket["id"].'" name="cancel-button" class="btn py-1 px-2 my-2 rounded-lg text-white" style="background-color: #ef0a23"> Annuler</button>
            </form>
        </div>
    ';}?>
</div>
<?php if($finishedTicketsCount > 0){
    echo '<h1 class="mt-5 mx-5 font-semibold"> Tickets fermés ('.$finishedTicketsCount.')</h1>';
}
?>
<div class="content flex flex-row flex-wrap justify-center">
    <?php foreach ($solvedTickets as $key => $ticket) {
        echo
            '<div class="flex flex-col items-center bg-white rounded-lg shadow-lg m-4">
            <p class="font-semibold mt-2 mx-2"> '.$categoriesArray[$ticket['category']].'</p>
            <p class="text-sm mx-2"> '.$subCategoriesArray[$ticket['subCategory']].'</p>
            <p class="text-sm mx-2 text-gray-dark"> '.$statusArray[$ticket['status']].'</p>
            <div class="flex flex-row flex-wrap">';
        $fi = new FilesystemIterator($ticket['data'], FilesystemIterator::SKIP_DOTS);
        $filesNumber = iterator_count($fi);
        for($i = 0; $i < $filesNumber; $i++){
            echo '
                  <img src="'.$ticket["data"].$i.'.jpg" alt="ticket img" class=" w-32 h-32 m-2 object-cover shadow-lg"/>';
        }
        echo '
            </div>
        </div>
    ';}?>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</html>

