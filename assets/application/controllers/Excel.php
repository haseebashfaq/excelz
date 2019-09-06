<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form','url');
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->helper('date');


    }

  public  function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

	public function index()
	{

        error_reporting(0);
        $ip = $this->get_client_ip();
        $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
        $ipInfo = json_decode($ipInfo);
        $timezone = $ipInfo->timezone;
        date_default_timezone_set($timezone);
        $dateofuser = date('d/m/Y');

        $data['list_of_approved_events'] = $this->user_model->list_of_approved_events();
        $data['upcoming_events'] = $this->user_model->upcoming_events();

        $event_name = $this->input->post('eventname');
        $event_type = $this->input->post('eventtype');
        $country = $this->input->post('country');
        $language = $this->input->post('language');
        $startdate = $this->input->post('start_date');
        $enddate = $this->input->post('end_date'); //temporarily changed for testing.

        //yahan code kia hua thah
        $data['events'] = $this->user_model->search($event_name, $event_type, $country, $language, $startdate, $enddate);
        if (isset($_POST['ajaxRequest']) AND isset($_POST['ajaxSearch'])){
            //echo data and die if ajax request
            //When we do json_encode it converts php objects to json string. Which jqeuery automatically convert string into JSON object.
            //bcoz of dataType in jquery ajax. We will not get string but we get json object.
            echo json_encode($data['events']);
            die(); //we died script here so that it does not process further. ok sahe hai
        }//otherwise continue script.

		$this->load->view('index' , $data);

		//yaha code keru? meh bata raha hon
	}
    public function view_profile()
    {

        if( $this->session->userdata('user_type') == 2)
        {
            $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
            $this->load->view('view_profile' , $data);
        } else{
            $this->load->view('login');
        }

    }
    public function update_user_profile()
    {


        $this->db->set('FullName', $this->input->post('fullname'));
        $this->db->set('Email', $this->input->post('email'));
        $this->db->set('Password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
        $this->db->set('PhoneNo', $this->input->post('phoneno'));
        $this->db->where('Id', $this->session->userdata('user_id'));
        $this->db->update('user');

        echo "<script>alert('Successfully Updated');  window.location.href='view_profile'; </script>";

    }


    public function guidelines()
    {
         $this->load->view('guidelines');

    }

    public function current_promotions()
    {
        $this->load->view('current_promotions');

    }
    public function contact()
    {
        $this->load->view('contact');

    }
    public function calender()
    {
       // redirect('dashboard.php');

       $this->load->view('calender');

    }
    public function recent_events()
    {
        // redirect('dashboard.php');

        $this->load->view('recent_events');

    }
    public function dashboard()
    {
        // redirect('dashboard.php');

        $this->load->view('dashboard');

    }


    public function event_detail()
    {
        $data['events_specific'] = $this->user_model->specific_event($this->input->get('event_id'));
        $data['events_speakers'] = $this->user_model->specific_event_speaker( $this->input->get('event_id'));

        $this->load->view('event_detail', $data);

    }

  public function event_calender(){
      $this->load->view('event');
  }

    public function events()
    {
        $this->load->view('events');

    }
    public function login()
    {
        $this->load->view('login');

    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function news()
    {
        $this->load->view('news');

    }
    public function search_all()
    {
        $this->load->view('search_all');

    }
    public function search_corporate()
    {
        $data['corporate_events'] = $this->user_model->corporate_events();
        //print_r($data['corporate_events']);
        $this->load->view('search_corporate' , $data);

    }
    public function search_ibc()
    {
        $data['ibc_events'] = $this->user_model->ib_events();
        $this->load->view('search_ibc' , $data);

    }
    public function search_all_events()
    {
        $data['all_events'] = $this->user_model->all_events_search();
        $this->load->view('search_all_events' , $data);

    }
    public function signup()
    {
        $this->load->view('signup');

    }
    public function register()
    {

        $password = $this->input->post('password');

        $data = array(
            'FullName' => $this->input->post('fullname'),
            'Email' => $this->input->post('email'),
            'Password' => $hashed_password = password_hash($password, PASSWORD_DEFAULT),
            'PhoneNo' => $this->input->post('phoneno'),
            'UserType' => '2',
            'StatusId' => '1',
            'CreatedAt' => date('Y/m/d'),
            );
        $this->db->insert('user',$data);
        echo '<script>alert("successfully registered"); window.location.href="../signup"; </script>';


    }


    public function deletelisting(){

        $this->user_model->specific_event_del($this->uri->segment(3), $this->session->userdata('user_id'));
        $this->user_model->event_speakers_deleted($this->uri->segment(3));

    }




    public function speakers()
    {
        $this->load->view('speakers');

    }



    public function login_check()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->session->set_flashdata("email_sent", "Congratulation Email Send Successfully.");

        if($this->form_validation->run() == FALSE) {

            $this->load->view("login");

        }

        else {
            //Getting Encrypted text

            $user_login = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),

            );

            //displaying Encrypted text into original format
            $data = $this->user_model->login_user($user_login['email']);
            var_dump($data);

            /*if (password_verify($user_login['password'], $data['Password'])) {
                if ($data['StatusId'] == '3') {
                    $_SESSION['em'] = $this->input->post('email');
                    redirect('login');
                }



                    if ($data['UserType'] == 1) {
                        $data1 = array(
                            'user_id' => $data['Id'],
                            'email' => $data['Email'],
                            'user_type' => $data['UserType'],


                        );
                        $this->session->set_userdata($data1);

                        if ($data) {
                            redirect('admin/index');

                        } else {
                            $this->session->set_flashdata('error_msg', 'Invalid Username,Try again.');
                            $this->load->view("login");


                        }

                    }


                 else {
                    $this->session->set_flashdata('error_msg', 'Email or Password is Incorrect. Try again.');
                    redirect('login');

                }

            }
            else {
                $this->session->set_flashdata('error_msg', 'Email or Password is Incorrect. Try again.');
                redirect('login_check');


            }*/
        }




    }




    public function search_events()
    {
        $event_name = $this->input->post('eventname');
        $event_type = $this->input->post('eventtype');
        $country = $this->input->post('country');
        $startdate = $this->input->post('start_date');
        $enddate = $this->input->post('end_date');
        $data['events'] = $this->user_model->search($event_name, $event_type, $country, $startdate, $enddate);
        $this->load->view('search_all',$data);



    }





}
