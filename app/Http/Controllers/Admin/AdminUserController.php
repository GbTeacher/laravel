<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InsertUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Response;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::view('admin.user.index', [
            'users' => User::query()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Response::view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InsertUserRequest $request
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(InsertUserRequest $request)
    {
        $user = User::query()->create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => (bool)$request->input('is_admin'),
        ]);

        return redirect()->route('user.index')->with('success', "Пользователь {$user->name} успешно создан.");
    }

    /**
     * @param int $id
     */
    public function password(int $id)
    {
        $user = User::query()->findOrFail($id);
        return Response::view('admin.user.password', compact('user'));
    }

    /**
     * @param UpdatePasswordRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function passwordUpdate(UpdatePasswordRequest $request, int $id)
    {
        $user = User::query()->findOrFail($id);
        if (Hash::check($request->input('old_password'), $user->password)) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
            return redirect()->route('user.index')->with('success', "Пароль пользователя {$user->name} изменен.");
        }
        return back()->withErrors(['Старый пароль пользователя указан не верно.']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        return Response::view('admin.user.edit', [
            'user' => User::query()->findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::query()->findOrFail($id);
        $user->update([
            'name'     => $request->input('name'),
            'is_admin' => (bool)$request->input('is_admin'),
        ]);
        return redirect()->route('user.index')->with('success', "Пользователь {$user->name} обновлен.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        User::destroy($id);
        return Response::json([
           'status' => true,
        ]);
    }
}
