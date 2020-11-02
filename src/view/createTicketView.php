<!DOCTYPE html>
<html>
    <head>
        <!-- Title -->
        <title>Poster un ticket - City+</title>

        <?php include('components/links.php')?>
    </head>
    <body>
        <?php include('components/header.php')?>
        <form action="" method="post" enctype="multipart/form-data" class="m-5">
            <div class="form-group">
                <div class="col col-md-3">
                    <label for="title" class=" form-control-label ">Sujet</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="title" name="title" placeholder="Entrez le sujet du ticket..." class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col col-md-3">
                    <label for="description" class=" form-control-label">Description</label>
                </div>
                <div class="col-12 col-md-9">
                    <textarea name="description" id="description" rows="3" placeholder="Entrez une description..." class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col col-md-3">
                    <label for="category" class=" form-control-label">Sélectionnez une catégorie</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="category" id="category" class="form-control" required>
                        <option value="0">Catégorie #0</option>
                        <option value="1">Catégorie #1</option>
                        <option value="2">Catégorie #2</option>
                        <option value="3">Catégorie #3</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col col-md-3">
                    <label for="subcategory" class=" form-control-label">Sélectionnez une sous-catégorie</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="subcategory" id="subcategory" class="form-control" required>
                        <option value="0">Catégorie #0</option>
                        <option value="1">Catégorie #1</option>
                        <option value="2">Catégorie #2</option>
                        <option value="3">Catégorie #3</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-checkbox1" class="form-check-label ">
                            <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1" value="option1" class="form-check-input" required>
                            En cochant cette case, je certifie sur l'honneur la véracité de mes propos et j'accepte de fournir mes coordonnées GPS.
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col col-md-3">
                    <label for="file-multiple-input" class=" form-control-label">Ajoutez jusqu'à 5 images</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="file" accept="image/*" id="file-multiple-input" name="file-multiple-input" multiple="" class="form-control-file" capture>
                </div>
            </div>
            <button id="submit-button" type="submit" class="au-btn au-btn--green btn-block w-50 m-auto">
                <span id="submit-button">Poster le ticket</span>
                <span id="submit-button-sending" style="display:none;">En cours d'envoi</span>
            </button>
        </form>
    </body>
</html>

