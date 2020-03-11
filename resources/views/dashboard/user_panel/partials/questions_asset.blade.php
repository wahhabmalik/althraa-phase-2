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





<style type="text/css">
.wizard-card .icon-circle {
    width: 40px;
    height: 40px;
}

.nav-pills > li.active > a:after , .nav-pills > li > a:after {
    width: 40px;
    height: 40px;

}
.wizard-card .icon-circle , .nav-pills > li > a , .nav-pills > li.active > a:after{
	position: unset;
}
.wizard-card .wizard-navigation .progress-with-circle , .nav-pills{
	height: 2px;
}
.nav-pills > li.active > a:after{
	display: none;
}
.wizard-card[data-color="orange"] .nav-pills .icon-circle.checked {
    border-color: #01630A;
    background: #01630A;
}
.wizard-card[data-color="orange"] .wizard-navigation .progress-bar {
    background-color: #016008;
}
.nav>li {
     position: relative; 
    top: -50px;
    display: block;
    z-index: 9999;
}
.wizard-card .icon-circle [class*="ti-"] , .nav-pills > li.active > a [class*="ti-"] {
    top: 28px;
}
.active a .checked {
    border-color: #fff !important;
    background-color: #fff !important;
    box-shadow: 1px 1px 4px 1px #c3c3c3;
}
.wizard-card {
    box-shadow: unset;
}
@media only screen and (max-width: 600px) {
    /*.progressbar_text{
        font-size: 8px !important;
    }*/
    .welcome_text {
        font-size: 60px;
    }
}

@media screen and (max-width: 768px) {
    ul.nav.nav-pills li{
        display: none;
    }
    .tab-mob{
        display: block !important;
        width: 33% !important;
    }
    .progress-bar{
        width: 15% !important;
    }
    ul.navbar-nav.ml-auto{
        display: -webkit-box;
    }
    .header .navbar {
        padding: 1.3rem 1.4rem !important;
        margin: 10px;
    }
}


.wizard-card[data-color="green"] .nav-pills .icon-circle.checked {
    border-color: #01630a;
    background: #01630a;
}

.total_text{
    font-size: 20px;
    font-weight: 800;
    color: #000;
    font-family: Soin Sans Neue;
}

.button{
    padding: 1refont-familym 3.3rem;
    width: 100%;
    border: none;
}

.active a .icon-circle {
    border-color: #fff !important;
    background-color: #fff !important;
    box-shadow: 1px 1px 9px 5px #00000029!important;
}




/* tabs styling */

.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #000;
    background-color: #007bff00;
    font-family: Soin Sans Neue, Bold;
    font-size: 20px;
    font-weight: bold;
    border-left: 5px solid #01630a !important;
    border-radius: unset;

}
.nav-pills .nav-link {
    border-radius: .25rem;
    color: #989898;
    background-color: #007bff00;
    font-family: Soin Sans Neue, Bold;
    font-size: 20px;
    font-weight: bold;
    border-radius: unset;
    margin-bottom: 10px;
}
.label_forms {
    font-size: 12px;
    font-family: Soin Sans Neue;
    font-weight: 700;
    margin-bottom: 0;
    color: #000;
}

.section_three .form-group {
    margin-bottom: 15px;
}

.nav-link {
    display: block;
    padding: .2rem 1.5rem;
}


/* tabs styling end */















.form-box {
    padding-top: 40px;
    padding-bottom: 40px;
    
    background: rgb(234,88,4); /* Old browsers */
    background: -moz-linear-gradient(top,  rgba(234,88,4,1) 0%, rgba(234,40,3,1) 51%, rgba(234,88,4,1) 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(to bottom,  rgba(234,88,4,1) 0%,rgba(234,40,3,1) 51%,rgba(234,88,4,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ea5804', endColorstr='#ea5804',GradientType=0 ); /* IE6-9 */
}

.form-wizard {
    
    background: #fff;
    -moz-border-radius: 4px; 
    -webkit-border-radius: 4px; 
    border-radius: 4px; 
    box-shadow: 0px 0px 6px 3px #777;
    font-family: Soin Sans Neue;
    font-size: 16px;
    font-weight: 300;
    color: #888;
    line-height: 30px;
    text-align: center;
}
    
.form-wizard strong { font-weight: 500; }

.form-wizard a, .form-wizard a:hover, .form-wizard a:focus {
    color: #01630a;
    text-decoration: none;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}

.form-wizard h1, .form-wizard h2 {
    margin-top: 10px;
    font-size: 38px;
    font-weight: 100;
    color: #555;
    line-height: 50px;
}

.form-wizard h3 {
    font-size: 25px;
    font-weight: 300;
    color: #01630a;
    line-height: 30px;
    margin-top: 0; 
    margin-bottom: 5px; 
    text-transform: uppercase; 
}

.form-wizard h4 {
    float:left;
    font-size: 20px;
    font-weight: 300;
    color: #01630a;
    line-height: 26px;
    width:100%;
}
.form-wizard h4  span{
    float:right;
    font-size: 18px;
    font-weight: 300;
    color: #555;
    line-height: 26px;
}

.form-wizard table tr th{font-weight:normal;}

.form-wizard img { max-width: 100%; }

.form-wizard ::-moz-selection { background: #01630a; color: #fff; text-shadow: none; }
.form-wizard ::selection { background: #01630a; color: #fff; text-shadow: none; }


.form-control {
    height: 44px;
    width:100%;
    margin: 0;
    padding: 0 20px;
    vertical-align: middle;
    background: #fff;
    border: 1px solid #ddd;
    font-family: Soin Sans Neue;
    font-size: 16px;
    font-weight: 300;
    line-height: 44px;
    color: #888;
    -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}
.checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
    position: absolute;
    margin-top: 9px;
    margin-left: -20px;
}

.form-control option:hover, .form-control option:checked  {
    box-shadow: 0 0 10px 100px #01630a inset;
}

.form-control:focus {
    outline: 0;
    background: #fff;
    border: 1px solid #ccc;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
}

.form-control:-moz-placeholder { color: #888; }
.form-control:-ms-input-placeholder { color: #888; }
.form-control::-webkit-input-placeholder { color: #888; }


.form-wizard label span { color:#01630a; }


.form-wizard .btn {
    min-width: 105px;
    height: 40px;
    margin: 0;
    padding: 0 20px;
    vertical-align: middle;
    border: 0;
    font-family: Soin Sans Neue;
    font-size: 16px;
    font-weight: 300;
    line-height: 40px;
    color: #fff;
    -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
    text-shadow: none;
    -moz-box-shadow: none; -webkit-box-shadow: none; box-shadow: none;
    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
}

.form-wizard .btn:hover {
    background:#f34727; 
    color: #fff; 
    }
.form-wizard .btn:active { 
    outline: 0; 
    background:#f34727; 
    color: #fff; 
    -moz-box-shadow: none; 
    -webkit-box-shadow: none; 
    box-shadow: none; 
    }
.form-wizard .btn:focus,
.form-wizard .btn:active:focus,
.form-wizard .btn.active:focus { 
    outline: 0; 
    background:#f34727; 
    color: #fff; 
}

.form-wizard .btn.btn-next,
.form-wizard .btn.btn-next:focus,
.form-wizard .btn.btn-next:active:focus, 
.form-wizard .btn.btn-next.active:focus { 
background: #01630a; 
}

.form-wizard .btn.btn-submit,
.form-wizard .btn.btn-submit:focus,
.form-wizard .btn.btn-submit:active:focus, 
.form-wizard .btn.btn-submit.active:focus { 
background: #01630a; 
}

.form-wizard .btn.btn-previous,
.form-wizard .btn.btn-previous:focus,
.form-wizard .btn.btn-previous:active:focus, 
.form-wizard .btn.btn-previous.active:focus { 
background: #bbb;
}

.form-wizard .success h3{
    color: #4F8A10;
    text-align: center;
    margin: 20px auto !important;
}
.form-wizard .success .success-icon {
    color: #4F8A10;
    font-size: 100px;
    border: 5px solid #4F8A10;
    border-radius: 100px;
    text-align: center !important;
    width: 110px;
    margin: 25px auto;
}
.form-wizard .progress-bar {
    background-color: #01630a;
}

.form-wizard-steps{ 
    margin:auto; 
    overflow: hidden; 
    position: relative; 
    
}
.form-wizard-step{
    padding-top:10px !important;
    border:2px solid #fff;
    background:#ccc;
    -ms-transform: skewX(-30deg); /* IE 9 */
    -webkit-transform: skewX(-30deg); /* Safari */
    transform: skewX(-30deg); /* Standard syntax */
}
.form-wizard-step.active{
    background:#01630a;
}
.form-wizard-step.activated{
    background:#01630a;
}
.form-wizard-progress { 
    position: absolute; 
    top: 36px;
    left: 0; 
    width: 100%; 
    height: 0px; 
    background: #01630a;
}
.form-wizard-progress-line { 
    position: absolute; 
    top: 0; 
    left: 0; 
    height: 0px; 
    background: #01630a; 
}

.form-wizard-tolal-steps-3 .form-wizard-step { 
    position: relative;
    float: left; 
    width: 33.33%; 
    padding: 0 5px; 
}
.form-wizard-tolal-steps-4 .form-wizard-step { 
    position: relative; 
    float: left; 
    width: 25%; 
    padding: 0 5px; 
}
.form-wizard-tolal-steps-5 .form-wizard-step { 
    position: relative;
    float: left;
    width: 20%;
    padding: 0 5px;
}

.form-wizard-step-icon {
    display: inline-block;
    width: 40px; 
    height: 40px; 
    margin-top: 4px; 
    background: #ddd;
    font-size: 16px; 
    color: #777; 
    line-height: 40px;
    -moz-border-radius: 50%; 
    -webkit-border-radius: 50%; 
    border-radius: 50%;
    -ms-transform: skewX(30deg); /* IE 9 */
    -webkit-transform: skewX(30deg); /* Safari */
    transform: skewX(30deg); /* Standard syntax */
}
.form-wizard-step.activated .form-wizard-step-icon {
    background: #01630a; 
    border: 1px solid #fff; 
    color: #fff; 
    line-height: 38px;
}
.form-wizard-step.active .form-wizard-step-icon {
    background: #fff; 
    border: 1px solid #fff; 
    color: #01630a; 
    line-height: 38px;
}

.form-wizard-step p { 
    color: #fff;
    -ms-transform: skewX(30deg); /* IE 9 */
    -webkit-transform: skewX(30deg); /* Safari */
    transform: skewX(30deg); /* Standard syntax */
}
.form-wizard-step.activated p { color: #fff; }
.form-wizard-step.active p { color: #fff; }

.form-wizard fieldset { 
    display: none; 
    text-align: left; 
    border:0px !important
}

.form-wizard-buttons { text-align: right; }

.form-wizard .input-error { border-color: #01630a;}

/** image uploader **/
.image-upload a[data-action] {
  cursor: pointer;
  color: #555;
  font-size: 18px;
  line-height: 24px;
  transition: color 0.2s;
}
.image-upload a[data-action] i {
  width: 1.25em;
  text-align: center;
}
.image-upload a[data-action]:hover {
  color: #01630a;
}
.image-upload a[data-action].disabled {
  opacity: 0.35;
  cursor: default;
}
.image-upload a[data-action].disabled:hover {
  color: #555;
}
.settings_wrap{
    margin-top:20px;
}
.image_picker .settings_wrap {
  overflow: hidden;
  position: relative;
}
.image_picker .settings_wrap .drop_target,
.image_picker .settings_wrap .settings_actions {
  float: left;
}
.image_picker .settings_wrap .drop_target {
  margin-right: 18px;
}
.image_picker .settings_wrap .settings_actions {
    float: left;
    margin-top: 100px;
    margin-left: 20px;
}
.settings_actions.vertical a {
  display: block;
}
.drop_target {
    position: relative;
    cursor: pointer;
    transition: all 0.2s;
    width: 250px;
    height: 250px;
    background: #f2f2f2;
    border-radius: 100%;
    margin: 0 auto 25px auto;
    overflow: hidden;
    border: 8px solid #E0E0E0;
}
.drop_target input[type="file"] {
  visibility: hidden;
}
.drop_target::before {
    content: 'Drop Hear';
    font-family: FontAwesome;
    position: absolute;
    display: block;
    width: 100%;
    line-height: 220px;
    text-align: center;
    font-size: 40px;
    color: rgba(0, 0, 0, 0.3);
    transition: color 0.2s;
}
.drop_target:hover,
.drop_target.dropping {
  background: #f80;
  border-top-color: #cc6d00;
}
.drop_target:hover:before,
.drop_target.dropping:before {
  color: rgba(0, 0, 0, 0.6);
}
.drop_target .image_preview {
  width: 100%;
  height: 100%;
  background: no-repeat center;
  background-size: contain;
  position: relative;
  z-index: 2;
}

.form-wizard{
    box-shadow: none;
}

.form-wizard-step, .form-wizard-step-icon{
    transform: unset;
}
.form-wizard-tolal-steps-4 .form-wizard-step {
   width: 33%;
   padding: 10px 5px;
}
.form-wizard-step.active {
    background: #01630a;
}
.form-wizard-step {
    background: #f3f2ee;
}
.form-wizard-step.activated {
    background: #01630a;
}

.wizard-card[data-color="green"] .wizard-navigation .progress-bar {
    background-color: #01630a;
}

.header .navbar {
    padding: 1.3rem 4.4rem !important;
    margin: 10px;
}

@media screen and (max-width: 768px) {
    .header .navbar {
        padding: 1.3rem 1.4rem !important;
        margin: 10px;
    }
}

.navbar-nav{
    {{ ($request->segment(1) == 'ar') ? 'margin: 0 !important;' : '' }}
}
.navbar-nav {
    margin: 7.5px 0px;
}
.navbar-brand{
    padding: 8px 8px;
}
</style>



