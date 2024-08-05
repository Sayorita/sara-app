<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<x-app-layout title="Resultado da busca">
    @if ($noticias->isNotEmpty())
     <h2>Resultados da busca para "{{request('query')}}"</h2>

        @if ($noticias->count())

            <div class="container">
                <table class="table table-bordered mt-2">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                    </tr>
                    @foreach ($noticias as $noticia)
                        <tr>
                            <td>{{ $noticia->id }}</td>
                            <td>{{ $noticia->titulo }}</td>
                            <td>{{ $noticia->descricao }}</td>
                            <td><a href="{{ $noticia->url}}" target="_blank">{{ $noticia->url }}</a></td>
                            <td>
                                <a class="btn btn-info" href="{{ route('noticias.show', $noticia->id)}}">Ver</a>
                                <a class="btn btn-primary" href="{{ route('noticias.edit', $noticia->id)}}">Editar</a>
                                <form action="{{ route('noticias.destroy', $noticia->id)}}" method="POST">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
          @else
           <h3>Nenhum resultado encontrado para "{{request('query')}}"</h3>
        @endif
        </div>
    @endif
</x-app-layout>