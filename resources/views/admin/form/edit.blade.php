<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets_form/img/apple-icon.png">
	<link rel="shortcut icon" href={{ asset('assets/images/bagong-pilipinas-logo.png') }}>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>{{ config('app.name', 'Laravel') }} - Registration</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href={{ url('http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css') }} rel="stylesheet">
    <link href={{ asset('assets_form/css/bootstrap.min.css') }} rel="stylesheet" />
	<link href={{ asset('assets_form/css/gsdk-bootstrap-wizard.css') }} rel="stylesheet" />
	<link href={{ asset('assets_form/css/demo.css') }} rel="stylesheet" />
    <link href={{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }} rel="stylesheet" type="text/css" />

</head>

<body>
<div class="image-container set-full-height" style="background-image: url('assets_form/img/background.jpg')">
    <a href={{ url('/') }}>
         <div>
            <div class="logo">
                <img src={{ "assets_form/img/new_logo.png" }}>
            </div>
        </div>
    </a>

    <div class="container">
        <div class="row">
        <div class="col-sm-10 col-sm-offset-1">

            <div class="wizard-container">
                <div class="card wizard-card" data-color="azzure" id="wizard">
                    <form action="{{ route('update.form', $data->id) }}" method="POST">
                        @csrf

                    	<div class="wizard-header">
                        	<h3>
                        	   <b>DOLE 90th Anniversary Job Fair</b><br>
                        	   <p style="font-size: 14px;"><b>Tacloban City Convention Center, Esperas Ave, Tacloban City, Leyte</b><br>1 December 2023 : 8:30 AM - 5:00 PM</p>
                        	</h3>
                    	</div>
						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#details" data-toggle="tab">Information</a></li>
	                        </ul>
						</div>
                        <div class="tab-content">
                            <div class="tab-pane" id="details">
                                <div class="row">

                                    <div class="col-sm-4 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input value="{{ $data->fname }}" name="fname" type="text" class="form-control" placeholder="First" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input value="{{ $data->mname }}" name="mname" type="text" class="form-control" placeholder="Middle">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input value="{{ $data->lname }}" name="lname" type="text" class="form-control" placeholder="Last" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-3 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <div class="input-group">
                                            <input value="{{ $data->dob }}" name="dob" type="date" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Sex</label>
                                            <select name="sex" class="form-control" required>
                                                <option value="{{ $data->sex }}" selected="">{{ $data->sex }}</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Occupation <small>- put N/A if no work</small></label>
                                            <input value="{{ $data->occupation }}" name="occupation" type="text" class="form-control" placeholder="Current work" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-4 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <select name="province" class="form-control" required>
                                                <option value="{{ $data->province }}" selected="">{{ $data->province }}</option>
                                                <option value="Biliran">Biliran</option>
                                                <option value="Eastern Samar">Eastern Samar</option>
                                                <option value="Leyte">Leyte</option>
                                                <option value="Northern Samar">Northern Samar</option>
                                                <option value="Samar">Samar</option>
                                                <option value="Southern Leyte">Southern Leyte</option>
                                                <option value="Ormoc City">Ormoc City</option>
                                                <option value="Tacloban">Tacloban</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input value="{{ $data->address }}" name="address" type="text" class="form-control" placeholder="Brgy., Municipality" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-5 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>Educational Attainment</label>
                                            <select name="education" class="form-control" required>
                                                <option value="{{ $data->education }}" selected="">{{ $data->education }}</option>
                                                <option value="No Formal Education">No Formal Education</option>
                                                <option value="Preschool">Preschool</option>
                                                <option value="Elementary">Elementary</option>
                                                <option value="Junior High School">Junior High School</option>
                                                <option value="Senior High School">Senior High School</option>
                                                <option value="Vocational/Technical Courses">Vocational/Technical Courses</option>
                                                <option value="Associate Degree">Associate Degree</option>
                                                <option value="Bachelor's Degree">Bachelor's Degree</option>
                                                <option value="Postgraduate Diplomas/Certificates">Postgraduate Diplomas/Certificates</option>
                                                <option value="Master's Degree">Master's Degree</option>
                                                <option value="Doctorate or PhD">Doctorate or PhD</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Sector</label>
                                            <select name="sector" class="form-control" required>
                                                <option value="{{ $data->sector }}" selected="">{{ $data->sector }}</option>
                                                <option value="PWD">PWD</option>
                                                <option value="Senior Citizen">Senior Citizen</option>
                                                <option value="None">None</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-sm-5 col-sm-offset-1">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input value="{{ $data->email }}" name="email" type="email" class="form-control" placeholder="e.g. email@mail.com" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Contact</label>
                                            <input value="{{ $data->contact }}" name="contact" type="number" class="form-control" placeholder="e.g. 09876543210" required>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-sm-10 col-sm-offset-1">
                                <p style="font-size: 14px; color: red; font-weight: 600;">Important Reminder:</p>
                                <p style="font-size: 14px;">Jobseekers are encouraged to sign-up to the <a target="blank" href="https://philjobnet.gov.ph">https://philjobnet.gov.ph</a> as "JOBSEEKER/APPLICANT". The PhilJobNet is a system that provides a facility to search for jobs through an online job matching and referral system, and the provision of timely, relevant and readily accessible labor market information (LMI).</p>
                            </div>

                            <div class="text-center">
                                <br><button class='btn btn-finish btn-fill btn-info btn-wd btn-sm' type="submit">SAVE</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

</div>

    <script src="{{ asset('assets_form/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets_form/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets_form/js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets_form/js/gsdk-bootstrap-wizard.js') }}"></script>
    <script src="{{ asset('assets_form/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>

    @include('sweetalert::alert')

</body>
</html>
