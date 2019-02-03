<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	/**
	 * Index Page for this controller.
	 * Since this controller is set as the default controller
	 * @package     Redskinstrainingcamp demo
 	 * @subpackage  Redskinstrainingcamp demo
 	 * @category    POC
 	 * @author      Santanu Manna
 	 * @link        inboundlink.org
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');    
		$this->load->helper('form');    
		$this->load->library('form_validation');  
		$this->load->helper('security');  
		//load model class
		$this->load->model('registration_model');   
		//load zend library
		$this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');    
		//load email helder
		$this->load->helper('email');
		//load email library
        $this->load->library('email');
	}

	public function index()
	{
		// Check request method
		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$primaryGuestId = $this->input->post('registration_control');
			if($primaryGuestId>0){
				// Add friend request from thank you page.
				$this->saveGuestData($primaryGuestId);
				// Show thank you page with all registration data
				$this->viewRegistration($primaryGuestId);
			}else{
				// Save registration data in database
				$this->savePrimaryRegistrationData();
			}
		}else{
			$this->viewRegistration($primaryGuestId='');
		}
	}

	public function savePrimaryRegistrationData(){
		
		// Server side form validation
		$this->form_validation->set_rules('firstName', 'First Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');

	    if ($this->form_validation->run() == FALSE) { // if error occurs then redirect to registration_page

	           $this->load->view('registration_page');  

	    }else{ // Save registration data

	    	// Set Checkbox value default 0
	    	$seasonTicketWaitlist = isset($_POST['seasonTicketWaitlist']) ? 1 : 0;
	    	$womensClub 		  = isset($_POST['womensClub']) ? 1 : 0;
	    	$offers 			  = isset($_POST['offers']) ? 1 : 0;
	    	$appreciationClub     = isset($_POST['appreciationClub']) ? 1 : 0;

	    	$noOfGuests 		  = $this->input->post('noOfGuests');

	    	// Save primary guest data
		    $this->db->trans_start();
      		// Check email id already exist or not. 
      		// If email id exist then update record otherwise insert
      		$this->db->select('*');
       		$this->db->from('primaryguest');
       		$this->db->where('email',$this->input->post('email'));
       		$queryRec = $this->db->get();
       		$primaryGuestData = $queryRec->row_array();

       		// Update existing record
      		if ($primaryGuestData != false && count($primaryGuestData) > 0) {
      			
          		$primaryGuestId=$primaryGuestData['primaryGuestId'];
          		$noOfGuests = $noOfGuests + $primaryGuestData['noOfGuests'];
          		$dataIn = array(
        			   'firstName' 				=>  $this->input->post('firstName'),
        			   'lastName'  				=>  $this->input->post('lastName'),
        			   'email'     				=>  $this->input->post('email'),
        			   'noOfGuests'				=>  $noOfGuests,
        			   'zipCode'				=>  $this->input->post('zipCode'),
        			   'seasonTicketWaitlist'	=>  $seasonTicketWaitlist,
        			   'womensClub' 			=>  $womensClub,
        			   'offers'					=>  $offers, 
        			   'appreciationClub' 		=>  $appreciationClub
        			);
          		$this->db->where('email',$this->input->post('email'));
          		$this->db->update('primaryguest',$dataIn);

          	// Insert new registration
      		}else{  

      			$dataIn = array(
        			   'firstName' 				=>  $this->input->post('firstName'),
        			   'lastName'  				=>  $this->input->post('lastName'),
        			   'email'     				=>  $this->input->post('email'),
        			   'noOfGuests'				=>  $this->input->post('noOfGuests'),
        			   'zipCode'				=>  $this->input->post('zipCode'),
        			   'seasonTicketWaitlist'	=>  $seasonTicketWaitlist,
        			   'womensClub' 			=>  $womensClub,
        			   'offers'					=>  $offers, 
        			   'appreciationClub' 		=>  $appreciationClub,
        			   'dateOfReg'				=>  date('Y-m-d')

        			);
      			$this->db->insert('primaryguest',$dataIn);
      		 	$primaryGuestId=$this->db->insert_id();
      		}
      		$this->db->trans_complete();

      		// Generate barcode
      		$this->setBarcode('P_'.$primaryGuestId,$noOfGuests);
      		 // Save data of Guest
			$this->saveGuestData($primaryGuestId);
			// Send mail to primary guest
			$this->send_mail($primaryGuestId,$type='primary');
			// View thank you page with registration details
			$this->viewRegistration($primaryGuestId);
      		 
		}
	}

	public function saveGuestData($primaryGuestId){
			// Add friend request 
			$all_guests_data = $this->input->post('guests');
			if(is_array($all_guests_data)){
				foreach ($all_guests_data as $id => $guests_data)
				{
					
					 $this->db->trans_start();
					 $dataIn = array(
					 			'primaryGuestId' =>$primaryGuestId,
					 			'firstName' => $guests_data['firstName'],
					 			'lastName' => $guests_data['lastName'],
					 			'email'=> $guests_data['email']
					 	         );

					//Check email id already exist or not. 
					//If email id exist then update record otherwise insert
					$this->db->select('*');
		       		$this->db->from('guest');
		       		$this->db->where('email',$guests_data['email']);
		       		$this->db->where('primaryGuestId',$primaryGuestId);
		       		$queryRec = $this->db->get();
		       		$guestData = $queryRec->row_array();
		       		if ($guestData != false && count($guestData) > 0) { 
		       			//Update guest data
						$this->db->where('email',$guests_data['email']);
		       			$this->db->where('primaryGuestId',$primaryGuestId);
          				$this->db->update('guest',$dataIn);
          				$guestId=$guestData['guestId'];
		       		}else{
		       			//Insert guest data
 						$this->db->insert('guest',$dataIn); 

 						$guestId=$this->db->insert_id();
 						// Generate barcode
      					$this->setBarcode('P_'.$primaryGuestId.'_F_'.$guestId,$noOfGuests=0);	
		       		}
						$this->db->trans_complete();
						// Send mail to invited friend.
						$this->send_mail($guestId,$type='');
					
				}
			}
	}


	public function getGuestDetails($primaryGuestId){
		// Get invited friend details 
		$guestDetails = $this->registration_model->getGuestDetails($primaryGuestId);
		return $guestDetails;
	}

	public function getPrimaryGuestDetails($primaryGuestId){
		// Get primary guest details 
		$primaryGuestDetails = $this->registration_model->getPrimaryGuestDetails($primaryGuestId);
		return $primaryGuestDetails;
	}


	public function viewRegistration($primaryGuestId){
		if($primaryGuestId>0){ // View thank you page with all details.
			$data['primaryGuestDetails']    = $this->getPrimaryGuestDetails($primaryGuestId);
			$data['guestDetails']   		= $this->getGuestDetails($primaryGuestId);
			$data['primaryGuestId'] 		= $primaryGuestId; 
			$this->load->view('registration_page',$data);
		}else{ // View registration page
			$data['guestDetails']   ="";
			$data['primaryGuestId'] =""; 
			$this->load->view('registration_page',$data);
		}

	}

	public function setBarcode($fileName,$noOfGuests){
			// I'm just using rand() function for data example
			$code = rand(10000, 99999);
			// Generate barcode image 
			$file = Zend_Barcode::draw('code128', 'image', array('text' => $code,'factor'=>4), array());
	   		$store_image = imagepng($file,"assets/barcode/{$fileName}.png");

		if($noOfGuests>0){
				// Generate barcode for all guest
			for ($i = 1; $i <= $noOfGuests; $i++){
				// I'm just using rand() function for data example
				$code = rand(10000, 99999);
				// Generate barcode image and save in server
				$newFileName = $fileName.'_G_'.$i;
				$file = Zend_Barcode::draw('code128', 'image', array('text' => $code,'factor'=>4), array());
		   		$store_image = imagepng($file,"assets/barcode/{$newFileName}.png");
			}
		}
	}


	function send_mail($id,$type) {

		$guestDetailsHtml 	= '';
		$mail_subject 		= "Redskins Training Camp Pass";
		if($type=='primary'){
			$primaryGuestDetails = $this->registration_model->getPrimaryGuestDetails($id);
			$name    	= $primaryGuestDetails['firstName'].' '.$primaryGuestDetails['lastName'];
			$mail_To 	= $primaryGuestDetails['email'];
			$noOfGuests = $primaryGuestDetails['noOfGuests'];

			//set guest barcode
			if ($noOfGuests>0) {
				$guestBarcodeHtml='';
				$guestDetailsHtml = '<h3 style="color:#7a1526;font-family:"Quicksand",sans-serif;border-bottom:1px solid #7a1526;padding:0px;width:66%;margin:15px 0px 15px 0px">GUEST BARCODES</h3>
		            <div style="text-align:center;width:100%;padding-bottom:15px">';
				for ($i = 1; $i <= $noOfGuests; $i++){
					$barcode = 'P_'.$id.'_G_'.$i;
					$guestBarcodeHtml .='<img style="margin:9px" src="'.base_url().'assets/barcode/'.$barcode.'.png" height="160px" >';
				}

				$guestDetailsHtml =$guestDetailsHtml.$guestBarcodeHtml.'</div>';
			}
		}else{ // Invite friends and family
			$guestDetails   = $this->registration_model->getGuestDetailsById($id);
			$mail_To 		= $guestDetails['email'];
			$name 			= $guestDetails['firstName'].' '.$guestDetails['lastName'];
			$id             = $guestDetails['primaryguestId'].'_F_'.$guestDetails['guestId'];
		}

		$HTML='<center>
    			<div style="width:650px">
		        <div style="width:100%"><img src="'.base_url().'assets/img/mail/header.jpg" tabindex="0"></div>
		        <h3 style="margin:10px 0px 15px 0px;color:#7a1526;font-family:"Quicksand",sans-serif;">'.$name.'</h3>
		        <div style="margin-bottom:15px;text-align:center;width:100%">
		            <img src="'.base_url().'assets/img/mail/promo.gif" style="height:160px;margin-right:15px" class="CToWUd a6T" tabindex="0">
		            <img src="'.base_url().'assets/barcode/P_'.$id.'.png" height="160px">
		        </div>
		       
		                '.$guestDetailsHtml.'
		        <div style="border-bottom:1px solid #731616;width:66%;margin-bottom:10px"></div>
		        <div>
		        <div style="width:100%">
		            <img src="'.base_url().'assets/img/mail/disclaimer.jpg"  tabindex="0">
		        </div>
		        <div>
		            <img src="'.base_url().'assets/img/mail/app.jpg"  tabindex="0">
		        </div>
		        <div>
		            <img src="'.base_url().'assets/img/mail/roadtrip.jpg"  tabindex="0">
		        </div>
		        <div>
		            <img src="'.base_url().'assets/img/mail/promo.jpg" tabindex="0">
		        </div>
		    </div>
		</center>';

		$mail_Body = $HTML;
		
        $mail_From = 'Dasdak<noreply@dasdak.com>';
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= "From: ${mail_From}\r\nReply-to: $mail_To";

         mail($mail_To , $mail_subject, $mail_Body,$headers);

       

	}

		
}
