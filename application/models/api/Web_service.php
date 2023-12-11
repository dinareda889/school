<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web_service extends CI_Model {

   	public function getAllpromocode(){
		$this->db->select('*');
		$this->db->from("tbl_promo_code");

            $this->db->where('tbl_promo_code.to_date_s>=',strtotime("now"));
  
		$this->db->order_by("promo_id","desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$data = array();$i=0;
			foreach ($query->result() as $row){
				$data[$i] = $row;

			}
			return $query->result();
		}
			return false;

	} 

  public function get_all_services()
	{
		$data = array();
     $this->db->select('tbl_services.* ,first_tbl.category_name as main_category_name ,
      second_tbl.category_name as sub_category_name  
        ');
        $this->db->from('tbl_services');
        $this->db->join('tbl_category_service first_tbl', 'first_tbl.category_id=tbl_services.main_cat', 'LEFT');
        $this->db->join('tbl_category_service second_tbl', 'second_tbl.category_id=tbl_services.sub_cat', 'LEFT');



        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                
                $i++;
            }
        }
        return $data;
	}
    
    
     public function get_main_data()
    {
        $this->db->select('conf_company_data.nameweb,
                           conf_company_data.abbreviation_name,
                           conf_company_data.slogan,
                           conf_company_data.summary_company as about_app,
                           conf_company_data.website,
                           conf_company_data.email,
                           conf_company_data.address,
                           conf_company_data.telepon,
                           conf_company_data.hp as mobile,
                           conf_company_data.fax,
                           conf_company_data.logo,
                           conf_company_data.facebook,
                           conf_company_data.twitter,
                           conf_company_data.instagram,
                           conf_company_data.google_map
        ');
        $this->db->from('conf_company_data');
        $query = $this->db->get();
        return $query->result();
    }


     public function get_terms_data()
    {
        $this->db->select('content');
        $this->db->from('tbl_terms');
        $query = $this->db->get();
        return $query->result();
    }
    
     public function get_all_products_according_cities()
	{
		$data = null;
       $this->db->select('*');
        $this->db->from('tbl_city');
        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->all_products = $this->get_all_products($row->city_id);
                
                $i++;
            }
        }
        return $data;
	}
  public function get_all_products($city_id)
	{
		$data =  array();;
       $this->db->select('tbl_products.product_id,tbl_products.product_name,
       tbl_products.product_cat,
       tbl_products.product_specification,
       tbl_products.product_desc,
       tbl_products.image,
                        first_tbl.category_name as main_category_name ,');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_category first_tbl', 'first_tbl.category_id=tbl_products.product_cat', 'LEFT');
       // $this->db->join('tbl_vendors', 'tbl_vendors.vendor_id=tbl_products.vendor_id_fk', 'LEFT');
  $this->db->where('tbl_products.city_id_fk',$city_id);
$this->db->where('tbl_products.status','activ');
$this->db->order_by("tbl_products.product_order","asc");
        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->product_sizes = $this->get_all_product_sizes($row->product_id);
                $data[$i]->taghlif_option = $this->get_all_options('tbl_serv_packaging');
                $data[$i]->cutting_option = $this->get_all_options_accord_sanf('tbl_serv_cutting',$row->product_id);
                $data[$i]->cutting_option_head = $this->get_all_options_cutting_head('tbl_serv_cutting_head',$row->product_id);
                
                
                $i++;
            }
        }
        return $data;
	}
    
    
        public function get_all_product_sizes($product_cat)
	{
		$data =  array();
		$query = $this->db->select('tbl_products_sizes.*')
					
						  ->where('product_cat',$product_cat)
						  ->get('tbl_products_sizes');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
          
                $i++;
            }
        }
        return $data;
	}
    
            public function get_all_options_accord_sanf($tbl_name,$product_cat)
	{
		$data =  array();
		$query = $this->db->select('*')
                         ->where('product_cat',$product_cat)        
						  ->get($tbl_name);
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
          
                $i++;
            }
        }
        return $data;
	}
    
    
                public function get_all_options_cutting_head($tbl_name,$product_cat)
	{
		$data =  array();
		$query = $this->db->select('*')
                         ->where('product_cat',$product_cat)        
						  ->get($tbl_name);
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
          
                $i++;
            }
        }
        return $data;
	}

        public function get_all_options($tbl_name)
	{
		$data =  array();
		$query = $this->db->select('*')
						  ->get($tbl_name);
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
          
                $i++;
            }
        }
        return $data;
	}
   public function get_all_product_cat()
	{
		$data = array();
      $this->db->select('tbl_products_category.* ');
        $this->db->from('tbl_products_category');

        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
        }
        return $data;
	}
    
    
    
    
   public function get_all_vendores()
	{
		$data = array();
      $this->db->select('tbl_vendors.* ,first_tbl.category_name as main_category_name ,
      second_tbl.category_name as sub_category_name
          
        ');
        $this->db->from('tbl_vendors');
        $this->db->join('tbl_category_service first_tbl', 'first_tbl.category_id=tbl_vendors.main_cat', 'LEFT');
        $this->db->join('tbl_category_service second_tbl', 'second_tbl.category_id=tbl_vendors.sub_cat', 'LEFT');
        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->all_vendor_services = $this->get_all_vendor_services(array('tbl_services.vendor_id_fk'=>$row->vendor_id));
                 $data[$i]->vendor_city = $this->get_city_name($row->city_id_fk);
                $i++;
            }
        }
        return $data;
	}
    
            public function get_city_name($city_id_fk)
    {
        $this->db->where('city_id',$city_id_fk);
        $query=$this->db->get('tbl_city');
        if ($query->num_rows() > 0) {
            return $query->row()->city_name;
        }
        else{
            return false;
        }
    }
    
    
    public function get_all_vendor_services($where=false)
	{
		$data = array();
		$query = $this->db->select('tbl_services.*')
					
						  ->where($where)
						  ->get('tbl_services');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
             //   $data[$i]->cities = $this->getCities($row->govern_id_pk); 
                $i++;
            }
        }
        return $data;
	}
      public function get_service_category()
	{
		$data = array();
        $this->db->where('ttype', 'maincat');
		$query =  $this->db->get('tbl_category_service');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->sub_cat = $this->getsub_cat(array('tbl_category_service.main_cat_fk'=>$row->category_id));
                $data[$i]->main_category_vendors = $this->get_main_category_vendors(array('tbl_vendors.main_cat'=>$row->category_id)); 
                $i++;
            }
        }
        return $data;
	}
    
    
    
    	public function getsub_cat($where=false)
	{
		$data = array();
		$query = $this->db->select('tbl_category_service.*')
					
						  ->where($where)
						  ->get('tbl_category_service');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
   $data[$i]->sub_category_vendors = $this->sub_category_vendors(array('tbl_vendors.sub_cat'=>$row->category_id)); 
                $i++;
            }
        }
        return $data;
	}
	public function getMain($where)
	{
		return $this->db->select('tbl_category_service.*, tbl_category_service.category_id')->where($where)->get('tbl_category_service')->result();
	}
    
    
public function get_main_category_vendors($where=false)
	{
		$data = array();
		$query = $this->db->select('tbl_vendors.*')
					
						  ->where($where)
						  ->get('tbl_vendors');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
             //   $data[$i]->cities = $this->getCities($row->govern_id_pk); 
                $i++;
            }
        }
        return $data;
	}
    
    
    public function sub_category_vendors($where=false)
	{
		$data = array();
		$query = $this->db->select('tbl_vendors.*')
					
						  ->where($where)
						  ->get('tbl_vendors');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
             //   $data[$i]->cities = $this->getCities($row->govern_id_pk); 
                $i++;
            }
        }
        return $data;
	}
    
  /**********************************************/ 
   
   	public function getUserData($id)
	{
		return $this->db->where('user_id',$id)->get('api_users')->row_array();
	} 
    
   	public function checkValidate($where)
    {
        return $this->db->where($where)->get('api_users')->row_array();
    }

	public function addUser()
	{
		$data['user_pass']     = sha1(md5($this->input->post('user_pass',true)));
		$data['user_name']     = trim($this->input->post('user_name'));
       $data['user_phone']    = $this->input->post('user_phone');
		$data['user_email']    = $this->input->post('user_email');
    	$data['user_city'] = $this->input->post('user_city');
    	//$data['date_s'] 	   = time();
    	$this->db->insert('api_users',$data);

            return $this->db->insert_id();

	}
    
    
	public function updateUser()
	{
    	$data['user_pass']     = sha1(md5($this->input->post('user_pass',true)));
		$data['user_name']     = trim($this->input->post('user_name'));
	//	$data['user_username'] = trim($this->input->post('user_name'));
		$data['user_email']    = $this->input->post('user_email');
    	$data['user_phone']    = $this->input->post('user_phone');
        $data['user_city'] = $this->input->post('user_city');
    /*	if ($this->input->post('country_id_fk')) {
    		$data['country_id_fk'] = $this->input->post('country_id_fk');
    	}*/
    	$this->db->where('user_id',$this->input->post('user_id'))->update('api_users',$data);
    	if ($this->db->affected_rows() > 0) {
            return 1;
        }
        else {
            return 0;
        }
	}
    
    
    
       public function check_user_data()
	{
	   
        $this->db->where('user_phone', $this->input->post('user_phone',true));
        $this->db->where('user_pass', sha1(md5($this->input->post('user_pass',true))));
        $query=$this->db->get('api_users');
        return  $query->num_rows();
                       
	}

	public function check_user_data_2()
	{
	    return $this->db->where('user_phone', $this->input->post('user_phone'))
	    		 		->where('user_pass', sha1(md5($this->input->post('user_pass',true))))
	    		 //		->where('approved', 1)
	    		 	//	->where('role_id_fk!=', 1)
	    				->get('api_users')
	    				->row_array();
	}
 
 
 /**************************************************/
 
      public function get_promo_percent($promo_code_fk)
    {
        $this->db->where('promo_id',$promo_code_fk);
        $query=$this->db->get('tbl_promo_code');
        if ($query->num_rows() > 0) {
            return $query->row()->percent;
        }
        else{
            return false;
        }
    }
   public function getOrderData($condition, $table)
    {
        return $this->db->where($condition)->get($table)->row_array();
    }
    /*********************************************/
    
            public function check_mob($m_tel){
        $m = $this->db
                ->group_start()
                  //  ->or_where('user_email',$m_email)
                    ->or_where('user_phone',$this->ArToEn(substr($m_tel,1)))
                    ->or_where('user_phone',$this->EnToAr(substr($m_tel,1)))
                    ->or_where('user_phone',$this->ArToEn($m_tel))
                    ->or_where('user_phone',$this->EnToAr($m_tel))
                ->group_end()
                ->get('api_users')->num_rows() ;
     
      //  if($m == 0 ){
            return $m; 
       // }
    }
          private function EnToAr($string) {
        return strtr($string, array('0'=>'?','1'=>'?','2'=>'?','3'=>'?','4'=>'?','5'=>'?','6'=>'?','7'=>'?','8'=>'?','9'=>'?'));
    }      
    private function ArToEn($string) {
        return strtr($string, array('?'=>'0', '?'=>'1', '?'=>'2', '?'=>'3', '?'=>'4', '?'=>'5', '?'=>'6', '?'=>'7', '?'=>'8', '?'=>'9', '?'=>'0', '?'=>'1', '?'=>'2', '?'=>'3', '?'=>'4', '?'=>'5', '?'=>'6', '?'=>'7', '?'=>'8', '?'=>'9'));
    }
    
    function randomDigits($length){
    $numbers = range(0,9);
    shuffle($numbers);
    for($i = 0; $i < $length; $i++){
    	global $digits;
       	$digits .= $numbers[$i];
    }
    return($digits);
}

  public function send_code_to_phone($user_phone,$randomDigits)
  {
      $message=trim('??????????');
      $message= $message.$randomDigits;
      $phone=$user_phone;
      $url='https://sms.malath.net.sa/httpSmsProvider.aspx?username=thabaeh&password=Thabaehjeddah&mobile='.$phone.'&unicode=none&message='.$message.'&sender=ADVERTIS-AD';  
     // $url='https://sms.malath.net.sa/httpSmsProvider.aspx?username=thabaeh&password=Thabaehjeddah&mobile='.$phone.'&unicode=A&message='.$message.'&sender=ADVERTIS-AD';
      $ch = curl_init();   // set url
      curl_setopt($ch, CURLOPT_URL, $url);   //return the transfer as a string
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // $output contains the output string
      $output = curl_exec($ch);  // close curl resource to free up system resources
    //  echo $output;
      curl_close($ch);
  }
  

    /**********************************************/
 	public function addOrder($table1,$table2, $recievedData)
	{
	   
       
      $check_mob_person =  $this->check_mob($recievedData->user_phone);
      if($recievedData->user_id != '' and $check_mob_person > 0){

        $user_id = $recievedData->user_id;
        
              	$data['customer_id'] = $user_id;
        $data['customer_name']   	     = $recievedData->user_name;
        $data['customer_mob']   	     = $recievedData->user_phone;
        $data['customer_address']   	     = $recievedData->user_city;
        
         $data['order_date']   	     = $recievedData->order_date;
         $data['order_time']   	     = $recievedData->order_time;
         $data['address']   	     = $recievedData->address;
           $data['pay_method']   	     = $recievedData->pay_method;
         
       	$data['status']  		 = 'neworder';
       	$data['created']  		 =  date("Y-m-d h:i:sa");
       	$data['order_date_ar']   =  (date("Y-m-d"));
       	$data['order_date_s']   =  strtotime(date("Y-m-d"));
        $data['token']           = $recievedData->token;
		$this->db->insert($table1,$data);
	$id = $this->db->insert_id();
		$this->addOrderDetails($id,$table2, $recievedData);
        
        
        
      }elseif($recievedData->user_id == '' and $check_mob_person == 0){
        
    $randomDigits =$this->randomDigits(8);
    $data_insert['user_name']=$recievedData->user_name;
    $data_insert['user_email']=$check_mob_person;
    $data_insert['user_phone']= trim($recievedData->user_phone);
    $data_insert['rand_key']= $randomDigits;
    $data_insert['user_pass']= trim($recievedData->user_phone);
    $data_insert['status']= 1;   
    $data_insert['user_city']=$recievedData->user_city;    
        
        
    $code =rand(1,10000);
   // $this->send_code_to_phone($phone,$randomDigits);   
     
        $this->db->insert('api_users',$data_insert);
        $insert_id = $this->db->insert_id();   
        // $user_id = $insert_id;

  /*  if($this->db->where('user_phone',$recievedData->user_phone)
                 ->where('user_pass',$recievedData->user_phone)
                  ->where('status',1)->get('api_users')->num_rows()>0){

  $_SESSION['member']= $data['member'] = $this->db->select('api_users.user_id,api_users.user_name,api_users.user_phone,api_users.user_email,api_users.user_city,api_users.status,,api_users.m_image')->where('user_phone',$recievedData->user_phone)->where('user_pass',$recievedData->user_phone)->where('status',1)->get('api_users')->row_array();
//  $_SESSION['member']= $data['member'] =  $this->db->select('api_users.user_id,api_users.user_name,api_users.user_phone,api_users.user_email,api_users.user_city,api_users.status,,api_users.m_image')->where('status',1)->where('user_email',$this->input->post('user_email'))->where('user_pass',$this->input->post('user_pass',true))->get('api_users')->result();
    $_SESSION['member_token']=$data['token'] =  $data['member']['user_id'].$data['member']['user_phone']; //inserted in db or session of users and use when user want get any data  
  //  $data['success'] = 1;
  //  $data['message'] = "?? ?????? ?????";
    
    }
         */
               	$data['customer_id'] = $insert_id;
        $data['customer_name']   	     = $recievedData->user_name;
        $data['customer_mob']   	     = $recievedData->user_phone;
        $data['customer_address']   	     = $recievedData->user_city;
        
         $data['order_date']   	     = $recievedData->order_date;
         $data['order_time']   	     = $recievedData->order_time;
         $data['address']   	     = $recievedData->address;
           $data['pay_method']   	     = $recievedData->pay_method;
       	$data['status']  		 = 'neworder';
       	$data['created']  		 =  date("Y-m-d h:i:sa");
       	$data['order_date_ar']   =  (date("Y-m-d"));
       	$data['order_date_s']   =  strtotime(date("Y-m-d"));
        $data['token']           = $recievedData->token;
		$this->db->insert($table1,$data);
	$id = $this->db->insert_id();
		$this->addOrderDetails($id,$table2, $recievedData);
        
         
         
         
      }elseif($recievedData->user_id == '' and $check_mob_person > 0){
    
    
        $user_phone = trim($recievedData->user_phone);  
    
         $customer_id = $this->get_customer_id($user_phone);

               	$data['customer_id'] = $customer_id;
        $data['customer_name']   	     = $recievedData->user_name;
        $data['customer_mob']   	     = $recievedData->user_phone;
        $data['customer_address']   	     = $recievedData->user_city;
        
         $data['order_date']   	     = $recievedData->order_date;
         $data['order_time']   	     = $recievedData->order_time;
         $data['address']   	     = $recievedData->address;
           $data['pay_method']   	     = $recievedData->pay_method;
       	$data['status']  		 = 'neworder';
       	$data['created']  		 =  date("Y-m-d h:i:sa");
       	$data['order_date_ar']   =  (date("Y-m-d"));
       	$data['order_date_s']   =  strtotime(date("Y-m-d"));
        $data['token']           = $recievedData->token;
		$this->db->insert($table1,$data);
	$id = $this->db->insert_id();
		$this->addOrderDetails($id,$table2, $recievedData);
      }
       

	}
    
    	public function addOrderDetails($id,$table, $recievedData)
	{
        foreach ($recievedData->orderItemList as $productKey => $product) {

        //    $productPrice = $this->getOneProductPrice(array('product_id'=>$product->product_id));
          //  $productvendor = $this->getOneProductvendor(array('product_id'=>$product->product_id));
            $data['order_id_fk'] 	 = $id;
            $data['product_id']   	 = $product->product_id;
            //$data['product_price'] = $productPrice;
            $data['product_qty'] = $product->product_qty;
            
            $data['size_id'] = $product->size_id;
            $data['size_price'] = $product->size_price;
            $data['cutting_id'] = $product->cutting_id;
            $data['cutting_price'] = $product->cutting_price;
            $data['packag_id'] = $product->packag_id;
            $data['packag_price'] = $product->packag_price;
            
           $data['cutting_head_id'] = $product->cutting_head_id;
           $data['cutting_head_price'] = $product->cutting_head_price;  
            
        //    $data['vendor_id_fk']   	     = $productvendor;
			$this->db->insert($table,$data);
        }
	}
    
    
        public function get_promo_be_used($bromo_code,$customer_id)
    {
        $this->db->where('promo_id_fk', $bromo_code);
        $this->db->where('user_id_fk', $customer_id);
        $query = $this->db->get('tbl_promo_code_users');
        if ($query->num_rows() > 0) {
            return $query->row()->be_used;
        } else {
            return 0;
        }
    }
    
            public function get_product_vendor($product_id)
    {
        $this->db->where('product_id',$product_id);
        $query=$this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->row()->vendor_id_fk;
        }
        else{
            return false;
        }
    }
      public function getOneProductvendor($where)
    {
        return $this->db->where($where)->get('tbl_products')->row_array()['vendor_id_fk'];
    }
     public function getOneProductPrice($where)
    {
        return $this->db->where($where)->get('tbl_products')->row_array()['product_price'];
    }
    
   public function getOneServicePrice($where)
    {
        return $this->db->where($where)->get('tbl_services')->row_array()['service_price'];
    }  
    
       public function getOneServicevendor($where)
    {
        return $this->db->where($where)->get('tbl_services')->row_array()['vendor_id_fk'];
    }  
    
     	public function addOrder_service($table1,$table2, $recievedDataService)
	{
		$data['customer_id'] = $recievedDataService->user_id;
        $data['customer_name']   	     = $recievedDataService->user_name;
        $data['customer_mob']   	     = $recievedDataService->user_phone;
        $data['customer_address']   	     = $recievedDataService->user_city;
        
         $data['order_date']   	     = $recievedDataService->order_date;
         $data['order_time']   	     = $recievedDataService->order_time;
        
         $data['promo_code_fk']   	     = $recievedDataService->promo_code;  

        $data['promo_code_percent']     = $this->get_promo_percent($recievedDataService->promo_code);
        
         $data['map_long']   	     = $recievedDataService->map_long;
         $data['map_lat']   	     = $recievedDataService->map_lat; 
        
       	$data['status']  		 = 'neworder';
       	$data['created']  		 =  date("Y-m-d h:i:sa");
       	$data['order_date_s']  		 =  strtotime(date("Y-m-d"));
        $data['token']           = $recievedDataService->token;
		$this->db->insert($table1,$data);
	$id = $this->db->insert_id();
		$this->addOrderDetails_service($id,$table2, $recievedDataService);
        
        $params['be_used']=$this->get_promo_be_used($recievedDataService->promo_code,$recievedDataService->user_id)+1;
        $this->db->where('promo_id_fk',$recievedDataService->promo_code);
        $this->db->where('user_id_fk', $recievedDataService->user_id);
        $this->db->update('tbl_promo_code_users',$params);  
	}
    
    	public function addOrderDetails_service($id,$table, $recievedDataService)
	{
        foreach ($recievedDataService->orderServiceList as $serviceKey => $service) {

            $servicePrice = $this->getOneServicePrice(array('service_id'=>$service->service_id));
            $servicevendor = $this->getOneServicevendor(array('service_id'=>$service->service_id));
            $data['order_id_fk'] 	 = $id;
            $data['service_id']   	 = $service->service_id;
            $data['service_price'] = $servicePrice;
            $data['vendor_id_fk'] = $servicevendor;
            
           // $data['service_qty'] = $service->service_qty;
            
			$this->db->insert($table,$data);
        }
	}
    
 /***************************************************************************/
 
    public function get_all_customer_product_orders($customer_id){
    $this->db->select('tbl_store_orders.order_id,tbl_store_orders.order_date,tbl_store_orders.order_time,
    tbl_store_orders.status as halet_talab
    ');
    $this->db->from("tbl_store_orders");
    $this->db->where('tbl_store_orders.customer_id', $customer_id);  
      $this->db->order_by("tbl_store_orders.order_id", "DESC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
        // $data[$i]->promo_code_name = $this->get_promo_code_name($row->promo_code_fk);
           $data[$i]->all_sum = $this->get_all_orders_sum($row->order_id);

           
          //  $data[$i]->all_sum_after =$this->get_all_orders_sum($row->order_id) - ($this->get_all_orders_sum($row->order_id)*($row->promo_code_percent/100));
           $data[$i]->order_details = $this->get_order_details($row->order_id);
           
           
            $i++;

        }
        return $data;

    }
    return null;
}
 
         public function  get_all_orders_sum($order_id){
        $this->db->select('*');
        $this->db->where('order_id_fk', $order_id);
        $this->db->from("tbl_store_orders_details");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total =0;
            foreach ($query->result() as $row) {
                $total += (($row->size_price*$row->product_qty)+ $row->cutting_head_price +   $row->cutting_price + $row->packag_price );
            }
            return $total;
        }
        return 0;
    }   
    	public function get_order_details($order_id_fk)
    { // vendor_id_fk
        $this->db->select('tbl_store_orders_details.*,tbl_products_category.category_name');
        $this->db->from('tbl_store_orders_details');
       $this->db->join('tbl_products_category', 'tbl_products_category.category_id=tbl_store_orders_details.product_id', 'LEFT');
       $this->db->join('tbl_store_orders', 'tbl_store_orders.order_id=tbl_store_orders_details.order_id_fk', 'LEFT');
       $this->db->where('tbl_store_orders_details.order_id_fk',$order_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
             //   $arr[$a]->vendor_name = $this->get_vendor_name($row->vendor_id_fk);
                $arr[$a]->product_name = $this->get_product_name($row->product_id);
                  $arr[$a]->product_image = $this->get_product_image($row->product_id);
                
                $a++;
            }
            return$arr;
        } else {
            return null;
        }
    }
        public function get_vendor_name($vendor_id_fk)
    {
        $this->db->where('vendor_id',$vendor_id_fk);
        $query=$this->db->get('tbl_vendors');
        if ($query->num_rows() > 0) {
            return $query->row()->vendor_name;
        }
        else{
            return false;
        }
    }
     public function get_product_name($product_id)
    {
        $this->db->where('product_id',$product_id);
        $query=$this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->row()->product_name;
        }
        else{
            return false;
        }
    }
         public function get_product_image($product_id)
    {
        $this->db->where('product_id',$product_id);
        $query=$this->db->get('tbl_products');
        if ($query->num_rows() > 0) {
            return $query->row()->image;
        }
        else{
            return false;
        }
    }
    
    /****************************************************/
    
    
    
        public function get_all_customer_service_orders($customer_id){
    $this->db->select('tbl_orders.order_id,tbl_orders.order_date,tbl_orders.order_time,,tbl_orders.promo_code_percent,tbl_orders.promo_code_fk,
    tbl_orders.map_long, tbl_orders.map_lat,tbl_orders.status as halet_talab,tbl_orders.customer_id
    ');
    $this->db->from("tbl_orders");
    $this->db->where('tbl_orders.customer_id', $customer_id); 
    $this->db->order_by("tbl_orders.order_id", "DESC");
 
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
         //  $data[$i]->promo_code_name = $this->get_promo_code_name($row->promo_code_fk);
           $data[$i]->all_sum = $this->get_all_service_orders_sum($row->order_id);
           $data[$i]->all_sum_after =$this->get_all_service_orders_sum($row->order_id) - ($this->get_all_service_orders_sum($row->order_id)*($row->promo_code_percent/100));
           $data[$i]->order_details = $this->get_service_order_details($row->order_id);
           
           
            $i++;

        }
        return $data;

    }
    return null;
}
    	public function get_service_order_details($order_id_fk)
    {
        $this->db->select('tbl_orders_details.*,tbl_services.service_name ');
        $this->db->from('tbl_orders_details');
       $this->db->join('tbl_services', 'tbl_services.service_id=tbl_orders_details.service_id', 'LEFT');
       $this->db->join('tbl_orders', 'tbl_orders.order_id=tbl_orders_details.order_id_fk', 'LEFT');
       $this->db->where('tbl_orders_details.order_id_fk',$order_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->vendor_name = $this->get_service_vendor_name($row->vendor_id_fk);
               // $arr[$a]->vendor_city = $this->get_vendor_city($row->city_id_fk);
                $a++;
            }
            return$arr;
        } else {
            return null;
        }
    }


    public function get_service_vendor_name($vendor_id_fk)
    {
        $this->db->where('vendor_id',$vendor_id_fk);
        $query=$this->db->get('tbl_vendors');
        if ($query->num_rows() > 0) {
            return $query->row()->vendor_name;
        }
        else{
            return null;
        }
    }
        public function get_vendor_city($city_id_fk)
    {
        $this->db->where('city_id',$city_id_fk);
        $query=$this->db->get('tbl_vendors');
        if ($query->num_rows() > 0) {
            return $query->row()->city_name;
        }
        else{
            return null;
        }
    }
    
    
           public function  get_all_service_orders_sum($order_id){
        $this->db->select('*');
        $this->db->where('order_id_fk', $order_id);
        $this->db->from("tbl_orders_details");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $total =0;
            foreach ($query->result() as $row) {
                $total += $row->service_price;
            }
            return $total;
        }
        return 0;
    }
     public function get_xyz_by_email($email)
    {
        $this->db->where('user_email', $email);
        
        $query = $this->db->get('api_users');
        if ($query->num_rows() > 0) {
       
               return $query->row()->user_pass;   

        } else {
            return false;
        }
    }
    
       public function get_xyz_by_email_id($email)
    {
        $this->db->where('user_email', $email);
        
        $query = $this->db->get('api_users');
        if ($query->num_rows() > 0) {
       
               return $query->row()->user_id;   

        } else {
            return false;
        }
    }
    
         public function check_email($email)
    {
        $this->db->where('user_email', $email);
        
        $query = $this->db->get('api_users');
        if ($query->num_rows() > 0) {
       
               return $query->num_rows();   

        } else {
            return 0;
        }
    }
    
           public function check_key($rand_key)
    {
        $this->db->where('rand_key', $rand_key);
        
        $query = $this->db->get('api_users');
        if ($query->num_rows() > 0) {
       
               return $query->num_rows();   

        } else {
            return 0;
        }
    }  
  public function get_all_cities()
	{
		$data = array();
     $this->db->select('tbl_city.* ');
        $this->db->from('tbl_city');
        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
        }
        return $data;
	}
    
    
        	public function all_cities()
    {
        $this->db->select('tbl_city.* ');
        $this->db->from('tbl_city');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->all_vendors = $this->get_vendors_city($row->city_id);

                $a++;
            }
            return$arr;
        } else {
            return false;
        }
    }
    
    
        public function get_vendors_city($city_id_fk)
	{
		$data = array();
		$query = $this->db->select('tbl_vendors.*')
					
						  ->where('city_id_fk',$city_id_fk)
						  ->get('tbl_vendors');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $i++;
            }
        }
        return $data;
	}
    
  function update_status($email)
{
         $params['status'] = 1;
          $this->db->where('user_email',$email);
        $this->db->update('api_users',$params);
  
    }
    
      function update_status_key($key)
{
         $params['status'] = 1;
         $params['rand_key'] = NULL;
         
          $this->db->where('rand_key',$key);
        $this->db->update('api_users',$params);
  
  
  
    }
/*************************************************/

        public function get_all_customer_promocodes($customer_id){
  /*  $this->db->select('tbl_promo_code_users.promo_id_fk,tbl_promo_code_users.user_id_fk
    ');
    $this->db->from("tbl_promo_code_users");
    $this->db->where('tbl_promo_code_users.user_id_fk', $customer_id);  */
        $this->db->select('tbl_promo_code_users.promo_id_fk,tbl_promo_code_users.user_id_fk,tbl_promo_code_users.be_used,tbl_promo_code.num_of_uses
    ');
    $this->db->from("tbl_promo_code_users");
    $this->db->join('tbl_promo_code', 'tbl_promo_code.promo_id=tbl_promo_code_users.promo_id_fk', 'LEFT');
    
    $this->db->where('tbl_promo_code_users.user_id_fk', $customer_id);  
    
    $this->db->where('tbl_promo_code_users.be_used < tbl_promo_code.num_of_uses');
          $this->db->order_by("tbl_promo_code_users.promo_id_fk", "DESC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
          
           $data[$i]->promo_code_name = $this->get_promo_code_name($row->promo_id_fk);
           $data[$i]->promo_code_percent = $this->get_promo_code_percent($row->promo_id_fk);
           
            $i++;

        }
        return $data;

    }
    return null;
}    
       public function get_promo_code_name($promo_id_fk)
    {
        $this->db->where('promo_id',$promo_id_fk);
        $query=$this->db->get('tbl_promo_code');
        if ($query->num_rows() > 0) {
            return $query->row()->promo_name;
        }
        else{
            return ;
        }
    }
        public function get_promo_code_percent($promo_id_fk)
    {
        $this->db->where('promo_id',$promo_id_fk);
        $query=$this->db->get('tbl_promo_code');
        if ($query->num_rows() > 0) {
            return $query->row()->percent;
        }
        else{
            return null ;
        }
    }
    
  /********************************************************************/

    
    
       public function get_query_search_product($product_name,$product_price,$product_cat,$vendor_id,$from_price,$to_price) {
        $this->db->select('tbl_products.* ,first_tbl.category_name as main_category_name ,
     tbl_vendors.vendor_name
  
        ');
        $this->db->from('tbl_products');
        $this->db->join('tbl_products_category first_tbl', 'first_tbl.category_id=tbl_products.product_cat', 'LEFT');
        $this->db->join('tbl_vendors', 'tbl_vendors.vendor_id=tbl_products.vendor_id_fk', 'LEFT');

     if ($product_name != null) {

           $this->db->like('tbl_products.product_name', $product_name, 'both');
        }
        
           if ($product_price != null) {
               $this->db->or_where('tbl_products.product_price', $product_price);
        }  
           if ($product_cat != null) {
               $this->db->or_where('tbl_products.product_cat', $product_cat);
        }  
           if ($vendor_id != null) {
               $this->db->or_where('tbl_products.vendor_id_fk', $vendor_id);
        }
          if($from_price !=null){
       $this->db->where("tbl_products.product_price >=",$from_price);          
         }    
         
     if($to_price !=null){
       $this->db->where("tbl_products.product_price <=",$to_price);          
         }  
        
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
          
    
            $i++;

        }
        return $data;

    }
    return null;
}
 
 
 
 
        public function get_query_search_services($service_name,$service_price,$main_cat,$sub_cat,$vendor_id) {
    
     $this->db->select('tbl_services.* ,first_tbl.category_name as main_category_name ,
      second_tbl.category_name as sub_category_name,tbl_vendors.vendor_name

        ');
        $this->db->from('tbl_services');
        $this->db->join('tbl_category_service first_tbl', 'first_tbl.category_id=tbl_services.main_cat', 'LEFT');
        $this->db->join('tbl_category_service second_tbl', 'second_tbl.category_id=tbl_services.sub_cat', 'LEFT');
        $this->db->join('tbl_vendors', 'tbl_vendors.vendor_id=tbl_services.vendor_id_fk', 'LEFT');

     if ($service_name != null) {

           $this->db->like('tbl_services.service_name', $service_name, 'both');
        }
        
           if ($service_price!= null) {
               $this->db->or_where('tbl_services.service_price', $service_price);
        }  
           if ($main_cat != null) {
               $this->db->or_where('tbl_services.main_cat', $main_cat);
        }  
            if ($sub_cat != null) {
               $this->db->or_where('tbl_services.sub_cat', $sub_cat);
        }  
        
        
           if ($vendor_id != null) {
               $this->db->or_where('tbl_services.vendor_id_fk', $vendor_id);
        }  
        
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
          
    
            $i++;

        }
        return $data;

    }
    return null;
}   
    
    
   /*  	public function get_promo_code_details($order_id_fk)
    {
        $this->db->select('tbl_orders_details.*,tbl_services.service_name ');
        $this->db->from('tbl_orders_details');
       $this->db->join('tbl_services', 'tbl_services.service_id=tbl_orders_details.service_id', 'LEFT');
       $this->db->join('tbl_orders', 'tbl_orders.order_id=tbl_orders_details.order_id_fk', 'LEFT');
       $this->db->where('tbl_orders_details.order_id_fk',$order_id_fk);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $a = 0;
            foreach ($query->result() as $row) {
                $arr[$a] = $row;
                $arr[$a]->vendor_name = $this->get_service_vendor_name($row->vendor_id_fk);
               // $arr[$a]->vendor_city = $this->get_vendor_city($row->city_id_fk);
                $a++;
            }
            return$arr;
        } else {
            return false;
        }
    }  
    */
    
    
    
    
    
    /****************************************/
    
         function insert_favorite()
{

  $params['status'] = 1;
$this->db->where('user_id', 1);

       $this->db->update('api_users',$params);
   /* if (!is_numeric($id)) {
        exit;
    }

    $this->db->where('user_id', $id);
    //$this->db->where('user_id', $this->session->userdata('user_id'));
    $row = $this->db->get('api_users')->row();

    //There is a previous value
    if ($row) {
        $this->db->where('user_id', $row->id);
      //  $this->db->where('user_id', $this->session->userdata('user_id'));           
        $this->db->delete('api_users');
        echo json_encode(array('result' => 'exists'));
    }
    else {
        $favData = array(
            'user_id' => $id
         );

        $this->db->insert('api_users', $favData);
        echo json_encode(array('result' => 'new'));
    }*/
}
    /******************************************************/
    /*    public function getMainProducts($where=false)
	{
		$query = $this->db->where($where)->get('products');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->subs = $this->getSubProducts(array('products.from_id'=>$row->id));
                $i++;
            }
            return $data;
        }
        return 0;
	}
*/

/*	public function getCountries()
	{
		$data = array();
		$query =  $this->db->get('countries');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->governs = $this->getGoverns(array('governorates.country_id_fk'=>$row->country_id_pk)); 
                $i++;
            }
        }
        return $data;
	}

	public function getGoverns($where=false)
	{
		$data = array();
		$query = $this->db->select('governorates.*, countries.*')
						  ->join('countries','countries.country_id_pk=governorates.country_id_fk')
						  ->where($where)
						  ->get('governorates');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->cities = $this->getCities($row->govern_id_pk); 
                $i++;
            }
        }
        return $data;
	}

	public function getCities($govern_id_fk)
	{
		return $this->db->where('govern_id_fk',$govern_id_fk)->get('cities')->result();
	}

	public function checkValidate($where)
    {
        return $this->db->where($where)->get('users')->row_array();
    }

	public function addUser()
	{
		$data['user_pass']     = sha1(md5($this->input->post('user_pass',true)));
		$data['user_name']     = trim($this->input->post('user_name'));
		$data['user_username'] = trim($this->input->post('user_name'));
		$data['user_email']    = $this->input->post('user_email');
		$data['role_id_fk']    = 2;
    	$data['user_phone']    = $this->input->post('user_phone');
    	$data['country_id_fk'] = $this->input->post('country_id_fk');
    	$data['date_s'] 	   = time();
    	$this->db->insert('users',$data);
    	//if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        /*}
        else {
            return 0;
        }
	}

	public function check_user_data()
	{
	    return $this->db->where('user_phone', $this->input->post('user_phone'))
	    		 		->where('user_pass', sha1(md5($this->input->post('user_pass',true))))
	    		 		->where('approved', 1)
	    		 		->where('role_id_fk!=', 1)
	    				->get('users')
	    				->row_array();
	}

	public function getRestaurant($where=false)
	{
		return $this->db->where($where)
	    				->get('restaurants')
	    				->row_array();
	}

	public function getChef($where=false)
	{
		return $this->db->where($where)
	    				->get('chefs')
	    				->row_array();
	}

	public function getAboutUs($where)
	{
		return $this->db->where($where)->order_by('id','DESC')->get('about_us')->result();
	}

	public function subscribe($img,$table,$role_id_fk)
	{
		$data['user_id_fk'] 	= $this->input->post('user_id_fk');
		$data['rest_name']  	= $this->input->post('rest_name');
		$data['rest_logo'] 	    = $img;
		$data['rest_address']   = $this->input->post('rest_address');
		$data['rest_phone']  	= $this->input->post('rest_phone');
		$data['rest_hotline']   = $this->input->post('rest_hotline');
		$data['country_id_fk']  = $this->input->post('country_id_fk');
		$data['govern_id_fk']   = $this->input->post('govern_id_fk');
		$data['city_id_fk']  	= $this->input->post('city_id_fk');
		$data['currency_id_fk'] = $this->input->post('currency_id_fk');
		$data['rest_discount']  = $this->input->post('rest_discount');
		$data['date']  			= strtotime(date("Y-m-d"));
		$data['date_s']  		= time();
		$this->db->insert($table,$data);
		$data['rest_id_fk'] 	= $this->db->insert_id();
		$this->db->set('role_id_fk', $role_id_fk)
				 ->where('user_id', $this->input->post('user_id_fk'))
				 ->update('users');
		return $data;
	}

	public function updateData($img,$table)
	{
		if ($img) {
			$data['rest_logo'] 	= $img;
		}
		$data['rest_name']  	= $this->input->post('rest_name');
		$data['rest_address']   = $this->input->post('rest_address');
		$data['rest_phone']  	= $this->input->post('rest_phone');
		$data['rest_hotline']   = $this->input->post('rest_hotline');
		$data['govern_id_fk']   = $this->input->post('govern_id_fk');
		$data['city_id_fk']  	= $this->input->post('city_id_fk');
		$data['rest_discount']  = $this->input->post('rest_discount');
		$this->db->where('rest_id_pk',$this->input->post('rest_id_fk'))->update($table,$data);
		return $data;	
	}

	public function getUserData($id)
	{
		return $this->db->where('user_id',$id)->get('users')->row_array();
	}

	public function updateUser()
	{
    	$data['user_pass']     = sha1(md5($this->input->post('user_pass',true)));
		$data['user_name']     = trim($this->input->post('user_name'));
		$data['user_username'] = trim($this->input->post('user_name'));
		$data['user_email']    = $this->input->post('user_email');
    	$data['user_phone']    = $this->input->post('user_phone');
    	if ($this->input->post('country_id_fk')) {
    		$data['country_id_fk'] = $this->input->post('country_id_fk');
    	}
    	$this->db->where('user_id',$this->input->post('user_id'))->update('users',$data);
    	if ($this->db->affected_rows() > 0) {
            return 1;
        }
        else {
            return 0;
        }
	}

	public function getLastProducts($where)
	{
		return $this->db->select('products.*,main.product_name AS main')
						->join('products main','main.id=products.from_id')
						->where($where)
						->order_by('products.id','DESC')
						->limit(8)
						->get('products')
						->result();
	}

	public function getRestaurants($where=false)
	{
		return $this->db->select('*, 1 AS type')
                        ->where($where)->get('restaurants')->result();
	}

	public function getChefs($where=false)
	{
		return $this->db->select('*, 2 AS type')
                        ->where($where)->get('chefs')->result();
	}

	public function getMain($where)
	{
		return $this->db->select('products.*, products.id AS product_id_fk')->where($where)->get('products')->result();
	}
    
    public function getMainProducts($where=false)
	{
		$query = $this->db->where($where)->get('products');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->subs = $this->getSubProducts(array('products.from_id'=>$row->id));
                $i++;
            }
            return $data;
        }
        return 0;
	}
    
    public function getSubProducts($where=false)
	{
		$this->db->select('products.*, main.product_name AS main, main.id AS mainId')
				 ->join('products main','main.id=products.from_id')
				 ->where($where);
		$query = $this->db->get('products');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->productUnits = $this->getProductUnits($row->id); 
                $data[$i]->productIngredients = $this->getProductIngredients($row->id); 
                $data[$i]->offersProduct = $this->getOfferDetails('offer_details.product_id_fk='.$row->id.' AND '.strtotime(date("Y-m-d")).'>=offer_details.from_date AND '.strtotime(date("Y-m-d")).'<=offer_details.to_date'); 
                $i++;
            }
            return $data;
        }
        return 0;
	}
    
    public function getProductUnits($id)
	{
		$sql = $this->db->select('product_units.*, units.unit_name, units.unit_id_pk, currencies.currency_symbol')
						->join('units','unit_id_pk=product_units.unit_id_fk')
						->join('currencies','currencies.currency_id_pk=product_units.currency_id_fk')
						->where('product_units.sub_product_id_fk',$id)
						->get('product_units');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        }
		return 0;
	}

	public function getProductIngredients($id)
	{
		$sql = $this->db->select('product_ingredients.*, ingredients.ing_name, ingredients.ing_price, ingredients.ing_id_pk, currencies.currency_symbol')
						->join('ingredients','ingredients.ing_id_pk=product_ingredients.ing_id_fk')
						->join('currencies','currencies.currency_id_pk=ingredients.currency_id_fk')
						->where('product_ingredients.sub_product_id_fk',$id)
						->get('product_ingredients');
		if ($sql->num_rows() > 0) {
            return $sql->result();
        }
		return 0;
	}
    
    public function getOfferDetails($where)
	{
		$sql = $this->db->select('offer_details.*, products.product_name, products.details, products.img, offers.offer_name')
						->join('products','products.id=offer_details.product_id_fk')
						->join('offers','offers.offer_id_pk=offer_details.offer_id_fk')
						->where($where)
						->get('offer_details');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        }
		return 0;
	}

	public function getMostSales($where)
	{
		return $this->db->select('Sum(order_details.amount) AS mostSale, order_details.product_id_fk, products.*')
						->join('products','products.id=order_details.product_id_fk')
						->group_by('order_details.product_id_fk')
						->where($where)
						->order_by('mostSale','DESC')
						->limit(10)
						->get('order_details')
						->result();
	}
    
    public function getOrderData($condition, $table)
    {
        return $this->db->where($condition)->get($table)->row_array();
    }
    
    public function getIngPrice($id)
    {
        return $this->db->where('ing_id_pk',$id)->get('ingredients')->row_array()['ing_price'];
    }
    
    public function getOneUnitPrice($where)
    {
        return $this->db->where($where)->get('product_units')->row_array()['price'];
    }

	public function addOrder($table1,$table2, $recievedData)
	{
	   $restData = $this->getOrderData(array('rest_id_pk'=>$recievedData->rest_iD), 'chefs');
	    if($recievedData->type == 1) {
            $restData = $this->getOrderData(array('rest_id_pk'=>$recievedData->rest_iD), 'restaurants');
	    }
		$data['from_user_id_fk'] = $recievedData->user_id;
        $data['address']   	     = $recievedData->user_address;
        $data['phone']   	     = $recievedData->user_phone;
		$data['to_user_id_fk']   = $restData['user_id_fk'];
        $data['country_id_fk']   = $restData['country_id_fk'];
		$data['govern_id_fk']    = $restData['govern_id_fk'];
		$data['city_id_fk']   	 = $restData['city_id_fk'];
        $data['currency_id_fk']  = $restData['currency_id_fk'];
        $data['rest_discount']   = $restData['rest_discount'];
		$data['admin_discount']  = $restData['admin_discount'];
        $data['token']           = $recievedData->token;
        $data['total_fatora']    = $recievedData->products_cost;
		$data['rest_id_fk']   	 = $recievedData->rest_iD;
        $data['deliver_by']   	 = $recievedData->deliver_by;
		$data['total_after_dis'] = $data['total_fatora']-($data['total_fatora']*($data['rest_discount']+$data['admin_discount'])/100);
		$data['date']  			 = strtotime(date("Y-m-d"));
		$data['date_s']  		 = time();
		$this->db->insert($table1,$data);
		$id = $this->db->insert_id();
		$this->addOrderDetails($id,$table2,$restData, $recievedData);
	}

	public function addOrderDetails($id,$table,$restData, $recievedData)
	{
        foreach ($recievedData->orderItemList as $productKey => $product) {
            $ingData = array();
			$prices = array();
            $total_ing_price = 0;
            foreach ($product->IngIDlist as $ingKey => $ing) {
				$ingData[] = $ing;
                $onePrice = $this->getIngPrice($ing);
				$prices[]  = $onePrice;
				$total_ing_price += $onePrice;
			}
            $unitPrice = $this->getOneUnitPrice(array('sub_product_id_fk'=>$product->id,'unit_id_fk'=>$product->size_id));
            $data['order_id_fk'] 	 = $id;
            $data['rest_id_fk']   	 = $recievedData->rest_iD;
            $data['from_user_id_fk'] = $recievedData->user_id;
            $data['to_user_id_fk']   = $restData['user_id_fk'];
            $data['country_id_fk']   = $restData['country_id_fk'];
    		$data['govern_id_fk']    = $restData['govern_id_fk'];
    		$data['city_id_fk']   	 = $restData['city_id_fk'];
            $data['currency_id_fk']  = $restData['currency_id_fk'];
            $data['product_id_fk']	 = $product->id;
            $data['one_price']       = $unitPrice;
            $data['unit_id_fk']	 	 = $product->size_id;
            $data['amount']	         = $product->count;
            $data['total_one_price'] = $unitPrice*$product->count;
            $data['order_details']	 = '';
            $data['ing_id_fks']		 = serialize($ingData);
			$data['ing_prices']		 = serialize($prices);
            $data['total_ing_price'] = $total_ing_price;
            $data['all_price']		 = $total_ing_price + $unitPrice;
            $data['total_all_price'] = $data['all_price']*$product->count;
            $data['date']  			 = strtotime(date("Y-m-d"));
			$data['date_s']  		 = time();
			$this->db->insert($table,$data);
        }
	}
*/
//count(tbl_promo_code_users.id) AS mostSale,

        public function get_all_customer_promocodes_test($customer_id){
    $this->db->select('tbl_promo_code_users.promo_id_fk,tbl_promo_code_users.user_id_fk,tbl_promo_code_users.be_used,tbl_promo_code.num_of_uses
    ');
    $this->db->from("tbl_promo_code_users");
    $this->db->join('tbl_promo_code', 'tbl_promo_code.promo_id=tbl_promo_code_users.promo_id_fk', 'LEFT');
    
    $this->db->where('tbl_promo_code_users.user_id_fk', $customer_id);  
    
    $this->db->where('tbl_promo_code_users.be_used < tbl_promo_code.num_of_uses');

  //  $this->db->where('tbl_promo_code_users.be_used >=', 'tbl_promo_code.num_of_uses');  
//    $this->db->where('tbl_promo_code.num_of_uses >=', 'tbl_promo_code_users.be_used'); 
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
          
          
            $data[$i]->promo_code_name = $this->get_promo_code_name_test($row->promo_id_fk);
           $data[$i]->promo_code_percent = $this->get_promo_code_percent_test($row->promo_id_fk);
      //      $data[$i]->promo_code_num_of_uses = $this->get_promo_code_num_uses($row->promo_id_fk);
        //   $data[$i]->promo_code_already_used = $this->get_promo_code_real_used($row->promo_id_fk,$customer_id);
  //$data[$i]= $row;  
/*if($row->be_used >=  $row->num_of_uses){
            break;
          }*/
            $i++;

        }
        return $data;

    }
    return null;
} 

      public function get_promo_code_real_used($promo_id_fk,$customer_id)
    {
        $this->db->where('promo_id_fk',$promo_id_fk);
        $this->db->where('user_id_fk',$customer_id);
        $query=$this->db->get('tbl_promo_code_users');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }
        else{
            return 0 ;
        }
    }   
       public function get_promo_code_name_test($promo_id_fk)
    {
        $this->db->where('promo_id',$promo_id_fk);
        $query=$this->db->get('tbl_promo_code');
        if ($query->num_rows() > 0) {
            return $query->row()->promo_name;
        }
        else{
            return ;
        }
    }
        public function get_promo_code_percent_test($promo_id_fk)
    {
        $this->db->where('promo_id',$promo_id_fk);
        $query=$this->db->get('tbl_promo_code');
        if ($query->num_rows() > 0) {
            return $query->row()->percent;
        }
        else{
            return null ;
        }
    }
    
          public function get_promo_code_num_uses($promo_id_fk)
    {
        $this->db->where('promo_id',$promo_id_fk);
        $query=$this->db->get('tbl_promo_code');
        if ($query->num_rows() > 0) {
            return $query->row()->num_of_uses;
        }
        else{
            return null ;
        }
    }
    
    
 /****************************************************************/
 
    public function get_all_vendores_new($main_cat,$sub_cat,$city)
	{
		$data = array();
      $this->db->select('tbl_vendors.* ,first_tbl.category_name as main_category_name ,
      second_tbl.category_name as sub_category_name
          
        ');
        $this->db->from('tbl_vendors');
        $this->db->join('tbl_category_service first_tbl', 'first_tbl.category_id=tbl_vendors.main_cat', 'LEFT');
        $this->db->join('tbl_category_service second_tbl', 'second_tbl.category_id=tbl_vendors.sub_cat', 'LEFT');
        
        $this->db->where('tbl_vendors.main_cat',$main_cat);
        $this->db->where('tbl_vendors.sub_cat',$sub_cat);
     //   $this->db->where('tbl_vendors.city_id_fk',$city);  
            
        
        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                $data[$i]->all_vendor_services = $this->get_all_vendor_services_new(array('tbl_services.vendor_id_fk'=>$row->vendor_id));
                 $data[$i]->vendor_city = $this->get_city_name_new($row->city_id_fk);
                $i++;
            }
        }
        return $data;
	}
    
            public function get_city_name_new($city_id_fk)
    {
        $this->db->where('city_id',$city_id_fk);
        $query=$this->db->get('tbl_city');
        if ($query->num_rows() > 0) {
            return $query->row()->city_name;
        }
        else{
            return false;
        }
    }
    
    
    public function get_all_vendor_services_new($where=false)
	{
		$data = array();
		$query = $this->db->select('tbl_services.*')
					
						  ->where($where)
						  ->get('tbl_services');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
             //   $data[$i]->cities = $this->getCities($row->govern_id_pk); 
                $i++;
            }
        }
        return $data;
	}   
 /***************************************************************************/
 
     public function get_all_services_new($main_cat,$sub_cat,$city)
	{
		$data = array();
     // $this->db->select('tbl_services.*');
           $this->db->select('tbl_services.vendor_id_fk,tbl_vendors.city_id_fk,tbl_vendors.vendor_name,
           tbl_vendors.email,tbl_vendors.mob,tbl_vendors.image,tbl_vendors.start_hour ,tbl_vendors.end_hour,
           tbl_vendors.saturday,tbl_vendors.sunday,tbl_vendors.monday,tbl_vendors.tuesday,tbl_vendors.wednesday,tbl_vendors.thursday,tbl_vendors.friday
          
        ');
        $this->db->from('tbl_services');
    //    $this->db->join('tbl_category_service first_tbl', 'first_tbl.category_id=tbl_vendors.main_cat', 'LEFT');
      //  $this->db->join('tbl_category_service second_tbl', 'second_tbl.category_id=tbl_vendors.sub_cat', 'LEFT');
        $this->db->join('tbl_vendors', 'tbl_vendors.vendor_id=tbl_services.vendor_id_fk', 'LEFT');
        $this->db->where('tbl_services.main_cat',$main_cat);
        $this->db->where('tbl_services.sub_cat',$sub_cat);
        $this->db->where('tbl_vendors.city_id_fk',$city);  
            
        $this->db->group_by('tbl_services.vendor_id_fk');

        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
                 $data[$i]->all_services_introduce = $this->get_all_vendor_on_service($row->vendor_id_fk,$main_cat,$sub_cat);
                  $data[$i]->vendor_city = $this->get_city_name_new($city);
                $i++;
            }
        }
        return $data;
	} 
    
             public function get_all_vendor_on_service($vendor_id_fk,$main_cat,$sub_cat)
	{
		$data = array();
      $this->db->select('tbl_services.*
          
        ');
        $this->db->from('tbl_services');
    //    $this->db->join('tbl_category_service first_tbl', 'first_tbl.category_id=tbl_vendors.main_cat', 'LEFT');
      //  $this->db->join('tbl_category_service second_tbl', 'second_tbl.category_id=tbl_vendors.sub_cat', 'LEFT');
      //  $this->db->join('tbl_vendors', 'tbl_vendors.city_id_fk=tbl_services.vendor_id_fk', 'LEFT');
        $this->db->where('tbl_services.vendor_id_fk',$vendor_id_fk);
        $this->db->where('tbl_services.main_cat',$main_cat);
        $this->db->where('tbl_services.sub_cat',$sub_cat);
     //   $this->db->where('tbl_vendors.city_id_fk',$city);  
            
        
        $query = $this->db->get();
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
              //  $data[$i]->all_vendor_services = $this->get_all_vendor_on_service($main_cat,$sub_cat);
             //    $data[$i]->vendor_city = $this->get_city_name_new($row->city_id_fk);
                $i++;
            }
        }
        return $data;
	}   
    /*  public function get_all_vendor_on_service($main_cat,$sub_cat)
	{
		$data = array();
		$query = $this->db->select('tbl_services.*')
					
						  ->where('tbl_services.main_cat',$main_cat)
                          ->where('tbl_services.sub_cat',$sub_cat)
                          
						  ->get('tbl_services');
		if ($query->num_rows() > 0) {
            $i=0;
            foreach ($query->result() as $row) {
                $data[$i] = $row;
             //   $data[$i]->cities = $this->getCities($row->govern_id_pk); 
                $i++;
            }
        }
        return $data;
	}*/
    
      public function get_all_my_msg($customer_id){
    $this->db->select('*');
    $this->db->from("tbl_messages");
    $this->db->where('tbl_messages.customer_id', $customer_id);  
      $this->db->order_by("tbl_messages.msg_id", "DESC");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        $data = $query->result();
        $i = 0;
        foreach ($query->result() as $row) {
           $data[$i]= $row;
            $i++;

        }
        return $data;

    }
    return null;
}


         public function get_customer_id($user_phone)
    {
        $this->db->where('user_phone',$user_phone);
        $query=$this->db->get('api_users');
        if ($query->num_rows() > 0) {
            return $query->row()->user_id;
        }
        else{
            return false;
        }
    }

     public function get_customer_phone($user_id)
    {
        $this->db->where('user_id',$user_id);
        $query=$this->db->get('api_users');
        if ($query->num_rows() > 0) {
            return $query->row()->user_phone;
        }
        else{
            return false;
        }
    }
    
}

/* End of file Web_service.php */
/* Location: ./application/models/api/Web_service.php */