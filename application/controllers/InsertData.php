<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertData extends CI_Controller {
   public function __construct($config = 'rest') {
        parent::__construct();
        $this->load->model('GetData_model');
    }
    public function insert_compare_product(){
        $product_id = $this->input->post('id');
        // $product_id = 1;
        $user_id = $_SESSION['user_id'];
        $query = 'SELECT * from skripsi.compare_product where user_id = '.$user_id.';';
        $data = $this->GetData_model->get_data_model($query);
        if ($data==null) {
            $query = 'INSERT into skripsi.compare_product(user_id,product_1_id,product_2_id) values('.$user_id.','.intval($product_id).',NULL);';
            $status = '1';
            $data = $this->GetData_model->insert_data_model($query);
            // code...
        }else if($data[0]->product_1_id==null){
            // echo('msk else1');
            $query = 'UPDATE skripsi.compare_product SET product_1_id = '.$product_id.' WHERE user_id = '.$user_id.';';
            $data = $this->GetData_model->insert_data_model($query);
            $status = '1';
        }else if($data[0]->product_2_id==null&&$data[0]->product_1_id!=null){
            // echo('msk else2');
            $query = 'UPDATE skripsi.compare_product SET product_2_id = '.$product_id.' WHERE user_id = '.$user_id.';';
            $data = $this->GetData_model->insert_data_model($query);
            $status = '2';
        }else{
            $status = 'full';
        }
        echo json_encode($status);
        // echo json_encode($data);

    }
    public function update_compare_product(){
        $product_id = $this->input->post('id');
        // $product_id = 1;
        $user_id = $_SESSION['user_id'];
        $query = 'select * from skripsi.compare_product where user_id = '.$user_id.';';
        $data = $this->GetData_model->get_data_model($query);
        $count_data = 0;
        if ($data!=null) {
            // code...
            if ($data[0]->product_1_id!=null) {
                $count_data++;
            }
            if ($data[0]->product_2_id!=null) {
                $count_data++;
            }
            switch ($count_data) {
                case 0:
                    $response ='unknown case 0';
                    break;
                case 1:
                    $query = 'UPDATE skripsi.compare_product SET product_1_id = NULL WHERE user_id = '.$user_id.';';
                    $data = $this->GetData_model->insert_data_model($query);
                    $response ='case 1';
                    break;
                case 2:
                    if ($data[0]->product_1_id==$product_id) {
                        $not_deleted = $data[0]->product_2_id; 
                    }else if ($data[0]->product_2_id==$product_id) {
                        $not_deleted = $data[0]->product_1_id;
                    }
                    $query = 'UPDATE skripsi.compare_product SET product_1_id = '.$not_deleted.',product_2_id = NULL WHERE user_id = '.$user_id.';';
                    $data = $this->GetData_model->insert_data_model($query);
                    $response ='case 2';
                    break;
                default:
                    // code...
                    $response = 'case default';
                    break;
            }
        }else{
            // echo('msk else1');
            $response ='unknown case else';
        }
        echo json_encode($response);

    }


}
