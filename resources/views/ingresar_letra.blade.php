<x-nav />
@auth
<body class="contenedor">

    <form method="POST" action="{{ route('guardar_letra') }}" enctype="multipart/form-data">
        @csrf
        <h1>Ingresar letra del abecedario</h1>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Numero" name="letra">
            <label for="floatingInput">Letra</label>
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Subir" name="img_letra">
        </div>

        <input type="hidden" name="fk_usuario" value="{{ auth()->user()->pk_usuario }}">

        <input type="submit" value="Guardar" class="btn btn_entrar w-100">

    </form>
</body>
@endauth
