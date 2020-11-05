<!DOCTYPE html>
<html>
<head>
    <!-- Title -->
    <title>City+</title>

    <?php include('components/links.php')?>
</head>
<body style="background: #EFEFEF">
<!-- Toastify Script -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<?php include('components/header.php')?>
<?php
if(sizeof($tickets) > 0){
    echo '<h1 class="mt-5 mx-5 font-semibold"> Tickets en cours ('.sizeof($tickets).')</h1>';
}
?>
<div class="content flex flex-row flex-wrap justify-center">
    <?php foreach ($tickets as $key => $ticket) {
        echo
            '<div class="flex flex-col items-center bg-white rounded-lg shadow-lg m-4">
            <div class="flex flex-row items-center mt-2 mx-2 w-full">
                <p class="font-semibold w-full text-center ml-6"> '.$categoriesArray[$ticket['category']].'</p>
                <p class="mr-2" style="color: #63c76a"> +'.$upvotesArray[$ticket['id']].'</p>
            </div>
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
                </div>';
    echo '<div class="flex flex-col w-full mb-2 ml-2">
                <p class="font-semibold text-sm"> Signalements : </p>';
    if($reportsArray[$ticket['id']]['missing'] ==! 0) echo '<p class="text-xs w-full">'.$reportsArray[$ticket['id']]['missing'].ngettext(' Ticket disparu', ' Tickets disparus', $reportsArray[$ticket['id']]['missing']).'</p>';
    if($reportsArray[$ticket['id']]['abusive'] ==! 0) echo '<p class="text-xs w-full">'.$reportsArray[$ticket['id']]['abusive'].ngettext(' Ticket abusif', ' Tickets abusifs', $reportsArray[$ticket['id']]['abusive']).'</p>';
    if($reportsArray[$ticket['id']]['incorrect'] ==! 0) echo '<p class="text-xs w-full">'.$reportsArray[$ticket['id']]['incorrect'].ngettext(' Element incorrect', ' Elements incorrects', $reportsArray[$ticket['id']]['incorrect']).'</p>';
        echo '
            </div>
            <div class="flex flex-row"> 
                <form id="validate-ticket" name="validate-ticket" method="post" class="mx-1">
                    <button type="submit" id="validate-button" value="'.$ticket["id"].'" name="validate-button" class="btn py-1 px-2 my-2 rounded-lg text-white" style="background-color: #63c76a"> Valider</button>
                </form>
                <form id="cancel-ticket" name="cancel-ticket" method="post" class="mx-1">
                    <button type="submit" id="cancel-button" value="'.$ticket["id"].'" name="cancel-button" class="btn py-1 px-2 my-2 rounded-lg text-white" style="background-color: #ef0a23"> Annuler</button>
                </form>
            </div>
        </div>
    ';}?>
</div>
<?php if(sizeof($solvedTickets) > 0){
    echo '<h1 class="mt-5 mx-5 font-semibold"> Tickets fermés ('.sizeof($solvedTickets).')</h1>';
}
?>
<div class="content flex flex-row flex-wrap justify-center">
    <?php foreach ($solvedTickets as $key => $ticket) {
        echo
            '<div class="flex flex-col items-center bg-white rounded-lg shadow-lg m-4">
                <div class="flex flex-row items-center mt-2 mx-2 w-full">
                    <p class="font-semibold w-full text-center ml-6"> '.$categoriesArray[$ticket['category']].'</p>
                    <p class="mr-2" style="color: #63c76a"> +'.$upvotesArray[$ticket['id']].'</p>
                </div>
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
                </div>';
        echo '<div class="flex flex-col w-full mb-2 ml-2">
                <p class="font-semibold text-sm"> Signalements : </p>';
        if($reportsArray[$ticket['id']]['missing'] ==! 0) echo '<p class="text-xs w-full">'.$reportsArray[$ticket['id']]['missing'].ngettext(' Ticket disparu', ' Tickets disparus', $reportsArray[$ticket['id']]['missing']).'</p>';
        if($reportsArray[$ticket['id']]['abusive'] ==! 0) echo '<p class="text-xs w-full">'.$reportsArray[$ticket['id']]['abusive'].ngettext(' Ticket abusif', ' Tickets abusifs', $reportsArray[$ticket['id']]['abusive']).'</p>';
        if($reportsArray[$ticket['id']]['incorrect'] ==! 0) echo '<p class="text-xs w-full">'.$reportsArray[$ticket['id']]['incorrect'].ngettext(' Element incorrect', ' Elements incorrects', $reportsArray[$ticket['id']]['incorrect']).'</p>';
        echo'
            </div>
        </div>
    ';}?>
</div>

<script rel="script">
    var user_id = <?= $_SESSION['idUser'] ?>;

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
                    }
                    for (var k in data) {
                        const v = data[k];
                        var imgSrc = '';
                        for(var i = 0; i < v['nbImg']; i++) {
                            var src = v['data'] + i + '.jpg';
                            imgSrc += `<img onclick="openImage('${src}')" src="${src}" alt="" style="max-width: 150px;max-height: 150px;height: 150px;width: 150px; display: inline-block" />`;
                        }
                        elem.append(`<div class="column" style="background:white">
                    <div style="padding:10px">
                        <p style="text-align: center;font-size: 16px;font-weight: bold">${v['cat_sentence']}</p>
                        <p style="text-align: center;font-size: 14px">${v['sub_sentence']}</p>
                        <div style="text-align: center;margin-top: 10px">
                            ${imgSrc}
                        </div>
                    </div>
                    <div style="width: 100%;height:1px;background: rgba(0,0,0,0.5)"></div>
                    <div style="padding: 10px">
                        <div style="float: left">
                            <button class="btn-report"><span class="material-icons" style="vertical-align: middle;color:#f90c1c">flag</span></button>
                        </div>
                        <div style="float: right">
                            <button class="btn-vote"><span class="material-icons" style="vertical-align: middle;color:black">exposure_plus_1</span></button>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>`);
                    }
                }
            })
        }
    }
</script>

</body>
</html>

