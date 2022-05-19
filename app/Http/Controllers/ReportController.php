<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\CreatingService;
use App\Http\Controllers\Services\ValidationService;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    use ValidationService, CreatingService;

    public function __construct()
    {
        $this->middleware('isDoctor');
    }

    public function index() {
        $doc_id = Auth::user()->employee->doctor->id;

        return view('components.doctor.report.list', [
            'patients' => Patient::with('user')->where('doctor_id', $doc_id)->get(),
            'title' => 'my reports'
        ]);
    }

    public function create() {
        return view('components.doctor.report.create');
    }

    public function store(Request $request) {
        $this->reportCreateValidation($request);

        return $this->createReport($request) ? redirect(route('reports.create'))->with('done', 'Sent Successfully!')
        : redirect(route('reports.create'))
            ->with('err', 'Something Went Wrong, Try Again Later!!')
            ->withInput();
    }
}
