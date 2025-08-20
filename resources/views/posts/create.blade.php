@extends('layouts.app')

@section('content')
   <div class="card card-default">
      <div class="card-header">{{ isset($post) ? 'Edit post' : 'Create post' }}</div>
      <div class="card-body">
         <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($post))
               @method('PUT')
            @endif
            @include('partials.errors')

            <div class="form-group">
               <label for="title">title</label>
               <input type="text" id="title" class="form-control" name="title"
                  value="{{ isset($post) ? $post->title : '' }}">
            </div>
            <div class="form-group">
               <label for="description">Description</label>
               <textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>
            </div>
            <div class="form-group">
               <label for="content">Content</label>

               <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
               <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
               <label for="published_at">Published At</label>
               <input type="text" id="published_at" class="form-control" name="published_at"
                  value="{{ isset($post) ? $post->published_at : '' }}">
            </div>
            @if (isset($post))
               <div class="form-group">
                  <img src="{{ asset('storage/' . $post->image) }}" alt="" style="width: 100%">
               </div>
            @endif
            <div class="form-group">
               <label for="image">Image</label>
               <input type="file" id="image" class="form-control" name="image">
            </div>
            <div class="form-group">
               <label for="category">category</label>
               <select name="category" id="category" class="form-control">
                  @foreach ($categories as $category)
                     <option @if (isset($post) && $category->id == $post->category_id) selected @endif value="{{ $category->id }}">
                        {{ $category->name }}</option>
                  @endforeach
               </select>
            </div>
            @if ($tags->count() > 0)
               <div class="form-group">
                  <label for="tags">tags</label>
                  <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                     @foreach ($tags as $tag)
                        <option @if (isset($post) && $post->hasTag($tag->id)) selected @endif value="{{ $tag->id }}">
                           {{ $tag->name }}</option>
                     @endforeach
                  </select>
            @endif
      </div>
      <div class="form-group">
         <button type="submit" class="btn btn-success mt-2">{{ isset($post) ? 'Update post' : 'Add Post' }}</button>
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
         // enableSeconds: true
      });

      $(document).ready(function() {
         $('.tags-selector').select2();
      });
   </script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('css')
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/trix@2.1.15/dist/trix.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
