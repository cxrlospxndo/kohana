<?php defined('SYSPATH') OR die('No direct access allowed.');
     
class Url_Controller extends Controller
{
    private $url_model;

    public function __construct()    
    { 
        parent::__construct();
        $this->url_model = new Url_Model;
    }
  
    public function create($user_id)
    { 
        $url_data=array(
            'titulo'     => $this->input->post('titulo'),
            'shorturl' => $this->input->post('shorturl'),
            'longurl'  => $this->input->post('longurl'),
            'user_id' => $user_id
        );
        $this->url_model->create($url_data);
        url::redirect('user/show/'.$user_id);
    }

}