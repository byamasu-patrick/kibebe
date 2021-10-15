<?php include("parts/header.php"); ?>
<?php include("parts/nav.php"); ?>
  <form method="POST" action="account/kibebe_file_upload.php" enctype="multipart/form-data">
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Product Management</h3>
                <div class="row mb-3">
                    <div class="col">
                        <div class="card shadow mb-5">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Import Product (csv file)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col" style="padding-bottom: 35px;">

                                        <div class="dashed_upload"><div class="wrapper">
                                              <div class="drop">
                                                <div class="cont">
                                                  <i class="fa fa-cloud-upload"></i>
                                                  <div class="tit">
                                                    Drag CSV File & Drop
                                                  </div>
                                                  <div class="desc">
                                                    or
                                                  </div>
                                                  <div class="browse">
                                                    click here to browse
                                                  </div>
                                                </div>
                                                <output id="list"></output>
                                                <input id="files" multiple name="productsInformation" type="file"/>
                                              </div>
                                            </div>
                                          <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

                                            <script src="js/index.js"></script></div>


                                    </div>

                                </div>
                                    <div class="row">
                                        <div class="col d-lg-flex justify-content-lg-end"><button class="btn btn-success" type="button" id="submit_product" name="productCSV" data-toggle="modal" data-target="#product_modal">Upload</button></div>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>

                <?php include_once("parts/helper/dialog.php"); ?>

              </div>
  </form>
        <script src="assets/js/read_csv_file_data.js" charset="utf-8"></script>
<?php include("parts/footer.php"); ?>
