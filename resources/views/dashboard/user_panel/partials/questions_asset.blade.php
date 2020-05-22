@inject('request', 'Illuminate\Http\Request')

<link href="{{ asset('backend_assets/questions/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('backend_assets/questions/assets/css/paper-bootstrap-wizard.css') }}" rel="stylesheet" />

<!-- CSS Just for demo purpose, don't include it in your project -->
<link href="{{ asset('backend_assets/questions/assets/css/demo.css') }}" rel="stylesheet" />

<!-- Fonts and Icons -->
<link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
<link href="{{ asset('backend_assets/questions/assets/css/themify-icons.css') }}" rel="stylesheet">
<!-- Toastr CSS -->
<link href="{{ asset('backend_assets/site_assets/css/toastr/toastr.min.css') }}" rel="stylesheet">


<link href="{{ asset('backend_assets/dashboard/questions/css/styles.css') }}" rel="stylesheet">

<style type="text/css">
.nav-pills .nav-link.active, .nav-pills .show > .nav-link{
  background:#ffffff;
}
/*label.error:not(.form-control){
  {{ ($request->segment(1) == 'ar') ? 'float:right-' : '' }}
}*/
/*.form-group {
    padding-bottom: 1px;
}*/
</style>