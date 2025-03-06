<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Manager;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Employee List';
        
        return view('employees.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['model'] = new Employee();
        return view('employees.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $model = new Person();
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->save();
        
        $employee = new Employee();
        $employee->id = $model->id;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        $employee->save();

        if ($request->has('is_manager')) {
            $manager = new Manager();
            $manager->id = $employee->id;
            $manager->bonus = $request->bonus;
            $manager->save();
        }
        if ($model->save()) {
            return redirect()->route('employee.index')->with('alert.success', 'Employee Baru Berhasil Disimpan');
        } else {
            return redirect()->route('employee.create')->with('alert.failed', 'Something Wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $data['model'] = Employee::find($id);
        return view('employees.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $model = Person::find($id);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->phone = $request->phone;
        $model->save();
        
        $employee = Employee::find($model->id);
        $employee->id = $model->id;
        $employee->position = $request->position;
        $employee->salary = $request->salary;
        $employee->save();

        if ($request->has('is_manager')) {
            $manager_old = Manager::find($employee->id);
            if($manager_old) {
                $manager_old->bonus = $request->bonus;
                $manager_old->save();
            } else {
                $manager = new Manager();
                $manager->id = $employee->id;
                $manager->bonus = $request->bonus;
                $manager->save();
            }
        } else {
            Manager::where('id', $employee->id)->delete();
        }
        if ($model->save()) {
            return redirect()->route('employee.index')->with('alert.success', 'Employee Baru Berhasil Disimpan');
        } else {
            return redirect()->route('employee.create')->with('alert.failed', 'Something Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = base64_decode($id);
        $employee = Employee::find($id);
        if(isset($employee->manager)) {
            Manager::where('id',$employee->id)->delete();
        }
        Person::where('id',$id)->delete();
        Employee::where('id',$id)->delete();
    }

    public function datatable(Request $request)
    {
        $query = Employee::query();
        return DataTables::of($query)
            ->addColumn('name', function ($model) {
                $string = '';
                $string = $model->person->name;
                return $string;
            })
            ->addColumn('email', function ($model) {
                $string = '';
                $string = $model->person->email;
                return $string;
            })
            ->addColumn('phone', function ($model) {
                $string = '';
                $string = $model->person->phone;
                return $string;
            })
            ->addColumn('bonus', function ($model) {
                $string = 0;
                $string = isset($model->manager) ? $model->manager->bonus : 0;
                return $string;
            })
            ->addColumn('total_earning', function ($model) {
                $string = 0;
                $string = isset($model->manager) ? $model->manager->totalEarnings() : 0;
                return $string;
            })

            ->addColumn('action', function ($model) {
                $string = '<div class="btn-group">';
                $string .= '<a href="' . route('employee.edit', ['id' => base64_encode($model->id)]) . '" type="button"  class="btn btn-sm btn-info" title="Edit Employee"><i class="fas fa-edit"></i></a>';
                $string .= '&nbsp;&nbsp;<a href="' . route('employee.destroy', ['id' => base64_encode($model->id)]) . '" type="button" class="btn btn-sm btn-danger btn-delete" title="Remove"><i class="fa fa-trash"></i></a>';
                $string .= '</div>';
                return $string;
            })
            ->addIndexColumn()
            ->rawColumns(['name','email','phone','action'])
            ->make(true);
    }
}
