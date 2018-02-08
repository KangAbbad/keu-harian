<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      MAGELANG
      <small>Keuangan harian</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Keuangan</a></li>
      <li class="active">Keuangan harian</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
      <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-default" onclick="return send_data_add();">
        Add Keuangan Harian
      </button>
      <br><br>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="data_keu_harian" class="table table-bordered table-striped" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="text-align:center;">No.</th>
                  <th style="text-align:center;">Cabang</th>
                  <th style="text-align:center;">Tanggal</th>
                  <th style="text-align:center;">Nama Barang</th>
                  <th style="text-align:center;">Satuan Barang</th>
                  <th style="text-align:center;">Akun</th>
                  <th style="text-align:center;">Jumlah Barang</th>
                  <th style="text-align:center;">Harga Satuan</th>
                  <th style="text-align:center;">Total Harga</th>
                  <th style="text-align:center;">Debit</th>
                  <th style="text-align:center;">Kredit</th>
                  <th style="text-align:center;">Keterangan</th>
                  <th style="text-align:center;">Pelaku</th>
                  <th style="text-align:center;">Action</th>
                </tr>
              </thead>
              <tbody id="listKeuHarian" align="center">
                
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
        <form class="addKeuHarian" action="keu_harian/add" method="POST" role="form">
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
              <input type="hidden" name="cabang_id" value="MGL">
            </div>
            <div class="col-md-6">
              <label for="tanggal">Tanggal</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="date" class="form-control pull-right" id="tanggal" name="tanggal" required>
              </div>
              <br>
              <label for="jml_barang">Jumlah Barang</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-sort-alpha-asc"></i></span>
                <input type="text" class="form-control numeric-only" name="jml_barang" id="jml_barang" onkeyup="hitung();" placeholder="Jumlah Barang" required>
              </div>
              <br>
            </div>
            <div class="col-md-6">
              <label for="nama_barang">Nama Barang</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>
                <input type="text" class="form-control alphabet-only" id="nama_barang" name="nama_barang" placeholder="Nama Barang" required>
              </div>
              <br>
              <label for="harga_satuan">Harga Satuan</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-usd"></i></span>
                <input type="text" class="form-control numeric-only" name="harga_satuan" id="harga_satuan" onkeyup="hitung();" placeholder="Harga Satuan" required>
              </div>
              <br>
            </div>
            <div class="col-md-6">
              <label for="akun_id">Akun</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-info-circle"></i></span>
                <select class="form-control" name="akun_id" required>
                  <?= $this->Helpers->dataAkun() ?>
                </select>
              </div>
              <br>
              <label for="total_harga">Total Harga</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-btc"></i></span>
                <input type="text" class="form-control" name="total_harga" id="total_bayar" placeholder="Total Harga" readonly>
              </div>
              <br>
            </div>
            <div class="col-md-6">
              <label for="satuan_barang_id">Satuan barang</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-list-ul"></i></span>
                <select class="form-control" name="satuan_barang_id" required>
                  <?= $this->Helpers->dataSatuanBarang() ?>
                </select>
              </div>
              <br>
              <label for="tipe_transaksi">Tipe Transaksi</label>
              <div class="input-group" style="margin-top:7px;">
                <input type="radio" id="debit" class="flat-blue" name="tipe_transaksi">
                &nbsp; Pemasukan &nbsp;
                <input type="radio" id="kredit" class="flat-blue" name="tipe_transaksi">
                &nbsp; Pengeluaran &nbsp;
              </div>
              <br>
              <br>
            </div>
            <div class="col-md-6">
              <label for="debit">Debit</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-credit-card-alt"></i></span>
                <input type="text" class="form-control numeric-only debit" name="debit" placeholder="Debit" readonly>
              </div>
              <br>
              <label for="kredit">Kredit</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                <input type="text" class="form-control numeric-only kredit" name="kredit" placeholder="Kredit" readonly>
              </div>
              <br>
              <br>
            </div>
            <div class="col-6">
              <label for="keterangan">Keterangan</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-align-center"></i></span>
                <textarea class="form-control" rows="4" name="keterangan" placeholder="Keterangan"></textarea>
              </div>
              <br>
              <label for="pelaku">Pelaku</label>
              <div class="input-group">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-blind"></i></span>
                  <select class="form-control" name="pelaku" required>
                    <?= $this->Helpers->dataUser() ?>
                  </select>
                </div>
              </div>
              <br>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary dropdown-toggle btnAction" id="addButton" onclick="return addKeuHarian();">
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
        <form class="deleteKeuHarian" action="keu_harian/deleteKeuHarian" method="POST">
          <input type="hidden" name="id" id="id_keu_harian" value="">
          <div class="modal-header">
            <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">
            <!-- sengaja dikosongin, isinya pake jQuery -->
            </h4>
          </div>
          <div class="modal-body">
            <p class="delete-desc">
              <!-- Sengaja Dikosongkan -->
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left close-modal" data-dismiss="modal">Close</button>
            <button type="button" class="btn btnAction" onclick="return deleteKeuHarian();">
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
  $('.btnAction').attr('onclick',"return addKeuHarian();");
  $('.btnAction').attr('class',"btn btn-primary btnAction");
  $('.btnAction').text('Add Data');
}

function addKeuHarian() {
  $.ajax({
      method: "POST",
      dataType: "json",
      url: "<?= $this->url->get('keu_harian/addKeuHarian') ?>",
      data: $('form.addKeuHarian').serialize(),
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
          if(res.type=='info'){
            $('.close-modal').click();
            $('#data_keu_harian').DataTable().ajax.reload();
            $('.addKeuHarian')[0].reset();
          }
      }
  });
}

function send_data_edit(id) {
  $('.modal-title').text('Edit Data ' + id);
  $('.btnAction').attr('onclick', "return editKeuHarian();");
  $('.btnAction').attr('class', "btn btn-warning btnAction");
  $('.btnAction').text('Edit Data');

  $.ajax({
      method: "POST",
      dataType: "json",
      url: "<?= $this->url->get('keu_harian/getData') ?>/" + id,
      data: $('form.addKeuHarian').serialize(),
      success: function(res) {
          $('input[name=id]').val(res.id);
          $('select[name=cabang_id]').val(res.cabang_id);
          $('input[name=tanggal]').val(res.tanggal);
          $('input[name=nama_barang]').val(res.nama_barang);
          $('select[name=akun_id]').val(res.akun_id);
          $('input[name=jml_barang').val(res.jml_barang);
          $('input[name=harga_satuan]').val(res.harga_satuan);
          $('select[name=satuan_barang_id]').val(res.satuan_barang_id);
          $('input[name=total_harga]').val(res.total_harga);
          $('input[name=debit]').val(res.debit);
          $('input[name=kredit]').val(res.kredit);
          $('textarea[name=keterangan]').val(res.keterangan);
          $('select[name=pelaku]').val(res.pelaku);
      }
  });
}

function editKeuHarian() {
  $.ajax({
      method: "POST",
      dataType: "json",
      url: "<?= $this->url->get('keu_harian/editKeuHarian') ?>",
      data: $('form.addKeuHarian').serialize(),
      success: function(res) {
          new PNotify({
              title: res.title,
              text: res.text,
              type: res.type,
              addclass: "stack-bottomright",
              buttons : {
                sticker : false
              }
          });
          $('.close-modal').click();
          $('#data_keu_harian').DataTable().ajax.reload();
      }
  });
}

function send_data_delete(id,nama_barang){

  var nama_barang =$(nama_barang).parent().parent().parent().find('td').eq(2).html();
  
  $('input[name=id]').val(id);
  $('.modal-title').text('Delete Data ' + id);
  $('.delete-desc').text('Yakin Ingin Menghapus ' + nama_barang + ' ?');
  $('.btnAction').attr('onclick',"return deleteKeuHarian();");
  $('.btnAction').attr('class',"btn btn-outline btnAction");
  $('.btnAction').text('Delete Data');
}

function deleteKeuHarian() {
  $.ajax({
      method: "POST",
      dataType: "json",
      url: "<?= $this->url->get('keu_harian/deleteKeuHarian') ?>",
      data: $('form.deleteKeuHarian').serialize(),
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
          $('#data_keu_harian').DataTable().ajax.reload();
        }
    });
  }

function listKeuHarian(){
  $.ajax({
    method: "GET",
    url: "<?= $this->url->get('keu_harian/listKeuHarian') ?>",
    dataType: "html",
    success: function(res){
      $('#listKeuHarian').html(res);
    }
  });
}

// Resize Column DataTables
$(document).ready(function(){
  var dataTable = $('#data_keu_harian').DataTable({
    "processing" : false,
    "serverSide" : true,
    "searching": true,
    "ordering": false,
    "columnDefs": [
        {
            "targets": [ 1 ],
            "visible": false,
            "searchable": false,
        },
        {
          "width": "5%", "targets": [4,5,6]
        },
        {
          "width": "8%", "targets": [7,8,9,10]
        }
    ],
    "ajax": {
      url: "keu_harian/getAjax",
      type: "post",
    }
  });
});

function hitung() {
  var total_bayar;
  var jml_barang = $('#jml_barang').val();
  var harga_satuan = $('#harga_satuan').val();
  total_bayar = jml_barang*harga_satuan;
  $('#total_bayar').val(total_bayar);

  // Radio Button iCHeck
  $('#debit').on('ifChecked', function(event){
    $('.debit').val(total_bayar);
    $('.kredit').val("0");
  });
  
  $('#kredit').on('ifChecked', function(event){
    $('.debit').val("0");
    $('.kredit').val(total_bayar);
  });
}

// Active Style Radio Button
$(document).ready(function(){
  $('input').iCheck({
    radioClass: 'iradio_flat-blue'
  });
});

// Alphabet or Numeric Only
$.fn.regexMask = function(mask) {
    $(this).keypress(function (event) {
        if (!event.charCode) return true;
        var part1 = this.value.substring(0, this.selectionStart);
        var part2 = this.value.substring(this.selectionEnd, this.value.length);
        if (!mask.test(part1 + String.fromCharCode(event.charCode) + part2))
            return false;
    });
};

$(document).ready(function() {
    var mask = new RegExp('^[A-Z a-z]*$');
    var mask2 = new RegExp('^[0-9]*$');
    $('.alphabet-only').regexMask(mask);
    $('.numeric-only').regexMask(mask2);
});

// Tanggal auto-today
document.getElementById("tanggal").valueAsDate = new Date();
</script>