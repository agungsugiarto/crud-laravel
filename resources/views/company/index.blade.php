@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Company
                    <a href="{{ route('company.create') }}" type="button" class="float-right btn btn-primary">
                        Add Company
                    </a>
                </div>
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td> <img width="32" height="32" class="img-thumbnail" src="{{ url('storage/'.$item->logo) }}" alt=""> </td>
                                    <td>
                                        <form action="{{ route('company.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ route('company.edit', $item->id) }}" class=" btn btn-sm btn-primary"><span class="fa fa-fw fa-pencil"></span></a>
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')"><span class="fa fa-fw fa-trash"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $companies->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})

            $('#form-create').submit(function (event) {
                event.preventDefault();
                $('.text-danger').remove();
                $('.is-invalid').removeClass('is-invalid');
                var createForm = new FormData(this);
                var form = $('#form-create');

                $.ajax({
                    url: '{{ route('company.store') }}',
                    method: 'POST',
                    data: createForm,
                    contentType: false,
                    processData: false,
                    dataType: 'json',

                    success: function (response) {
                        if (response.errors) {
                            $.each(response.errors, function (elem, messages) {
                                form.find('input[name="' + elem + '"]').addClass('is-invalid').after('<p class="text-danger">' + messages + '</p>');
                            });
                        } else {
                            $("#create-modal").trigger("reset");
                            $("#create-modal").modal('hide');
                        }
                    }
                })
            })

            $(document).on('click', '.btn-edit', function (e) {
                e.preventDefault();
                var url = "company/:id" + "/" + "edit";
                url = url.replace(':id', $(this).attr('data-id'));

                $.ajax({
                    url: url,
                    method: 'get',
                    data: { "id": $(this).attr('data-id') },

                    success: function(response) {
                        if (response.data) {
                            console.table(response.data);
                            var editForm = $('#form-edit');
                            editForm.find('input[name="name"]').val(response.data.name);
                            editForm.find('input[name="email"]').val(response.data.email);
                            $("#company_id").val(response.data.id);
                            $("#edit-modal").modal('show');
                        }
                    }
                })
            })

            $('#form-edit').submit(function (event) {
                event.preventDefault();
                $('.text-danger').remove();
                $('.is-invalid').removeClass('is-invalid');
                var url = "company/:id";
                url = url.replace(':id', $("#company_id").val());
                var form = $('#form-edit');

                $.ajax({
                    url: url,
                    method: 'PUT',
                    data: form.serialize(),

                    success: function (response) {
                        if (response.errors) {
                            $.each(response.errors, function (elem, messages) {
                                form.find('input[name="' + elem + '"]').addClass('is-invalid').after('<p class="text-danger">' + messages + '</p>');
                            });
                        } else {
                            $("#edit-modal").trigger("reset");
                            $("#edit-modal").modal('hide');
                        }
                    }
                })
            })

            $('#create-modal').on('hidden.bs.modal', function() {
                $(this).find('#form-create')[0].reset();
                $('.text-danger').remove();
                $('.is-invalid').removeClass('is-invalid');
            });

            $('#edit-modal').on('hidden.bs.modal', function() {
                $(this).find('#form-create')[0].reset();
                $('.text-danger').remove();
                $('.is-invalid').removeClass('is-invalid');
            });
        })
    </script>
@endsection --}}
