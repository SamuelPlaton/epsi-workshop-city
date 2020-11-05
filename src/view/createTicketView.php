<!DOCTYPE html>
<html>
    <head>
        <!-- Title -->
        <title>Poster un ticket - City+</title>

        <?php include('components/links.php')?>
    </head>
    <body>
        <?php include('components/header.php')?>
        <?php include('components/closeTicketsPopup.php')?>
        <form id="post-ticket-form" action="" method="post" enctype="multipart/form-data" class="m-5 lg:w-1/2 lg:mx-auto">
            <div class="form-group flex flex-col my-2">
                <label for="category" class=" form-control-label lg:text-lg mb-2">Sélectionnez une catégorie</label>
                <select onchange="openPopup()" name="category" id="category" class="form-control lg:w-1/3 border-solid border-2 border-gray rounded-lg p-1" required>
                    <?php foreach($categories as $row){
                        echo "<option value='".$row['identifier']."'>".$row['sentence']."</option>";
                    };
                    ?>
                </select>
            </div>
            <div class="form-group flex flex-col my-2">
                <label for="subcategory" class=" form-control-label lg:text-lg mb-2">Sélectionnez une sous-catégorie</label>
                <select name="subcategory" id="subcategory" class="form-control lg:w-1/3 border-solid border-2 border-gray rounded-lg p-1" required>
                    <?php foreach($subCategories as $row){
                        echo "<option value='".$row['identifier']."'>".$row['sentence']."</option>";
                    };
                    ?>
                </select>
            </div>
            <div class="form-group flex flex-col my-2">
                <label for="description" class=" form-control-label lg:text-lg mb-2">Description</label>
                <textarea name="description" id="description" rows="3" placeholder="Entrez une description..." class="form-control lg:w-2/3 border-solid border-2 border-gray rounded-lg p-1"></textarea>
            </div>
            <div class="form-group flex flex-col my-2">
                <label for="file-multiple-input[]" class=" form-control-label lg:text-lg mb-2">Ajoutez jusqu'à 5 images (10 Mo Max)</label>
                <input type="file" accept="image/*" id="file-multiple-input[]" name="file-multiple-input[]" multiple class="form-control-file" capture required>
            </div>
            <input type="text" id="positionX" name="positionX" class="hidden" required>
            <input type="text" id="positionY" name="positionY" class="hidden" required>
            <div class="text-center mt-5">
                <button id="submit-button" name="submit-button" type="submit" class="text-white py-2 px-4 rounded w-50 m-auto text-lg">
                    Poster le ticket
                </button>
            </div>
        </form>
    </body>
</html>

<script>
    function openPopup(){
        document.getElementById("tickets-close-popup").style.display = "block"; // Open popup
        const tickets = document.getElementsByClassName('ticket-close');
        for(var i = 0; i  < tickets.length; i++){ // Display none all tickets
            tickets[i].style.display = "none"
        }
        const categorySelected = document.getElementById('category').value;
        const ticketsToShow = document.getElementsByClassName(categorySelected); // Display only the category we want
        for(var i = 0; i  < ticketsToShow.length; i++){
            ticketsToShow[i].style.display = "block"
        }
    }

    // Retrieve and settle geolocations
    window.navigator.geolocation.getCurrentPosition(successCallback, console.log);
    function successCallback(data){
        document.getElementById('positionX').value = data.coords.latitude;
        document.getElementById('positionY').value = data.coords.longitude;
    }
</script>
