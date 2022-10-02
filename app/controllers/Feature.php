<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Feature extends Controller
{
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
}
