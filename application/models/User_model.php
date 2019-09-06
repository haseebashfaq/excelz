<?php
class User_model extends CI_model
{

    public function get_users()
    {
        $user = $this->input->post('email');

        $this->db->select("password");
        $this->db->from("user");
        $this->db->where("email", $user);

        $query = $this->db->get();
        return $result = $query->row_array();

    }
    public function getCount(){
        $query = $this->db->query('select max(question_id) as question_id from guidelines');
        $count = $query->row();
        if($count->question_id != null){
            return $count->question_id;
        }
        else{
            return 0;
        }
    }


    public function list_events(){
        $query = $this->db->query('Select * from event order by id asc');
        return $query->result_array();
    }
    public function list_all_wb_recordings(){
        $query = $this->db->query('Select * from webinar_recordings order by id asc');
        return $query->result_array();
    }


    public function corporate_events(){
        $query = $this->db->query('Select *, event.Id as eventid from event join language ON event.language_id = language.Id join eventtype ON eventtype.Id = event.EventTypeId JOIN eventcategory on event.EventCategoryId = eventcategory.Id join country ON country.Id = event.Country where event.EventCategoryId = 2 AND event.StatusId = 1 AND event.StartDate > curdate() order by event.StartDate asc');
        return $query->result_array();
    }


    public function ib_events(){
        $query = $this->db->query('Select *, event.Id as eventid from event join language ON event.language_id = language.Id join eventtype ON eventtype.Id = event.EventTypeId JOIN eventcategory on event.EventCategoryId = eventcategory.Id join country ON country.Id = event.Country where event.EventCategoryId = 3 AND event.StatusId = 1 AND event.StartDate > curdate() order by event.StartDate asc');
        return $query->result_array();
    }

    public function all_events_search(){
        $query = $this->db->query('Select *, event.Id as eventid from event join language ON event.language_id = language.Id join eventtype ON eventtype.Id = event.EventTypeId JOIN eventcategory on event.EventCategoryId = eventcategory.Id join country ON country.Id = event.Country where event.StatusId = 1 AND event.StartDate > curdate() order by event.StartDate asc');
        return $query->result_array();
    }


    public function specific_event($id){
        $this->db->select('*');
        $this->db->from('event');
        $this->db->join('eventtype', 'eventtype.Id = event.EventTypeId');
        $this->db->join('eventcategory', 'eventcategory.Id = event.EventCategoryId');
        $this->db->join('country', 'country.Id = event.Country');
        $this->db->where('event.Id', $id);
        $this->db->group_by('event.Id');
        $data = $this->db->get()->result_array();

        return $data;
    }

    public function specific_event_speaker($id){
        $this->db->select('*');
        $this->db->from('speakers');
        $this->db->where('EventId', $id);
        $data = $this->db->get()->result_array();
        return $data;

    }


    public function get_event_id()
    {
        $query = $this->db->query('select max(id) as id from event');
        return $query->row();

    }


    public function get_event_id_update($id)
    {
        $this->db->select('Id');
        $this->db->from('event');
        $this->db->where('Id', $id);
        $data = $this->db->get()->row();
        return $data;

    }


     public function get_speakers_id($eventid)
    {

        $this->db->select('Id');
        $this->db->from('speakers');
        $this->db->where('EventId',$eventid);

        if($query=$this->db->get())
        {
            return $query->result_array();
        }
        else{
            return false;
        }


    }





    //list all user events
    public function list_all_events(){
        $query = $this->db->query('Select event.id , event.EventName, event.Venue, user.Email, event.CreatedAt , status.StatusName from event join status on event.StatusId = status.id join user ON event.EventCreator_UserId = user.Id order by event.id asc');
        return $query->result_array();
    }

    public function list_all_users(){
        $query = $this->db->query('select user.Id ,user.FullName, user.Email, user.PhoneNo, user.UserType, status.StatusName, user.CreatedAt from user join status on user.StatusId = status.Id order by user.Id ASC');
        return $query->result_array();
    }
    public function list_all_event_categories(){
        $query = $this->db->query('select * from eventcategory order by Id ASC');
        return $query->result_array();
    }
    public function list_all_event_types(){
        $query = $this->db->query('select * from eventtype order by Id asc');
        return $query->result_array();
    }

    public function list_of_approved_events(){
        $query = $this->db->query("Select *, event.Id as eventid from event join language ON event.language_id = language.Id join eventtype ON eventtype.Id = event.EventTypeId JOIN eventcategory on event.EventCategoryId = eventcategory.Id join country ON country.Id = event.Country where event.StatusId = 1 AND event.StartDate > curdate() order by event.StartDate asc");
        return $query->result_array();
    }

    public function list_all_guidelines(){
        $query = $this->db->query("Select * from guidelines order by question_id asc");
        return $query->result_array();
    }
    public function list_all_current_promotions(){
        $query = $this->db->query("Select * from current_promotions order by id asc");
        return $query->result_array();
    }

    //ajax to update event status
    public function get_by_event_id($id){
        $query = $this->db->query('Select * from event where Id = '.$id.'');
        return $query->result_array();
    }

    public function update_event_table($id){
        $query =  $this->db->query('DELETE FROM event where Id = '.$id.'');
        return $query;
    }


    public function specific_event_del($delete_id, $user_id){
        $query =  $this->db->query('DELETE FROM event WHERE id= '.$delete_id.' AND EventCreator_UserId = '.$user_id);
        return $query;
    }
    public function event_del($delete_id){
        $query =  $this->db->query('DELETE FROM event WHERE id= '.$delete_id);
        return $query;
    }


    public function event_speakers_deleted($delete_id){
        $query =  $this->db->query('DELETE FROM speakers WHERE EventId= '.$delete_id);
        return $query;
    }

    public function update_event($p0, $p1, $p2, $p3, $p4, $p5, $p6 ,$p7 ,$p8, $p9, $p10, $p11 ,$p12, $p13, $p14, $p15, $p16 ,$p17, $p18 ,$p19, $p20, $p21, $p22 ,$p23, $p24 ,$p25, $p26 ){

        $query = $this->db->query("UPDATE event SET EventName ='$p0', EventCategoryId = '$p1', EventTypeId =  '$p2', Venue = '$p3', StreetAddress = '$p4', State =  '$p5', City = '$p6', ZipCode = '$p7', Country = '$p8',	EventSize = '$p9',ContactPersonName = '$p10',ContactPersonEmail = '$p11',ContactPersonPhone = '$p12',StartDate = '$p13',EndDate = '$p14' ,	RegistrationTime = '$p15' , EventStartTime = '$p16' , EventEndTime = '$p17', TicketPrice = '$p18', AdditionalInformation = '$p19', EventCoverPhoto = '$p20', RegistrationUrl = '$p21',  StatusId = '$p22', EventCreator_UserId = '$p23', CreatedAt = '$p24', GMT = '$p25'  WHERE Id = '$p26'");
        return $query;
    }


    public function updat_event_status_model($p0, $p1, $p2, $p3){

        $query = $this->db->query("UPDATE event SET EventName ='$p0', Venue = '$p1', StatusId =  '$p2'  WHERE Id = '$p3'");
        return $query;
    }


    public function blocked($email){
        $query  = $this->db->query("select  tbl_user_login.role_id, tbl_user_details.first_name, tbl_user_details.last_name, tbl_user_details.profile_picture from tbl_user_details join tbl_user_login ON tbl_user_details.user_id = tbl_user_login.user_id where tbl_user_login.email ='$email'");
        return $query->result_array();
    }


    public function login_user($login)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('Email',$login);

        if($query=$this->db->get())
        {
            return $query->row_array();
        }
        else{
            return false;
        }

    }

    public function profile($id) {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('Id', $id);
        $data = $this->db->get()->result_array();
        return $data;

    }




    public function get_by_id($id)
    {
        $query1 = $this->db->query('SET @temp_id = 0');
        $query = $this->db->query('SELECT @temp_id:=@temp_id+1 AS temp_id, tbl_user_details.user_id, tbl_user_details.first_name, tbl_user_details.pmdc_no, tbl_user_details.last_name, tbl_user_details.mobile_no, tbl_user_login.email, tbl_user_login.role_id, tbl_user_login.status FROM tbl_user_details INNER JOIN tbl_user_login on tbl_user_details.user_id = tbl_user_login.user_id  HAVING temp_id ='.$id);
        return $query->row();

    }




    public function updateuser($p0, $p1, $p2, $p3, $p4, $p5, $p6, $p7){

        $query = $this->db->query("CALL update_user('$p0', '$p1', '$p2', '$p3', '$p4', '$p5', '$p6' , '$p7')");
        return $query;
    }



    public function updatetableview($user_id){
        $query =  $this->db->query('CALL delete_user('.$user_id.')');
        return $query;
    }



    public function update_password_admin($p0, $p1, $p2){
        //is tarah se queryt use keroge na to 2min me SQL injection hojaegy.. had hoti ha  stupidity ki. kis bekar admi ne code ki ha aisi queries?
        $query = $this->db->query("UPDATE tbl_user_login SET password = '$p0', salt = '$p1' where user_id = $p2");
        return $query;
    }


    public function search($event_name, $event_type, $country, $language, $startdate, $enddate){

        $eventWhere = " WHERE event.id != 0 ";
        $eventWhere2 = "";
        $userDataEntered = false;

        if (!empty($event_name)){

            $eventNameEscaped = $this->db->escape("%{$event_name}%");
            $eventWhere .= " AND event.EventName LIKE {$eventNameEscaped} ";
            $userDataEntered = true;
        }

        if (!empty($event_type)) {

            if($event_type == 10000) {
                $eventWhere2 .= "AND event.StatusId = 1";
                $userDataEntered = true;
            }
            else {
                $eventtypeEscaped = $this->db->escape($event_type);
                $eventWhere .= "AND event.StatusId = 1 AND event.EventTypeId = {$eventtypeEscaped}";
                $userDataEntered = true; }

        }

        if (!empty($country)){

            if($country == 10000) {
                $eventWhere2 .= "AND event.StatusId = 1";
                $userDataEntered = true;
            }
            else {
                $countryEscaped = $this->db->escape("%{$country}%");
                $eventWhere .= "AND event.StatusId = 1 AND event.Country LIKE {$countryEscaped} ";
                $userDataEntered = true; }
        }

        if (!empty($language)){
            if($language == 10000) {
                $eventWhere2 .= "AND event.StatusId = 1";
                $userDataEntered = true;
            }
            else {
                $languageEscaped = $this->db->escape($language);
                $eventWhere .= "AND event.StatusId = 1 AND event.language_id =  {$languageEscaped} ";
                $userDataEntered = true; }
        }


        if (!empty($startdate)){
            $eventStartDateEscaped = $this->db->escape($startdate);
            $eventWhere .= "AND event.StatusId = 1 AND event.StartDate >= {$eventStartDateEscaped} ";
            $userDataEntered = true;
        }
        if (!empty($enddate)){
            $eventEndDateEscaped = $this->db->escape($enddate);
            $eventWhere .= "AND event.StatusId = 1 AND event.Enddate <= {$eventEndDateEscaped} ";
            $userDataEntered = true;
        }

        if ($userDataEntered) {
            $queryString = "SELECT *, event.Id as EventId  FROM event join eventcategory ON event.EventCategoryId = eventcategory.Id JOIN country ON country.Id = event.Country JOIN eventtype ON event.EventTypeId = eventtype.Id  JOIN language ON event.language_id = language.Id  {$eventWhere} {$eventWhere2}";
            $query = $this->db->query($queryString);


            $results = $query->result_array();


            $formattedResults = array();
            foreach($results as $resultKey => $resultValue){
                $resultValue['formattedEventDate'] = date("d-M-Y", strtotime($resultValue['StartDate']));
                $formattedResults[$resultKey] = $resultValue;
            }
            return $formattedResults;
        }else{
            return array();
        }


    }

    public function upcoming_events(){

        $query = $this->db->query('select * from event join eventtype on eventtype.Id = event.EventTypeId where StartDate > CURDATE() AND StatusId = 1');
        return $query->result_array();

    }

    public function getGuidelineById($id){
        $this->db->where('question_id', $id);
        $query = $this->db->get('guidelines');
        return $query->row();


    }
    public function getWebinarRecordingById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('webinar_recordings');
        return $query->row();


    }

    public function fetch_user_newsletter_email($p0){
        $query = $this->db->query("Select * from newsletter where country_id = '$p0'");
        return $query->result_array();
    }



    public function getUserById($id){
        $this->db->where('Id', $id);
        $query = $this->db->get('user');
        return $query->row();


    }


    public function get_by_event_id_user($id){

        $this->db->select('event.*,speakers.*,eventtype.*,language.* ');
        $this->db->from('event');
        $this->db->join('speakers', 'event.Id = speakers.EventId', 'inner');
        $this->db->join('eventtype', 'eventtype.Id = event.EventTypeId', 'inner');
        $this->db->join('language', 'event.language_id = language.Id', 'inner');
        $this->db->where('event.Id', $id);
        $data = $this->db->get()->result_array();
        return $data;


    }


}

?>
