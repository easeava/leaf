<!-- START WIDGET widget_tableRankings-->
<div class="widget-12 card no-border widget-loader-circle no-margin col ar-1-1 sm-vh-75">
	<div class="row">
		<div class="col-xlg-8 ">
			<div class="card-header pull-up top-right ">
				<div class="card-controls">
					<ul>
						<li class="hidden-xlg">
							<div class="dropdown">
								<a data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
	  <i class="portlet-icon portlet-icon-settings"></i>
	</a>
								<ul class="dropdown-menu pull-right" role="menu">
									<li><a href="#">AAPL</a>
									</li>
									<li><a href="#">YHOO</a>
									</li>
									<li><a href="#">GOOG</a>
									</li>
								</ul>
							</div>
						</li>
						<li>
							<a data-toggle="refresh" class="portlet-refresh text-black" href="#"><i class="portlet-icon portlet-icon-refresh"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="card-block d-flex flex-column">
		<div class="">
			<div class="d-flex flex-row">
				<h2 class="m-t-5 m-b-5">Apple Inc.</h2>
				<h2 class="m-l-50 m-t-5 m-b-5 text-danger">
				<span class="">448.97</span>
				<span class="text-danger fs-12">-318.24</span>
			</h2>
			</div>
			<div class="full-width">
				<ul class="list-inline m-b-0">
					<li><a href="#" class="font-montserrat text-master">1D</a>
					</li>
					<li class="active"><a href="#" class="font-montserrat  bg-master-light text-master">5D</a>
					</li>
					<li><a href="#" class="font-montserrat text-master">1M</a>
					</li>
					<li><a href="#" class="font-montserrat text-master">1Y</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="nvd3-line line-chart text-center flex-1 relative" data-x-grid="false">
			<svg class="absolute full-height full-width"></svg>
		</div>
	</div>
</div>
<!-- END WIDGET -->
@push('css')
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/nvd3/nv.d3.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/mapplic/css/mapplic.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/rickshaw/rickshaw.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" media="screen">
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{ admin_asset('vendor/leaf/assets/css/dashboard.widgets.css') }}" rel="stylesheet" type="text/css" media="screen" />
@endpush
@push('js')
	{{-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp" type="text/javascript"></script> --}}
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/nvd3/lib/d3.v3.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/nvd3/nv.d3.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/nvd3/src/utils.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/nvd3/src/tooltip.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/nvd3/src/interactiveLayer.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/nvd3/src/models/axis.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/nvd3/src/models/line.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/nvd3/src/models/lineWithFocusChart.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/mapplic/js/hammer.js') }}"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/mapplic/js/jquery.mousewheel.js') }}"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/mapplic/js/mapplic.js') }}"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/rickshaw/rickshaw.min.js') }}"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-metrojs/MetroJs.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/skycons/skycons.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/moment/moment.min.js') }}"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ admin_asset('vendor/leaf/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
	<script type="text/javascript" src="{{ admin_asset('vendor/leaf/assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
@endpush
@push('script')
	<script src="{{ admin_asset('vendor/leaf/assets/js/dashboard.js') }}" type="text/javascript"></script>
@endpush
