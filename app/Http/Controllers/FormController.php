<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use App\Mail\RegistrationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class FormController extends Controller
{
    public function form()
    {
        $forms = Form::all();
        return view('admin.form.form',compact('forms'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'fname' => 'required',
                'mname' => '',
                'lname' => 'required',
                'dob' => 'required',
                'sex' => 'required',
                'occupation' => 'required',
                'province' => 'required',
                'address' => 'required',
                'education' => 'required',
                'sector' => 'required',
                'contact' => 'required',
                'email' => 'required|email|unique:forms,email',
            ]);

            Form::create($validatedData);

            Alert::success('Form Added');
            return redirect('/forms');
            // return redirect()->back();

        } catch (\Exception $e) {
            Alert::error('Error sending form: <br>Please try again.');
            return back();
        }
    }

    public function edit($id)
    {
        $data = Form::find($id);
        return view('admin.form.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'fname' => 'required',
                'mname' => '',
                'lname' => 'required',
                'dob' => 'required',
                'sex' => 'required',
                'occupation' => 'required',
                'province' => 'required',
                'address' => 'required',
                'education' => 'required',
                'sector' => 'required',
                'contact' => 'required',
                'email' => 'required|email|unique:forms,email,' . $id, // Add exclusion for the current record
            ]);

            $form = Form::findOrFail($id);
            $form->update($data);

            Alert::success('Form Updated');
            // return redirect()->back();
            return redirect('/forms');

        } catch (\Exception $e) {
            Alert::error('Error updating form: <br>' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        Form::find($id)->delete();
        Alert::success('Form Deleted!');
        return redirect()->back();
    }

    public function register(Request $request, $id)
    {
        $form = Form::find($id);
        Mail::to($form->email)->send(new RegistrationEmail($form));
    }

}
