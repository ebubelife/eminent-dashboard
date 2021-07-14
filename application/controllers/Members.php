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
	}
	public function index(){
		redirect('members/manage', 'refresh');
	}

	public function accountManagers(){
		if(!in_array('viewUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$user_data = $this->model_members->getManagers();

		$result = array();
		foreach ($user_data as $k => $v) {

			$result[$k]['user_info'] = $v;

		//	$group = $this->model_users->getUserGroup($v['id']);
		//	$result[$k]['user_group'] = $group;
		}

		$this->data['user_data'] = $result;
 
		$this->render_template('members/managers', $this->data);

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
		
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('fname', 'First name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last name', 'trim|required');
        $this->form_validation->set_rules('mname', 'Middle name', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('aphone', 'Alt. Phone Number', 'trim|required');
        $this->form_validation->set_rules('date', 'Date of Birth', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[30]');
        $this->form_validation->set_rules('bstop', 'Landmark', 'trim|required');
     
        $this->form_validation->set_rules('lga', 'L.G.A', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        
        $this->form_validation->set_rules('olga', 'L.G.A of Origin', 'trim|required');
        $this->form_validation->set_rules('ostate', 'State of Origin', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('ocity', 'City of Origin', 'trim|required');

        $this->form_validation->set_rules('haddress', 'Home Address', 'trim|required|min_length[20]');
        $this->form_validation->set_rules('profession', 'Profession/Occupation', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('idnumber', 'ID Number', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('nin', 'NIN', 'trim|required');
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
                'account_location' => "Account_Default_Location",
				'account_status' => "Pending",
				'account_id' => $this->randomAccountID(),


                'idcard_image' => "https://uploadedID.com",
                'p_image' => "https://uploaded picture",

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
	}

	public function edit($id = null)
	{

		if(!in_array('updateUser', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		if($id) {
		
			$this->form_validation->set_rules('groups', 'Group', 'required');
		
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('fname', 'First name', 'trim|required');
			$this->form_validation->set_rules('lname', 'Last name', 'trim|required');
			$this->form_validation->set_rules('mname', 'Middle name', 'trim|required');
			$this->form_validation->set_rules('phone', 'phone', 'trim|required');
			$this->form_validation->set_rules('aphone', 'Alt. Phone Number', 'trim|required');
			$this->form_validation->set_rules('date', 'Date of Birth', 'trim|required');
			$this->form_validation->set_rules('address', 'Address', 'trim|required|min_length[30]');
			$this->form_validation->set_rules('bstop', 'Landmark', 'trim|required');
		 
			$this->form_validation->set_rules('lga', 'L.G.A', 'trim|required');
			$this->form_validation->set_rules('state', 'State', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('city', 'City', 'trim|required');
			
			$this->form_validation->set_rules('olga', 'L.G.A of Origin', 'trim|required');
			$this->form_validation->set_rules('ostate', 'State of Origin', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('ocity', 'City of Origin', 'trim|required');
	
			$this->form_validation->set_rules('haddress', 'Home Address', 'trim|required|min_length[20]');
			$this->form_validation->set_rules('profession', 'Profession/Occupation', 'trim|required|min_length[20]');
			$this->form_validation->set_rules('idnumber', 'ID Number', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('nin', 'NIN', 'trim|required');
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
						'account_location' => "Account_Default_Location",
		
						'idcard_image' => "https://uploadedID.com",
						'p_image' => "https://uploaded picture",

						'member_type' => $this->input->post('groups'),
						
					
						
					
		        	);

		        	$update = $this->model_members->edit($data, $id, $this->input->post('groups'));
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
							'account_location' => "Account_Default_Location",
			
							'idcard_image' => "https://uploadedID.com",
							'p_image' => "https://uploaded picture",
	
							'member_type' => $this->input->post('groups'),
							
						
							'password' => $password,
							'email' => $this->input->post('email'),
			        	);

			        	$update = $this->model_members->edit($data, $id, $this->input->post('groups'));
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



	public function profile()
	{

		

		if(!in_array('viewProfile', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

		$user_id = $this->session->userdata('id');
		$member_id =  $this->uri->segment(3);

		$user_data = $this->model_members->getUserData($member_id);
		$this->data['user_data'] = $user_data;

		
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
		$this->data['user_data'] = $user_data;


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