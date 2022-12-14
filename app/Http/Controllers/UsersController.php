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

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser"><i class="fas fa-edit"></i> Profile</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Ubah Password" class="btn btn-warning btn-sm editPasswordUser"><i class="fas fa-edit"></i> Password</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser"><i class="fas fa-solid fa-trash"></i> Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('users.users');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->userId,
            'password' => 'required|min:8'
        ], [
            'name.required' => 'Nama tidak boleh kosong.',
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.'
        ]);

        $hashPassword = bcrypt($request->password);
        Users::updateOrCreate([
            'id' => $request->userId,
        ], [
            'role' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashPassword,
        ]);

        return response()->json([
            'status' => true,
            'success' => 'User berhasil disimpan.'
        ]);
    }

    public function updatePassword(Request $request)
    {
        $validate = $request->validate([
            'password' => 'required|min:8'
        ], [
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password minimal 8 karakter.']);
        $hashPassword = bcrypt($request->password);
        $user = Users::find($request->userIdPassword);
        $user->password = $hashPassword;
        $user->save();
        return response()->json([
            'status' => true,
            'message' => 'Password berhasil diubah.'
        ]);
    }

    public function edit($id)
    {
        $users = Users::find($id);
        return response()->json($users);
    }

    public function destroy($id)
    {
        Users::find($id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'User berhasil dihapus.'
        ]);
    }
}
