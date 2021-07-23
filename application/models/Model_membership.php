<?php

class Model_membership extends CI_Model{

    public function __construct()
	{
		parent::__construct();
      
	}


    public function verifyMembership($id){

        $sql = "SELECT * FROM membership_list WHERE member_id=?";
        
        $query = $this->db->query($sql, array($id));
       
        if($query)
        return $query->row_array();

    }

    public function addMember($data){

        $create = $this->db->insert('membership_list', $data);
        if($create)
        return TRUE;

        else
         return FALSE;

    
    }

    public function updateRegistration($id){

        $sql = "UPDATE members SET reg_status = 'complete', account_status='active' WHERE id = ? ";

        $update = $this->db->query($sql, array($id));
        if($update)
        return TRUE;

        else
         return FALSE;

    }

    public function getRegistrationFee(){

        $sql = "SELECT * FROM variables ";

        $query = $this->db->query($sql);
       
        if($query)
        {

            $result = $query->row_array();

            $result = $result["registration_fee"];

            return $result;
        }
        

    }

    


}

?>