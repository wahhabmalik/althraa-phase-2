<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="{{ asset('backend_assets/dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend_assets/dashboard/js/script.js') }}"></script>

{{-- Fontawesome 5 --}}
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- Toastr -->
<script src="{{ asset('backend_assets/site_assets/js/toastr/toastr.min.js') }}"></script>

<script type="text/javascript">
    toastr.options = {
        closeButton: true,
        progressBar: true,
        debug: false,
        positionClass: 'toast-bottom-right',
        showMethod: 'slideDown',
        timeOut: 5000
    };
</script>