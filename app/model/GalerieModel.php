<?php

/**
 * Gère les interaction avec la base de données
 */
class GalerieModel
{

    public static function creerGalerie()
    {
        try {
            $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017"); // Connexion à MongoDB
            // Hydratation de l'objet
            $galerie = array(
                'titre' => $_POST["titre"],
                'photos' => []
            );
            // Connexion à la base de données "test"
            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk->insert($galerie);
            // Création d'une nouvel objet de la collection "users"
            $manager->executeBulkWrite('galerie.galeries', $bulk);
            return true;
        } catch (\MongoDB\Driver\Exception\BulkWriteException $e) {
            echo $e->getMessage();
        }
    }

    public static function getAllGaleries()
    {
        try { // Connexion à MongoDB
            $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            // Hydratation de l'objet
            $filter = [];
            $read = new MongoDB\Driver\Query($filter);
            $result = $manager->executeQuery('galerie.galeries', $read);
            $galeries = array();
            foreach ($result as $galerie) {
                array_push($galeries, $galerie);
            }
            return $galeries;
        } catch (\MongoDB\Driver\Exception\BulkWriteException $e) {
            echo $e->getMessage();
        }
    }

    public static function getGalerie($id)
    {
        try { // Connexion à MongoDB
            $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            // Hydratation de l'objet
            $id = new \MongoDB\BSON\ObjectId($id); // Cast car c'est _id de l'object mongodb
            $filter = ['_id' => $id]; // titre de la galerie
            $read = new MongoDB\Driver\Query($filter);
            $result = $manager->executeQuery('galerie.galeries', $read);
            $galeries = array();
            foreach ($result as $galerie) {
                array_push($galeries, $galerie);
            }
            return $galeries;
        } catch (\MongoDB\Driver\Exception\BulkWriteException $e) {
            echo $e->getMessage();
        }
    }

    public static function updateGalerie()
    {
        try {
            // Connexion à MongoDB
            $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            // update
            $updates = new MongoDB\Driver\BulkWrite();
            $id = new \MongoDB\BSON\ObjectId($_POST['idGalerie']); // Cast car c'est _id de l'object mongodb
            $updates->update(
                ['_id' => $id],
                ['$set' => ['photos' => $_POST['photos']]],
                ['multi' => true, 'upsert' => true]
            );
            $manager->executeBulkWrite('galerie.galeries', $updates);
        } catch (\MongoDB\Driver\Exception\BulkWriteException $e) {
            echo $e->getMessage();
        }
    }

    public static function ajouterPhotos()
    {
        if (!empty($_FILES)) {
            $errors = array();
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_type = $_FILES['file']['type'];

            $explode = explode(".", $_FILES["file"]["name"]);
            $file_ext = end($explode);

            $expensions = array("jpeg", "jpg", "png", "gif");

            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }

            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }

            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . "/galerie/photos/" . $file_name);
                echo "Success";
            } else {
                print_r($errors);
            }
        }
    }
}
