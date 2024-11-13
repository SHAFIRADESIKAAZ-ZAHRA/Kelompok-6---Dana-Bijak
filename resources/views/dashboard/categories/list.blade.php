@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="table-responsive shadow-sm p-3">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

        <a href="{{ route('categories.addPage') }}" class="btn btn-sm btn-primary mb-3">
          <i class="fas fa-plus"></i>
          Tambah Kategori
        </a>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
            <td>{{ $category->id_category }}</td>
            <td>{{ $category->name_category }}</td>
            <td>
              <a href="{{ route('categories.editPage', $category->id_category) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
                Edit
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>

</div>
@endsection