<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		$data = $this->mymodel->GetMahasiswa();
		$this->load->view('tabel',$arrayName = array('data' => $data ));
	}
	
	public function insert(){
		$res = $this->mymodel->InsertData('mahasiswa',$arrayName = array(
			"nim" => "14243022",
			"nama" => "Heri Hermawan",
			"alamat" => "Jatinangor",
			 ));
		if ($res >= 1){
			echo "<h2>Insert Data Sukses</h2>";
		}else{
			echo "<h2>Insert Data Gagal</h2>";
		}
	}

	public function update(){
		$res = $this->mymodel->UpdateData('mahasiswa',$arrayName = array(
			"alamat" => "Jatinangor, Cikeruh",
			 ),$arrayName = array('nim' => '14243022'));

		if ($res >= 1){
			echo "<h2>Update Data Sukses</h2>";
		}else{
			echo "<h2>Update Data Gagal</h2>";
		}
	}

	public function delete(){
		$res = $this->mymodel->DeleteData('mahasiswa',$arrayName = array('nim' => '14243022'));

		if ($res >= 1){
			echo "<h2>Delete Data Sukses</h2>";
		}else{
			echo "<h2>Delete Data Gagal</h2>";
		}
	}

	public function panggil(){
		$data = $this->db->query("select * from mahasiswa");
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		echo "Jumlah Data = ".$data->num_rows()."<br />";
		$row = $data->row();
		echo "Nim = ".$row->nim."<br />";
		echo "Nama = ".$row->nama."<br />";
		echo "Alamat = ".$row->alamat."<br />";
		/*foreach ($data->result_array() as $row) {
			echo "Nim 	 :" .$row['nim']. "<br/>";
			echo "Nama 	 :" .$row['nama']. "<br/>";
			echo "Alamat :" .$row['alamat']."<br/>";
			echo "<hr/>";
		}*/
			
		
	}
}
