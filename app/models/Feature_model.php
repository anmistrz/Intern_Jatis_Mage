<?php

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Feature_model extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function _createburstmessagefromfile($data)
    {
        $file_name = $_FILES['filexlsx']['name'];
        $file_data = $_FILES['filexlsx']['tmp_name'];
        if (empty($file_name)) {
            Flasher::setFlash('File', 'belum di input', 'danger');
        } else {
            $ekstensi = pathinfo($file_name)['extension'];
        }
        $ekstensi_allowed = array("csv", "xls", "xlsx");
        if (!in_array($ekstensi, $ekstensi_allowed)) {
            Flasher::setFlash('Format salah', 'Silahkan masukan format file yang benar', 'danger');
        }
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        $valueData = 0;
        for ($i = 1; $i < count($sheetData); $i++) {
            $msisdn_normal = $sheetData[$i]['1'];
            $message = $sheetData[$i]['2'];
            $messagingProduct = $sheetData[$i]['3'];
            $recipientType = $sheetData[$i]['4'];
            $type = $sheetData[$i]['5'];
            $previewURL = $sheetData[$i]['6'];
            $msisdn = preg_replace("/^0/", "+", $msisdn_normal);
            if (strlen($msisdn) > 13 && strlen($msisdn) < 15  || !ctype_alpha($msisdn) && !ctype_alnum($msisdn)) {
                $valueData++;
                date_default_timezone_set("Asia/Jakarta");
                $query = "INSERT INTO content VALUES (:MessageId, :JobId, :TrxId, :MSISDN, :Message, :Messaging_Product, :Recipient_Type, :Type, :Preview_URL,  :Input, :WA_ID, :Status, :DateCreated, :DateUpdated)";
                $this->db->query($query);
                $this->db->bind('MessageId', 'wamid.g' . $this->random_strings(15) . '_' . $this->random_strings(7) . '_ww');
                $this->db->bind('JobId', $data);
                $this->db->bind('TrxId', Uuid::uuid4()->toString());
                $this->db->bind('MSISDN', preg_replace("/^0/", "+", $msisdn_normal));
                $this->db->bind('Message', $message);
                $this->db->bind('Messaging_Product', $messagingProduct);
                $this->db->bind('Recipient_Type', $recipientType);
                $this->db->bind('Type', $type);
                $this->db->bind('Preview_URL', $previewURL);
                $this->db->bind('Input', '48XXXXXXXXX');
                $this->db->bind('WA_ID', '48XXXXXXXXX');
                $this->db->bind('Status', 'Valid');
                $this->db->bind('DateCreated', date("Y-m-d H:i:s"));
                $this->db->bind('DateUpdated', date("Y-m-d H:i:s"));
                $this->db->execute();
            } else {
                $valueData++;
                date_default_timezone_set("Asia/Jakarta");
                $query = "INSERT INTO content VALUES (:MessageId, :JobId, :TrxId, :MSISDN, :Message, :Messaging_Product, :Recipient_Type, :Type, :Preview_URL, :Input, :WA_ID, :Status, :DateCreated, :DateUpdated)";
                $this->db->query($query);
                $this->db->bind('MessageId', 'wamid.g' . $this->random_strings(15) . '_' . $this->random_strings(7) . '_ww');
                $this->db->bind('JobId', $data);
                $this->db->bind('TrxId', Uuid::uuid4()->toString());
                $this->db->bind('MSISDN', preg_replace("/^0/", "+", $msisdn_normal));
                $this->db->bind('Message', $message);
                $this->db->bind('Messaging_Product', $messagingProduct);
                $this->db->bind('Recipient_Type', $recipientType);
                $this->db->bind('Type', $type);
                $this->db->bind('Preview_URL', $previewURL);
                $this->db->bind('Input', '48XXXXXXXXX');
                $this->db->bind('WA_ID', '48XXXXXXXXX');
                $this->db->bind('Status', 'Valid');
                $this->db->bind('DateCreated', date("Y-m-d H:i:s"));
                $this->db->bind('DateUpdated', date("Y-m-d H:i:s"));
                $this->db->execute();
            }
        }
        return $this->db->rowCount();
    }


    public function retrieveburstmessage()
    {
        $query = "SELECT * FROM content LEFT JOIN upload ON content.JobId = upload.JobId ORDER BY DateUpdated DESC";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function retrieveburstmessagebyid($id)
    {
        $query = "SELECT * FROM content WHERE id='$id'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function retrievejobid()
    {
        $query = "SELECT * FROM upload";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function uploadfileburstmessage()
    {
        $uuid = Uuid::uuid1()->toString();
        date_default_timezone_set("Asia/Jakarta");
        $query = "INSERT INTO upload VALUES (:JobId, :BatchName, :FileName, :FilePath, :CreatedDate, :UpdatedDate)";
        $this->db->query($query);
        $this->db->bind('JobId', $uuid);
        $this->db->bind('BatchName', pathinfo($_FILES['filexlsx']['name'])['filename']);
        $this->db->bind('FileName', pathinfo($_FILES['filexlsx']['name'])['basename']);
        $this->db->bind('FilePath', pathinfo($_FILES['filexlsx']['tmp_name'])['dirname']);
        $this->db->bind('CreatedDate', date("Y-m-d H:i:s"));
        $this->db->bind('UpdatedDate', date("Y-m-d H:i:s"));
        $this->db->execute();
        // return $this->db->rowCount();
        // $stmt = $this->db->query("SELECT LAST_INSERT_ID()");
        if ($this->db->rowCount() > 0) {
            return $uuid;
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
