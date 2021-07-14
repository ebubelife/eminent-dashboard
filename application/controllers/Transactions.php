<?php

class Transactions extends Admin_Controller {

    public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
        

        $this->load->model('model_transactions');
     
    
		
	
	}

    public function new(){

            $member_id =  $this->uri->segment(3);

            $this->form_validation->set_rules('transactionType', 'Transaction Type', 'required');
            $this->form_validation->set_rules('savingsPlan', 'Savings Plan', 'required'); 
            $this->form_validation->set_rules('savingsAmt', 'Amount', 'trim|required'); 

           

            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('errors','Could not validate form'); 

                redirect('members/memberActivity/'.$member_id, 'refresh');
        

    }

    else{

       
        $timeNow = time();
        $timeNow = date("Y-m-d H:i:s", $timeNow); 
       
        
        $data = array("date"=>$timeNow,
        "type"=>$this->input->post('transactionType'),
        "description"=>"Deposit of -  <b>".$this->input->post('savingsAmt')."</b>"." to ". $this->input->post('savingsPlan'),
        "member_id"=> $member_id,
        "amount"=>$this->input->post('savingsAmt'),
        "savings_plan"=> $this->input->post('savingsPlan'),
   );

        $newTransaction = $this->model_transactions->newTransaction($data);

        if($newTransaction==TRUE){




        }else{

            $this->session->set_flashdata('errors','An error occured please try that again!'); 

        }


    }



      

    }

    public function status(){
        
    }

    public function verify_amount($str){

        if(is_int($str)){
            if(!$str<200){

                $this->form_validation->set_message("verify_amount","Deposited amounts must not be less than N200");
                return FALSE;
                
            }

            else{
                 
                return TRUE;
            }
        }

        else{
            $this->form_validation->set_message("verify_amount","Please enter a number");
            return FALSE;
        }

    }

   

}

?>