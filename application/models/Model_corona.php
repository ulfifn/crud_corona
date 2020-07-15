<?php 

class Model_corona extends CI_Model{

	 public function penduduk()
	 {
	 	$query = $this->db->query("select * from data_penduduk");
	 	$hasil = $query->result();
	 	$query->free_result();
	 	return $hasil;
	 }
	  
	  public function getpenduduk()
	  {
	  	$this->db->select('nama_kecamatan, jumlah_ODP, jumlah_PDP, jumlah_positif,tanggal_update');
	  	$query = $this->db->get('data_penduduk');
	  	$hasil = $query->result();
	  	$query->free_result();
	  	return $hasil;
	  }
	  public function retrive()
	{
		$this->db->select('id_kecamatan,nama_kecamatan,jumlah_OTG,jumlah_PP,jumlah_PDP,jumlah_ODP,jumlah_positif');
		$this->db->from("data_penduduk");
		$q = $this->db->get();
		if ($q->num_rows()>0) {

			$hasil = $q->result_array();
		}else{
			$hasil = array();
		} 

		$q->free_result();
		return $hasil;
	}
	public function register($enc_password){
   // User data array
	   $data = array(
	    'nama' => htmlspecialchars($this->input->post('nama',true)),
	    'email' => htmlspecialchars($this->input->post('email',true)),
		'password' => $enc_password,
	   );

   	return $this->db->insert('user', $data);
  	}

	public function login($email, $password){
	// Validate
	$this->db->where('email', $email);
	$this->db->where('password', $password);

	$result = $this->db->get('user');

	if($result->num_rows() == 1){
	return $result->row(0)->id;
	} else {
	return false;
	}
	}

	public function simpan_data($data)
  	{
    	$q = $this->db->insert('data_penduduk', $data);
    	if ($q) {
    		redirect('Corona/user_tambahdata');
    	}else{
      		redirect('Corona/tambah');
    	}
  	}

  	public function getRow($id_kecamatan)
  	{
    	$q = $this->db->where('id_kecamatan', $id_kecamatan)->get('data_penduduk');
    	return $q;
  	}



  	public function update_data()
  	{
    	$id_kecamatan = $this->input->post('id_kecamatan');
    	$data = array(
    		'nama_kecamatan'=> $this->input->post('nama_kecamatan'),
    		'jumlah_OTG'=> $this->input->post('jumlah_OTG'),
    		'jumlah_PP'=> $this->input->post('jumlah_PP'),
    		'jumlah_PDP'=> $this->input->post('jumlah_PDP'),
    		'jumlah_ODP'=> $this->input->post('jumlah_ODP'),
    		'jumlah_positif'=> $this->input->post('jumlah_positif'),
    	);
    	$q = $this->db->where('id_kecamatan', $id_kecamatan)->update('data_penduduk',$data);
    	if ($q) {
      		redirect('Corona/user_tambahdata');
    	}else{
      		redirect('Corona/ubah');
    	} 
  	}
	




// tutup final
}