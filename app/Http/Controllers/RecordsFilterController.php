<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Expense;
use Carbon\Carbon;


class RecordsFilterController extends Controller
{

    public function showEntities()
    {
        $cruds = Purchase::all(); 
        $totalAmount = $cruds->sum('total_price');
        $purchase = [
            'cruds' => $cruds,
            'totalAmount' => $totalAmount
        ];

        $cruds = Sale::all();
        $totalAmount = $cruds->sum('total_price');
        
        $sale = [
            'cruds' => $cruds,
            'totalAmount' => $totalAmount
        ];

        $cruds = Employee::all();
        $totalAmount = $cruds->sum('pay');

        $employee = [
            'cruds' => $cruds,
            'totalAmount' => $totalAmount
        ];

        $cruds = Expense::all();
        $totalAmount = $cruds->sum('amount');

        $expense = [
            'cruds' => $cruds,
            'totalAmount' => $totalAmount
        ];
        
        return view('show_entities', ['purchase' => $purchase, 'sale' => $sale, 'employee' => $employee, 'expense' => $expense]);
    }


    public function showPurchases(Request $request)
    {
        $query = Purchase::query();
        if ($request->filled('fromDate') && $request->filled('toDate')) {
            $query->whereBetween('date', [$request->fromDate, $request->toDate]);
        }

        if ($request->filled('supplierName')) {
            $query->where('supplier', 'like', '%' . $request->supplierName . '%');
        }

        if($query) {
            $cruds = $query->get();
            $totalAmount = $cruds->sum('total_price');
            return view('show_purchases', ['cruds' => $cruds, 'totalAmount' => $totalAmount]);
        }
        $cruds = Purchase::all(); 
        $totalAmount = $cruds->sum('total_price');
 
        return view('show_purchases', ['cruds' => $cruds, 'totalAmount' => $totalAmount]);
    }

    public function showSales(Request $request)
    {
        $query = Sale::query();
        if ($request->filled('fromDate') && $request->filled('toDate')) {
            $query->whereBetween('date', [$request->fromDate, $request->toDate]);
        }

        if ($request->filled('customerName')) {
            $query->where('supplier', 'like', '%' . $request->customerName . '%');
        }

        if($query) {
            $cruds = $query->get();
            $totalAmount = $cruds->sum('total_price');
            return view('show_sales', ['cruds' => $cruds, 'totalAmount' => $totalAmount]);
        }

        $cruds = Sale::all();
        $totalAmount = $cruds->sum('total_price');  
        return view('show_sales', ['cruds' => $cruds, 'totalAmount' => $totalAmount]);
    }

    public function showEmployees(Request $request)
    {
        $query = Employee::query();
        if ($request->filled('fromDate') && $request->filled('toDate')) {
            $query->whereBetween('date', [$request->fromDate, $request->toDate]);
        }

        if ($request->filled('supplierName')) {
            $query->where('name', 'like', '%' . $request->supplierName . '%');
        }

        if($query) {
            $cruds = $query->get();
            $totalAmount = $cruds->sum('pay');
            return view('show_employees', ['cruds' => $cruds, 'totalAmount' => $totalAmount]);
        }
        $cruds = Employee::all();
        $totalAmount = $cruds->sum('pay');
  
        return view('show_employees', ['cruds' => $cruds, 'totalAmount' => $totalAmount]);      
    }

    public function showExpenses(Request $request)
    {
        $query = Expense::query();
        if ($request->filled('fromDate') && $request->filled('toDate')) {
            $query->whereBetween('date', [$request->fromDate, $request->toDate]);
        }

        if ($request->filled('supplierName')) {
            $query->where('expenses', 'like', '%' . $request->supplierName . '%');
        }

        if($query) {
            $cruds = $query->get();
            $totalAmount = $cruds->sum('amount');
            return view('show_expenses', ['cruds' => $cruds, 'totalAmount' => $totalAmount]);
        }
        $cruds = Expense::all();
        $totalAmount = $cruds->sum('amount');
        
        return view('show_expenses', ['cruds' => $cruds, 'totalAmount' => $totalAmount]);
    }

    public function showPurchaseReport(Request $request)
    {
        $startDate = $request->input('fromDate');
        $endDate = $request->input('toDate');
        
        // Fetch distinct suppliers and their total prices for each date within the date range
        $cruds = Purchase::whereBetween('date', [$startDate, $endDate])
            ->select('supplier', 'date', \DB::raw('SUM(total_price) as total_price'))
            ->groupBy('supplier', 'date')
            ->get();
        
        // Extract unique suppliers
        $suppliers = $cruds->pluck('supplier')->unique();
        
        // Group data by supplier and date
        $groupedData = $cruds->groupBy('supplier')->map(function ($supplierGroup) {
            return [
                'total_price' => $supplierGroup->sum('total_price'),
                'dates' => $supplierGroup->groupBy('date')->map(function ($dateGroup) {
                    return $dateGroup->sum('total_price');
                })
            ];
        });
        
        return view('p_s_r', [
            'startDate' => $startDate, 
            'endDate' => $endDate, 
            'groupedData' => $groupedData, 
            'cruds' => $cruds, 
            'suppliers' => $suppliers,
            'column' => 'total_price',  
            'report' => 'Purchase Report',
            'entity' => 'Supplier'
        ]);        
    }

    public function showSaleReport(Request $request)
    {
        $startDate = $request->input('fromDate');
        $endDate = $request->input('toDate');

        $cruds = Sale::whereBetween('date', [$startDate, $endDate])
        ->select('category', 'date', \DB::raw('SUM(total_price) as total_price'))
        ->groupBy('category', 'date')
        ->get();
        
        // Extract unique suppliers
        $suppliers = $cruds->pluck('category')->unique();
        
        // Group data by supplier and date
        $groupedData = $cruds->groupBy('category')->map(function ($supplierGroup) {
            return [
                'total_price' => $supplierGroup->sum('total_price'),
                'dates' => $supplierGroup->groupBy('date')->map(function ($dateGroup) {
                    return $dateGroup->sum('total_price');
                })
            ];
        });
        
        return view('p_s_r', [
            'startDate' => $startDate, 
            'endDate' => $endDate, 
            'groupedData' => $groupedData, 
            'cruds' => $cruds, 
            'suppliers' => $suppliers,
            'column' => 'total_price', 
            'report' => 'Sale Report',
            'entity' => 'Category'
        ]);        
    }

    public function showExpenseReport(Request $request)
    {
        $startDate = $request->input('fromDate');
        $endDate = $request->input('toDate');
        
        // Fetch distinct suppliers and their total prices for each date within the date range
        $cruds = Expense::whereBetween('date', [$startDate, $endDate])
            ->select('expenses', 'date', \DB::raw('SUM(amount) as amount'))
            ->groupBy('expenses', 'date')
            ->get();
        
        // Extract unique suppliers
        $suppliers = $cruds->pluck('expenses')->unique();
        
        // Group data by supplier and date
        $groupedData = $cruds->groupBy('expenses')->map(function ($supplierGroup) {
            return [
                'amount' => $supplierGroup->sum('amount'),
                'dates' => $supplierGroup->groupBy('date')->map(function ($dateGroup) {
                    return $dateGroup->sum('amount');
                })
            ];
        });
        
        return view('p_s_r', [
            'startDate' => $startDate, 
            'endDate' => $endDate, 
            'groupedData' => $groupedData, 
            'cruds' => $cruds, 
            'suppliers' => $suppliers,
            'column' => 'amount',  
            'report' => 'Expense Report',
            'entity' => 'Expense'
        ]);        
    }

    public function showEmployeeReport(Request $request)
    {
        $startDate = $request->input('fromDate');
        $endDate = $request->input('toDate');
        
        // Fetch distinct suppliers and their total prices for each date within the date range
        $cruds = Employee::whereBetween('date', [$startDate, $endDate])
            ->select('name', 'date', \DB::raw('SUM(pay) as pay'))
            ->groupBy('name', 'date')
            ->get();
        
        // Extract unique suppliers
        $suppliers = $cruds->pluck('name')->unique();
        
        // Group data by supplier and date
        $groupedData = $cruds->groupBy('name')->map(function ($supplierGroup) {
            return [
                'pay' => $supplierGroup->sum('pay'),
                'dates' => $supplierGroup->groupBy('date')->map(function ($dateGroup) {
                    return $dateGroup->sum('pay');
                })
            ];
        });
        
        return view('p_s_r', [
            'startDate' => $startDate, 
            'endDate' => $endDate, 
            'groupedData' => $groupedData, 
            'cruds' => $cruds, 
            'suppliers' => $suppliers,
            'column' => 'pay',  
            'report' => 'Employee Report',
            'entity' => 'Employee'
        ]);        
    }

    public function showEntitiesReport(Request $request)
{
    $startDate = $request->input('fromDate');
    $endDate = $request->input('toDate');

    $purchase = $this->getReportData(Purchase::class, $startDate, $endDate, 'supplier', 'total_price', 'Purchase Report', 'Supplier');
    $category = $this->getReportData(Sale::class, $startDate, $endDate, 'category', 'total_price', 'Sale Report', 'Category');
    $employee = $this->getReportData(Employee::class, $startDate, $endDate, 'name', 'pay', 'Employee Report', 'Employee');
    $expense = $this->getReportData(Expense::class, $startDate, $endDate, 'expenses', 'amount', 'Expense Report', 'Expense');

    return view('xyz', compact('purchase', 'category', 'employee', 'expense'));
}

private function getReportData($model, $startDate, $endDate, $groupByField, $sumField, $reportName, $entityName)
{
    $cruds = $model::whereBetween('date', [$startDate, $endDate])
        ->select($groupByField, 'date', \DB::raw("SUM($sumField) as $sumField"))
        ->groupBy($groupByField, 'date')
        ->get();

    $suppliers = $cruds->pluck($groupByField)->unique();

    $groupedData = $cruds->groupBy($groupByField)->map(function ($group) use ($sumField) {
        return [
            $sumField => $group->sum($sumField),
            'dates' => $group->groupBy('date')->map(function ($dateGroup) use ($sumField) {
                return $dateGroup->sum($sumField);
            })
        ];
    });

    return [
        'startDate' => $startDate,
        'endDate' => $endDate,
        'groupedData' => $groupedData,
        'cruds' => $cruds,
        'suppliers' => $suppliers,
        'column' => $sumField,
        'report' => $reportName,
        'entity' => $entityName
    ];
}
    
}
