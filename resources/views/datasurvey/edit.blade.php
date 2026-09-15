@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Survey</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('datasurvey.update', $dataSurvey->id_survey) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_subjek" class="form-label">Nama Subjek</label>
                            <input type="text" class="form-control @error('nama_subjek') is-invalid @enderror" id="nama_subjek" name="nama_subjek" value="{{ old('nama_subjek', $dataSurvey->nama_subjek) }}" maxlength="100" required>
                            @error('nama_subjek')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="jenis_survey" class="form-label">Jenis Survey</label>
                            <select class="form-select @error('jenis_survey') is-invalid @enderror" id="jenis_survey" name="jenis_survey" required>
                                <option value="">Select Jenis Survey</option>
                                <option value="type1" {{ old('jenis_survey', $dataSurvey->jenis_survey) == 'type1' ? 'selected' : '' }}>Type 1</option>
                                <option value="type2" {{ old('jenis_survey', $dataSurvey->jenis_survey) == 'type2' ? 'selected' : '' }}>Type 2</option>
                                <option value="type3" {{ old('jenis_survey', $dataSurvey->jenis_survey) == 'type3' ? 'selected' : '' }}>Type 3</option>
                            </select>
                            @error('jenis_survey')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lokasi_rw" class="form-label">Lokasi RW</label>
                            <input type="text" class="form-control @error('lokasi_rw') is-invalid @enderror" id="lokasi_rw" name="lokasi_rw" value="{{ old('lokasi_rw', $dataSurvey->lokasi_rw) }}" maxlength="10" required>
                            @error('lokasi_rw')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control @error('alamat_lengkap') is-invalid @enderror" id="alamat_lengkap" name="alamat_lengkap" rows="3">{{ old('alamat_lengkap', $dataSurvey->alamat_lengkap) }}</textarea>
                            @error('alamat_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon', $dataSurvey->nomor_telepon) }}" maxlength="20">
                            @error('nomor_telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status_kelayakan" class="form-label">Status Kelayakan</label>
                            <select class="form-select @error('status_kelayakan') is-invalid @enderror" id="status_kelayakan" name="status_kelayakan">
                                <option value="">Select Status Kelayakan</option>
                                <option value="eligible" {{ old('status_kelayakan', $dataSurvey->status_kelayakan) == 'eligible' ? 'selected' : '' }}>Eligible</option>
                                <option value="not_eligible" {{ old('status_kelayakan', $dataSurvey->status_kelayakan) == 'not_eligible' ? 'selected' : '' }}>Not Eligible</option>
                                <option value="pending" {{ old('status_kelayakan', $dataSurvey->status_kelayakan) == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                            @error('status_kelayakan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="catatan_survey" class="form-label">Catatan Survey</label>
                            <textarea class="form-control @error('catatan_survey') is-invalid @enderror" id="catatan_survey" name="catatan_survey" rows="3">{{ old('catatan_survey', $dataSurvey->catatan_survey) }}</textarea>
                            @error('catatan_survey')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection