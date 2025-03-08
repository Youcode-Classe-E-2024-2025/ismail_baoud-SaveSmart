<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Goal;
use App\Models\Transaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generateStatisticsPdf()
    {
        $transactions = Transaction::with(['category', 'user'])
            ->where('account_id', session('id'))
            ->whereNull('deleted_at')
            ->get();
        $categories = Category::where('account_id', session('id'))->get();
        $users = User::where('account_id', session('id'))->get();
        $goals = Goal::where('account_id' ,'=',session('id'))->orderBy('target_date', 'desc')->get();
        $statistics = [
            'transactions' => $transactions,
            'categories' => $categories,
            'users' => $users,
            'goals' => $goals,
        ];

        // Load a view with statistics
        $pdf = Pdf::loadView('front.pdf', compact('statistics'));

        // Stream the PDF to the browser
        return $pdf->stream('website_statistics.pdf');
    }
}

