@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.admin', ['title' => $title ?? ''])

@section('styles')

<style>
/*.table td{
    vertical-align: middle;
}
div#example_wrapper .row:first-child div:first-child div:first-child{
    display: none;
    flex: 0 0 0%;
    width: 0%;
}
*/
.form-control {
    height: calc(1.5em + 0.5rem + 3px);
    padding-top: unset !important;
    padding-bottom: unset !important;
    line-height: 1.5;
    width: 100% !important;
    border-radius: .2rem;
}
.button{
    padding: 0.3rem 3.3rem;
}

.pagination {
    font-size: 14px;
}

.page-item.active .page-link {
    background-color: #01630a;
    border-color: #01630a;
}

.page-link {
    color: #000000;
}

/*custom datatable css*/
#example_length{
    display: none !important;
}

#example_filter label {
    color: white;
    font-size: 0px;
}

#example_paginate{
    float: right;
}

tr td:last-child {
     text-align: center; 
}
a.button {
    padding: 8px 18px !important;
}
button.del-button {
    background: #01630a;
    border: unset;
    padding: 12px 20px 11px 20px;
    color: #fff;
}

</style>
@endsection
@section('content')
{{-- <div class="content__body"> --}}
<div class="container mt-5" id="reportPage">
    <h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}"">{{ trans('lang.user.list_of_all_users_registered') }}</h2>
    <div class="s-20"></div>
    <form action="{{ route('search_user',app()->getLocale()) }}" method="GET">
        <div class="row">
            <div class="col-md-3 col-sm-6 mt-sm-3">
                <input 
                    type="text" 
                    class="form-control" 
                    placeholder="{{ trans('lang.user.name') }}" 
                    name="name" 
                    id="name" 
                    value="{{ $searched_name ?? old('name') }}" 
                    >
                <br>
            </div>
            <div class="col-md-2 col-sm-6 mt-sm-3">
                <select 
                    class="form-control" 
                    name="gender" 
                    id="gender">
                    <option value="">{{ trans('lang.select_gender') }}</option>
                    <option {{ isset($searched_gender) && $searched_gender == 'Male' ? 'selected' : ''}}>{{ trans('lang.male') }}</option>
                    <option {{ isset($searched_gender) && $searched_gender == 'Female' ? 'selected' : ''}}>{{ trans('lang.female') }}</option>
                    
                </select>
                <br>
            </div>
            <div class="col-md-2 col-sm-6 mt-sm-3">
                <input 
                    type="number" 
                    class="form-control" 
                    placeholder="{{ trans('lang.user.minimum_wealth') }}" 
                    min="0" 
                    name="minimum_wealth"
                    id="minimum_wealth"
                    value="{{ $searched_min_wealth ?? old('minimum_wealth') }}" 
                    >
                <br>
            </div>
            <div class="col-md-2 col-sm-6 mt-sm-3">
                <input 
                    type="number" 
                    class="form-control" 
                    placeholder="{{ trans('lang.user.maximum_wealth') }}" 
                    min="0" 
                    name="maximum_wealth"
                    id="maximum_wealth" 
                    value="{{ $searched_max_wealth ?? old('maximum_wealth') }}" 
                    >
                <br>
            </div>
            <div class="col-md-3 col-sm-12 mt-sm-3">
                <button type="submit" class="button btn-block">{{ trans('lang.search') }}</button>
            </div>
        </div>
    </form>
    
    <div class="s-100"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            {{-- <th><p>{{ trans('lang.user.name') }}</p></th> --}}
                            {{-- <th><p>{{ trans('lang.user.membership') }}</p></th> --}}
                            <th><p>{{ trans('lang.user.data_reg') }}</p></th>
                            {{-- <th><p>{{ trans('lang.user.renewal_date') }}</p></th> --}}
                            <th><p>{{ trans('lang.user.email_address') }}</p></th>
                            {{-- <th><p>{{ trans('lang.user.password') }}</p></th> --}}
                            <th><p>{{ trans('lang.user.gender') }}</p></th>
                            {{-- <th><p>{{ trans('lang.user.country') }}Country</p></th> --}}
                            <th><p>{{ trans('lang.user.phone') }}</p></th>
                            <th><p>{{ trans('lang.user.report') }}</p></th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset ($users)
                            @forelse ($users as $user)
                                <tr>
                                    <td>
                                        <img class="user_image rounded-circle" style="max-width: 75px;" src="{{ ($user->profile_image) ? asset($user->profile_image) : 'https://j8k2d7q6.stackpathcdn.com/wp-content/uploads/2019/03/user-dummy-pic.png' }}">
                                        </td>
                                    
                                    {{-- <td class="align-middle"><p class="text_black">
                                        {{ $user->name }}
                                    </p></td> --}}
                                    {{-- <td class="align-middle"><p class="text_black">
                                        
                                    </p></td> --}}
                                    <td class="align-middle"><p class="text_black">
                                        {{ $user->created_at->format('m/d/Y') }}
                                    </p></td>
                                    {{-- <td class="align-middle"><p class="text_black">
                                        
                                    </p></td> --}}
                                    <td class="align-middle"><p class="text_black">
                                        {{  $user->email }}
                                    </p></td>
                                    {{-- <td class="align-middle"><p class="text_black">
                                        ********
                                    </p></td> --}}
                                    <td class="align-middle"><p class="text_black">
                                        {{ $user->gender }}
                                    </p></td>
                                    {{-- <td class="align-middle"><p class="text_black">
                                        
                                    </p></td> --}}
                                    <td class="align-middle"><p class="text_black text-left">{{  $user->phone_number }}
                                    </p></td>
                                    <td>
                                        <div class="mt-4">
                                            <a class="button" target="_blank" href="{{ route('report', [app()->getLocale(), 'user' => $user]) }}">Report</a>
                                            <form method="POST" action="{{ route('remove-user', [app()->getLocale(), $user]) }}" style="display: inline-block;">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button title="Delete record" type="submit" class="del-button"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">
                                        {{ trans('lang.no_users_found') }}
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


<div class="s-100"></div>
@endsection

@section('scripts')
   

{{-- Datatable JS --}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

{{-- jsPDF JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
        });
        $("#example_wrapper .row:first-child div:first-child").removeClass("col-sm-12 col-md-6");
        $(".form-control.form-control-sm").attr("placeholder", "Search here");
    });

    
</script>
@endsection