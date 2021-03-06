<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Models\Barang;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class BarangController extends Controller
{
    public function index(){
        $barang=Barang::all();
        return view('barang',compact('barang'));
    }
    public function filter(Request $request){

         $barang = new Barang;
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $barang = $barang->whereDate('created_at', '>=', $date_start);
        $barang = $barang->whereDate('created_at', '<=', $date_end)->get();
        return view('barang',compact('barang','date_start','date_end'));
    }
    public function export_excel(Request $request){
        $barang = new Barang;
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $barang = $barang->whereDate('created_at', '>=', $date_start);
        $barang = $barang->whereDate('created_at', '<=', $date_end)->get();
        $count_row = $barang->count();
        return Excel::download(new BarangExport($date_start,$date_end,$count_row), 'lap-barang.xlsx');
    }
    public function export_pdf(Request $request){  
        $data = Barang::whereBetween('created_at', [$request->date_start, $request->date_end])->get();  
        view()->share('data',$data);
        $pdf = PDF::loadView('export.barang',$data);
        return $pdf->download('laporan-barang.pdf');

    }
}
