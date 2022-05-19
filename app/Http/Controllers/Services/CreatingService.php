<?php

namespace App\Http\Controllers\Services;

use App\Models\Accountant;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Patient;
use App\Models\Receptionist;
use App\Models\User;
use Illuminate\Http\Request;

trait CreatingService {
    use Helpers;

    protected function createManager(Request $request, User $user = NULL) {
        $user = $this->setRole($user, 'manager') ? : $this->createUser($request->email, 'manager');

        $manager = new Manager();
        $manager->user_id = $user->id;
        $manager->save();

        return [
            'user' => $user,
            'manager' => $manager
        ];
    }

    protected function createStaff(Request $request, User $user = NULL, $model, $type) {
        $user = $this->setRole($user, $type) ? : $this->createUser($request->email, $type);

        $employee = $this->createEmployee($user, Manager::find($request->manager_id));

        $staff = new $model;
        $staff->employee_id = $employee->id;
        $staff->save();

        return [
            'user' => $user,
            'employee' => $employee,
            $type => $staff
        ];
    }

    protected function createPatient(Request $request, User $user = NULL) {
        $clinicDoctor = Doctor::where('clinic_id', $request->clinic)->inRandomOrder()->first();
        if(!$clinicDoctor) {
            return false;
        }

        if(!$user) {
            $user = new User();
            $user->fname = ucwords($request->fname);
            $user->lname = ucwords($request->lname);
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->role = 'patient';
            $user->save();
        }

        $patient = new Patient();
        $patient->user_id = $user->id;
        $patient->doctor_id = $clinicDoctor->id;
        $patient->save();

        return [
            'user' => $user,
            'patient' => $patient
        ];
    }

    protected function createReport(Request $request) {
        $patient = Patient::find($request->patient_id);

        $patient->status = $request->status;
        $patient->report = $request->report;

        $patient->save();

        return $patient;
    }

    private function createEmployee(User $user, Manager $manager) {
        $employee = new Employee();
        $employee->user_id = $user->id;
        $employee->manager_id = $manager->id;
        $employee->save();

        return $employee;
    }

    private function createUser($email, $role) {
        $user = new User;
        $user->email = $email;
        $user->role = $role;
        $user->save();

        return $user;
    }
}
