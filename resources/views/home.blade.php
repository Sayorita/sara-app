<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bem-vinde') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1> Últimas notícias </h1>
                <br>
                @if ($noticias->isEmpty())
                    <p>Não há notícias disponíveis no momento.</p>
                @endif
                </div>
            

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row row-cols-2 row-cols-lg-4 g-2 g-lg-">
            @foreach ($noticias as $noticia)
                <div class="col-md4 mb-4">
                    <div class="card" style="width: 18rem;">
                        @if ($noticia->url)
                            <img src="{{ asset($noticia->url)}}" class="card-img-top" alt="{{ $noticia->titulo}}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $noticia->titulo}}</h5>
                            <p class="card-text">{{ $noticia->descricao }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
    </div>

    <x-slot name="footer">
        @include('partials.footer')
    </x-slot>

</x-app-layout>