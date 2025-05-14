<x-nav />
@auth
<body class="contenedor">
    <form method="POST" action="{{ route('guardar_palabra') }}" enctype="multipart/form-data">
        @csrf
        <h1>Ingresar palabra</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Palabra" name="palabra">
            <label for="floatingInput">Palabra</label>
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Subir" name="img_palabra">
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="fk_categoria">
                <option selected disabled>Seleccione una categoría</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->pk_categoria }}">{{ $cat->nom_categoria }}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Seleccione una categoría</label>
        </div>

        <input type="hidden" name="fk_usuario" value="{{ auth()->user()->pk_usuario }}">

        <input type="submit" value="Guardar" class="btn btn_entrar w-100">

    </form>
</body>
@endauth
