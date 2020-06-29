<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repositories\Role\RoleInterface;
use App\Repositories\User\UserInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /**
     * @var Model User
     */
    protected $user;

    /**
     * @var Model Role
     */
    protected $role;

    /**
     * Register User Constructor
     *
     * @param UserInterface $user
     * @param RoleInterface $role
     */
    public function __construct(UserInterface $user, RoleInterface $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    /**
     * Display register page.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Store register information.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        $defaultRole = $this->role->find('%Normal%', 'LIKE', 'name');

        if (!$defaultRole) {
            return back()->with('error', 'We\'re sorry. Our Permissions are not setup yet! Please comeback later..');
        }

        $registration = $this->user->register($request->except('password_confirmation'), true);

        $this->role->attachRoleUser($registration, $defaultRole->id);

        if ($registration) {
            return redirect()->route('auth.register.verify.index', ['id' => $registration->id]);
        }

        return back()->with('error', 'Something went wrong!');
    }
}
