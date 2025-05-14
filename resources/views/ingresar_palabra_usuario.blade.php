<x-nav />
@auth
<link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
<x-rain />
<body class="contenedor">
    <form method="POST" action="{{ route('guardar_palabra') }}" enctype="multipart/form-data">
        @csrf
        <h1>Ingresar palabra <i class="fa-solid fa-feather-pointed" style="color: #755bc2;"></i></h1>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Palabra" name="palabra">
            <label for="floatingInput">Palabra</label>
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Subir" name="img_palabra">
        </div>

        <input type="hidden" name="fk_categoria" value="{{ $id }}">

        <input type="hidden" name="fk_usuario" value="{{ auth()->user()->pk_usuario }}">

        <input type="submit" value="Guardar" class="btn btn_entrar w-100">
        <a href="javascript:history.back()" class="btn btn-cancelar w-100">Cancelar</a>
    </form>
</body>
@endauth
