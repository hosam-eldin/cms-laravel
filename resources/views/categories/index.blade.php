@extends('layouts.app')

@section('content')
   <div class="d-flex justify-content-end mb-2">
      <a href="{{ route('categories.create') }}" class="btn btn-success float-right">Add Category</a>
   </div>

   <div class="card card-default">
      <div class="card-header">Categories</div>
      <div class="card-body">
         <table class="table">
            <thead>
               <th>Name</th>
               <th></th>
            </thead>
            <tbody>
               @foreach ($categories as $category)
                  <tr>
                     <td>
                        {{ $category->name }}
                     </td>
                     <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-info btn-sm">
                           Edit
                        </a>
                        <div class="button btn btn-danger btn-small" onclick="handleDelete({{ $category->id }})">
                           Delete
                        </div>
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
         <!-- Modal -->
         <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <form action="" method="POST" id="deleteCategoryForm">
                  @csrf
                  @method('DELETE')

                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                        <p class="text-center text-bold">
                           Are You Sure You Want To Delete Category?
                        </p>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, Go Back</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                     </div>
                  </div>
            </div>
         </div>
         </form>
      </div>
   </div>
@endsection

@section('script')
   <script>
      function handleDelete(id) {
         var form = document.getElementById('deleteCategoryForm')
         form.action = '/categories/' + id

         $('#deleteModal').modal('show')

      }

      // function handleDelete(id) {
      //    console.log('deleting', id);
      //    document.activeElement.blur(); // إزالة الفوكس من أي عنصر حالياً
      //    let modal = new bootstrap.Modal(document.getElementById('deleteCategoryForm'));
      //    modal.show();
      // }
   </script>
@endsection
