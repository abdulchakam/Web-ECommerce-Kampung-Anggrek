<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_Model extends CI_Model {
	
	public function process()
	{
		//create new invoice
		$invoice = array(
			'kd_kons'   => $this->session->userdata('kd_kons'),
			'date'		=> date('Y-m-d H:i:s'),
			'due_date'	=> date('Y-m-d H:i:s', mktime( date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))),
			'status'	=> 'unpaid'
		);
		
		$this->db->insert('invoices', $invoice);
		$invoice_id = $this->db->insert_id();
		
		// put ordered items in orders table
		foreach($this->cart->contents() as $item){
			$data = array(
				'invoice_id'		=> $invoice_id,
				'kd_brg'			=> $item['id'],
				'nm_brg'			=> $item['name'],
				'harga'				=> $item['price'],
				'quantity'			=> $item['qty']
			);
			$this->db->insert('orders', $data);
		}

		foreach($this->cart->contents() as $item){
            $hasil = $this->db->where('kd_brg',$item['id'])->limit(1)->get('barang')->result_array();
            foreach($hasil AS $row) {
                $stok = $row['stok'];
            };
			$data = array(
                'stok'  => $stok-$item['qty']
			);
			$this->db->update('barang', $data, array('kd_brg'=>$item['id']));
		}
		
		return TRUE;
	}
	
    public function all()
    {
		$this->db->select('invoices.id, konsumen.nm_kons, invoices.date, invoices.due_date, invoices.status');
        $this->db->from('invoices');
        $this->db->join('konsumen','invoices.kd_kons=konsumen.kd_kons');
        $query=$this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_invoice_by_id($invoice_id)
    {
        $hasil = $this->db->where('id',$invoice_id)->limit(1)->get('invoices');
        if($hasil->num_rows() > 0){
            return $hasil->row();
        } else {
            return false;
        }
    }

    public function get_orders_by_invoice($invoice_id)
    {
        $hasil = $this->db->where('invoice_id',$invoice_id)->get('orders');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }
}
