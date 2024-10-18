<!--===============================================================================================-->
<script src="{{ asset('assets/front/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/front/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/front/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('assets/front/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/front/js/main.js') }}"></script>


{{-- Custom --}}
<script src="{{ asset('custom-assets/front/js/toastr.min.js') }}"></script>

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
