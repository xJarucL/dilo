<x-nav />
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">
<div class="fondo">
    <div class="contenedor">
        @foreach ($numeros as $n)
            <div class="carta noticia" onclick="leerTexto(this)" data-texto="{{ $n->numero }}">
                <a href="#">
                    <div class="imagen-noticia">
                        <img class ="img_noticia" src="{{ asset('storage/' . $n->img_numero) }}" width="100%">
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
