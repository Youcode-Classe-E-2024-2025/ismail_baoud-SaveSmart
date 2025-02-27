<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Transaction;

/**
 *
 */
class CategoryController extends Controller
{

    /**
     * @param CategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryRequest $request)
    {
        //here i get the name of category and stock it with the acccount id in the tale of category
        // calidation of data with form request
        $validated = $request->validated();
        //accounnt id from session
        $id = session('id');
        //addd thecategory to database
        Category::create([
            'name' => $validated['name'],
            'account_id' => $id,
        ]);
        //rederect the user to the hoome page with success message
        return to_route('home')->with('success', 'Category created successfully!');
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoryTotalsRevenu()
    {

        $totals = Transaction::selectRaw('category_id, SUM(amount) as total')
            ->where('account_id', session('id'))
            ->whereNull('deleted_at')
            ->whereHas('account', function ($query) {
                $query->where('type', 'revenu');
            })
            ->groupBy('category_id')
            ->with(['category:id,name'])
            ->get();


        return response()->json($totals);
    }



    public function getCategoryTotalsDepense()
    {

        $totals = Transaction::selectRaw('category_id, SUM(amount) as total')
            ->where('account_id', session('id'))
            ->whereNull('deleted_at')
            ->whereHas('account', function ($query) {
                $query->where('type', 'depense');
            })
            ->groupBy('category_id')
            ->with(['category:id,name'])
            ->get();


        return response()->json($totals);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $categorie = Category::findOrFail($id);
        $categorie->delete();
        return redirect()->back()->with('success', 'categorie deleted successfully!');
    }


}
