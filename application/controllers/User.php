<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->check_session();
        $this->load->model('User_model');
        $this->load->library('template');
    }

    public function check_session()
    {
        //ค่า id จาก session
        $user_id = $this->session->userdata('id');
        if ($user_id == "") {
            $url = site_url("login");
            redirect($url);
        }
    }

    public function index()
    {
        redirect('/user/all');
    }

    public function all()
    {
        $this->template->set('title', 'แอดมิน');
        $this->template->load('template/light', 'rights/user');

        // $this->load->view("rights/user");
    }

    public function user_form()
    {
        $form = $this->input->post();

        if ($form['submit_type'] === "new") {
            unset($form['submit_type']);
            $user = $this->User_model->search_user($form['username']);

            if (count($user) > 0) {
                echo json_encode([
                    "status" => "exits",
                    "msg" => "มีผู้ใช้ username นี้แล้ว",
                ]);
                return;
            } else if ($this->User_model->insert_entry($form)) {
                echo json_encode([
                    "status" => "success",
                    "msg" => "เพิ่มผู้ใช้งานสำเร็จ",
                ]);
                return;
            } else {
                echo json_encode([
                    "status" => "fail",
                    "msg" => "ไม่สำเร็จ",
                ]);
                return;
            }
        } else if ($form['submit_type'] !== "") {
            $id = $form['submit_type'];
            unset($form['submit_type']);
            unset($form['confirm_password']);
            if ($this->User_model->update_entry($form, $id)) {
                echo json_encode([
                    "status" => "edited",
                    "msg" => "แก้ไขผู้ใช้งานสำเร็จ",
                ]);
                return;
            } else {
                echo json_encode([
                    "status" => "fail",
                    "msg" => "ไม่สำเร็จ",
                ]);
            }
        }
        redirect("/user/all");
    }

    public function password_form()
    {
        $password = $this->input->post('password');
        $user_id = $this->input->post('user_id');

        if ($this->User_model->update_password($user_id, $password)) {
            echo json_encode([
                "status" => "edited",
                "msg" => "แก้ไขรหัสผ่านสำเร็จ",
            ]);
            return;
        } else {
            echo json_encode([
                "status" => "fail",
                "msg" => "ไม่สำเร็จ",
            ]);
        }

    }

    public function delete_user()
    {
        $id = $this->input->post('id');
        if ($id) {
            echo $this->User_model->delete($id);
        } else {
            echo 'false';
        }
    }
    public function get_user()
    {
        $data = $this->User_model->get_all();
        echo json_encode($data);
    }

    public function get_user_once()
    {
        $id = $this->input->post('id');
        $data = $this->User_model->get_once($id);
        if (isset($data[0])) {
            echo json_encode($data[0]);
        }
    }
}