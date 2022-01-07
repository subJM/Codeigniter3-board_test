<?php
 
class Post_Model extends CI_Model
{
    public function getCount()
    {
        return $this->db->count_all('board');
    }
 
    public function getAll($page)
    {
        $this->db->from('board')->order_by('no desc')->limit(10, $page);
        return $this->db->get()->result();
    }
}
