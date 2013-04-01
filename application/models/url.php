<?php defined('SYSPATH') OR die('No direct access allowed.');
 
class Url_Model extends Model
{
    private $url_table;
  
    public function __construct()
    {
        parent::__construct();
        $this->url_table = 'urls';
    }
       
    public function read($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get($this->url_table); 
        return $query->result_array();
    }
    public function find_by_shorturl($shorturl)
    {
        $this->db->where('shorturl', $shorturl);
        $query = $this->db->get($this->url_table); 
        return $query->result_array();
    }
    public function create($data)
    {
        $this->db->insert($this->url_table, $data);
    }
}