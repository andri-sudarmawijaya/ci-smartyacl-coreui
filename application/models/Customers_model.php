<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customers_model extends CI_Model
{

    public $table = 'customers';
    public $id = 'customerNumber';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('customerNumber,customerName,contactLastName,contactFirstName,phone,addressLine1,addressLine2,city,status,state,postalCode,country,salesRepEmployeeNumber,creditLimit');
        $this->datatables->from('customers');
        //add this line for join
        //$this->datatables->join('table2', 'customers.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('customers/read/$1'),'Read')." | ".anchor(site_url('customers/update/$1'),'Update')." | ".anchor(site_url('customers/delete/$1'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'customerNumber');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('customerNumber', $q);
        $this->db->or_like('customerName', $q);
        $this->db->or_like('contactLastName', $q);
        $this->db->or_like('contactFirstName', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('addressLine1', $q);
        $this->db->or_like('addressLine2', $q);
        $this->db->or_like('city', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('state', $q);
        $this->db->or_like('postalCode', $q);
        $this->db->or_like('country', $q);
        $this->db->or_like('salesRepEmployeeNumber', $q);
        $this->db->or_like('creditLimit', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('customerNumber', $q);
        $this->db->or_like('customerName', $q);
        $this->db->or_like('contactLastName', $q);
        $this->db->or_like('contactFirstName', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('addressLine1', $q);
        $this->db->or_like('addressLine2', $q);
        $this->db->or_like('city', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('state', $q);
        $this->db->or_like('postalCode', $q);
        $this->db->or_like('country', $q);
        $this->db->or_like('salesRepEmployeeNumber', $q);
        $this->db->or_like('creditLimit', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Customers_model.php */
/* Location: ./application/models/Customers_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-10 09:18:46 */
/* http://harviacode.com */
