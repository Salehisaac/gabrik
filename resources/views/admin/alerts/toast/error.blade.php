@if(session('toast-error'))

    <section class="toast" data-delay="5000">
        <section class="toast-body py-3 d-flex bg-danger text-white">
            <strong class="ml-auto">{{session('toast-error')}}</strong>

            <button type="button" class="btn-close me-3" data-bs-dismiss="toast" aria-label="Close"></button>

        </section>
    </section>

    <script>
        $(document).ready(function(){
            $('.toast').toast('show');
        })
    </script>
@endif
