<x-header>
    <x-slot name="titulo">
        {{$titulo}}
    </x-slot>
</x-header>
    <div class="container">
        <h1>Vista Principal</h1>
        {{$mensaje}}
        @isset($mensaje)
            <p>Existe variable 1</p>
        @endisset
        <h3>{{$mensaje}}</h3>
        @if(empty($titulo))
            <p>Variable título vacía</p>
        @else
            <p>{{$titulo}}</p>
        @endif
    </div>
<x-footer>Alejandro Góngora Escalante</x-footer>