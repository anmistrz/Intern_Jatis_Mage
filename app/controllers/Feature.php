<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Feature extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . '/feature/import');
    }
    public function import()
    {
        if (isset($_SESSION['UserName'])) {
            $data['title'] = 'Add Burst Message & Import File Message';
            $data['burst_history_message'] = $this->model("Feature_model")->retrieveburstmessage();
            $data['job_id'] = $this->model("Feature_model")->retrievejobid();
            $this->view('templates/header', $data);
            $this->view('feature/import', $data);
            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/auth/login');
        }
    }
    public function export()
    {
        if (isset($_SESSION['UserName'])) {
            $data['title'] = 'Export History Burst Message';
            $data['burst_history_message'] = $this->model("Feature_model")->retrieveburstmessage();
            $this->view('templates/header', $data);
            $this->view('feature/export', $data);
            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . '/auth/login');
        }
    }

    public function createburstmessage()
    {
        if ($this->model("Feature_model")->_createburstmessage() > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/feature/import');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/feature/import');
            exit;
        }
    }

    public function createburstmessagefromfile()
    {
        if ($this->model("Feature_model")->_createburstmessagefromfile() > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/feature/import');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/feature/import');
            exit;
        }
    }

    public function uploadburstmessagefromfile()
    {
        if (isset($_POST['uploadfileburstmessage'])) {
            $data = $this->model("Feature_model")->uploadfileburstmessage();
            $this->model("Feature_model")->_createburstmessagefromfile($data);
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/feature/import');
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/feature/import');
        }
    }
    public function exporthistoryburstmessage()
    {
        $ext = $_POST['export_file_type'];
        $filename = "history-message-sheet" . time();
        if (isset($_POST['export_btn'])) {
            if ($this->model("Feature_model")->retrieveburstmessage() > 0) {
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setCellValue('A1', 'id');
                $sheet->setCellValue('B1', 'JobId');
                $sheet->setCellValue('C1', 'TrxId');
                $sheet->setCellValue('D1', 'MSIDN');
                $sheet->setCellValue('E1', 'Message');
                $sheet->setCellValue('F1', 'CreatedDate');
                $sheet->setCellValue('G1', 'UpdatedDate');
                $sheet->setCellValue('H1', 'Status');

                $rowCount = 2;
                foreach ($this->model("Feature_model")->retrieveburstmessage() as $data) {
                    $sheet->setCellValue('A' . $rowCount,  $data['id']);
                    $sheet->setCellValue('B' . $rowCount,  $data['JobId']);
                    $sheet->setCellValue('C' . $rowCount,  $data['TrxId']);
                    $sheet->setCellValue('D' . $rowCount,  "'" . $data['MSIDN']);
                    $sheet->setCellValue('E' . $rowCount,  $data['Message']);
                    $sheet->setCellValue('F' . $rowCount,  $data['CreatedDate']);
                    $sheet->setCellValue('G' . $rowCount,  $data['UpdatedDate']);
                    $sheet->setCellValue('H' . $rowCount,  $data['Status']);
                    $rowCount++;
                }


                if ($ext == 'xlsx') {
                    $writer = new Xlsx($spreadsheet);
                    $final_filename = $filename . '.xlsx';
                } elseif ($ext == 'xls') {
                    $writer = new Xls($spreadsheet);
                    $final_filename = $filename . '.xls';
                } elseif ($ext == 'csv') {
                    $writer = new Csv($spreadsheet);
                    $final_filename = $filename . '.csv';
                }
                // $writer->save($final_filename);
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment; filename="' . urlencode($final_filename) . '"');
                $writer->save('php://output');
            } else {
                Flasher::setFlash('Record data', 'tidak ditemukan', 'danger');
                header('Location: ' . BASEURL . '/feature/export');
            }
        }
    }
}
