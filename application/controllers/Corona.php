<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Corona extends CI_Controller

{
    function __construct(){

      parent::__construct();
      $this->load->library('form_validation');
	    $this->load->library('session');
      $this->load->model('model_corona');
      $this->load->library('Pdf');
      
   }
 
    public function index()
    {
      $data['stat']= $this->model_corona->penduduk(); 
      $this->load->view('halaman/tampilan',$data);

    }
    public function tampilan()
	{
	  $data['stat']= $this->model_corona->penduduk(); 
      $this->load->view('halaman/tampilan',$data);

	}

    public function tabel()
	{
		$data = array(
			'isi'=> $this->model_corona->retrive(),
		);
		$this->load->view('halaman/tabel', $data);
	}

	public function register()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
	    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
	    $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
	    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE){
            $this->load->view('/halaman/register');

        } else {
        	// Encrypt password
	        $enc_password = md5($this->input->post('password'));

	        $this->model_corona->register($enc_password);
	        redirect('Corona/dashboard');
   	    }
   	    
	}

	public function dashboard()
	{
		$this->load->view('/halaman/dashboard');

	}
	public function login()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	    $this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE){

            $this->load->view('/halaman/login');

        }else {

        	$this->load->view('halaman/dashboard');
        }        
    }

    public function user_tambahdata()
    {
      $data = array(
      'isi'=> $this->model_corona->retrive(),
    );
    	$this->load->view('halaman/tambahdata',$data);
    }


    public function user_chart()
    {
      $data['stat']= $this->model_corona->penduduk(); 
      $this->load->view('halaman/chartuser',$data);
    }


    public function tambah()
	{

		$this->load->view('halaman/tambahdata_box');
  	}

  	
  	public function simpan()
  	{
  		$data = array(
  			'nama_kecamatan' => $this->input->post('nama_kecamatan')
  			,'jumlah_OTG' => $this->input->post('jumlah_OTG')
  			,'jumlah_PP' => $this->input->post('jumlah_PP')
  			,'jumlah_PDP' => $this->input->post('jumlah_PDP')
  			,'jumlah_ODP' => $this->input->post('jumlah_ODP')
  			,'jumlah_positif' => $this->input->post('jumlah_positif')

  		);
  		$this->model_corona->simpan_data($data);
  	}

     

  	public function ubah()
    {
      $id_kecamatan = $this->uri->segment(3);
      $q = $this->model_corona->getRow($id_kecamatan);
      $data = array(
        'id_kecamatan' => $q->row('id_kecamatan'),
        'nama_kecamatan' => $q->row('nama_kecamatan'),
        'jumlah_OTG' => $q->row('jumlah_OTG'),
        'jumlah_PP' => $q->row('jumlah_PP'),
        'jumlah_PDP' => $q->row('jumlah_PDP'),
        'jumlah_ODP' => $q->row('jumlah_ODP'),
        'jumlah_positif' => $q->row('jumlah_positif'),

      );

      $this->load->view('halaman/editdata', $data);

    }

    public function ubah_aksi()
    {

      $this->model_corona->update_data();
    }

    public function hapus() 
  	{ 
    	$id_kecamatan = $this->uri->segment(3);
      $q = $this->db->where('id_kecamatan', $id_kecamatan)->delete('data_penduduk');
      redirect('Corona/user_tambahdata');
     
  	}
    public function pdf()
    {
        $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'DATA COVID-19 DI JEPARA',0,1,'C');
        $pdf->Cell(16,7,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(30,7,'Nama Kecamatan',1,0,'C');
        $pdf->Cell(30,7,'Jumlah OTG',1,0,'C');
        $pdf->Cell(30,7,'Jumlah PP',1,0,'C');
        $pdf->Cell(30,7,'Jumlah PDP',1,0,'C');
        $pdf->Cell(30,7,'Jumlah ODP',1,0,'C');
        $pdf->Cell(30,7,'Jumlah Positif',1,1,'C');



        $pdf->SetFont('Arial','',10);

        $data_penduduk = $this->db->get('data_penduduk')->result();
        $no=0;
        foreach ($data_penduduk as $data){
          
            $pdf->Cell(30,7,$data->nama_kecamatan,1,0);
            $pdf->Cell(30,7,$data->jumlah_OTG,1,0);
            $pdf->Cell(30,7,$data->jumlah_PP,1,0);
            $pdf->Cell(30,7,$data->jumlah_PDP,1,0);
            $pdf->Cell(30,7,$data->jumlah_ODP,1,0);
            $pdf->Cell(30,7,$data->jumlah_positif,1,1);
            
        
        }
        $pdf->Output();
}


  public function import()
  {
    $fileName=$_FILES['file']['name'];

    $config = array(

      'upload_path'=>'./assets/'
      ,'allowed_types'=>'xls|xlsx|csv'
      ,'max_size'=>1000
    );
    $this->load->library('upload', $config);
    if ( ! $this->upload->do_upload('file'))
      {
        $this->upload->display_errors();
        die();
      }

      $inputFileName ='./assets/'.$fileName;

      try{

        $inputFileType= PHPExcel_IOFactory::identify();
        $objReader=PHPExcel_IOFactory::createReader();
        $objPHPExcel=$objReader->load();

      } catch(Exception $e) {
        die('error');
      }

      $sheet=$objPHPExcel->getSheet(0);
      $highestRow=$sheet->getHighestRow();
      $highestColumn=$sheet->getHighestColumn();

      for ($row=2;$row<=$highestRow;$row++){
        $rowData= $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
        $data=array(
          'id_kecamatan'=>$rowData[0][0]
          ,'nama_kecamatan'=>$rowData[0][1]
          ,'jumlah_OTG'=>$rowData[0][2]
          ,'jumlah_PP'=>$rowData[0][3]
          ,'jumlah_PDP'=>$rowData[0][4]
          ,'jumlah_ODP'=>$rowData[0][5]
          ,'jumlah_positif'=>$rowData[0][6]

        );
        $this->db->insert('data_penduduk',$data);
      }
      redirect('Corona/tambahdata');
  }


  
//tutup final
}
	