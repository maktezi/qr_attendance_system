@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Users</h4>
                <a href="{{ route('add.user') }}" type="button" class="btn btn-primary waves-effect waves-light btn-success" style="padding: 8px 15px;">Add User</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            {{-- Cert Index --}}
            <div class="card">
                <div class="card-body">
                    <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                    {{-- <table
                    id="datatable-buttons"
                    class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;"> --}}
                        <thead>
                        <tr>
                            <th>USER</th>
                            <th>NAME</th>
                            <th>CONTACT</th>
                            <th>ADDRESS</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-wrap">
                                    @if($user->role == 0)
                                        Applicant - {{ ($user->email) }}
                                    @elseif($user->role == 1)
                                        <b>Admin</b> - {{ ($user->email) }}
                                    @elseif($user->role == 2)
                                        Employeer - {{ ($user->email) }}
                                    @else
                                        {{ $user->role }} - {{ ($user->email) }}
                                    @endif
                                </td>
                                <td class="text-wrap">{{ ($user->fname) }}{{ ' ' }}{{ ($user->mname) }}{{ ' ' }}{{ ($user->lname) }}</td>
                                <td class="text-wrap">{{ ($user->contact) }}</td>
                                <td class="text-wrap">{{ ($user->address) }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button style="padding: 5px 10px;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="text-center dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a href="{{ route('edit.user', $user->id) }}" class="btn btn-primary waves-effect waves-light" style="padding: 5px 10px;"><i class="ri-file-edit-line"></i></a>
                                            <a href="{{ route('destroy.user', $user->id) }}" class="btn btn-primary waves-effect waves-light btn-danger" style="padding: 5px 10px;" onclick="confirmDelete(event)"><i class="ri-delete-bin-2-fill"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- End Cert Index --}}

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
