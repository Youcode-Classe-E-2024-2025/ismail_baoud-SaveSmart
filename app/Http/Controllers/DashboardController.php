<?php

namespace App\Http\Controllers;
use App\Dto\profilesDTO;
use App\Models\Account;
use App\Models\Category;
use App\Models\Goal;
use App\Models\Transaction;
use App\Models\User;
use carbon\carbon;

/**
 *
 */
class DashboardController extends Controller
{

    public function showHome(){
        $id = session('id');
        $user_id = session('id');

        $totalRevenu = Transaction::where('account_id', $user_id)
            ->where('type', 'revenu')
            ->sum('amount');
        $totalDepense = Transaction::where('account_id', $user_id)
            ->where('type', 'depense')
            ->sum('amount');
        $totalFix= Transaction::where('account_id', $user_id)
            ->where('type', 'depense')
            ->where('status', 'fix')
            ->sum('amount');
        $totalVariable = Transaction::where('account_id', $user_id)
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

        $balance = Account::where('id', session('id'))->first()->balence;
        $algorithm = $this->obtimisation_algorithm($totalRevenu);
        $algorithm2 = $this->obtimisation_algorithm2($totalRevenu ,$totalFix,$totalVariable);

        return view('front.home', [
            'categories' => $categories,
            'transactions' => $transactions,
            'totalRevenu' => $totalRevenu,
            'totalDepense' => $totalDepense,
            'balence' => $balance,
            'algorithm' => $algorithm,
            'algorithm2' => $algorithm2,
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



}
