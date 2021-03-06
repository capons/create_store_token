<?php

class Main extends CI_Controller
{
    public function index()
    {
        /*
        $this->response([
            'a' => 1
        ]);
        */
    }
    //create access token
    public function checkToken()
    {
        //generate new accessToken if token isset
        $this->load->model('_tokens');
        $data = json_decode(file_get_contents('php://input'), true);
        $data['token'];
        $check = $this->_tokens->check_token(strip_tags(htmlspecialchars($data['token'])));

        if(!empty($check)){ //if token exist
            $create_access_token = $this->_tokens->create_access_token($check[0]['id']); //create access token
            $this->response([
                'auth_token' => $create_access_token
            ]);
        } else { //if token activate or token expired
            $this->response([
                'auth_token' => 'Invalid token'
            ]);
        }
    }
    //login via access token
    public function authAccessToken()//return number of still
    {
        $this->load->model('_tokens');
        $this->load->model('_stores');
        if(!empty($_GET['auth_token'])){
            $check = $this->_tokens->check_access_token(strip_tags(htmlspecialchars($this->input->get('auth_token')))); //check token
            if(!empty($check)){
                $this->_tokens->last_token_login($check[0]['id']); //update last login date
                $store_tills = $this->_stores->get_store_pills($check[0]['store_id']);
                $this->response([
                    'store_name' => $store_tills[0]['name'],
                    'address_line_1' => $store_tills[0]['address_line_1'],
                    'address_line_2' => $store_tills[0]['address_line_2'],
                    'town' => $store_tills[0]['town'],
                    'post_code' => $store_tills[0]['post_code'],
                    'country_name' => $store_tills[0]['country'],
                    'pouch_id_option' => $store_tills[0]['pouch_id_option'],
                    'number_of_tills' => $store_tills[0]['number_of_tills'],
                ]);
            } else {
                $this->response([
                    'number_of_tills' => 'Invalid token'
                ]);
            }
        } else {
            $this->response([
                'number_of_still' => 'Invalid token'
            ]);
        }
    }

    private function response($data)
    {
        header('Content-type: application/json');
        echo json_encode($data);
        exit();
    }
}