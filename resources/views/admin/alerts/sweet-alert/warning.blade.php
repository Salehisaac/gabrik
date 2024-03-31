@if(session('swal-warning'))
    <script>
        $(document).ready(function (){
            Swal.fire({
                title: 'با موفقیت انجام شد!',
                text:'{{session('swal-warning')}}',
                icon:'warning',
                confirmButtonText:'باشه',
            });
        });
    </script>
@endif
