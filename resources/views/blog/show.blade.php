@extends('layouts.app')
@section('title', 'blog')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="{{ route('blog.index') }}" class=" btn-outline-primary">retourner</a>
            <h4 class="display-one mt-2">{{ $blogPost->title }} yo what?</h4>
            <hr>
            <P> {!! $blogPost->body !!} </P>
            <strong> Author {{ $blogPost->blogHasUser->name }}</strong>
            <hr>
        </div>
    </div>

    <div class="row text-center mb-2">
        <div class="col-6">
            <a href="{{route('blog.edit', $blogPost->id)}}" class="btn btn-success">Mettre a jour</a>
 

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Effacer
        </button>

        </div>

    </div>

</div>



<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">effacer un post</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes-vous certain de vouloir effacer cette donnée
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <form action="{{route('blog.edit', $blogPost->id)}}"method="post">
            @csrf
            @method('delete')
                <input type="submit" class="btn btn-danger" value="supprimer">
        </form>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

@endsection