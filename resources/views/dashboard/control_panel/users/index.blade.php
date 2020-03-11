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
    padding: unset !important;
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


</style>
@endsection
@section('content')
{{-- <div class="content__body"> --}}
<div class="container mt-5" id="reportPage">
    <h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}"">{{ trans('lang.user.list_of_all_users_registered') }}</h2>
    <div class="s-20"></div>
    <form action="{{ route('search_user',app()->getLocale()) }}" method="GET">
        <div class="row">
            <div class="col-md-2 col-sm-6 mt-sm-3">
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
                    <option {{ isset($searched_gender) && $searched_gender == 'Others' ? 'selected' : ''}}>{{ trans('lang.other') }}</option>
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
            <div class="col-md-4 col-sm-12 mt-sm-3">
                <button type="submit" class="button btn-block">{{ trans('lang.search') }}</button>
            </div>
        </div>
    </form>
    {{-- <div>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <input 
            type="text" 
            name="search_user_by_name" 
            id="search_user_by_name" 
            class="form-control form-control-sm col-sm-4" 
            placeholder="Search by Name"
            >
    </div> --}}

    <div class="s-100"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th><p>{{ trans('lang.user.name') }}</p></th>
                            <th><p>{{ trans('lang.user.membership') }}</p></th>
                            <th><p>{{ trans('lang.user.data_reg') }}</p></th>
                            <th><p>{{ trans('lang.user.renewal_date') }}</p></th>
                            <th><p>{{ trans('lang.user.email_address') }}</p></th>
                            <th><p>{{ trans('lang.user.password') }}</p></th>
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
                                    
                                    <td class="align-middle"><p class="text_black">
                                        {{ $user->name }}
                                    </p></td>
                                    <td class="align-middle"><p class="text_black">
                                        
                                    </p></td>
                                    <td class="align-middle"><p class="text_black">
                                        {{ $user->created_at->format('m/d/Y') }}
                                    </p></td>
                                    <td class="align-middle"><p class="text_black">
                                        
                                    </p></td>
                                    <td class="align-middle"><p class="text_black">
                                        {{  $user->email }}
                                    </p></td>
                                    <td class="align-middle"><p class="text_black">
                                        ********
                                    </p></td>
                                    <td class="align-middle"><p class="text_black">
                                        {{ $user->gender }}
                                    </p></td>
                                    {{-- <td class="align-middle"><p class="text_black">
                                        
                                    </p></td> --}}
                                    <td class="align-middle"><p class="text_black text-left">{{  $user->phone_number }}
                                    </p></td>
                                    <td>
                                        <div class=""><a class="button" href="{{ route('results', [app()->getLocale(), $user]) }}">Report</a>
                                        </div>

                                        {{-- <a href="#" id="downloadPdf">Download Report Page as PDF</a>
                                        <br>
                                        <a id="clickbind" href="#">Click</a>
                                        <br>
                                        <button onclick="javascript:demoFromHTML();">PDF</button> --}}
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
{{-- </div> --}}

{{-- <div class="row table-responsive">

<div id="loading_spinner" class="text-center">
    <div class="spinner-grow text-success"></div>
    <div class="spinner-grow text-success"></div>
    <div class="spinner-grow text-success"></div>
    <div class="spinner-grow text-success"></div>
    <div class="spinner-grow text-success"></div>
    <div class="spinner-grow text-success"></div>
</div>

<table id="example" class="table" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th><p>Name</p></th>
            <th><p>Membership</p></th>
            <th><p>Date registered</p></th>
            <th><p>Renewal date</p></th>
            <th><p>Email address</p></th>
            <th><p>Password</p></th>
            <th><p>Country</p></th>
            <th><p>Phone number</p></th>
        </tr>
    </thead>
    <tbody id="original_tbody">
        @isset ($users)
            @forelse ($users as $user)
                <tr>
                    <td><img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali.png') }}"></td>
                    <td><p class="text_black">
                        {{ $user->name }}
                    </p></td>
                    <td><p class="text_black">
                        
                    </p></td>
                    <td><p class="text_black">
                        {{ $user->created_at }}
                    </p></td>
                    <td><p class="text_black">
                        
                    </p></td>
                    <td><p class="text_black">
                        {{  $user->email }}
                    </p></td>
                    <td><p class="text_black">
                        ********
                    </p></td>
                    <td><p class="text_black">
                        
                    </p></td>
                    <td><p class="text_black">
                        
                    </p></td>
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
    <tbody id="search_tbody"></tbody>
</table>
</div>
@isset($users)
<div class="float-right mt-5" id="users_pagination_div">
    {!! $users->render() !!}
</div>
@endisset --}}

<div class="s-100"></div>
@endsection

@section('scripts')
    {{-- <script type="text/javascript">
        $(function(){
            $('#loading_spinner').hide();
            $('#search_tbody').hide();

            $('#search_user_by_name').on('keyup', function(){
                if($(this).val() != ''){
                    $('#loading_spinner').show();

                    $('#original_tbody').hide();
                    $('#users_pagination_div').hide();

                    $.ajax({
                        url: '{!! route('search_user_by_name', app()->getLocale()) !!}',
                        type: "POST",
                        data: {
                            search_user_by_name: $(this).val(),
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(users){
                            // alert(users);
                            $('#search_tbody').show();
                            $('#search_tbody').html(users);
                        },
                        complete: function(){
                            $('#loading_spinner').hide();
                        },
                        error: function (jqXHR, exception) {
                           var msg = '';
                           if (jqXHR.status === 0) {
                               msg = 'Not connect.\n Verify Network.';
                           } else if (jqXHR.status == 404) {
                               msg = 'Requested Page not found. [404]. ';
                           } else if (jqXHR.status == 500) {
                               msg = 'Internal Server Error [500].';
                           } else if (exception === 'parsererror') {
                               msg = 'Requested JSON parse failed.';
                           } else if (exception === 'timeout') {
                               msg = 'Time out error.';
                           } else if (exception === 'abort') {
                               msg = 'Ajax request aborted.';
                           } else {
                               msg = 'Uncaught Error.\n' + jqXHR.responseText;
                           }
                           alert(msg);
                        }
                    });
                } else {
                    $('#original_tbody').show();
                    $('#users_pagination_div').show();
                    $('#search_tbody').hide();
                }
            });
        });
    </script> --}}

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

    // $(document).ready(function() {
        // download pdf
        // $('#downloadPdf').click(function(event) {
        //   // get size of report page
        //   var reportPageHeight = $('#reportPage').innerHeight();
        //   var reportPageWidth = $('#reportPage').innerWidth();
          
        //   // create a new canvas object that we will populate with all other canvas objects
        //   var pdfCanvas = $('<canvas />').attr({
        //     id: "canvaspdf",
        //     width: reportPageWidth,
        //     height: reportPageHeight
        //   });
          
        //   // keep track canvas position
        //   var pdfctx = $(pdfCanvas)[0].getContext('2d');
        //   var pdfctxX = 0;
        //   var pdfctxY = 0;
        //   var buffer = 100;
          
        //   // for each chart.js chart
        //   // $("canvas").each(function(index) {
        //   //   // get the chart height/width
        //   //   var canvasHeight = $(this).innerHeight();
        //   //   var canvasWidth = $(this).innerWidth();
            
        //   //   // draw the chart into the new canvas
        //   //   pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
        //   //   pdfctxX += canvasWidth + buffer;
            
        //   //   // our report page is in a grid pattern so replicate that in the new canvas
        //   //   if (index % 2 === 1) {
        //   //     pdfctxX = 0;
        //   //     pdfctxY += canvasHeight + buffer;
        //   //   }
        //   // });
          
        //   // create new pdf and add our new canvas as an image
        //   var pdf = new jsPDF('l', 'pt', [reportPageWidth, reportPageHeight]);
        //   pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
          
        //   // download the pdf
        //   pdf.save('filename.pdf');
        // });

        // function onClick() {
        //     var pdf = new jsPDF('p', 'pt', 'letter');
        //     pdf.canvas.height = 72 * 11;
        //     pdf.canvas.width = 72 * 8.5;

        //     pdf.fromHTML(document.body);

        //     pdf.save('test.pdf');
        // };

        // var element = document.getElementById("clickbind");
        // element.addEventListener("click", onClick);

    // });

    // function demoFromHTML() {
    //         var pdf = new jsPDF('p', 'pt', 'letter');
    //         // source can be HTML-formatted string, or a reference
    //         // to an actual DOM element from which the text will be scraped.
    //         source = $('#reportPage')[0];

    //         // we support special element handlers. Register them with jQuery-style 
    //         // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    //         // There is no support for any other type of selectors 
    //         // (class, of compound) at this time.
    //         specialElementHandlers = {
    //             // element with id of "bypass" - jQuery style selector
    //             '#bypassme': function (element, renderer) {
    //                 // true = "handled elsewhere, bypass text extraction"
    //                 return true
    //             }
    //         };
    //         margins = {
    //             top: 80,
    //             bottom: 60,
    //             left: 40,
    //             width: $('#reportPage').innerWidth(),
    //         };
    //         // all coords and widths are in jsPDF instance's declared units
    //         // 'inches' in this case
    //         pdf.fromHTML(
    //         source, // HTML string or DOM elem ref.
    //         margins.left, // x coord
    //         margins.top, { // y coord
    //             'width': margins.width, // max width of content on PDF
    //             'elementHandlers': specialElementHandlers
    //         },

    //         function (dispose) {
    //             // dispose: object with X, Y of the last line add to the PDF 
    //             //          this allow the insertion of new lines after html
    //             pdf.save('Test.pdf');
    //         }, margins);
    // }
    
//  function checkAll(bx) {
//    var cbs = document.getElementsByTagName('input');
//    for(var i=0; i < cbs.length; i++) {
//      if(cbs[i].type == 'checkbox') {
//        cbs[i].checked = bx.checked;
//      }
//    }
//  }
</script>
@endsection