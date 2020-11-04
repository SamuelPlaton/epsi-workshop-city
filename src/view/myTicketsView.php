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
if($pendingTicketsCount > 0){
    echo '<h1 class="mt-5 mx-5 font-semibold"> Tickets en cours ('.$pendingTicketsCount.')</h1>';
}
?>
<div class="content flex flex-row flex-wrap justify-center">
    <?php foreach ($userTickets as $key => $ticket) {
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
    <?php foreach ($userSolvedTickets as $key => $ticket) {
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
            </div>
        </div>
    ';}?>
</div>
</body>

</html>

