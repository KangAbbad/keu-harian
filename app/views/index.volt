<!DOCTYPE html>
<html>
    <head>
        {% include "layouts/header.volt" %}
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        {% include "layouts/navbar.volt" %}
        {% include "layouts/sidebar.volt" %}

        {{ content() }}

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2017-2018 <a href="#">GhafirGroup</a>.</strong>
        </footer>
        </body>
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
        </div>
        {% include "layouts/footer.volt" %}
        <!-- ./wrapper -->
    </body>
</html>
