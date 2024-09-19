<!-- JavaScript Libraries -->
<script src="{{ asset('assets/front/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/front/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('assets/front/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/front/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/front/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/front/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('assets/front/lib/parallax/parallax.min.js') }}"></script>
<script src="{{ asset('assets/front/lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/front/lib/lightbox/js/lightbox.min.js') }}"></script>

<script src="{{ asset('assets/front/js/jquery.validate.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/front/js/main.js') }}"></script>

{{-- Custom --}}
<script src="{{ asset('custom-assets/front/js/toastr.min.js') }}"></script>

<script>
    @if (Session::has('message'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "preventDuplicates": false
        }
        toastr.success("{{ session('message') }}");
    @endif

    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "preventDuplicates": false
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "preventDuplicates": false
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
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
        $('#newsletter-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {

                email: {
                    required: 'This field is required',
                    email: 'Enter a valid email',
                }
            },
            errorPlacement: function(error, element) {
                error.addClass('text-white');
                $('#' + element.attr('name') + '_error').html(error)
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('border border-danger');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('border border-danger');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

<script>
    // Disable right-click context menu
    document.addEventListener('contextmenu', function(event) {
        event.preventDefault();
        alert("Copyrights {{env('APP_NAME', 'Laravel App')}}!");
    });

    // Disable common keyboard shortcuts for developer tools
    document.addEventListener('keydown', function(event) {
        if (
            event.key === 'F12' || // Disable F12
            (event.ctrlKey && event.shiftKey && event.key === 'I') || // Disable Ctrl + Shift + I
            (event.ctrlKey && event.shiftKey && event.key === 'J') || // Disable Ctrl + Shift + J
            (event.ctrlKey && event.key === 'U') // Disable Ctrl + U (View Source)
        ) {
            alert("Copyrights {{env('APP_NAME', 'Laravel App')}}!");
            event.preventDefault();
        }
    });


</script>
