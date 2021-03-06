<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Camara_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get camara by id
     */
    function get_camara($id)
    {
        return $this->db->get_where('camara',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all camara
     */
    function get_all_camara()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('camara')->result_array();
    }
        
    /*
     * function to add new camara
     */
    function add_camara($params)
    {
        $this->db->insert('camara',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update camara
     */
    function update_camara($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('camara',$params);
    }
    
    /*
     * function to delete camara
     */
    function delete_camara($id)
    {
        return $this->db->delete('camara',array('id'=>$id));
    }
}
