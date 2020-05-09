<?php

namespace App\Http\Controllers\Admin;

use App\Http\DTOs\ExpenseData;
use App\Http\Requests\SaveExpense;
use App\Models\Expense;
use App\Models\Tag;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExpenseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $records = Expense::paginate(20);

        return view('admin.expense.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('admin.expense.create', [
            'expense' => new Expense,
            'tags'    => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SaveExpense $request
     *
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(SaveExpense $request)
    {
        $data = ExpenseData::fromRequest($request);

        Expense::create($data->toArray());

        session()->flash('success', trans('messages.created'));

        return redirect()->route('expense.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Expense $expense
     * @return View
     */
    public function edit(Expense $expense)
    {
        return view('admin.expense.edit', [
            'expense' => $expense,
            'tags'    => Tag::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SaveExpense $request
     * @param Expense $expense
     *
     * @return RedirectResponse
     * @throws \Exception
     */
    public function update(SaveExpense $request, Expense $expense)
    {
        $data = ExpenseData::fromRequest($request);

        $expense->update($data->toArray());

        session()->flash('success', trans('messages.updated'));

        return redirect()->route('expense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Expense $expense
     * @return JsonResponse|RedirectResponse
     *
     * @throws Exception
     */
    public function destroy(Request $request, Expense $expense)
    {
        $expense->delete();

        $message = trans('messages.deleted');

        if ($request->ajax()) {
            return response()->json(['success' => $message], 200);
        }

        session()->flash('success', $message);

        return redirect()->back(200);
    }
}
