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
        $this->db->where(array('shorturl' => $shorturl, 'user_id' => $_SESSION['id']) );
        $query = $this->db->get($this->url_table); 
        return $query->result_array();
    }

    public function register_visit($id)
    {
        $this->db->query('UPDATE `urls` SET cont=cont+1 WHERE id=?', $id);
    }

    public function create($data)
    {        
        $result = $this->db->query('SELECT * FROM  `urls` 
                                    WHERE ( shorturl =  ? OR longurl =  ?)
                                    AND user_id =?', $data['shorturl'], $data['longurl'], $data['user_id']);
        if( count($result) == 0)
            $this->db->insert($this->url_table, $data);
        
    }
}