<?php

class _tokens extends CI_Model
{
    const TOKENS_TABLE = 'tokens';

    public function __construct()
    {
        $this->load->database();
    }
    //$store_id,
    public function generate($store_id,$number = 10)
    {
        $this->load->helper('string');
        for ($i=1; $i<=$number; $i++) {
            $token = random_string('alnum', 80);
            $data = array(
                'token' => $token,
                'store_id' => $store_id,
               // 'number_of_tills' => $tills
            );
            $this->db->insert(self::TOKENS_TABLE, $data);
        }
    }

    public function get_list($store_id)
    {
        $this->db->select('*');
        $this->db->from(self::TOKENS_TABLE);
        $this->db->where('store_id', $store_id);
        return $this->db->get()->result();
    }
    
    public function change_status($id, $status)
    {
        $this->db->update(self::TOKENS_TABLE,array(
            'status' => $status
        ), array(
            'id' => $id
        ));
    }
    public function check_token($token)
    {
        $this->db->from(self::TOKENS_TABLE);
        $this->db->where('token',$token);
        $this->db->where('status','new');
        return $this->db->get()->result_array();
    }
    public function check_access_token($token)
    {
        $this->db->from(self::TOKENS_TABLE);
        $this->db->where('access_token',$token);
        $this->db->where('status','active');
        return $this->db->get()->result_array();
    }
    public function create_access_token($id)
    {
        $this->load->helper('string');
        $access_token = random_string('alnum', 80);
        if(!empty($this->check_access_token($access_token))){
            $access_token = random_string('alnum', 80);
        }
        $data = array(
            'status'     =>'active',
            'access_token'=>$access_token
        );
        $this->db->where('id',$id);
        $this->db->where('status','new');

        $this->db->update(self::TOKENS_TABLE,$data);
        return $access_token;
    }
    public function last_token_login($id)
    {
        $data = array (
           'last_login' => date("Y-m-d h:i:sa")
        );
        $this->db->where('id',$id);
        $this->db->update(self::TOKENS_TABLE,$data);
    }


}