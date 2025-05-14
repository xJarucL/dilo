<x-nav />
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">

<div class="fondo">
    <div class="contenedor">
        @foreach ($vocales as $a)
            <div class="carta noticia" onclick="leerTexto(this)" data-texto="{{ $a->vocal }}">
                <a href="#">
                    <div class="imagen-noticia">
                        <img class="img_noticia" src="{{ asset('storage/' . $a->img_vocal) }}" width="100%">
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

