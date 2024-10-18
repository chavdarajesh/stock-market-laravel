@extends('front.layouts.main')
@section('title', 'About')
@section('css')
<link href="{{ asset('assets/front/css/about.css') }}" rel="stylesheet">

@stop
@section('content')
<section id="center" class="center_serv">
 <div class="container">
  <div class="row">
     <div class="center_blog_1 text-center clearfix">
		<div class="col-sm-12">
		  <h4 class="head_bg mgt mgb"><span>ABOUT US</span></h4>
		</div>
   </div>
  </div>
 </div>
</section>

<section id="instructor">
 <div class="container">
  <div class="row">
   <div class="instr_1 clearfix">
    <div class="col-sm-6">
	 <div class="instr_1l clearfix">
	  <img src="{{ asset('assets/front/img/16.jpg') }}" alt="abc" class="iw">
	 </div>
	</div>
	<div class="col-sm-6">
	 <div class="instr_1r clearfix">
	  <h3 class="mgt">I'm <span>Lacinia Nunc</span></h3>
	  <h4 class="bold">9 Years of Experience</h4>
	  <span>
	    <i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
		<i class="fa fa-star"></i>
	  </span>
       	<ul class="social-network social-circle">
				<li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
				<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
	</ul>
	    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet.</p>
	 </div>
	 <div class="instr_1r1 clearfix">
	  <div class="col-sm-6 space_left">
	   <div class="instr_1r1i clearfix">
	    <h5><i class="fa fa-map-marker"></i> 454C Integer Nec <br> <span>Ante Dapibus, OZ 12345</span></h5>
	   </div>
	  </div>
	  <div class="col-sm-6 space_left">
	   <div class="instr_1r1i clearfix">
	    <h5><i class="fa fa-phone"></i>  1234567890 <br> <span> 0987654xxx</span> </h5>
	   </div>
	  </div>
	 </div>
	 <div class="instr_1r2 clearfix">
	  <h5><a class="button" href="#">Reply Us</a></h5>
	 </div>
	</div>
   </div>
   <div class="tutor clearfix">
    <div class="col-sm-6">
	 <div class="tutor_l clearfix">
	  <h3 class="head_bg mgt mgb text-center"><span>TRENDING</span></h3>
	  <div class="tutor_l_i clearfix" style="display: none;">
	   <h4 class="bold"><i class="fa fa-circle"></i> Teaching Experience</h4>
	   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam.</p>
	  </div>
	  <div class="tutor_l_i clearfix">
	   <h4 class="bold"> <i class="fa fa-circle"></i> Online Teaching</h4>
	   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam.</p>
	  </div>
	  <div class="tutor_l_i clearfix">
	   <h4 class="bold"><i class="fa fa-circle"></i> Teaching Type</h4>
	   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam.</p>
	  </div>
	  <div class="tutor_l_i clearfix">
	   <h4 class="bold"><i class="fa fa-circle"></i> Limited Fees</h4>
	   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam.</p>
	  </div>
	 </div>
	</div>
	<div class="col-sm-6">
	 <div class="tutor_l clearfix">
	  <h3 class="head_bg mgt mgb text-center"><span>POPULAR</span></h3>
	  <div class="tutor_l_i clearfix" style="display: none;">
	   <h4 class="bold"><i class="fa fa-circle"></i> Teaching Experience</h4>
	   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam.</p>
	  </div>
	  <div class="tutor_l_i clearfix">
	   <h4 class="bold"><i class="fa fa-circle"></i> Online Teaching</h4>
	   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam.</p>
	  </div>
	  <div class="tutor_l_i clearfix">
	   <h4 class="bold"><i class="fa fa-circle"></i> Teaching Type</h4>
	   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam.</p>
	  </div>
	  <div class="tutor_l_i clearfix">
	   <h4 class="bold"><i class="fa fa-circle"></i> Limited Fees</h4>
	   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio.Praesent libero. Sed cursus ante dapibus diam.</p>
	  </div>
	 </div>
	</div>
   </div>
  </div>
 </div>
</section>

<section id="prosp">
 <div class="container">
  <div class="row">
   <div class="Prosp_1 text-center clearfix">
    <div class="col-sm-12">
	 <h4 class="mgt">We Keep Our Promises</h4>
	 <h1 class="bold"><span class="col_1">We Listen,</span> <span class="col_2">You Prosper</span></h1>
	 <p>Objectively integrate enterprise-wide strategic theme areas with functionalized <br> infrastructures, interactively productize premium technologies.</p>
	</div>
   </div>
   <div class="Prosp_2 clearfix">
    <div class="col-sm-4">
	 <div class="Prosp_2i clearfix">
	  <a href="#"><img src="{{ asset('assets/front/img/50.jpg') }}" class="iw" alt="abc"></a>
	  <h4>Plan, then do</h4>
	  <h2>Avantage Services</h2>
	  <p>Avantage Group is all about strategy, we’re here to inform which tactics need funding and which are drains on resources.</p>
	  <h5 class="bold"><a href="#">Find out more</a></h5>
	 </div>
	</div>
	<div class="col-sm-4">
	 <div class="Prosp_2i clearfix">
	  <a href="#"><img src="{{ asset('assets/front/img/45.jpg') }}" class="iw" alt="abc"></a>
	  <h4>Small tactics</h4>
	  <h2>Our Approach</h2>
	  <p>Avantage Group is all about strategy, we’re here to inform which tactics need funding and which are drains on resources.</p>
	  <h5 class="bold"><a href="#">Find out more</a></h5>
	 </div>
	</div>
	<div class="col-sm-4">
	 <div class="Prosp_2i clearfix">
	  <a href="#"><img src="{{ asset('assets/front/img/48.jpg') }}" class="iw" alt="abc"></a>
	  <h4>Proof, not promises</h4>
	  <h2>Avantage Results</h2>
	  <p>Avantage Group is all about strategy, we’re here to inform which tactics need funding and which are drains on resources.</p>
	  <h5 class="bold"><a href="#">Find out more</a></h5>
	 </div>
	</div>
   </div>
  </div>
 </div>
</section>
@stop
