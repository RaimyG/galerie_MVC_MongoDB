<?php

/**
 * Gère les interactions de la page d'accueil
 */
class GalerieController extends Controller
{

    public function accueil()
    {
        $galeries = GalerieModel::getAllGaleries();

        $this->view->galeries = $galeries;
        $this->view->display("home"); 
    }

    /**
     * Affiche la page d'accueil
     */
    public function galerie()
    {   
        $photos = glob("photos/*"); // Recupere les photos dans le dossier photos

        
        $id = (!empty($this->route["params"][0]))? $this->route["params"][0] : $_POST['idGalerie'];

        $galerie = GalerieModel::getGalerie($id);

        $photos = array_diff($photos, (array) $galerie[0]->photos); // Enleve les photos deja dans la galerie

        $this->view->galerie = $galerie;
        $this->view->photos = $photos;
        $this->view->display("galerie");
    }

    public function creerGalerie()
    {
        GalerieModel::creerGalerie();
        header("Location: /galerie");
    }

    public function updateGalerie()
    {
        GalerieModel::updateGalerie();
        header("Location: /galerie/".$_POST['idGalerie']);
    }

    public function ajouterPhotos()
    {
        GalerieModel::ajouterPhotos();
    }

}
