<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{

    public function index(Request $request)
    {
        $expenses = Expense::when($request->s, function($query, $s){
            return $query->where('name', 'LIKE', '%' . $s . '%');
        })->paginate(20);
        
        return view('expense.index', [
            'expenses' => $expenses,
        ]);
    }

    public function create()
    {
        return view('expense.form', [
            'expense' => new Expense
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable',
            'expense_date' => 'required',
            'amount' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ]);


        $expenseId = $validated['id'] ?? null;
        
        $expense = Auth::user()
            ->expenses()
            ->updateOrCreate(
                ['id' => $expenseId],
                $validated
            );

        return redirect(route('expense.index'))
            ->with('status', 'success')
            ->with('message', 'Berhasim menyimpan');
    }
 
    public function edit(Expense $expense)
    {
        return view('expense.form', [
            'expense' => $expense
        ]);
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }
}
