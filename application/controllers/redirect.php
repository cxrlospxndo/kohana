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
        if($_SESSION['id'] != -1){
            $str = (string) $var;
            $url_data = $this->url_model->find_by_shorturl($str);
            $url = (array)$url_data[0];    


            if (false === strpos($url['longurl'], '://')) {
                $url['longurl'] = 'http://' . $url['longurl'];
            }

            $this->url_model->register_visit($url['id']);
            url::redirect($url['longurl']);
        }
        else{
            url::redirect('user');
        }
    }

}