<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Yajra\Datatables\DataTables;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Users::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Edit</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.users');
    }

    public function store(Request $request)
    {
        Users::updateOrCreate([
            'id' => $request->userId,
        ], [
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json(['success' => 'User berhasil disimpan.']);
    }

    public function edit($id)
    {
        $user = Users::find($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        Users::find($id)->delete();
        return response()->json(['succes' => 'User berhasil dihapus.']);
    }
}
