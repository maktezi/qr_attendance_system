<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Attendance;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{

    public function scanqr()
    {
        return view('scanqr');
    }

    public function showQR($id)
    {
        $formData = Form::find($id);

        if ($formData) {
            $qrData = $formData->id;

            return view('admin.form.showQR', compact('qrData'));
        } else {
            return "No data available for QR code generation.";
        }
    }

}
