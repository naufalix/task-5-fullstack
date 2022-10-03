@extends('layouts.app')

@section('content')
@php
  $role=Auth::user()->role;
@endphp
<!--begin::Section-->
<div>
  <!--begin::Heading-->
  <div class="col-12 d-flex">
    <h1 class="anchor fw-bolder mb-5" id="striped-rounded-bordered">Daftar Artikel</h1>
    <button class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Artikel</button>
  </div>
  <!--end::Heading-->
  <!--begin::Block-->
  <div class="my-5 table-responsive">
    <table id="myTable" class="table table-striped table-hover table-rounded border gs-7">
      <thead>
        <tr class="fw-bold fs-6 text-gray-800 border-bottom border-gray-200">
          <th>No</th>
          <th>Judul</th>
          <th>Category id</th>
          <th>Author id</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no=1;
        @endphp
        @foreach ($artikels as $artikel)
        <tr>
          <td>{{ $no }}</td>
          <td id="t{{ $artikel->id }}" style="min-width: 150px">{{ $artikel->title }}</td>
          <td>{{ $artikel->category->name }}</td> <a class="d-none"  id="c{{ $artikel->id }}"></a>
          <td>{{ $artikel->author->name }}</td> <a class="d-none" id="u{{ $artikel->id }}"></a>
          <td style="min-width: 100px">
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{ $artikel->id }})"><i class="bi bi-pencil-fill"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $artikel->id }})"><i class="bi bi-x-lg"></i></a>
          </td>
        </tr>
        @php
          $no++
        @endphp
        @endforeach
      </tbody>
    </table>
  </div>
  <!--end::Block-->
</div>
<!--end::Section-->

<div class="modal fade" tabindex="-1" id="tambah">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Tambah Artikel</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="home">
          @csrf
          <div class="modal-body">
            <div class="row g-9 mb-8">
              <div class="col-12">
                <label class="required fw-bold mb-2">Judul</label>
                <input type="text" class="form-control form-control-solid" name="title" required>
              </div>
            </div>
            <div class="row g-9 mb-8">
              <div class="col-md-8">
                <label class="required fw-bold mb-2">Image URL</label>
                <input type="text" class="form-control form-control-solid" name="image" required>
              </div>
              <div class="col-md-4">
                <label class="required fw-bold mb-2">Category</label>
                <select class="form-select form-select-solid" name="category_id" tabindex="-1" aria-hidden="true" required>
                  @foreach ($categories as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row g-9 mb-8">
              <div class="col-12">
                <label class="required fw-bold mb-2">Content</label>
                <textarea class="form-control form-control-solid" name="content" rows="10" required></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="submit" value="store">Submit</button>
          </div>
        </form>
      </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="edit">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="et">Edit Artikel</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="home">
          @csrf
          <div class="modal-body">
            <input type="hidden" class="d-none" id="ei" name="id">
            <div class="row g-9 mb-8">
              <div class="col-12">
                <label class="required fw-bold mb-2">Judul</label>
                <input type="text" class="form-control form-control-solid" id="ej" name="title" required>
              </div>
            </div>
            <div class="row g-9 mb-8">
              <div class="col-md-8">
                <label class="required fw-bold mb-2">Image URL</label>
                <input type="text" class="form-control form-control-solid" id="eu" name="image" required>
              </div>
              <div class="col-md-4">
                <label class="required fw-bold mb-2">Category</label>
                <select class="form-select form-select-solid" id="ect" name="category_id" tabindex="-1" aria-hidden="true" required>
                  @foreach ($categories as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row g-9 mb-8">
              <div class="col-12">
                <label class="required fw-bold mb-2">Content</label>
                <textarea class="form-control form-control-solid" id="ecn" name="content" rows="10" required></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary" name="submit" value="update">Submit</button>
          </div>
        </form>
      </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" id="hapus">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Hapus Artikel</h3>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-lg"></i>
          </div>
        </div>
        <form class="form" method="post" action="home">
          @csrf
          
          <div class="modal-body">
            <input type="hidden" class="d-none" id="di" name="id">
            <label class="fw-bold mb-2" id="dd">Apakah anda yakin ingin menghapus artikel ini?</label>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger" name="submit" value="delete">Delete</button>
          </div>
        </form>
      </div>
  </div>
</div>

<script type="text/javascript">
  function edit(id){
    $.ajax({
        url: "api/v1/artikel/"+id,
        type: 'GET',
        dataType: 'json',
        success: function(mydata) {
            $("#ei").val(id);
            $("#ej").val(mydata.title);
            $("#eu").val(mydata.image);
            $("#ect").val(mydata.category_id);
            $("#ecn").val(mydata.content);
            $("#et").text("Edit "+mydata.title);
        }
    });
  }
  function hapus(id){
    $.ajax({
        url: "api/v1/artikel/"+id,
        type: 'GET',
        dataType: 'json',
        success: function(mydata) {
            $("#di").val(id);
            $("#dd").text("Apakah anda yakin ingin menghapus "+mydata.title+"?");
        }
    });
    
  }
</script>
@endsection
