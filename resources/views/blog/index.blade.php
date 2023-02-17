@extends('layouts.app')
@section('title','Blog List')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 text-center pt-5">

            <h1 class="display-one mt-5">
                 @lang('lang.my_blog')

            </h1>
            <hr>
            <div class="row">

                <div class="col-12">
                    <p>@lang('lang.reading_title')</p>
                </div>
                <div class="col-12">
                    <a href="{{ route('blog.create') }}" class="btn btn-outline-primary">
                    @lang('lang.add_post')
                    </a>
                </div>

            </div>
            </hr>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            liste des articles
                        </div>
                        <div class="card-body">
                            <ul class="mt-5">
                                
                                @forelse($blogs as $blog)
                                    <li class="mt-3"><a href="{{ route('blog.show', $blog->id) }}"> {{ $blog->title }} </a></li>
                                @empty
                                    <li> aucune article est disponible</li>
                                @endforelse

                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
 




@endsection