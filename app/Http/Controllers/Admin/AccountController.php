<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\DTOs\AccountData;
use App\Http\Requests\SaveAccount;
use App\Models\Account;
use App\Models\Types\AccountType;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $records = Account::paginate(20);

        return view('admin.account.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.account.create', [
            'account' => new Account,
            'types'   => AccountType::values(),
            'owners'  => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveAccount $request
     * @return Response
     */
    public function store(SaveAccount $request)
    {
        $data = AccountData::fromRequest($request);

        Account::create($data->toArray());

        session()->flash('success', trans('messages.created'));

        return redirect()->route('account.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Account $account
     * @return View
     */
    public function edit(Account $account)
    {
        return view('admin.account.edit', [
            'account' => $account,
            'types'   => AccountType::values(),
            'owners'  => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveAccount $request
     * @param Account $account
     * @return Response
     */
    public function update(SaveAccount $request, Account $account)
    {
        $data = AccountData::fromRequest($request);

        $account->update($data->toArray());

        session()->flash('success', trans('messages.updated'));

        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Account $account
     * @return Response
     *
     * @throws Exception
     */
    public function destroy(Request $request, Account $account)
    {
        $account->delete();

        $message = trans('messages.deleted');

        if ($request->ajax()) {
            return response()->json(['success' => $message], 200);
        }

        session()->flash('success', $message);

        return redirect()->back(200);
    }
}
