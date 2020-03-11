@extends('dashboard.layouts..user_layout.user_dashboard')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rickshaw/1.6.6/rickshaw.css">
<style>

/* Stacked */

canvas{
  background:#fff;
  height:240px;
}

.total_graph span {
    font-size: 20px;
    font-family: Soin Sans Neue;
    color: #989898;
}

.graph_price{
  float: right;
  color: #000 !important;
}

.graph_inner {
    text-align: center;
    position: relative;
    top: -140px;
}
p.inner_price {
    font-size: 22px;
    color: #222222;
    margin-bottom: 0;
}
.table_color{
  height: 20px;
    width: 5px;
    border-radius: 5px;
}
tbody tr:nth-child(1) td {
    border-top: 0px;
}
.table td{
    padding-bottom: 0;
}


.user__profile_image{
  background-size: cover;
  background-position: center;
  max-height: 250px;
  height: 255px;
  width: 100%;
  overflow: hidden;
}

.normaluser_profile_image{
  display: block;
  margin: auto;
}


.logo_input {
    vertical-align: middle;
    max-width: 180px;
}

.form-control{
  font-size: 1.4rem;
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

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}
</style>
@endsection


@section('content')
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="user__intro">User</h2>
        <p>Profile</p>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('update_user', app()->getLocale()) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-4">
              <a class="btn btn-block mt-2 mb-2" id="#profile_image_button" onclick="openFileInput();" style="cursor: pointer;">Click to Upload New</a>
              <input type="file" id="profile_image_input" name="profile_image" style="display: none;">
              
              <div class="user__profile_image img-responsive">
                <img class="img img-fluid normaluser_profile_image" src="{{ (isset($user->profile_image)) ? asset($user->profile_image) : asset('backend_assets/user_uploads/default.png') }}" id="prev-profile-image">
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
            <div class="col-md-8">
              <div class="row">
                <div class="col-sm-12">
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

                <div class="col-sm-12">
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

                <div class="col-sm-12">
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
    </div>
  </div>
</div>
@endsection




@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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

////////////////////////////////////
var ctx = document.getElementById("myChart4").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
  datasets: [{
    label: 'Saving',
    backgroundColor: "#FF903B",
    data: [10],
  }, {
    label: 'Spending',
    backgroundColor: "#3B83FF",
    data: [90],
  }],
},
options: {
    tooltips: {
      displayColors: true,
      callbacks:{
        mode: 'x',
      },
    },
    scales: {
    ticks: {
          display: false
      },
      xAxes: [{
        stacked: true,
        ticks: {
            display: false
        },
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        stacked: true,
        ticks: {
          display: false,
        },
        gridLines: {
          display: false,
        },
        type: 'linear',
      }]
    },
    responsive: true,
    maintainAspectRatio: false,
    legend: { position: 'bottom' },
  }
});


////////////////////////////////////
var ctx = document.getElementById("myChart3").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
  datasets: [{
    label: 'Saving',
    backgroundColor: "#FF903B",
    data: [40],
  }, {
    label: 'Spending',
    backgroundColor: "#3B83FF",
    data: [60],
  }],
},
options: {
    tooltips: {
      displayColors: true,
      callbacks:{
        mode: 'x',
      },
    },
    scales: {
    ticks: {
          display: false
      },
      xAxes: [{
        stacked: true,
        ticks: {
            display: false
        },
        gridLines: {
          display: false,
        }
      }],
      yAxes: [{
        stacked: true,
        ticks: {
          display: false,
        },
        gridLines: {
          display: false,
        },
        type: 'linear',
      }]
    },
    responsive: true,
    maintainAspectRatio: false,
    legend: { position: 'bottom' },
  }
});



////////////////////////////////////
var ctx = document.getElementById("myChart1");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    //labels: ['Cash', 'Investments', 'Retirement', 'Personal'],
    datasets: [{
      label: '# of Tomatoes',
      data: [12, 5, 3, 2],
      backgroundColor: [
        '#4F2CFF',
        '#3B83FF',
        '#FFE700',
        '#2CD9C5'
      ],
      borderColor: [
        '#4F2CFF',
        '#3B83FF',
        '#FFE700',
        '#2CD9C5'
      ],
      borderWidth: 1
    }]
  },
  options: {
    cutoutPercentage: 60,
    responsive: true,

  }
});


////////////////////////////////////
var ctx = document.getElementById("myChart2");
var myChart = new Chart(ctx, {
  type: 'pie',
  data: {
    //labels: ['Cash', 'Investments', 'Retirement', 'Personal'],
    datasets: [{
      label: '# of Tomatoes',
      data: [5, 40],
      backgroundColor: [
        '#ED410D',
        '#FF903B'
      ],
      borderColor: [
        '#ED410D',
        '#FF903B'
      ],
      borderWidth: 1
    }]
  },
  options: {
    cutoutPercentage: 60,
    responsive: true,

  }
});


</script>

@endsection