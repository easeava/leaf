<!-- START card -->
<div class="card card-transparent ">
	<div class="card-header ">
		<div class="card-title">

		</div>
		<div class="pull-left">
			<div class="btn-group btn-group-xs">
				<button type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i>
				</button>
				<button type="button" class="btn btn-success"><i class="fa fa-refresh"></i>
				</button>
			</div>
		</div>
		<div class="pull-right">
			<button type="button" class="btn btn-success btn-xs s-m-t-10 m-l-10">New</button>
		</div>
		<div class="pull-right">
			<div class="btn-toolbar flex-wrap" role="toolbar">
				<div class="btn-group btn-group-xs sm-m-t-10">
					<button type="button" class="btn btn-default"><i class="fa fa-file-excel-o"></i>
					</button>
					<button type="button" class="btn btn-default"><i class="fa fa-file-pdf-o"></i>
					</button>
					<button type="button" class="btn btn-default"><i class="fa fa-copy"></i>
					</button>
				</div>
			</div>
		</div>
		<div class="pull-right">
			<div class="form-group m-r-10">
				{!! $grid->renderFilter() !!}
			</div>
		</div>
		<div class="card-block dataTables_wrapper">
			<div class="table-responsive ">

				<table class="table table-hover table-condensed">
					<thead>
						<tr>
							@foreach($grid->columns() as $column)
							<th style="width:25%">{{ $column->getLabel() }}</th>
							@endforeach
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="v-align-middle semi-bold">Revolution Begins</td>
							<td class="v-align-middle">Active</td>
							<td class="v-align-middle semi-bold">40,000 USD</td>
							<td class="v-align-middle">April 13, 2014</td>
							<td class="v-align-middle">April 13, 2014</td>
							<td class="v-align-middle">April 13, 2014</td>
						</tr>
						<tr>
							<td class="v-align-middle semi-bold">Revolution Begins</td>
							<td class="v-align-middle">Active</td>
							<td class="v-align-middle semi-bold">40,000 USD</td>
							<td class="v-align-middle">April 13, 2014</td>
							<td class="v-align-middle">April 13, 2014</td>
							<td class="v-align-middle">April 13, 2014</td>
						</tr>
						<tr>
							<td class="v-align-middle semi-bold">Revolution Begins</td>
							<td class="v-align-middle">Active</td>
							<td class="v-align-middle semi-bold">40,000 USD</td>
							<td class="v-align-middle">April 13, 2014</td>
							<td class="v-align-middle">April 13, 2014</td>
							<td class="v-align-middle">April 13, 2014</td>
						</tr>
						<tr>
							<td class="v-align-middle semi-bold">Revolution Begins</td>
							<td class="v-align-middle">Active</td>
							<td class="v-align-middle semi-bold">40,000 USD</td>
							<td class="v-align-middle">April 13, 2014</td>
							<td class="v-align-middle">April 13, 2014</td>
							<td class="v-align-middle">April 13, 2014</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="">
					<div class="dataTables_paginate paging_simple_numbers">
						<ul class="">
							<li class="paginate_button previous disabled"><a href="#"><i class="pg-arrow_left"></i></a></li>
							<li class="paginate_button active"><a href="#">1</a></li>
							<li class="paginate_button "><a href="#">2</a></li>
							<li class="paginate_button "><a href="#">3</a></li>
							<li class="paginate_button "><a href="#">4</a></li>
							<li class="paginate_button "><a href="#">5</a></li>
							<li class="paginate_button disabled"><a href="#">…</a></li>
							<li class="paginate_button "><a href="#" aria-co>12</a></li>
							<li class="paginate_button next"><a href="#"><i class="pg-arrow_right"></i></a></li>
						</ul>
					</div>
					<div class="dataTables_info" role="status">显示 <b>1 至 5</b> 共 12 条</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END card -->
