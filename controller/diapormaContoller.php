<?php

//Why when we use DIR pb is solved?

require_once(__DIR__ . '/../model/diapormaModel.php');
require_once(__DIR__ . '/../vue/userVue/accueilVue.php');


class diapormaController {

    //Utilisation du model pour recuperer le tableau
    public function get_diaporma ()
    {
        $diap_model = new diapormaModel();
        $res = $diap_model->get_diaporma_table();
        return $res;
    }

   public function show_website()
   {
    $vue = new accueilVue();
    $vue-> show_website();

   }
}