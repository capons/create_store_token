<?php

class _countries extends CI_Model
{
    const COUNTRIES_TABLE = 'countries';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_list()
    {
        $query = $this->db->get(self::COUNTRIES_TABLE);
        return $query->result();
    }

    public function update($id, $data)
    {
        $this->db->update(self::COUNTRIES_TABLE, $data, array('id' => $id));
    }

    public function add($data)
    {
        $this->db->insert(self::COUNTRIES_TABLE, $data);
        return $this->db->insert_id();
    }
}