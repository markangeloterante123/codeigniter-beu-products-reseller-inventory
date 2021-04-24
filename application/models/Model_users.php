<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_model{
	public function __construct(){
		parent::__construct();
	}
	function get_data(){
      $this->db->select('*');
      $this->db->order_by('id','desc');
      $this->db->where('type','2');
      $this->db->limit(13);
      $query = $this->db->get('tbl_chart');
      return $query->result();
  	}
  	function get_data2(){
	  $this->db->select('*');
      $this->db->order_by('id','desc');
      $this->db->where('type','1');
      $this->db->limit(14);
      $query = $this->db->get('tbl_chart');
      return $query->result();
	}
  	public function get_data1(){
	  $this->db->select('*');
      $query = $this->db->get('tbl_item_head');
      return $query->result();
  	}
  	public function graphSales(){
  	  $dates = $this->input->post('dates');
  	  $this->db->select('*');
  	  $this->db->from('tbl_item_graph');
  	  $this->db->join('tbl_item','tbl_item_graph.img_id = tbl_item.img_id','left');
  	  $this->db->where('tbl_item_graph.date',$dates);
      $query = $this->db->get();
      return $query->result();
  	}
	public function data ($data, $field, $table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$query = $this->db->get();
		return $query->result();
	}
	public function table (){
		$this->db->select('*');
		$this->db->from('tbl_recieve_history');
		$this->db->join('tbl_item','tbl_recieve_history.img_id = tbl_item.img_id','left');
		$this->db->order_by('tbl_recieve_history.id','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function dataDistinct2 ($data, $field, $table){
		$this->db->distinct('cart_no');
		$this->db->select('cart_no, cost_name, date');
		$this->db->from($table);
		$this->db->where($field,$data);
		$query = $this->db->get();
		return $query->result();
	}
	public function data_w_process ($data){
		$this->db->select('*');
		$this->db->from('tbl_history_sales');
		$this->db->join('tbl_account','tbl_account.id = tbl_history_sales.process_id','left');
		$this->db->where('tbl_history_sales.cart_no',$data);
		$query = $this->db->get();
		return $query->result();
	}
	public function dataDistinct ($data, $field, $table){
		$this->db->distinct('cart_no');
		$this->db->select('cart_no, cost_name');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->order_by('id','DESC');
		$this->db->limit(60);
		$query = $this->db->get();
		return $query->result();
	}
	public function dataDistinct_name ($data, $field, $table){
		$this->db->distinct('cost_name');
		$this->db->select('cost_name');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->order_by('id','DESC');
		$this->db->limit(60);
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_res_orderSearch_view(){
		$name = $this->input->post('name');
		$this->db->select('*');
		$this->db->from('tbl_resseller_order');
		if($name != ''){
			  $this->db->like('resseller_name', $name);
			  $this->db->or_like('item_order', $name);
		  }
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_SearchHistory_order(){
		$name = $this->input->post('name');
		$po = $this->input->post('po');
		$this->db->select('*');
		$this->db->from('tbl_resseller_order');
		$this->db->where('resseller_name',$po);
		if($name != ''){
			  $this->db->like('item_order', $name);
			  $this->db->or_like('date_deliver', $name);
			  $this->db->or_like('date', $name);
		  }
		$query = $this->db->get();
		return $query->result();
	}
	public function history_Searchorder_all(){
		$name = $this->input->post('name');
		$this->db->distinct('po_no');
		$this->db->select('po_no');
		$this->db->from('tbl_po_order');
		if($name != ''){
			  $this->db->like('po_no', $name);
		  }
		$this->db->where('status','2');
		$query = $this->db->get();
		return $query->result();
	}

	public function dataDistinct_search (){
		$name = $this->input->post('name');
		$this->db->distinct('cart_no');
		$this->db->select('cart_no, cost_name');
		$this->db->from('tbl_history_sales');
		if($name != ''){
			  $this->db->like('cart_no', $name);
			  $this->db->or_like('cost_name', $name);
		  }
		$this->db->order_by('id','DESC');
		$this->db->limit(30);
		$query = $this->db->get();
		return $query->result();
	}
	public function data2 ($data, $field, $table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query->result();
	}
	public function data3 ($data, $field, $table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->order_by('process','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function data4 ($data, $field, $table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function data5 ($data, $field, $table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->where('instal','0');
		$this->db->order_by('date','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function data6 ($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function data7 ($data, $field, $table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->order_by('resseller_name');
		$query = $this->db->get();
		return $query->result();
	}
	public function data8 ($table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by('suplier_name');
		$query = $this->db->get();
		return $query->result();
	}
	public function data9 ($data, $field, $table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->order_by('item_name');
		$this->db->order_by('item_brand');
		$query = $this->db->get();
		return $query->result();
	}
	public function data10 ($table){
		$this->db->select('*');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}
	public function data11 ($data, $field, $table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->where('instal','1');
		$this->db->order_by('cart_no');	
		$query = $this->db->get();
		return $query->result();
	}
	public function delete($data,$field,$table){
		$this->db->where($field,$data);
		$result = $this->db->delete($table);
		return $result;
	}
	public function deleteitem($data,$field,$table){
		$variant = $this->input->post('variant');
		$item = $this->input->post('item');
		$newvar = $variant - 1;
		$update = array(
			'variant' => $newvar  
		);
		$this->db->where('item_id',$item);
		$this->db->update('tbl_item_head',$update);

		$this->db->where($field,$data);
		$result = $this->db->delete($table);
		return $result;
	}
	public function tag_search(){
		$name = $this->input->post('name');
    	$this->db->select("*");
    	$this->db->from('tbl_item_head');
    	if($name != ''){
			  $this->db->like('item_name', $name);
			  $this->db->or_like('item_brand', $name);
		  }
    	$this->db->order_by('id', 'DESC');
    	$this->db->where('status','0');
    	$query = $this->db->get();
		return $query->result();
	}
	public function instal_search(){
		$name = $this->input->post('name');
    	$this->db->select("*");
    	$this->db->from('tbl_history_sales');
    	$this->db->where('balance >=','1');
    	if($name != ''){
			  $this->db->like('cost_name', $name);
			  $this->db->or_like('item_discription', $name);
			  $this->db->or_like('cart_no', $name);
			  $this->db->or_like('date', $name);
		  }
    	$this->db->order_by('cart_no', 'DESC');
    	$query = $this->db->get();
		return $query->result();
	}
	public function item_search(){
		$name = $this->input->post('name');
    	$this->db->select("*");
    	$this->db->from('tbl_item');
    	$this->db->join('tbl_item_head','tbl_item_head.item_id = tbl_item.item_id','left');
    	$this->db->order_by('tbl_item.qty');
    	if($name != ''){
			  $this->db->like('tbl_item.name_of_item', $name);
			  //$this->db->or_like('item_brand', $name);
			  $this->db->or_like('tbl_item_head.category', $name);
		  }
    	$query = $this->db->get();
		return $query->result();
	}
	public function resel_search(){
		$name = $this->input->post('name');
    	$this->db->select("*");
    	$this->db->from('tbl_resseller_info');
    	if($name != ''){
			  $this->db->like('resseller_name', $name);
			  $this->db->or_like('cp_no', $name);
			  $this->db->or_like('location', $name);
		  }
    	$this->db->order_by('id', 'DESC');
    	$query = $this->db->get();
		return $query->result();
	}
	public function suplier_search(){
		$name = $this->input->post('name');
    	$this->db->select("*");
    	$this->db->from('tbl_suplier_info');
    	if($name != ''){
			  $this->db->like('suplier_name', $name);
			  $this->db->or_like('email', $name);
		  }
    	$this->db->order_by('id', 'DESC');
    	$query = $this->db->get();
		return $query->result();
	}
	public function po_search(){
		$name=$this->input->post('name');
		$this->db->select("*");
		$this->db->from('tbl_po_order');
		$this->db->join('tbl_suplier_info', 'tbl_suplier_info.suplier_id = tbl_po_order.suplier_id', 'right');
		$this->db->where('tbl_po_order.status','0');
		if($name != ''){
			  $this->db->like('tbl_suplier_info.suplier_name', $name);
			  $this->db->or_like('tbl_po_order.po_no', $name);
			  $this->db->or_like('tbl_po_order.item', $name);
			  $this->db->or_like('tbl_po_order.brand', $name);
			  $this->db->or_like('tbl_po_order.date_order ', $name);
		  }
    	$this->db->order_by('tbl_po_order.ids', 'DESC');
    	$query = $this->db->get();
		return $query->result();
	}
	public function ajax_search_order(){
		$name = $this->input->post('name');
    	$this->db->select("*");
    	$this->db->from('tbl_item');
    	if($name != ''){
			  $this->db->like('name_of_item', $name);
		  }
    	$this->db->order_by('name_of_item');
    	$query = $this->db->get();
		return $query->result();
	}
	public function insert($data = array()){ 
        $insert = $this->db->insert_batch('tbl_item_img',$data); 
        return $insert; 
    }
    public function item_display(){
    	$id = $this->input->post('item_id');
    	$this->db->select("*");
    	$this->db->from('tbl_item');
    	$this->db->join('tbl_item_head','tbl_item_head.item_id = tbl_item.item_id','left');
    	$this->db->where('tbl_item.item_id',$id);
    	$this->db->order_by('tbl_item.size', 'DESC');
    	$query = $this->db->get();
    	return $query->result();
    } 
    public function addcart(){
    	$base = $this->input->post('base');
    	$item_id = $this->input->post('item_id');
    	$img_id = $this->input->post('img_id');
    	$color = $this->input->post('color');
    	$name = $this->input->post('name');
    	$ressel = $this->input->post('ressel');
    	$user_id = $this->input->post('user_id');
		$user_name = $this->input->post('user_name');

		$insert = array(
			'base_price'=>$base,
			'item_id' => $item_id,
			'img_id' => $img_id,
			'item_discription'=>$name,
			'resseller_price' =>$ressel,
			'process_id'=>$user_id,
			'process_name'=>$user_name,
			'status'=>'1'
		);
		$result = $this->db->insert('tbl_cart',$insert);
		return $result;
    }
    public function retail_buy(){
    	$item_id = $this->input->post('item_id');
    	$img_id = $this->input->post('img_id');
    	$name = $this->input->post('name');
    	$id = $this->input->post('id');
    	$detail = $this->input->post('detail');
    	$price = $this->input->post('price');
    	$qty = $this->input->post('qty');
    	$base = $this->input->post('base');
    	$id_cart = $this->input->post('id_cart');
    	$date = $this->input->post('dates');
    	$type = 'Resell';

    	$old = 0;
    	$this->db->select('*');
	    $this->db->from("tbl_item"); 
	    $this->db->where('img_id',$img_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $old=$value->qty;
	        }
	    }


	    $old_sold = 0;
	    $this->db->select('*');
	    $this->db->from("tbl_item_head"); 
	    $this->db->where('item_id',$item_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $old_sold=$value->sold;
	        }
	    }

	    $stock = $old - $qty;
	    $sold = $old_sold + $qty;
	    $totalsale = $qty * $price; 
	    $base_total = $qty * $base;
	    $net = $totalsale - $base_total;

	    

	    if($qty <= '0'){
	    	echo 'error';
	    }
	    elseif($stock < '0'){
	    	echo 'error';
	    }
	    else{

	    	$stock = array(
	    		'qty'=>$stock
	    	);
	    	$this->db->where('img_id',$img_id);
	    	$this->db->update('tbl_item',$stock);

	    	$solds = array (
	    		'sold'=>$sold
	    	);
	    	$this->db->where('item_id',$item_id);
	    	$this->db->update('tbl_item_head',$solds);

	    	$process = array(
	    		'type'=>$type,
	    		'process'=>'1',
	    		'g_price'=>$price,
	    		'qty'=>$qty
	    	);
	    	$this->db->where('id',$id_cart);
	    	$this->db->update('tbl_cart',$process);
	    	//- item graph
	    	$grapQty = $qty;
		    $grapNet = $net;
		    $this->db->select('*');
		    $this->db->from("tbl_item_graph"); 
		    $this->db->where('img_id',$img_id);
		    $this->db->where('date',$date);  
		    $query = $this->db->get();
		    if($query->num_rows() != 0){
				foreach ($query->result() as $value){
		            $grapQty += $value->qty;
		            $grapNet += $value->net;
		            $update  = array(
		            	'qty'=>$grapQty,
		            	'net'=>$grapNet 
		            );
		            $this->db->where('img_id',$img_id);
		            $this->db->where('date',$date);
		            $this->db->update('tbl_item_graph',$update);
		        }
		    }
		    else{
		    	$insert  = array(
		        	'qty'=>$grapQty,
		        	'net'=>$grapNet,
		        	'img_id'=>$img_id,
		        	'date'=>$date
		        );
		        $this->db->where('img_id',$img_id);
		        $this->db->where('date',$date);
		        $this->db->insert('tbl_item_graph',$insert);
		    }
		    //- item graph end condition
	    	$history = array (
	    		'type_of_sales'=>$type,
	    		'item_discription'=>$detail,
	    		'selling_price'=>$price,
	    		'qty'=>$qty,
	    		'base_price'=>$base,
	    		'base_total'=>$base_total,
	    		'selling_total'=> $totalsale,
	    		'net'=>$net,
	    		'process'=>'1',
	    		'process_id'=>$id,
	    		'id_cart'=>$id_cart,
	    		'process_name'=>$name,
	    		'img_id'=>$img_id 
	    	);
	    	$result = $this->db->insert('tbl_history_sales',$history);
	    	return $result;
	    }
    }
    public function retail_instal(){
    	$down = $this->input->post('down');
    	$item_id = $this->input->post('item_id');
    	$img_id = $this->input->post('img_id');
    	$name = $this->input->post('name');
    	$id = $this->input->post('id');
    	$detail = $this->input->post('detail');
    	$price = $this->input->post('price');
    	$qty = $this->input->post('qty');
    	$base = $this->input->post('base');
    	$id_cart = $this->input->post('id_cart');
    	$type = $this->input->post('type');

    	$old = 0;
    	$this->db->select('*');
	    $this->db->from("tbl_item"); 
	    $this->db->where('img_id',$img_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $old=$value->qty;
	        }
	    }
	    $old_sold = 0;
	    $this->db->select('*');
	    $this->db->from("tbl_item_head"); 
	    $this->db->where('item_id',$item_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $old_sold=$value->sold;
	        }
	    }
	    $stock = $old - $qty;
	    $sold = $old_sold + $qty;
	    $totalsale = $qty * $price; 
	    $base_total = $qty * $base;
	    $downpay = $totalsale - $down;
	    $net = $totalsale - $base_total;
	   	$netbal = $net - $downpay;
	    if($qty <= '0'){
	    	echo 'error';
	    }
	    elseif($price <= '0'){
	    	echo 'error';
	    }
	    elseif($stock < '0'){
	    	echo 'error';
	    }
	    else{
	    	$stock = array(
	    		'qty'=>$stock
	    	);
	    	$this->db->where('img_id',$img_id);
	    	$this->db->update('tbl_item',$stock);

	    	$solds = array (
	    		'sold'=>$sold
	    	);
	    	$this->db->where('item_id',$item_id);
	    	$this->db->update('tbl_item_head',$solds);

	    	$process = array(
	    		'type'=>$type,
	    		'process'=>'1',
	    		'g_price'=>$price,
	    		'down'=>$down,
	    		'bal'=>$downpay,
	    		'qty'=>$qty
	    	);
	    	$this->db->where('img_id',$img_id);
	    	$this->db->update('tbl_cart',$process);

	    	$history = array (
	    		'type_of_sales'=>$type,
	    		'item_discription'=>$detail,
	    		'selling_price'=>$price,
	    		'qty'=>$qty,
	    		'base_price'=>$base,
	    		'base_total'=>$base_total,
	    		'selling_total'=> $totalsale,
	    		'net'=>$netbal,
	    		'process'=>'1',
	    		'process_id'=>$id,
	    		'id_cart'=>$id_cart,
	    		'down'=>$down,
	    		'balance'=>$downpay,
	    		'instal'=>'1',
	    		'process_name'=>$name
	    	);
	    	$result = $this->db->insert('tbl_history_sales',$history);
	    	return $result;
	    }
    }
    public function refresh_cart(){
    	$id = $this->input->post('id');
    	$item_id = $this->input->post('item_id');
    	$img_id = $this->input->post('img_id');
    	$qty = $this->input->post('qty');
    	$price = $this->input->post('price');
    	$base = $this->input->post('base');
    	$date = $this->input->post('dates');

    	$totalsale = $qty * $price; 
	    $base_total = $qty * $base;
	    $net = $totalsale - $base_total;
	    	//graph delete
	    	$this->db->select('*');
		    $this->db->from("tbl_item_graph"); 
		    $this->db->where('img_id',$img_id);
		    $this->db->where('date',$date);  
		    $query = $this->db->get();
		    if($query->num_rows() != 0){
				foreach ($query->result() as $value){
		            $QTY = $value->qty;
		            $NET = $value->net;
		            $grapQty = $QTY - $qty;
		            $grapNet = $NET - $net;
		            $update  = array(
		            	'qty'=>$grapQty,
		            	'net'=>$grapNet 
		            );
		            $this->db->where('img_id',$img_id);
		            $this->db->where('date',$date);
		            $this->db->update('tbl_item_graph',$update);
		        }
		    }
		    //graph delete

    	$this->db->where('id_cart',$id);
    	$this->db->delete('tbl_history_sales');

    	$old = 0;
    	$this->db->select('*');
	    $this->db->from("tbl_item"); 
	    $this->db->where('img_id',$img_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $old=$value->qty;
	        }
	    }

    	$old_sold = 0;
	    $this->db->select('*');
	    $this->db->from("tbl_item_head"); 
	    $this->db->where('item_id',$item_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $old_sold=$value->sold;
	        }
	    }


	    $newstock = $old_sold - $qty;
	    $update  = array(
	    	'sold' => $newstock 
	    );
	    $this->db->where('item_id',$item_id);
	    $this->db->update('tbl_item_head',$update);

	    $stockadd = $old + $qty; 
	    $update = array(
	    	'qty'=>$stockadd
	    );
	    $this->db->where('img_id',$img_id);
	    $this->db->update('tbl_item',$update);
	    $update2 = array (
	    	'g_price' =>'0',
	    	'qty'=>'0',
	    	'process'=>'0'
	    );
	    $this->db->where('id',$id);
	    $result = $this->db->update('tbl_cart',$update2);
	    return $result;
    }
    public function confirm_buy(){
    	$user = $this->input->post('user_id');
    	$name = $this->input->post('name');
    	$cart = $this->input->post('cart');
    	$dis = $this->input->post('dis');

    	if($cart <= 9){
    		$cartnew = '00000'.$cart;
    	}
    	else if($cart <= 99){
    		$cartnew = '0000'.$cart;
    	}
    	else if($cart <= 999){
    		$cartnew = '000'.$cart;
    	}
    	else if($cart <= 9999){
    		$cartnew = '00'.$cart;
    	}
    	else if($cart <= 99999){
    		$cartnew = '0'.$cart;
    	}
    	else{
    		$cartnew = '0'.$cart;	
    	}

    	$this->db->where('process_id',$user);
    	$this->db->delete('tbl_cart');
    	$cartadd = $cart + 1;

    	$cartupdate = array(
    		'counter'=>$cartadd
    	);
    	$this->db->where('id','1');
    	$this->db->update('tbl_cart_counter',$cartupdate);

    	$update =array(
    		'process'=>'0',
    		'cart_no'=>$cartnew,
    		'cost_name'=>$name,
    		'discount'=>$dis
    	);

    	$this->db->where('process_id',$user);
    	$this->db->where('process','1');
    	$result = $this->db->update('tbl_history_sales',$update);
    	return $result;
    }
    public function confirm_instal(){
    	$user = $this->input->post('user_id');
    	$name = $this->input->post('name');
    	$cart = $this->input->post('cart');
    	$cartnew = 'Cart#'.$cart;

    	$this->db->where('process_id',$user);
    	$this->db->delete('tbl_cart');
    	$cartadd = $cart + 1;

    	$cartupdate = array(
    		'counter'=>$cartadd
    	);
    	$this->db->where('id','1');
    	$this->db->update('tbl_cart_counter',$cartupdate);

    	// $reseler = array(
    	// 	'resseller_name' => $name,
    	// 	'cart_no'=>$cartnew,
    	// 	'status'=>'1' 
    	// );
    	// $this->db->insert('tbl_resseller_order',$reseler);

    	$update =array(
    		'process'=>'0',
    		'cart_no'=>$cartnew,
    		'cost_name'=>$name
    	);

    	$this->db->where('process_id',$user);
    	$this->db->where('process','1');
    	$result = $this->db->update('tbl_history_sales',$update);
    	return $result;
    }
    public function payment_mode(){
    	$id = $this->input->post('id');
    	$pay = $this->input->post('payment');

    	$net = 0;
	    $bal = 0;
	    $down = 0;
    	$this->db->select('*');
	    $this->db->from("tbl_history_sales"); 
	    $this->db->where('id',$id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $net = $value->net;
	            $bal = $value->balance;
	            $down = $value->down;
	        }
	    }

	    $newnet = $net + $pay;
	    $newbal = $bal - $pay;
	    $newdown = $down + $pay;

	    if($newbal <= '0'){
	    	$update = array (
		    	'net'=>$newnet,
		    	'down'=>'0',
		    	'balance'=>'0',
		    	'instal'=>'0'
	    	);
	    	$this->db->where('id',$id);
	    	$this->db->update('tbl_history_sales',$update);

	    	$insert = array(
	    		'history_id' => $id,
	    		'payment'=>$pay,
	    		'balance'=>'0' 
	    	);
	    	$result = $this->db->insert('tbl_payment_hold',$insert);
	    	return $result;
	    }
	    else{

	    	$update = array (
		    	'net'=>$newnet,
		    	'down'=>$newdown,
		    	'balance'=>$newbal
	    	);
	    	$this->db->where('id',$id);
	    	$this->db->update('tbl_history_sales',$update);

	    	$insert = array(
	    		'history_id' => $id,
	    		'payment'=>$pay,
	    		'balance'=>$newbal 
	    	);
	    	$results = $this->db->insert('tbl_payment_hold', $insert);
	    	return $results;
	    }
    }
    public function addreseller(){
    	$name = $this->input->post('name');
    	$loc = $this->input->post('loc');
    	$con = $this->input->post('con'); 

    	$reseller = array (
    		'resseller_name'=>$name,
    		'cp_no'=>$con,
    		'location'=>$loc
    	);
    	$result = $this->db->insert('tbl_resseller_info',$reseller);
    	return $result;
    }
    public function reseller(){
    	$this->db->select('*');
    	$this->db->from('tbl_resseller_info');
    	$this->db->join('tbl_history_sales','tbl_history_sales.cost_name = tbl_resseller_info.resseller_name','right');
    	$this->db->where('tbl_history_sales.type_of_sales','Resell');
    	$this->db->where('tbl_history_sales.balance >=','1');
    	$query = $this->db->get();
		return $query->result();   
	}
	public function res_records(){
		$this->db->distinct('cost_name');
		$this->db->select('cost_name');
		$this->db->from('tbl_history_sales');
		$this->db->where('type_of_sales','Resell');
		$query=$this->db->get();
		return $query->result();
	}
	public function resel_items(){
		$name = $this->input->post('name');
		$this->db->select('*');
		$this->db->from('tbl_history_sales');
		$this->db->where('type_of_sales','Resell');
		$this->db->where('instal','1');
		$this->db->where('balance >=','1');
		$this->db->where('cost_name',$name);
		$query = $this->db->get();
		return $query->result(); 
	}
	public function item_inventory(){
		$this->db->select('*');
    	$this->db->from('tbl_item');
    	$this->db->join('tbl_item_head','tbl_item_head.item_id = tbl_item.item_id','left');
    	$this->db->order_by('tbl_item.qty');
    	$query = $this->db->get();
		return $query->result();
	}
	public function add_stock(){
		$item_id = $this->input->post('item_id');
		$img_id = $this->input->post('img_id');
		$stock = $this->input->post('stock');
		$qty = $this->input->post('qty');
		$sup = $this->input->post('search');
		$si = $this->input->post('si');
		$date = $this->input->post('date');
		$pro = $this->input->post('name');
		$price = $this->input->post('price');
		$sup_id = $this->input->post('sup_id');

		
		if($qty == '0'){
			echo "error";
		}	
		elseif($sup == ''){
			echo "error";
		}
		elseif($si == ''){
			echo "error";
		}
		elseif($date == ''){
			echo "error";
		}
		elseif($price == ''){
			echo "error";
		}
		else{
			$add = $qty + $stock;
			$stock = array(
				'qty'=>$add
			);
			$this->db->where('img_id',$img_id);
			$this->db->update('tbl_item',$stock);

			$insert  = array(
				'item_id' => $item_id,
				'img_id'=>$img_id,
				'suplier_name'=>$sup,
				'suplier_id'=>$sup_id,
				'sale_invoice'=>$si,
				'sup_base_price'=>$price,
				'rqty'=>$qty,
				'date'=>$date, 
				'recive_by'=>$pro
			);
			$result = $this->db->insert('tbl_recieve_history',$insert);
			return $result;
		}
	}
	public function item_update(){
		$id = $this->input->post('id');
		$base = $this->input->post('base');
		$res = $this->input->post('res');
		$qty = $this->input->post('qty');

		$update = array(
			'base_price'=>$base,
			'resseller_price'=>$res,
			'qty'=>$qty
		);
		$this->db->where('img_id',$id);
		$result = $this->db->update('tbl_item',$update);
		return $result;
	}
	public function allow(){
		$id= $this->input->post('id');
		$update =array(
			'status'=>'1'
		);
		$this->db->where('id',$id);
		$result = $this->db->update('tbl_resseller_info',$update);
		return $result;	
	}
	public function disalow(){
		$id= $this->input->post('id');
		$update =array(
			'status'=>'0'
		);
		$this->db->where('id',$id);
		$result = $this->db->update('tbl_resseller_info',$update);
		return $result;	
	}
	public function add_po(){
		$sup_id = $this->input->post('sup_id');
		$item_id = $this->input->post('item_id');
		 $qty = $this->input->post('qty');
		// $qty = 10;
		$item ='';
		$brand = '';
		$size = '';
		$price = '';

		if($qty == 0){
			echo "error";
		}
		else {
		$this->db->select('*');
	    $this->db->from("tbl_suplier_canvas"); 
	    $this->db->where('id',$item_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $item=$value->item;
	            $brand=$value->brand;
	            $size=$value->size;
	            $price=$value->price;
	        }
	    }
	    $old_order = 0;
	    $this->db->select('*');
	    $this->db->from("tbl_suplier_info"); 
	    $this->db->where('suplier_id',$sup_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $old_order=$value->pending_order;
	        }
	    }

	    $udpate1 = array(
	    	'suplier_id'=>$sup_id,
	    	'item_id'=>$item_id,
	    	'item'=>$item,
	    	'brand'=>$brand,
	    	'size'=>$size,
	    	'qty_order'=>$qty,
	    	'base_price'=>$price,
	    	'date_recieve'=>'0000-00-00',
	    	'status'=>'1'
	    );
	    $this->db->insert('tbl_po_order',$udpate1);

	    $update2  = array(
	    	'my_order' => '1', 
	    );
	    $this->db->where('id',$item_id);
	    $this->db->update('tbl_suplier_canvas',$update2);

	    $neworder = $qty + $old_order;
	    $update3 = array(
	    	'pending_order'=>$neworder,
	    	'process'=>'1'
	    );
	    $this->db->where('suplier_id',$sup_id);
	    $result = $this->db->update('tbl_suplier_info',$update3);
	    return $result;
	    }
	}
	public function pending_po(){
		$this->db->select("*");
		$this->db->from('tbl_po_order');
		$this->db->join('tbl_suplier_info', 'tbl_suplier_info.suplier_id = tbl_po_order.suplier_id', 'left');
		$this->db->where('tbl_po_order.status','0');
		$this->db->order_by('po_no','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function po_recieve_rec(){
		$po_id = $this->input->post('idpo');
		$img_id = $this->input->post('img_id');
		$qty = $this->input->post('qty');
		$supl = $this->input->post('supl');
		$si_no =$this->input->post('si_no');
		$date = $this->input->post('date');

		$qtybal = 0;
		$rec = 0;
		
		$this->db->select('*');
	    $this->db->from("tbl_po_order"); 
	    $this->db->where('ids',$po_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $qtybal=$value->qty_order;
	            $rec = $value->qty_recieve;
	        }
	    }
	    $old = 0;
	    $this->db->select('*');
	    $this->db->from("tbl_suplier_info"); 
	    $this->db->where('suplier_id',$supl);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $old=$value->pending_order;
	        }
	    }

	    $stock = 0;
	    $this->db->select('*');
	    $this->db->from("tbl_item"); 
	    $this->db->where('img_id',$img_id);  
	    $query = $this->db->get();
	    if($query->num_rows() != 0){
			foreach ($query->result() as $value){
	            $stock=$value->qty;
	        }
	    }
	    $newstock = $qty + $stock;
	    $newqty = $qtybal - $qty;
	    $newrec = $rec + $qty;
	    $newpo = $old - $qty;
	   if($newqty == '0'){

	   		$update = array(
	   			'pending_order'=>$newpo
	   		);
	   		$this->db->where('suplier_id',$supl);
	   		$this->db->update('tbl_suplier_info',$update);

	    	$update1 = array(
	    		'qty_order'=>$newqty,
	    		'qty_recieve'=>$newrec,
	    		'si_no'=>$si_no,
	    		'date_recieve'=>$date,
	    		'status'=>'2'
	    	);
	    	$this->db->where('ids',$po_id);
	    	$this->db->update('tbl_po_order',$update1);

	    	$update2 = array(
	    		'qty'=>$newstock

	    	);
	    	$this->db->where('img_id',$img_id);
	    	$result = $this->db->update('tbl_item', $update2);
	    	return $result;
	    }
	    elseif($newqty >='1'){

	    	$update = array(
	   			'pending_order'=>$newpo
	   		);
	   		$this->db->where('suplier_id',$supl);
	   		$this->db->update('tbl_suplier_info',$update);

	    	$update1 = array(
	    		'qty_order'=>$newqty,
	    		'qty_recieve'=>$newrec,
	    		'si_no'=>$si_no,
	    		'date_recieve'=>$date,
	    		'status'=>'0'
	    	);
	    	$this->db->where('ids',$po_id);
	    	$this->db->update('tbl_po_order',$update1);

	    	$update2 = array(
	    		'qty'=>$newstock
	    	);
	    	$this->db->where('img_id',$img_id);
	    	$result = $this->db->update('tbl_item',$update2);
	    	return $result;
	    }
	    else{
	    	echo "cancel process";
	    }
	}

	public function res_history(){
		$rec = $this->input->post('res');
		$this->db->distinct('cart_no');
		$this->db->select('cart_no, cost_name');
		$this->db->from('tbl_history_sales');
		$this->db->where('cost_name',$rec);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function show_item(){
		$this->db->select('*');
		$this->db->from('tbl_item');
		$this->db->order_by('name_of_item');
		$this->db->order_by('size');
		$query = $this->db->get();
		return $query->result();
	}
	public function res_add_order(){
		$this->db->select('*');
		$this->db->from('tbl_resseller_info');
		$this->db->where('status','1');
		$this->db->order_by('resseller_name');
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_res_orderPending(){
		$item =$this->input->post('item');
		$name = $this->input->post('name');
		$update = array(
			'resseller_name'=>$name,
			'item_order'=>$item,
			'status'=>'1'
		);
		$result = $this->db->insert('tbl_resseller_order',$update);
		return $result;
	}
	public function ajax_item_orderDisplay(){
		$name = $this->input->post('name');
		$this->db->select("*");
		$this->db->from('tbl_resseller_order');
		$this->db->where('resseller_name',$name);
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query->result();
	}
	public function add_process_item(){
		$id =$this->input->post('id');
		$qty = $this->input->post('qty');
		if($qty >= '1'){
			$update = array(
				'qty_order'=>$qty
			);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_resseller_order',$update);
			return $result;
		}
		else{
			echo ("error");
		}
	}
	public function add_process_refresh(){
		$id =$this->input->post('id');
			$update = array(
				'qty_order'=>'0'
			);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_resseller_order',$update);
			return $result;
	}
	public function save_order_res(){
		$name = $this->input->post('name');
		$update = array(
			'status'=>'0'
		);
		$this->db->where('resseller_name',$name);
		$this->db->where('status','1');
		$result = $this->db->update('tbl_resseller_order',$update);
		return $result;
	}
	public function ajax_res_order_view(){
		$this->db->select("*");
		$this->db->from('tbl_resseller_order');
		$this->db->where('status','0');
		$this->db->order_by('date','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_check_res(){
		$id =$this->input->post('id');
		$update = array(
			'chk'=>'1'
		);
		$this->db->where('id',$id);
		$result = $this->db->update('tbl_resseller_order',$update);
		return $result;
	}
	public function ajax_cancel_res(){
		$id =$this->input->post('id');
		$update = array(
			'chk'=>'0'
		);
		$this->db->where('id',$id);
		$result = $this->db->update('tbl_resseller_order',$update);
		return $result;
	}
	public function process_checked_order(){
		$type =$this->input->post('type');
		$note =$this->input->post('note');
		$date =$this->input->post('date');
		$update = array(
			'status'=>$type,
			'remarks'=>$note,
			'date_deliver'=>$date,
			'chk'=>'0'
		);
		$this->db->where('chk','1');
		$result = $this->db->update('tbl_resseller_order',$update);
		return $result;
	}
	public function history_order_all(){

		$this->db->distinct('po_no');
		$this->db->select('po_no, status');
		$this->db->from("tbl_po_order");
		$this->db->where('status','2');
		$this->db->order_by('po_no','DESC');
		$query =$this->db->get();
		return $query->result();
	}
	public function history_reorder_all(){

		$this->db->distinct('resseller_name');
		$this->db->select('resseller_name');
		$this->db->from("tbl_resseller_order");
		$this->db->where('status >=','2');
		$this->db->order_by('resseller_name');
		$query =$this->db->get();
		return $query->result();
	}
	public function history_po_order(){
		$po = $this->input->post('po');
		$this->db->select('*');
		$this->db->from('tbl_po_order');
		$this->db->join('tbl_suplier_info', 'tbl_suplier_info.suplier_id = tbl_po_order.suplier_id', 'right');
		$this->db->where('po_no',$po);
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_reshistory_order(){
		$name = $this->input->post('po');
		$this->db->select("*");
		$this->db->from('tbl_resseller_order');
		$this->db->where('resseller_name',$name);
		$this->db->where('status >= ','2');
		$query =$this->db->get();
		return $query->result();
	}
	public function print_daily_rec(){
		$date = $this->input->post('date');
		$this->db->select('*');
		$this->db->from('tbl_history_sales');
		$this->db->where('date',$date);
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_graph_save(){
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$gross = 0;
		$net = 0;

		if($end == '' || $start == ''){
			echo "error";
		}
		elseif($type == '0'){
			echo "error";
		}
		else{
			$this->db->select('*');
			$this->db->from('tbl_history_sales');
			$this->db->where('date >=',$start);
			$this->db->where('date <=',$end);
			$query = $this->db->get();
			if($query->num_rows() != 0){
				foreach ($query->result() as $value){
		            $gross += $value->selling_total;
		            $net += $value->net;
		        }
		    }
		    $insert = array(
		    	'name' => $name,
		    	'total'=>$gross,
		    	'profit'=>$net,
		    	'type'=>$type 
		    );
		    $result = $this->db->insert('tbl_chart',$insert);
		    return $result;	
		}
		
	}

	public function ajax_item_his(){
		$img_id = $this->input->post('img_id');
		$this->db->select('*');
		$this->db->from('tbl_history_sales');
		$this->db->where('img_id',$img_id);
		$this->db->where('process','0');
		$this->db->order_by('cart_no','DESC');
		$this->db->limit(100);
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_item_hisDate(){
		$img_id = $this->input->post('img_id');
		$start = $this->input->post('start');
		$end = $this->input->post('end');

		$this->db->select('*');
		$this->db->from('tbl_history_sales');
		$this->db->where('img_id',$img_id);
		$this->db->where('process','0');
		$this->db->where('date >=',$start);
		$this->db->where('date <=',$end);
		$this->db->order_by('cart_no','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_halt(){
		$id = $this->input->post('id');
		$data = $this->input->post('data');
		if($data == 'del'){
			$this->db->where('id',$id);
			$result = $this->db->delete('tbl_account');
			return $result;
		}
		else{
			$update  = array(
				'status' => $data
			);
			$this->db->where('id',$id);
			$result = $this->db->update('tbl_account',$update);
			return $result;
		}

	}
	public function add_account(){
		$name =$this->input->post('name');
		$user =$this->input->post('user');
		$pass = bin2hex($user);
		$insert = array(
			'full_name' =>$name,
			'username'=>$user,
			'password'=>$pass,
			'department'=>'1',
			'status'=>'1' 
		);
		$result =$this->db->insert('tbl_account',$insert);
		return $result;
	}
	public function update_account(){
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$Pass = bin2hex($pass);		
		$id = $this->input->post('id');
		$update = array(
			'username' => $user,
			'password' =>$Pass 
		);
		$this->db->where('id',$id);
		$result =$this->db->update('tbl_account',$update);
		return $result;
	}
		


}