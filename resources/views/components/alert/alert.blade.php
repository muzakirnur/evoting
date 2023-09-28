@if (session()->has('success'))
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    Toast.fire({
        icon: 'success',
        title: "{{session('success')}}"
    })
})
</script>
@endif
@if (session()->has('error'))
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    Toast.fire({
        icon: 'warning',
        title: "{{session('error')}}"
    })
})
</script>
@endif