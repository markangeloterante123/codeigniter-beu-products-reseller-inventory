<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	
	public function logout(){	
		$id = $this->session->all_userdata();
     	$this->session->unset_userdata($id);
      	$this->session->sess_destroy();
      	redirect('pages/index');
	}
	public function index(){
		$page= 'login';
		if(!file_exists(APPPATH.'views/'.$page.'.php')){
             show_404();
         }
	    $this->load->view($page);
	}
	public function login(){
		
		$data1=$this->input->post('username');
	    $data2=$this->input->post('pass');
	    $pass=bin2hex($data2);
	        
	    $this->db->select('*');
	    $this->db->from("tbl_account"); 
	    $this->db->where('username',$data1);
	    $this->db->where('password',$pass);
	    $this->db->where('status','1');  
	    $query = $this->db->get();
	        if($query->num_rows() != 0){
	            $id=0;
	            $dep = 0;
	            foreach ($query->result() as $value){
	                $id=$value->id;
	                $dep=$value->department;
	            }
	            if($dep == 1){
	            	 $newdata = array(
		                    'user_session'=> $id,
		                    'logged_in' => TRUE
              		  );
                	$this->session->set_userdata($newdata);
                	redirect('dash/user_dash/success');
	            }
	            else if($dep == 2){
	            	 $newdata = array(
		                    'admin_session'=> $id,
		                    'logged_in' => TRUE
              		  );
	            	$this->session->set_userdata($newdata);
	          		redirect('dash/admin_dash/success');
	        	}
	        }
	         else{
	          $this->load->view('errors/alert');
	          $this->load->view('login');
	        }
	}
	public function admin(){
		$page = $this->uri->segment(3);
		if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
             show_404();
         }
	    $this->load->view('templates/header');
	    $this->load->view('templates/side');
	    $this->load->view('admin/'.$page);
	    $this->load->view('templates/footer');
	}
	public function admin2(){
		$data['item'] =$this->uri->segment(5);
		$data['data'] =$this->uri->segment(4);
		$page = $this->uri->segment(3);
		if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
             show_404();
         }
	    $this->load->view('templates/header');
	    $this->load->view('templates/side');
	    $this->load->view('admin/'.$page,$data);
	    $this->load->view('templates/footer');
	}
	public function graph(){
		$data = $this->model_users->get_data();
      	$datas['titleMonth'] = json_encode($data);
		$page = 'graph';
		if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
             show_404();
         }
	    $this->load->view('templates/header');
	    $this->load->view('templates/side');
	    $this->load->view('admin/'.$page,$datas);
	    $this->load->view('templates/footer');
	}
	public function user(){
		$page = $this->uri->segment(3);
		if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
             show_404();
         }
	    $this->load->view('templates/userHeader');
	    $this->load->view('templates/userSide');
	    $this->load->view('user/'.$page);
	    $this->load->view('templates/footer');
	}
	public function printRec(){
		$page = $this->uri->segment(3);
		$data['pos'] = $this->uri->segment(4);
		if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
             show_404();
         }
	    $this->load->view('admin/'.$page,$data);
	}
	public function addTags(){
		$item = $this->input->post('name');
		$brand = $this->input->post('brand');
		// $category = $this->input->post('category');
		$image_file = $this->input->post('image_file');
			$n = 10;
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	    	$item_id = ''; 
		    for ($i = 0; $i < $n; $i++) { 
		        $index = rand(0, strlen($characters) - 1); 
		        $item_id .= $characters[$index]; 
		    } 

		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/pic/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
				$insertNew = array(
					'item_id' => $item_id,
					'item_name' => $item,
					'item_brand'=>$brand,
					// 'category'=>$category
				);
				$this->db->insert('tbl_item_head',$insertNew);
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];
				$insertNew = array(
					'item_id' => $item_id,
					'item_name' => $item,
					'item_brand'=>$brand,
					// 'category'=>$category,
					'profile' =>$name_file2
				);
				$this->db->insert('tbl_item_head',$insertNew);			
			  }
			}
		redirect('pages/admin/store');
	}
		public function stock(){
			$item = $this->input->post('name_item');
			$size = $this->input->post('size');
			$base = $this->input->post('base');
			$seller = $this->input->post('seller');
			$id = $this->input->post('item_id');
			$qty = $this->input->post('item_qty');
			$newqty = $this->input->post('qty');

			$variant = $qty + 1;


			$n = 10;
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	    	$img_id = ''; 
		    for ($i = 0; $i < $n; $i++) { 
		        $index = rand(0, strlen($characters) - 1); 
		        $img_id .= $characters[$index]; 
		    } 
			
			$data = array(); 
        	$errorUploadType = $statusMsg = ''; 
             
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                    
                    $file_ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
                    // File upload configuration 
                    $uploadPath = './assets/items/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                    
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $uploadData[$i]['image'] = $fileData['file_name'];
                        $uploadData[$i]['img_id'] = $img_id; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->model_users->insert($uploadData);   
                }
            }

            $post = array(
            	'name_of_item'=>$item,
            	'item_id'=>$id,
            	'img_id' => $img_id,
				'size' =>$size,
				'base_price'=>$base,
				'resseller_price'=>$seller,
				'qty'=>$newqty
			);
			$this->db->insert('tbl_item',$post);
			$update = array(
				'variant'=>$variant
			);
			$this->db->where('item_id',$id);
			$this->db->update('tbl_item_head',$update);
			redirect('pages/admin/newItem');
	}
	public function new_item_images(){
			$id = $this->input->post('item_id_edit_update');
			
			$data = array(); 
        	$errorUploadType = $statusMsg = ''; 
             
            // If files are selected to upload 
            if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0){ 
                $filesCount = count($_FILES['files']['name']); 
                for($i = 0; $i < $filesCount; $i++){ 
                    $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                    $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                    $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                    $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                    
                    $file_ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
                    // File upload configuration 
                    $uploadPath = './assets/items/'; 
                    $config['upload_path'] = $uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                    //$config['max_size']    = '100'; 
                    //$config['max_width'] = '1024'; 
                    //$config['max_height'] = '768'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                    
                    // Upload file to server 
                    if($this->upload->do_upload('file')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $uploadData[$i]['image'] = $fileData['file_name'];
                        $uploadData[$i]['img_id'] = $id; 
                    }else{  
                        $errorUploadType .= $_FILES['file']['name'].' | ';  
                    } 
                } 
                 
                $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                if(!empty($uploadData)){ 
                    // Insert files data into the database 
                    $insert = $this->model_users->insert($uploadData);   
                }
            }
            redirect('pages/admin/inventory');

	}
	public function printInventory(){
		$page = 'poprint';
		$this->load->view('templates/'.$page);
	}
	public function print_daily(){
		$date['date'] = $this->input->post('daily_date');
		$page = 'print_daily';
		$this->load->view('admin/'.$page,$date);
	}
	public function add_supplier(){
		$name=$this->input->post('name');
		$location=$this->input->post('location');
		$email=$this->input->post('email');
		$contact=$this->input->post('contact');

		$n = 10;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	    $suplier_id = ''; 
		for ($i = 0; $i < $n; $i++) { 
		    $index = rand(0, strlen($characters) - 1); 
		    $suplier_id .= $characters[$index]; 
		} 

		$insert = array(
			'suplier_id'=>$suplier_id,
			'suplier_name'=>$name,
			'location'=>$location,
			'email'=>$email,
			'contact'=>$contact
		);
		$this->db->insert('tbl_suplier_info',$insert);
		$pages="success";
		$this->load->view('templates/header');
	    $this->load->view('templates/side');
	    $this->load->view('admin/suplier');
	    $this->load->view('errors/'.$pages);
	    $this->load->view('templates/footer');
	}
	public function add_item_suplier(){
		$id=$this->input->post('id');
		$item=$this->input->post('item');
		$brand=$this->input->post('brand');
		$size=$this->input->post('size');
		$prize=$this->input->post('prize');
		$time=$this->input->post('time');
		$contact=$this->input->post('contact');

		$insert = array(
			'suplier_id' => $id,
			'item'=>$item,
			'brand'=>$brand,
			'size'=>$size,
			'price'=>$prize,
			'del_time'=>$time,
			'contact_person'=>$contact 
		);

		$this->db->insert('tbl_suplier_canvas',$insert);

		$pages="success";
		$this->load->view('templates/header');
	    $this->load->view('templates/side');
	    $this->load->view('admin/suplier');
	    $this->load->view('errors/'.$pages);
	    $this->load->view('templates/footer');
	}
	public function updateSuplier(){
		$id = $this->input->post('suplier_id');
		$name = $this->input->post('name');
		$location = $this->input->post('location');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');

		$suplierUpdate = array(
			'suplier_name' => $name,
			'location'=>$location,
			'email'=>$email,
			'contact'=>$contact 
		);
		$this->db->where('id',$id);
		$this->db->update('tbl_suplier_info',$suplierUpdate);

		$pages="success";
		$this->load->view('templates/header');
	    $this->load->view('templates/side');
	    $this->load->view('admin/suplier');
	    $this->load->view('errors/'.$pages);
	    $this->load->view('templates/footer');
	}
	public function print_po(){
		$po_no = $this->input->post('po_counter');
		$sup =$this->input->post('item_id_process');

		$update1 = array(
			'po_no'=> 'P.O#'.$po_no,
			'status'=>'0'
		);
		$this->db->where('status','1');
		$this->db->where('suplier_id',$sup);
		$this->db->update('tbl_po_order',$update1);
		
		$po_new = $po_no + 1;

		$update2  = array(
			'po_counter' => $po_new 
		);
		$this->db->where('id','1');
		$this->db->update('tbl_cart_counter',$update2);

		$update3  = array(
			'process' => '0' 
		);
		$this->db->where('suplier_id',$sup);
		$this->db->update('tbl_suplier_info',$update3);
		
		$datas['po'] =$po_no;
		$datas['sup']=$sup;
		$pages= 'poprint';
		$this->load->view('templates/'.$pages,$datas);
	}

	//ajax here
	public function ajax_store(){
		$data = '0';
		$field='status';
		$table='tbl_item_head';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_tag_search(){
		$data=$this->model_users->tag_search();
	 	echo json_encode($data);
	}
	public function ajax_item_display(){
		$data=$this->model_users->item_display();
	 	echo json_encode($data);
	}
	public function ajax_img_view(){
		$data = $this->input->post('img_id');
		$field='img_id';
		$table='tbl_item_img';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_addcart(){
		$data=$this->model_users->addcart();
	 	echo json_encode($data);
	}
	public function show_order(){
		///$data = '1'
		$data = $this->input->post('id');
		$field='process_id';
		$table='tbl_cart';
		$data=$this->model_users->data2($data,$field,$table);
	 	echo json_encode($data);
	}
	public function show_order_start(){
		///$data = '1'
		$data = $this->input->post('id');
		$field='process_id';
		$table='tbl_cart';
		$data=$this->model_users->data3($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_delItem(){
		$data = $this->input->post('id');
		$field = "id";
		$table= "tbl_cart";
		$data=$this->model_users->delete($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_delresel(){
		$data = $this->input->post('id');
		$field = "id";
		$table= "tbl_resseller_info";
		$data=$this->model_users->delete($data,$field,$table);
	 	echo json_encode($data);
	}

	public function cart_no(){
		$data = "1";
		$field='id';
		$table='tbl_cart_counter';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_instal_retail(){
		$data=$this->model_users->retail_instal();
	 	echo json_encode($data);
	}
	public function ajax_buy_retail(){
		$data=$this->model_users->retail_buy();
	 	echo json_encode($data);
	}
	public function ajax_refreshCart(){
		$data=$this->model_users->refresh_cart();
	 	echo json_encode($data);
	}
	public function reseller_list(){
		$data = "1";
		$field='status';
		$table='tbl_resseller_info';
		$data=$this->model_users->data7($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_confirm_buy(){
		$data=$this->model_users->confirm_buy();
	 	echo json_encode($data);
	}
	public function ajax_confirm_instal(){
		$data=$this->model_users->confirm_instal();
	 	echo json_encode($data);
	}
	public function ajax_history(){
		$data = "1";
		$field='instal';
		$table='tbl_history_sales';
		$data=$this->model_users->data4($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_instal_search(){
		$data=$this->model_users->instal_search();
	 	echo json_encode($data);
	}
	public function ajax_balance_history(){
		$data = $this->input->post('id');
		$field='history_id';
		$table='tbl_payment_hold';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function payment_mode(){
		$data=$this->model_users->payment_mode();
	 	echo json_encode($data);
	}
	public function ajax_supplier(){
		$table='tbl_suplier_info';
		$data=$this->model_users->data6($table);
	 	echo json_encode($data);
	}
	public function ajax_reseller(){
		// $table='tbl_resseller_info';
		// $data=$this->model_users->data6($table);
		$data=$this->model_users->res_records();
	 	echo json_encode($data);
	}
	public function ajax_supplier_delete(){
		$data=$this->input->post('id');
		$field = "id";
		$table="tbl_suplier_info";
		$data=$this->model_users->delete($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_supplier_canvas(){
		$data=$this->input->post('id');
		$field = "id";
		$table="tbl_suplier_canvas";
		$data=$this->model_users->delete($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_list(){
		$data = $this->input->post('id');
		$field='suplier_id';
		$table='tbl_suplier_canvas';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_delet_item_canvas(){
		$data=$this->input->post('id');
		$field = "id";
		$table="tbl_suplier_canvas";
		$data=$this->model_users->delete($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_add_res() {
		$data=$this->model_users->addreseller();
	 	echo json_encode($data);
	}
	public function ajax_res_list() {
		$table= 'tbl_resseller_info';
		$data=$this->model_users->data6($table);
	 	echo json_encode($data);
	}
	public function ajax_search_resell() {
		$data=$this->model_users->resel_search();
	 	echo json_encode($data);
	}
	public function ajax_res_item(){
		$data=$this->model_users->resel_items();
	 	echo json_encode($data);
	}
	public function ajax_item_inventory(){
		$data=$this->model_users->item_inventory();
	 	echo json_encode($data);
	}
	public function ajax_delete_item(){
		$data=$this->input->post('id');
		$field = "img_id";
		$table="tbl_item";
		$data=$this->model_users->deleteitem($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_item_search(){
		$data=$this->model_users->item_search();
		echo json_encode($data);
	}
	public function ajax_supliers_list(){
		$data=$this->model_users->item_search();
		echo json_encode($data);
	}
	public function ajax_search_sp_ad(){
		$data=$this->model_users->suplier_search();
		echo json_encode($data);
	}
	public function ajax_add_stock(){
		$data=$this->model_users->add_stock();
		echo json_encode($data);
	}
	public function ajax_edit_item(){
		$data = $this->input->post('id');
		$field='img_id';
		$table='tbl_item';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_item_update(){
		$data=$this->model_users->item_update();
	 	echo json_encode($data);

	}
	public function ajax_edit_img(){
		$data = $this->input->post('id');
		$field='img_id';
		$table='tbl_item_img';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_delete_img(){
		$data = $this->input->post('id');
		$field='id';
		$table='tbl_item_img';
		$data=$this->model_users->delete($data,$field,$table);
		echo json_encode($data);
	}
	public function ajax_resller_al(){
		$data=$this->model_users->allow();
		echo json_encode($data);
	}
	public function ajax_resller_di(){
		$data=$this->model_users->disalow();
		echo json_encode($data);
	}
	public function ajax_resller_del(){
		$data = $this->input->post('id');
		$field='id';
		$table='tbl_resseller_info';
		$data=$this->model_users->delete($data,$field,$table);
		echo json_encode($data);
	}
	public function ajax_suplier_list_po(){
		$table='tbl_suplier_info';
		$data=$this->model_users->data8($table);
	 	echo json_encode($data);
	}
	public function ajax_add_po(){
		$data=$this->model_users->add_po();
	 	echo json_encode($data);
	}
	public function ajax_get_po(){
		$data = '1';
		$field='id';
		$table='tbl_cart_counter';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_suplier_pro(){
		$data = '1';
		$field='process';
		$table='tbl_suplier_info';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_po_process1(){
		$data = $this->input->post('id');
		$field='suplier_id';
		$table='tbl_po_order';
		$data=$this->model_users->data2($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_po_pending(){
		$data=$this->model_users->pending_po();
		echo json_encode($data);
	}
	public function ajax_po_orderSearch(){
		$data=$this->model_users->po_search();
		echo json_encode($data);
	}
	public function ajax_category(){
		$data = '0';
		$field='status';
		$table='tbl_item_head';
		$data=$this->model_users->data9($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_item_dis(){
		$data = $this->input->post('id');
		$field='item_id';
		$table='tbl_item';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_item_color(){
		$data = $this->input->post('id');
		$field='img_id';
		$table='tbl_item';
		$data=$this->model_users->data($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_recieve_item(){
		$data=$this->model_users->po_recieve_rec();
	 	echo json_encode($data);
	}
	public function ajax_account(){
		$table='tbl_account';
		$data=$this->model_users->data10($table);
	 	echo json_encode($data);
	}
	public function ajax_history_all(){
		$data = '0';
		$field = 'process';
		$table='tbl_history_sales';
		$data=$this->model_users->dataDistinct($data, $field, $table);
	 	echo json_encode($data);
	}
	public function ajax_history_allsearch(){
		$data=$this->model_users->dataDistinct_search();
	 	echo json_encode($data);
	}
	public function ajax_history_sales(){
		$data = $this->input->post('cart');
		$data=$this->model_users->data_w_process($data);
	 	echo json_encode($data);
	}
	public function print_daily_rec(){
		$data=$this->model_users->print_daily_rec();
	 	echo json_encode($data);
	}
	
	public function ajax_history_file(){
		$data = '1';
		$field = 'instal';
		$table='tbl_history_sales';
		$data=$this->model_users->dataDistinct_name($data, $field, $table);
	 	echo json_encode($data);
	}
	public function ajax_reseler_balhistory(){
		$data = $this->input->post('name');
		$field = 'cost_name';
		$table='tbl_history_sales';
		$data=$this->model_users->data11($data, $field, $table);
	 	echo json_encode($data);
	}
	public function ajax_res_cart(){
		$data=$this->model_users->res_history();
	 	echo json_encode($data);
	}
	public function ajax_item_id(){
		$data=$this->model_users->show_item();
	 	echo json_encode($data);
	}
	public function ajax_search_order(){
		$data=$this->model_users->ajax_search_order();
	 	echo json_encode($data);
	}
	public function ajax_res_orderPending(){
		$data=$this->model_users->ajax_res_orderPending();
	 	echo json_encode($data);
	}
	public function ajax_item_orderDisplay(){
		$data=$this->model_users->ajax_item_orderDisplay();
	 	echo json_encode($data);
	}
	public function ajax_deleteRes(){
		$data = $this->input->post('item');
		$field='id';
		$table = 'tbl_resseller_order';
		$data=$this->model_users->delete($data,$field,$table);
	 	echo json_encode($data);
	}
	public function ajax_qty_res(){
		$data=$this->model_users->add_process_item();
	 	echo json_encode($data);
	}
	public function ajax_qty_refresh(){
		$data=$this->model_users->add_process_refresh();
	 	echo json_encode($data);
	}
	public function save_order_res(){
		$data=$this->model_users->save_order_res();
	 	echo json_encode($data);
	}
	public function ajax_res_order_view(){
		$data=$this->model_users->ajax_res_order_view();
	 	echo json_encode($data);
	}
	public function ajax_res_orderSearch_view(){
		$data=$this->model_users->ajax_res_orderSearch_view();
	 	echo json_encode($data);
	}
	public function ajax_check_res(){
		$data=$this->model_users->ajax_check_res();
	 	echo json_encode($data);
	}
	public function ajax_cancel_res(){
		$data=$this->model_users->ajax_cancel_res();
	 	echo json_encode($data);
	}
	public function process_checked_order(){
		$data=$this->model_users->process_checked_order();
	 	echo json_encode($data);
	}
	public function history_order_all(){
		$data=$this->model_users->history_order_all();
	 	echo json_encode($data);
	}
	public function history_Searchorder_all(){
		$data=$this->model_users->history_Searchorder_all();
	 	echo json_encode($data);
	}
	public function ajax_history_order(){
		$data=$this->model_users->history_po_order();
	 	echo json_encode($data);
	}
	public function history_ResOrder_all(){
		$data=$this->model_users->history_reorder_all();
	 	echo json_encode($data);
	}
	public function ajax_reshistory_order(){
		$data=$this->model_users->ajax_reshistory_order();
	 	echo json_encode($data);
	}
	public function ajax_SearchHistory_order(){
		$data=$this->model_users->ajax_SearchHistory_order();
	 	echo json_encode($data);
	}
	public function ajax_graph_save(){
		$data=$this->model_users->ajax_graph_save();
	 	echo json_encode($data);
	}
	public function ajax_item_his(){
		$data=$this->model_users->ajax_item_his();
	 	echo json_encode($data);
	}
	public function ajax_item_hisDate(){
		$data=$this->model_users->ajax_item_hisDate();
	 	echo json_encode($data);
	}
	public function graphData(){
		$data=$this->model_users->get_data();
	 	$data1 = array_reverse($data);
	 	echo json_encode($data1);
	}
	public function graphData2(){
		$data=$this->model_users->get_data2();
		$data1 = array_reverse($data);
	 	echo json_encode($data1);
	}
	public function graphCategData(){
		$data=$this->model_users->get_data1();
	 	echo json_encode($data);
	}
	public function graphSales(){
		$data=$this->model_users->graphSales();
	 	echo json_encode($data);
	}
	public function ajax_halt(){
		$data=$this->model_users->ajax_halt();
	 	echo json_encode($data);
	}
	public function add_account(){
		$data=$this->model_users->add_account();
	 	echo json_encode($data);
	}
	public function update_account(){
		$data=$this->model_users->update_account();
	 	echo json_encode($data);
	}

}
