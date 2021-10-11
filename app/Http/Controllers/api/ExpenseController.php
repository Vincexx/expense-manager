<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Http\Requests\Expense\StoreRequest;
use App\Http\Requests\Expense\UpdateRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function list() {
        try {
            $expenses = Expense::latest()->get();
            return response()->json([
                'message' => 'Fetch Successful!',
                'data' => $expenses
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' => 'Categories not found!'
            ], 500);
        }
    }

    public function store(StoreRequest $request) {
        try {
            $expense = Expense::create([
                'user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'amount' => $request->amount,
                'entry_date' => $request->entry_date
            ]);
            return response()->json([
                'message' => 'Expense has been added.'
            ], 201);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }

    public function update(UpdateRequest $request, Expense $expense) {
        try {
            $expense->update($request->only('category_id', 'amount', 'entry_date'));
            return response()->json([
                'message' => 'Expense has been updated.'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }

    public function destroy(Expense $expense) {
        try {
            $expense->delete();
            return response()->json([
                'message' => 'Expense has been deleted.'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'errors' =>  'There is something wrong with our end. Contact us to fix it.'
            ], 500);
        }
    }

}
