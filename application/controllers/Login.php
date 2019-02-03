<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Login extends CI_Controller
{
    
    /**
     * Index Page for this controller.
     * Since this controller is set as the default controller
     * @package     Redskinstrainingcamp demo
     * @subpackage  Redskinstrainingcamp admin login
     * @category    POC
     * @author      Santanu Manna
     * @link        inboundlink.org/admin
     */
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('security');
        //load model class
        $this->load->model('login_model');
    }
    
    function index($offset = 0)
    {
        // Check request method
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // Server side form validation
            $this->form_validation->set_rules('userName', 'Username', 'trim|required|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_password');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login_page');
            } else {
                
                redirect('dashboard');
            }
        } else {
            $this->load->view('login_page');
        }
    }
    
    //Field validation succeeded.  Validate against database
    function check_password($password)
    {
        $userName = $this->input->post('userName');
        //query the database
        $result   = $this->login_model->login($userName, $password);
        
        
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $userId = $row->userId;
                
                // Set user data in session array
                $sess_array = array(
                    'userId' => $row->userId,
                    'userName' => $row->userName
                );
                // Set user data in session 
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            // Invalid login credentials
            $this->form_validation->set_message('check_password', 'Invalid username or password!');
            return false;
        }
    }
    
}
