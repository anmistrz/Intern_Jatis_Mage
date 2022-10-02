<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Burst Message</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= BASEURL; ?>/feature/createburstmessage" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="msidn">MSIDN</label>
                                <input type="number" class="form-control" id="msidn" placeholder="Enter MSIDN" name="MSIDN">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <input type="text" class="form-control" id="message" placeholder="Message" name="Message">
                            </div>
                            <div class="form-group">
                                <label for="JobId">JobId</label>
                                <select class="form-control" id="JobId" name="JobId">
                                    <?php foreach ($data['job_id'] as $row) : ?>
                                        <option value="<?= $row['JobId']; ?>"><?= $row['JobId']; ?></option>
                                    <?php
                                    endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-12 mt-2">
                                <?php
                                Flasher::flash();
                                ?>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Import File to Burst Message</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form enctype="multipart/form-data" action="<?= BASEURL; ?>/feature/uploadburstmessagefromfile" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fileinput">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileinput" name="filexlsx">
                                        <label class="custom-file-label" for="fileinput">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <!-- <span class="input-group-text">Upload</span> -->
                                        <input type="submit" class="btn btn-primary" name="uploadfileburstmessage" value="Upload" />

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
                </div>
                <!-- /.card -->

            </div>
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">History Burst Message</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>JobId</th>
                                    <th>TrxId</th>
                                    <th>MSIDN</th>
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
                                        <td><?= $row['MSIDN']; ?></td>
                                        <td><?= $row['Message']; ?></td>
                                        <td><?= $row['CreatedDate']; ?></td>
                                        <td><?= $row['UpdatedDate']; ?></td>
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
                                    <th>MSIDN</th>
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