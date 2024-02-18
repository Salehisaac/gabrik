<script>


    $(document).ready(function (){
        var className = '<?php echo e($className); ?>'
        var element = $('.'+className);
        element.on( 'click',function(e){
            e.preventDefault();
            const swalWithBootstrapButtons = Swal.mixin
            ({
                customClass: {
                    confirmButton: 'btn btn-success mx-2',
                    cancelButton: 'btn btn-danger mx-2'
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: 'آیا از حذف کردن داده اطمینان دارید؟',
                text: "داده ی شما دیگر باز گردانده نمیشود",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'بله داده حذف شود',
                cancelButtonText: 'بیخیال',
                reverseButtons: true
            }).then((result) => {

                if (result.value === true)
                {
                    $(this).parent().submit();
                }
                else if(result.dismiss === Swal.DismissReason.cancel)
                {

                    swalWithBootstrapButtons.fire({
                        title: 'لغو درخواست',
                        text: "دیگه مزاحم نشو",
                        icon: 'error',
                        confirmButtonText: 'حله',
                    })
                }
            })
        })
    })
</script>
<?php /**PATH /home/saleh/Desktop/laravel/gabrik/resources/views/admin/alerts/sweet-alert/delete-confirm.blade.php ENDPATH**/ ?>