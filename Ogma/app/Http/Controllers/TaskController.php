<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class TaskController extends Controller
{

    public function index()
    {
        $roles = [];
        $allRoles = Role::all();
        foreach ($allRoles as $k => $v) {
            $r = $allRoles[$k];
            $role = new \stdClass();
            $role->id = $r->id;
            $role->name = $r->name;
            $role->canDelete = Role::where('name', $r->name)->first()->users()->get()->count() > 0;
            array_push($roles, $role);
        }
        return view('control', ['roles' => $roles]);
    }

    public function createRole()
    {
        return view('control.createRole');
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Role::create([
            'name' => $request->name
        ]);
        return redirect('control');
    }

    public function editRole($id)
    {
        return view('control.editRole', ['roleId' => $id]);
    }

    public function putRole(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $role = Role::find($id);

        if (!isset($role)) {
            $role = new Role();
        }

        $role->name = $request->input('name');
        $role->save();

        return redirect('control');
    }

    public function deleteRole($id)
    {
        Role::destroy($id);
        return redirect('control');
    }
}
