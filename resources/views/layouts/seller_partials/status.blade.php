@if ($errors->any())
    @foreach ($errors->all() as $error)
        <li>
            <script>
                toastr.error('{{ $error }}')
            </script>
        </li>
    @endforeach
@endif



@if (session('status'))
    <script>
        toastr.success("{{ session('status') }}")
    </script>
@endif



@if (session('fail'))
    <script>
        toastr.error("{{ session('fail') }}")
    </script>
@endif
