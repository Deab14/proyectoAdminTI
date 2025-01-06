<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function saveToAllDatabases(Request $request)
    {
        $database = $request->input('database');

        if ($database === 'all') {
            $this->saveToDatabase($request, 'sqlsrv');
            $this->saveToDatabase($request, 'oracle');
            $this->saveToDatabase($request, 'pgsql');
            return redirect()->back()->with('success', 'Producto guardado en todas las bases de datos');
        } else {
            $this->saveToDatabase($request, $database);
            return redirect()->back()->with('success', 'Producto guardado en ' . ucfirst($database));
        }
    }

    private function saveToDatabase(Request $request, $connection)
    {
        if ($connection === 'sqlsrv') {
            $table = 'product';
        } elseif ($connection === 'oracle') {
            $table = 'productos';
        } elseif ($connection === 'pgsql') {
            $table = 'products';
        }

        if (empty($table)) {
            return redirect()->back()->with('error', 'Nombre de tabla no válido para la conexión especificada.');
        }

        DB::connection($connection)->table($table)->insert([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'precio' => $request->input('precio'),
        ]);

        return redirect()->back()->with('success', 'Producto guardado en la base de datos seleccionada.');
    }

    public function showKpi()
    {
        // Obtener los productos y sus cantidades en cada base de datos
        $sqlsrvProducts = DB::connection('sqlsrv')->table('product')
            ->select('nombre', DB::raw('count(*) as total'))
            ->groupBy('nombre')
            ->get();

        $oracleProducts = DB::connection('oracle')->table('productos')
            ->select('nombre', DB::raw('count(*) as total'))
            ->groupBy('nombre')
            ->get();

        $pgsqlProducts = DB::connection('pgsql')->table('products')
            ->select('nombre', DB::raw('count(*) as total'))
            ->groupBy('nombre')
            ->get();

        if (request()->ajax()) {
            return response()->json([
                'sqlsrvProducts' => $sqlsrvProducts,
                'oracleProducts' => $oracleProducts,
                'pgsqlProducts' => $pgsqlProducts,
            ]);
        }

        return view('kpi', compact('sqlsrvProducts', 'oracleProducts', 'pgsqlProducts'));
    }
}

