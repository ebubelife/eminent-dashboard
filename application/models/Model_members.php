<?php

class Model_members extends CI_Model{
    public function __construct()
	{
		parent::__construct();
        $this->load->dbforge();
	}


    public function createMembers($data){
        // switch over to Library DB
//$this->db->query('use Library');

// define table fields
$fields = array(
    'memid' => array(
      'type' => 'INT',
      'constraint' => 9,
      'unsigned' => TRUE,
      'auto_increment' => TRUE
    ),
    'firstname' => array(
      'type' => 'VARCHAR',
      'constraint' => 255
    ),
    'middlename' => array(
      'type' => 'VARCHAR',
      'constraint' => 255
    ),
  
    'lastname' => array(
      'type' => 'VARCHAR',
      'constraint' => 255
     
    ),
    'phone' => array(
      'type' => 'VARCHAR',
      'constraint' => 30
      
    ),
  
    'altphone' => array(
      'type' => 'VARCHAR',
      'constraint' => 30
      
    ),
  
    'date' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'gender' => array(
      'type' => 'VARCHAR',
      'constraint' => 10
    ),
  
    'm_status' => array(
      'type' => 'VARCHAR',
      'constraint' => 10
    ),
  
    'residence_address' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'origin_address' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'residence_city' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'residence_lga' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'residence_state' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'origin_city' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'origin_lga' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'origin_state' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),

    
    'id_card' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    
    'profession' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    
    'business_address' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
  
    'kin_name' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'kin_phone' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    'kin_address' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
  
   
    'nin' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    ),
  
    
    'id_image' => array(
      'type' => 'VARCHAR',
      'constraint' => 255,

    ),
  
    'p_image' => array(
      'type' => 'VARCHAR',
      'constraint' => 255,
      'unique' => TRUE
    ),
  
  
    'email' => array(
      'type' => 'VARCHAR',
      'constraint' => 255,
      'unique' => TRUE
    ),
  
  
    'password' => array(
      'type' => 'VARCHAR',
      'constraint' => 200
    )
   );

$this->dbforge->add_field($fields);

// define primary key
$this->dbforge->add_key('memid', TRUE);

// create table
$this->dbforge->create_table('Members',TRUE);

if ($this->db->table_exists('members') )
{
    $create = $this->db->insert('members', $data);
}


    }

    //get Membership data

    public function getUserData($userId = null,$var=null) 
	{
		if($userId) {
			$sql = "SELECT * FROM members WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}

   
    if($var){
      if($var!="pending"){
    $sql = "SELECT * FROM members WHERE account_location =? ORDER BY id DESC";
		$query = $this->db->query($sql, array($var));
		return $query->result_array();

      }

      else{

        $sql = "SELECT * FROM members WHERE account_status =? ORDER BY id DESC";
        $query = $this->db->query($sql, array($var));
        return $query->result_array();
    

      }

    }
    else{
      $sql = "SELECT * FROM members WHERE id != ?   ORDER BY id DESC";
      $query = $this->db->query($sql, array(1));
      return $query->result_array();

    }
	}



  public function getManagers($userId = null){
    if($userId) {
      $sql = "SELECT * FROM members WHERE id = ?";
      $query = $this->db->query($sql, array($userId));
      return $query->row_array();
    }
  
    $sql = "SELECT * FROM members WHERE id != ? AND member_type ='Account Manager' ORDER BY id DESC";
    $query = $this->db->query($sql, array(1));
    return $query->result_array();
  }



  public function edit($data = array(), $id = null, $group_id = null)
{
  $this->db->where('id', $id);
  $update = $this->db->update('users', $data);

 /* if($group_id) {
    // user group
    $update_user_group = array('group_id' => $group_id);
    $this->db->where('user_id', $id);
    $user_group = $this->db->update('user_group', $update_user_group);
    return ($update == true && $user_group == true) ? true : false;	
  }
    */
  return ($update == true) ? true : false;	
}


}









?>