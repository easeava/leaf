@foreach($grid->columns() as $column)
	<th>{{ $column->getLabel() }}</th>
@endforeach
