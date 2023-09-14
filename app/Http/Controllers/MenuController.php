<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Retrieve unique years from the Menu table
        $years = Menu::select(DB::raw('YEAR(tanggal) as year'))->distinct()->pluck('year');

        // Selected default year (can be changed as needed)
        $selectedYear = request('tahun', date('Y'));

        // Retrieve data based on the selected year
        $totalMonths = [];
        for ($i = 1; $i <= 12; $i++) {
            $total = Menu::whereYear('tanggal', $selectedYear)
                ->whereMonth('tanggal', str_pad($i, 2, '0', STR_PAD_LEFT))
                ->sum('total');
            $totalMonths["total" . date('M', mktime(0, 0, 0, $i, 1))] = $total > 0 ? $total : '';
        }

        $data = [
            'makanan' => Menu::where('category', 'makanan')->get(),
            'minuman' => Menu::where('category', 'minuman')->get(),
            'totalMonths' => $totalMonths,
            'totals' => Menu::whereYear('tanggal', $selectedYear)->sum('total'),
            'years' => $years, // Unique years
            'selectedYear' => $selectedYear, // Selected year
        ];

        return view('menu.all', $data);
    }


    /**
     * Display a listing of the resource.
     */
    public function jsonTransaksi(Request $request)
    {
        $all = Menu::get(['tanggal', 'menu', 'total']); // Ambil hanya atribut-atribut yang Anda inginkan

        // Filter item dengan nilai null
        $filteredData = [];
        foreach ($all as $item) {
            if ($item['tanggal'] !== null && $item['menu'] !== null && $item['total'] !== null) {
                $filteredData[] = $item;
            }
        }

        $jsonData = json_encode($filteredData);
        return $jsonData;
    }

    /**
     * Display a listing of the resource.
     */
    public function jsonMenu(Request $request)
    {
        $all = Menu::get(['menu', 'category']); // Ambil hanya atribut-atribut yang Anda inginkan
        $jsonData = json_encode($all);
        return $jsonData;
    }
}
