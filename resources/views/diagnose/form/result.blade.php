@extends('layouts.main')

@section('content')

@if($errors->any())
<div class="alert alert-danger mt-5">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card mt-5">
    <h5 class="card-header">Result</h5>
    <div class="card-body">
        <div class="mb-3">
            <label for="nama_sistem" class="form-label">Nama Sistem</label>
            <input type="text" name="nama_sistem" class="form-control" id="nama_sistem" value="{{ $diagnose_data['form1']['nama_sistem'] }}" readonly>
        </div>

        <div class="mb-3">
            <label for="deskripsi_sistem" class="form-label">Deskripsi Sistem</label>
            <textarea class="form-control" name="deskripsi_sistem" id="deskripsi_sistem" rows="3" readonly>{{ $diagnose_data['form1']['deskripsi_sistem'] }}</textarea>
        </div>

        <h4>Sistem</h4>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Instansi</th>
                <th scope="col">Tingkat risiko</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($iiv as $k => $item)
                <tr>
                    <th scope="row">{{ $k + 1 }}</th>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->refInstansi->nama_instansi }}</td>
                    <td>{{ $item->refInstansi->nilai_risiko }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        
    </div>
</div>
@endsection