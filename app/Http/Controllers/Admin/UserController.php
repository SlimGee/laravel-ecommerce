<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        $users = User::paginate(10);

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Renderable
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreUserRequest $request,
        CreateNewUser $action,
    ): RedirectResponse {
        $action->create([
            ...$request->validated(),
            'terms' => 'on',
            'password_confirmation' => $request->password_confirmation,
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Renderable
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('admin.users.edit', [
            'user' => $user,
            'permissions' => $permissions,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateUserRequest $request,
        User $user,
        UpdateUserProfileInformation $action,
    ): RedirectResponse {
        $action->update($user, $request->validated());

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }
}
