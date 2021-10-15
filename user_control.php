<?php include("parts/header.php"); ?>
<?php include("parts/nav.php"); ?>

    <form action="account/kibebe_file_upload.php" method="POST" enctype="multipart/form-data">
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Import Artisan</h3>
                <div class="card shadow mb-5">
                    <div class="card-header py-3">
                        <p class="text-primary d-xl-flex align-items-xl-center m-0 font-weight-bold">Upload Artisan (csv file)</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col" style="padding-bottom: 35px;">
                                <div class="d-xl-flex justify-content-xl-end align-items-xl-end dashed_upload"><div class="wrapper">
              <div class="drop">
                <div class="cont">
                  <i class="fa fa-cloud-upload"></i>
                  <div class="tit">
                    Drag & Drop
                  </div>
                  <div class="desc">
                    or
                  </div>
                  <div class="browse">
                    click here to browse
                  </div>
                </div>
                <output id="list"></output><input id="files" multiple name="files[]" type="file" />
              </div>

            </div>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script src="js/index.js"></script></div></div></div>
            <div class="row"><div class="col d-lg-flex justify-content-lg-end"><button class="btn btn-success" type="button" id="submit_product" name="productCSV" data-toggle="modal" data-target="#product_modal">Upload</button></div>
            </div></div></div>
            <div class="modal fade" id="product_modal" style="padding:0px; margin-bottom:0px;" tabindex="-1" role="dialog" aria-labelledby="dialogLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="padding:0px;">
                                  <div class="modal-content" style="padding:0px;" id='modal-content'>
                                    <div class="modal-body" id="modal_body" style="padding:0px; margin:0px;">
                                      <p class="dialog dialog-danger" id="modal-msg" style="padding: 20px;"> Please choose the file you want to upload</p>
                                      <!-- <div class="card shadow mb-5" id="modal_card_"> -->
                                        </div>
                                        <div class="card shadow" id="modal_card_">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 font-weight-bold">Artisan Information</p>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                                    <table class="table dataTable my-0" id="dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Type of Arts</th>
                                                                <th>Group</th>
                                                                <th>Jobs</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="artisan_table_body">
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="col d-xl-flex justify-content-xl-end" style="padding-right: 0px;"><button class="btn btn-primary" type="submit">Import</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer" id="modal-footer">
                                     <button type="button" class="btn btn-primary" id="modal-footer-button" data-dismiss="modal">Close</button></div>
                                  </div>
                                </div>
            </div>
    </form>
      <script src="assets/js/read_csv_file_data.js" charset="utf-8"></script>

<?php include("parts/footer.php"); ?>
