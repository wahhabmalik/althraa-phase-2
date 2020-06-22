<style type="text/css">
	body {
      width: 100%;
      background-color: #ffffff;
      margin: 0;
      padding: 0;
      -webkit-font-smoothing: antialiased;
      font-family: Georgia, Times, serif
    }
    
    table {
      border-collapse: collapse;
    }
    
    td#logo {
      margin: 0 auto;
      padding: 14px 0;
    }
    
    img {
      border: none;
      display: block;
    }
    
    a.blue-btn {
      display: inline-block;
      margin-bottom: 34px;
      border: 3px solid #3baaff;
      padding: 11px 38px;
      font-size: 12px;
      font-family: arial;
      font-weight: bold;
      color: #3baaff;
      text-decoration: none;
      text-align: center;
    }
    
    a.blue-btn:hover {
      background-color: #3baaff;
      color: #fff;
    }
    
    a.white-btn {
      display: inline-block;
      margin-bottom: 30px;
      border: 3px solid #fff;
      background: transparent;
      padding: 11px 38px;
      font-size: 12px;
      font-family: arial;
      font-weight: bold;
      color: #fff;
      text-decoration: none;
      text-align: center;
    }
    
    a.white-btn:hover {
      background-color: #fff;
      color: #3baaff;
    }
    
    .border-complete {
      border-top: 1px solid #dadada;
      border-left: 1px solid #dadada;
      border-right: 1px solid #dadada;
    }
    
    .border-lr {
      border-left: 1px solid #dadada;
      border-right: 1px solid #dadada;
    }
    
    #banner-txt {
      color: #fff;
      padding: 15px 32px 0px 32px;
      font-family: arial;
      font-size: 13px;
      text-align: center;
    }
    
    h2#our-products {
      font-family: 'Pacifico';
      margin: 23px auto 5px auto;
      font-size: 27px;
      color: #3baaff;
    }
    
    h3.our-products {
      font-family: arial;
      font-size: 16px;
      color: #7c7b7b;
    }
    
    p.our-products {
      text-align: center;
      font-family: arial;
      color: #7c7b7b;
      font-size: 12px;
      padding: 10px 10px 24px 10px;
    }
    
    h2.special {
      margin: 0;
      color: #fff;
      color: #fff;
      font-family: 'Pacifico';
      padding: 15px 32px 0px 32px;
    }
    
    p.special {
      color: #fff;
      font-size: 12px;
      color: #fff;
      text-align: center;
      font-family: arial;
      padding: 0px 32px 10px 32px;
    }
    
    h2#coupons {
      color: #3baaff;
      text-align: center;
      font-family: 'Pacifico';
      margin-top: 30px;
    }
    
    p#coupons {
      color: #7c7b7b;
      text-align: center;
      font-size: 12px;
      text-align: center;
      font-family: arial;
      padding: 0 32px;
    }
    
    #socials {
      padding-top: 12px;
    }
    
    p#footer-txt {
      text-align: center;
      color: #303032;
      font-family: arial;
      font-size: 12px;
      padding: 0 32px;
    }
    
    #social-icons {
      width: 28%;
    }
    
    @media only screen and (max-width: 640px) {
      body[yahoo] .deviceWidth {
        width: 440px!important;
        padding: 0;
      }
      body[yahoo] .center {
        text-align: center!important;
      }
      #social-icons {
        width: 40%;
      }
    }
    
    @media only screen and (max-width: 479px) {
      body[yahoo] .deviceWidth {
        width: 280px!important;
        padding: 0;
      }
      body[yahoo] .center {
        text-align: center!important;
      }
      #social-icons {
        width: 60%;
      }
    }

.download-btn{
  background: #01630a;
  color: white;
  padding: 10px 0;
  font-family: 'Cairo', sans-serif;
  text-decoration: none;
  width: 170px;
}
</style>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" yahoo="fix" style="font-family: Georgia, Times, serif">

  <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">

    <table width="600" height="150" border="0" cellpadding="0" cellspacing="0" align="center" class="border-lr deviceWidth" bgcolor="#ffffff">
      <tr>
        <td align="center">
			   <img src="{{ asset('frontend_assets/img/dokhor.png') }}" style="margin: auto">
			   <h3 id="banner-txt" style="margin: 20px;color: #000000">{{ trans('lang.frontend.slider_heading') }}</h3>
			   
        </td>
      </tr>
      <tr>
        <td align="center">
          
            <table>
              <tbody>
                <tr>
                  <td>
                    <a href="{{ route('download', ['q'=> $data['public_id'], 'en']) }}" style="text-decoration: none;" > 
                      <div class="white-btn" style="background: #01630a;text-decoration: none;color: white;padding: 10px 0;font-size: 14px;width: 170px;text-align: center;height: 20px;line-height: 22px;">
                        Download report in English
                      </div> 
                    </a>
                  </td>
                  <td>
                    <a href="{{ route('download', ['q'=> $data['public_id'], 'ar']) }}" style="color: #ffffff;text-decoration: none;" >
                      <div class="white-btn download-btn" style="background: #01630a;text-decoration: none;color: white;padding: 10px 0;font-size: 14px;width: 170px;text-align: center;height: 20px;line-height: 22px;" style="">
                         حمل التقرير بالعربي
                      </div>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>

        </td>
      </tr>

    </table>

  </table>
  <br>
  <br>
</body>

