<?php

class Model_transactions extends CI_Model{

    public function __construct()
	{
		parent::__construct();
      
	}

    public function newTransaction($data){
        $create = $this->db->insert('transactions', $data);
      

    }

}

?>