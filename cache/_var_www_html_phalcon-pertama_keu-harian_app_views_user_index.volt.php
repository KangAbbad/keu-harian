<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA
        <small>admin - user</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Data user</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default" onclick="return send_data_add();">
          Add User
        </button>
        <br><br>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="data_user" class="table table-bordered table-striped" width="100%" cellspacing="0">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Cabang</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody id="listUser" align="center">
            
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="addUser" id="addUser" action="user/add" method="POST">
            <div class="modal-header">
              <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">
              <!-- sengaja dikosongkan, h4nya pake jQuery -->
              </h4>
            </div>
            <div class="modal-body">
              <div class="input-group-id">
                  <input class="form-control id" name="id" type="hidden" id="id">
              </div>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                <select class="form-control" name="cabang_id" required>
                  <?= $this->Helpers->dataCabang() ?>
                </select>
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-circle-o"></i></span>
                <input class="form-control" name="username" placeholder="Username" type="text">
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control" name="password" placeholder="Password" type="password">
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                <input class="form-control" id="type" name="type" placeholder="Type" type="text">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary dropdown-toggle btnAction" onclick="return addUser();">
                <!-- isinya pake jQuery -->
              </button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal modal-danger fade" id="modal-delete">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="deleteUser" action="user/deleteUser" method="POST">
            <input type="hidden" name="id" id="id" value="">
            <div class="modal-header">
              <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">
              <!-- sengaja dikosongin, isinya pake jQuery -->
              </h4>
            </div>
            <div class="modal-body">
              <p>Hapus Data User ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btnAction" onclick="return deleteUser();">
                <!-- isinya pake jQuery -->
              </button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


  </div>
  
<script>
  function send_data_add(){
    $('.modal-title').text('Add Data');
    $('.btnAction').attr('onclick',"return addUser();");
    $('.btnAction').attr('class',"btn btn-primary btnAction");
    $('.btnAction').text('Add Data');
  }

  function addUser() {
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "<?= $this->url->get('user/addUser') ?>",
        data: $('form.addUser').serialize(),
        success: function(res) {
            new PNotify({
                title: res.title,
                text: res.text,
                type: res.type,
                addclass: "stack-bottomright",
                buttons: {
                  sticker: false
                }
            });
            $('.close-modal').click();
            $('#data_user').DataTable().ajax.reload();
        }
    });
  }

  // $('#addUser').validate({
  //   rules: {
  //     type: {
  //         required: true
  //     },
  //     action: "required"
  //   },
  //   messages: {
  //       type: {
  //           required: "Please enter some data"
  //       },
  //       action: "Please provide some data"
  //   }
  // });

  function send_data_edit(id) {
    $('.modal-title').text('Edit User ' + id);
    $('.btnAction').attr('onclick', "return editUser();");
    $('.btnAction').attr('class', "btn btn-warning btnAction");
    $('.btnAction').text('Edit User');

    // var username = $('#data_' + id + '> td').eq(1).html();
    // var password = $('#data_' + id + '> td').eq(2).html();
    // var type = $('#data_' + id + '> td').eq(3).html();
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "<?= $this->url->get('user/getData') ?>/" + id,
        data: $('form.addUser').serialize(),
        success: function(res) {
            $('input[name=cabang_id]').val(res.cabang_id);
            $('input[name=id]').val(res.id);
            $('input[name=username]').val(res.username);
            $('input[name=password]').val(res.password);
            $('input[name=type]').val(res.type);
        }
    });
  }

  function editUser() {
      $.ajax({
          method: "POST",
          dataType: "json",
          url: "<?= $this->url->get('user/editUser') ?>",
          data: $('form.addUser').serialize(),
          success: function(res) {
              new PNotify({
                  title: res.title,
                  text: res.text,
                  addclass: "stack-bottomright",
                  buttons: {
                    sticker: false
                  }
              });
              $('.close-modal').click();
              $('#data_user').DataTable().ajax.reload();
          }
      });
  }

  function send_data_delete(id){
    $('input[name=id]').val(id);
    $('.modal-title').text('Delete Data ' + id);
    $('.btnAction').attr('onclick',"return deleteUser();");
    $('.btnAction').attr('class',"btn btn-outline btnAction");
    $('.btnAction').text('Delete Data');
  }

  function deleteUser() {
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "<?= $this->url->get('user/deleteUser') ?>",
        data: $('form.deleteUser').serialize(),
        success: function(res) {
            new PNotify({
                title: res.title,
                text: res.text,
                type: res.type,
                addclass: "stack-bottomright",
                buttons: {
                  sticker: false
                }
            });
            $('.close-modal').click();
            $('#data_user').DataTable().ajax.reload();
        }
    });
  }

  function listUser(){
    $.ajax({
      method: "GET",
      url: "<?= $this->url->get('user/listUser') ?>",
      dataType: "html",
      success: function(res){
        $('#listUser').html(res);
      }
    });
  }

  $(document).ready(function(){
    var dataTable = $('#data_user').DataTable({
      "processing" : false,
      "serverSide" : true,
      "ajax": {
        url: "user/getAjax",
        type: "post",
      }
    });
  });  
</script>