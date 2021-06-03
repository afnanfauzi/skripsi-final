<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $pengguna = User::with('roles')->get();
        // dd($pengguna);
        if($request->ajax()){
            return datatables()->of($pengguna)
                        ->addColumn('action', function($data){
                            $button = '<a href="pengguna/'.$data->id.'/edit" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-warning btn-sm edit-post" title="Edit Data"><i class="fa fa-edit fa-sm"></i></a>';
                            // $button .= '&nbsp;&nbsp;';
                            // $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash fa-sm"></i></button>'; 
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
    
            return view('admin.pengguna.index');
    }

    public function destroy($id)
    {
        $user = User::where('id',$id)->first();
        $user->roles()->detach(2);
        $user->delete();

        return response()->json($user);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $post  = User::where($where)->first();
        // $role = Role::all();

        return view('admin.pengguna.edit-pengguna', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);


        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // $roles = $request->role;
        // $user->roles()->sync($roles);
        $user->update($user_data);

        return redirect()->action([PenggunaController::class, 'index']);
    }
}
