@extends('template.main')

@section('content')
    
          <div class="text-center">
            <img src="{{asset('assets/img/error.svg')}}" style="max-height: 100px;" class="mb-3">
            <h3 class="text-gray-800 font-weight-bold">Oopss!</h3>
            <p class="lead text-gray-800 mx-auto">403 Page Not Found</p>
            <a href="index.html">&larr; Back to Dashboard</a>
          </div>
@endsection
