
<div class="fondo">
<x-nav />
<link rel="stylesheet" href="{{ asset('css/cards.css') }}">
<!-- <script src="{{ asset('js/texto_voz.js') }}"></script> -->
<div class="contenedor">

    <!-- <x-breadcrumbs :breadcrumbs="$breadcrumbs" /> -->

    @foreach ($palabras_clave as $p)
        <div class="carta noticia" onclick="leerTexto(this)" data-texto="{{ $p->palabra }}">
            <a href="#">
                <div class="imagen-noticia">
                    <img class ="img_noticia" src="{{ asset('storage/' . $p->img_palabra) }}" width="100%">
                </div>
                <div class="titulo-noticia">
                    <label>{{$p->palabra}}</label>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div class="contenedor">

    <div class="carta noticia">
        <a href="{{ route('numeros')}}">
            <div class="imagen-noticia">
                <img class ="img_noticia" src="{{ asset('img/numers.png') }}" width="100%">
            </div>
            <div class="titulo-noticia label_noticia">
                <label>Números</label>
            </div>
        </a>
    </div>

    <div class="carta noticia">
        <a href="{{ route('abecedario')}}">
            <div class="imagen-noticia">
                <img class ="img_noticia" src="{{ asset('img/abecedario.jpg') }}" width="100%">
            </div>
            <div class="titulo-noticia label_noticia">
                <label>Abecedario</label>
            </div>
        </a>
    </div>

    <div class="carta noticia">
        <a href="{{ route('vocales')}}">
            <div class="imagen-noticia">
                <img class ="img_noticia" src="{{ asset('img/vocales.webp') }}" width="100%">
            </div>
            <div class="titulo-noticia label_noticia">
                <label>Vocales</label>
            </div>
        </a>
    </div>

    @foreach ($categorias as $cat)
    <div class="carta noticia">
        <a href="{{ route('palabras_admin', ['id' => $cat->pk_categoria]) }}">
            <div class="imagen-noticia">
                <img class ="img_noticia" src="{{ asset('storage/' . $cat->img_categoria) }}" width="100%">
            </div>
            <div class="titulo-noticia label_noticia">
                <label>{{$cat->nom_categoria}}</label>
            </div>
        </a>
    </div>
    @endforeach

</div>



@auth
    @if(auth()->user()->fk_tipo_usuario == '2')
    <!-- <hr> -->
        <div class="contenedor">

            @foreach ($user_categorias as $cat)
                <div class="carta noticia">
                    <a href="{{ route('palabras', ['id' => $cat->pk_categoria]) }}">
                        <div class="imagen-noticia">
                            <img class ="img_noticia" src="{{ asset('storage/' . $cat->img_categoria) }}" width="100%">
                        </div>
                        <div class="titulo-noticia label_noticia">
                            <label>{{$cat->nom_categoria}}</label>
                        </div>
                    </a>
                </div>
            @endforeach

            <div class="">
                <a href="{{ route('nueva_categoria') }}">
                    <div class="carta-img">
                        <img class ="img_noticia" src="{{ asset('img/añadir_categoria.png') }}" width="100%">
                    </div>
                </a>
            </div>

        </div>
    @endif
@endauth

</div>

