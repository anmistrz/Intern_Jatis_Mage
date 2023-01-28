<?php
class Api extends Controller
{
    public function index()
    {
        if (isset($_SESSION['UserName'])) {
            $data['title'] = 'List API ';
            $this->view('templates/header', $data);
            $this->view('feature/listapi', $data);
            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/auth/login');
        }
    }
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
            $this->model("Api_model")->_getcontentapi();
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

        if ($method == 'GET') {
            $result['status'] = [
                "code" => 200,
                "description" => 'Request valid'
            ];
            $this->model("Api_model")->_getcontentapibyid($id);
        } else {
            $result['status'] = [
                "code" => 400,
                "description" => 'Request not valid'
            ];
            echo json_encode($result);
        }
    }
    public function inserthitapi()
    {
        $this->view('feature/api');
        $method = $_SERVER['REQUEST_METHOD'];
        $data = file_get_contents("php://input");
        $jsonDecode = json_decode($data, true);
        $input = '48XXXXXXXXX';
        $waId = '48XXXXXXXXX';
        $dataModel = $this->model('Api_model')->_postcontenthitapi($jsonDecode['to'], $jsonDecode['text']['body'], $jsonDecode['messaging_product'], $jsonDecode['recipient_type'], $jsonDecode['type'], $jsonDecode['text']['preview_url'], $input, $waId);
        if ($method == 'POST') {
            $result =
                [
                    "messaging_product" => $jsonDecode['messaging_product'],
                    "contacts" =>  array(
                        [
                            "input" => $input,
                            "wa_id" => $waId
                        ],
                    ),
                    "messages" => array(
                        [
                            "id" => $dataModel
                        ],
                    )
                ];
        } else {
            $result = [
                "code" => 400,
                "description" => 'Request not valid'
            ];
        }
        echo json_encode($result);
    }
}
