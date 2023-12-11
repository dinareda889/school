<?php
class Fungsi{
    protected $ci;
    function __construct(){

        $this->ci =& get_instance();
    }
    function user_login(){
        $this->ci->load->model('User_m');
        $user_id = $this->ci->session->userdata('userid');
        $user_data = $this->ci->User_m->get($user_id)->row();
        return $user_data;
    }






    function PdfGenerator($html , $filename ,$paper ,$orientaion){

// instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();
        //   $dompdf->loadHtml('hello world');
        $dompdf->loadHtml($html);
// (Optional) Setup the paper size and orientation
        $dompdf->setPaper($html, $orientaion);
// Render the HTML as PDF
        $dompdf->render();
// Output the generated PDF to Browser
        // $dompdf->stream($filename,array('Attachment'=>0));
        $dompdf->stream($filename);
    }


    public function company_data(){
        $this->ci->load->model('Config_company_m');
        return $this->ci->Config_company_m->listing();
    }

    public function company_about(){
        $this->ci->load->model('Company_stats_m');
        return $this->ci->Company_stats_m->listing();
    }


    public function count_api_users($status){
        $this->ci->load->model('User_m');
        return  $this->ci->User_m->count_all_api_users($status)->num_rows();
    }

    public function count_new_msg($status){
        $this->ci->load->model('Msg_m');
        return  $this->ci->Msg_m->count_all_new_msgs($status)->num_rows();
    }
    public function count_new_price_list($status){
        $this->ci->load->model('Price_list_m');
        return  $this->ci->Price_list_m->count_all_new_price_lists($status)->num_rows();
    }


    public function count_users(){
        $this->ci->load->model('User_m');
        return  $this->ci->User_m->get()->num_rows();
    }

    public function count_services(){
        $this->ci->load->model('Services_m');
        return  $this->ci->Services_m->get()->num_rows();
    }





    public function count_product_category(){
        $this->ci->load->model('Product_category_m');
        return  $this->ci->Product_category_m->get()->num_rows();
    }

    public function count_product(){
        $this->ci->load->model('Products_m');
        return  $this->ci->Products_m->get()->num_rows();
    }
    public function count_products_data(){
        $this->ci->load->model('Products_m');
        return  $this->ci->Products_m->get_count()->num_rows();
    }




    public function count_all_city(){
        $this->ci->load->model('City_m');
        return  $this->ci->City_m->get()->num_rows();
    }

    public function count_agents(){
        $this->ci->load->model('Agents_m');
        return  $this->ci->Agents_m->get()->num_rows();
    }




    public function count_items(){
        $this->ci->load->model('Item_m');
        return  $this->ci->Item_m->get()->num_rows();
    }

    public function count_suppliers(){
        $this->ci->load->model('Supplier_m');
        return  $this->ci->Supplier_m->get()->num_rows();
    }
    public function count_client(){
        $this->ci->load->model('Client_m');
        return  $this->ci->Client_m->get()->num_rows();
    }

   /* public function count_customers(){
        $this->ci->load->model('Customer_m');
        return  $this->ci->Customer_m->get()->num_rows();
    }





    public function count_activities($act_type = null ,$no3= null,$date = null,$act_ended = null){
        $this->ci->load->model('Activity_m');
        return  $this->ci->Activity_m->get_count_activities($act_type,$no3,$date,$act_ended)->num_rows();
    }


    public function count_tasks($date = null ,$act_ended = null){
        $this->ci->load->model('Tasks_m');
        return  $this->ci->Tasks_m->get_count_tasks($date,$act_ended)->num_rows();
    }




    public function get_all_cashed(){
        $this->ci->load->model('Activity_m');
        return  $this->ci->Activity_m->get_all_cashed();
    }




    public function count_stock_in_actions(){
        $this->ci->load->model('Stock_m');
        return  $this->ci->Stock_m->get()->num_rows();
    }



    public function get_all_cash(){
        $this->ci->load->model('Sale_m');
        return  $this->ci->Sale_m->get_all_cash();
    }

    public function get_all_remain(){
        $this->ci->load->model('Sale_m');
        return  $this->ci->Sale_m->get_all_remain();
    }

    public function get_all_expense(){
        $this->ci->load->model('Expense_m');
        return  $this->ci->Expense_m->get_all_expense();
    }*/




}


?>