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

	.user__profile_image{
		background-size: cover;
		background-position: center;
		max-height: 180px;
		height: 200px;
		width: 100%;
	}


	.logo_input {
	    vertical-align: middle;
	    max-width: 180px;
	}

	/*.frame {
	    height: 150px;
	    width: 100%;
	    background: #fcfcfc;
	    text-align: center; 
	}
	.helper {
	    display: inline-block;
	    height: 100%;
	    vertical-align: middle;
	}

	#content{
	    height: 150px;
	    width: 92%;
	    background: #fcfcfc;
	    text-align: center; margin: 3em 0;
	    position:absolute;
	}
	#hoverbar{
	    height: 150px;
	    width: 100%;
	    background-color:#010101ad;
	    position:absolute;
	    bottom:0;
	    margin:0;
	    padding:0;
	    visibility:hidden;
	}
	#content:hover > #hoverbar{
	    visibility:visible; 
	}
	a.button {
	    position: relative;
	    top: 40%;
	    padding:7px !important;
	    color:#fff !important;
	}
	.button:hover, .button:link:hover, .button:visited:hover {
	    background-color: rgb(1, 99, 10);
	    color:#fff;
	    cursor: pointer;
	}*/
	</style>
@endsection
@section('content')
<div class="container mt-5">
{{-- <div class="content__body"> --}}
	<h2 class="user__intro">User</h2>
	<p class="setting_text text-left">
		Profile
	</p>
	<br>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 col-sm-12">
			<form action="{{ route('update_user', app()->getLocale()) }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 mb-sm-5">
						<a class="btn btn-block mt-2 mb-2" id="#profile_image_button" onclick="openFileInput();" style="cursor: pointer;">Click to Upload New</a>
						<input type="file" id="profile_image_input" name="profile_image" style="display: none;">
						
						<div class="user__profile_image img-responsive mb-5 text-center">
							<img class="img img-fluid" src="{{ (isset($user->profile_image)) ? asset($user->profile_image) : asset('backend_assets/user_uploads/default.png') }}" id="prev-profile-image">
						</div>
						{{-- <div id="content">
							<div class="frame">
								<span class="helper"></span>
								<img src="{{ (isset($user->profile_image)) ? asset($user->profile_image) : asset('backend_assets/user_uploads/default.png') }}" class="img-responsive img-fluid logo_input">
							</div>
							<div id="hoverbar">
								<a id="profile_image" class="button" >Click here to upload new</a>
								<input 
									type="file" 
									id="profile_image_button" 
									style="display: none;" 
									name="profile_image" 
									accept="image/*"
									>	
						    </div>
						</div> --}}

					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 mt-sm-5 mt-lg-0 mt-md-0">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="form-group @error('name') is-invalid has-error @enderror">
									<label class="control-label">{{ trans('lang.register_form.name') }}</label>
									<input 
										type="text" 
										name="name" 
										id="name" 
										class="form-control @error('name') is-invalid has-error @enderror"  
										value="{{ $user->name ?? '' }}"
										required 
										>
								</div>
								@error('name')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>

							<div class="col-md-12 col-sm-12">
								<div class="form-group @error('phone_number') is-invalid has-error @enderror">
									<label class="control-label">{{ trans('lang.register_form.phone_number') }}</label>
									<input 
										type="number" 
										name="phone_number" 
										id="phone_number" 
										class="form-control @error('phone_number') is-invalid has-error @enderror" 
										value="{{ $user->phone_number ?? '' }}"
										required 
										>
								</div>
								@error('phone_number')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>

							<div class="col-md-12 col-sm-12">
								<div class="form-group @error('email') is-invalid has-error @enderror">
									<label class="control-label">{{ trans('lang.email_address') }}</label>
									<input 
										type="email" 
										name="email" 
										id="email" 
										class="form-control @error('email') is-invalid has-error @enderror" 
										value="{{ $user->email ?? '' }}"
										required 
										>
								</div>
								@error('email')
		                            <span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
							</div>

							
								<div class="col-md-4 offset-8">
									<div class="form-group float-right">
										<button type="submit" class="button">Save</button>
									</div>
								</div>
							
						</div>
					</div>
				</div>

			</form>
		</div>
		<div class="col-md-3"></div>
	</div>

</div>
{{-- </div> --}}


@endsection

@section('scripts')
	<script type="text/javascript">
		function openFileInput() {
			$('#profile_image_input').click();
		}

		$("#profile_image_input").change(function(){
            changeImage(this);
        });

        function changeImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#prev-profile-image').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
            
        }
		
	</script>
@endsection