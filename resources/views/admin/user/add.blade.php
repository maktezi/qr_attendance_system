@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-6 mx-auto">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">ADD USER</h4>
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
            <form action="{{ route('store.user') }}" method="POST" class="needs-validation">
                @csrf

                <div class="row">
                @if (Auth::user()->role == 1)
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>User Type <small>(required)</small></label>
                            <select name="role" class="form-control text-center" required>
                                <option value="" selected disabled>Select User</option>
                                <option value="0">Applicant</option>
                            </select>
                        </div>
                    </div>
                @endif
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">First Name <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control text-center" name="fname" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Middle Name <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control text-center" name="mname" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Last Name <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control text-center" name="lname" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Address <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control" name="address" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Contact <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="number" class="form-control" name="contact" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Email <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="email" class="form-control" name="email" placeholder="" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Password <small>(required)</small></label>
                            <div data-date-autoclose="true">
                                <input type="text" class="form-control" name="password" placeholder="" required/>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-success" type="submit" style="padding: 10px 35px;"><i class="fas fa-save"></i>  SUBMIT</button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
