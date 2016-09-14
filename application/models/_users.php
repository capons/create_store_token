<?php

class _users extends CI_Model
{
    const USERS_TABLE = 'users';

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('date');
    }
    public function getUsers()
    {

    }

    public function login($email, $password)
    {
        $query = $this->db->get_where(self::USERS_TABLE, array('email' => $email));
        if ($query->num_rows() == 0) {
            return FALSE;
        }

        $result = $query->result();
        $user = $result[0];
        if (!verify($user->hash, $password)) {
            return FALSE;
        }

        $this->db->set('last_login', unix_to_human(time(), TRUE, 'us'));
        $this->db->where('id', $user->id);
        $this->db->update(self::USERS_TABLE);
        return base64_encode($user->id);
    }
}