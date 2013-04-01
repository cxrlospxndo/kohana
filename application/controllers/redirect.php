<?php defined('SYSPATH') OR die('No direct access allowed.');
     
class Redirect_Controller extends Controller
{
    private $url_model;

    public function __construct()    
    { 
        parent::__construct();
        $this->url_model = new Url_Model;
    }
  
    public function index($var)
    { 
        //$url_data = $this->url_model->find_by_shorturl($shorturl);
        //$url = (array)$url_data[0];
        $str = (string) $var;
        $url_data = $this->url_model->find_by_shorturl($str);
        $url = (array)$url_data[0];        
        url::redirect($url['longurl']);
    }

}