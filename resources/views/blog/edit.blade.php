@extends('layouts.app')
@section('title', 'ajouter')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 text-center mt-2">
            <h4>mettre a jour un article</h4>
        </div>
    </div>
</div>
<hr>
<div class="row justify-content-center">
    <div class="col-6">
        <div class="card">
            
            <form  method="post">
                 @csrf
                 @method('put')
                <div class="card-header">
                    forumlaire
                </div>
                <div class="card-body">

                    <div class="control-group col-12">
                        <label for="title"> Titre du message</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ $blogPost->title }}">
                    </div>
                    <div class="control-group col-12">
                        <label for="body"> body du message</label>
                        <textarea name="body" id="body" class="form-control">{{$blogPost->body}}</textarea>
                    </div>

                    <!-- <div class="control-group col-12">
                        <label for="category">category</label>
                        <select name="category_id" id="cateogory" class="form-control"></select>
                        @foreach($categories as $category)
                        <option value="{{ category->id }}" {{$category->id $blogPost->category_id 'selected': ''}}>{{ $category->category }}</option>
                        @endforeach
                    </div> -->

                </div>

                <div class= "card-footer">
                    <input type="submit" value="sauvegarder" class="btn btn-success">
                </div>
                
            </form>
        </div>
    </div>

</div>

@endsection