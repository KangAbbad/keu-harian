<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin QODR by GhafirGroup</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<?= $this->tag->stylesheetLink('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>
<!-- Font Awesome -->
<?= $this->tag->stylesheetLink('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>
<!-- Ionicons -->
<?= $this->tag->stylesheetLink('assets/bower_components/Ionicons/css/ionicons.min.css') ?>
<!-- iCheck for radio button -->
<?= $this->tag->stylesheetLink('assets/plugins/iCheck/all.css') ?>
<?= $this->tag->stylesheetLink('assets/plugins/iCheck/flat/blue.css') ?>
<!-- DataTables -->
<?= $this->tag->stylesheetLink('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>
<!-- Theme style -->
<?= $this->tag->stylesheetLink('assets/dist/css/AdminLTE.min.css') ?>
<!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
<?= $this->tag->stylesheetLink('assets/dist/css/skins/_all-skins.min.css') ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- Pnotify -->
<?= $this->tag->stylesheetLink('assets/pnotify/pnotify.css') ?>
<?= $this->tag->stylesheetLink('assets/pnotify/pnotify.brighttheme.css') ?>
<!-- jQuery 3 -->
<?= $this->tag->javascriptInclude('assets/bower_components/jquery/dist/jquery.min.js') ?>
<!-- DataTables -->
<?= $this->tag->javascriptInclude('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>
<?= $this->tag->javascriptInclude('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>
<?= $this->tag->javascriptInclude('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>
<!-- Pnotify -->
<?= $this->tag->javascriptInclude('assets/pnotify/pnotify.js') ?>
<!-- Bootstrap Validation -->
<?= $this->tag->javascriptInclude('assets/bower_components/bootstrap-validator/dist/validator.min.js') ?>