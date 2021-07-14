<?php

class Alpha extends Admin_Controller {

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

    public function alphaOne(){


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
 
		$this->render_template('savings/alpha/alpha_one', $this->data);

    

    }

    public function alphaNine(){


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
 
		$this->render_template('savings/alpha/alpha_nine', $this->data);

    

    }

    public function alphaThree(){
  

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
 
		$this->render_template('savings/alpha/alpha_three', $this->data);


    }


        public function alphaSix(){
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
     
            $this->render_template('savings/alpha/alpha_six', $this->data);
    


    }


    public function alphaTwelve(){
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
 
		$this->render_template('savings/alpha/alpha_twelve', $this->data);


    }


    public function alphaIndex(){
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
 
		$this->render_template('savings/alpha/index', $this->data);

    }


    public function alphaActivity(){

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
 
		$this->render_template('savings/alpha/activity', $this->data);

    }


	
    public function alphaWithdrawals(){

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
 
		$this->render_template('savings/alpha/withdrawals', $this->data);

    }


}

?>