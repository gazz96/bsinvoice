<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Services\ReportService;

class ReportController extends Controller
{
    function index()
    {
        return view('report.index');
    }
    
    public function profitLoss(Request $request)
    {
        $report = new ReportService;
        
        $report->year($request->year);
        $report->fromDate($request->start_date, $request->end_date);
        
        if($request->status == 2)
        {
            $report->status('Paid');   
        }
        
        
        $income = $report->getTotalAmountIncomes();
        $invoice = $report->getTotalAmountInvoices();
        $expense = $report->getTotalAmountExpenses();
        
        
        
        return view('report.profit-loss', [
            'income' => $income,
            'invoice' => $invoice,
            'expense' => $expense,
            'net' => $income + $invoice - $expense,
            'years' => $report->getYearOptions()
        ]);
    }
    
    public function balanceSheet(Request $request)
    {
        $report = new ReportService;
        
        $report->year($request->year);
        $report->fromDate($request->start_date, $request->end_date);
        $report->status($request->status == 2 ? 'Paid' : ['Paid', 'Unpaid']);
        
        
        $income = $report->getTotalAmountIncomes();
        $invoice = $report->getTotalAmountInvoices();
        $bill = $report->getTotalAmountBill();
        
        return view('report.balance-sheet', [
            'income' => $income,
            'invoice' => $invoice,
            'net' => $income + $invoice - $bill,
            'years' => $report->getYearOptions(),
            'bill' => $bill
        ]);
    }
}
