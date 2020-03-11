@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.admin')

@section('styles')
<style>
.nav-pills .nav-link.active{
	{{ ($request->segment(1) == 'ar') ? ' border-right: 5px solid #01630a !important;border-left: 0px solid #01630a !important;' : '' }}
}
</style>
@endsection
@section('content')
	{{-- <div class="content__body"> --}}
		<div class="container mt-5">
			<div class="row">
				<div class="nav flex-column nav-pills col-lg-3 col-md-3 col-sm-3 offset-1 {{ ($request->segment(1) == 'ar') ? 'text-right' : '' }}" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<p class="settings_title">
						{{ trans('lang.admin.site_settings') }}
					</p>
					@if(loggedInUserRole() instanceof Spatie\Permission\Models\Role && loggedInUserRole()->hasPermissionTo('site_management_view'))
					  <a class="nav-link active" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="true">{{ trans('lang.admin.settings') }}</a>
					@endif
					@if(loggedInUserRole() instanceof Spatie\Permission\Models\Role && loggedInUserRole()->hasPermissionTo('site_management_view'))
					  <a class="nav-link" id="v-pills-maintenance-tab" data-toggle="pill" href="#v-pills-maintenance" role="tab" aria-controls="v-pills-maintenance" aria-selected="false">{{ trans('lang.admin.maintenance') }}</a>
					@endif
					{{-- @if(loggedInUserRole() instanceof Spatie\Permission\Models\Role && loggedInUserRole()->hasPermissionTo('role_permission_view'))
							<a class="nav-link" id="v-pills-rolespermissions-tab" data-toggle="pill" href="#v-pills-rolespermissions" role="tab" aria-controls="v-pills-rolespermissions" aria-selected="false">Staff Settings</a>
					@endif --}}
				</div>
				<div class="tab-content col-lg-5 col-md-7 col-sm-8 pt-lg-0 pt-md-0 pt-sm-0 pt-5" id="v-pills-tabContent">

					@if(loggedInUserRole() instanceof Spatie\Permission\Models\Role && loggedInUserRole()->hasPermissionTo('site_management_view'))
					<div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

						<form action="{{ route('save_site_management', [app()->getLocale(), 'general']) }}" method="POST" enctype="multipart/form-data">
							@csrf

							<div class="form-group">
								<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.admin.site_name__google_search_and_browser_tab__') }}</label>
								<input type="text" name="title" class="form-control" value="{{ $site_managements['title'] ?? old('title') }}">
							</div>

							<div class="form-group">
								<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.admin.site_description') }}</label>
								<input type="text" name="description" class="form-control" value="{{ $site_managements['description'] ?? old('description') }}">
							</div>

							<div class="form-group">
								<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.admin.illustration') }}</label>
								
								<div id="content">
									<div class="frame">
										<span class="helper"></span>
										<img src="{{ isset($site_managements['logo']) ? asset($site_managements['logo']) : '' }}" class="img-responsive img-fluid logo_input" id="logo_image_img">
									</div>
									<div id="hoverbar">
										<a id="new_logo" class="button" >{{ trans('lang.admin.click_here_to_upload_new') }}</a>
										<input type="file" id="new_logo_button" style="display: none;" name="logo" accept="image/*">
										
								    </div>
								</div>
								
							</div>
							
							<div class="mt-30"></div>
							<div class="form-group">
								<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.admin.favicon') }}</label>

								<div id="content">
									<div class="frame">
										<span class="helper"></span>
										<img src="{{ isset($site_managements['favicon']) ? asset($site_managements['favicon']) : '' }}" class="img-responsive img-fluid logo_input" id="favicon_image_img">
										
									</div>
									<div id="hoverbar">
										<a id="new_favicon" class="button" >{{ trans('lang.admin.click_here_to_upload_new') }}</a>
										<input type="file" id="new_favicon_button" style="display: none;" name="favicon" accept="image/*">
										
								    </div>
								</div>
								
							</div>

							<br>
						  	<br>
						  	<div class="mt-30"></div>
						  	<div class="form-group">
						  		<button class="button" type="submit" id="permission_role_button">
						  			{{ trans('lang.admin.save_changes') }}
						  		</button>
						  	</div>
						</form>
					</div>
					
					{{-- Second Tab --}}
					<div class="tab-pane fade" id="v-pills-maintenance" role="tabpanel" aria-labelledby="v-pills-maintenance-tab">

						<form action="{{ route('save_site_management', [app()->getLocale(), 'maintenance']) }}" method="POST" enctype="multipart/form-data">
							@csrf

						  	<div class="form-group">
						  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.admin.site_name__google_search_and_browser_tab__') }}</label>
						  		<input type="text" name="maintenance_heading" class="form-control"  value="{{ $site_managements['maintenance_heading'] ?? old('maintenance_heading') }}">
						  	</div>

						  	<div class="form-group">
						  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.admin.site_description') }}</label>
						  		<input type="text" name="maintenance_description" class="form-control"  value="{{ $site_managements['maintenance_description'] ?? old('maintenance_description') }}">
						  	</div>

						  	<div class="form-group">
						  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.admin.logo_type') }}</label>


						  		<div id="content">
									<div class="frame">
										<span class="helper"></span>
										<img src="{{ isset($site_managements['maintenance_image']) ? asset($site_managements['maintenance_image']) : '' }}" class="img-responsive img-fluid logo_input" id="maintenance_image_img">
										
									</div>
									<div id="hoverbar">
										<a id="maintenance_image" class="button" >{{ trans('lang.admin.click_here_to_upload_new') }}</a>
										<input type="file" id="maintenance_image_button" style="display: none;" name="maintenance_image" accept="image/*">
										
								    </div>
								</div>

								
						  	</div>
							<div class="mt-30"></div>

						  	<div class="form-group">
						  		<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">{{ trans('lang.admin.turn_it_on') }}</label>
						  		<label class="switch">
								  <input 
								  	name="maintenance_mode" 
								  	type="checkbox"
								  	{{ isset($site_managements['maintenance_mode']) ? 'checked' : '' }}
								  	>
								  <span class="slider round"></span>
								</label>
						  	</div>

						  	<hr>
						  	<br>
						  	<div class="form-group">
						  		<button class="button" type="submit" id="maintenance_button">
						  			{{ trans('lang.admin.save_changes') }}
						  		</button>
						  	</div>
						</form>

					</div>
					@endif
					
					{{-- Third Tab --}}
					{{-- @if(loggedInUserRole() instanceof Spatie\Permission\Models\Role && loggedInUserRole()->hasPermissionTo('role_permission_view'))
						<div class="tab-pane fade section_three" id="v-pills-rolespermissions" role="tabpanel" aria-labelledby="v-pills-rolespermissions-tab">
							<label class="label_forms {{ ($request->segment(1) == 'ar') ? 'text-right float-right' : 'text-left' }}">Moderators can do (the things you turn on):</label>
							<form action="{{ route('permission_role', app()->getLocale()) }}" method="POST">
								@csrf
								<table class="table">
									<tbody>
										@isset($permissions)
											@forelse($permissions as $permission)
												<tr>
													<td>
														<label class="label_forms">
															{{ $permission->name }}
														</label>
													</td>
													<td>
														<label class="switch">
															<input class="i-checks checkbox" type="checkbox" name="permission_role[{!!$permission->id!!}][{!!$role->id!!}]" {!! (in_array($permission->id.'-'.$role->id, $permission_role)) ? 'checked' : '' !!}>
															<span class="slider round"></span>
														</label>
													</td>
												</tr>
											@empty
												<tr>
													<td>
														No Permission found. Consult Developer.
													</td>
												</tr>
											@endforelse
										@endisset
									</tbody>
								</table>

								<hr>
							  	<br>
							  	<div class="form-group">
							  		<button class="button" type="submit" id="permission_role_button">
							  			Save Changes
							  		</button>
							  	</div>
							</form>
						</div>
					@endif --}}

				</div>
				<div class="col-lg-3 col-md-1"></div>
			</div>
		</div>
	{{-- </div> --}}
@endsection


{{-- <div>
										<input type="file" class="" name="logo" accept="image/*">
									</div> --}}
@section('scripts')
<script type="text/javascript">
$('#new_logo').click(function(){
	$('#new_logo_button').click();
});

$('#new_favicon').click(function(){
	$('#new_favicon_button').click();
});

$('#maintenance_image').click(function(){
	$('#maintenance_image_button').click();
});


$("#new_logo_button").change(function(){
    changeLogoImage(this);
});
$("#new_favicon_button").change(function(){
    changeFaviconImage(this);
});
$("#maintenance_image_button").change(function(){
    changeMaintenanceImage(this);
});

function changeLogoImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#logo_image_img').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }   
}
function changeFaviconImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#favicon_image_img').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }   
}
function changeMaintenanceImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#maintenance_image_img').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }   
}
</script>
@endsection