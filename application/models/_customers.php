<?php

class _customers extends CI_Model
{
    const CUSTOMERS_TABLE = 'customers';
    const COUNTRIES_TABLE = 'countries';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_list($filter = NULL)
    {
        $this->db->select(
            'customers.id,
            customers.name AS name,
            customers.address_line_1,
            customers.address_line_2,
            customers.town,
            customers.post_code,
            countries.name AS country
            '
        );
        $this->db->from(self::CUSTOMERS_TABLE . ' customers');
        $this->db->join(self::COUNTRIES_TABLE . ' countries', 'customers.country_id=countries.id', 'left');

        if ($filter) {
            $this->db->like('customers.name', $filter);
        }

        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert(self::CUSTOMERS_TABLE, $data);
        return $this->db->insert_id();
    }
    
    public function get($id)
    {
        $query = $this->db->get_where(self::CUSTOMERS_TABLE, array('id' => $id));
        if ($query->num_rows() == 0) {
            return FALSE;
        }
        $result = $query->result();
        return $result[0];
    }

    public function update($id, $data)
    {
        $this->db->update(self::CUSTOMERS_TABLE, $data, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->delete(self::CUSTOMERS_TABLE, array('id' => $id));
    }
}