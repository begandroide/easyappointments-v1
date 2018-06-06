
<script type="text/javascript">
  $(document).ready(function (e) {
    $('#upload').on('click', function () {
      var file_data = $('#file').prop('files')[0];
      var form_data = new FormData();
      form_data.append('file', file_data);
      var idUsuario = <?= json_encode($user_settings['id']) ?>;
      form_data.append('idUser',idUsuario);
        $.ajax({
                url: "<?php echo site_url().'/ajaximageupload/upload_file' ?>", // point to server-side controller method
                dataType: 'text', // what to expect back from the server
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                success: function (response) {
                  $('#msg').html(response); // display success response from the server
                },
                error: function (response) {
                  $('#msg').html(response); // display error response from the server
                }
                    });
                });
            });
</script>
<!--button id="myButton" type="button" value=""></button>
    <input id="myInputButton" type="button" value=""></button>

    <script type="text/javascript">
        var status = 'on';
        var status2 = 'off';
        document.getElementById('myButton').innerHTML = status;
        document.getElementById('myInputButton').value = status;
        $('#myButton').on('click',function()
        {
          document.getElementById('myButton').innerHTML = status2;  
        })
    </script-->
<script src="<?= asset_url('assets/js/backend_users.js') ?>"></script>
        <div class="container">
            
                <!--div class="row"-->
                <!--div class="col-md-15 "-->
                    <div class="panel panel-default">
                          <div class="panel-heading" align="center">  
                            <h3>
                              <label id="label-name">
                              <?= $user_settings["first_name"]?>  <?= $user_settings["last_name"]?>
                              </label>
                              <button id="edit-providers" class="btn btn-default" data-toggle="modal" data-target="#uploadModalData">
                                <span class="glyphicon glyphicon-pencil"></span>
                                <?= lang('edit data') ?>
                              </button>
                            </h3>
                          </div>
                          <!-- Modal edit data-->
                                    <div id="uploadModalData" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Edit Form</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                    <!-- Form -->  
                                                                                                  <script src="<?= asset_url('assets/js/backend_users_admins.js') ?>"></script>
                                                 <script src="<?= asset_url('assets/js/backend_edit_user.js') ?>"></script>
                                                  <script src="<?= asset_url('assets/js/backend_users.js') ?>"></script>
                                                  <script src="<?= asset_url('assets/js/working_plan.js') ?>"></script>
                                                  <script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui-timepicker-addon.js') ?>"></script>
                                                  <script src="<?= asset_url('assets/ext/jquery-jeditable/jquery.jeditable.min.js') ?>"></script>
                                                  <script>
                                                      var GlobalVariables = {
                                                          baseUrl        : <?= json_encode($base_url) ?>,
                                                          dateFormat     : <?= json_encode($date_format) ?>,
                                                          admins         : <?= json_encode($admins) ?>,
                                                          providers      : <?= json_encode($providers) ?>,
                                                          services       : <?= json_encode($services) ?>,
                                                          workingPlan    : <?= json_encode(json_decode($working_plan)) ?>,
                                                          user           : {
                                                              id         : <?= $user_id ?>,
                                                              email      : <?= json_encode($user_email) ?>,
                                                              role_slug  : <?= json_encode($role_slug) ?>,
                                                              privileges : <?= json_encode($privileges) ?>
                                                          }
                                                      };

                                                      $(document).ready(function() {
                                                          BackendUsers.initialize(true);
                                                      });
                                                  </script>

                                                  <div id="users-page" class="container-fluid backend-page">

                                                      

                                                      <div class="tab-content">

                                                          <!-- PROVIDERS TAB -->

                                                          <div role="tabpanel" class="tab-pane active" id="providers">
                                                              <div class="row">
                                                                  <div id="filter-providers" class="filter-records column col-xs-12 col-sm-5">
                                                                      <!--form>
                                                                          <div class="input-group">
                                                                              <input type="text" class="key form-control">
                                                                              <span class="input-group-addon">
                                                                                <div>
                                                                                  <button class="filter btn btn-default" type="submit" title="<?= lang('filter') ?>">
                                                                                    <span class="glyphicon glyphicon-search"></span>
                                                                                  </button>
                                                                                  <button class="clear btn btn-default" type="button" title="<?= lang('clear') ?>">
                                                                                    <span class="glyphicon glyphicon-repeat"></span>
                                                                                  </button>
                                                                                </div>
                                                                              </span>
                                                                          </div>
                                                                      </form-->

                                                                      <h3><?= lang('providers') ?></h3>
                                                                      <div class="results"></div>
                                                                  </div>

                                                                  <div class="record-details column col-xs-12 col-sm-7">
                                                                      <div class="pull-left">
                                                                          <div class="add-edit-delete-group btn-group">
                                                                              <button id="add-provider" class="btn btn-primary">
                                                                                  <span class="glyphicon glyphicon-plus"></span>
                                                                                  <?= lang('add') ?>
                                                                              </button>
                                                                              <button id="edit-provider" class="btn btn-default">
                                                                                  <span class="glyphicon glyphicon-pencil"></span>
                                                                                  <?= lang('edit') ?>
                                                                              </button>
                                                                              <button id="delete-provider" class="btn btn-default" disabled="disabled">
                                                                                  <span class="glyphicon glyphicon-remove"></span>
                                                                                  <?= lang('delete') ?>
                                                                              </button>
                                                                          </div>

                                                                          <div class="save-cancel-group btn-group" style="display:none;">
                                                                              <button id="save-provider" class="btn btn-primary">
                                                                                  <span class="glyphicon glyphicon-ok"></span>
                                                                                  <?= lang('save') ?>
                                                                              </button>
                                                                              <script type="text/javascript">
                                                                                $('#save-provider').on('click',function()
                                                                                {
                                                                                  var name = document.getElementById('provider-first-name').value;
                                                                                  var last_name = document.getElementById('provider-last-name').value;
                                                                                  var state = document.getElementById('provider-state').value;
                                                                                  var city = document.getElementById('provider-city').value;
                                                                                  document.getElementById('label-name').innerHTML = name+' '+last_name;
                                                                                  document.getElementById('state-provider').innerHTML = state;
                                                                                  document.getElementById('city-provider').innerHTML = city;
                                                                                  });
                                                                              </script>
                                                                              <button id="cancel-provider" class="btn btn-default">
                                                                                  <span class="glyphicon glyphicon-ban-circle"></span>
                                                                                  <?= lang('cancel') ?>
                                                                              </button>
                                                                          </div>
                                                                      </div>

                                                                      <div class="switch-view pull-right">
                                                                          <strong><?= lang('current_view') ?></strong>
                                                                          <div class="display-details current"><?= lang('details') ?></div>
                                                                          <div class="display-working-plan"><?= lang('working_plan') ?></div>
                                                                      </div>

                                                                      <?php // This form message is outside the details view, so that it can be
                                                                      // visible when the user has working plan view active. ?>
                                                                      <div class="form-message alert" style="display:none;"></div>

                                                                      <div class="details-view provider-view">
                                                                          <h3><?= lang('details') ?></h3>

                                                                          <input type="hidden" id="provider-id" class="record-id">

                                                                          <div class="row">
                                                                              <div class="provider-details col-xs-12 col-sm-6">
                                                                                  <div class="form-group">
                                                                                      <label for="provider-first-name"><?= lang('first_name') ?> *</label>
                                                                                      <input id="provider-first-name" class="form-control required" maxlength="256">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-last-name"><?= lang('last_name') ?> *</label>
                                                                                      <input id="provider-last-name" class="form-control required" maxlength="512">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-email"><?= lang('email') ?> *</label>
                                                                                      <input id="provider-email" class="form-control required" max="512">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-phone-number"><?= lang('phone_number') ?> *</label>
                                                                                      <input id="provider-phone-number" class="form-control required" max="128">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-mobile-number"><?= lang('mobile_number') ?></label>
                                                                                      <input id="provider-mobile-number" class="form-control" maxlength="128">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-address"><?= lang('address') ?></label>
                                                                                      <input id="provider-address" class="form-control" maxlength="256">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-city"><?= lang('city') ?></label>
                                                                                      <input id="provider-city" class="form-control" maxlength="256">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-state"><?= lang('state') ?></label>
                                                                                      <input id="provider-state" class="form-control" maxlength="256">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-zip-code"><?= lang('zip_code') ?></label>
                                                                                      <input id="provider-zip-code" class="form-control" maxlength="64">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-notes"><?= lang('notes') ?></label>
                                                                                      <textarea id="provider-notes" class="form-control" rows="3"></textarea>
                                                                                  </div>
                                                                              </div>
                                                                              <div class="provider-settings col-xs-12 col-sm-6">
                                                                                  <div class="form-group">
                                                                                      <label for="provider-username"><?= lang('username') ?> *</label>
                                                                                      <input id="provider-username" class="form-control required" maxlength="256">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-password"><?= lang('password') ?> *</label>
                                                                                      <input type="password" id="provider-password" class="form-control required" maxlength="512">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-password-confirm"><?= lang('retype_password') ?> *</label>
                                                                                      <input type="password" id="provider-password-confirm" class="form-control required" maxlength="512">
                                                                                  </div>

                                                                                  <div class="form-group">
                                                                                      <label for="provider-calendar-view"><?= lang('calendar') ?> *</label>
                                                                                      <select id="provider-calendar-view" class="form-control required">
                                                                                          <option value="default">Default</option>
                                                                                          <option value="table">Table</option>
                                                                                      </select>
                                                                                  </div>

                                                                                  <br>

                                                                                  <button type="button" id="provider-notifications" class="btn btn-default" data-toggle="button">
                                                                                      <span class="glyphicon glyphicon-envelope"></span>
                                                                                      <span><?= lang('receive_notifications') ?></span>
                                                                                  </button>

                                                                                  <br><br>

                                                                                  <h4><?= lang('services') ?></h4>
                                                                                  <div id="provider-services" class="well"></div>
                                                                              </div>
                                                                          </div>
                                                                      </div>

                                                                      <div class="working-plan-view provider-view" style="display: none;">
                                                                          <h3><?= lang('working_plan') ?></h3>
                                                                          <button id="reset-working-plan" class="btn btn-primary"
                                                                                  title="<?= lang('reset_working_plan') ?>">
                                                                              <span class="glyphicon glyphicon-repeat"></span>
                                                                              <?= lang('reset_plan') ?></button>
                                                                          <table class="working-plan table table-striped">
                                                                              <thead>
                                                                                  <tr>
                                                                                      <th><?= lang('day') ?></th>
                                                                                      <th><?= lang('start') ?></th>
                                                                                      <th><?= lang('end') ?></th>
                                                                                  </tr>
                                                                              </thead>
                                                                              <tbody>
                                                                                  <tr>
                                                                                      <td>
                                                                                          <div class="checkbox">
                                                                                              <label>
                                                                                                  <input type="checkbox" id="sunday">
                                                                                                  <?= lang('sunday') ?>
                                                                                              </label>
                                                                                          </div>
                                                                                      </td>
                                                                                      <td><input id="sunday-start" class="work-start form-control input-sm"></td>
                                                                                      <td><input id="sunday-end" class="work-end form-control input-sm"></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>
                                                                                          <div class="checkbox">
                                                                                              <label>
                                                                                                  <input type="checkbox" id="monday">
                                                                                                  <?= lang('monday') ?>
                                                                                              </label>
                                                                                          </div>
                                                                                      </td>
                                                                                      <td><input id="monday-start" class="work-start form-control input-sm"></td>
                                                                                      <td><input id="monday-end" class="work-end form-control input-sm"></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>
                                                                                          <div class="checkbox">
                                                                                              <label>
                                                                                                  <input type="checkbox" id="tuesday">
                                                                                                  <?= lang('tuesday') ?>
                                                                                              </label>
                                                                                          </div>
                                                                                      </td>
                                                                                      <td><input id="tuesday-start" class="work-start form-control input-sm"></td>
                                                                                      <td><input id="tuesday-end" class="work-end form-control input-sm"></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>
                                                                                          <div class="checkbox">
                                                                                              <label>
                                                                                                  <input type="checkbox" id="wednesday">
                                                                                                  <?= lang('wednesday') ?>
                                                                                              </label>
                                                                                          </div>
                                                                                      </td>
                                                                                      <td><input id="wednesday-start" class="work-start form-control input-sm"></td>
                                                                                      <td><input id="wednesday-end" class="work-end form-control input-sm"></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>
                                                                                          <div class="checkbox">
                                                                                              <label>
                                                                                                  <input type="checkbox" id="thursday">
                                                                                                  <?= lang('thursday') ?>
                                                                                              </label>
                                                                                          </div>
                                                                                      </td>
                                                                                      <td><input id="thursday-start" class="work-start form-control input-sm"></td>
                                                                                      <td><input id="thursday-end" class="work-end form-control input-sm"></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>
                                                                                          <div class="checkbox">
                                                                                              <label>
                                                                                                  <input type="checkbox" id="friday">
                                                                                                  <?= lang('friday') ?>
                                                                                              </label>
                                                                                          </div>
                                                                                      </td>
                                                                                      <td><input id="friday-start" class="work-start form-control input-sm"></td>
                                                                                      <td><input id="friday-end" class="work-end form-control input-sm"></td>
                                                                                  </tr>
                                                                                  <tr>
                                                                                      <td>
                                                                                          <div class="checkbox">
                                                                                              <label>
                                                                                                  <input type="checkbox" id="saturday">
                                                                                                  <?= lang('saturday') ?>
                                                                                              </label>
                                                                                          </div>
                                                                                      </td>
                                                                                      <td><input id="saturday-start" class="work-start form-control input-sm"></td>
                                                                                      <td><input id="saturday-end" class="work-end form-control input-sm"></td>
                                                                                  </tr>
                                                                              </tbody>
                                                                          </table>

                                                                          <br>

                                                                          <h3><?= lang('breaks') ?></h3>

                                                                          <span class="help-block">
                                                                              <?= lang('add_breaks_during_each_day') ?>
                                                                          </span>

                                                                          <div>
                                                                              <button type="button" class="add-break btn btn-primary">
                                                                                  <span class="glyphicon glyphicon-plus"></span>
                                                                                  <?= lang('add_break') ?>
                                                                              </button>
                                                                          </div>

                                                                          <br>

                                                                          <table class="breaks table table-striped">
                                                                              <thead>
                                                                                  <tr>
                                                                                      <th><?= lang('day') ?></th>
                                                                                      <th><?= lang('start') ?></th>
                                                                                      <th><?= lang('end') ?></th>
                                                                                      <th><?= lang('actions') ?></th>
                                                                                  </tr>
                                                                              </thead>
                                                                              <tbody><!-- Dynamic Content --></tbody>
                                                                          </table>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>          
                          <!--Finished edit data modal-->
                                    </div>
                                    </div>
                                    </div>

                            <div class="panel-body">
                            <div class="box box-info">
                            <div class="box-body">
                            <div class="col-sm-6">
                            <?php 
                                if (file_exists('uploads/'.$user_settings['id'].'/perfil.png'))
                                {
                                    echo'<img src="' . base_url().'uploads/' . $user_settings['id'] . '/perfil.png" class="img-circle img-responsive" width=200 height=200>';

                                } else {
                                    echo "<div  align='center'> <img alt='User Pic' src='https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg' id='profile-image1' class='img-circle img-responsive' width=200 height=200>" ;
                                }
                            ?>
                            <br>
                            <button style="margin-left: 40px; padding: 8px" type="button" class="btn btn-info" data-toggle="modal" data-target="#uploadModal">Upload photo profile</button>
                            <br>
                            <br>
                            <br>
                            <div class="col-sm-2 col-xs-4 tital " ><Strong><?= lang('state') ?>:</Strong></div><div id='state-provider' class="col-sm-7"><?= $user_settings['state'] ?></div><br>
                            <div class="col-sm-2 col-xs-4 tital " ><Strong><?= lang('city') ?>:</Strong></div><div id='city-provider' class="col-sm-7"><?= $user_settings['city'] ?></div><br>
                            <div class="col-sm-2 col-xs-4 tital " ><Strong><?= lang('services') ?>:</Strong></div><div class="col-sm-7"><?= $name_bussines['name'] ?></div>


                                    <!-- Modal -->
                                    <div id="uploadModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">File upload form</h4>
                                              </div>
                                              <div class="modal-body">
                                                <!-- Form -->  
                                                  <p id="msg"></p>
                                                  <input type="file" id="file" name="file" />
                                                  <br>
                                                  <button id="upload">Upload</button>           
                                            </div>
    
                                          </div>
                                        </div>
                                    <!--Upload Image Js And Css-->
                                    </div>
                                <br>
                            <!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<br>
<br>
<br>
<br>
<br>

<?= json_encode($user_settings) ?> 
<?= json_encode($role_slug) ?> <!-- nos sirve para saber si una persona es proveedor o cual rol tiene . -->
<br>
<br>
<br>
<?= json_encode($bussines_asociated) ?>
<br>
<?= json_encode($name_bussines) ?>

<!--<div for="first-name"><?= lang('first_name') ?><?= $user_settings["first_name"] ?> </div>
    
<div class="col-sm-5 col-xs-6 tital "><label for="last-name"><?= lang('last_name') ?> </label> <div class="col-sm-7"><?= $user_settings["last_name"] ?></div>
  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Joining:</div><div class="col-sm-7">15 Jun 2016</div>
<div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Date Of Birth:</div><div class="col-sm-7">11 Jun 1998</div>

  <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Place Of Birth:</div><div class="col-sm-7">Shirdi</div>

 <div class="clearfix"></div>
<div class="bot-border"></div>

<div class="col-sm-5 col-xs-6 tital " >Nationality:</div><div class="col-sm-7">Indian</div>-->
