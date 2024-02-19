<?php

class Laporan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('masuk') != TRUE) {
      $url=base_url('admin');
      // $url=base_url('Login/auth');
    };
    $this->load->model('m_tamu');
    $this->load->library('upload');
    $this->load->helper('url');
    $this->load->library('pagination');
  }

  function index()
  {
    $this->load->view('include/v_head');
    $this->load->view('laporan/v_laporan');
  }

  function filterByTanggal()
  {
    $dari_tgl = $this->input->post('dari_tgl');
    $ke_tgl = $this->input->post('ke_tgl');

    if ($dari_tgl && $ke_tgl) {
      $data = $this->m_tamu->filterTamuByTanggal($dari_tgl, $ke_tgl)->result();
      echo json_encode($data);
    } else {
      echo json_encode(['error' => 'Pilih tanggal terlebih dahulu']);
    }
  }

  function to_excel()
  {
    include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

    $excel = new PHPExcel();

    $excel->getProperties()
      ->setCreator('SMK 2 SUMEDANG')
      ->setTitle("Laporan Daftar Tamu");

    $style_col = array(
      'font' => array('bold' => true),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
      )
    );

    $style_row = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
      )
    );

    $style_center = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
      )
    );

    $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DAFTAR TAMU");
    $excel->getActiveSheet()->mergeCells('A1:J1');
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "WAKTU DATANG");
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "FOTO");
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "NAMA");
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "JENIS KELAMIN");
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "ALAMAT");
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "NO HP");
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "KEPERLUAN");
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "TUJUAN KE");
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "ID KARTU");

    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);

    $dari_tgl = $this->input->get('dari_tgl');
    $ke_tgl = $this->input->get('ke_tgl');

    $tamu['tamu'] = $this->m_tamu->filterTamuByTanggal($dari_tgl, $ke_tgl)->result();

    $no = 1;
    $numrow = 4;

    foreach ($tamu['tamu'] as $data) {
      $drawing = new PHPExcel_Worksheet_MemoryDrawing();
      $foto = imagecreatefromjpeg(base_url('assets/images/foto_tamu/') . $data->photo);
      $drawing->setImageResource($foto);
      $drawing->setOffsetX(8);
      $drawing->setOffsetY(8);
      $drawing->setCoordinates('C' . $numrow);
      $drawing->setHeight(40);
      $drawing->setWorksheet($excel->getActiveSheet());

      $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->tgl_datang);
      $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->nama);
      $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->jenkel == 'L' ? 'Laki-laki' : 'Perempuan');
      $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->alamat);
      $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->no_hp);
      $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->keperluan);
      $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->tujuan . ' - ' . $data->namatujuan);
      $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->serial_kartu);

      $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_center);
      $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_center);
      $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_center);
      $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);

      $no++;
      $numrow++;
    }

    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(50);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);

    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(40);
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    $excel->getActiveSheet(0)->setTitle("Laporan Daftar Tamu");
    $excel->setActiveSheetIndex(0);
    
    $date = new DateTime();
    $formatDate = $date->format('d-m-Y');
    $fileName = 'laporan-daftar-tamu' . '_' . $formatDate . '_' . rand();

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $fileName . '.xlsx"');
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}
