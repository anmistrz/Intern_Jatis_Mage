<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <!-- form start -->
                <form enctype="multipart/form-data" action="<?= BASEURL; ?>/feature/uploadburstmessagefromfile" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fileinput">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fileinput" name="filexlsx">
                                    <label class="custom-file-label border-success" for="fileinput">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <!-- <span class="input-group-text">Upload</span> -->
                                    <input type="submit" class="btn btn-success" name="uploadfileburstmessage" value="Upload" />

                                </div>

                                <div class="col-sm-12 mt-2">
                                    <?php
                                    Flasher::flash();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
                <!-- /.card -->

                <div class="input-group-append">
                    <a class="btn btn-success" href="<?= BASEURL; ?>/assets/template.xlsx">Template Sample (XLSX)</a>
                </div>
                <br>
            </div>


            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Existing Users</h3>
                    </div>
                    <div class="col-md-6">
                        <form action="<?= BASEURL; ?>/feature/exporthistoryburstmessage" method="post">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <select name="export_file_type" class="form-control border-success">
                                        <option value="xlsx">xlsx</option>
                                        <option value="xls">xls</option>
                                        <option value="csv">csv</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <button type="submit" class="btn btn-success" name="export_btn">Export</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>JobId</th>
                                    <th>TrxId</th>
                                    <th>MSISDN</th>
                                    <th>Message</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data['burst_history_message'] as $row) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['JobId']; ?></td>
                                        <td><?= $row['TrxId']; ?></td>
                                        <td><?= $row['MSISDN']; ?></td>
                                        <td><?= $row['Message']; ?></td>
                                        <td><?= $row['DateCreated']; ?></td>
                                        <td><?= $row['DateUpdated']; ?></td>
                                        <td><?= $row['Status']; ?></td>
                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>JobId</th>
                                    <th>TrxId</th>
                                    <th>MSISDN</th>
                                    <th>Message</th>
                                    <th>Created Date</th>
                                    <th>Updated Date</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->