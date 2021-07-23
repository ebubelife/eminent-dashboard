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

}

?>