<?php defined('SYSPATH') OR die('No direct access allowed.');
     
class User_Controller extends Controller
{
    private $user_model; 
    private $url_model;

    private $list_view;
    private $create_view;
    private $show_view;
    private $login_view;
  
    public function __construct()    
    { 
        parent::__construct();
        $this->user_model = new User_Model;
        $this->url_model = new Url_Model;
        $this->list_view = new View('list');
        $this->show_view = new View('show');
        $this->create_view = new View('create');
        $this->login_view = new View('login');
    }
  
    public function index()
    {
        $this->show_users_list();
    }
         
    private function show_users_list()
    {
        $users_list = $this->user_model->get_list(); 
        $this->list_view->set('users_list',$users_list);
        $this->list_view->render(TRUE); 
    }
     
    public function show($id)
    {
        $user_data = $this->user_model->read($id);
        $user_urls = $this->url_model->read($id);

        $this->show_view->set('user_id',$user_data[0]->id);
        $this->show_view->set('name',$user_data[0]->name);
        $this->show_view->set('email',$user_data[0]->email);
        $this->show_view->set('password',$user_data[0]->password);
        $this->show_view->set('user_urls', $user_urls);
        $this->show_view->render(TRUE);
    }
  
    public function create()
    { 
        $user_data=array(
            'name'      => $this->input->post('name'),
            'email'     => $this->input->post('email'),
            'password'  => $this->input->post('password')
        );
        $this->user_model->create($user_data);
        url::redirect('user');
    }

    public function show_create_editor()
    {
        $this->create_view->render(TRUE);
    }
  
    public function update()
    { 
        $user_data=array(
            'name'      => $this->input->post('name'),
            'email'     => $this->input->post('email'),
            'password'  => $this->input->post('password')
        );
        $this->user_model->update($this->input->post('user_id'),$user_data);
        url::redirect('user');
    }

    public function log_in(){
        $this->login_view->render(TRUE);
    }
    public function create_session(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        if( $this->user_model->validate($email, $password) )
            $_SESSION['email'] = $email;

        url::redirect('user');

    }
    public function destroy_session(){
        $_SESSION['email'] = "";
        url::redirect('user');
    }
}