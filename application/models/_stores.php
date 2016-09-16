<?php

class _stores extends CI_Model
{
    const STORES_TABLE = 'stores';

    public function __construct()
    {
        $this->load->database();
    }

    public function get_stores($customerId, $filter = NULL)
    {

        $this->db->select(
            'stores.id,
            stores.name AS name,
            stores.address_line_1,
            stores.address_line_2,
            stores.town,
            stores.post_code,
            countries.name AS country,
            stores.pouch_id_option AS pouch_id_option,
            stores.number_of_tills AS number_of_tills
            '
        );
        $this->db->from(self::STORES_TABLE . ' stores');
        $this->db->join(self::STORES_TABLE . ' countries', 'stores.country_id=countries.id', 'left');
        $this->db->where('stores.customer_id', $customerId);
        if ($filter) {
            $this->db->like('stores.name', $filter);
        }

        return $this->db->get()->result();
    }

    public function get($id)
    {
        $query = $this->db->get_where(self::STORES_TABLE, array('id' => $id));
        if ($query->num_rows() == 0) {
            return FALSE;
        }
        $result = $query->result();
        return $result[0];
    }

    public function add($data)
    {
        $this->db->insert(self::STORES_TABLE, $data);
        return $this->db->insert_id();
    }
    
    public function update($id, $data)
    {
        $this->db->update(self::STORES_TABLE, $data, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->delete(self::STORES_TABLE, array('id' => $id));
    }
    public function get_store_pills($id)
    {
        $this->db->select(
            '
            stores.*,
            countries.name as country
            '
        );
        $this->db->from(self::STORES_TABLE);
        $this->db->join('countries','countries.id = stores.country_id');
        $this->db->where('stores.id',$id);
        return $this->db->get()->result_array();
    }
}