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

        @auth
            @if(auth()->user()->fk_tipo_usuario == '2')
                <div class="">
                    <a href="{{ route('nueva_palabra_usuario', ['id' => $pk_categoria]) }}">
                        <div class="carta-img">
                            <img class ="img_noticia" src="{{ asset('img/añadir_categoria.png') }}" width="100%">
                        </div>
                    </a>
                </div>
            @endif
        @endauth

    </div>
</div>

