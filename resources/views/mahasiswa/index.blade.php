@extends('mahasiswa.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mt-2">
<h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
</div>
<div class="float-left my-2">
    <form action="{{ route('mahasiswa.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
            <button class="btn btn-warning" type="submit" >Search</button>
          </div>
    </form>

    </div>
<div class="float-right my-2">
<a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
</div>
</div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div> @endif

<table class="table table-bordered">
<tr>
<th>Nim</th>
<th>Nama</th>
<th>Foto</th>
<th>Kelas</th>
<th>Jurusan</th>
<th>No_Handphone</th>
<th width="280px">Action</th>
</tr>
@foreach ($paginate as $mhs)
<tr>

<td>{{ $mhs->Nim }}</td>
<td>{{ $mhs->Nama }}</td>
<td><img width="100px" height="100px" src="{{asset('storage/'.$mhs->foto)}}"></td>
<td>{{ $mhs->kelas->nama_kelas }}</td>
<td>{{ $mhs->Jurusan }}</td>
<td>{{ $mhs->No_Handphone }}</td>
<td>
<form action="{{ route('mahasiswa.destroy',$mhs->Nim) }}" method="POST">

<a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->Nim) }}">Show</a>

<a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->Nim) }}">Edit</a>

@csrf
@method('DELETE')

<button type="submit" class="btn btn-danger">Delete</button>
<a class="btn btn-warning" href="/mahasiswa/nilai/{{ $mhs->Nim }}">Nilai</a>
</form>
</td>
</tr>
@endforeach
</table>
<div class="d-flex justify-content-lg-center">
        {{ $paginate->links() }}
    </div>
@endsection
