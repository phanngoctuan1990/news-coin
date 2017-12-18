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
        $user->password = bcrypt($data['password']);
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
    public function show($id) {
        $user = User::with(['userRoles'])->find($id);
        if ($user->is_admin && !auth()->user()->is_admin) {
            flash('Không thể xem chi tiết tài khoản admin', 'warning');
            return redirect()->back();
        }
        return view('admin.user.show', compact('user'));
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
        if ($user->is_admin && !auth()->user()->is_admin) {
            flash('Không thể thay đổi tài khoản admin', 'warning');
            return redirect()->back();
        }
        $user->full_name = $data['full_name'];
        $user->email = $data['email'];
        if (auth()->user()->is_admin && auth()->user()->id == $user->id) {
            $user->password = bcrypt($data['password']);
        }
        $user->save();
        if (!$user->is_admin) {
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
        }
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
        if ($user->is_admin) {
            flash('Không thể xoá tài khoản admin', 'warning');
            return redirect()->back();
        }
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
