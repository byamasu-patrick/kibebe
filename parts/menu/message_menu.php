<div class="modal fade" id="fraisInscription" tabindex="-1" role="dialog" aria-labelledby="fraisInscriptionLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h6 class="modal-title" id="fraisInscriptionLabel">Reply to the messages</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="height: 450px; padding-top: 0px;">
                      <div class="row"><div class="col-5 overflow-auto" style="font-size: 12px; height: 440px; padding-top:8px;">
                          <?php include("people.php"); echo $people; ?>
                        </div>
                        <div class="col-7"  style="margin-top: 0px; padding-top: 0px;"><div class="row" style="margin-top: 0px;">
                            <a class="d-flex align-items-center dropdown-item" href="#" id = "current_chat_person"style="height: 50px;min-width: 100%; margin-left: 0px; padding-left: 4px;"></a>
                            <div class="container overflow-auto">
                              <div id="main_container_msg" style="height: 300px;"></div>
                            </div>
                          </div>
                          <div class="row"><div class="container">
                              <form method="post" action="notification/kibebe_send_messages.php">
                                  <div class="form-row"><div class="col"><div class="form-group">
                                            <input type="hidden" name="current_receiver_id" id="current_receiver">
                                            <label for="customer_type" style="font-size: 12px;"><strong>Write your message</strong></label>
                                            <div class="row"><div class="col-9"><textarea class="form-control" style="font-size: 12px;height: 60px;" type="text" id="current_message_content" name="message_content" placeholder="Message"></textarea></div>
                                              <div class="col-3" style="padding-left: 0px;">
                                                <button type="button" onclick="send_current_sms()" class="btn btn-primary btn-sm d-none d-sm-inline-block" style="padding-left: 0px;width: 70px;float: left;"> <span class="fas fa-send "></span> Send</button></div></div>
                                            </div></div></div>
                                </form>
                            </div>
                          </div></div></div></div>
                    <div class="modal-footer"></div></div>
                </div>
        </div>
<li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-envelope fa-fw"></i><span class="badge badge-danger badge-counter">7</span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                                        role="menu">
                                        <h6 class="dropdown-header">Latest Messages</h6>
                                        <?php include_once("new_messages.php");
                                            echo $new_sms;
                                        ?>
                                      <a class="text-center dropdown-item small text-gray-500" href="#"  data-toggle="modal" data-target="#fraisInscription">Show All Alerts</a></div>
                                </li>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
