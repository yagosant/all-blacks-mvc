<?php

namespace App\Controller\Pages;

use App\Model\Torcedor;
use \App\Utils\View;
/**
 * metodo responsvel por retornar o conteudo do site
 * @return string
 */
class Home extends Page{

   public static function getHome(){
      $torcedor = new Torcedor();
      if (isset($_POST['buttonImport'])) {
         copy($_FILES['xmlFile']['tmp_name'], 'data/' . $_FILES['xmlFile']['name']);
        $torcedores = simplexml_load_file('data/' . $_FILES['xmlFile']['name']);

        foreach ($torcedores as $value) {
         $torcedor->insertTorcedor($value);
        }
      }
//retorna a view home
  $content = View::render('pages/home');

    //retorna a view da paina
    return parent::getPage('All Blacks', $content);

   }
}