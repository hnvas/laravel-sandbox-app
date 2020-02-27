<?php

namespace App\Http\Controllers\Admin;

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
        $records = Expense::all();

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
     * @return RedirectResponse
     */
    public function store(SaveExpense $request)
    {
        $data = $request->validated();

        Expense::create($data);

        session()->flash('success', 'Registro criado com sucesso.');

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
     * @return RedirectResponse
     */
    public function update(SaveExpense $request, Expense $expense)
    {
        $data = $request->validated();

        $expense->update($data);

        session()->flash('success', 'Registro atualizado com sucesso.');

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

        $message = 'Registro excluido com sucesso.';

        if ($request->ajax()) {
            return response()->json(['success' => $message], 200);
        }

        session()->flash('success', $message);

        return redirect()->back(200);
    }
}