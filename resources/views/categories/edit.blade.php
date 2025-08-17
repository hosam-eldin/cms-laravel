@extends('layouts.app')

@section('content')


   <div class="card card-default">
      <div class="card-header">Edit Category</div>
      <div class="card-body">
         <form action="{{ route('categories.update', $category) }}" method="POST">
            @method('put')
            @include('partials.errors')
            @csrf
            <div class="form-group">
               <label for="name">name</label>
               <input type="text" id="name" class="form-control" name="name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-success mt-2">Update Category</button>
            </div>
         </form>
      </div>
   </div>

@endsection
