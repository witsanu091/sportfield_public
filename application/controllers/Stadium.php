<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stadium extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_session();
        $this->load->library('template');
        $this->load->library('session');
        $this->load->model('Stadium_model');
        $this->load->helper('url', 'form');
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
        header('Location: welcome/home');
    }

    public function qrcode()
    {
        $this->template->set('title', 'QR CODE');
        $this->template->load('template/light', 'stadium/qrcode');
    }

    public function show_stadium()
    {
        $this->template->set('title', 'สนาม');
        $this->template->load('template/light', 'stadium/show_stadium');
    }

    public function get_all_stadium()
    {
        $data = $this->Stadium_model->get_all_stadium();
        // success
        if ($data !== null) {
            $return_datas['status'] = 1;
            $return_datas['data'] = $data;
        }
        // fail
        else {
            $return_datas['status'] = 0;
            $return_datas['data'] = null;
        }
        // echo data
        echo json_encode($return_datas);
        # code...
    }

    public function stadium_form()
    {
        $config['upload_path'] = "./images/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = true;

        $tmp = $this->load->library('upload', $config);

        $form = $this->input->post();

        $checkFile1 = $this->upload->do_upload('file');
        $checkFile2 = $this->upload->do_upload('file2');

        if ($this->upload->do_upload('file')) {
            $fileName1 = $this->upload->data('file_name');
        }

        

        if ($this->upload->do_upload('file2')) {
            $fileName2 = $this->upload->data('file_name');
        }

        if ($form['submit_type'] === "new" && $checkFile1 && $checkFile2) {
            $data = array(
                'sportfield_name' => $form['name'],
                'sportfield_detail' => $form['detail'],
                'sportfield_light_amount' => $form['amount'],
                'sportfield_image' => $fileName1,
                'sportfield_sturture_image' => $fileName2,
            );
            unset($form['submit_type']);

            $stadium = $this->Stadium_model->search_stadium($form['name']);

            if (count($stadium) > 0) {
                echo json_encode([
                    "status" => "exist",
                    "msg" => "ชื่อสนามซ้ำ กรุณากรอกชื่อสนามใหม่อีกครั้ง",
                ]);
                return;
            } else if ($this->Stadium_model->insert_stadium($data)) {
                echo json_encode([
                    "status" => "success",
                    "msg" => "เพิ่มสนามสำเร็จ",
                ]);
                return;
            } else {
                echo json_encode([
                    "status" => "fail",
                    "msg" => "ไม่สามารถเพิ่มสนามได้",
                ]);
                echo $this->upload->display_errors();
                return;
            }
        } else if ($form['submit_type'] !== "" && $form['submit_type'] !== "new") {
            $id = $form['submit_type'];
            unset($form['submit_type']);
            if ($checkFile1 && $checkFile2) {
                $data = array(
                    'sportfield_name' => $form['name'],
                    'sportfield_detail' => $form['detail'],
                    'sportfield_light_amount' => $form['amount'],
                    'sportfield_image' => $fileName1,
                    'sportfield_sturture_image' => $fileName2,
                );
                if ($this->Stadium_model->update_stadium($data, $id)) {
                    echo json_encode([
                        "status" => "edited",
                        "msg" => "แก้ไขสำเร็จแล้ว",
                    ]);
                    return;
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "msg" => "ไม่สามารถแก้ไขได้",
                    ]);
                    return;
                }
            } else if (!$checkFile1 && !$checkFile2) {
                $data = array(
                    'sportfield_name' => $form['name'],
                    'sportfield_detail' => $form['detail'],
                    'sportfield_light_amount' => $form['amount'],
                );
                if ($this->Stadium_model->update_stadium($data, $id)) {
                    echo json_encode([
                        "status" => "edited",
                        "msg" => "แก้ไขสำเร็จแล้วxxx",
                    ]);
                    return;
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "msg" => "ไม่สามารถแก้ไขได้",
                    ]);
                    return;
                }
            } else if ($checkFile1 && !$checkFile2) {
                $data = array(
                    'sportfield_name' => $form['name'],
                    'sportfield_detail' => $form['detail'],
                    'sportfield_light_amount' => $form['amount'],
                    'sportfield_image' => $fileName1,
                );
                if ($this->Stadium_model->update_stadium($data, $id)) {
                    echo json_encode([
                        "status" => "edited",
                        "msg" => "แก้ไขสำเร็จแล้ว",
                    ]);
                    return;
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "msg" => "ไม่สามารถแก้ไขได้",
                    ]);
                    return;
                }
            } else if (!$checkFile1 && $checkFile2) {
                $data = array(
                    'sportfield_name' => $form['name'],
                    'sportfield_detail' => $form['detail'],
                    'sportfield_light_amount' => $form['amount'],
                    'sportfield_sturture_image' => $fileName2,
                );
                if ($this->Stadium_model->update_stadium($data, $id)) {
                    echo json_encode([
                        "status" => "edited",
                        "msg" => "แก้ไขสำเร็จแล้ว",
                    ]);
                    return;
                } else {
                    echo json_encode([
                        "status" => "fail",
                        "msg" => "ไม่สามารถแก้ไขได้",
                    ]);
                    return;
                }
            } else {
                echo "checkFile1 และ checkFile2 ไม่เข้าเงื่อนไข";
            }
        }
    }

    public function show_stadium_editForm()
    {
        $id = $this->input->post("id");
        $data = $this->Stadium_model->get_id_stadium($id);
        if (isset($data[0])) {
            echo json_encode($data[0]);
        }
    }

    public function delete_stadium()
    {
        $id = $this->input->post("id");
        $this->Stadium_model->delete_stadium($id);
    }
}