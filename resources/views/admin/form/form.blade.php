@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Registration</h4>
                <a href="{{ url('/form') }}" type="button" class="btn btn-primary waves-effect waves-light btn-success" style="padding: 8px 15px;">ADD</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                    {{-- <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                        <thead>
                        <tr>
                            <th>DATE CREATED</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>CURRENT OCCUPATION</th>
                            <th>EDUCATIONAL ATTAINMENT</th>
                            <th>ADDRESS</th>
                            <th>CONTACT</th>
                            <th>ACTION</th>
                            {{-- <th>ATTEND</th> --}}
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($forms as $form)
                            <tr>
                                <td class="text-wrap">{{ $form->created_at }}</td>
                                <td class="text-wrap">{{ $form->fname }}{{ ' ' }}{{ $form->mname }}{{ ' ' }}{{ $form->lname }}</td>
                                <td class="text-wrap">{{ $form->sex }}</td>
                                <td class="text-wrap">{{ $form->occupation }}</td>
                                <td class="text-wrap">{{ $form->education }}</td>
                                <td class="text-wrap">{{ $form->address }}{{ ', ' }} {{ $form->province }}</td>
                                <td class="text-wrap">{{ $form->contact }}{{ ' - ' }} {{ $form->email }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button style="padding: 5px 10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="text-center dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('qrcode', $form->id) }}" class="btn btn-primary waves-effect waves-light btn-warning" style="padding: 5px 10px;"><i class="ri-qr-code-fill"></i></a>
                                            <a href="{{ route('edit.form', $form->id) }}" class="btn btn-primary waves-effect waves-light" style="padding: 5px 10px;"><i class="ri-file-edit-line"></i></a>
                                            <a href="{{ route('destroy.form', $form->id) }}" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 5px 10px;" onclick="confirmDelete(event)"><i class="ri-delete-bin-2-fill"></i></a>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td class="text-wrap"><a href="{{ route('attendance', $form->id) }}" class="btn btn-primary waves-effect waves-light" style="padding: 5px 10px;">Attend</a></td> --}}

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

    <script>
        function confirmDelete(event) {
            if (!confirm("Are you sure you want to delete?")) {
                event.preventDefault();
            }
        }
    </script>

@endsection
