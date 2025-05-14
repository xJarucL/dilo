<x-nav />
@auth
<link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
<x-rain />
<body class="contenedor">
    <form method="POST" action="{{ route('guardar_categoria') }}" enctype="multipart/form-data">
        <h1><i class="fa-solid fa-paper-plane" style="color: #6e42f0;"></i> ¡Registrar nueva categoría! <i class="fa-solid fa-pizza-slice" style="color: #ff780a;"></i></h1>
        @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Nombre de la categoría" name="nom_categoria">
            <label for="floatingInput">Nombre de la categoría</label>
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Subir" name="img_categoria">
        </div>

        <input type="hidden" name="fk_usuario" value="{{ auth()->user()->pk_usuario }}">

        <input type="submit" value='Guardar' class="btn btn_entrar w-100">
        <a href="javascript:history.back()" class="btn btn-cancelar w-100">Cancelar</a>
    </form>
</body>
@endauth
