
<script src="{{ asset('admin-assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="{{ asset('admin-assets/js/grid.js') }}"></script>
<script src="{{ asset('admin-assets/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('admin-assets/sweetalert/sweetalert2.min.js') }}"></script>

<script>
    let notificationDropDown = document.getElementById('header-notification-toggle');
    notificationDropDown.addEventListener('click', function () {
        $.ajax({
            type : "POST",
            url : ' /admin/notification/read-all' ,
            data : {_token: "{{ csrf_token() }}" },
            success : function(){
                console.log('success');
            }
        })
    })
</script>
