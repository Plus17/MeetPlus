@if(! $errors->isEmpty())
    <div class="alert alert-danger" role="alert">
        <strong>Oops!</strong> Hubo algunos errores! <br><br>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
