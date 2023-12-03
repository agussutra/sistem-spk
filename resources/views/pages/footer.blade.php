<div class="mt-[500px]">
    <footer
        class="flex items-end justify-between mt-auto p-4 bg-white border-t dark:bg-darker dark:border-primary-darker">
        <div> Copyright &copy; 2023. <span class="text-blue-600 font-bold">SISTEM PENDUKUNG
                KEPUTUSAN.</span>
        </div>
    </footer>
</div>
</div>
</div>
</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
    integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
<script src="build/js/script.js"></script>
<script>
    const setup = () => {
        return {
            loading: true,
        }
    }
</script>
@if(session()->has('error'))
<script>

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    Toast.fire({
        icon: "error",
        title: "{{session()->get('error')}}"
    });

</script>
@endif
@if(session()->has('success'))
<script>

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    Toast.fire({
        icon: "success",
        title: "{{session()->get('success')}}"
    });

</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stack('js')
</body>

</html>
