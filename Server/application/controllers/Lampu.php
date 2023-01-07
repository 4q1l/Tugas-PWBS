<?php
defined('BASEPATH') or exit('No direct script access allowed');

// panggil file "Server.php"
require APPPATH . "libraries/Server.php";
// require APPPATH."libraries/Server.php";

class Lampu extends Server
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code

        // // panggil model "Mlampu"
        $this->load->model("Mlampu", "mdl", TRUE);
    }

    // buat service "GET"
    function service_get()
    {
        

        // ambil parameter token "kode"
        $token = $this->get("kode");

        // panggil method "get_data"
        $hasil = $this->mdl->get_data(base64_encode($token));
        // hasil respon
        $this->response(array("lampu" => $hasil), 200);
    }

    // function service_get()
    // {
    //     $username = $this->get("username");

    //     $hasil = $this->model->get_data($username);

    //     $this->response(array("auth" => $hasil), 200);
    // }

    // buat service "POST"
    function service_post()
    {
        // // panggil model "Mlampu"
        // $this->load->model("Mlampu","mdl",TRUE);
        // ambil parameter data yang akan di isi
        $data = array(
            "kode" => $this->post("kode"), //array $data[0]
            "nama" => $this->post("nama"), //array $data[1]
            "harga" => $this->post("harga"), //array $data[2]
            "tegangan" => $this->post("tegangan"), //array $data[3]
            "token" => base64_encode($this->post("kode")),
        );
        // panggil method "save data"
        $hasil = $this->mdl->save_data($data["kode"], $data["nama"], $data["harga"], $data["tegangan"], $data["token"]);
        // jika hasil = 0
        if ($hasil == 0) {
            $this->response(array("status" => "Data Lampu Berhasil Disimpan"), 200);
        }
        // jika hasil !=0
        else {
            $this->response(array("status" => "Data Lampu Gagal Disimpan"), 200);
        }
    }

    // buat service "PUT"
    function service_put()
    {
        // // panggil model "Mlampu"
        // $this->load->model("Mlampu","mdl",TRUE);
        // ambil parameter data yang akan di isi
        $data = array(
            "kode" => $this->put("kode"), //array $data[0]
            "nama" => $this->put("nama"), //array $data[1]
            "harga" => $this->put("harga"), //array $data[2]
            "tegangan" => $this->put("tegangan"), //array $data[3]
            "token" => base64_encode($this->put("token")),
        );
        // panggil method "save data"
        $hasil = $this->mdl->update_data($data["kode"], $data["nama"], $data["harga"], $data["tegangan"], $data["token"]);

        // jika hasil = 0
        if ($hasil == 0) {
            $this->response(array("status" => "Data Lampu Berhasil Di Update"), 200);
        }
        // jika hasil !=0
        else {
            $this->response(array("status" => "Data Lampu Gagal Di Update"), 200);
        }
    }

    // buat service "DELETE"
    function service_delete()
    {
        // // panggil model "Mlampu"
        // $this->load->model("Mlampu","mdl",TRUE);
        // ambil parameter token "kode"
        $token = $this->delete("kode");
        //    panggil fungsi "delete_data"
        $hasil = $this->mdl->delete_data(base64_encode($token));
        if ($hasil == 1) {
            $this->response(array("status" => "Data Lampu Berhasil Dihapus"), 200);
        }
        // jika proses delete gagal
        else {
            $this->response(array("status" => "Data Lampu Gagal Dihapus"), 200);
        }
    }
}
