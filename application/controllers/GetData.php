<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetData extends CI_Controller {
   public function __construct($config = 'rest') {
        parent::__construct();
        $this->load->model('GetData_model');
    }
    public function get_search_data(){

        $keyword    = $this->input->post('keyword');
        $filter     = $this->input->post('filter');
        $orderby    = $this->input->post('orderby');

        // $keyword    = '';
        // $filter     = '';
        // $orderby    = 'Least Favorited';

        $filter = str_replace(",", "|", $filter);
        $counter_f = 0;
        if ($keyword!=null) {
            $counter_f++;
        }
        if ($filter!=null) {
            $counter_f++;
        }

        $query  =   "SELECT pd.product_id, pd.product_name, pd.product_img,cast(REPLACE(REPLACE(pd.lowest_price, 'Rp', ''), '.', '') as int) as lp, pd.lowest_price, pd.product_rating, c.category_name 
                    from skripsi.product_details pd
                    inner join skripsi.product p on p.product_id = pd.product_id 
                    inner join skripsi.category c on p.category_id = c.category_id 
                    where timescrape in (select max(timescrape )from skripsi.product_details) and p.product_id != '1632' and p.product_name like  '%$keyword%'";
         if ($filter!=null) {
            $query .= " and c.category_name REGEXP  '$filter' ";
                        // code...
                    }           

        $query .=  " group by product_name "; 
        if ($orderby == null) {                   
            $query .=   "order by cast(pd.product_reviewer as int) desc,pd.product_name desc ";
        }else{
            if ($orderby === "Most Favorited") {                   
            $query .=   "order by cast(pd.product_reviewer as int) desc,pd.product_name desc ";
            }
            if ($orderby === "Least Favorited") {                   
                $query .=   "order by cast(pd.product_reviewer as int) asc,pd.product_name desc ";
            }
            if ($orderby === "Highest Rating") {                   
                $query .=   "order by cast(pd.product_rating as DOUBLE) desc,pd.product_name desc ";
            }
            if ($orderby === "Lowest Rating") {                   
                $query .=   "order by cast(pd.product_rating as DOUBLE) asc,pd.product_name desc ";
            }
            if ($orderby === "Highest Price") {                   
                $query .=   "order by lp desc,pd.product_name desc ";
            }
            if ($orderby === "Lowest Price") {                   
                $query .=   "order by lp asc,pd.product_name desc ";
            }    
        }
                  

        $query .=   "limit 500;";
        // echo $query;
        $data = $this->GetData_model->get_data_model($query);
        // echo json_encode($data[0]);
        $response = '';
        $index = 0;
        foreach (@$data as $key) {
            // echo($index);
            $p_name = '';
            $p_img = '';
            if (strlen(@$key->product_name)>70) {
                $p_name = substr($key->product_name, 0,70).'...';
                
            }else{
                $p_name = @$key->product_name;
            }
            if (@$key->product_img == 'none') {
                $p_img =  base_url().'assets/No_image_available.svg.webp';
            }else{
                $p_img =@$key->product_img;
            }
            $response .= '<div class="col-md-2 d-flex align-items-stretch">
                            <div class="card">
                               <img class="card-img-top" src=\''.$p_img.'\' alt="Card image" style="height:auto; width:auto; margin: 10px; min-height:203px">
                                <div class="card-body" style="padding-top: 0px;">
                                  <p class="card-text" style="font-size: 14px; cursor:pointer;min-height:63px;max-height:63px" onclick="open_product(\''.@$key->product_id.'\')">'.$p_name.'</p>
                                  <span class="badge" style="color: white;background-color: #C22026;font-size: 12px;margin-top: 5px;">'.@$key->lowest_price.'</span>
                                  <span class="badge" style="color: white;background-color: #C22026;font-size: 12px;margin-top: 5px;"><i class="fa-solid fa-star"></i>'.@$key->product_rating.'</span>
                                  <span class="badge float-sm-right" style="color: white;background-color: #C22026;margin-top: 5px;cursor:pointer;" onclick="add_to_compare(\''.@$key->product_id.'\')">
                                     <i class="fa fa-code-compare" data-toggle="tooltip" data-placement="top" title="compare product"></i>
                                  </span>
                                </div>
                            </div>
                          </div>';
        }
        $resp['response'] = $response;
        $resp['query'] = $query;
        $resp['order'] = $orderby;

        // echo json_encode($response);
        echo json_encode($resp);
    }
    public function get_category(){
        $data = $this->GetData_model->get_category_model();
        $response = '<optgroup label="Note : Pilihan bisa lebih dari satu">';
        $index = 0;

        foreach ($data as $key) {
            $response .= '<option>'.$key->category.'</option>';
        }

        $response .= '</optgroup>';
        echo json_encode($response);
    }
    public function get_top_category(){
        $query =  'select c.category_name, sum(cast(pd.product_sold as int )) as total_sold from skripsi.product p
                    inner join skripsi.category c on p.category_id = c.category_id 
                    inner join skripsi.product_details pd on p.product_id = pd.product_id 
                    where pd.timescrape in (select max(timescrape )from skripsi.product_details)
                    group by c.category_name
                    order by total_sold desc limit 10;';
        $data = $this->GetData_model->get_data_model($query);
        $index = 0;
        foreach($data as $key){
            $response['category_name'][$index] = $key->category_name;
            $response['category_val'][$index] = intval($key->total_sold);
            $index++;
        }
        echo json_encode($response);
    }
    public function get_top_product(){
        $query =  'select product_id, product_name, timescrape, product_reviewer from skripsi.product_details pd
                    where timescrape in (select max(timescrape )from skripsi.product_details)
                    group by product_name order by cast(pd.product_reviewer as int) desc limit 10;';
        $data = $this->GetData_model->get_data_model($query);
        $index = 0;
        foreach($data as $key){
            $response['product_name'][$index] = $key->product_name;
            $response['product_reviewer'][$index] = intval($key->product_reviewer);
            $index++;
        }
        echo json_encode($response);
    }
    public function get_data_summary(){
        $query =  'select count(*) as a from skripsi.raw_data_scrape rds;';
        $data1 = $this->GetData_model->get_data_model($query);
        $query =  'select count(distinct (product_name )) as a from skripsi.raw_data_scrape rds2;';
        $data2 = $this->GetData_model->get_data_model($query);
        $query =  'select count(distinct (category )) as a from skripsi.raw_data_scrape rds2 ;';
        $data3 = $this->GetData_model->get_data_model($query);

        $response = '<div class="info-box-content">
                         <span class="info-box-number">Jumlah Produk : '.$data2[0]->a.'</span>
                         <span class="info-box-number">Jumlah Data : '.$data1[0]->a.'</span>
                      </div>';
        echo json_encode($response);

                         // <span class="info-box-number">Jumlah Kategori : '.$data3[0]->a.'</span>
    }
    private function get_detail($keyword){
        $query =  "SELECT 
                    pd.product_name, 
                    pd.product_price, 
                    pd.highest_price,
                    pd.lowest_price,
                    pd.product_stock, 
                    pd.product_sold,
                    pd.product_discount, 
                    pd.product_rating,
                    pd.product_reviewer, 
                    c.category_name, 
                    s.seller_name, 
                    s.seller_location, 
                    s.seller_link, 
                    pd.product_img,
                    pd.product_link, 
                    pd.timescrape from skripsi.product_details pd
                    inner join skripsi.product p on p.product_id = pd.product_id 
                    inner join skripsi.category c on p.category_id = c.category_id
                    inner join skripsi.seller s on p.seller_id = s.seller_id 
                    where p.product_id = '$keyword' group by timescrape order by timescrape;";
        $data = $this->GetData_model->get_data_model($query);
        $response['product_name'] = end($data)->product_name;
        $response['product_price'] = end($data)->product_price;
        $response['product_stock'] = end($data)->product_stock;
        $response['product_reviewer'] = end($data)->product_reviewer;
        $response['category'] = end($data)->category_name;
        $response['seller_name'] = end($data)->seller_name;
        $response['seller_location'] = end($data)->seller_location;
        $response['seller_link'] = end($data)->seller_link;
        $response['product_img'] = end($data)->product_img;
        $response['product_link'] = end($data)->product_link;
        $index = 0;
        foreach($data as $key){
            $response['hprice_history'][$index] = $this->extract_number($key->highest_price);
            $response['lprice_history'][$index] = $this->extract_number($key->lowest_price);
            $response['stock_history'][$index] = $this->extract_number($key->product_stock);
            $response['sold_history'][$index] = $this->extract_number($key->product_sold);
            $response['discount_history'][$index] = $this->extract_number($key->product_discount);
            $response['rating_history'][$index] = ($this->extract_number($key->product_rating)/10);
            $response['review_history'][$index] = $this->extract_number($key->product_reviewer);
            $response['date'][$index] = $key->timescrape;
            $index++;
        }
        return $response;
    }
    private function extract_number($num){
        return intval(preg_replace('/[^0-9]+/', '', $num), 10);
    }
    public function get_product_detail(){
        $keyword    = $this->input->post('keyword');
        // $keyword    = '( PE ) kaos kaki olah raga pria wanita dewasa / kaos kaki sport pendek termurah terlaris';
        $response   = $this->get_detail($keyword);
        echo json_encode($response);
    }
    public function get_compare_detail(){
        
        $user_id = $_SESSION['user_id'];
        $query = 'select * from skripsi.compare_product where user_id = '.$user_id.';';
        $data = $this->GetData_model->get_data_model($query);
        $response['detail_1'] = $this->get_detail($data[0]->product_1_id);
        $response['detail_2'] = $this->get_detail($data[0]->product_2_id);

        echo json_encode($response);

    }

    public function compare_validation(){
        $user_id = $_SESSION['user_id'];
        $count_data=0;
        $query = 'select * from skripsi.compare_product where user_id = '.$user_id.';';
        $data = $this->GetData_model->get_data_model($query);
        if (@$data !=null) {
            if ($data[0]->product_1_id!=null) {
                $count_data++;
            }
            if ($data[0]->product_2_id!=null) {
                $count_data++;
            }
        }
        echo json_encode($count_data);
    }
    public function get_compare_view(){
        $user_id = $_SESSION['user_id'];
        $query = 'select * from skripsi.compare_product where user_id = '.$user_id.';';
        $data = $this->GetData_model->get_data_model($query);

        if(@$data[0]->product_1_id!=null){
            $product_1_detail = $this->get_product_part_detail($data[0]->product_1_id);
            $p_name_1 = '';
            $p_img_1 = '';
            if (strlen($product_1_detail[0]->product_name)>70) {
                $p_name_1 = substr($product_1_detail[0]->product_name, 0,70).'...';
                
            }else{
                $p_name_1 = $product_1_detail[0]->product_name;
            }
            if ($product_1_detail[0]->product_img == 'none') {
                $p_img_1 =  base_url().'assets/No_image_available.svg.webp';
            }else{
                $p_img_1 =$product_1_detail[0]->product_img;
            }
            $response_1 = '<div class="card-header">Product 1
                                  <span class="badge float-sm-right" style="color: white;background-color: #C22026;margin-top: 5px;cursor:pointer;" onclick="remove_confirm(\''.$product_1_detail[0]->product_id.'\')">
                                     <i class="fa-solid fa-xmark"></i>
                                  </span>
                                </div>
                               <img class="card-img-top" src=\''.$p_img_1.'\' alt="Card image" style="height:auto; width:auto; margin: 10px;">
                                <div class="card-body" style="padding-top: 0px;">
                                  <p class="card-text" style="font-size: 14px; cursor:pointer;min-height:63px;max-height:63px" onclick="open_product(\''.$product_1_detail[0]->product_id.'\')">'.$p_name_1.'</p>
                                  <span class="badge" style="color: white;background-color: #C22026;font-size: 12px;margin-top: 5px;">'.$product_1_detail[0]->lowest_price.'</span>
                                  <span class="badge" style="color: white;background-color: #C22026;font-size: 12px;margin-top: 5px;"><i class="fa-solid fa-star"></i>'.$product_1_detail[0]->product_rating.'</span>
                                </div>';
        }else{

            $p_img_1 =  base_url().'assets/No_image_available.svg.webp';
            $response_1 = '<div class="card-header">No Data
                            </div>
                           <img class="card-img-top" src=\''.$p_img_1.'\' alt="Card image" style="height:auto; width:auto; margin: 10px;">
                            <div class="card-body" style="padding-top: 0px;">
                              <p class="card-text" style="font-size: 14px; cursor:pointer;min-height:63px;max-height:63px">No product selected yet</p>
                            </div>';
        }
        if(@$data[0]->product_2_id!=null){
            $product_2_detail = $this->get_product_part_detail($data[0]->product_2_id);
            $p_name_2 = '';
            $p_img_2 = '';
            if (strlen($product_2_detail[0]->product_name)>70) {
                $p_name_2 = substr($product_2_detail[0]->product_name, 0,70).'...';
                
            }else{
                $p_name_2 = $product_2_detail[0]->product_name;
            }
            if ($product_2_detail[0]->product_img == 'none') {
                $p_img_2 =  base_url().'assets/No_image_available.svg.webp';
            }else{
                $p_img_2 =$product_2_detail[0]->product_img;
            }
            $response_2 = '<div class="card-header">Product 2
                              <span class="badge float-sm-right" style="color: white;background-color: #C22026;margin-top: 5px;cursor:pointer;" onclick="remove_confirm(\''.$product_2_detail[0]->product_id.'\')">
                                 <i class="fa-solid fa-xmark"></i>
                              </span>
                            </div>
                           <img class="card-img-top" src=\''.$p_img_2.'\' alt="Card image" style="height:auto; width:auto; margin: 10px;">
                            <div class="card-body" style="padding-top: 0px;">
                              <p class="card-text" style="font-size: 14px; cursor:pointer;min-height:63px;max-height:63px" onclick="open_product(\''.$product_2_detail[0]->product_id.'\')">'.$p_name_2.'</p>
                              <span class="badge" style="color: white;background-color: #C22026;font-size: 12px;margin-top: 5px;">'.$product_2_detail[0]->lowest_price.'</span>
                              <span class="badge" style="color: white;background-color: #C22026;font-size: 12px;margin-top: 5px;"><i class="fa-solid fa-star"></i>'.$product_2_detail[0]->product_rating.'</span>
                            </div>';
        }else{
            $p_img_2 =  base_url().'assets/No_image_available.svg.webp';
            $response_2 = '<div class="card-header">No Data
                            </div>
                           <img class="card-img-top" src=\''.$p_img_2.'\' alt="Card image" style="height:auto; width:auto; margin: 10px;">
                            <div class="card-body" style="padding-top: 0px;">
                              <p class="card-text" style="font-size: 14px; cursor:pointer;min-height:63px;max-height:63px">No product selected yet</p>
                            </div>';
        }

        $response['product_1'] = $response_1;
        $response['product_2'] = $response_2;
        echo json_encode($response);

    }
    private function get_product_part_detail($id)
    {
        $query  =   "SELECT pd.product_id, pd.product_name, pd.product_img, pd.lowest_price, pd.product_rating, c.category_name 
                    from skripsi.product_details pd
                    inner join skripsi.product p on p.product_id = pd.product_id 
                    inner join skripsi.category c on p.category_id = c.category_id 
                    where timescrape in (select max(timescrape )from skripsi.product_details) and p.product_id = $id
                    group by product_name 
                    order by cast(pd.product_reviewer as int) desc limit 300;";
        $data = $this->GetData_model->get_data_model($query);
        return $data;
    }
    public function set_session_detail(){
        $_SESSION['product_detail'] = $this->input->post('link');
    }
    public function unset_session_detail(){
        unset($_SESSION['product_detail']);
    }

}
