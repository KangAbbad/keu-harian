<!-- jQuery 3 -->
<?= $this->tag->javascriptInclude('assets/bower_components/jquery/dist/jquery.min.js') ?>
<!-- Bootstrap 3.3.7 -->
<?= $this->tag->javascriptInclude('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>
<!-- DataTables -->
<?= $this->tag->javascriptInclude('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>
<?= $this->tag->javascriptInclude('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>
<!-- SlimScroll -->
<?= $this->tag->javascriptInclude('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>
<!-- FastClick -->
<?= $this->tag->javascriptInclude('assets/bower_components/fastclick/lib/fastclick.js') ?>
<!-- AdminLTE App -->
<?= $this->tag->javascriptInclude('assets/dist/js/adminlte.min.js') ?>
<!-- AdminLTE for demo purposes -->
<?= $this->tag->javascriptInclude('assets/dist/js/demo.js') ?>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>