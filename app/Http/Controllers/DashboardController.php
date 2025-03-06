<?php

namespace App\Http\Controllers;
use App\Dto\booksDTO;
use App\Dto\profilesDTO;
use App\Models\Account;
use App\Models\book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

/**
 *
 */
class DashboardController extends Controller
{

    public function showHome(){
        $id = session('id');
        $user_id = session('user_id');

        $totalRevenu = Transaction::where('user_id', $user_id)
            ->where('type', 'revenu')
            ->sum('amount');
        $totalDepense = Transaction::where('user_id', $user_id)
            ->where('type', 'depense')
            ->sum('amount');
        $totalFix= Transaction::where('user_id', $user_id)
            ->where('type', 'depense')
            ->where('status', 'fix')
            ->sum('amount');
        $totalVariable = Transaction::where('user_id', $user_id)
            ->where('type', 'depense')
            ->where('status', 'variable')
            ->sum('amount');
        //categories
        $categories = Category::all()->where('account_id','=',$id);

        //Transactions
        $transactions = Transaction::with(['category', 'user'])
            ->where('account_id', $id)
            ->whereNull('deleted_at')
            ->get();
        $balance = User::where('id', session('user_id'))->first()->balence;
        $algorithm = $this->obtimisation_algorithm($totalRevenu);
        $algorithm2 = $this->obtimisation_algorithm2($totalRevenu ,$totalFix,$totalVariable);

        $optimizedBudget = $this->budget_optimization($totalRevenu, $totalFix, $totalVariable);

        return view('front.home', [
            'categories' => $categories,
            'transactions' => $transactions,
            'totalRevenu' => $totalRevenu,
            'totalDepense' => $totalDepense,
            'balence' => $balance,
            'algorithm' => $algorithm,
            'algorithm2' => $algorithm2,
            'optimizedBudget' => $optimizedBudget,
        ]);

    }

    /**
     * @return void
     */
    public function showUserDashboard(){

        session()->forget('user_id');
        $id = session('id');
        $users = User::all()->where('account_id', '=',$id )->map(fn($a) => new profilesDTO(
            $a->id,
            $a->firstName . ' ' . $a->lastName,
            $a->image,
            $a->created_at,
        ));
        return view('front.dashboard')->with('profiles', $users);
    }

    public function obtimisation_algorithm($revenu, $taux_besoins = 0.5, $taux_envies = 0.3, $taux_epargne = 0.2){
        $besoins = $revenu * $taux_besoins;
        $envies = $revenu * $taux_envies;
        $epargne = $revenu * $taux_epargne;


        return [
            'besoins' => $besoins,
            'envies' => $envies,
            'epargne' => $epargne,
        ];
    }
    public function obtimisation_algorithm2($revenu, $depense_fix, $depense_variable , $taux_epargne = 0.2){
            $epargne = $revenu * $taux_epargne;
            $rest = $revenu - ($depense_fix + $depense_variable) ;

            if($rest < 0){
                $depense_variable = $rest + $depense_variable;
                $rest =0;
            }

        return [
            'epargne' => $epargne,
            'rest' => $rest,
            'depenses_fix' => $depense_fix,
            'depense_variable' => $depense_variable,
        ];
    }

    public function budget_optimization($revenu, $depense_fix, $depense_variable)
    {
        $remainingBalance = $revenu - ($depense_fix + $depense_variable);

        $optimizedExpenses = [
            'fixed_expenses' => $depense_fix,
            'variable_expenses' => $depense_variable,
        ];

        if ($remainingBalance < 0) {
            $optimizedExpenses['variable_expenses'] = $depense_variable + $remainingBalance;
            $remainingBalance = 0;
        }

        $optimizedExpenses['variable_expenses'] = max(0, $optimizedExpenses['variable_expenses']);
        $optimizedExpenses['fixed_expenses'] = max(0, $optimizedExpenses['fixed_expenses']);

        return [
            'remaining_balance' => $remainingBalance,
            'optimized_expenses' => $optimizedExpenses
        ];
    }
}
