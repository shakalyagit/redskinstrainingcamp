<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {
  /**
   * Index Page for this controller.
   * Since this controller is set as the default controller
   * @package     Redskinstrainingcamp demo
   * @subpackage  Redskinstrainingcamp admin
   * @category    POC
   * @author      Santanu Manna
   * @link        inboundlink.org/dashboard
   */

  function __construct()
  {
    parent::__construct();
    $this->load->helper('url');    
    $this->load->helper('form');    
    $this->load->library('form_validation');  
    $this->load->helper('security');  
    // load model class
    $this->load->model('login_model');  
    // load pagination library
    $this->load->library('Ajax_pagination');
    // load model class
    $this->load->model('dashboard_model');  
    //load model class
    $this->load->model('registration_model');   

    //  Check user access
    $session_data = $this->session->userdata('logged_in');
     if(empty($session_data)) { redirect('login', 'refresh'); }   
    
  }

  function index( $offset = 0,$SearchBy = '' )
  {

    // Set records show per page 
    $PerPage = $this->input->post('Per_Page');
      if(!$PerPage){
          $PerPage = ROW_PER_PAGE;
      }else{
          $PerPage = $PerPage;
      }

      //total rows count
       $totalRec = count($this->dashboard_model->get_guest_list());

      //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'dashboard/ajaxPaginationData/'.$SearchBy;
        $config['total_rows']  = $totalRec;
        $config['per_page']    = $PerPage;

        // Pagination initializing 
        $this->ajax_pagination->initialize($config);

        // Get primary guest list
         $data['guestList'] = $this->dashboard_model->get_guest_list(array('limit'=>$PerPage), $SearchBy);

        // Show guests list
        $this->load->view('header');
        $this->load->view('main-sidebar');
        $this->load->view('guest_manage',$data);
        $this->load->view('footer');
}


function ajaxPaginationData($SearchBy = '')

  {
   
   // Get page No.
    $page = $this->input->post('page');
    if(!$page){
        $offset = 0;
    }else{
        $offset = $page;
    }

    // Get sort by option (A-Z = 19/ Z-A = 91 )
    $action = $this->input->post('action');

    // Get per page option (5-10-15-20)
    $perpage = $this->input->post('per_page');

     // Set records show per page 
    if(!$perpage){
        $perpage = ROW_PER_PAGE;
    }else{
        $perpage = $perpage;
    }

    // Total rows count
    $totalRec = count($this->dashboard_model->get_guest_list($params = array(), $action));

    // Pagination configuration
    $config['target']      = '#postList';
    $config['base_url']    = base_url().'dashboard/ajaxPaginationData';
    $config['total_rows']  = $totalRec;
    $config['per_page']    = $perpage;
    $config['action']      = $action;

    // Pagination initializing 
    $this->ajax_pagination->initialize($config);

    
    // Get the posts data
    $data['guestList'] = $this->dashboard_model->get_guest_list(array('start'=>$offset,'limit'=>$perpage),$action);
    // View guest list page
    $this->load->view('guest_list_ajax', $data, false);

  }


  // View guest registration details
  function guestView($primaryGuestId = 0)
   {
        // Decode primaryGuestId
        $primaryGuestId               = base64_decode($primaryGuestId);

        // Get invited friend details 
        $query['guestDetails']        = $this->registration_model->getGuestDetails($primaryGuestId);
        // Get primary guest details 
        $query['primaryGuestDetails'] = $this->registration_model->getPrimaryGuestDetails($primaryGuestId);

        // View guest details page
        $this->load->view('header');
        $this->load->view('main-sidebar');
        $this->load->view('guest_view',$query);
        $this->load->view('footer');
   }


  function logout()
  {
   
   // Unset session data
    $this->session->unset_userdata('logged_in');

    session_destroy();

    redirect('dashboard', 'refresh');
  }

}