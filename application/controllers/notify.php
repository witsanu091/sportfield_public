<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notify extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->check_session();
        $this->load->library('template');
        $this->load->model('notify_model');
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
        // echo 'hello';exit();
        header('Location: notify/home');
    }

    public function home()
    {
        $this->template->set('title', 'HOME');
        $this->template->load('template/light', 'notify/notify');
    }
    public function history_notifies()
    {
        $this->template->set('title', 'HOME');
        $this->template->load('template/light', 'notify/history_notifies');
    }
    public function history_worker()
    {
        $this->template->set('title', 'HOME');
        $this->template->load('template/light', 'notify/history_worker');
    }
    public function record_sportfield()
    {
        $this->template->set('title', 'HOME');
        $this->template->load('template/light', 'notify/record_sportfield');
    }
    public function get_notify_repair_all()
    {
        $notify = $this->notify_model->showNotifyAll();
        //success
        if ($notify !== null) {
            $return_data['data'] = $notify;
            $return_data['state'] = 1;
        }
        //fail
        else {
            $return_data['data'] = [];
            $return_data['state'] = 0;
        }
        echo json_encode($return_data);
    }
    public function get_notify_repair_all_worker()
    {
        $notify = $this->notify_model->showNotifyAll('กำลังดำเนินการ');
        //success
        if ($notify !== null) {
            $return_data['data'] = $notify;
            $return_data['state'] = 1;
        }
        //fail
        else {
            $return_data['data'] = [];
            $return_data['state'] = 0;
        }
        echo json_encode($return_data);
    }

    public function get_record_repair()
    {
        $notify = $this->notify_model->showRecordNotifyAll();
        //success
        if ($notify !== null) {
            $return_data['data'] = $notify;
            $return_data['state'] = 1;
        }
        //fail
        else {
            $return_data['data'] = null;
            $return_data['state'] = 0;
        }
        echo json_encode($return_data);
    }

    public function get_record_modal_repair($id)
    {
        $notify = $this->notify_model->showRecordModal($id);
        //success
        if ($notify !== null) {
            $return_data['data'] = $notify;
            $return_data['state'] = 1;
        }
        //fail
        else {
            $return_data['data'] = null;
            $return_data['state'] = 0;
        }
        echo json_encode($return_data);
    }
    public function get_notify_modal_repair($notifyrepair_id)
    {
        $notify = $this->notify_model->showNotifyModal($notifyrepair_id);
        //success
        if ($notify !== null) {
            $return_data['data'] = $notify;
            $return_data['state'] = 1;
        }
        //fail
        else {
            $return_data['data'] = null;
            $return_data['state'] = 0;
        }
        echo json_encode($return_data);
    }
    public function get_notify_input_modal_repair($notifyrepair_id)
    {
        $notify = $this->notify_model->showNotifyInputModal($notifyrepair_id);
        //success
        if ($notify !== null) {
            $return_data['data'] = $notify;
            $return_data['state'] = 1;
        }
        //fail
        else {
            $return_data['data'] = null;
            $return_data['state'] = 0;
        }
        echo json_encode($return_data);
    }
    public function inputPrice()
    {
        $id = $this->input->post("notify_id");
        $price = $this->input->post("notify_price");
        if ($price > 0) {
            $return_data['data'] = $price;
            $status = "ดำเนินการเสร็จสิ้น";
        }
        //fail
        else {
            $return_data['data'] = null;
            $status = "กำลังดำเนินการ";
        }
        // $this->notify_model->clearRepairOrders();
        $this->notify_model->setPrice($id, $price, $status);
        echo json_encode($price);
        var_dump($price);
    }
    public function showNotifyID()
    {
        $notify_repairs_id = $this->input->post("id");
        $notifyrepair = $this->notify_model->get_notify_id($notify_repairs_id);
        echo json_encode($notifyrepair);
        return true;
    }
    public function showNotifyIdInput()
    {
        $notify_repairs_id = $this->input->post("id");
        $notifyrepair = $this->notify_model->get_notify_id($notify_repairs_id);
        echo json_encode($notifyrepair);
        return true;
    }
    public function showSportFieldName()
    {
        $notify_repairs_id = $this->input->post("id");
        $notifyrepair = $this->notify_model->getSportFieldName($notify_repairs_id);
        echo json_encode($notifyrepair);
        return true;
    }
}
