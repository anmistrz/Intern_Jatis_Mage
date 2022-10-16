<?php
class Api extends Controller
{
    public function getallburstmessageapi()
    {
        $this->view('feature/api');

        $method = $_SERVER['REQUEST_METHOD'];
        $result = array();
        if ($method == 'GET') {
            $result['status'] = [
                "code" => 200,
                "description" => 'Request valid'
            ];
            $this->model("Api_model")->_getallburstmessageapi();
        } else {
            $result['status'] = [
                "code" => 400,
                "description" => 'Request Not Valid'
            ];
        }
    }
    public function getburstmessageapibyid($id)
    {
        $this->view('feature/api');
        $method = $_SERVER['REQUEST_METHOD'];
        $result = array();
        // $data = explode("?", $_SERVER['REQUEST_URI'])[1];
        // $explodeMsidnAndTrxid = explode("&", $data);

        if ($method == 'GET') {
            $result['status'] = [
                "code" => 200,
                "description" => 'Request valid'
            ];
            // if ($explodeMsidnAndTrxid) {
            //     foreach ($explodeMsidnAndTrxid as $trxid) {
            //         $data =  explode("=", $trxid);
            //         if ($data[0] == 'msidn') {
            //             var_dump($data[1]);
            //         }
            //         if ($data[0] == 'trxid') {
            //             var_dump($data[1]);
            //         }
            //     }
            $this->model("Api_model")->_getburstmessageapibyid($id);
            // } else {
            //     $result['status'] = [
            //         "code" => 400,
            //         "description" => 'Parameter invalid'
            //     ];
            //     echo json_encode($result);
            // }
        } else {
            $result['status'] = [
                "code" => 400,
                "description" => 'Request not valid'
            ];
            echo json_encode($result);
        }
    }
    public function postinsertdataburstmessageapi()
    {
        $this->view('feature/api');
        $method = $_SERVER['REQUEST_METHOD'];
        $result = array();
        if ($method == 'POST') {
            if (isset($_POST['JobId']) && isset($_POST['MSIDN']) && isset($_POST['Message'])) {
                $result['status'] = [
                    "code" => 200,
                    "description" => '1 Data Inserted'
                ];
                $this->model("Api_model")->_postinsertburstmessageapi();
            } else {
                $result['status'] = [
                    "code" => 400,
                    "description" => 'Method not valid'
                ];
                echo json_encode($result);
            }
        } else {
            $result['status'] = [
                "code" => 400,
                "description" => 'Method not valid'
            ];
            echo json_encode($result);
        }
    }
}
