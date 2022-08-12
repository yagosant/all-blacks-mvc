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



    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World !');

    $writer = new Xlsx($spreadsheet);
    $writer->save('hello world.xlsx');

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
      'documento'=> $lista_array[$key]['documento'],
      'nome'=> $lista_array[$key]['nome'],
      'email'=> $lista_array[$key]['email'],
      'cep'=> $lista_array[$key]['cep'],
      'endereco'=> $lista_array[$key]['endereco'],
      'bairro'=> $lista_array[$key]['bairro'],
      'cidade'=> $lista_array[$key]['cidade'],
      'uf'=> $lista_array[$key]['uf'],
      'ativo'=> $lista_array[$key]['ativo']
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
      'table'=>self::getTable(),
      'content' => $content
    ]);

   }
}