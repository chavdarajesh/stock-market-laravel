 <!-- ======= Footer ======= -->
 @php $current_route_name=Route::currentRouteName() @endphp
 @php

 use App\Models\Admin\ContactSetting;
 $ContactSetting = ContactSetting::get_contact_us_details();

 use App\Models\SiteSetting;

 $about_site_footer = SiteSetting::getSiteSettings('about_site_footer');

 $social_twitter_url = SiteSetting::getSiteSettings('social_twitter_url');
 $social_facebook_url = SiteSetting::getSiteSettings('social_facebook_url');
 $social_linkedin_url = SiteSetting::getSiteSettings('social_linkedin_url');
 $social_instagram_url = SiteSetting::getSiteSettings('social_instagram_url');
 $social_youtube_url = SiteSetting::getSiteSettings('social_youtube_url');

 $footerLogo = SiteSetting::getSiteSettings('footer_logo');

 @endphp


 <!-- Footer -->
 <footer>
     <div class="bg2 p-t-40 p-b-25">
         <div class="container">
             <div class="d-flex justify-content-between row">
                 <div class="col-lg-4 p-b-20">
                     <div class="size-h-3 flex-s-c">
                         <a href="{{ route('front.home') }}">
                             <img class="max-s-full" src="{{ isset($footerLogo) && isset($footerLogo->value) && $footerLogo != null && $footerLogo->value != '' ? asset($footerLogo->value) : asset('custom-assets/default/admin/images/siteimages/logo/footer-logo.png') }}" alt="LOGO">
                         </a>
                     </div>
                     @if(isset($about_site_footer) &&
                     isset($about_site_footer->value) &&
                     $about_site_footer != null &&
                     $about_site_footer->value != '')
                     <div>
                         <p class="f1-s-1 cl11 p-b-16">
                             {{$about_site_footer->value}}
                         </p>
                     </div>
                     @endif
                 </div>

                 <div class="col-sm-6 col-lg-4 p-b-20 d-none">
                     <!-- <div class="size-h-3 flex-s-c">
							<h5 class="f1-m-7 cl0">
								Popular Posts
							</h5>
						</div>

						<ul>
							<li class="flex-wr-sb-s p-b-20">
								<a href="#" class="size-w-4 wrap-pic-w hov1 trans-03">
									<img src="{{ asset('assets/front/images/popular-post-01.jpg') }}" alt="IMG">
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
									<img src="{{ asset('assets/front/images/popular-post-02.jpg') }}" alt="IMG">
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
									<img src="{{ asset('assets/front/images/popular-post-03.jpg') }}" alt="IMG">
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
                         @if($ContactSetting ['email'])
                         <li class="how-bor1 p-rl-5 p-tb-10">
                             <a target="_blank" href="mailto:{{ $ContactSetting['email'] ? $ContactSetting['email'] : '' }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                 Email : {{$ContactSetting ['email']}}
                             </a>
                         </li>
                         @endif
                         @if($ContactSetting ['phone'])

                         <li class="how-bor1 p-rl-5 p-tb-10">
                             <a target="_blank" href="tel:{{ $ContactSetting['phone'] ? $ContactSetting['phone'] : '' }}" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                 Contact : {{$ContactSetting ['phone']}}
                             </a>
                         </li>
                         @endif
                         @if($ContactSetting ['location'])

                         <li class="how-bor1 p-rl-5 p-tb-10">
                             <a href="javascrip:void(0);" class="f1-s-5 cl11 hov-cl10 trans-03 p-tb-8">
                                 Address : {{$ContactSetting ['location']}}
                             </a>
                         </li>
                         @endif

                         @if (
                         (isset($social_facebook_url) && isset($social_facebook_url->value)) ||
                         (isset($social_youtube_url) && isset($social_youtube_url->value)) ||
                         (isset($social_linkedin_url) && isset($social_linkedin_url->value)) ||
                         (isset($social_twitter_url) && isset($social_twitter_url->value)) ||
                         (isset($social_instagram_url) && isset($social_instagram_url->value)))
                         <div class="mt-3">
                             <h5 class="f1-m-7 cl0">
                                 Follow Us
                             </h5>
                         </div>
                         <div class="p-t-15">
                             @if (isset($social_facebook_url) &&
                             isset($social_facebook_url->value) &&
                             $social_facebook_url != null &&
                             $social_facebook_url->value != '')
                             <a target="_blank"
                                 href="{{ isset($social_facebook_url) && isset($social_facebook_url->value) && $social_facebook_url != null && $social_facebook_url->value != '' ? $social_facebook_url->value : 'javascript:void(0);' }}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-facebook-f"></span>
                             </a>
                             @endif
                             @if (isset($social_twitter_url) &&
                             isset($social_twitter_url->value) &&
                             $social_twitter_url != null &&
                             $social_twitter_url->value != '')
                             <a target="_blank"
                                 href="{{ isset($social_twitter_url) && isset($social_twitter_url->value) && $social_twitter_url != null && $social_twitter_url->value != '' ? $social_twitter_url->value : 'javascript:void(0);' }}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-twitter"></span>
                             </a>
                             @endif
                             @if (isset($social_linkedin_url) &&
                             isset($social_linkedin_url->value) &&
                             $social_linkedin_url != null &&
                             $social_linkedin_url->value != '')
                             <a target="_blank"
                                 href="{{ isset($social_linkedin_url) && isset($social_linkedin_url->value) && $social_linkedin_url != null && $social_linkedin_url->value != '' ? $social_linkedin_url->value : 'javascript:void(0);' }}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-linkedin"></span>
                             </a>
                             @endif
                             @if (isset($social_instagram_url) &&
                             isset($social_instagram_url->value) &&
                             $social_instagram_url != null &&
                             $social_instagram_url->value != '')

                             <a target="_blank"
                                 href="{{ isset($social_instagram_url) && isset($social_instagram_url->value) && $social_instagram_url != null && $social_instagram_url->value != '' ? $social_instagram_url->value : 'javascript:void(0);' }}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-instagram"></span>
                             </a>
                             @endif
                             @if (isset($social_youtube_url) &&
                             isset($social_youtube_url->value) &&
                             $social_youtube_url != null &&
                             $social_youtube_url->value != '')

                             <a target="_blank"
                                 href="{{ isset($social_youtube_url) && isset($social_youtube_url->value) && $social_youtube_url != null && $social_youtube_url->value != '' ? $social_youtube_url->value : 'javascript:void(0);' }}" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                                 <span class="fab fa-youtube"></span>
                             </a>
                             @endif
                         </div>
                         @endif

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
                 <?php echo date('Y'); ?> All rights reserved | <a href="{{ route('front.home') }}"> {{ env('APP_NAME', 'Laravel App') }}</a>
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

 <div id="google_translate_element"></div>
