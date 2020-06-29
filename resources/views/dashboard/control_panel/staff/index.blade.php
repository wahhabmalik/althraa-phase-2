@inject('request', 'Illuminate\Http\Request')
@extends('dashboard.layouts.admin', ['title' => $title ?? ''])

@section('styles')
	{{-- Select 2 CSS --}}
    <link href="{{ asset('backend_assets/site_assets/css/select2/select2.min.css') }}" rel="stylesheet">

	<style>
	.form-control {
	    display: block;
	    width: 100%;
	    height: calc(1.5em + .75rem + 2px);
	    padding: 0.35rem .75rem;
	    font-size: 1.5rem;
	    font-weight: 400;
	    line-height: 1.5;
	    color: #222222;
	    background-color: #fff !important;
	    background-clip: padding-box;
	    border: 1px solid #e4e8ec;
	    border-radius: unset !important;
	    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
	}

	.button{
	    padding: 10px 20px !important;
	}
	</style>
@endsection
@section('content')
{{-- <div class="content__body"> --}}
<div class="container mt-5">
	<h2 class="user__intro {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">{{ trans('lang.admin.staff') }}</h2>
	<p class="setting_text {{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">
		{{ trans('lang.admin.site_settings') }}
		<span class="text-right {{ ($request->segment(1) == 'ar') ? 'float-left' : 'float-right' }} button">
			<a href="{{ route('add_user/moderator', app()->getLocale()) }}" class="text-white">
				{{ trans('lang.admin.add') }}
			</a>
		</span>
	</p>
	
	@if (isset($users) && count($users) > 0) 
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="form-group">
				<p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">{{ trans('lang.register_form.phone_number') }}</p>
              	<select 
              		class="form-control" 
              		id="user_id" 
              		name="user_id" 
              		>
                  	<option></option>
                  	@foreach ($users as $user)
                  		<option value="{{ $user->id }}">{{ $user->phone_number }}</option>
                  	@endforeach
              </select>
        	</div>
		</div>

		<div class="col-lg-1 col-md-2"></div>

		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="form-group">
				<p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">{{ trans('lang.admin.moderator_or_administrator') }}</p>
              	<select 
              		class="form-control" 
              		id="role_id" 
              		name="role_id" 
              		>
                  	<option></option>
                  	@foreach ($roles as $role)
                  		<option value="{{ ucfirst($role->name) }}">{{ ucfirst($role->name) }}</option>
                  	@endforeach
              </select>
        	</div>
		</div>
	</div>
	@endif

	<br>
	<br>

	<div class="row">
		@isset ($users)
			@forelse ($users as $user)
				<div class="col-lg-3 col-md-4 col-sm-6 {{ $user->hasRole('admin') ? 'admin_class' : 'moderator_class' }}" id="div_{{ $user->id }}">
					<div class="user_box">
						<img class="user_image" src="{{ asset('backend_assets/dashboard/images/users/ali@2x.png') }}">
						<p class="text_black">{{ $user->name }}</p>
						<p class="text_black">{{ $user->email }}</p>
						@if($user->hasRole('admin'))
							<p class="text_red">
								{{ trans('lang.admin.admin') }}
							</p>

							<form class="form-staff-role-switch" method="POST" action="{{ route('switch_role', [app()->getLocale(), $user]) }}" style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <button title="Switch Role" type ="submit" class="button">
                                    {{ trans('lang.admin.set_to_moderator') }}
                                </button>
                            </form>
						@endif

						@if($user->hasRole('moderator'))
							<p class="text_red">
								{{ trans('lang.admin.moderator') }}
							</p>
							<form class="form-staff-role-switch" method="POST" action="{{ route('switch_role', [app()->getLocale(), $user]) }}" style="display: inline-block;">
                                @csrf
                                @method('PATCH')
                                <button title="Switch Role" type ="submit" class="button">
                                    {{ trans('lang.admin.set_to_admin') }}
                                </button>
                            </form>
						@endif

						<br>
						<br>
						<form method="POST" action="{{ route('delete_user', [app()->getLocale(), $user]) }}" style="display: inline-block;">
	                        @csrf
	                        {{ method_field('DELETE') }}
	                        <button type="submit" class="btn btn-sm">{{ trans('lang.admin.remove_from_staff') }}</button>
                        </form>
					</div>
				</div>
			@empty
				<div class="col-sm-4 offset-lg-4">
					<div class="user_box">
						<img class="user_image img-fluid img-responsive" src="{{ asset('backend_assets/site_assets/images/default-user.png') }}" width="150px">
						<p class="text_black">
							<del> {{ trans('lang.admin.no_user_found') }} </del>
						</p>
					</div>
				</div>
			@endforelse
		@endisset
		
	</div>
</div>
{{-- </div> --}}


	{{-- ___________________________ MODAL Switch Role __________________________ --}}
    <div class="modal inmodal" id="switch-role-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <p class="{{ ($request->segment(1) == 'ar') ? 'text-right' : 'text-left' }}">{{ trans('lang.admin.confirmation') }} </p>
                    
                </div>
                <div class="modal-footer">
                    <button class="button" id="switch-role-button">{{ trans('lang.admin.save_changes') }}</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
	<!-- Select2 JS -->
    <script src="{{ asset('backend_assets/site_assets/js/select2/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function(){
        	// select 2
            $(".select2").select2();
            $("#user_id").select2({
                placeholder: "",
                allowClear: true
            });
            $("#role_id").select2({
                placeholder: "",
                allowClear: true
            });
        

	        // filter on basis of Role
	        $('#role_id').on('change', function() {
	        	if(this.value == 'Admin'){
					$('.moderator_class').hide('slow');
					$('.admin_class').show('slow');
	        	}
				else if(this.value == 'Moderator'){
					$('.admin_class').hide('slow');
					$('.moderator_class').show('slow');
				}
				else if(this.value == ''){
					$('.col-sm-3').show();
				}
			});


			// filter on basis of user
			$('#user_id').on('change', function() {
				var x = this.value;
				$('.col-sm-3').show();
				$('.col-sm-3:not(#div_'+x+')').hide();
				if(this.value == ''){
					$('.col-sm-3').show();
				}
			});


			// switch role
			$('.form-staff-role-switch').on('click', function(e){
			    e.preventDefault();
			    var $form = $(this);
			    $('#switch-role-modal').modal({ backdrop: 'static', keyboard: false })
			        .on('click', '#switch-role-button', function(){
			            $form.submit();
			        });
			});
        });

    </script>
@endsection