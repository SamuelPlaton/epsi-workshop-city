<!DOCTYPE html>
<html>
    <head>
        <!-- Title -->
        <title>Poster un ticket - City+</title>

        <?php include('components/links.php')?>
    </head>
    <body>
        <?php include('components/header.php')?>
        <form id="post-ticket-form" action="" method="post" enctype="multipart/form-data" class="m-5 w-2/3 lg:w-1/2 mx-auto">
            <div class="form-group flex flex-col my-2">
                <label for="title" class="form-control-label text-lg mb-2">Sujet</label>
                <input type="text" id="title" name="title" placeholder="Entrez le sujet du ticket..." class="form-control w-2/3 lg:w-1/3 border-solid border-2 border-gray rounded-lg p-1" required>
            </div>
            <div class="form-group flex flex-col my-2">
                <label for="description" class=" form-control-label text-lg mb-2">Description</label>
                <textarea name="description" id="description" rows="3" placeholder="Entrez une description..." class="form-control w-2/3 border-solid border-2 border-gray rounded-lg p-1"></textarea>
            </div>
            <div class="form-group flex flex-col my-2">
                <label for="category" class=" form-control-label text-lg mb-2">Sélectionnez une catégorie</label>
                <select name="category" id="category" class="form-control w-2/3 lg:w-1/3 border-solid border-2 border-gray rounded-lg p-1" required>
                    <option value="0">Catégorie #0</option>
                    <option value="1">Catégorie #1</option>
                    <option value="2">Catégorie #2</option>
                    <option value="3">Catégorie #3</option>
                </select>
                </div>
            </div>
            <div class="form-group flex flex-col my-2">
                <label for="subcategory" class=" form-control-label text-lg mb-2">Sélectionnez une sous-catégorie</label>
                <select name="subcategory" id="subcategory" class="form-control w-2/3 lg:w-1/3 border-solid border-2 border-gray rounded-lg p-1" required>
                    <option value="0">Catégorie #0</option>
                    <option value="1">Catégorie #1</option>
                    <option value="2">Catégorie #2</option>
                    <option value="3">Catégorie #3</option>
                </select>
            </div>
            <div class="form-group flex flex-col my-2">
                <label for="file-multiple-input" class=" form-control-label text-lg mb-2">Ajoutez jusqu'à 5 images</label>
                <input type="file" accept="image/*" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file" capture>
            </div>
            <div class="form-group flex flex-col my-2">
                <label for="inline-checkbox1" class="form-check-label ">
                    <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input" required>
                    En cochant cette case, je certifie sur l'honneur la véracité de mes propos et j'accepte de fournir mes coordonnées GPS.
                </label>
            </div>
            <div class="text-center mt-5">
                <button id="submit-button" type="submit" class="text-white py-2 px-4 rounded w-50 m-auto text-lg">
                    Poster le ticket
                </button>
            </div>
        </form>
    </body>
</html>

