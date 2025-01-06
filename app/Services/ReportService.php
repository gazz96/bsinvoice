<?php 

namespace App\Services;

use App\Models\Expense;
use App\Models\Income;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Bill;
use App\Models\BillItem;
use Illuminate\Support\Facades\DB;

class ReportService
{
    
    private $date_start = null;
    private $date_end = null;
    private $year = null;
    private $status = null;

    
    public function fromDate($start, $end)
    {
        $this->date_start = $start;
        $this->date_end = $end;
        return $this;
    }
    
    public function getTotalAmountExpenses()
    {
        return Expense::when($this->date_start, function($query, $date_start){
            return $query->where(DB::raw('DATE(expense_date)'), '>=', $date_start);
        })
        ->when($this->date_end, function($query, $date_end){
            return $query->where(DB::raw('DATE(expense_date)'), '<=', $date_end);
        })->sum('amount');
    }
    
    public function getTotalAmountIncomes()
    {
        return Income::when($this->date_start, function($query, $date_start){
            return $query->where(DB::raw('DATE(income_date)'), '>=', $date_start);
        })
        ->when($this->date_end, function($query, $date_end){
            return $query->where(DB::raw('DATE(income_date)'), '<=', $date_end);
        })->sum('amount');
    }
    
    public function getTotalAmountInvoices()
    {
        $total = InvoiceItem::whereHas('invoice', function(){
            
        })
            ->when($this->status, function($query, $status){
                $query->whereHas('invoice', function($query) use ($status) {
                    if(is_array($status))
                    {
                        return $query->whereIn('status', $status);
                    }
                    return $query->where('status', $status); 
                });
            })
            ->when($this->year, function($query, $year){
                return $query->whereHas('invoice', function($query) use ($year){
                    return $query->whereRaw('YEAR(date) = ?', [$year]); 
                });
            })
            ->get()
            ->sum(function($item){
                return $item->qty * $item->price;
            });
            
        return $total;
    }
    
    public function getYearOptions() 
    {
        $years = Invoice::selectRaw('YEAR(date) as tahun')
            ->groupByRaw('YEAR(date)')
            ->get()
            ->mapWithKeys(function($item, $key){
                return [$item->tahun];
            })
            ->all();
        
        return $years;
    }
    
    public function getExpensePerGroup()
    {
         return Expense::when($this->date_start, function($query, $date_start){
            return $query->where(DB::raw('DATE(expense_date)'), '>=', $date_start);
        })
        ->when($this->date_end, function($query, $date_end){
            return $query->where(DB::raw('DATE(expense_date)'), '<=', $date_end);
        })
        ->sum('amount');
    }
    
    public function getTotalAmountBill()
    {
        $total = BillItem::whereHas('bill', function(){
            
        })
            ->when($this->status, function($query, $status){
                $query->whereHas('bill', function($query) use ($status) {
                    if(is_array($status))
                    {
                        return $query->whereIn('status', $status);
                    }
                    return $query->where('status', $status); 
                });
            })
            ->when($this->year, function($query, $year){
                return $query->whereHas('bill', function($query) use ($year){
                    return $query->whereRaw('YEAR(date) = ?', [$year]); 
                });
            })
            ->get()
            ->sum(function($item){
                return $item->qty * $item->price;
            });
            
        return $total;
    }
    
    public function year($year)
    {
        $this->year = $year;
        return $this;
    }
    
    public function status($status)
    {
        $this->status = $status;
        return $this;
    }
}