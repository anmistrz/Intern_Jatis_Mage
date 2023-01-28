<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Get All Burst Message | Method: <b>GET</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-monospace">
                        <b>URL: </b><?= BASEURL; ?>/api/getallburstmessageapi
                        <br>
                        <br>
                        <b>Response:</b> {
                        "results": [
                        {
                        "id": "1",
                        "JobId": "34fb9300-65c4-11ed-af51-3065ecc6",
                        "TrxId": "b8ae54b2-796c-488a-b2d2-a70d7651c43d",
                        "MSISDN": "62812898902763",
                        "Message": "Hai, nikmati Promo Belanja hari ini.",
                        "CreatedDate": "2022-11-16 22:34:49",
                        "UpdatedDate": null,
                        "Status": "Valid"
                        }, {
                        "id": "2",
                        "JobId": "34fb9300-65c4-11ed-af51-3065ecc6",
                        "TrxId": "ba46b0d0-42af-4728-adba-ea9ab3ef54ff",
                        "MSISDN": "62812898907462",
                        "Message": "Hai, nikmati Promo Belanja hari ini.",
                        "CreatedDate": "2022-11-16 22:34:49",
                        "UpdatedDate": null,
                        "Status": "Valid"
                        }
                        ]
                        }
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Get All Burst Message by Id | Method: <b>GET</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-monospace">
                        <b>URL: </b><?= BASEURL; ?>/api/getburstmessageapibyid/{{id}}
                        <br>
                        <br>
                        <b>Response:</b> {
                        "results": [
                        {
                        "id": "1",
                        "JobId": "34fb9300-65c4-11ed-af51-3065ecc6",
                        "TrxId": "b8ae54b2-796c-488a-b2d2-a70d7651c43d",
                        "MSISDN": "62812898902763",
                        "Message": "Hai, nikmati Promo Belanja hari ini.",
                        "CreatedDate": "2022-11-16 22:34:49",
                        "UpdatedDate": null,
                        "Status": "Valid"
                        }
                        ]
                        }
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-12">
                <!-- /.card -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Get All Burst Message by Id | Method: <b>POST</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body text-monospace">
                        <b>URL: </b><?= BASEURL; ?>/api/inserthitapi
                        <br>
                        <br>
                        <b>Request:</b> {
                        "messaging_product": "whatsapp",
                        "recipient_type": "individual",
                        "to": "62812345678910",
                        "type": "text",
                        "text": {
                        "preview_url": false,
                        "body": "Halo selamat pagi"
                        }
                        }
                        <br>
                        <br>
                        <b>Response:</b> {
                        "messaging_product": "whatsapp",
                        "contacts": [
                        {
                        "input": "48XXXXXXXXX",
                        "wa_id": "48XXXXXXXXX"
                        }
                        ],
                        "messages": [
                        {
                        "id": "wamid.gPQH1E04KmsgJZLc_LixYvk8_ww"
                        }
                        ]
                        }
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