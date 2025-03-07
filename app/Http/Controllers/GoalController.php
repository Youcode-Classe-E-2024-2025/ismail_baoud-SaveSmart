<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Goal;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = session('user_id');


        $saving = User::find($userId)->saved;

        $goals = Goal::where('account_id' ,'=',session('id'))->orderBy('target_date', 'desc')->get();
        $balance = Account::where('id', session('id'))->first()->balence;
        $optimizedBudget = $this->allocateFunds($goals , $balance);

        return view('front.goals')->with(['goals'=> $goals,'balance'=> $balance, 'userId'=>$userId, 'saving'=>$saving ,'allocated_goals' => $optimizedBudget]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){

        return view('goals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'target' => 'required|numeric',
            'target_date' => 'required',
        ]);
        Goal::create([
            'title' =>$validatedData['title'],
            'target' =>$validatedData['target'],
            'target_date' =>$validatedData['target_date'],
            'user_id'=>session('user_id'),
            'account_id'=>session('id')]);

        return back()->with('success', 'Goal Created Successfully');
    }


    public function show(goal $goal)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(goal $goal)
    {
        return view('goals.edit', compact('goal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, goal $goal)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'target' => 'required',
            'saved' => 'required',
            'target_date' => 'required',
        ]);
    }

    public function allocateFunds($goals, $available_balance)
    {

        $allocatable_balance = $available_balance * 0.2;

        $total_target_amount = 0;
        foreach ($goals as $goal) {
            $total_target_amount += $goal->target;
        }

        if ($total_target_amount == 0) {
            $result = [];
            foreach ($goals as $goal) {
                $result[] = ['goal' => $goal, 'allocated' => 0];
            }
            return $result;
        }

        $result = [];
        foreach ($goals as $goal) {
            $remaining_target = $goal->target;
            $allocated_amount = ($remaining_target / $total_target_amount) * $allocatable_balance;
            $completion_date = Carbon::today()->addDays(ceil($remaining_target / max(1, $allocated_amount)))->format('Y-m-d');
            $result[] = [
                'goal' => $goal,
                'allocated' => round($allocated_amount, 2),
                'completion_date' => $completion_date
            ];
        }

        return $result;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(goal $goal)
    {
        $goal->delete();
        return back()->with('success', 'Goal Deleted Successfully');
    }
}
