@extends('mahasiswa.layout')
@section('content')
<div class="container mt-5">

<div class="row justify-content-center align-items-center">
<div class="card" style="width: 24rem;">
<div class="card-header"> Tambah Mahasiswa</div>
<div class="card-body">
    @if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li> @endforeach
</ul>
</div>
@endif
<form method="POST" action="{{ route('mahasiswa.store') }}" id="myForm" enctype="multipart/form-data">
@csrf
<div class="form-group">
<label for="Nim">Nim</label>
<input type="text" name="Nim" class="form-control" id="Nim" aria-describedby="Nim" >
</div>
<div class="form-group">
<label for="Nama">Nama</label>
<input type="text" name="Nama" class="form-control" id="Nama" aria-describedby="Nama" >
</div>
<div class="form-group">
<label for="Kelas">Kelas</label>
<select class="form-control" name="kelas_id">
    @foreach ($kelas as $kls)
    <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
<label for="Jurusan">Jurusan</label>
<input type="text" name="Jurusan" class="form-control" id="Jurusan" aria-describedby="Jurusan" >
</div>
<div class="form-group">
<label for="No_Handphone">No_Handphone</label>
<input type="text" name="No_Handphone" class="form-control" id="No_Handphone" aria-describedby="No_Handphone" >
</div>
<div class="form-group">
    <label for="Foto">Foto</label>
    <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
    </div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>
<script>
    function previewImage(){
      const foto = document.querySelector('#foto');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(foto.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }

  </script>
@endsection

