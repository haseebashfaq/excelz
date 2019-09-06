<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form','url');
        $this->load->library('form_validation');
        $this->load->model('user_model');

      if($this->session->userdata('user_type') != 1){
            redirect('login');
        }

    }



    public function index()
    {

        if ($this->session->userdata('user_type') == 1) {

            $data['events_all'] = $this->user_model->list_all_events();

            $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));

            $this->load->view('admin/index' , $data );

        } else {
            $this->load->view('login');
        }

    }

    public function manage_events()
    {

        $data['events_all'] = $this->user_model->list_all_events();

        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));

        $this->load->view('admin/manage_events' , $data );

    }

    public function deletelisting(){

        $this->user_model->event_del($this->uri->segment(3));
        $this->user_model->event_speakers_deleted($this->uri->segment(3));

    }


    public function ajax_event_id_edit($id)
    {
        $data = $this->user_model->get_by_event_id($id);
        echo json_encode($data[0]);

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


            $data = array(

                'EventName' => $this->input->post('eventname'),
                'EventCategoryId' => $this->input->post('eventcategory'),
                'EventTypeId' => $this->input->post('eventtype'),
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
                'StartDate' => $this->input->post('startdate'),
                'EndDate' => $this->input->post('enddate'),
                'RegistrationTime' => $this->input->post('registrationtime'),
                'EventStartTime' => $this->input->post('eventstarttime'),
                'EventEndTime' => $this->input->post('eventendtime'),
                'TicketPrice' => $this->input->post('ticketprice'),
                'AdditionalInformation' => $this->input->post('additionalinformation'),
                'EventCoverPhoto' => (empty($_FILES['eventcoverphoto']['name'])) ? 'assets/img/events/no_event.png' : 'assets/img/events/' . $_FILES["eventcoverphoto"]["name"],
                'RegistrationUrl' => $this->input->post('registrationurl'),
                'StatusId' => '2',
                'EventCreator_UserId' => $this->session->userdata('user_id'),
                'CreatedAt' => date("Y/m/d"),
                'gmt' => $this->input->post('gmt')


            );

            $this->db->insert('event', $data);


            $event_id = $this->user_model->get_event_id();


            $data2 = array(
                array(
                    'EventId' => $event_id->id,
                    'FullName' => $this->input->post('speaker1'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker1']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/' . $_FILES["upload_speaker1"]["name"],
                ),
                array(
                    'EventId' => $event_id->id,
                    'FullName' => $this->input->post('speaker2'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker2']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/' . $_FILES["upload_speaker2"]["name"],
                ),
                array(
                    'EventId' => $event_id->id,
                    'FullName' => $this->input->post('speaker3'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker3']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/' . $_FILES["upload_speaker3"]["name"],
                ),
                array(
                    'EventId' => $event_id->id,
                    'FullName' => $this->input->post('speaker4'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker4']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/' . $_FILES["upload_speaker4"]["name"],
                ),

            );



            $this->db->insert_batch('speakers', $data2);


            echo "<script>alert('Successfully Added');  window.location.href='manage_events'; </script>";
        }
        else  {
            $eventphoto = $this->input->post('eventcoverphoto2');
            $data3 = array(

                'EventName' => $this->input->post('eventname'),
                'Subtitle' => $this->input->post('eventsubtitle'),
                'EventCategoryId' => $this->input->post('eventcategory'),
                'EventTypeId' => $this->input->post('eventtype'),
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
                'StartDate' => $this->input->post('startdate1'),
                'EndDate' => $this->input->post('enddate1'),
                'RegistrationTime' => $this->input->post('registrationtime1'),
                'StartDate2' => $this->input->post('startdate2'),
                'EndDate2' => $this->input->post('enddate2'),
                'RegistrationTime2' => $this->input->post('registrationtime2'),
                'StartDate3' => $this->input->post('startdate3'),
                'EndDate3' => $this->input->post('enddate3'),
                'RegistrationTime3' => $this->input->post('registrationtime3'),
                'EventStartTime' => $this->input->post('eventstarttime'),
                'EventEndTime' => $this->input->post('eventendtime'),
                'TicketPrice' => $this->input->post('ticketprice'),
                'AdditionalInformation' => $this->input->post('additionalinformation'),
                'EventCoverPhoto' =>  (!empty($eventphoto) ? (!empty($eventphoto) ? $eventphoto : 'assets/img/events/no_event.png') : (empty($_FILES['eventcoverphoto']['name']) ? 'assets/img/events/no_event.png' : 'assets/img/events/' . $_FILES["eventcoverphoto"]["name"])),
                'RegistrationUrl' => $this->input->post('registrationurl'),
                'StatusId' => '2',
                'CreatedAt' => date("Y/m/d"),
                'gmt' => $this->input->post('gmt'),
                'language_id' => $this->input->post('language')
                 );

            $event_idc = $this->user_model->get_event_id();

            $this->db->where('Id',$event_idc->id);
            $this->db->update('event',$data3);

            $event_ids = $this->user_model->get_event_id();
            $speaker_id = $this->user_model->get_speakers_id($event_ids->id);

            $data2 = array(
                array(
                    'Id' =>  $speaker_id[0]['Id'],
                    'EventId' => $event_ids->id,
                    'FullName' => $this->input->post('speaker1'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker1']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/'.$_FILES["upload_speaker1"]["name"],
                ),
                array(
                    'Id' =>  $speaker_id[1]['Id'],
                    'EventId' =>$event_ids->id,
                    'FullName' => $this->input->post('speaker2'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker2']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/'.$_FILES["upload_speaker2"]["name"],
                ),
                array(
                    'Id' =>  $speaker_id[2]['Id'],
                    'EventId' =>$event_ids->id,
                    'FullName' => $this->input->post('speaker3'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker3']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/'.$_FILES["upload_speaker3"]["name"],
                ),
                array(
                    'Id' =>  $speaker_id[3]['Id'],
                    'EventId' =>$event_ids->id,
                    'FullName' => $this->input->post('speaker4'),
                    'DisplayPicture' => (empty($_FILES['upload_speaker4']['name'])) ? 'backend/upload/no_image.jpg' : 'backend/upload/'.$_FILES["upload_speaker4"]["name"],
                ),

            );

            $this->db->update_batch('speakers', $data2, 'Id');


            echo "<script>alert('Successfully Updated');  window.location.href='manage_events'; </script>";

        }

    }
    public function ajax_update_event_userid_edit($id)
    {

        $data = $this->user_model->get_by_event_id_user($id);
        $this->output->set_content_type('application/json');
        echo json_encode($data);

    }


    public function specific_event_delete()
    {

        $this->user_model->update_event_table($this->uri->segment(3));

    }
    public function add_user_form(){
        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
        $this->load->view('admin/add_users',$data);
    }
    public function add_wb_recordings_form(){
        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
        $this->load->view('admin/add_wb_recordings',$data);
    }
    public function add_event_category_form(){
        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
        $this->load->view('admin/add_event_category',$data);
    }
    public function add_event_type_form(){
        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
        $this->load->view('admin/add_event_type',$data);
    }
    public function add_guidelines_form(){
        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
        $this->load->view('admin/add_guidelines',$data);
    }
    public function add_current_promotions_form(){
        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
        $this->load->view('admin/add_current_promotions',$data);
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



    public function view_profile()
    {

        if( $this->session->userdata('user_type') == 1)
        {
            $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));
            $this->load->view('admin/view_profile' , $data);
        } else{
            $this->load->view('login');
        }

    }


    public function update_event_status(){

        $Id =   $this->input->post('Id');
        $EventName =   $this->input->post('EventName');
        $Venue = $this->input->post('Venue');
        $StatusId = $this->input->post('StatusId');


        $this->user_model->updat_event_status_model($EventName, $Venue, $StatusId,  $Id);

        redirect('admin/index');


    }






    public function add_users()
    {

        $data = array(

            'FullName' => $this->input->post('fullname'),
            'Email' => $this->input->post('email'),
            'PhoneNo' => $this->input->post('phoneno'),
            'Password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'UserType' => $this->input->post('usertype'),
            'StatusId	' => $this->input->post('status'),
            'CreatedAt' => date("Y/m/d")
);

        $this->db->insert('user', $data);
        echo '<script>alert("successfully registered"); window.location.href="add_user_form"; </script>';



    }
    public function add_event_category()
    {

        $data = array(

            'CategoryName	' => $this->input->post('name')

        );

        $this->db->insert('eventcategory', $data);
        echo '<script>alert("successfully added"); window.location.href="add_event_category_form"; </script>';



    }
    public function add_wb_recordings()
    {

        $data = array(

            'path' => $this->input->post('path')

        );

        $this->db->insert('webinar_recordings', $data);
        echo '<script>alert("successfully added"); window.location.href="add_wb_recordings_form"; </script>';



    }


    public function add_current_promotions()
    {
        $uploaddir = 'assets/img/promotions/';
        $uploadfile = $uploaddir . basename($_FILES['picture']['name']);
        move_uploaded_file($_FILES['picture']['tmp_name'], $uploadfile);

        $data = array(

            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'picture' =>  (empty($_FILES['picture']['name'])) ? 'assets/img/promotions/no_event.png' : 'assets/img/promotions/'.$_FILES["picture"]["name"]

        );

        $this->db->insert('current_promotions', $data);
        echo '<script>alert("successfully added"); window.location.href="add_current_promotions_form"; </script>';



    }
    public function add_guidelines()
    {
        $count = $this->user_model->getCount();
        $count++;
        $data = array(
            'question_id' => $count,
            'question' => $this->input->post('question'),
            'answer' => $this->input->post('answer')
         );

        $this->db->insert('guidelines', $data);
        echo '<script>alert("successfully added"); window.location.href="add_guidelines_form"; </script>';


    }
    public function add_event_type()
    {

        $data = array(

            'EventTypeName	' => $this->input->post('name')

        );

        $this->db->insert('eventtype', $data);
        echo '<script>alert("successfully added"); window.location.href="add_event_type_form"; </script>';



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
            'role_id' =>  $this->input->post('role'),
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



    public function view_users()
    {
        $data['users'] = $this->user_model->list_all_users();

        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));

        $this->load->view('admin/view_users' , $data );



    }
    public function event_category()
    {
        $data['categories'] = $this->user_model->list_all_event_categories();

        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));

        $this->load->view('admin/view_event_category' , $data );



    }
    public function event_type()
    {
        $data['types'] = $this->user_model->list_all_event_types();

        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));

        $this->load->view('admin/view_event_type' , $data );



    }
    public function current_promotions()
    {
        $data['current_promotions'] = $this->user_model->list_all_current_promotions();

        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));

        $this->load->view('admin/view_current_promotions' , $data );



    }

    //R
    public function guidelines()
    {
        $data['guidelines'] = $this->user_model->list_all_guidelines();

        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));

        $this->load->view('admin/view_guidelines' , $data );
 }
    public function wb_recordings()
    {
        $data['wb_recordings'] = $this->user_model->list_all_wb_recordings();

        $data['profiles'] = $this->user_model->profile($this->session->userdata('user_id'));

        $this->load->view('admin/view_wb_recordings' , $data );
    }

    public function getGuidelineById($id){
        $result = $this->user_model->getGuidelineById($id);
        echo json_encode($result);

    }
    public function getWebinarRecordingById($id){
        $result = $this->user_model->getWebinarRecordingById($id);
        echo json_encode($result);

    }
    public function updateGuidelines(){
        $question_id = $this->input->post('question_id');
        $data = array(

            'question' => $this->input->post('question'),
            'answer' => $this->input->post('answer')


        );
        $this->db->where('question_id',$question_id);
        $this->db->update('guidelines', $data);
        echo '<script>alert("successfully updated"); window.location.href="guidelines"; </script>';


    }
    public function updateWebinarRecordings(){
        $id = $this->input->post('id');
        $data = array(

            'path' => $this->input->post('path'),


        );
        $this->db->where('id',$id);
        $this->db->update('webinar_recordings', $data);
        echo '<script>alert("successfully updated"); window.location.href="wb_recordings"; </script>';


    }
    public function deleteGuidelines($id){
        $this->db->where('question_id',$id);
        $this->db->delete('guidelines');
    }
    public function deleteWebinarRecordings($id){
        $this->db->where('id',$id);
        $this->db->delete('webinar_recordings');
    }
    public function getUserById($id){
        $result = $this->user_model->getUserById($id);
        echo json_encode($result);

    }
    public function updateUser(){
        $user_id = $this->input->post('user_id');
        $data = array(

            'FullName' => $this->input->post('name'),
            'Email' => $this->input->post('email'),
            'PhoneNo' => $this->input->post('phoneno'),
            'Password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'StatusId' => $this->input->post('status')
 );
        $this->db->where('Id',$user_id);
        $this->db->update('user', $data);
        echo '<script>alert("successfully updated"); window.location.href="view_users"; </script>';


    }
}
?>