<div class="container">
    <div class="row">
        <?php if (empty($this->data["galeries"])) : ?>
            <p class='mt-5 h1 text-white'>Aucune galerie trouvée</p>
        <?php endif ?>
        <?php foreach ($this->data["galeries"] as $galerie) { ?>
            <div class="card col-md-4 mt-5 mx-auto p-0">
                <a href="/galerie/<?php echo $galerie->_id ?>"><img class="card-img-top" src="<?php echo (empty($galerie->photos)) ? "img/empty.png" : $galerie->photos[0]  ?>" alt="Card image cap"></a>
                <div class="card-body">
                    <p class="card-title h2 text-center"><?php echo $galerie->titre ?></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="mt-5">
        <button class="btn btn-outline-success btn-block text-white" id="nouvelleGalerie" data-toggle="modal" data-target="#modalGalerie"><i class="fa fa-plus" aria-hidden="true"></i> Créer une nouvelle galerie</button>
        <div class="modal fade" id="modalGalerie" tabindex="-1" role="dialog" aria-labelledby="modalModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form class="modal-content" action="/galerie/nouvelleGalerie" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalModalLabel">Nouvelle galerie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titre" class="col-form-label">Nom de la galerie :</label>
                            <input type="text" class="form-control" id="titre" name="titre" placeholder="Nom de la galerie" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-outline-success">Confimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h2 class="text-white">Ajouter de nouvelles images</h2>
        <form action="/galerie/ajouterPhotos" class="dropzone" id="awesomeDropzone">
            <div id="dropzonePreview" class="dz-default dz-message">
                <span>Glissez ou cliquez pour déposer vos images</span>
            </div>
        </form>
    </div>

</div>