<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('backend_assets/admin_dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend_assets/admin_dashboard/js/script.js') }}"></script>
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

{{-- messages --}}
@if(session("successToastr"))
<script type="text/javascript">
  toastr.success("{{ session("successToastr") }}");
</script>
@endif
@if(session("errorToastr"))
<script type="text/javascript">
  toastr.error("{{ session("errorToastr") }}");
</script>
@endif
@if(session("warningToastr"))
<script type="text/javascript">
  toastr.warning("{{ session("warningToastr") }}");
</script>
@endif
@if(session("infoToastr"))
<script type="text/javascript">
  toastr.info("{{ session("infoToastr") }}");
</script>
@endif