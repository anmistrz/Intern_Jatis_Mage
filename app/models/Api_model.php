<?php
class Api_model extends Controller
{

    public function _getallburstmessageapi()
    {
        $result['results'] = $this->model('Feature_model')->retrieveburstmessage();
        echo json_encode($result);
    }

    public function _getburstmessageapibyid($id)
    {
        $result['results'] = $this->model('Feature_model')->retrieveburstmessagebyid($id);
        echo json_encode($result);
    }
    public function _postinsertburstmessageapi()
    {
        $result['results'] = $this->model('Feature_model')->_createburstmessage();
        echo json_encode($result);
    }
}
