<div class="container">
    <!-- CHOIX DE LA GALERIE -->
    <div class="m-3" id="titre">
        <a href="/galerie/" class="ml-4"><img class="mx-auto" src="img/home.png" alt="home" width="80px"><span class="ml-2">Toutes mes galeries</span></a>
    </div>

    <hr class="m-4">

    <!-- LISTES -->
    <form action="/galerie/update" class="m-3 row mx-auto text-center" id="formGalerie" method="post">
        <div class="col-md-5 pb-5 mx-auto ">
            <h2 class="text-white">Images disponibles</h2>
            <div id="listeImagesDispo" class="row h-100 border rounded pt-4">
                <?php foreach ($this->data["photos"] as $photo) { ?>
                    <div class="col p-0"><img src="<?php echo $photo ?>" alt="photo"></div>
                <?php } ?>
            </div>
        </div>
        <?php $length = count((array) $this->data["galerie"][0]->photos) ?>
        <div class="col-md-5 pb-5 mx-auto">
            <h2 class="text-white"><?php echo $this->data["galerie"][0]->titre ?></h2>
            <div id="listeImagesGalerie" class="row h-100 border rounded pt-4">
            <?php if ($length != 0) : ?>
                <?php foreach ($this->data["galerie"][0]->photos as $photo) { ?>
                    <div class="col p-0"><img src="<?php echo $photo ?>" alt="photo"></div>
                <?php } ?>
            <?php endif ?>
            </div>
        </div>

        <input class="d-none" name="idGalerie" type="text" value="<?php echo $this->data["galerie"][0]->_id ?>">

        <button class="btn btn-primary btn-block mt-5"><i class="fa fa-save" aria-hidden="true"></i> Enregistrer les modifications</button>

    </form>

    <hr class="m-4">

    <!-- CAROUSEL -->
    <div>
        <?php if ($length == 0) : ?>
            <p class='mt-5 h1 text-white'>Aucune image trouvée dans cette galerie</p>
        <?php else : ?>
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < $length; $i++) { ?>

                        <li data-target="#carousel" data-slide-to="<?php echo $i ?>" class="active"></li>

                    <?php } ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($this->data["galerie"][0]->photos as $photo => $url) { ?>

                        <div class="carousel-item <?php echo ($photo == 0) ? "active" : "" ?>">
                            <img src="<?php echo "$url" ?>" class="d-block w-100" alt="">
                        </div>

                    <?php } ?>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <?php endif ?>
    </div>
</div>

<script src="js/galerie.js"></script>