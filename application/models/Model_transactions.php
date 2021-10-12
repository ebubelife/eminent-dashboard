<?php

class Model_transactions extends CI_Model{

    public function __construct()
	{
		parent::__construct();
      
	}

    public function updateActivity($data){
        $create = $this->db->insert('member_activity', $data);

        if($create)
            return TRUE;
        else
            return FALSE;
      

    }

    public function newTransaction($data){
        $create = $this->db->insert('transactions', $data);

        if($create)
            return TRUE;
        else
            return FALSE;
      

    }

    public function getUserTransactions($data){

        $sql = "SELECT * FROM transactions WHERE member_id = ?";
        $query = $this->db->query($sql, array($data));
       
        if($query)
          return $query->result_array();
      
          

    }

    public function addSavingsPlanCommission($data){


        $alpha_data = array("member_id"=>$data["member_id"],"savings_id"=>$data["savings_id"]);
         $create = $this->db->insert('alpha_commissions',  $alpha_data);
         $create = $this->db->insert('alpha_commissions_amt',  $alpha_data);
         $create = $this->db->insert('alpha_savings_amt',  $alpha_data);
    
 
       
    }

    public function addNewAlphaSavings($data){
     
    
     

        $create = $this->db->insert('alpha_savings_members', $data);




    }

    public function updateAlphaSavings($data){

        $recordID = $data["record_id"];

        $balance = $data["current_alpha_balance"];
        
        $sql = "UPDATE alpha_savings_members SET current_alpha_balance= $balance WHERE id = ? AND status= 'active' ";
        $query = $this->db->query($sql, array($recordID));

    }

    public function listActivePlan($member_id){

        
        $sql = "SELECT * FROM alpha_savings_members WHERE member_id = ? AND status = 'active'";
        $query = $this->db->query($sql, array($member_id));

        if($query)
          return $query->row_array();

          
      
    }



}

?>