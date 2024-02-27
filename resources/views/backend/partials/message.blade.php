@if (session()->has('alert'))
    <div class="card bg-{{ session('alert') }} text-white p-3 text-capitalize" id="alert">
        {{ session('message') }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.getElementById('alert').style.display = 'none';
            }, 4000);
        });
    </script>
@endif
