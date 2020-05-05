<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $records = User::all();

        return view('admin.user.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.user.create', [
            'user' => new User
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveUser $request
     * @return Response
     */
    public function store(SaveUser $request)
    {
        User::create($request->validated());

        session()->flash('success', trans('messages.created'));

        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveUser $request
     * @param User $user
     * @return Response
     */
    public function update(SaveUser $request, User $user)
    {
        $user->fill($request->validated())->save();

        session()->flash('success', trans('messages.updated'));

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     *
     * @throws Exception
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        $message = trans('messages.deleted');

        if ($request->ajax()) {
            return response()->json(['success' => $message], 200);
        }

        session()->flash('success', $message);

        return redirect()->back(200);
    }
}
