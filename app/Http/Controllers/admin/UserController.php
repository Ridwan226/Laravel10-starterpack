<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
  public function viewUser(Request $request)
  {

    if ($request->ajax()) {
      $user = User::query();
      $role = Role::all();
      return DataTables::of($user)
        ->addColumn('created', function ($data) {
          return date('d M, Y', strtotime($data->created_at));
        })
        ->addColumn('aksi', function ($data) {
          $button = '<button class="btn btn-primary  m-1 waves-light btn-sm edit" id="' . $data->id . '" data-toggle="tooltip" data-placement="right" title="Edit Data Yang Anda Pilih"><i class="fa fa-edit"></i></button>';
          $button .= '<button class="btn btn-sm btn-danger m-1 hapus" id="' . $data->id . '" name="hapus"><i class="fa fa-trash"></i></button>';
          // $button .= '<button class="btn btn-sm btn-info m-1 detail" id="' . $data->id . '"><i class="fa fa-eye"></i></button>';
          return $button;
        })->rawColumns(['aksi', 'created'])
        ->make(true);
    }
    return view('admin.user.list');
  }



  public function addUser(Request $request)
  {
    // if (!auth()->user()->can('user_add')) {
    //   return response()->json(['message' => 'Permisson Not Access'], 422);
    // }
    $rules = [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8'],
    ];
    $validasi = Validator::make($request->all(), $rules);

    if ($validasi->fails()) {
      return response()->json(['message' => 'Data Gagal Di simpan', 'message' => $validasi->errors()->first()], 422);
    }

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    $user->assignRole('User');

    return response()->json(['message' => 'Data Berhasil Di simpan'], 200);
  }

  public function editUser(Request $request)
  {
    // if (!auth()->user()->can('user_edit')) {
    //   return response()->json(['message' => 'Permisson Not Access'], 422);
    // }
    $data = User::find($request->id);

    if (!$data) {
      return response()->json(['message' => 'Data Tidak Tersedia'], 404);
    }

    $data->roles->pluck('name');

    return response()->json($data);
  }

  public function updateUser(Request $request)
  {
    if (!auth()->user()->can('user_edit')) {
      return response()->json(['message' => 'Permisson Not Access'], 422);
    }
    $id = $request->id_edit;

    $rules = [
      'name' => ['required', 'string', 'max:255'],
      'email' => 'required|string|email|max:255|unique:users,email,' . $id,
    ];
    $validasi = Validator::make($request->all(), $rules);

    if ($validasi->fails()) {
      return response()->json(['message' => 'Data Gagal Di simpan', 'message' => $validasi->errors()->first()], 422);
    }

    $user = User::find($id);
    if (!$user) {
      return response()->json(['message' => 'Data Tidak Tersedia'], 404);
    }


    if ($request->password) {
      $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);
    } else {
      $user->update([
        'name' => $request->name,
        'email' => $request->email,
      ]);
    }
    $user->syncRoles($request->role);
    return response()->json(['message' => 'Data Berhasil Di Edit'], 200);
  }



  public function delUser(Request $request)
  {

    $data = User::find($request->id);

    if (!$data) {
      return response()->json(['message' => 'Data Tidak Tersedia'], 404);
    }
    $data->delete();
    return response()->json(['message' => 'Data Berhasil Di Hapus'], 200);
  }
}
