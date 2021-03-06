@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create company</div>
                <div class="card-body">
                    <form action="{{ route('company.update', $company->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-form-label">Name</label>
                            <input type="text" name="name" value="{{ $company->name }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" name="email" value="{{ $company->email }}" class="form-control @error('email') is-invalid @enderror">
                            <p class="text-danger"></p>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Website</label>
                            <input type="text" name="website" value="{{ $company->website }}" class="form-control @error('website') is-invalid @enderror">
                            <p class="text-danger"></p>
                            @error('website')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Logo</label>
                            <div class="input-group">
                                <label class="custom-file-label">Choose file</label>
                                <input type="file" name="logo" value="{{ $company->logo }}" class="custom-file-input">
                                @error('logo')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="footer float-right">
                            <button type="submit" id="btn-save" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
