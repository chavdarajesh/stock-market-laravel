 <!-- ======= Footer ======= -->
 @php $current_route_name=Route::currentRouteName() @endphp
 @php
 use App\Models\Admin\ContactSetting;
 $ContactSetting = ContactSetting::get_contact_us_details();
 use App\Models\SiteSetting;
 $social_facebook_url = SiteSetting::getSiteSettings('social_facebook_url');
 $social_linkedin_url = SiteSetting::getSiteSettings('social_linkedin_url');
 $social_instagram_url = SiteSetting::getSiteSettings('social_instagram_url');
 $social_youtube_url = SiteSetting::getSiteSettings('social_youtube_url');
 $footerLogo = SiteSetting::getSiteSettings('footer_logo');
 use App\Models\Category;
 $Category = Category::getCategory();
 @endphp


 <!-- Footer -->
 <footer>
     <div class="bg2 p-t-40 p-b-25">
         <div class="container">
             <div class="row">
                 <div class="col-lg-4 p-b-20">
                     <div class="size-h-3 flex-s-c">
                         <a href="index.html">
                             <img class="max-s-full" src="{{ asset('assets/front/images/icons/logo-02.png') }}" alt="LOGO">
                         </a>
                     </div>

                     <div>
                         <p class="f1-s-1 cl11 p-b-16">
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor magna eget
                             elit efficitur, at accumsan sem placerat. Nulla tellus libero, mattis nec molestie at,
                             facilisis ut turpis. Vestibulum dolor metus, tincidunt eget odio
                         </p>

                         <p class="f1-s-1 cl11 p-b-16">
                             Any questions? Call us on (+1) 96 716 6879
                         </p>


                     </div>
                 </div>

                 <div class="col-sm-6 col-lg-4 p-b-20">
                     <!-- <div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Popular Posts
							</h5>
						</div>

						<ul>
							<li class="flex-wr-sb-s p-b-20">
								<a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="{{ asset('assets/front/images/popular-post-01.jpg" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
											Donec metus orci, malesuada et lectus vitae
										</a>
									</h6>

									<span class="f1-s-3 cl6">
										Feb 17
									</span>
								</div>
							</li>

							<li class="flex-wr-sb-s p-b-20">
								<a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="{{ asset('assets/front/images/popular-post-02.jpg" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
											Lorem ipsum dolor sit amet, consectetur
										</a>
									</h6>

									<span class="f1-s-3 cl6">
										Feb 16
									</span>
								</div>
							</li>

							<li class="flex-wr-sb-s p-b-20">
								<a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="{{ asset('assets/front/images/popular-post-03.jpg" alt="IMG">
								</a>

								<div class="size-w-5">
									<h6 class="p-b-5">
										<a href="#" class="f1-s-5 cl11 hov-cl10 trans-03">
											Suspendisse dictum enim quis imperdiet auctor
										</a>
									</h6>

									<span class="f1-s-3 cl6">
										Feb 15
									</span>
								</div>
							</li>
						</ul> -->
                 </div>

                 <div class="col-sm-6 col-lg-4 p-b-20">
                     <!-- <div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Contact Us
							</h5>
						</div> -->

                     <ul class="m-t--12 pt-4">
                         <li class="how-bor1 p-rl-5 p-tb-10">
                             <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                 Email : test@gmail.com
                             </a>
                         </li>

                         <li class="how-bor1 p-rl-5 p-tb-10">
                             <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                 Contact : 88888888888
                             </a>
                         </li>

                         <li class="how-bor1 p-rl-5 p-tb-10">
                             <a href="#" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                 Address : Street Style 122545
                             </a>
                         </li>

                         <div class="mt-3">
                             <h5 class="f1-m-7 cl0">
                                 Follow Us
                             </h5>
                         </div>
                         <div class="p-t-15">
                             <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-facebook-f"></span>
                             </a>

                             <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-twitter"></span>
                             </a>

                             <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-pinterest-p"></span>
                             </a>

                             <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-vimeo-v"></span>
                             </a>

                             <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-youtube"></span>
                             </a>
                         </div>

                     </ul>
                 </div>
             </div>
         </div>
     </div>
     <section class="bg2 ">
         <div class="b-section-marquee-box cl11">
             <h2 class="marquee-text cl11">we are not sebi registered disclaimer •</h2>
             <h2 class="marquee-text cl11">we are not sebi registered disclaimer •</h2>
             <h2 class="marquee-text cl11">we are not sebi registered disclaimer •</h2>
             <h2 class="marquee-text cl11">we are not sebi registered disclaimer •</h2>
         </div>
     </section>

     <div class="bg11">
         <div class="container size-h-4 flex-c-c p-tb-15">
             <span class="f1-s-1 cl0 txt-center">
                 Copyright &copy;
                 <script>
                     document.write(new Date().getFullYear());
                 </script>

                 All rights reserved | This template is made with

                 <i class="fa fa-heart" aria-hidden="true"></i> by

                 <a href="https://colorlib.com" target="_blank">Colorlib</a>
                 <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
             </span>
         </div>
     </div>
 </footer>
 <!-- Back to top -->
 <div class="btn-back-to-top" id="myBtn">
     <span class="symbol-btn-back-to-top">
         <span class="fas fa-angle-up"></span>
     </span>
 </div>
