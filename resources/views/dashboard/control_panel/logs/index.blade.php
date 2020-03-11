@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.admin', ['title' => $title ?? ''])

@section('styles')
<style>
.table td{
    vertical-align: middle;
}


ins {
    background-color: #c6ffc6;
    text-decoration: none;
}
del {
    background-color: #ffc6c6;
}
</style>
@endsection
@section('content')
{{-- <div class="content__body"> --}}
<div class="container mt-5">
	<h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">{{ trans('lang.log.change_log') }}</h2>
	
	<div class="row {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}">
		<div class="col-md-12"> 
			@isset ($datewise_log)
			    @foreach ($datewise_log as $date => $datewise)
			    	<p class="setting_text text-left">{{ $date }}</p>
						<div class="row table-responsive">
							<table class="table">
							  <tbody>
							  	@isset ($datewise)
							  		@php
										$value_from = ''; $to = ''; $old = '';
									@endphp
									@foreach ($datewise as $log)
										@if ($log->description === 'updated')
											@php
												$value_from = "Value from"."<br>";
												$to = "<br>"."to"."<br>";
												$old = $log->changes["old"];
											@endphp
										@endif
										@if ($log->description === 'deleted' || $log->description === 'created')
											@php
												$value_from = ''; $to = ''; $old = '';
											@endphp
										@endif
										<tr>
											<td>
												<img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali.png') }}">
											</td>
								      		<td>
								      			<p class="text_black">{{ $log->causer->name ?? 'New User' }}</p>
								      		</td>
								      		<td>
								      			<p class="text_black">{{ $log->description }}</p>
								      		</td>
								      		<td>
								      			<p class="text_black">{{ str_replace("App\\", "", $log->subject_type) }}</p>
								      		</td>
								      		<td>
								      			<p class="text_black">
								      			@if ((str_replace("App\\", "", $log->subject_type) ?? null) !== null)
									      			@switch(str_replace("App\\", "", $log->subject_type))
									      			    @case('SiteManagement')
									      			        @if (isset($log->changes["attributes"]['meta_key']))
									      			        	@switch($log->changes["attributes"]['meta_key'])
									      			        	    @case('title')
									      			        	        {{ trans('lang.log.set_site_title_to') }}Set Site Title to "{{ $log->changes["attributes"]['meta_value'] }}"
									      			        	        @break
									      			        	
									      			        	    @case('description')
									      			        	        {{ trans('lang.log.set_site_desc_to') }}Set Site Description to "{{ $log->changes["attributes"]['meta_value'] }}"
									      			        	        @break
									      			        	
									      			        	    @case('logo')
									      			        	        {{ trans('lang.log.set_site_logo_to') }}Set Site Logo to <img src="{{ asset($log->changes["attributes"]['meta_value']) }}" class="img img-responsive img-fluid" height="100px" width="100px">
									      			        	        @break
									      			        	
									      			        	    @case('favicon')
									      			        	        {{ trans('lang.log.set_site_favicon_to') }}Set Site Favicon to <img src="{{ asset($log->changes["attributes"]['meta_value']) }}" class="img img-responsive img-fluid img-circle" height="100px" width="100px">
									      			        	        @break
									      			        	
									      			        	    @case('maintenance_heading')
									      			        	        {{ trans('lang.log.set_maintenance_heading_to') }}Set Maintenance Heading to "{{ $log->changes["attributes"]['meta_value'] }}"
									      			        	        @break
									      			        	
									      			        	    @case('maintenance_description')
									      			        	        {{ trans('lang.log.set_maintenance_description_to') }}Set Maintenance Description to "{{ $log->changes["attributes"]['meta_value'] }}"
									      			        	        @break
									      			        	
									      			        	    @case('maintenance_image')
									      			        	        {{ trans('lang.log.set_maintenance_image_to') }}Set Maintenance Image to <img src="{{ asset($log->changes["attributes"]['meta_value']) }}" class="img img-responsive img-fluid" height="100px" width="100px">
									      			        	        @break
									      			        	
									      			        	    @case('maintenance_mode')
									      			        	    	@if ($log->description === 'deleted')
																			{{ trans('lang.log.set_maintenance_mode_off') }}
																		@elseif($log->description === 'created')
																			{{ trans('lang.log.set_maintenance_mode_on') }}
																		@endif
									      			        	        @break
									      			        	
									      			        	    @default
									      			        	        <p>
											      			        		{{ trans('lang.log.some_changes_detected') }}
											      			        	</p>
											      			        	@break
									      			        	@endswitch
									      			        	
									      			        @else
									      			        	<p>
									      			        		{{ trans('lang.log.some_changes_detected') }}
									      			        	</p>
									      			        @endif
									      			        @break
									      			
									      			    @case('User')
									      			        {{ $log->changes }}
									      			        @break
									      			
									      			    @case('Constant')
									      			        {{ $log->changes }}
									      			        @break
									      			
									      			    @default
								      			            <p>
								      			            	{{ trans('lang.log.some_changes_detected') }}
								      			        		Some Changes detected but could not be transformed in readable form. Consult Developer.
								      			        	</p>
								      			            @break
									      			@endswitch
								      			@endif
								      			</p>
								      			
								      			{{-- <p>
								      				{{ dump($log->changes["attributes"]['meta_key'] ?? 'Some Changes detected but could not be transformed in readable form for you. Raw form in available.') }}
								      			</p> --}}
								      		</td>
								      		{{-- <td>
								      			<p class="text_black diff-wrapper">
								      				<div class="diff-wrapper">
									      				<span><b> {!! $value_from !!} </b></span>
									      				<span class="original">
									      					{{ json_encode($old) }}
									      				</span> 
									      				<span><b> {!! $to !!} </b></span>
									      				<span class="changed">
									      					{{ json_encode($log->changes["attributes"]) }}
									      				</span>
									      				@if ($old !== '')
									      					<div class="result_difference"></div>
									      				@endif
									      				
								      				</div>				      				
								      			</p>
								      		</td> --}}
								      		{{-- <td>
								      			<p class="diff-wrapper">
								      				<div class="original">
								      					Lorem Ipsum is simply dummy text of the printing and typesetting industry.
								      				</div>
								      				<div class="changed">
								      					Lorem Ipsum is simply typesetting dummy text of the printing and has been.
								      				</div>
								      				<div class="result_difference"></div>
								      			</p>
								      		</td> --}}
								      		<td><p class="text_black text-right">{{ Carbon\Carbon::parse($log->created_at)->format('H:i:s') }}</p></td>
								      	</tr>
									@endforeach
								@endisset
							  </tbody>
						    </table>
						</div>
			    @endforeach
			@endisset

		</div>
	</div>

	

	{{-- <p class="setting_text text-left">10.06.2019.</p>
	<div class="row table-responsive">
		<table class="table">
		  <tbody>
		    <tr>
		      <td><img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali.png') }}"></td>
		      <td><p class="text_black">Ali Alshehri</p></td>
		      <td><p class="text_black">Changed Momčilo Milijašević's gmail from momcilo.milijasevic@gmail.com to momo@gmail.com</p></td>
		      <td><p class="text_black text-right">6:38PM</p></td>
		    </tr>
			
		    <tr>
		      <td><img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali.png') }}"></td>
		      <td><p class="text_black">Ali Alshehri</p></td>
		      <td><p class="text_black">Something else to something else</p></td>
		      <td><p class="text_black text-right">6:38PM</p></td>
		    </tr>
		  </tbody>
	    </table>
	</div>

	<p class="setting_text text-left">08.06.2019.</p>
	<div class="row table-responsive">
		<table class="table">
		  <tbody>
		    <tr>
		      <td><img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali.png') }}"></td>
		      <td><p class="text_black">Ali Alshehri</p></td>
		      <td><p class="text_black">Changed Momčilo Milijašević's gmail from momcilo.milijasevic@gmail.com to momo@gmail.com</p></td>
		      <td><p class="text_black text-right">6:38PM</p></td>
		    </tr>
			
		    <tr>
		      <td><img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali.png') }}"></td>
		      <td><p class="text_black">Ali Alshehri</p></td>
		      <td><p class="text_black">Changed Momčilo Milijašević's gmail from momcilo.milijasevic@gmail.com to momo@gmail.com</p></td>
		      <td><p class="text_black text-right">6:38PM</p></td>
		    </tr>
		    
		    <tr>
		      <td><img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali.png') }}"></td>
		      <td><p class="text_black">Ali Alshehri</p></td>
		      <td><p class="text_black">Changed Momčilo Milijašević's gmail from momcilo.milijasevic@gmail.com to momo@gmail.com</p></td>
		      <td><p class="text_black text-right">6:38PM</p></td>
		    </tr>
		    
		  </tbody>
	    </table>
	</div> --}}
</div>
{{-- </div> --}}
@endsection

@section('scripts')
	<!-- Diff march patch -->
    <script src="{{ asset('backend_assets/admin_dashboard/plugins/diff_match_patch/javascript/diff_match_patch.js') }}"></script>

    <!-- jQuery pretty text diff -->
    <script src="{{ asset('backend_assets/admin_dashboard/plugins/preetyTextDiff/jquery.pretty-text-diff.min.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function () {

	        // Initial diff1
	        $(".diff-wrapper").prettyTextDiff({
	            diffContainer: ".result_difference"
	        });


	        // Initial diff2
	        $(".diff-wrapper2").prettyTextDiff({
	            originalContent: $('#original').val(),
	            changedContent: $('#changed').val(),
	            diffContainer: ".diff2"
	        });

	        // Run diff on textarea change
	        $(".diff-textarea").on('change keyup', function() {
	            $(".diff-wrapper2").prettyTextDiff({
	                originalContent: $('#original').val(),
	                changedContent: $('#changed').val(),
	                diffContainer: ".diff2"
	            });

	        });

	    });
	</script>
@endsection