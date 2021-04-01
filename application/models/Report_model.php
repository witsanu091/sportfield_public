<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
    public function get_stadium($search)
    {

        if ($search != null) {
            $this->db->like('sportfield_name', $search);
            $query = $this->db->get('sport_fields');
        } else {
            $query = $this->db->get('sport_fields');
        }
        return $query->result();
    }
    public function get_once($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('sport_fields');
        return $query->result()[0];
    }
    public function get_history()
    {
        $query = $this->db->get('repair_orders');
        return $query->result();
    }
    public function set_notify($id, $notify)
    {
        $data_tmp = [
            [
                'repair_light' => '5',
                'repair_status' => 'แจ้งซ่อม',
                'repair_date' => '31/12/2020',
                'sportfield_id' => $id,
                'notifyrepair_id' => null,
            ],
            [
                'repair_light' => '6',
                'repair_status' => 'แจ้งซ่อม',
                'repair_date' => '31/12/2020',
                'sportfield_id' => $id,
                'notifyrepair_id' => null,
            ],
            [
                'repair_light' => '7',
                'repair_status' => 'แจ้งซ่อม',
                'repair_date' => '31/12/2020',
                'sportfield_id' => $id,
                'notifyrepair_id' => null,
            ],
        ];

        date_default_timezone_set("Asia/Bangkok");
        $data = [];
        foreach ($notify as $key => $value) {
            $data[] = [
                'repair_light' => $value,
                'repair_status' => 'แจ้งซ่อม',
                'repair_date' => date('Y-m-d H:i:s'),
                'sportfield_id' => $id,
                'notifyrepair_id' => null,
            ];
        }
        $query = $this->db->insert_batch('repair_orders', $data);
        return ($query);
    }
}