<div class="modal fade" id="product_modal" style="padding:0px; margin-bottom:0px;" tabindex="-1" role="dialog" aria-labelledby="dialogLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="padding:0px;">
                      <div class="modal-content" style="padding:0px;" id='modal-content'>
                        <div class="modal-body" id="modal_body" style="padding:0px; margin:0px;">
                          <p class="dialog dialog-danger" id="modal-msg" style="padding: 20px;"> Please choose the file you want to upload</p>
                          <!-- <div class="card shadow mb-5" id="modal_card_"> -->
                            </div>
                            <div class="card shadow" id="modal_card_">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Product Information</p>
                                </div>
                          <div class="card-body">
                                      <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                          <table class="table dataTable my-0" id="dataTable">
                                              <thead>
                                                  <tr>
                                                      <th>Product ID</th>
                                                      <th>Product Name</th>
                                                      <th>Price</th>
                                                  </tr>
                                              </thead>
                                              <tbody id="tableContent">
                                              </tbody>
                                          </table>
                                      </div>
                                      <div class="row">
                                          <div class="col d-xl-flex justify-content-xl-end" style="padding-right: 0px;"><button class="btn btn-primary" type="submit" name="productCSV">Save</button></div>
                                      </div>
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer" id="modal-footer">
                     <button type="button" class="btn btn-primary" id="modal-footer-button" data-dismiss="modal">Close</button></div>
                  </div>
                </div>
