<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('User_model');
        //$this->load->model('Login_model');
    }
    public function index()
    {
        header('Location: login/show_login');
    }
    public function show_login()
    {
        $this->load->view('rights/show_login');
    }
    public function login()
    {
        $form = $this->input->post();
        $result = $this->User_model->check_login($form['username'], $form['password']);
        // var_dump($result);
        // die(1);
        #Check have user in database
        if (count($result) > 0) { //พบผู้ใช้งาน
            #ถ้าพบผู้ใช้งานจะทำการดึงค่าจากฐานข้อมูล
            $result_id = $result["0"]->id; //get username in to variable
            $result_username = $result["0"]->username; //get username in to variable
            $result_status = $result["0"]->status; //get user_status in to variable
            #Create Session
            $this->session->set_userdata(array('id' => $result_id)); //use Session
            $this->session->set_userdata(array('username' => $result_username)); //use Session
            $this->session->set_userdata(array('status' => $result_status)); //use Session
            if ($result_status == "ผู้ดูแลระบบ") { //สถานะเป็นผู้ดูแลระบบ
                echo json_encode([
                    "status" => "admin",
                    "msg" => "login success",
                    "url" => "/user/all",
                ]);
                return;
            } else if ($result_status == "งานไฟฟ้า") { //สถานะเป็นผู้ดูแลระบบ
                echo json_encode([
                    "status" => "company",
                    "msg" => "login success",
                    "url" => "/notify/history_worker",
                ]);
                return;
            } else {
                echo json_encode([
                    "status" => "fail",
                    "msg" => "login fail",
                    "url" => "/user/all",
                ]);
                return;
            }
        } else { //
            echo json_encode([
                "status" => "fail",
                "msg" => "login fail",
                "url" => "/user/all",
            ]);
            return;
        }
    } //Login Function

    public function logout()
    {
        #Remove Session
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('status');

        #Redirect
        $url = site_url("login");
        redirect($url);
    } //logout Function

} //Login Class