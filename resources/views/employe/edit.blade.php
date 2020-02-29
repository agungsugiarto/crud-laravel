@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit employe</div>
                <div class="card-body">
                    <form action="{{ route('employe.update', $employe->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label class="col-form-label">Company</label>
                            <select name="company_id" id="company_id" class="form-control">
                                <option value="">=Choose Company=</option>
                                @foreach ($company as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Name</label>
                            <input type="text" name="name" value="{{ $employe->name }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" name="email" value="{{ $employe->email }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="footer float-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#company_id').select2({});
        });
    </script>
@endsection
