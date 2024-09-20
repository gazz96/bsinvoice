<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{

    public function index(Request $request)
    {
        $incomes = Income::when($request->s, function($query, $s){
            return $query->where('name', 'LIKE', '%' . $s . '%');
        })->paginate(20);
        
        return view('income.index', [
            'incomes' => $incomes,
        ]);
    }

    public function create()
    {
        return view('income.form', [
            'income' => new Income
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id' => 'nullable',
            'income_date' => 'required',
            'amount' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ]);


        $incomeId = $validated['id'] ?? null;
        
        $income = Auth::user()
            ->incomes()
            ->updateOrCreate(
                ['id' => $incomeId],
                $validated
            );

        return redirect(route('income.index'))
            ->with('status', 'success')
            ->with('message', 'Berhasim menyimpan');
    }
 
    public function edit(Income $income)
    {
        return view('income.form', [
            'income' => $income
        ]);
    }

    public function destroy(Income $income)
    {
        $income->delete();
        return back()
            ->with('status', 'success')
            ->with('message', 'Berhasil menghapus');
    }
}
