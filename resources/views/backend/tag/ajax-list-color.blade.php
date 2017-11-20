<option value="">---</option>
@if( $colors->count() > 0)
	@foreach( $colors as $value )
	<option value="{{ $value->id }}" {{ $id_selected == $value->id ? "selected" : "" }}>{{ $value->name }}</option>
	@endforeach
@endif