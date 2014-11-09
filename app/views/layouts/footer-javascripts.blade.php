<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{{ HTML::script('assets/global/plugins/respond.min.js'); }}
{{ HTML::script('assets/global/plugins/excanvas.min.js'); }}
<![endif]-->

{{ HTML::script('assets/global/plugins/jquery-1.11.0.min.js'); }}
{{ HTML::script('assets/global/plugins/jquery-migrate-1.2.1.min.js'); }}

<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{{ HTML::script('assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js'); }}
{{ HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js'); }}
{{ HTML::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js'); }}
{{ HTML::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js'); }}
{{ HTML::script('assets/global/plugins/jquery.blockui.min.js'); }}
{{ HTML::script('assets/global/plugins/jquery.cokie.min.js'); }}
{{ HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js'); }}
{{ HTML::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js'); }}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js'); }}
{{ HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js'); }}
{{ HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js'); }}
{{ HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js'); }}
{{ HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js'); }}
{{ HTML::script('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js'); }}
{{ HTML::script('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js'); }}
{{ HTML::script('assets/global/plugins/flot/jquery.flot.min.js'); }}
{{ HTML::script('assets/global/plugins/flot/jquery.flot.resize.min.js'); }}
{{ HTML::script('assets/global/plugins/flot/jquery.flot.categories.min.js'); }}
{{ HTML::script('assets/global/plugins/jquery.pulsate.min.js'); }}
{{ HTML::script('assets/global/plugins/bootstrap-daterangepicker/moment.min.js'); }}
{{ HTML::script('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js'); }}

<!-- IMPORTANT! fullcalendar depends on jquery-ui-1.10.3.custom.min.js for drag & drop support -->
{{ HTML::script('assets/global/plugins/fullcalendar/fullcalendar/fullcalendar.min.js'); }}
{{ HTML::script('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js'); }}
{{ HTML::script('assets/global/plugins/jquery.sparkline.min.js'); }}
{{ HTML::script('assets/global/plugins/gritter/js/jquery.gritter.js'); }}
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/global/scripts/metronic.js'); }}
{{ HTML::script('assets/admin/layout/scripts/layout.js'); }}
{{ HTML::script('assets/admin/layout/scripts/quick-sidebar.js'); }}
{{ HTML::script('assets/admin/pages/scripts/index.js'); }}
{{ HTML::script('assets/admin/pages/scripts/tasks.js'); }}
<!-- END PAGE LEVEL SCRIPTS -->

<script>
	jQuery(document).ready(function() {
	Metronic.init(); // init metronic core componets
	Layout.init(); // init layout
	QuickSidebar.init() // init quick sidebar
	Index.init();
	Index.initDashboardDaterange();
	Index.initJQVMAP(); // init index page's custom scripts
	Index.initCalendar(); // init index page's custom scripts
	Index.initCharts(); // init index page's custom scripts
	Index.initChat();
	Index.initMiniCharts();
	Index.initIntro();
	Tasks.initDashboardWidget();
});
</script>
<!-- END JAVASCRIPTS -->