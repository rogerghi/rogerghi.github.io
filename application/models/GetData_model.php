<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetData_model extends CI_Model
{
    
    // function test_funct()
    // {
    //     $query = $this->db->query("SELECT product_name, 
    //                                 SUBSTRING_INDEX(product_price, '-',1)as lowest_price, 
    //                                 product_img 
    //                                 from skripsi.raw_data_scrape rds;"); 
    //     return $query->result();
    // }
    function get_data_model($query)
    {
        $query = $this->db->query("$query"); 
        return $query->result();
    }
    function insert_data_model($query)
    {
        $query = $this->db->query("$query"); 
        return $query;
    }
    function get_category_model()
    {
        $query = $this->db->query("select distinct category from raw_data_scrape"); 
        return $query->result();
    }


}

?>