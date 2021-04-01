<?php
class Stadium_model extends CI_Model
{
    public function get_all_stadium()
    {
        $query = $this->db->get('sport_fields');
        return $query->result();
    }

    public function get_id_stadium($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('sport_fields');
        return $query->result();
    }

    public function search_stadium($name)
    {
        $this->db->where('sportfield_name', $name);
        $query = $this->db->get('sport_fields');
        return $query->result();
    }

    public function insert_stadium($data)
    {
        $query = $this->db->insert('sport_fields', $data);
        return ($query) ? $this->db->insert_id() : false;
    }

    public function update_stadium($data, $id)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('sport_fields', $data);
        return ($query) ? true : false;
    }

    public function delete_stadium($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('sport_fields', array('id' => $id));
        return ($query) ? true : false;
    }
}
