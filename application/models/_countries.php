<?php

class _countries extends CI_Model
{
    const COUNTRIES_TABLE = 'countries';
    const CUSTOMERS_TABLE = 'customers';

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

    public function check_country($id)
    {
        $this->db->get_where(self::CUSTOMERS_TABLE, array('country_id' => $id));
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->delete(self::COUNTRIES_TABLE, array('id' => $id));
        return $this->db->affected_rows();
    }

    public function add($data)
    {
        $this->db->insert(self::COUNTRIES_TABLE, $data);
        return $this->db->insert_id();
    }
}