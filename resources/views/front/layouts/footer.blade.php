<!--===============================================================================================-->
<script src="{{ asset('assets/front/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/front/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/front/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('assets/front/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/front/js/main.js') }}"></script>

<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement(
      {pageLanguage: 'en', includedLanguages: 'en,hi'},
      'google_translate_element'
    );
  }
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
{{-- Custom --}}
<script src="{{ asset('custom-assets/default/front/js/toastr.min.js') }}"></script>

<script>
    @if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "preventDuplicates": false
    }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "preventDuplicates": false
    }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "preventDuplicates": false
    }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "preventDuplicates": false
    }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>
@yield('js')


<script>
    $(document).ready(function() {
        // Add smooth scrolling to all links with class 'scroll'
        $(".scroll").on('click', function(event) {
            event.preventDefault(); // Prevent default anchor click behavior

            var target = this.hash;
            if (target) {
                $('html, body').animate({
                    scrollTop: $(target).offset().top -50
                }, 1000); // Time in milliseconds for the animation (1 second)
            }
        });
    });

    $(document).ready(function() {
        // $('#newsletter-form').validate({
        //     rules: {
        //         email: {
        //             required: true,
        //             email: true
        //         }
        //     },
        //     messages: {

        //         email: {
        //             required: 'This field is required',
        //             email: 'Enter a valid email',
        //         }
        //     },
        //     errorPlacement: function(error, element) {
        //         error.addClass('text-white');
        //         $('#' + element.attr('name') + '_error').html(error)
        //     },
        //     highlight: function(element, errorClass, validClass) {
        //         $(element).addClass('border border-danger');
        //     },
        //     unhighlight: function(element, errorClass, validClass) {
        //         $(element).removeClass('border border-danger');
        //     },
        //     submitHandler: function(form) {
        //         form.submit();
        //     }
        // });
    });
</script>
