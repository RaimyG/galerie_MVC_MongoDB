<?php

/**
 * Gère les r'outes' 
 */
class Router
{
   public static function analyze($query)
   {
      $result = array(
         "controller" => "Error",
         "action" => "error404",
         "params" => array()
      );

      //Par défaut, On appelle la fonction inscription du UserController
      if ($query === "" || $query === "/") {
         $result["controller"] = "Galerie";
         $result["action"] = "accueil";
      } else {
         $parts = explode("/", $query);

         // URL : /nouvelleGalerie
         if (count($parts) == 1 && $parts[0] == "nouvelleGalerie") {
            $result["controller"] = "Galerie";
            $result["action"] = "creerGalerie";
         }

         // URL : /update
         if (count($parts) == 1 && $parts[0] == "update") {
            $result["controller"] = "Galerie";
            $result["action"] = "updateGalerie";
         }

         // URL : /ajouterPhotos
         if (count($parts) == 1 && $parts[0] == "ajouterPhotos") {
            $result["controller"] = "Galerie";
            $result["action"] = "ajouterPhotos";
         }

         if (count($parts) == 1 && $parts[0] != "update" && $parts[0] != "nouvelleGalerie" && $parts[0] != "ajouterPhotos") {
            $result["controller"] = "Galerie";
            $result["action"] = "galerie";
            $result["params"][0] = $parts[0]; // On donne en parametre l'id de la galerie
         }
      }
      return $result;
   }
}
