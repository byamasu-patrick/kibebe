<?php include("parts/header.php"); ?>
<?php include("parts/nav.php"); ?>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Artisan</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Artisani Information</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm" id="sort_by" onchange="display_data();"><option value="10" selected="">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>&nbsp;</label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div>
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
                                <tbody id="table_body">
                                    <?php include_once("parts/helper/artisan_display.php"); echo $data; ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td><strong>Position</strong></td>
                                        <td><strong>Office</strong></td>
                                        <td><strong>Salary</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <script src="assets/js/artisan_show.js" charset="utf-8"></script>
                        <div class="row">
                            <div class="col-md-6 align-self-center">
                                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                            </div>
                            <div class="col-md-6">
                                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li class="page-item <?php if($limit == 15){ echo "disabled"; }else{ echo "enabled"; }?>"><a class="page-link" href="#" onclick="search_data(<?php echo $limit - 9; ?>); return false;" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#" onclick="search_data(<?php echo $limit - 9; ?>); return false;">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="search_data(<?php echo $limit + 1; ?>); return false;">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="search_data(<?php echo $limit + 11; ?>); return false;">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" onclick="search_data(<?php echo $limit + 22; ?>); return false;" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2019</span></div>
            </div>

 <?php include("parts/footer.php"); ?>
