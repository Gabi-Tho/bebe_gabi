@extends('layouts.app')
@section('content')
@section('title', 'accueil')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5">
                    {{ config('app.name') }}
                </h1>
                <p>
                Frogs and other amphibians are under pressure. Nearly one-third of the world’s amphibians are threatened or extinct, according to a report from the International Union for the Conservation of Nature (IUCN). Habitat loss is perhaps the biggest contributor to these declines. The spread of a fungus called chytrid (Batrachochytrium dendrobatidis) has also taken a toll, leading to the catastrophic decline or extinction of at least 200 species. At our request, the amphibian specialists at the IUCN put together a list of five frogs that face the greatest risk of extinction. You can catch a glimpse of one of these rare animals, the Titicaca Water Frog, in the upcoming Nature episode Fabulous Frogs.
                </p>
                <a href="{{ route('blog.index') }}" class="btn btn-outline-primary">
                    afficher le blog
                </a>
            </div>
        </div>

    </div>
@endsection