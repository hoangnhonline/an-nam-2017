<option value="">---</option>
@if( $listtt->count() > 0)
	@foreach( $listtt as $value )
	<option value="{{ $value->name }}" {{ $id_selected == $value->id ? "selected" : "" }}>{{ $value->name }}</option>
	@endforeach
@endif