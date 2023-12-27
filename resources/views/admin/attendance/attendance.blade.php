@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Attended</h4>
                {{-- <a href="{{ url('/') }}" type="button" class="btn btn-primary waves-effect waves-light btn-success" style="padding: 8px 15px;">ADD</a> --}}
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
                            <th>DATE ATTENDED</th>
                            <th>NAME</th>
                            <th>SEX</th>
                            <th>CURRENT OCCUPATION</th>
                            <th>EDUCATIONAL ATTAINMENT</th>
                            <th>ADDRESS</th>
                            <th>CONTACT</th>
                            <th>QR</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($attendances as $attendance)
                            <tr>
                                <td class="text-wrap">{{ $attendance->updated_at }}</td>
                                <td class="text-wrap">{{ $attendance->form->fname }}{{ ' ' }}{{ $attendance->form->mname }}{{ ' ' }}{{ $attendance->form->lname }}</td>
                                <td class="text-wrap">{{ $attendance->form->sex }}</td>
                                <td class="text-wrap">{{ $attendance->form->occupation }}</td>
                                <td class="text-wrap">{{ $attendance->form->education }}</td>
                                <td class="text-wrap">{{ $attendance->form->address }}{{ ', ' }} {{ $attendance->form->province }}</td>
                                <td class="text-wrap">{{ $attendance->form->contact }}{{ ' - ' }} {{ $attendance->form->email }}</td>
                                <td class="text-wrap"><a href="{{ route('qrcode', $attendance->form->id) }}" class="btn btn-primary waves-effect waves-light btn-warning" style="padding: 5px 10px;"><i class="ri-qr-code-fill"></i></a></td>
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
