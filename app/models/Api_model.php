<?php

use Ramsey\Uuid\Uuid;

class Api_model extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function _getcontentapi()
    {
        $result['results'] = $this->model('Feature_model')->retrieveburstmessage();
        echo json_encode($result);
    }

    public function _getcontentapibyid($id)
    {
        $result['results'] = $this->model('Feature_model')->retrieveburstmessagebyid($id);
        echo json_encode($result);
    }
    public function _postcontenthitapi($msisdn, $message, $messagingProduct, $recipientType, $type, $previewURL, $input, $WA_ID)
    {
        date_default_timezone_set("Asia/Jakarta");
        $messageId = 'wamid.g' . $this->random_strings(15) . '_' . $this->random_strings(7) . '_ww';
        $query = "INSERT INTO content VALUES (:MessageId, :JobId, :TrxId, :MSISDN, :Message, :Messaging_Product, :Recipient_Type, :Type, :Preview_URL,  :Input, :WA_ID, :Status, :DateCreated, :DateUpdated)";
        $this->db->query($query);
        $this->db->bind('MessageId', $messageId);
        $this->db->bind('JobId',  null);
        $this->db->bind('TrxId', Uuid::uuid4()->toString());
        $this->db->bind('MSISDN', preg_replace("/^0/", "+", $msisdn));
        $this->db->bind('Message', $message);
        $this->db->bind('Messaging_Product', $messagingProduct);
        $this->db->bind('Recipient_Type', $recipientType);
        $this->db->bind('Type', $type);
        $this->db->bind('Preview_URL', $previewURL);
        $this->db->bind('Input', $input);
        $this->db->bind('WA_ID', $WA_ID);
        $this->db->bind('Status', 'Valid');
        $this->db->bind('DateCreated', date("Y-m-d H:i:s"));
        $this->db->bind('DateUpdated', date("Y-m-d H:i:s"));
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return $messageId;
        }
    }
    public function random_strings($length_of_string)
    {

        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        // Shuffle the $str_result and returns substring
        // of specified length
        return substr(
            str_shuffle($str_result),
            0,
            $length_of_string
        );
    }
}
