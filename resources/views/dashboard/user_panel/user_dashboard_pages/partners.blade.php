@extends('dashboard.layouts..user_layout.user_dashboard')

@section('styles')
<style type="text/css">
.button_white{
	padding: 1.3rem 3rem;
}
.img-box {
    min-height: 120px;
}


.suggested-plan {
    text-align: center;
    padding: 50px 20px;
    font-size: 24px;
    background: #F0F1F3;
    color: #bcbcbc;
    font-family: Soin Sans Neue;
    font-weight: bold;
}
.suggested-plan:hover{
	background: #01630a;
    color: #fff;
}
.suggested-selected{
	background: #01630a8f;
    color: #fff;
}
.suggested-selected:hover{
	background: #01630a;
    color: #fff;
}
</style>
@endsection

@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <h2 class="user__intro">Our Partners</h2>
        <p>This is the list of services you can use with Althraa.</p>
      </div>
	</div>
	<div class="s-20"></div>
	<div class="row">
		<div class="col-sm-3">
			<div class="user_box">
				<div class="img-box">
					<img class="user_image img img-fluid" src="{{ asset('backend_assets/dashboard/images/partners/partner1.png') }}">
				</div>
				<p class="text_black">Wealthfront</p>
				
					<p class="">
						Save, plan and invest all in one place.
					</p>
				    <a 
				    href="#" 
				    class="button_white">
	                    Visit website
	                </a>
	                <div class="s-20"></div>
		            
			</div>
		</div>

		<div class="col-sm-3">
			<div class="user_box">
				<div class="img-box">
					<img class="user_image img img-fluid" src="{{ asset('backend_assets/dashboard/images/partners/partner2.png') }}">
				</div>
				<p class="text_black">Motif</p>
				
					<p class="">
						Give your portfolio the crypto edge.
					</p>
				    <a 
				    href="#" 
				    class="button_white">
	                    Visit website
	                </a>
	                <div class="s-20"></div>
		            
			</div>
		</div>
	</div>
  </div>
</div>
@endsection