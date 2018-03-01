<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	public function index(){
		$data = $this->mymodel->GetMahasiswa();
		$this->load->view('tabel',array('data' => $data));
	}

	public function add_data(){
		$this->load->view('form_add');
	}

	public function do_insert(){
		/*echo "<pre>";
		print_r($_POST);
		echo "<pre>"; */

		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$data_insert = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'jenis_kelamin' => $jenis_kelamin,
		);
		$res = $this->mymodel->InsertData('mahasiswa',$data_insert);
		if($res>=1){
			$this->session->set_flashdata('Pesan','Tambah Data Sukses');
			redirect('crud/index');
		}else{
			echo "<h2>Insert Data Gagal</h2>";
		}
	}

	public function edit_data($nim){
		$mhs = $this->mymodel->GetMahasiswa("where nim = '$nim'");
		$data = array(
			"nim" => $mhs[0]['nim'],
			"nama" => $mhs[0]['nama'],
			"alamat" => $mhs[0]['alamat'],
			"jenis_kelamin" => $mhs[0]['jenis_kelamin'],
		);
	$this->load->view('form_edit',$data);
	}

	public function do_update(){
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$data_update = array(
			'nim' => $nim,
			'nama' => $nama,
			'alamat' => $alamat,
			'jenis_kelamin' => $jenis_kelamin,
		);
		$where = array('nim' => $nim);
		$res = $this->mymodel->UpdateData('mahasiswa',$data_update,$where);
		if($res>=1){
			$this->session->set_flashdata('Pesan','Ubah Data Sukses');
			redirect('crud/index');
		}else{
			echo "<h2>Insert Data Gagal</h2>";
		}
	}

	public function do_delete($nim){
		$where = array('nim' => $nim);
		$res =  $this->mymodel->DeleteData('mahasiswa',$where);
		if($res>=1){
			$this->session->set_flashdata('Pesan','Hapus Data Sukses');
			redirect('crud/index');
		}
	}
}