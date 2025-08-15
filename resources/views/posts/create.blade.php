@extends('layouts.app')

@section('content')


   <div class="card card-default">
      <div class="card-header">Create post</div>
      <div class="card-body">
         <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
               <div class="alert alert-danger">
                  <ul class="list-group">
                     @foreach ($errors->all() as $error)
                        <li class="list-group-item text-danger">
                           {{ $error }}
                        </li>
                     @endforeach
                  </ul>
               </div>
            @endif

            <div class="form-group">
               <label for="title">title</label>
               <input type="text" id="title" class="form-control" name="title">
            </div>
            <div class="form-group">
               <label for="description">Description</label>
               <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
               <label for="content">Content</label>

               <input id="content" type="hidden" name="content">
               <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
               <label for="published_at">Published At</label>
               <input type="text" id="published_at" class="form-control" name="published_at">
            </div>
            <div class="form-group">
               <label for="image">Image</label>
               <input type="file" id="image" class="form-control" name="image">
            </div>

            <div class="form-group">
               <button type="submit" class="btn btn-success mt-2">Add Post</button>
            </div>
         </form>
      </div>
   </div>

@endsection
@section('script')
   <script src="https://cdn.jsdelivr.net/npm/trix@2.1.15/dist/trix.umd.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
   <script>
      flatpickr('#published_at', {
         enableTime: true
      });
   </script>
@endsection

@section('css')
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trix@2.1.15/dist/trix.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
