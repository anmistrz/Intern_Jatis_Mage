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
    public function _createburstmessage()
    {
        date_default_timezone_set("Asia/Jakarta");
        $query = "INSERT INTO history_burst_message VALUES ('', :JobId, :TrxId, :MSIDN, :Message, :CreatedDate, :DateUpdated, :Status)";
        $this->db->query($query);
        $this->db->bind('JobId', $_POST['JobId']);
        $this->db->bind('TrxId', Uuid::uuid4()->toString());
        $this->db->bind('MSIDN', $_POST['MSIDN']);
        $this->db->bind('Message', $_POST['Message']);
        $this->db->bind('CreatedDate', date("Y-m-d H:i:s"));
        $this->db->bind('DateUpdated', null);
        $this->db->bind('Status', 'Valid');
        $this->db->execute();
        return $this->db->rowCount();
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
            Flasher::setFlash('Format salah', 'silahkan masukan format file yang benar', 'danger');
        }
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        $valueData = 0;
        for ($i = 1; $i < count($sheetData); $i++) {
            $msidn_normal = $sheetData[$i]['1'];
            $message = $sheetData[$i]['2'];
            $msidn = preg_replace("/^0/", "+", $msidn_normal);
            $valueData++;
            date_default_timezone_set("Asia/Jakarta");
            $query = "INSERT INTO history_burst_message VALUES ('', :JobId, :TrxId, :MSIDN, :Message, :CreatedDate, :DateUpdated, :Status)";
            $this->db->query($query);
            $this->db->bind('JobId', $data);
            $this->db->bind('TrxId', Uuid::uuid4()->toString());
            $this->db->bind('MSIDN', preg_replace("/^0/", "+", $msidn_normal));
            $this->db->bind('Message', $message);
            $this->db->bind('CreatedDate', date("Y-m-d H:i:s"));
            $this->db->bind('DateUpdated', null);
            $this->db->bind('Status', 'Valid');
            $this->db->execute();
        }
        return $this->db->rowCount();
    }


    public function retrieveburstmessage()
    {
        $query = "SELECT * FROM history_burst_message";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function retrievejobid()
    {
        $query = "SELECT * FROM upload_file_burst_message";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function uploadfileburstmessage()
    {
        $uuid = Uuid::uuid1()->toString();
        date_default_timezone_set("Asia/Jakarta");
        $query = "INSERT INTO upload_file_burst_message VALUES (:JobId, :BatchName, :FileName, :FilePath, :CreatedDate, :UpdatedDate)";
        $this->db->query($query);
        $this->db->bind('JobId', $uuid);
        $this->db->bind('BatchName', pathinfo($_FILES['filexlsx']['name'])['filename']);
        $this->db->bind('FileName', pathinfo($_FILES['filexlsx']['name'])['basename']);
        $this->db->bind('FilePath', pathinfo($_FILES['filexlsx']['tmp_name'])['dirname']);
        $this->db->bind('CreatedDate', date("Y-m-d H:i:s"));
        $this->db->bind('UpdatedDate', null);
        $this->db->execute();
        // return $this->db->rowCount();
        // $stmt = $this->db->query("SELECT LAST_INSERT_ID()");
        if ($this->db->rowCount() > 0) {
            return substr($uuid, 0, 32);
        }
    }
}
