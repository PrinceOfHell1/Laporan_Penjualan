<?php

namespace App\Http\Controllers;

use App\Models\CategoryMenu;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $totalMonths = [];
        for ($i = 1; $i <= 12; $i++) {
            $totalMonths["total" . date('M', mktime(0, 0, 0, $i, 1))] = Menu::whereMonth('tanggal', str_pad($i, 2, '0', STR_PAD_LEFT))->sum('total');
        }

        $data = [
            'makanan' => Menu::where('category_id', 1)->get(),
            'minuman' => Menu::where('category_id', 2)->get(),
            'totalMonths' => $totalMonths,
            'totals' => Menu::sum('total'),
        ];

        return view('menu.all', $data);
    }

    /**
     * Display a listing of the resource.
     */
    public function json(Request $request)
    {
        $all = Menu::whereYear('tanggal', 2022)->get();
        return view('menu.json', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
