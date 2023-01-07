<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlampu extends CI_Model
{

    // buat fungsi "get_data"
    function get_data($token)
    {
        $this->db->select("id AS id_lampu, kode AS kode_lampu, nama AS nama_lampu, harga AS harga_lampu, tegangan AS tegangan_lampu");
        $this->db->from("tb_lampu");

        // jika token terisi
        if (!empty($token)) {
            $this->db->where("TO_BASE64(kode) = '$token'");
        }

        $this->db->order_by("kode", "ASC");
        $query = $this->db->get()->result();

        return $query;
    }

    // function get_data($username)
    // {
    //     $this->db->select("username, key");
    //     $this->db->from("tb_auth");
    //     $this->db->where("username = '$username'");
    //     $query = $this->db->get()->result();

    //     return $query;
    // }

    // buat fungsi untuk delete data
    function delete_data($token)
    {
        // cek apakah kode ada atau tidak
        $this->db->select("kode");
        $this->db->from("tb_lampu");
        $this->db->where("TO_BASE64(kode) = '$token'");
        // eksekusi query
        $query = $this->db->get()->result();
        // jika kode ditemukan
        if (count($query) == 1) {
            // hapus data lampu
            $this->db->where("TO_BASE64(kode) = '$token'");
            $this->db->delete("tb_lampu");
            // kirim nilai hasil = 1
            $hasil = 1;
        }
        // jika kode tidak di temukan
        else {
            // kirim nilai hasil =0
            $hasil = 0;
        }
        // kirim variabel hasil ke "controler" Lampu
        return $hasil;
    }

    // buat fungsi untuk save data
    function save_data($kode, $nama, $harga, $tegangan, $token)
    {
        // cek apakah kode ada atau tidak
        $this->db->select("kode");
        $this->db->from("tb_lampu");
        $this->db->where("TO_BASE64(kode) = '$token'");
        //  $this->db->where("kode = '$kode'");
        // eksekusi query
        $query = $this->db->get()->result();
        // jika kode tidak ditemukan
        if (count($query) == 0) {
            // isi nilai untuk masing" filed
            $data = array(
                "kode" => $kode,
                "nama" => $nama,
                "harga" => $harga,
                "tegangan" => $tegangan,
            );

            // simmoan data
            $this->db->insert("tb_lampu", $data);
            $hasil = 0;
        }
        //  jika kode ditemukan 
        else {
            $hasil = 1;
        }
        return $hasil;
    }
    // fungsi untuk update data
    function update_data($kode, $nama, $harga, $tegangan, $token)
    {
        // cek apakah kode ada atau tidak
        $this->db->select("kode");
        $this->db->from("tb_lampu");
        $this->db->where("TO_BASE64(kode) != '$token' AND kode = '$kode'");
        //  $this->db->where("kode = '$kode'");
        // eksekusi query
        $query = $this->db->get()->result();
        // jika kode tidak ditemukan
        if (count($query) == 0) {
            // isi nilai untuk masing" filed
            $data = array(
                "kode" => $kode,
                "nama" => $nama,
                "harga" => $harga,
                "tegangan" => $tegangan,
            );

            // hapus data lampu
            $this->db->where("TO_BASE64(kode) = '$token'");
            $this->db->update("tb_lampu", $data);
            // kirim nilai hasil = 0
            $hasil = 0;
        }
        //  jika kode di temukan
        else {
            $hasil = 1;
        }
        return $hasil;
    }
}
