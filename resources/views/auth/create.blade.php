@extends ('layouts.app')
@section('title', 'enregistrer')
@section('content')

<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 pt-4">
                <div class="card">

                    <h3 class="header text-center"> Enregistrer</h3>

                    <div class="card-body text-center">
                        @if(session('success'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>user has been created :)</strong> 
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close" data-bs-dismiss="alert">
                            </button>
                        </div>
        
                        @endif
                        <form action="{{ route('user.store') }}" method="post">
                            @csrf 
                            <div class="form-group mb-3">
                                <input type="text" placeholder="name" name="name" class="form-control" value="{{ old('name')}}">
                                @if($errors->has('name'))
                                <div class="text-danger mt-2">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="email" name="email" class="form-control"  value="{{ old('email') }}">
                                @if($errors->has('email'))
                                <div class="text-danger mt-2">{{$errors->first('email')}}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                <div class="text-danger mt-2">{{$errors->first('password')}}</div>
                                @endif
                            </div>
                            <div class="form-group mb-3 ">
                                <input type="submit" placeholder="name" value="Submit" class="form-control btn btn-success" name="submit">
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</main>

@endsection