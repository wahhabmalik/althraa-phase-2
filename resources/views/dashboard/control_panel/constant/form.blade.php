@extends('dashboard.layouts.admin', ['title' => $title ?? ''])

@section('styles')
<style>
.table thead th {
    vertical-align: bottom;
    border-bottom: unset;
    border-top: unset;
    color: #989898;
    font-size: 20px;
    font-family: Soin Sans Neue, Medium;
}
.table_box{
	border: 1px solid #DADADA;
    padding: 10px;
}
.table {
    font-size: 12px;
    color: #989898;
}
.user_icon{
	position: relative;
    top: -2px;
    left: 3px;
}
.table td {
    font-weight: 600;
    text-align: right;
}
tbody tr:last-child > td, tbody tr:last-child > th {
    border-top: 1px solid transparent;
}
th {
    font-weight: 400;
}
.table td, .table th {
    padding: 0.8rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
</style>
@endsection
@section('content')
{{-- <div class="content__body"> --}}
	<br>
	<br>
	<div class="container pl-5 pr-5">

		<h2 class="user__intro">{{ $page_title }}</h2>

		<div class="row">
			<div class="col-md-12">

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="{{ route('update_constant', [app()->getLocale(), $constant]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="control-label"></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="{{ $constant->constant_meta_type }}" 
                                    disabled>
                            </div>

                            <div class="form-group">
                                <label class="control-label"></label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    value="{{ $constant->constant_attribute }}" 
                                    disabled>
                            </div>

                            <div class="form-group @error('constant_value') has-error is-invalid @enderror">
                                <label class="control-label"></label>
                                <input 
                                    type="number" 
                                    name="constant_value" 
                                    id="constant_value" 
                                    class="form-control @error('constant_value') has-error is-invalid @enderror" 
                                    value="{{ $constant->constant_value }}" 
                                    autofocus="on" 
                                    min="0" 
                                    required 
                                    >

                                @error('constant_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="button">{{ trans('lang.admin.save_changes') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
				
			</div>
		</div>
	</div>
{{-- </div> --}}
@endsection