<?php

namespace App\Controller\Pages;

use App\Model\Torcedor;
use \App\Utils\View;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Cell\DataType as CellDataType;

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

      if (isset($_POST['buttonExport'])) {

         $dados = $torcedor->getTorcedor();

         $spreadsheet = new Spreadsheet();
         $sheet = $spreadsheet->getActiveSheet(0);
         $colunas = array();
        
            for ($col = 'A'; $col < 'K'; $col++) $colunas[] = $col;
        
            $cabecalho = array('DOCUMENTO', 'NOME', 'TELEFONE', 'EMAIL', 'CEP', 'ENDERECO', 'BAIRRO', 'CIDADE', 'UF','ATIVO');

            foreach ($colunas as $key => $col) {
               switch ($col) {
                   case 'A':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'B':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'C':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'D':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'E':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'F':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'G':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'H':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'I':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'J':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'K':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   case 'L':
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                       break;
                   default:
                       $spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                       break;
               }

               $sheet->setCellValueExplicit($col . '3', $cabecalho[$key], CellDataType::TYPE_STRING)->getColumnDimension($col)->setAutoSize(true);

               $styleArrayCabeçalho = [
                  'font' => [
                      'bold'  => true,
                      'color' => array('rgb' => COR_FONT_CABECALHO),
                      'size'  => 15
                  ],
                  'alignment' => [
                      'horizontal' => Alignment::HORIZONTAL_CENTER,
                      'vertical' => Alignment::VERTICAL_CENTER
                  ]
              ];
  
              $styleArrayLinha = [
                  'font' => [
                      'bold'  => true,
                      'color' => array('rgb' => COR_FONT_LINHA),
                      'size'  => 12
                  ],
                  'alignment' => [
                      'horizontal' => Alignment::HORIZONTAL_CENTER,
                      'vertical' => Alignment::VERTICAL_CENTER
                  ]
              ];

              $cor_xls_titulo = COR_BASE_TITULO;
              $cor_xls_linha = COR_BASE_LINHA;
              $titulo = 'Relatório Lista de Torcedores';
            }  

        $sheet->setCellValue('A1', $titulo)->mergeCells('A1:J1')->getRowDimension(1)->setRowHeight(40);
        $sheet->getStyle('A1')->applyFromArray($styleArrayCabeçalho);
        $sheet->getStyle('A2')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('B2')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('C2')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('D2')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('E2')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('F2')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('G2')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('H2')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('I2')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('J2')->applyFromArray($styleArrayLinha);;
        $sheet->getStyle('A3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('B3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('C3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('D3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('E3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('F3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('G3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('H3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('I3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('J3')->applyFromArray($styleArrayLinha);
        $sheet->getStyle('A1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_titulo);
        $sheet->getStyle('A2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('B2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('C2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('D2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('E2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('F2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('G2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('H2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('I2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('J2')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('A3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('B3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('C3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('D3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('E3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('F3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('G3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('H3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('I3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);
        $sheet->getStyle('J3')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($cor_xls_linha);

        $spreadsheet->getActiveSheet(0)->setCellValue('A1', $titulo)->getColumnDimension('A')->setAutoSize(true);

        $row = 4;
        foreach ($dados as $value) {
            $sheet->setCellValueExplicit('A' . $row, !empty($value['DOCUMENTO']) ? $value['DOCUMENTO'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('A')->setAutoSize(true);
            $sheet->setCellValueExplicit('B' . $row, !empty($value['NOME']) ?   $value['NOME'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('B')->setAutoSize(true);
            $sheet->setCellValueExplicit('C' . $row, !empty($value['TELEFONE']) ? $value['TELEFONE'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('C')->setAutoSize(true);            
            $sheet->setCellValueExplicit('D' . $row, !empty($value['EMAIL']) ? $value['EMAIL'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('D')->setAutoSize(true);            
            $sheet->setCellValueExplicit('E' . $row, !empty($value['CEP']) ? $value['CEP'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('E')->setAutoSize(true);            
            $sheet->setCellValueExplicit('F' . $row, !empty($value['ENDERECO']) ? $value['ENDERECO'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('F')->setAutoSize(true);            
            $sheet->setCellValueExplicit('G' . $row, !empty($value['BAIRRO']) ? $value['BAIRRO'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('G')->setAutoSize(true);            
            $sheet->setCellValueExplicit('H' . $row, !empty($value['CIDADE']) ? $value['CIDADE'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('H')->setAutoSize(true);            
            $sheet->setCellValueExplicit('I' . $row, !empty($value['UF']) ? $value['UF'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('I')->setAutoSize(true);            
            $sheet->setCellValueExplicit('J' . $row, !empty($value['ATIVO']) ? $value['ATIVO'] : "-----", CellDataType::TYPE_STRING)->getColumnDimension('J')->setAutoSize(true);            
            $row++;
        }
        

         $fileName = 'torcedores.xls';

         $writer = new Xlsx($spreadsheet);
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment; filename="' . urlencode($fileName) . '"');
         $writer->save('php://output');
         exit();  

        }
      
      
  $content = View::render('pages/home');

    //retorna a view da paina
    return parent::getPage('All Blacks', $content);

   }
}