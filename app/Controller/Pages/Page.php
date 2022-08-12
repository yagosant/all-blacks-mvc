<?php

namespace App\Controller\Pages;

use App\Model\Torcedor;
use \App\Utils\View;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


/**
 * metodo responsvel por retornar o conteudo do site
 * @return string
 */
class Page{
  
    /**
   * metodo responsvel por renderizr o Header
   * @return string
   */
    private static function getHeader(){
      return View::render('pages/header',[
        'name'=>'All Blacks - Teste Yago'
      ]);
    }
  
    /**
   * metodo responsvel por renderizr o footer
   * @return string
   */
    private static function getFooter(){
      return View::render('pages/footer');
    }

       /**
   * metodo responsvel por renderizr o xml
   * @return string
   */
  public static function getXml(){
    return View::render('pages/xml');
  }

     /**
   * metodo responsvel por renderizr o xml
   * @return string
   */
  public static function getXls(){

    return View::render('pages/xls');
  }

       /**
   * metodo responsvel por renderizr o Table
   * @return string
   */
  public static function getTable(){

    $torcedor = new Torcedor();
  
    $listas = $torcedor->getTorcedor();

     $lista_array = [];
    foreach ($listas as $key => $lista) { 
      array_push($lista_array,array(
          'documento'=>$lista['DOCUMENTO'],       
          'nome'=>$lista['NOME'],       
          'email'=>$lista['EMAIL'],       
          'cep'=>$lista['CEP'],       
          'endereco'=>$lista['ENDERECO'],       
          'bairro'=>$lista['BAIRRO'],       
          'cidade'=>$lista['CIDADE'],       
          'uf'=>$lista['UF'],       
          'ativo'=>$lista['ATIVO'],         
      ));
  
}
  //var_dump($lista_array[$key]['documento']);exit;

     return View::render('pages/table',
    [
      /* 'documento'=> $lista_array['documento'],
       'nome'=> $lista_array['nome'],
      'email'=> $lista_array['email'],
      'cep'=> $lista_array['cep'],
      'endereco'=> $lista_array['endereco'],
      'bairro'=> $lista_array['bairro'],
      'cidade'=> $lista_array['cidade'],
      'uf'=> $lista_array['uf'],
      'ativo'=> $lista_array['ativo']  */
    ]); 
  }
  /**
 * metodo responsvel por renderizr o conteudo XML
 * @return string
 */
   public static function getPage($title, $content){

    return View::render('pages/page', [
      'title'=>$title,
      'header'=>self::getHeader(),
      'footer'=>self::getFooter(),
      'xml'=>self::getXml(),
      'xls'=>self::getXls(),
      'table'=>self::getTable(),
      'content' => $content
    ]);

   }
}