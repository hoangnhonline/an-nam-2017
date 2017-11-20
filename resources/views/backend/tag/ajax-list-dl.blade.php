<option value="">---</option>
@if( $dls->count() > 0)
	@foreach( $dls as $value )
	<option value="{{ $value->id }}" {{ $id_selected == $value->id ? "selected" : "" }}>{{ $value->name }}</option>
	@endforeach
@endif