<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">History Burst Message</h3>
                    </div>
                    <div class="col-md-6">
                        <form action="<?= BASEURL; ?>/feature/exporthistoryburstmessage" method="post">
                            <div class="row">
                                <div class="col-md-6 mt-2">
                                    <select name="export_file_type" class="form-control">
                                        <option value="xlsx">xlsx</option>
                                        <option value="xls">xls</option>
                                        <option value="csv">csv</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <button type="submit" class="btn btn-primary" name="export_btn">Export</button>
                                </div>
                            </div>
                        </form>
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