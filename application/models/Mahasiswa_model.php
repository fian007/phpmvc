<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public function getAllMahasiswa()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah_data()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama')),
            'nrp' => htmlspecialchars($this->input->post('nrp')),
            'email' => htmlspecialchars($this->input->post('email')),
            'jurusan' => htmlspecialchars($this->input->post('jurusan'))
        ];
        return $this->db->insert('mahasiswa', $data);
    }

    public function detail_data($id)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function  hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($id)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_data($where, $data, $table)
    {
        return $this->db->update('mahasiswa', $data, $where);
    }

    public function proses_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('user', 1);
        return $result;
    }

    public function tambah_regis()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username')),
            'password' => htmlspecialchars($this->input->post('password')),
        ];
        return $this->db->insert('user', $data);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('nrp', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
