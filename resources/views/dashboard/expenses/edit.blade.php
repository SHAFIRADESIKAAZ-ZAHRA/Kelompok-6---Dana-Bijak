@extends('layouts.app')

@section('content')
<div class="container-fluid px-5">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card shadow-sm">
        <div class="card-header">
          <h5>Edit Pengeluaran</h5>
        </div>
        <div class="card-body">
          <!-- Display success or error messages -->
          @if(session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @elseif(session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          <!-- Edit Form -->
          <form action="{{ route('expenses.update', $expense->id_expense) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
              <label for="date">Tanggal</label>
              <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $expense->date) }}" required>
            </div>

            <div class="form-group">
              <label for="amount">Jumlah</label>
              <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount', $expense->amount) }}" required>
            </div>

            <div class="form-group">
              <label for="id_category">Kategori</label>
              <select name="id_category" id="id_category" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id_category }}" {{ $expense->id_category == $category->id_category ? 'selected' : '' }}>
                  {{ $category->name_category }}
                </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="description">Deskripsi</label>
              <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $expense->description) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('expenses') }}" class="btn btn-secondary">Batal</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
