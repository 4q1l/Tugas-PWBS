<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lampu extends CI_Controller
{
	// buat variabel global
	var $key_name = 'GAB2-API';
	var $key_value = 'RESTAPI-GAB2';

	public function index()
	{
		// setup "basic auth" dengan username dan passwrod
		$this->client->http_login("ftik","if");

		$data['tampil'] = json_decode($this->client->simple_get(APILAMPU, [$this->key_name => $this->key_value]));

		// foreach($data["tampil"]-> lampu as $result) {
		// 	# code...
		// 	echo $result->kode_lampu."<br>";
		// }

		$this->load->view('vw_lampu', $data);
	}

	function setDelete()
	{
		// setup "basic auth" dengan username dan passwrod
		$this->client->http_login("ftik","if");

		// buat variabel json
		$json  = file_get_contents("php://input");
		$hasil = json_decode($json);

		$delete = json_decode($this->client->simple_delete(APILAMPU, array("kode" => $hasil->kodenya, $this->key_name => $this->key_value)));



		// isi nilai err
		// $err = 1;

		// kiirm hasil ke "vw_lampu"
		echo json_encode(array("statusnya" => $delete->status));
	}

	function addLampu()
	{
		$this->load->view('en_lampu');
	}

	function setSave()
	{
		// setup "basic auth" dengan username dan passwrod
		$this->client->http_login("ftik","if");

		// baca nilai dari fetch
		$data = array(
			"kode" => $this->input->post("kodenya"),
			"nama" => $this->input->post("namanya"),
			"harga" => $this->input->post("harganya"),
			"tegangan" => $this->input->post("tegangannya"),
			"token" => $this->input->post("kodenya"),
			$this->key_name => $this->key_value
		);

		$save = json_decode($this->client->simple_post(APILAMPU, $data));
		// kiirm hasil ke "en_lampu"
		echo json_encode(array("statusnya" => $save->status));
	}

	// fungsi untuk update data
	function updateLampu()
	{
		// setup "basic auth" dengan username dan passwrod
		$this->client->http_login("ftik","if");

		// $segmen = $this->uri->total_segments();
		// ambil nilai kode
		$token = $this->uri->segment(3);

		// echo $token;
		$tampil = json_decode($this->client->simple_get(APILAMPU, array("kode" => $token, $this->key_name => $this->key_value)));

		foreach ($tampil->lampu as $result) {
			# code...
			// echo $result->nama_lampu . "<br>";
			$data = array(
				"kode" => $result->kode_lampu,
				"nama" => $result->nama_lampu,
				"tegangan" => $result->tegangan_lampu,
				"harga" => $result->harga_lampu,
				"token" => $token
			);
			$this->load->view('up_lampu', $data);
		}
	}

	function setUpdate()
	{
		// setup "basic auth" dengan username dan passwrod
		$this->client->http_login("ftik","if");

		// baca nilai dari fetch
		$data = array(
			"kode" => $this->input->post("kodenya"),
			"nama" => $this->input->post("namanya"),
			"harga" => $this->input->post("harganya"),
			"tegangan" => $this->input->post("tegangannya"),
			"token" => $this->input->post("tokennya"),
			$this->key_name => $this->key_value
		);

		$update = json_decode($this->client->simple_put(APILAMPU, $data));
		// kiirm hasil ke "up_lampu"
		echo json_encode(array("statusnya" => $update->status));
	}
}
