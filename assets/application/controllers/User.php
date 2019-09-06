<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'backend/PHPMailer/class.smtp.php';
require 'backend/PHPMailer/class.phpmailer.php';
class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form','url');
        $this->load->library('form_validation');
        $this->load->model('user_model');


    }



    public function index()
    {

        if ($this->session->userdata('user_type') == 2) {

            $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));

            $this->load->view('user/index' , $data );

        } else {
            $this->load->view('login');
        }

    }





    public function ajax_update_event_userid_edit($id)
    {

        $data = $this->user_model->get_by_event_id_user($id);
        $this->output->set_content_type('application/json');
        echo json_encode($data);

    }

    public function newsletter(){

        $data = array(
            'email' => $this->input->post('email'),
            'country_id' => $this->input->post('Country'),

        );

        $this->db->insert('newsletter', $data);
        echo "<script>alert('Successfully Subscribed');  window.location.href='../index'; </script>";


    }

    public function reg_event()
    {
        error_reporting(0);
        $value = $_POST['Submitadd'];

        if($value != '') {

            $uploaddir = 'assets/img/events/';
            $uploadfile = $uploaddir . basename($_FILES['eventcoverphoto']['name']);
            move_uploaded_file($_FILES['eventcoverphoto']['tmp_name'], $uploadfile);

            $uploaddir = 'backend/upload/';
            $uploadfile = $uploaddir . basename('speaker1' . $_FILES['upload_speaker1']['name']);
            move_uploaded_file($_FILES['upload_speaker1']['tmp_name'], $uploadfile);

            $uploaddir = 'backend/upload/';
            $uploadfile = $uploaddir . basename('speaker2' . $_FILES['upload_speaker2']['name']);
            move_uploaded_file($_FILES['upload_speaker2']['tmp_name'], $uploadfile);

            $uploaddir = 'backend/upload/';
            $uploadfile = $uploaddir . basename('speaker3' . $_FILES['upload_speaker3']['name']);
            move_uploaded_file($_FILES['upload_speaker3']['tmp_name'], $uploadfile);

            $uploaddir = 'backend/upload/';
            $uploadfile = $uploaddir . basename('speaker4' . $_FILES['upload_speaker4']['name']);
            move_uploaded_file($_FILES['upload_speaker4']['tmp_name'], $uploadfile);

            $eventphotosd = $this->input->post('eventcoverphoto2');
            $data = array(

                'EventName' => $this->input->post('eventname'),
                'Subtitle' => $this->input->post('eventsubtitle'),
                'EventCategoryId' => $this->input->post('eventcategory'),
                'EventTypeId' => $this->input->post('eventtype2'),
                'Venue' => $this->input->post('venue'),
                'StreetAddress' => $this->input->post('streetaddresss'),
                'State' => $this->input->post('state'),
                'City' => $this->input->post('city'),
                'ZipCode' => $this->input->post('zipcode'),
                'Country' => $this->input->post('Country'),
                'EventSize' => $this->input->post('EventSize'),
                'ContactPersonName' => $this->input->post('contactpersonname'),
                'ContactPersonEmail' => $this->input->post('contactpersonemail'),
                'ContactPersonPhone' => $this->input->post('contactpersonphone'),
                'DayType' => $this->input->post('daytype'),
                'Startdate' => $this->input->post('startdate'),
                'Enddate' => $this->input->post('enddate'),
                'Regtimeone' => $this->input->post('regtimeone'),
                'Regtimetwo' => $this->input->post('regtimetwo'),
                'Regtimethree' => $this->input->post('regtimethree'),
                'Starttimeone' => $this->input->post('starttimeone'),
                'Starttimetwo' => $this->input->post('starttimetwo'),
                'Starttimethree' => $this->input->post('starttimethree'),
                'Endtimeone' => $this->input->post('endtimeone'),
                'Endtimetwo' => $this->input->post('endtimetwo'),
                'Endtimethree' => $this->input->post('endtimethree'),
                'Currency' => $this->input->post('currency'),
                'TicketPrice' => $this->input->post('ticketprice'),
                'AdditionalInformation' => $this->input->post('additionalinformation'),
                'EventCoverPhoto' =>  (!empty($eventphotosd) ? (!empty($eventphotosd) ? $eventphotosd : 'assets/img/events/no_event.png') : (empty($_FILES['eventcoverphoto2']['name']) ? 'assets/img/events/no_event.png' : 'assets/img/events/' . $_FILES["eventcoverphoto2"]["name"])),
                'RegistrationUrl' => $this->input->post('registrationurl'),
                'StatusId' => '2',
                'EventCreator_UserId' => $this->session->userdata('user_id'),
                'CreatedAt' => date("Y/m/d"),
                 'gmt' => $this->input->post('gmt'),
                'language_id' => $this->input->post('language')


            );


            $this->db->insert('event', $data);


            $event_id = $this->user_model->get_event_id();


            $data2 = array(
                array(
                    'EventId' => $event_id->id,
                    'FullName' => $this->input->post('speaker1'),
                    'role' => $this->input->post('role1'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker1']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/speaker1' . $_FILES["upload_speaker1"]["name"],
                ),
                array(
                    'EventId' => $event_id->id,
                    'FullName' => $this->input->post('speaker2'),
                    'role' => $this->input->post('role2'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker2']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/speaker2' . $_FILES["upload_speaker2"]["name"],
                ),
                array(
                    'EventId' => $event_id->id,
                    'FullName' => $this->input->post('speaker3'),
                    'role' => $this->input->post('role3'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker3']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/speaker3' . $_FILES["upload_speaker3"]["name"],
                ),
                array(
                    'EventId' => $event_id->id,
                    'FullName' => $this->input->post('speaker4'),
                    'role' => $this->input->post('role4'),
                        'DisplayPicture' => (empty($_FILES['upload_speaker4']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/speaker4' . $_FILES["upload_speaker4"]["name"],
                ),

            );


            $this->db->insert_batch('speakers', $data2);

          echo "<script>alert('Successfully Added');  window.location.href='../dashboard'; </script>";
        }
        else  {
            $eventphoto = $this->input->post('eventcoverphoto2');
            $data3 = array(

                'EventName' => $this->input->post('eventname'),
                'Subtitle' => $this->input->post('eventsubtitle'),
                'EventCategoryId' => $this->input->post('eventcategory'),
                'EventTypeId' => $this->input->post('eventtype2'),
                'Venue' => $this->input->post('venue'),
                'StreetAddress' => $this->input->post('streetaddresss'),
                'State' => $this->input->post('state'),
                'City' => $this->input->post('city'),
                'ZipCode' => $this->input->post('zipcode'),
                'Country' => $this->input->post('Country'),
                'EventSize' => $this->input->post('EventSize'),
                'ContactPersonName' => $this->input->post('contactpersonname'),
                'ContactPersonEmail' => $this->input->post('contactpersonemail'),
                'ContactPersonPhone' => $this->input->post('contactpersonphone'),
                'Startdate' => $this->input->post('startdate'),
                'Enddate' => $this->input->post('enddate'),
                'Regtimeone' => $this->input->post('regtimeone'),
                'Regtimetwo' => $this->input->post('regtimetwo'),
                'Regtimethree' => $this->input->post('regtimethree'),
                'Starttimeone' => $this->input->post('starttimeone'),
                'Starttimetwo' => $this->input->post('starttimetwo'),
                'Starttimethree' => $this->input->post('starttimethree'),
                'Endtimeone' => $this->input->post('endtimeone'),
                'Endtimetwo' => $this->input->post('endtimetwo'),
                'Endtimethree' => $this->input->post('endtimethree'),
                'Currency' => $this->input->post('currency'),
                'TicketPrice' => $this->input->post('ticketprice'),
                'AdditionalInformation' => $this->input->post('additionalinformation'),
                'EventCoverPhoto' =>  (!empty($eventphoto) ? (!empty($eventphoto) ? $eventphoto : 'assets/img/events/no_event.png') : (empty($_FILES['eventcoverphoto2']['name']) ? 'assets/img/events/no_event.png' : 'assets/img/events/' . $_FILES["eventcoverphoto2"]["name"])),
                'RegistrationUrl' => $this->input->post('registrationurl'),
                //'StatusId' => '2',
                'EventCreator_UserId' => $this->session->userdata('user_id'),
                'CreatedAt' => date("Y/m/d"),
                'gmt' => $this->input->post('gmt'),
                'language_id' => $this->input->post('language')


            );

            $event_idc = $this->user_model->get_event_id_update($this->input->post('id'));

            $this->db->where('Id',$event_idc->Id);
            $this->db->update('event',$data3);

            $event_ids = $this->user_model->get_event_id_update($this->input->post('id'));

            $speaker_id = $this->user_model->get_speakers_id($event_ids->Id);

            $data4 = array(
                array(
                    'Id' =>  $speaker_id[0]['Id'],
                    'EventId' => $event_ids->Id,
                    'FullName' => $this->input->post('speaker1'),
                    'role' => $this->input->post('role1'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker1']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/speaker1'.$_FILES["upload_speaker1"]["name"],
                ),
                array(
                    'Id' =>  $speaker_id[1]['Id'],
                    'EventId' =>$event_ids->Id,
                    'FullName' => $this->input->post('speaker2'),
                    'role' => $this->input->post('role2'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker2']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/speaker2'.$_FILES["upload_speaker2"]["name"],
                ),
                array(
                    'Id' =>  $speaker_id[2]['Id'],
                    'EventId' =>$event_ids->Id,
                    'FullName' => $this->input->post('speaker3'),
                    'role' => $this->input->post('role3'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker3']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/speaker3'.$_FILES["upload_speaker3"]["name"],
                ),
                array(
                    'Id' =>  $speaker_id[3]['Id'],
                    'EventId' => $event_ids->Id,
                    'FullName' => $this->input->post('speaker4'),
                    'role' => $this->input->post('role4'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker4']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/speaker4'.$_FILES["upload_speaker4"]["name"],
                ),

            );

            $this->db->update_batch('speakers', $data4, 'Id');


           echo "<script>alert('Successfully Updated');  window.location.href='../dashboard'; </script>";

        }

    }



    public function add_event(){

        if ($this->session->userdata('user_type') == 2) {


            $this->load->view('user/add_events');
        }
        else{
            $this->load->view('login_signin');
        }
    }

    public function view_events()
    {

        if ($this->session->userdata('user_type') == 2) {


            $data['events_all'] = $this->user_model->list_events();
            $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
         //   $data['clinicname'] = $this->user_model->combo_clinicname();
           // $data['role'] = $this->user_model->combo_role();

            $this->load->view('user/view_events', $data);

        } else {
            $this->load->view('login_signin');
        }

    }



    public function add_users()
    {

        if( $this->session->userdata('user_type') == 4)
        {
            $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
            $this->load->view('webmaster/add_users' , $data);


        } else{
            $this->load->view('login_signin');
        }


    }


    public function add_user()
    {

        $rows = $this->doctor_model->getCount();
        $rows2 = 1;
        $value =   $rows[0]['user_id']  + $rows2;

        $c_salt=$this->doctor_model->generate_salt();
        $c_pass = $this->doctor_model->hash_password($c_salt,$this->input->post('password'));

        $data = array(

            'user_id' => $value,
            'email' => $this->input->post('email'),
            'password' => $c_pass,
            'salt' => $c_salt,
            'status' => 'active',
            'user_type' =>  $this->input->post('role'),
            'created_on' => date("Y/m/d"),
            'added_by_userid' => $this->session->userdata('user_id'),
        );


        $this->db->insert('tbl_user_login', $data);


        $data2 = array(

            'user_id' => $data['user_id'],
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'gender' => $this->input->post('gender'),
            'mobile_no' => $this->input->post('mobile_no'),
            'pmdc_no' => '',
            'profile_picture' => (empty($_FILES["file"]["name"])) ? 'assets/images/user_profile/fmd.png' : 'assets/images/user_profile/'.$_FILES["file"]["name"],


        );

        $this->db->insert('tbl_user_details', $data2);

        $config = array(
            'upload_path' => "./assets/images/user_profile",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        $this->upload->do_upload('file');
        $filename = $this->upload->data();
        $data3 = $_FILES['file']['name'];

        echo "<script>alert('Successfully Added');  window.location.href='add_users'; </script>";

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


        $this->db->set('FullName', $this->input->post('FullName'));
        $this->db->set('Email', $this->input->post('Email'));
        $this->db->set('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
        $this->db->where('Id', $this->session->userdata('user_id'));
        $this->db->update('user');



        if($this->input->post('password') != '') {
           echo 'please fill password';
        }


        echo "<script>alert('Successfully Updated');  window.location.href='view_profile'; </script>";

    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }



}
?>