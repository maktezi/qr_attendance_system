@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-6 mx-auto">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">EDIT USER</h4>
            @if (Auth::user()->role == 1)
                <a style="padding: 5px 15px;" href="{{ route('users.admin') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
            @endif
        </div>
    </div>
</div>

<div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-body">
            {{-- <h3 class="card-title text-center">FORM</h3> --}}
            <form action="{{ route('update.user', $data->id) }}" method="POST" class="needs-validation">
                @csrf

                <div class="row">
                @if (Auth::user()->role == 1)
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>User Type <small>(required)</small></label>
                            <select name="role" class="form-control text-center" required>
                                @if($data->role == 0)
                                    <option value="0" selected disabled>Student</option>
                                @elseif($data->role == 2)
                                    <option value="2" selected disabled>Instructor</option>
                                @else
                                    <option value="{{ $data->role }}" disabled>{{ $data->role }}</option>
                                @endif
                                <option value="Student" @if($data->role == '0') disabled @endif>Student</option>
                                <option value="Instructor" @if($data->role == '2') disabled @endif>Instructor</option>
                            </select>
                        </div>
                    </div>
                @endif

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">First Name <small>(required)</small></label>
                            <div class="input-daterange input-group" data-date-autoclose="true">
                                <input value="{{ $data->fname }}" type="text" class="form-control" name="fname" placeholder="{{ $data->fname }}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Middle Name</label>
                            <div class="input-daterange input-group" data-date-autoclose="true">
                                <input value="{{ $data->mname }}" type="text" class="form-control" name="mname" placeholder="{{ $data->mname }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Last Name <small>(required)</small></label>
                            <div class="input-daterange input-group" data-date-autoclose="true">
                                <input value="{{ $data->lname }}" type="text" class="form-control" name="lname" placeholder="{{ $data->lname }}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <div class="input-daterange input-group" data-date-autoclose="true">
                                <input value="{{ $data->dob }}" type="date" class="form-control" name="dob" placeholder="{{ $data->dob }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Address</small></label>
                            <div class="input-daterange input-group" data-date-autoclose="true">
                                <input value="{{ $data->address }}" type="text" class="form-control" name="address" placeholder="{{ $data->address }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Contact <small>(required)</small></label>
                            <div class="input-daterange input-group" data-date-autoclose="true">
                                <input value="{{ $data->contact }}" type="number" class="form-control" name="contact" placeholder="{{ $data->contact }}" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Email <small>(required)</small></label>
                            <div class="input-daterange input-group" data-date-autoclose="true">
                                <input value="{{ $data->email }}" type="email" class="form-control" name="email" placeholder="{{ $data->email }}" required/>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Password <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input value="{{ $data->password }}" type="text" class="form-control" name="password" placeholder="" required/>
                            </div>
                        </div>
                    </div> --}}

                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-success" type="submit" style="padding: 10px 35px;"><i class="fas fa-save"></i>  SUBMIT</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
