<?php include("parts/header.php"); ?>
<?php include("parts/nav.php"); ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-1">New Job</h3>
                <div class="row">
                    <div class="col">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="text-primary font-weight-bold m-0">Create new Job</h6>
                            </div>
                            <div class="card-body">

                                <form method="post" action="account/kibebe_new_job.php">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="product_name"><strong>Product Name</strong><br></label>
                                                <select class="form-control" name="product_name"id="product_name">
                                                    <optgroup label="Select the product name">
                                                    <?php
                                                        include_once("parts/jobs/display_product.php");
                                                            echo $product;
                                                    ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <!-- <div class="form-group"><label for="product_name"><strong>Product Name</strong><br></label><input class="form-control dropdown" type="text" placeholder="product name" name="product_name"></div> -->
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="quantity"><strong>Quantity</strong>  <strong id="total"></strong></label><input class="form-control" type="number" placeholder="quantity"  onkeyup="setTotalAmount(this.id);" id = "quantity" name="quantity"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="customer_type"><strong>Customer type</strong></label><input class="form-control" type="text" name="customer_type" placeholder="customer type"></div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="finish_date"><strong>Complete On</strong><br></label><input class="form-control" type="date" placeholder="finishing date" name="finish_date"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group"><label for="led_by"><strong>Led by</strong></label>
                                              <select class="form-control form-control-sm custom-select custom-select-sm" id="led_by" name="led_by">

                                              </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group"><label for="last_name"><strong>Group name</strong><br></label><input class="form-control" type="text" placeholder="group ID" name="group_id"></div>
                                        </div>
                                    </div>
                                    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit" name="update">Post</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/artisan_show.js" charset="utf-8"></script>
        <script src="assets/js/new_job.js" charset="utf-8"></script>
       <?php include("parts/footer.php"); ?>
