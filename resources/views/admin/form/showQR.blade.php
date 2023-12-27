@extends('layouts.app')
@section('content')

<a style="padding: 5px 15px;" href="{{ route('forms.admin') }}" class="btn btn-primary btn-danger" type="button"><i class="fas fa-chevron-left"></i> Back</a>
<br><br>

{!! QrCode::size(300)
    ->style('square')
    ->eye('square')
    ->margin(1)
    ->generate(json_encode($qrData))
!!}

@endsection
