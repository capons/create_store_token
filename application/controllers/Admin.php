<?php

class Admin extends CI_Controller
{
    private $crudActions = array('list', 'show', 'create', 'update','delete');
    private $types = array('customer', 'store', 'token');
    private $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

        if (($this->get_instance()->router->method != 'login') && (!$this->session->userdata('uid'))) {
            redirect('/admin/login');
        }
    }

    public function index()
    {
        $this->customers();
    }


    //CUSTOMERS
    public function customers()
    {
        $this->load->model('_customers');
        $data = $this->_customers->get_list(empty($_GET['search'])? NULL : $_GET['search']);
        $this->load->view('header', array(
            'breadcrumbs' => array(
                'Main' => base_url('admin'),
                'Customers' => NULL
        )));
        $this->load->model('_countries');
        $this->load->view('customers', array(
            'customers' => $data,
            'countries' => $this->_countries->get_list()
        ));
        $this->load->view('footer');
    }

    public function customer_add()
    {
        $this->load->model('_customers');
        $data = $this->_customers->add($this->input->post());
        $this->session->set_flashdata('message', 'Customer add successfully');
        redirect('admin/customers');
    }

    public function customer_delete($id)
    {
        $this->load->model('_customers');
        $data = $this->_customers->delete($id);
        $this->session->set_flashdata('message', 'Delete successfully');
        redirect('admin/customers');
    }

    public function customer_edit($id)
    {
        $this->load->model('_customers');
        if (empty($_POST)) {

            if (FALSE !== ($customer = $this->_customers->get($id))) {
                $this->load->model('_countries');
                $this->load->view('header', array(
                    'breadcrumbs' => array(
                        'Main' => base_url('admin'),
                        'Customers' => base_url('admin/customers'),
                        'Edit '.$customer->name => NULL
                    )
                ));
                $this->load->view('customer_edit', array(
                    'customer' => $customer,
                    'countries' => $this->_countries->get_list(),
                ));
                $this->load->view('footer');
            } else {
                redirect('404');
            }
        } else {

            $data = $this->_customers->update($id, $this->input->post());
            $this->session->set_flashdata('message', 'Updated successfully');
            redirect('admin/customers');
        }
    }
    
    //COUNTRIES
    public function countries()
    {
        $this->load->view('header', array(
            'breadcrumbs' => array(
                'Main' => base_url('admin'),
                'Countries' => NULL
            )));
        $this->load->model('_countries');
        $this->load->view('countries', array('countries' => $this->_countries->get_list()));
        $this->load->view('footer');
    }
    
    public function country_edit($id)
    {
        $this->load->model('_countries');
        $this->_countries->update($id, $this->input->post());
        $this->session->set_flashdata('message', 'Update successfully');
        redirect('admin/countries');
    }
    
    public function country_add()
    {
        $this->load->model('_countries');
        $this->_countries->add($this->input->post());
        $this->session->set_flashdata('message', 'Country add successfully');
        redirect('admin/countries');
    }

    //STORES
    public function stores($customer_id)
    {
        $this->load->model('_stores');
        $this->load->model('_customers');
        $this->load->model('_countries');

        $customer = $this->_customers->get($customer_id);
        if (empty($customer)) {
            redirect('404');
        }
        $stores = $this->_stores->get_stores($customer_id, empty($_GET['search'])? NULL : $_GET['search']);
        $this->load->view('header', array(
            'breadcrumbs' => array(
                'Main' => base_url('admin'),
                'Customers' => base_url('admin/customers'),
                $customer->name => base_url('admin/customer_edit/'.$customer->id),
                'Stores' => NULL
            )
        ));
        $this->load->view('stores', array(
            'stores' => $stores,
            'customer' => $customer,
            'countries' => $this->_countries->get_list()
        ));
        $this->load->view('footer');
    }

    public function store_edit($id)
    {
        $this->load->model('_stores');
        if (empty($_POST)) {

            $this->load->model('_customers');

            if (FALSE === ($store = $this->_stores->get($id))) {
                redirect('404');
            }
            if (FALSE === ($customer = $this->_customers->get($store->customer_id))) {
                redirect('404');
            }
            $this->load->view('header',array(
                'breadcrumbs' => array(
                    'Main' => base_url('admin'),
                    'Customers' => base_url('admin/customers'),
                    $customer->name => base_url('admin/edit_customer/'.$customer->id),
                    'Stores' => base_url('admin/stored/'.$customer->id),
                    $store->name => NULL
                )
            ));

            $this->load->model('_countries');
            $this->load->view('store_edit', array(
                'store' => $store,
                'countries' => $this->_countries->get_list(),
                'customer' => $customer
            ));
            $this->load->view('footer');
        } else {
            $this->_stores->update($id, $this->input->post());
            if (!empty($_GET['back'])) {
                $this->session->set_flashdata('message', 'Update successfully');
                redirect('admin/stores/' . $_GET['back']);
            }
            $this->session->set_flashdata('message', 'Update successfully');
            redirect('admin');
        }
    }
    
    public function store_delete($id)
    {
        $this->load->model('_stores');
        $this->_stores->delete($id);
        if (!empty($_GET['back'])) {
            $this->session->set_flashdata('message', 'Delete successfully');
            redirect('admin/stores/'.$_GET['back']);
        }
        $this->session->set_flashdata('message', 'Delete successfully');
        redirect('admin');
    }
    
    public function store_add()
    {
        $this->load->model('_stores');
        $this->_stores->add($this->input->post());
        if (!empty($_GET['back'])) {
            $this->session->set_flashdata('message', 'Add successfully');
            redirect('admin/stores/'.$_GET['back']);
        }
        $this->session->set_flashdata('message', 'Add successfully');
        redirect('admin');
    }

    //TOKENS
    //$store_id
    public function tokens($store_id)
    {
        $this->load->model('_tokens');
        $this->load->model('_stores');
        //$store_id

        if (FALSE === ($store = $this->_stores->get($store_id))) {
            redirect('404');
        }

        $this->load->model('_customers');
        if (FALSE === ($customer = $this->_customers->get($store->customer_id))) {
            redirect('404');
        }

        //$store_id
        $tokens = $this->_tokens->get_list($store_id);
        $this->load->view('header', array(
            'breadcrumbs' => array(
                'Main' => base_url('admin'),
                'Customers' => base_url('admin/customers'),
                $customer->name => base_url('admin/customer_edit/' . $customer->id),
                'Stores' => base_url('admin/stores/' . $customer->id),
                $store->name => base_url('admin/store_edit/' . $store->id),
                'Tokens' => NULL
            )
        ));
        $this->load->view('tokens', array(
            'tokens' => $tokens,
            'customer' => $customer,
            'store' => $store
        ));
    }
    //$store_id
    public function generate($store_id)
    {
        $this->load->model('_tokens');
        $this->_tokens->generate($store_id,$this->input->post('number'));
        if (!empty($_GET['back'])) {
            $this->session->set_flashdata('message', 'Generate successfully');
            redirect('admin/tokens/' . $_GET['back']);
        } else {
            $this->session->set_flashdata('message', 'Generate successfully');
            redirect('admin');
        }
    }

    public function change_status($id)
    {
        if (!empty($_GET['status'])){
            $this->load->model('_tokens');
            $this->_tokens->change_status($id, $_GET['status']);
            $this->session->set_flashdata('message', 'Status change successfully');
        }
        if (!empty($_GET['back'])) {
                redirect('admin/tokens/' . $_GET['back']);
        } else {
            redirect('admin');
        }
    }

    //LOGIN
    public function login()
    {
        if ($this->input->method() == 'post') {
            $this->load->helper('crypt');
            if ((empty($this->input->post('email'))) || (empty($this->input->post('password')))) {
                redirect('admin/login?error=Please fill all fields');
            }
            $this->load->model('_users');
            if (FALSE === ($user = $this->_users->login($this->input->post('email'), $this->input->post('password')))) {
                redirect('admin/login?error=Incorrect email or password. Please try again');
            }
            $this->session->set_userdata(array(
                'uid' => $user
            ));
            redirect('admin');
        } else {
            $this->load->view('header',array(
                'breadcrumbs' => array(
                    'Login' => NULL
                )
            ));
            $this->load->view('login');
            $this->load->view('footer');
        }
    }

    public function log_off()
    {
        $this->session->unset_userdata('uid');
        redirect('admin');
    }
}