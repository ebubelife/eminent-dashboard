<?php

class Model_referrals extends CI_Model{

    public function __construct()
	{
		parent::__construct();
      
	}

    public function getTotalReferrals($id){

        
        $sql = "SELECT * FROM members WHERE referring_member_id = ?";
        $query = $this->db->query($sql, array($id));
       
        if($query)
          return $query->result_array();
      
    }

    public function getUnpaidReferrals($id){

        $sql = "SELECT * FROM members WHERE id = ?";
        $query = $this->db->query($sql, array($id));
       
        if($query)
        return $query->result_array();

    }

    public function updateReferrals($id){

        //First get the referrer's member id
        $sql = "SELECT * FROM members WHERE id = ? AND referring_member_id > 0 ";
        $query = $this->db->query($sql, array($id));

         
        if($query){

        
            $result = $query->row_array();

            if(!$result ==null){

                $referring_member = $result["referring_member_id"];
                    
                //Second : get the total amount in referrer's wallet 
                $sql1 = "SELECT * FROM members WHERE id = ? ";
              
                   $query1 = $this->db->query($sql1, array($referring_member));
                   $result1 = $query1->row_array();

                 $unpaidReferrals = $result1["unpaid_ref_amt"];
                 $unpaidReferrals = (int)$unpaidReferrals;

  
                 //Get percentage based on current registration fee and add to referre's wallet
                 $referralPercentage = $this->getReferralPercentage();

                 $referralPay = $unpaidReferrals + $referralPercentage;

                 //Get  total total number of unpaid referrals

                 $unpaidRefers = $result1["unpaid_referrals"];
                 $unpaidRefers = $unpaidRefers +1;
                 

                 $sql3 = "UPDATE members SET unpaid_ref_amt = $referralPay, unpaid_referrals= $unpaidRefers  WHERE id = ?  ";

                 $update = $this->db->query($sql3, array($referring_member));
                 if($update)
                 return TRUE;
         
                 else
                  return FALSE;
         




                 

            }
          
        }

      
        
    }

    public function getReferralPercentage(){

        $sql = "SELECT * FROM variables ";

        $query = $this->db->query($sql);
       
        if($query)
        {

            $result = $query->row_array();

            $result = $result["registration_fee"];

            $referralPay = (20/100)* $result;

            return $referralPay;
        }
        

       

    }

}

    ?>