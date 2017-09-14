<!-- START card -->
<div class="card card-transparent">
	<div class="card-header ">
		<div class="card-title">
			列表展示
		</div>
	</div>
	<div class="card-block">
		<div class="table-responsive">
			<table class="table table-hover table-condensed" id="detailedTable">
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
	</div>
</div>
<!-- END card -->
