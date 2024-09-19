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
 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
     <div class="container py-5">
         <div class="row g-5">
             @if ($ContactSetting)
                 <div class="col-lg-4 col-md-6">
                     <h4 class="text-dark mb-4">Our Office</h4>
                     @if ($ContactSetting['location'])
                         <p class="mb-2 text-dark"><i class="fa fa-map-marker-alt me-3"></i>{{ $ContactSetting['location'] }}</p>
                     @endif
                     @if ($ContactSetting['phone'])
                         <a class="text-dark" href="tel:{{ $ContactSetting['phone'] ? $ContactSetting['phone'] : '' }}">
                             <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $ContactSetting['phone'] }}</p>
                         </a>
                     @endif
                     @if ($ContactSetting['email'])
                         <a class="text-dark"
                             href="mailto:{{ $ContactSetting['email'] ? $ContactSetting['email'] : '' }}">
                             <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $ContactSetting['email'] }}</p>
                         </a>
                     @endif
                     @if (
                         (isset($social_facebook_url) && isset($social_facebook_url->value)) ||
                             (isset($social_youtube_url) && isset($social_youtube_url->value)) ||
                             (isset($social_linkedin_url) && isset($social_linkedin_url->value)) ||
                             (isset($social_instagram_url) && isset($social_instagram_url->value)))
                         <div class="d-flex pt-2">
                             @if (isset($social_facebook_url) &&
                                     isset($social_facebook_url->value) &&
                                     $social_facebook_url != null &&
                                     $social_facebook_url->value != '')
                                 <a target="_blank" class="btn btn-square btn-outline-dark rounded-circle me-2"
                                     href="{{ $social_facebook_url->value }}"><i class="fab fa-facebook-f"></i></a>
                             @endif
                             @if (isset($social_youtube_url) &&
                                     isset($social_youtube_url->value) &&
                                     $social_youtube_url != null &&
                                     $social_youtube_url->value != '')
                                 <a target="_blank" class="btn btn-square btn-outline-dark rounded-circle me-2"
                                     href="{{ $social_youtube_url->value }}"><i class="fab fa-youtube"></i></a>
                             @endif
                             @if (isset($social_linkedin_url) &&
                                     isset($social_linkedin_url->value) &&
                                     $social_linkedin_url != null &&
                                     $social_linkedin_url->value != '')
                                 <a target="_blank" class="btn btn-square btn-outline-dark rounded-circle me-2"
                                     href="{{ $social_linkedin_url->value }}"><i class="fab fa-linkedin-in"></i></a>
                             @endif

                             @if (isset($social_instagram_url) &&
                                     isset($social_instagram_url->value) &&
                                     $social_instagram_url != null &&
                                     $social_instagram_url->value != '')
                                 <a target="_blank" class="btn
                                     btn-square btn-outline-dark rounded-circle me-2"
                                     href="{{ $social_instagram_url->value }}"><i class="fab fa-instagram"></i></a>
                             @endif

                         </div>
                     @endif

                 </div>
             @endif
             @if (isset($Category) && !$Category->isEmpty())
                 <div class="col-lg-4 col-md-6" id="isotope-project-flters">
                     <h4 class="text-dark mb-4">Category</h4>


                     @if ($current_route_name == 'front.home')
                         @foreach ($Category as $item)
                             <a id="{{ $item->slug }}" data-filter=".{{ $item->slug }}" href="javascript:void(0);"
                                 class="btn btn-link isotope-project-home {{ $item->slug }}-isotope-project-home-class"
                                 href="">{{ $item->name }}</a>
                         @endforeach
                     @else
                         @foreach ($Category as $item)
                             <a href="{{ route('front.home') }}#{{ $item->slug }}" class="btn btn-link"
                                 href="{{ $item->name }}">{{ $item->name }}</a>
                         @endforeach
                     @endif
                 </div>
             @endif
             <div class="col-lg-4 col-md-12">
                 <h4 class="text-dark mb-4">Newsletter</h4>
                 <p class="text-dark">Subscribe to Our Newsletter for Daily Updates</p>
                 <div class="position-relative w-100">
                     <form id="newsletter-form" action="{{ route('front.newsletter.save') }}" method="POST">
                         @csrf
                         <input class="form-control bg-white border-white w-100 py-3 ps-4 footer-nl-input"
                             type="text" id="email" name="email" placeholder="Your email">
                         <button type="submit"
                             class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Subscribe</button>
                         <div id="email_error" class="text-dark w-100"> @error('email')
                                 {{ $message }}
                             @enderror
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Footer End -->


 <!-- Copyright Start -->
 <div class="container-fluid copyright py-4">
     <div class="container">
         <div class="row">
             <div class="col-md-12 text-center mb-3 mb-md-0">
                 &copy; <?php echo date('Y'); ?> <a class="border-bottom"
                     href="{{ route('front.home') }}">{{ env('APP_NAME', 'Laravel App') }}</a>, All Right Reserved.
             </div>
             {{-- <div class="col-md-6 text-center text-md-end">
                 <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                 Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
             </div> --}}
         </div>
     </div>
 </div>
 <!-- Copyright End -->


 <!-- Back to Top -->
 <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
         class="bi bi-arrow-up"></i></a>
