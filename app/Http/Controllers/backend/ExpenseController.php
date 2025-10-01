<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense()
    {
        $expenses = Expense::latest()->get();
        return view('backend.expense.expense', compact('expenses'));
    }


    public function expenseAdd()
    {
        return view('backend.expense.expense-add');
    }


    public function expenseStore(Request $request)
    {
        $expense = new Expense();
        $expense->item_name     = $request->item_name;
        $expense->purchase_from = $request->purchase_from;
        $expense->purchase_date = $request->purchase_date;
        $expense->purchased_by  = $request->purchased_by;
        $expense->amount        = $request->amount;
        $expense->paid_by       = $request->paid_by;
        $expense->status        = $request->status;

     
       if (isset($request->image)) {
            $imageName = rand() . '.' . 'expense' . '.' . $request->image->extension();
            $request->image->move('backend/images/expense/', $imageName);
            $expense->image = $imageName;
        }

        $expense->save();

        return redirect('/admin/expense');
    }

   
    public function expenseView($id)
    {
        $expense = Expense::findOrFail($id);
        return view('backend.expense.expense-view', compact('expense'));
    }

   
    public function expenseEdit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('backend.expense.expense-edit', compact('expense'));
    }

    
    public function expenseUpdate(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);

        $expense->item_name     = $request->item_name;
        $expense->purchase_from = $request->purchase_from;
        $expense->purchase_date = $request->purchase_date;
        $expense->purchased_by  = $request->purchased_by;
        $expense->amount        = $request->amount;
        $expense->paid_by       = $request->paid_by;
        $expense->status        = $request->status;

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');


            if ($expense->image && file_exists(public_path('backend/images/expenses/' . $expense->image))) {
                unlink(public_path('backend/images/expenses/' . $expense->image));
            }


            $imageName = rand() . '-expense' . '.' . $image->extension();
            $image->move(public_path('backend/images/expenses/'), $imageName);
            $expense->image = $imageName;
        }

        $expense->save();

        return redirect('/admin/expense');
    }


    public function expenseDelete($id)
    {
        $expense = Expense::findOrFail($id);

        if ($expense->attachment && file_exists(public_path($expense->attachment))) {
            unlink(public_path($expense->attachment));
        }

        $expense->delete();

        return redirect('/admin/expense');
    }
}
