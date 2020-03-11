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
                <p class="login_link text-center primary-link">HELP</p>
                <h1 class="text-center page-heading">Do you have any<br>questions for us?</h1>
                <div class="s-20"></div>
            </div>
        </div>
    </div>
</div>

<div class="s-100"></div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 offset-lg-2">
            <div class="s-35"></div>
            <h1 class="text-center">Frequently Asked Questions</h1>
            <div class="empty_box_middle"></div>
        </div>
        <div class="col-sm-5">
            
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


<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="origin_box space-bottom">
                <div style="display: flex">
                    <div class="ico_box">
                        <img src="{{ asset('frontend_assets/img/icons/help_icon_1.png') }}">
                    </div>
                    <p>Have question you didn't fond ?<br>Contact Us</p>
                </div>
                <br>
                <div style="display:flex">
                    <div style="width: 80%">
                        <a href="{{ route('contact',app()->getlocale()) }}"><p class="text_secondary">Contact Us</p></a>
                    </div>
                    <div style="widows: 20%">
                        <i class="fa fa-long-arrow-right fa-2x text_secondary"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <div class="origin_box space-bottom">
                <div style="display: flex">
                    <div class="ico_box">
                        <img src="{{ asset('frontend_assets/img/icons/help_icon_2.png') }}">
                    </div>
                    <p>Are you ready but worried about<br>Legal Stuff ?</p>
                </div>
                <br>
                <div style="display:flex">
                    <div style="width: 80%">
                        <a href="{{ route('legal',app()->getlocale()) }}"><p class="text_secondary">Legal</p></a>
                    </div>
                    <div style="widows: 20%">
                        <i class="fa fa-long-arrow-right fa-2x text_secondary"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <div class="origin_box space-bottom">
                <div style="display: flex">
                    <div class="ico_box">
                        <img src="{{ asset('frontend_assets/img/icons/help_icon_3.png') }}">
                    </div>
                    <p>Do you want to find out more<br>About pricing ?</p>
                </div>
                <br>
                <div style="display:flex">
                    <div style="width: 80%">
                        <a href="{{ route('pricing',app()->getlocale()) }}"><p class="text_secondary">Pricing</p></a>
                    </div>
                    <div style="widows: 20%">
                        <i class="fa fa-long-arrow-right fa-2x text_secondary"></i>
                    </div>
                </div>
            </div>
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