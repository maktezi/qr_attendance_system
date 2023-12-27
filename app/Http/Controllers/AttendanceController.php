<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Attendance;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AttendanceController extends Controller
{
    public function attendance()
    {
        $attendances = Attendance::all();
        return view('admin.attendance.attendance',compact('attendances'));
    }

    public function scanQrCode($id)
    {
        try {
            $formData = Form::findOrFail($id);
            $attendedData = Attendance::where('form_id', $formData->id)->first();

            if (!$attendedData) {
                $attendedData = new Attendance();
                $attendedData->form_id = $formData->id;
            } else {
                $attendedData->updated_at = now();
            }

            $attendedData->save();

            // Alert::success('Attended');
            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            // Alert::error('Error: <br>' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

}
