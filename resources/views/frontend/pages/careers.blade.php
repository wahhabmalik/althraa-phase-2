@extends('frontend.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">
    

</style>
@endsection

@section('content')
<div class="background_effect">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="s-35"></div>
                <p class="login_link text-center primary-link">CAREERS</p>
                <h1 class="text-center page-heading">Are you interested to work<br>at Althraa?</h1>
                <div class="s-20"></div>
            </div>
        </div>
    </div>
</div>

<div class="s-50"></div>

<div class="origin_box">
    <div style="display: flex">
        <div class="ico_box">
            <img src="{{ asset('frontend_assets/img/icons/i_icon.svg') }}">
        </div>
        <p>Would you like to see our origin stroy ?</p>
    </div>
    <br>
    <div style="display:flex">
        <div style="width: 80%">
            <a href="{{ route('about',app()->getLocale()) }}"><p class="text_secondary">About Us </p></a>
        </div>
        <div style="widows: 20%">
            <i class="fa fa-long-arrow-right fa-2x text_secondary"></i>
        </div>
    </div>
</div>

<div class="container">

    <div class="s-100"></div>

    <p class="login_link text-center primary-link">BENEFITS</p>
    <h2 class="text-center">What benefits will you have?</h2>

    <div class="s-50"></div>

    <div class="row text-center">
        <div class="col-sm-2 offset-sm-1">
            <span><img class="img img-fluid" src="{{ asset('frontend_assets/img/icons/about_icon_1.svg') }}">
            <p class="icon-c text_black">Community</p>
        </div>
        <div class="col-sm-2">
            <span><img class="img img-fluid" src="{{ asset('frontend_assets/img/icons/about_icon_2.svg') }}"></span>
            <p class="icon-c text_black">Health</p>
        </div>
        <div class="col-sm-2">
            <span><img class="img img-fluid" src="{{ asset('frontend_assets/img/icons/about_icon_3.svg') }}"></span>
            <p class="icon-c text_black">Work/life balance</p>
        </div>
        <div class="col-sm-2">
            <span><img class="img img-fluid" src="{{ asset('frontend_assets/img/icons/about_icon_4.svg') }}"></span>
            <p class="icon-c text_black">Plan for the future</p>
        </div>
        <div class="col-sm-2">
            <span><img class="img img-fluid" src="{{ asset('frontend_assets/img/icons/about_icon_5.svg') }}"></span>
            <p class="icon-c text_black">Learn and Grow</p>
        </div>
    </div>
</div>
<div class="s-100"></div>


<div class="container">

    <div class="s-100"></div>

    <p class="login_link text-center primary-link">TEAM</p>
    <h2 class="text-center">Meet the Team</h2>

    <div class="s-50"></div>

    <div class="row text-center">
        <div class="col-sm-4">
            <div class="team-image"></div>
            <p class="icon-c text_black">Ali Alshehri</p>
            <p>Position (Job title)</p>
        </div>
        <div class="col-sm-4">
            <div class="team-image"></div>
            <p class="icon-c text_black">Ali Alshehri</p>
            <p>Position (Job title)</p>
        </div>
        <div class="col-sm-4">
            <div class="team-image"></div>
            <p class="icon-c text_black">Ali Alshehri</p>
            <p>Position (Job title)</p>
        </div>
        
    </div>
</div>
<div class="s-100"></div>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-lg-3">
            <div class="s-50"></div>
            <h2 class="text-center">Open Position</h2>
            <div class="container demo">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less fa fa-angle-down fa-2x"></i>
                                    <p class="text_black">UI/UX Designer</p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. 
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="more-less fa fa-angle-down fa-2x"></i>
                                    <p class="text_black">Sales Representative</p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span class="more-less fa fa-angle-down fa-2x"></span>
                                    <p class="text_black">Software Engineer</p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    <i class="more-less fa fa-angle-down fa-2x"></i>
                                    <p class="text_black">Technical Support</p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. 
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <i class="more-less fa fa-angle-down fa-2x"></i>
                                    <p class="text_black">HR Specialist</p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <span class="more-less fa fa-angle-down fa-2x"></span>
                                    <p class="text_black">Front End Developer</p>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. 
                            </div>
                        </div>
                    </div>
                    
                </div><!-- panel-group -->
                
                
            </div><!-- container -->

        </div>
    </div>
</div>

<div class="s-100"></div>
@endsection

@section('scripts')
<script type="text/javascript">
    
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('fa-angle-up fa-angle-down');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);

</script>
@endsection