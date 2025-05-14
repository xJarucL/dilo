<title>DILO</title>
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

@auth
    @if(auth()->user()->fk_tipo_usuario == '1')
        <x-nav-admin />
    @elseif(auth()->user()->fk_tipo_usuario == '2')
        <x-nav-normal/>
    @else
        <h1>Error</h1>
    @endif
@endauth
