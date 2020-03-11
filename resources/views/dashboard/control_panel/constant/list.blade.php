@inject('request', 'Illuminate\Http\Request')
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
    padding: 30px;
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
}
tbody tr:last-child > td, tbody tr:last-child > th {
    border-top: 1px solid transparent;
}

tr td:last-child {
    text-align: left !important;
}

th {
    font-weight: 400;
}
.table td, .table th {
    padding: 0.8rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.btn-althraa{
    color: #fff;
    background-color: #01630a;
    border-color: #01630a;
}
</style>
@endsection
@section('content')
	<br>
	<br>
	<div class="container pl-5 pr-5 pb-5">

		<h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">{{ $page_title }}</h2>

		<div class="row">
			<div class="col-md-12">
				<div class="mt-5">
                    <div class="">
                        <table class="table table-striped {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
                            <thead>
                                <tr>
                                    <th scope="col" colspan="4">
                                        <p>
                                            {{ trans('lang.constants.list_of_constants_used_in_calculation_formulae') }}
                                        </p>
                                        <hr>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="col">
                                        <p>
                                            {{ trans('lang.constants.sr_no') }}
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p>
                                            {{ trans('lang.constants.belongs_to_types') }}
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p>
                                            {{ trans('lang.constants.attribute') }}
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p>
                                            {{ trans('lang.constants.value') }}
                                        </p>
                                    </th>
                                    <th scope="col">
                                        <p>
                                            {{ trans('lang.constants.action') }}
                                        </p>
                                    </th>
                                </tr>
                            </thead>
                          <tbody>
                            @isset ($constants)
                                @php $count = 0; @endphp
                                @forelse ($constants as $key => $constant)
                                    @if($key < 11 )
                                        <tr>
                                            <td scope="row">
                                                <span class="text_black">
                                                    {{ ++$count }}
                                                </span>
                                            </td>
                                            <td scope="row">
                                                <span class="text_black">
                                                    {{ $constant->constant_meta_type }}
                                                </span>
                                            </td>
                                            <td scope="row">
                                                <span class="text_black">
                                                    {{ $constant->constant_attribute }}
                                                </span>
                                            </td>
                                            <td scope="row">
                                                <span class="text_black">
                                                    {{ $constant->constant_value }} {{ $constant->constant_symbol }}
                                                </span>

                                                
                                                {{-- <button title="Edit" class="btn btn-success form-constant-edit" style="float: right;" data-constant="{{ $constant->constant_value }}" data-constant_value="{{ $constant }}" data-constant_attribute="{{ $constant->constant_attribute }}">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </button> --}}
                                            </td>
                                            <td scope="row">
                                                <a href="{{ route('edit_constant', [app()->getLocale(), $constant]) }}" class="btn btn-althraa btn-sm" style="float: right;" title="Edit">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td scope="col" colspan="4" class="text-center">
                                            <span class="text_black" >
                                                {{ trans('lang.constants.no_constants_found') }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforelse
                            @endisset                       
                          </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>

    {{-- ___________________________ EDIT DELETE __________________________ --}}
    {{-- <div class="modal inmodal" id="constantEditModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated flipInY">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Constant <span id="constant_form_heading"></span></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <form id="constant_edit_from" method="POST" action="">
                <div class="modal-body">
                        @csrf
                        @method('PATCH')
                        <input 
                            type="number" 
                            id="constant_new_input" 
                            min="0" 
                            class="form-control" 
                            name="constant_value"
                            required="" 
                            >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection

@section('scripts')
    {{-- <script type="text/javascript">
        $('.form-constant-edit').on('click', function(e){
            e.preventDefault();
            let route_val = $(this).data('constant_value');
            console.log($(this));
            $('#constantEditModal').modal({ 
                backdrop: 'static', keyboard: false 
            });
            $('#constant_new_input').val($(this).data('constant'));
            $('#constant_form_heading').html($(this).data('constant_attribute'));

            let route = "{!! route('update_constant', [app()->getLocale(), ":constant"]) !!}";
            route = route.replace(':constant', route_val);
            $('#constant_edit_from').attr('action', route);
        });
    </script> --}}
@endsection