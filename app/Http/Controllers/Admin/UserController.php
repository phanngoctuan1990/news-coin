<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use App\Models\UserRole;

class UserController extends Controller {

    /**
     * Index
     *
     * @return 
     */
    public function index() {
        return view('admin.user.index');
    }

    /**
     * Create
     * 
     * @return void
     */
    public function create() {
        return view('admin.user.create');
    }

    /**
     * Insert data
     *
     * @param CreateUserRequest $request Request
     * 
     * @return void
     */
    public function store(CreateUserRequest $request) {
        $data = $request->all();
        $user = new User;
        $user->full_name = $data['full_name'];
        $user->email = $data['email'];
        $user->password = md5($data['password']);
        $user->save();
        $userRole = array();
        $now = \Carbon\Carbon::now();
        foreach ($data['role_id'] as $roleId) {
            $userRole[] = [
                'role_id' => $roleId,
                'user_id' => $user->id,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        \DB::table('user_role')->insert($userRole);
        flash('Tạo mới tài khoản thành công', 'success');
        return redirect()->route('admin.user.index');
    }

    /**
     * Show data edit user
     *
     * @param int $id User id
     * 
     * @return void
     */
    public function edit($id) {
        $user = User::with(['userRoles'])->find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update user
     *
     * @param UpdateUserRequest $request
     * @param int $id User id
     * 
     * @return void
     */
    public function update(UpdateUserRequest $request, $id) {
        $data = $request->all();
        $user = User::find($id);
        $user->full_name = $data['full_name'];
        $user->email = $data['email'];
        $user->password = md5($data['password']);
        $user->save();
        $userRoles = [];
        foreach ($user->userRoles as $value) {
            $userRoles[] = $value['id'];
        }
        UserRole::destroy($userRoles);
        $now = \Carbon\Carbon::now();
        foreach ($data['role_id'] as $roleId) {
            $userRole[] = [
                'role_id' => $roleId,
                'user_id' => $user->id,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }
        \DB::table('user_role')->insert($userRole);
        flash('Cập nhật tài khoản thành công', 'success');
        return redirect()->route('admin.user.index');
    }

    /**
     * Delete user
     *
     * @param int $id User id
     *
     * @return void
     */
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        flash('Xoá tài khoản thành công', 'success');
        return redirect()->route('admin.user.index');
    }

    /**
     * Get list user show datatables
     *
     * @return void
     */
    public function datatables() {
        return \Datatables::of(User::query())
                        ->addColumn('action', 'admin.user.datatables.browser')
                        ->make(true);
    }

}
