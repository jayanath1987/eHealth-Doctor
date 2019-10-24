<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
--------------------------------------------------------------------------------
HHIMS - Hospital Health Information Management System
Copyright (c) 2011 Information and Communication Technology Agency of Sri Lanka
<http: www.hhims.org/>
----------------------------------------------------------------------------------
This program is free software: you can redistribute it and/or modify it under the
terms of the GNU Affero General Public License as published by the Free Software 
Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,but WITHOUT ANY 
WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR 
A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License along 
with this program. If not, see <http://www.gnu.org/licenses/> or write to:
Free Software  HHIMS
ICT Agency,
160/24, Kirimandala Mawatha,
Colombo 05, Sri Lanka
---------------------------------------------------------------------------------- 
Author: Author: Mr. Jayanath Liyanage   jayanathl@icta.lk
                 
URL: http://www.govforge.icta.lk/gf/project/hhims/
----------------------------------------------------------------------------------
*/

/*

*/
class Doctor extends MX_Controller
{
    function __construct(){
        parent::__construct();
        $this->checkLogin();
        $this->load->library('session');
		if(isset($_GET["mid"])){
			$this->session->set_userdata('mid', $_GET["mid"]);
		}
    }
	
    public function index() {
		header("Location:".site_url("qdisplay/change_room_info"));
		
    }
	public function home_page(){
		$data['user_group']=$this->session->userdata('UserGroup');;
		if(($data['user_group'] == "Doctor")||($data['user_group'] == "Consultant") || ($data['user_group'] == "Programmer")){
			echo Modules::run('search/my_opd_patient');
		}
		else{
			$data["error"] = "No access";
			$this->load->vars($data);
			$this->load->view('doctor_error');	
			return;
		}
	}

    public function ward_patient() {
		$data['user_group']=$this->session->userdata('UserGroup');;
		if(($data['user_group'] == "Doctor")||($data['user_group'] == "Consultant") || ($data['user_group'] == "Programmer")){
			echo Modules::run('search/my_ward_patient');
		}
		else{
			$data["error"] = "No access";
			$this->load->vars($data);
			$this->load->view('doctor_error');	
			return;
		}
    }

    public function clinic_patient() {
		$data['user_group']=$this->session->userdata('UserGroup');;
		if(($data['user_group'] == "Doctor")||($data['user_group'] == "Consultant") || ($data['user_group'] == "Programmer")){
			echo Modules::run('search/my_clinic_patient');
		}
		else{
			$data["error"] = "No access";
			$this->load->vars($data);
			$this->load->view('doctor_error');	
			return;
		}
    }

    public function lab_orders($dept=null) {
		$data['user_group']=$this->session->userdata('UserGroup');;
		if(!isset($dept)){
			$dept = "";
		}
		if(($data['user_group'] == "Doctor")||($data['user_group'] == "Consultant") || ($data['user_group'] == "Programmer")){
			echo Modules::run('search/my_lab_order',$dept);
		}
		else{
			$data["error"] = "No access";
			$this->load->vars($data);
			$this->load->view('doctor_error');	
			return;
		}
    }


   
}
//////////////////////////////////////////

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */