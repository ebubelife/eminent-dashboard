<?php

class Model_alphasavings extends CI_Model{

    public function __construct()
	{
		parent::__construct();
      
	}

    public function getCurrentAlphaPlan($id){

        $sql = "SELECT * FROM alpha_savings_members WHERE member_id = ? AND status='active'";
        $query = $this->db->query($sql, array($id));

        if($query)
        return $query->row_array();
    }

    public function getCurrentSavingsBalance($id){
        $sql = "SELECT * FROM alpha_savings_members WHERE member_id = ? AND status='active'";
        $query = $this->db->query($sql, array($id));

        if($query)
        return $query->row_array();


    }


    public function setCurrentSavingsBalance($id,$balance){
        $sql = "UPDATE alpha_savings_members SET current_alpha_balance= $balance WHERE member_id = ? AND status='active'  ";
        $query = $this->db->query($sql, array($id));

        if($query)
           return TRUE;
        else
            return FALSE;

    }

    public function expire_plan($id){

        $sql = "UPDATE alpha_savings_members SET status = 'ended' WHERE id = ?   ";
        $query = $this->db->query($sql, array($id));

       
        if($query)
           return TRUE;
        else
            return FALSE;

    }

 /*   public function expire_alpha_one_commission($data){
        $commission = $data["agent_commission"]; $savings_id = $data["savings_id"]; $currMonth = $data["current_month"];
        $sql = "UPDATE alpha_one_commissions SET $currMonth =   $commission  WHERE savings_id = ? ";
        $query = $this->db->query($sql, array($savings_id));

        if($query)
           return TRUE;
        else
            return FALSE;

    }*/

    public function expire_alpha_commission($data){
        $commission =  $data["agent_commission"]; $savings_id = 12; $currUnpaidMonth = $data["current_unpaid_month"];
        $member_id =  $data["member_id"]; $last_paid_comm_p = $data["current_comm_percentage"];
        $currMonth = $data["curr_month"];

        $sql1 = "UPDATE alpha_commissions SET $currUnpaidMonth = $commission   WHERE savings_id = ? ";
        $query1 = $this->db->query($sql1, array($savings_id));

        $sql2 = "UPDATE members SET comm_yield_count = comm_yield_count + 1  WHERE id = ? ";
        $query2 = $this->db->query($sql2, array( $member_id));

        $sql3 = "UPDATE members SET comm_yield = comm_yield +$commission   WHERE id = ? ";
        $query3 = $this->db->query($sql3, array( $member_id));

        $sql4 = "UPDATE members SET last_paid_comm_amt = $commission   WHERE id = ? ";
        $query4 = $this->db->query($sql4, array( $member_id));

        $sql5 = "UPDATE members SET last_paid_comm = $last_paid_comm_p   WHERE id = ? ";
        $query5 = $this->db->query($sql5, array( $member_id));

        $sql6 = "UPDATE alpha_savings_members SET curr_month = $currMonth+1  WHERE id = ? ";
        $query6 = $this->db->query($sql6, array($member_id));


        


        if($query1)
           return TRUE;
        else
            return FALSE;

    }

    

  

}

?>