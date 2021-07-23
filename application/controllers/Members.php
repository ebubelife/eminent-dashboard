<?php 

class Members extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		
		$this->data['page_title'] = 'Users';
		

		$this->load->model('model_users');
		$this->load->model('model_groups');
		$this->load->model('model_stores');
        $this->load->model('model_members');
		$this->load->model('model_transactions');
		$this->load->model('model_alphasavings');
		$this->load->model('model_referrals');
		$this->load->model('model_membership');
	}
	public function index(){
		redirect('members/manage', 'refresh');
	}


	public function accountManagers(){
		if(!in_array('viewUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		  if($this->uri->segment(3)==null){
		$user_data = $this->model_members->getManagers(null);
		  
	
		    

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

		//	$group = $this->model_users->getUserGroup($v['id']);
		//	$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
 
		$this->render_template('members/managers', $this->data);

	}

	
	if(!$this->uri->segment(3)==null){
		$user_data = $this->model_members->getManagers($this->uri->segment(3));
   		
		$this->data['user_data'] = $user_data;
        
		     
		      
				if(!$user_data == null){
				echo json_encode($user_data);

				}

				else
				{
				echo "Not found" ."  ".$user_data;

				}

	
			}

	}



	public function manage()
	{

		
		

		if(!in_array('viewUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$account_location =  $this->uri->segment(3);
 
		
		

		if($account_location){
		

		$user_data = $this->model_members->getUserData(null,$account_location);

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

			

		//	$group = $this->model_users->getUserGroup($v['id']);
		//	$result[$k]['user_group'] = $group;
		}

		
	//	$getAccountManager = $this->model_members->getAccountManager($user_data["account_manager"]);

	


		$this->data['user_data'] = $result;
 
		$this->render_template('members/index', $this->data);

     }


	 else{
		$user_data = $this->model_members->getUserData(null,null);

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

		//	$group = $this->model_users->getUserGroup($v['id']);
		//	$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
 
		$this->render_template('members/index', $this->data);
	 }




	}



	public function create()
	{

		if(!in_array('createUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$this->form_validation->set_rules('groups', 'Group', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('fname', 'First name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last name', 'trim|required');
        $this->form_validation->set_rules('mname', 'Middle name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('aphone', 'Alt. Phone Number', 'trim|required');
        $this->form_validation->set_rules('date', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[30]');
       
     
        $this->form_validation->set_rules('lga', 'L.G.A', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        
        $this->form_validation->set_rules('olga', 'L.G.A of Origin', 'trim|required');
        $this->form_validation->set_rules('ostate', 'State of Origin', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('ocity', 'City of Origin', 'trim|required');

        $this->form_validation->set_rules('haddress', 'Home Address', 'trim|required|min_length[20]');
        $this->form_validation->set_rules('profession', 'Profession/Occupation', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('idnumber', 'ID Number', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('nin', 'NIN', 'trim');
        $this->form_validation->set_rules('baddress', 'Business Address', 'trim|required|min_length[20]');
        $this->form_validation->set_rules('kinname', 'Next of Kin Name', 'trim|required');
        $this->form_validation->set_rules('kinaddress', 'Kin Address', 'trim|required');
        $this->form_validation->set_rules('kinphone', 'Kin Phone Number', 'trim|required');
       
        $this->form_validation->set_rules('gender', 'Gender ', 'required');
        $this->form_validation->set_rules('mstatus', 'Marital Status', 'required');
        $this->form_validation->set_rules('idcard', 'Valid ID Card', 'required');
        $this->form_validation->set_rules('idcard', 'Valid ID Card', 'required');


        if ($this->form_validation->run() == TRUE) {
            // true case
           
		
		  $password = $this->password_hash($this->input->post('password'));

		
        
			$data = array(
        	
        		
        		'firstname' => $this->input->post('fname'),
                'middlename' => $this->input->post('mname'),
        		'lastname' => $this->input->post('lname'),
        		'phone' => $this->input->post('aphone'),
                'altphone' => $this->input->post('phone'),
                'birth_date' => $this->input->post('date'),
                'gender' => $this->input->post('gender'),
				'mode_of_reg' => $this->input->post('reg_mode'),
                'm_status' => $this->input->post('mstatus'),
                'residence_address' => $this->input->post('address'),
                'origin_address' => $this->input->post('haddress'),
                'residence_city' => $this->input->post('city'),
                'residence_lga' => $this->input->post('lga'),
                'residence_state' => $this->input->post('state'),
                'origin_city' => $this->input->post('ocity'),
                'origin_lga' => $this->input->post('olga'),
                'origin_state' => $this->input->post('ostate'),
                'id_card' => $this->input->post('idcard'),
                'profession' => $this->input->post('profession'),
                'business_address' => $this->input->post('baddress'),
                'kin_name' => $this->input->post('kinname'),
                'kin_phone' => $this->input->post('kinphone'),
                'kin_address' => $this->input->post('kinaddress'),
                'nin' => $this->input->post('nin'),
                'account_location' => "account-location",
				'account_status' => "Pending",
				'account_id' => $this->randomAccountID(),

				'reg_status' => "pending",


                'idcard_image' => "offline",
                'p_image' => "offline",

				'b_account_number' => $this->input->post('b_account_number'),
				'b_account_name' => $this->input->post('b_account_name'),
				'bank' => $this->input->post('bank'),
                
        	
                'password' => $password,
        		'email' => $this->input->post('email'),
                'member_type' => $this->input->post('groups'),
        	);

            $create = $this->model_members->createMembers($data);

        //	$create = $this->model_users->create($data, $this->input->post('groups'));
        	if($create ==true) {
        		
        	}
        	else {
        	//	$this->session->set_flashdata('errors', 'Error occurred!');
        	//	redirect('members/create', 'refresh');

                $this->session->set_flashdata('success', 'Member - '. '<b>'.$this->input->post('fname') .'  '.$this->input->post('lname'). '</b>' . '  was successfully created');
        		redirect('members/manage', 'refresh');
        	}
        }
        else {
           
            // false case
			if($_SERVER['REQUEST_METHOD']=='POST'){
			  $this->session->set_flashdata('errors', 'Error occurred!!');
			}
            $this->data['store_data'] = $this->model_stores->getStoresData();
        	$group_data = $this->model_groups->getGroupData();
        	$this->data['group_data'] = $group_data;
            $this->render_template('members/create', $this->data);
        }	

		
	}

	public function randomAccountID(){
		$randnum = rand(1111111111,9999999999);

		return $randnum;

	}


	public function password_hash($pass = '')
	{
		if($pass) {
			$password = password_hash($pass, PASSWORD_DEFAULT);
			return $password;
		}

		else if($pass=''){
			$randomPassword = array_merge(range('a','z'), range('A','Z'));

			shuffle($randomPassword);

			$randomPassword = substr(implode($randomPassword),0,10);

			$randomPassword = password_hash($randomPassword, PASSWORD_DEFAULT);

		}
	}

	public function edit()
	{

		if(!in_array('updateUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$id = $this->uri->segment(3);


		$this->form_validation->set_rules('groups', 'Group', 'required');
		
	//	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('fname', 'First name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last name', 'trim|required');
        $this->form_validation->set_rules('mname', 'Middle name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('aphone', 'Alt. Phone Number', 'trim|required');
        $this->form_validation->set_rules('date', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[30]');
       
     
        $this->form_validation->set_rules('lga', 'L.G.A', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        
        $this->form_validation->set_rules('olga', 'L.G.A of Origin', 'trim|required');
        $this->form_validation->set_rules('ostate', 'State of Origin', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('ocity', 'City of Origin', 'trim|required');

        $this->form_validation->set_rules('haddress', 'Home Address', 'trim|required|min_length[20]');
        $this->form_validation->set_rules('profession', 'Profession/Occupation', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('idnumber', 'ID Number', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('nin', 'NIN', 'trim');
        $this->form_validation->set_rules('baddress', 'Business Address', 'trim|required|min_length[20]');
        $this->form_validation->set_rules('kinname', 'Next of Kin Name', 'trim|required');
        $this->form_validation->set_rules('kinaddress', 'Kin Address', 'trim|required');
        $this->form_validation->set_rules('kinphone', 'Kin Phone Number', 'trim|required');
       
        $this->form_validation->set_rules('gender', 'Gender ', 'required');
        $this->form_validation->set_rules('mstatus', 'Marital Status', 'required');
        $this->form_validation->set_rules('idcard', 'Valid ID Card', 'required');
	


      



			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
						'firstname' => $this->input->post('fname'),
						'middlename' => $this->input->post('mname'),
						'lastname' => $this->input->post('lname'),
						'phone' => $this->input->post('aphone'),
						'altphone' => $this->input->post('phone'),
						'birth_date' => $this->input->post('date'),
						'gender' => $this->input->post('gender'),
						'm_status' => $this->input->post('mstatus'),
						'residence_address' => $this->input->post('address'),
						'origin_address' => $this->input->post('haddress'),
						'residence_city' => $this->input->post('city'),
						'residence_lga' => $this->input->post('lga'),
						'residence_state' => $this->input->post('state'),
						'origin_city' => $this->input->post('ocity'),
						'origin_lga' => $this->input->post('olga'),
						'origin_state' => $this->input->post('ostate'),
						'id_card' => $this->input->post('idcard'),
						'profession' => $this->input->post('profession'),
						'business_address' => $this->input->post('baddress'),
						'kin_name' => $this->input->post('kinname'),
						'kin_phone' => $this->input->post('kinphone'),
						'kin_address' => $this->input->post('kinaddress'),
						'nin' => $this->input->post('nin'),
						'account_location' => $this->input->post('account-location'),
		
						'idcard_image' => "offline",
                        'p_image' => "offline",
 
						'member_type' => $this->input->post('groups'),
						'id_number' => $this->input->post('idnumber'),
						
					
						
					
		        	);

		        	$update = $this->model_members->edit($data, $id);
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully created');
		        		redirect('members/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('members/edit/'.$id, 'refresh');
		        	}
		        }
		        else {
		        	//$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					//$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
							'member_type' => $this->input->post('groups'),
							'password' => $password,
						    'email' => $this->input->post('email'),
							
							'firstname' => $this->input->post('fname'),
							'middlename' => $this->input->post('mname'),
							'lastname' => $this->input->post('lname'),
							'phone' => $this->input->post('phone'),
							'altphone' => $this->input->post('aphone'),
							'birth_date' => $this->input->post('date'),
							'gender' => $this->input->post('gender'),
							'm_status' => $this->input->post('mstatus'),
							'residence_address' => $this->input->post('address'),
							'origin_address' => $this->input->post('haddress'),
							'residence_city' => $this->input->post('city'),
							'residence_lga' => $this->input->post('lga'),
							'residence_state' => $this->input->post('state'),
							'origin_city' => $this->input->post('ocity'),
							'origin_lga' => $this->input->post('olga'),
							'origin_state' => $this->input->post('ostate'),
							'id_card' => $this->input->post('idcard'),
							'id_number' => $this->input->post('idnumber'),
							'profession' => $this->input->post('profession'),
							'business_address' => $this->input->post('baddress'),
							'kin_name' => $this->input->post('kinname'),
							'kin_phone' => $this->input->post('kinphone'),
							'kin_address' => $this->input->post('kinaddress'),
							'nin' => $this->input->post('nin'),
							'account_location' => $this->input->post('account-location'),
		
							'idcard_image' => "https://uploadedID.com",
							'p_image' => "https://uploaded picture",

					
			        	);

			        	$update = $this->model_members->edit($data, $id);
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('members/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('members/edit/'.$id, 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_members->getUserData($id);
			        	//$groups = $this->model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        //	$this->data['user_group'] = $groups;

			          //  $group_data = $this->model_groups->getGroupData();
			        //	$this->data['group_data'] = $group_data;

						$this->render_template('members/edit', $this->data);	
			        }	

		        }
	        }
	        else {

				if($_SERVER['REQUEST_METHOD']=="POST"){
					$this->session->set_flashdata('errors', 'Error occurred!!');
				  }

			
				  // false case
			
	            // false case
	        	$user_data = $this->model_members->getUserData($id);
	        //	$groups = $this->model_users->getUserGroup($id);

	        //	$this->data['store_data'] = $this->model_stores->getStoresData();

	        	$this->data['user_data'] = $user_data;
	        //	$this->data['user_group'] = $groups;

	         //   $group_data = $this->model_groups->getGroupData();
	        //	$this->data['group_data'] = $group_data;

				$this->render_template('members/edit', $this->data);	
	        }	
		
		
	}

	public function delete($id)
	{

		if(!in_array('deleteUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
			if($this->input->post('confirm')) {

				
					$delete = $this->model_users->delete($this->atri->de($id));
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('users/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('users/delete/'.$id, 'refresh');
		        	}

			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('users/delete', $this->data);
			}	
		}
	}

	public function activate(){

		if(!$this->uri->segment(3)==null){

			$member_id = $this->uri->segment(3);

            $this->model_members->activate($member_id)	;

			$this->data["activation_status"] = 1;

			$this->data["id"] = $member_id;

			$this->render_template('transactions/activation_status', $this->data);
			
			
			
		}

		else{

		$user_data = $this->model_members->getUserData(null,null);

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

		//	$group = $this->model_users->getUserGroup($v['id']);
		//	$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
 
		$this->render_template('members/activate', $this->data);

	}
	


		  
	}

	public function assign_Officer(){

		if($this->uri->segment(4)==null){

		$user_data = $this->model_members->getUserData(null,null);

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

		//	$group = $this->model_users->getUserGroup($v['id']);
		//	$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
 
		$this->render_template('members/assign_account_manager', $this->data);

	}

	else{
    
 
        $member_id = $this->uri->segment(3);
		$account_manager_id=$this->uri->segment(4);
		$updateManager = $this->model_members->updateAccountManager($account_manager_id, $member_id);

		if($updateManager==true){
		$this->data['assign_status']=1;
		$this->data['id']= $member_id;
		$this->render_template('transactions/assign_status', $this->data);

		}

		else{
		$this->data['assign_status']=0;
		$this->data['id']= $member_id;
		$this->render_template('transactions/assign_status', $this->data);

		}

		 

	}


		
	}

	public function confirm_pay(){

		$user_data = $this->model_members->getUserData(null,null);

		$id = $this->uri->segment(3);

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

		//	$group = $this->model_users->getUserGroup($v['id']);
		//	$result[$k]['user_group'] = $group;
		}

		$currentBalance = $this->model_alphasavings->getCurrentSavingsBalance($id);

		$this->data['user_data'] = $result;
		$this->data['member_id'] = $id;

		if($currentBalance)
		$this->data["savings_balance"] = $currentBalance["current_alpha_balance"] ;

		else
		$this->data["savings_balance"] = 0;

		
		$this->render_template('members/deduct_fee', $this->data);


		  
	}

	public function direct_payment(){

		$id = $this->uri->segment(3);
		$registration_fee = 1000;
		$timeNow = time();
		$timeNow = date("Y-m-d H:i:s", $timeNow); 

		 $newMemberData = array("member_id"=>$id, "amount_paid"=>$registration_fee, "payment_method"=>"offline", "payment_source"=>"savings","date"=> $timeNow);

		 $addMember = $this->model_membership->addMember($newMemberData);
		 if($addMember==TRUE):
			$updateStatus = $this->model_membership->updateRegistration($id);

			if($updateStatus==TRUE):
				$updateReferrals = $this->model_referrals->updateReferrals($id);

				$this->data["id"] = $id;

				$this->data["activation_status"] = 1;

				$this->render_template('transactions/activation_status', $this->data);

			else:
				$this->render_template('transactions/transaction_status', $this->data);

		endif;

	else:
		$this->render_template('transactions/transaction_status', $this->data);
	 endif;

	


	}



	public function deduction(){
		

		$id = $this->uri->segment(3);

		//Check current savings current_alpha_balance
         
		$currentBalance = $this->model_alphasavings->getCurrentSavingsBalance($id);
		$registration_fee = 1000;
		
         if(!$currentBalance==null):
			$currentBalance = (int)$currentBalance["current_alpha_balance"];
		     if($currentBalance>1000):
				$deductedBalance = $currentBalance - $registration_fee;

				$timeNow = date("Y-m-d H:i:s", time()); 
            	$newMemberData = array("member_id"=>$id, "amount_paid"=>$registration_fee, "payment_method"=>"offline", "payment_source"=>"savings","date"=> $timeNow);
				$update = $this->model_alphasavings->setCurrentSavingsBalance($id,$deductedBalance);				

				if($update==TRUE):
					$addMember = $this->model_membership->addMember($newMemberData);

			        if($addMember==TRUE):
						$updateStatus = $this->model_membership->updateRegistration($id);

						if($updateStatus==TRUE):
							$updateReferrals = $this->model_referrals->updateReferrals($id);

							$this->data["id"] = $id;

							$this->data["activation_status"] = 1;

							$this->render_template('transactions/activation_status', $this->data);

						else:
							$this->render_template('transactions/transaction_status', $this->data);

				    endif;

			     endif;

	     	endif;

		  endif;
	 endif;
                 

	}

     



	public function profile()
	{

		

		if(!in_array('viewProfile', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$user_id = $this->session->userdata('id');
		$member_id =  $this->uri->segment(3);

		$user_data = $this->model_members->getUserData($member_id);
		$currentAlphaSavings = $this->model_alphasavings->getCurrentAlphaPlan($member_id);

		$totalReferrals = $this->model_referrals->getTotalReferrals($member_id);
		$unpaidReferrals = $this->model_referrals->getTotalReferrals($member_id);

		$verifyMembership = $this->model_membership->verifyMembership($member_id);


		$this->data['user_data'] = $user_data;
		$this->data['activeAlphaPlan'] = $currentAlphaSavings;
		$this->data['totalReferrals'] = count($totalReferrals);
		$this->data['unpaidReferrals'] = count($unpaidReferrals);
		$this->data['verifyMembership'] = $verifyMembership;

		$getAccountManager = $this->model_members->getAccountManager($user_data["account_manager"]);

		if(!$getAccountManager==null)
		$this->data['account_manager_name'] = $getAccountManager["firstname"]." ".$getAccountManager["middlename"]." ".$getAccountManager["lastname"];

		else
		$this->data['account_manager_name'] = "unavailable";

		
        $this->render_template('members/member_profile', $this->data);
	}


	public function memberActivity()
	{

		if(!in_array('viewProfile', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$user_id = $this->session->userdata('id');
		$member_id =  $this->uri->segment(3);
		$user_data = $this->model_members->getUserData($member_id );
		$transactions = $this->model_transactions->getUserTransactions($member_id );
		

		 //List active savings plans
		 $listSavingsPlan = array();
		 $listSavingsPlan = $this->model_transactions->listActivePlan($member_id );

		 $currentAlphaSavings = $this->model_alphasavings->getCurrentAlphaPlan($member_id);

		 $totalReferrals = $this->model_referrals->getTotalReferrals($member_id);
		 $unpaidReferrals = $this->model_referrals->getTotalReferrals($member_id);
 
         
		 $verifyMembership = $this->model_membership->verifyMembership($member_id);
		 $this->data['verifyMembership'] = $verifyMembership;

 
		 $this->data['user_data'] = $user_data;
		 $this->data['activeAlphaPlan'] = $currentAlphaSavings;
		 $this->data['totalReferrals'] = count($totalReferrals);
		 $this->data['unpaidReferrals'] = count($unpaidReferrals);
 

		$this->data['user_data'] = $user_data;	
		$this->data["transactions"] = $transactions;	
		$this->data["savings_plans"]= $listSavingsPlan;
		
	    $this->render_template('members/member_activity', $this->data);
	}


	


	public function setting()
	{
		if(!in_array('updateSetting', $this->permission)) {
            redirect('dashboard', 'refresh');
        }
        
		$id = $this->session->userdata('id');

		if($id) {
			//$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');


			if ($this->form_validation->run() == TRUE) {
	            // true case
		        if(empty($this->input->post('password')) && empty($this->input->post('cpassword'))) {
		        	$data = array(
		        		'username' => $this->input->post('username'),
		        		'email' => $this->input->post('email'),
		        		'firstname' => $this->input->post('fname'),
		        		'lastname' => $this->input->post('lname'),
		        		'phone' => $this->input->post('phone'),
		        		'gender' => $this->input->post('gender'),
		        	);

		        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
		        	if($update == true) {
		        		$this->session->set_flashdata('success', 'Successfully updated');
		        		redirect('users/setting/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('errors', 'Error occurred!!');
		        		redirect('users/setting/', 'refresh');
		        	}
		        }
		        else {
		        	//$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
					//$this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');

					if($this->form_validation->run() == TRUE) {

						$password = $this->password_hash($this->input->post('password'));

						$data = array(
			        		'username' => $this->input->post('username'),
			        		'password' => $password,
			        		'email' => $this->input->post('email'),
			        		'firstname' => $this->input->post('fname'),
			        		'lastname' => $this->input->post('lname'),
			        		'phone' => $this->input->post('phone'),
			        		'gender' => $this->input->post('gender'),
			        	);

			        	$update = $this->model_users->edit($data, $id, $this->input->post('groups'));
			        	if($update == true) {
			        		$this->session->set_flashdata('success', 'Successfully updated');
			        		redirect('users/setting/', 'refresh');
			        	}
			        	else {
			        		$this->session->set_flashdata('errors', 'Error occurred!!');
			        		redirect('users/setting/', 'refresh');
			        	}
					}
			        else {
			            // false case
			        	$user_data = $this->model_users->getUserData($id);
			        	$groups = $this->model_users->getUserGroup($id);

			        	$this->data['user_data'] = $user_data;
			        	$this->data['user_group'] = $groups;

			            $group_data = $this->model_groups->getGroupData();
			        	$this->data['group_data'] = $group_data;

						$this->render_template('users/setting', $this->data);	
			        }	

		        }
	        }
	        else {
	            // false case
	        	$user_data = $this->model_users->getUserData($id);
	        	$groups = $this->model_users->getUserGroup($id);

	        	$this->data['user_data'] = $user_data;
	        	$this->data['user_group'] = $groups;

	            $group_data = $this->model_groups->getGroupData();
	        	$this->data['group_data'] = $group_data;

				$this->render_template('users/setting', $this->data);	
	        }	
		}
	}

    



}