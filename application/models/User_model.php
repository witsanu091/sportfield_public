<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function get_all()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    public function check_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', hash('sha256', $password));
        $query = $this->db->get('user');
        return $query->result();
    }

    public function search_user($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->result();
    }

    public function insert_entry($data)
    {
        $data["password"] = hash('sha256', $data["password"]);
        $query = $this->db->insert('user', $data);
        return ($query) ? $this->db->insert_id() : false;
    }

    public function update_entry($data, $id)
    {
        $data["password"] = hash('sha256', $data["password"]);
        $this->db->where('id', $id);
        $query = $this->db->update('user', $data);
        return ($query) ? true : false;
    }

    public function update_user($id, $username, $password, $status)
    {
        $data = array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'status' => $status,
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        return true;
    }

    public function update_password($id, $password)
    {
        $data = array(
            'id' => $id,
            'password' => hash('sha256', $password),
        );
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        return true;
    }

    public function get_once($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('user');
        return $query->result();
    }
    public function delete($id)
    {
        return $this->db->delete('user', array('id' => $id));
    }
}
