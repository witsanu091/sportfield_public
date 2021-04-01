<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('template');
        $this->load->model('Report_model');
        $this->load->model('Repair_model');
        $this->load->model('Notify_model');
        $this->load->helper('date');
        //$this->load->model('Login_model');
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
        redirect('/report/stadium');
    }
    public function stadium()
    {
        $search = $this->input->get('search');

        $stadium = $this->Report_model->get_stadium($search);
        $data = [
            "stadium" => $stadium,
        ];
        $this->template->set('title', 'ผู้แจ้งซ่อม');
        $this->template->load('template/light_blank', 'report/stadium', $data);
    }

    public function get_all_report()
    {
        $data = $this->Repair_model->get_all_report();
        foreach ($data as $key => $value) {
            $value->report_date = date("d/m/Y", strtotime($value->report_date));
        }

        echo json_encode($data);
    }

    function list()
    {
        $this->check_session();
        $this->template->set('title', 'QR CODE');
        $this->template->load('template/light', 'report/list');
    }

    public function delete_report()
    {
        $id = $this->input->post('id');
        if ($id) {
            echo $this->Repair_model->delete($id);
        } else {
            echo 'false';
        }
    }

    public function create_report()
    {
        $light = $this->input->post('light');
        // $tmp = $this->Repair_model->get_all($sport_fields_id);
        $notifyrepair_id = $this->Repair_model->create_notify_repairs();

        $this->Repair_model->update_repair_orders($notifyrepair_id, $light);
        // $this->Repair_model->delete_repair_orders();

        echo json_encode($light);
    }

    public function stadium_one($sportfield_id = null)
    {
        if ($sportfield_id == null) {
            redirect('/report/stadium');
        }
        $stadium = $this->Report_model->get_once($sportfield_id);
        if ($stadium == null) {
            redirect('/report/stadium');
        }

        $data = [
            "history" =>  $this->Notify_model->showRecordModal($sportfield_id),
            "information" => $stadium,
            "reported" => $this->Repair_model->get_all($sportfield_id),

        ];
        $this->template->set('title', 'ผู้แจ้งซ่อม');
        $this->template->load('template/light_blank', 'report/report_stadium', $data);
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
    public function get_stadium_once()
    {
        $id = $this->input->post('id');
        $data = $this->Report_model->get_once($id);
        var_dump($data);
        if (isset($data[0])) {
            echo json_encode($data[0]);
        }
    }
    public function statRepair()
    {
        $id = $this->input->post("id");
        $notify = $this->Notify_model->showRecordModal($id);
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
    public function send_inform()
    {
        $sport_fields_id = $this->input->post('sport_fields_id');
        $light = $this->input->post('light');

        // $tmp = $this->Repair_model->get_all($sport_fields_id);
        $tmp = $this->Repair_model->insert($sport_fields_id, $light);

        echo json_encode($tmp);
    }
    public function notify_stadium()
    {

        $id = $this->input->post('id');
        $notify = $this->input->post('notify');

        var_dump($this->Report_model->set_notify($id, $notify));
    }

    public function history()
    {
        $notify = $this->Notify_model->showNotifyAll();
        foreach ($notify as $key => $value) {
            $history = $this->Notify_model->showNotifyInputModal($value->id);
            $value->history = $history;
        }

        $data = ['history' => $notify];

        $this->template->set('title', 'history');
        $this->template->load('template/light_blank', 'report/history_stadium', $data);
    }
    public function history_stadium()
    {
        $notifyrepair_id = $this->input->get('noti_id');
        $sportfield_name = $this->input->get('sport_name');
        $notify_end_date = $this->input->get('date');
        $repair_light = $this->input->get('light');

        $filter = array(
            'notifyrepair_id' => $notifyrepair_id,
            'sportfield_name' => $sportfield_name,
            'notify_end_date' => $notify_end_date,
            'repair_light' => $repair_light,
        );

        $notify_result = $this->notify_model->search_notity($filter);

        $data = array(
            'notify_result' => $notify_result,
        );

        $this->template->set('title', 'history');
        $this->template->load('template/light_blank', 'report/history_stadium', $data);
    }
    public function history_notifies()
    {
        $this->template->set('title', 'HOME');
        $this->template->load('template/light', 'notify/history_notifies');
    }
    public function showNotifyID()
    {
        $notify_repairs_id = $this->input->post("id");
        $notifyrepair = $this->notify_model->get_notify_id($notify_repairs_id);
        echo json_encode($notifyrepair);
        return true;
    }
}
