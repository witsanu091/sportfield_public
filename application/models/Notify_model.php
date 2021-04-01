<?php
class notify_model extends CI_Model
{
    public function showNotifyAll($status = null)
    {
        $this->db->select('id, notify_status, notify_date');
        if ($status != null) {
            $this->db->where('notify_status', $status);
        }
        $this->db->order_by('notify_status');
        $query = $this->db->get('notify_repairs');
        $data = $query->result();
        if (!empty($data)) {
            $_return = [];
            foreach ($data as $key => $value) {
                $tmp = $value;
                $tmp->notify_date = date("d/m/Y", strtotime($tmp->notify_date));
                $_return[] = $tmp;
            }

            return $_return;
        }
        return null;
    }
    public function showRecordNotifyAll()
    {
        $this->db->select('id, sportfield_name, sportfield_detail');
        $query = $this->db->get('sport_fields');
        return $query->result();
    }
    public function showRecordModal($id)
    {
        $this->db->select('repair_orders.notifyrepair_id,GROUP_CONCAT(repair_orders.repair_light) AS repair_light,notify_repairs.notify_end_date,notify_repairs.repair_price');
        $this->db->from("repair_orders");
        $this->db->where("sportfield_id", $id);
        $this->db->group_by(array("sportfield_id", "notifyrepair_id"));
        $this->db->join('notify_repairs', 'notify_repairs.id = repair_orders.notifyrepair_id ');
        $this->db->join('sport_fields', 'sport_fields.id = repair_orders.sportfield_id ');
        $query = $this->db->get();
        $data = $query->result();
        if (!empty($data)) {
            $_return = [];
            foreach ($data as $key => $value) {
                $tmp = $value;
                $tmp->notify_end_date = date("d/m/Y", strtotime($tmp->notify_end_date));
                $_return[] = $tmp;
            }

            return $_return;
        }
        return null;
    }
    public function showNotifyModal($notifyrepair_id = null)
    {
        $this->db->select('sport_fields.sportfield_name,GROUP_CONCAT(repair_orders.repair_light) AS repair_light,notify_repairs.notify_end_date,notify_repairs.repair_price');
        $this->db->from("repair_orders");
        if ($notifyrepair_id != null) {
            $this->db->where("notifyrepair_id", $notifyrepair_id);
        }
        $this->db->group_by(array("sportfield_id", "notifyrepair_id"));
        $this->db->join('notify_repairs', 'notify_repairs.id = repair_orders.notifyrepair_id ');
        $this->db->join('sport_fields', 'sport_fields.id = repair_orders.sportfield_id ');
        $query = $this->db->get();
        return $query->result();
    }

    public function search_notity($filter = array())
    {
        $this->db->select('sport_fields.sportfield_name,GROUP_CONCAT(repair_orders.repair_light) AS repair_light, notify_repairs.notify_end_date, notify_repairs.repair_price');
        $this->db->from("repair_orders");
        $this->db->group_by(array("sportfield_id", "notifyrepair_id"));
        $this->db->join('notify_repairs', 'notify_repairs.id = repair_orders.notifyrepair_id ');
        $this->db->join('sport_fields', 'sport_fields.id = repair_orders.sportfield_id ');

        if (isset($filter['notifyrepair_id']) && $filter['notifyrepair_id'] != "") {
            $this->db->where("notifyrepair_id", $filter['notifyrepair_id']);
        }

        if (isset($filter['sportfield_name']) && $filter['sportfield_name'] != "") {
            $this->db->like("sportfield_name", $filter['sportfield_name']);
        }
        if (isset($filter['notify_end_date']) && $filter['notify_end_date'] != "") {
            $this->db->like("notify_repairs.notify_end_date", $filter['notify_end_date']);
        }

        if (isset($filter['repair_light']) && $filter['repair_light'] != "") {
            $this->db->where("repair_light", $filter['repair_light']);
        }

        $query = $this->db->get();
        return $query->result();
    }
    public function showNotifyInputModal($notifyrepair_id)
    {
        $this->db->select('sport_fields.sportfield_name,GROUP_CONCAT(repair_orders.repair_light ORDER BY repair_orders.repair_light) AS repair_light,notify_repairs.notify_date,notify_repairs.repair_price');
        $this->db->from("repair_orders");
        $this->db->where("notifyrepair_id", $notifyrepair_id);
        $this->db->group_by(array("sportfield_id", "notifyrepair_id"));
        $this->db->join('notify_repairs', 'notify_repairs.id = repair_orders.notifyrepair_id ');
        $this->db->join('sport_fields', 'sport_fields.id = repair_orders.sportfield_id ');
        $query = $this->db->get();
        return $query->result();
    }

    public function clearRepairOrders()
    {
        $this->db->where('repair_status', 'แจ้งข้อมูล');
        $this->db->delete('repair_orders');
    }
    public function setPrice($id, $price, $status)
    {
        // $this->db->where('id', $id);
        // $query = $this->db->update('notify_repairs');
        // return $query->result();
        $setPrice = array(
            'id' => $id,
            'repair_price' => $price,
            'notify_status' => $status,
        );
        $this->db->where('id', $id);
        $this->db->set('notify_end_date', 'NOW()', false);
        $this->db->update('notify_repairs', $setPrice);
        ///
        $setStatus = array(
            'notifyrepair_id' => $id,
            'repair_status' => $status,
        );
        $this->db->where('notifyrepair_id', $id);
        $this->db->update('repair_orders', $setStatus);

        return true;
    }
    public function get_notify_id($notify_repairs_id) // get_id_user() for sent data to show_user_editForm()

    {
        $this->db->select('id, notify_status, notify_date,repair_price');
        $this->db->where('id', $notify_repairs_id);
        $query = $this->db->get('notify_repairs');
        if (!empty($query->result()[0])) {
            $tmp = $query->result()[0];
            $tmp->notify_date = date("d/m/Y", strtotime($tmp->notify_date));
            return $tmp;
        }
        return null;
    }
    public function test($i)
    {
        return $i;
    }
    public function get_notify_input_id($notify_repairs_id) // get_id_user() for sent data to show_user_editForm()

    {
        $this->db->select('id, notify_status, notify_date');
        $this->db->where('id', $notify_repairs_id);
        $query = $this->db->get('notify_repairs');
        return $query->result()[0];
    }
    public function getSportFieldName($notify_repairs_id) // get_id_user() for sent data to show_user_editForm()

    {
        $this->db->select('sportfield_name');
        $this->db->where('id', $notify_repairs_id);
        $query = $this->db->get('sport_fields');
        return $query->result()[0];
    }
}
