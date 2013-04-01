<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class User_Model extends Model
{
    private $user_table;
  
    public function __construct()
    {
        parent::__construct();
        $this->user_table = 'users';
    }
       
    public function read($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->user_table); 
        return $query->result_array();
    }
    public function find_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->user_table); 
        return $query->result_array();
    }   

    public function update($id,$data)
    {
        $this->db->update($this->user_table, $data, array('id' => $id));
    }
       
    public function create($data)
    {
        $this->db->insert($this->user_table, $data);
    }
      
    public function get_list()
    {
        $this->db->select('users.id as id,users.name as name,users.email as email, users.password as password');  
        $this->db->from($this->user_table);  
        $query = $this->db->get();
        return $query->result_array();
    }
    public function validate($email, $pass){

        $this->db->where(array('email' => $email, 'password' => $pass) );
        $query = $this->db->get($this->user_table); 
        $arr = $query->result_array();
        if( count($arr) == 0)
          return false;
        
        return true;
    }
}