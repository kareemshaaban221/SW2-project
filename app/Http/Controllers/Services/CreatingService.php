<?php

namespace App\Http\Controllers\Services;

use App\Models\Accountant;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Receptionist;
use App\Models\User;
use Illuminate\Http\Request;

trait CreatingService {
    protected function createManager(Request $request, User $user = NULL) {
        if(!$user) {
            $this->createUser($request->email, 'manager');
        } else {
            $user->role = 'manager';
            $user->save();
        }

        $manager = new Manager();
        $manager->user_id = $user->id;
        $manager->save();

        return [
            'user' => $user,
            'manager' => $manager
        ];
    }

    protected function createDoctor(Request $request, User $user = NULL) {
        if(!$user) {
            $this->createUser($request->email, 'doctor');
        } else {
            $user->role = 'doctor';
            $user->save();
        }

        $employee = $this->createEmployee($user, Manager::find($request->manager_id));

        $doctor = new Doctor();
        $doctor->employee_id = $employee->id;
        $doctor->save();

        return [
            'user' => $user,
            'employee' => $employee,
            'doctor' => $doctor
        ];
    }

    protected function createReceptionist(Request $request, User $user = NULL) {
        if(!$user) { // if email doesn't exists
            $user = $this->createUser($request->email, 'receptionist');
        } else {
            $user->role = 'receptionist';
            $user->save();
        }

        $employee = $this->createEmployee($user, Manager::find($request->manager_id));

        $receptionist = new Receptionist();
        $receptionist->employee_id = $employee->id;
        $receptionist->save();

        return [
            'user' => $user,
            'employee' => $employee,
            'receptionist' => $receptionist
        ];
    }

    protected function createAccountant(Request $request, User $user = NULL) {
        if(!$user) { // if email doesn't exists
            $user = $this->createUser($request->email, 'accountant');
        } else {
            $user->role = 'accountant';
            $user->save();
        }

        $employee = $this->createEmployee($user, Manager::find($request->manager_id));

        $accountant = new Accountant();
        $accountant->employee_id = $employee->id;
        $accountant->save();

        return [
            'user' => $user,
            'employee' => $employee,
            'accountant' => $accountant
        ];
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
