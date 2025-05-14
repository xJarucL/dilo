<x-nav />
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">

<div class="fondo">
    <div class="contenedor">
        <x-breadcrumbs :breadcrumbs="$breadcrumbs" />
    </div>

    <div class="contenedor">

        @foreach ($palabras as $p)
        <div class="carta noticia" onclick="leerTexto(this)" data-texto="{{ $p->palabra }}">
            <a href="#">
                <div class="imagen-noticia">
                    <img class ="img_noticia" src="{{ asset('storage/' . $p->img_palabra) }}" width="100%">
                </div>
                <div class="titulo-noticia label_noticia">
                    <label>{{$p->palabra}}</label>
                </div>
            </a>
        </div>
        @endforeach

    </div>
</div>

