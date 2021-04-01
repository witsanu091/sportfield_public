<?php
class Repair_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        date_default_timezone_set("Asia/Bangkok");
        //$this->load->model('Login_model');
    }

    public function get_all_report()
    {
        $this->db->select('repair_orders.*,sport_fields.sportfield_name');
        $this->db->where('repair_status', 'แจ้งข้อมูล');
        $this->db->join('sport_fields', 'repair_orders.sportfield_id = sport_fields.id');
        $this->db->order_by('sport_fields.id');
        $this->db->order_by('repair_light');
        $query = $this->db->get('repair_orders');

        return $query->result();
    }

    public function update_repair_orders($notifyrepair_id, $light)
    {
        $this->db->set('repair_status', 'กำลังดำเนินการ');
        $this->db->set('notifyrepair_id', $notifyrepair_id);
        $this->db->where_in('id', $light);
        $this->db->update('repair_orders');
    }

    public function delete_repair_orders()
    {
        $this->db->where('repair_status', 'แจ้งข้อมูล');
        $this->db->delete('repair_orders');
    }

    public function create_notify_repairs()
    {
        $this->db->set('notify_status', 'กำลังดำเนินการ');
        $this->db->set('notify_date', date('Y-m-d'));
        $this->db->insert('notify_repairs');
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function delete($id)
    {
        return $this->db->delete('repair_orders', array('id' => $id));
    }

    public function get_all($sport_fields_id, $light_num_only = true)
    {
        $data = $this->get_all_raw($sport_fields_id);

        if ($light_num_only) {
            $light_num = [];
            foreach ($data as $value) {
                $light_num[] = (int) $value->repair_light;
            }

            return $light_num;
        }
        return $data;
    }

    public function get_all_raw($sport_fields_id)
    {
        $status = "(repair_status = 'แจ้งข้อมูล' OR repair_status = 'กำลังดำเนินการ')";
        return $this->db->where('sportfield_id', $sport_fields_id)->where($status)->get('repair_orders')->result();
    }

    public function insert($sport_fields_id, $light)
    {
        $data = [];
        foreach ($light as $value) {

            if ($this->checkNotExist($sport_fields_id, $value)) {

                $tmp = [
                    'repair_light' => (int) $value,
                    'repair_status' => 'แจ้งข้อมูล',
                    'report_date' => date('Y-m-d'),
                    'sportfield_id' => $sport_fields_id,
                    'notifyrepair_id' => null,
                ];

                $data[] = $this->db->insert('repair_orders', $tmp);
            }
        }
        return ($data);
    }
	
	public function CheckSportField($sport_id){
		$this->db->select('sportfield_id');
		$this->db->where('sportfield_id', $sport_id);
		$this->db->from('repair_orders');
		return $this->db->get()->row_array();
	}

    public function checkNotExist($sport_fields_id, $light_num)
    {
        $status = "(repair_status = 'แจ้งข้อมูล' OR repair_status = 'กำลังดำเนินการ')";
        $exist = $this->db->where([
            'repair_light' => $light_num,
            'sportfield_id' => $sport_fields_id,
        ])->where($status)->from("repair_orders")->count_all_results();
        if ($exist == 0) {
            return true;
        }

        return false;
    }
}
