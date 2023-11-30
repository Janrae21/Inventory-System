<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportMail;

class ReportController extends Controller
{
    public function createReport(Request $request)
    {
        $request->validate([
            'Select' => 'required',
            'description' => 'required',
        ]);

        $data = [
            'select' => $request->input('Select'),
            'description' => $request->input('description'),
        ];

        Mail::to('janrae.fagaragan@student.passerellesnumeriques.org')->send(new ReportMail($data));

        return redirect()->back()->with('success', 'Report created successfully and email sent!');
    }
}
