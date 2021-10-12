<?php

class Transactions extends Admin_Controller {

    public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
        

        $this->load->model('model_transactions');

        $this->load->model('model_members');
     
    
		
	
	}

    public function new(){

        //validat form values and pass them to array

        $this->form_validation->set_rules('transactionType', 'Transaction Type', 'required');
        $this->form_validation->set_rules('savingsPlan', 'Savings Plan', 'required'); 
        $this->form_validation->set_rules('savingsAmt', 'Amount', 'trim|required|callback_verify_amount'); 

      

        $timeNow = time();
        $timeNow = date("Y-m-d H:i:s", $timeNow); 
        $member_id =  $this->uri->segment(3);
        
        $data = array("date"=>$timeNow,
        "type"=>$this->input->post('transactionType'),
        "description"=>"Deposit of -  ₦<b>".$this->input->post('savingsAmt')."</b>"." to ". $this->input->post('savingsPlan'),
        "member_id"=> $member_id,
        "amount"=>$this->input->post('savingsAmt'),
        "savings_plan"=> $this->input->post('savingsPlan'),

        "channel"=> $this->input->post('channel'),
       );


        //check if last url segment is proceed, if true, redirect to confirmation page

        if($this->uri->segment(4)=="confirm"){
          
        
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('errors','Could not validate form'); 
                $user_data = $this->model_members->getUserData($member_id );
                $this->data['user_data'] = $user_data;
                $this->render_template('members/member_activity', $this->data);
        

             }

             else{

            
                $this->session->set_userdata("my_form_values",$data);
                $this->confirm($data);

            }
        }

            //Go ahead to process the form and transaction

        else{


                    $data =  $this->session->userdata("my_form_values");
                   
                    $endDate = $this->getPlanExpiry($data["savings_plan"]);
                    $data1 = array( "member_id"=> $member_id, "current_alpha_balance"=>$data["amount"], "savings_plan"=>$data["savings_plan"], "total_withdrawn"=>0, "status"=>"active","join_date"=>date("Y-m-d H:i:s", time()), "end_date"=>$endDate);
                    
                  
                    $listSavingsPlan = $this->model_transactions->listActivePlan($member_id );
                    $newTransaction = $this->model_transactions->newTransaction($data);
                     
                    if($listSavingsPlan == null)
                    {
                        
                    $updateSavings = $this->model_transactions->addNewAlphaSavings($data1);
                    $getCurrentAlphaPlan = $this->model_alphasavings->getCurrentAlphaPlan($member_id);

                    $currentAlphaPlanID =  $getCurrentAlphaPlan["id"];

                    $data1["savings_id"] =   $currentAlphaPlanID;
                    $updateSavingsCommissions = $this->model_transactions-> addSavingsPlanCommission($data1);
                    }
                        
                            else{

                                $data1["record_id"] = $listSavingsPlan["id"];
                                $data1["current_alpha_balance"] = $listSavingsPlan["current_alpha_balance"] + $data["amount"];
                                $updateSavings = $this->model_transactions->updateAlphaSavings($data1);

                            }


                            if($newTransaction==TRUE ){

                                $activityData = array("member_id"=>$member_id, "description"=>"<b>#200 deposited</b> into <b>Alpha One Month</b>, for member - George Clipart", "transaction_id"=>16,"date"=>time(), "manager"=>7 );
                                $this->model_transactions->updateActivity($activityData);
    
                             $this->status($data);
                                

                            }
                        
                            else

                                // false case
                                if($_SERVER['REQUEST_METHOD']=='POST')
                                    $this->session->set_flashdata('errors','An error occured please try that again!');
                            
                        
                        }  
                        
}

    
    public  function getPlanExpiry($savings_plan){

        if($savings_plan == "alpha1"){
            $join_date = time();
            $join_date += 60*60*24*30;
            return  date('Y-m-d H:i:s',  $join_date);
        }

        if($savings_plan == "alpha3"){
            $join_date =time();
            $join_date += 60*60*24*30*3;
            return   date('Y-m-d H:i:s',  $join_date);
        }

        if($savings_plan == "alpha6"){
            $join_date =time();
            $join_date += 60*60*24*30*6;
            return date('Y-m-d H:i:s',  $join_date);
        }

        if($savings_plan == "alpha9"){
            $join_date =time();
            $join_date += 60*60*24*30*9;
            return  date('Y-m-d H:i:s',  $join_date);
        }

        if($savings_plan == "alpha12"){
            $join_date =time();
            $join_date += 60*60*24*30*12;
            return  date('Y-m-d H:i:s',  $join_date);
        }



    }


  

    public function status($data){

       // $member_id =  $this->uri->segment(3);
        
        $user_data = $this->model_members->getUserData($data["member_id"]);
        $this->data['user_data'] = $user_data;

        $this->data["member_id"] = $data["member_id"];
        $this->data["date"] = $data["date"];
        $this->data["amount"] = $data["amount"];
        $this->data["plan"] = $data["savings_plan"];
        $this->data["type"] = $data["type"];
        $this->data["channel"] = $data["channel"];


        $this->render_template('transactions/transaction_status', $this->data);    
        
    }

    public function confirm($data){


        $user_data = $this->model_members->getUserData($data["member_id"]);
        $this->data['user_data'] = $user_data;

        $this->data["member_id"] = $data["member_id"];
        $this->data["date"] = $data["date"];
        $this->data["amount"] = $data["amount"];
        $this->data["plan"] = $data["savings_plan"];
        $this->data["type"] = $data["type"];
        $this->data["channel"] = $data["channel"];


        $this->render_template('transactions/confirm_transaction', $this->data);  
          
            

    }

    public function verify_amount($str){
 
            
             $str = (int)$str;
            if(!$str>199){

                $this->form_validation->set_message("verify_amount","Deposited amounts must not be less than N200 ");
                return FALSE;
                
            }

            else{
                 
                return TRUE;
            }
          

    }

    

   

}

?>