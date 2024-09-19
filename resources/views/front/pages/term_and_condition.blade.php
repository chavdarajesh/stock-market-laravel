@extends('front.layouts.main')
@section('title', 'Terms and Conditions ')
@section('content')
@php
use App\Models\Admin\ContactSetting;
        $ContactSetting = ContactSetting::get_contact_us_details();
@endphp
    <section class="page-header page-header--bg-two" data-jarallax data-speed="0.3" data-imgPosition="50% -100%">
        <div class="terms_and_conditions page-header__bg jarallax-img"></div><!-- /.page-header-bg -->
        <div class="page-header__overlay"></div><!-- /.page-header-overlay -->
        <div class="container text-center">
            <h2 class="page-header__title">Terms and Conditions  </h2><!-- /.page-title -->
            <ul class="page-header__breadcrumb list-unstyled">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li><span>TERMS AND CONDITIONS  </span></li>
            </ul><!-- /.page-breadcrumb list-unstyled -->
        </div><!-- /.container -->
    </section><!-- /.page-header -->
    <!-- Pricing Start -->
    <section class="accrodion-one">
        <div class="container">
                <div class="section-title  text-center">
                    <h5 class="section-title__tagline">
                        OUR TERMS AND CONDITIONS
                        <svg class="arrow-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55 13">
                            <g clip-path="url(#clip0_324_36194)">
                                <path
                                    d="M10.5406 6.49995L0.700562 12.1799V8.56995L4.29056 6.49995L0.700562 4.42995V0.819946L10.5406 6.49995Z" />
                                <path
                                    d="M25.1706 6.49995L15.3306 12.1799V8.56995L18.9206 6.49995L15.3306 4.42995V0.819946L25.1706 6.49995Z" />
                                <path
                                    d="M39.7906 6.49995L29.9506 12.1799V8.56995L33.5406 6.49995L29.9506 4.42995V0.819946L39.7906 6.49995Z" />
                                <path
                                    d="M54.4206 6.49995L44.5806 12.1799V8.56995L48.1706 6.49995L44.5806 4.42995V0.819946L54.4206 6.49995Z" />
                            </g>
                        </svg>
                    </h5>
                    <h2 class="section-title__title">Read and agree to our terms and conditions for a seamless and secure user experience</h2>
                </div><!-- section-title -->

                <h2><strong>Terms and Conditions</strong></h2>


<p>These terms and conditions outline the rules and regulations for the use of {{ env('APP_NAME', 'Laravel App') }}'s Website, located at {{ env('APP_URL', 'https://example.com/') }}.</p>

<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use {{ env('APP_NAME', 'Laravel App') }} if you do not agree to take all of the terms and conditions stated on this page.</p>

<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company's terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client's needs in respect of provision of the Company's stated services, in accordance with and subject to, prevailing law of in. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>

<h3><strong>Cookies</strong></h3>

<p>We employ the use of cookies. By accessing {{ env('APP_NAME', 'Laravel App') }}, you agreed to use cookies in agreement with the {{ env('APP_NAME', 'Laravel App') }}'s Privacy Policy. </p>

<p>Most interactive websites use cookies to let us retrieve the user's details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>

<h3><strong>License</strong></h3>

<p>Unless otherwise stated, {{ env('APP_NAME', 'Laravel App') }} and/or its licensors own the intellectual property rights for all material on {{ env('APP_NAME', 'Laravel App') }}. All intellectual property rights are reserved. You may access this from {{ env('APP_NAME', 'Laravel App') }} for your own personal use subjected to restrictions set in these terms and conditions.</p>

<p>You must not:</p>
<ul>
    <li>Republish material from {{ env('APP_NAME', 'Laravel App') }}</li>
    <li>Sell, rent or sub-license material from {{ env('APP_NAME', 'Laravel App') }}</li>
    <li>Reproduce, duplicate or copy material from {{ env('APP_NAME', 'Laravel App') }}</li>
    <li>Redistribute content from {{ env('APP_NAME', 'Laravel App') }}</li>
</ul>


<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. {{ env('APP_NAME', 'Laravel App') }} does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of {{ env('APP_NAME', 'Laravel App') }},its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, {{ env('APP_NAME', 'Laravel App') }} shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>

<p>{{ env('APP_NAME', 'Laravel App') }} reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>

<p>You warrant and represent that:</p>

<ul>
    <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>
    <li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>
    <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>
    <li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>
</ul>

<p>You hereby grant {{ env('APP_NAME', 'Laravel App') }} a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>

<h3><strong>Hyperlinking to our Content</strong></h3>

<p>The following organizations may link to our Website without prior written approval:</p>

<ul>
    <li>Government agencies;</li>
    <li>Search engines;</li>
    <li>News organizations;</li>
    <li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>
    <li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>
</ul>

<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party's site.</p>

<p>We may consider and approve other link requests from the following types of organizations:</p>

<ul>
    <li>commonly-known consumer and/or business information sources;</li>
    <li>dot.com community sites;</li>
    <li>associations or other groups representing charities;</li>
    <li>online directory distributors;</li>
    <li>internet portals;</li>
    <li>accounting, law and consulting firms; and</li>
    <li>educational institutions and trade associations.</li>
</ul>

<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of {{ env('APP_NAME', 'Laravel App') }}; and (d) the link is in the context of general resource information.</p>

<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party's site.</p>

<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to {{ env('APP_NAME', 'Laravel App') }}. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>

<p>Approved organizations may hyperlink to our Website as follows:</p>

<ul>
    <li>By use of our corporate name; or</li>
    <li>By use of the uniform resource locator being linked to; or</li>
    <li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party's site.</li>
</ul>

<p>No use of {{ env('APP_NAME', 'Laravel App') }}'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>

<h3><strong>iFrames</strong></h3>

<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>

<h3><strong>Content Liability</strong></h3>

<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>

<h3><strong>Reservation of Rights</strong></h3>

<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it's linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>

<h3><strong>Removal of links from our website</strong></h3>

<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>

<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>

<h3><strong>Disclaimer</strong></h3>

<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>

<ul>
    <li>limit or exclude our or your liability for death or personal injury;</li>
    <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
    <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
    <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
</ul>

<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>

<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
        </div>
    </section>
    <!-- Pricing Start -->
    <!-- CTA Start -->
    {{-- @if(isset($ContactSetting) && isset($ContactSetting->phone) && $ContactSetting && $ContactSetting->phone != null) --}}
    <section class="cta-faq">
        <div class="container">
            <div class="cta-faq__help text-center"
            style="background-image: url({{ asset('custom-assets/front/images/faq/faq-cta.jpg') }});">
                <div class="cta-faq__help__bg"></div>
                <div class="cta-faq__help__icon"><span class="icon-Call"></span></div>
                <h3 class="cta-faq__help__title">Do you Still have Questions?</h3>
                <div class="cta-faq__help__border"></div>
                <p class="cta-faq__help__text">Call Anytime<a href="tel:{{$ContactSetting->phone ? $ContactSetting->phone :''}}">{{$ContactSetting->phone? $ContactSetting->phone:''}}</a></p>
            </div>
        </div>
    </section>
    {{-- @endif --}}
    <!-- CTA End -->

@stop
