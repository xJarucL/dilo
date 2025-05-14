<x-nav />
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">

<div class="fondo">
    <div class="contenedor">
        @foreach ($abecedario as $a)
            <div class="carta noticia" onclick="leerTexto(this)" data-texto="{{ $a->letra }}">
                <a href="#">
                    <div class="imagen-noticia">
                        <img class ="img_noticia" src="{{ asset('storage/' . $a->img_letra) }}" width="100%">
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

