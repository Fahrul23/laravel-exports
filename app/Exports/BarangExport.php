<?php

namespace App\Exports;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;



class BarangExport implements WithHeadings,WithStyles,WithColumnWidths,FromArray
{
    public function __construct($date_start,$date_end,$count_row)
    {
        $this->count_data = $count_row;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
    }
    public function countcol(){
        return $this->count_data;
    }
    public function headings(): array
    {
        return [
            [' ', 'LAPORAN DATA BARANG BULANAN'],
            [' ', 'BPJS KETENAGAKERJAAN BOGOR'],
            [' ', 'Tahun 2020/2021'],
            [' '],
            [
                'No','Nama Barang','Kategori','harga','stok','tanggal'
            ]
        ];
    }
     public function columnWidths(): array
    {
        return [
            'A' => 7,
            'B' => 25,            
            'C' => 18,            
            'D' =>20,            
            'E' =>18,            
            'F' =>25,            
        ];
    }
    public function styles(Worksheet $sheet)
    {
         $countdata=$this->count_data + 5;
        $row= "A6:";
        $col = "F{$countdata}";
        $countrow = $row . $col; 
        $sheet->mergeCells('B1:E1');
        $sheet->mergeCells('B2:E2');
        $sheet->mergeCells('B3:E3');
        return [
                'B1:B3' => [
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ],
                
                'A5:F5' => [
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ],
                
                "{$countrow}" => [
                    'font' => [
                        'size' => 12,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ], 
            ];
    }
    public function array(): array
    {
        $barang = Barang::whereBetween('created_at', [$this->date_start, $this->date_end])->get();        
        
        $result = [];
        $id = 1;
        foreach($barang as $b){
            $value['id'] = $id++;  
            $value['nama_barang'] = $b->nama_barang;  
            $value['kategori'] = $b->kategori;  
            $value['harga'] = $b->harga;  
            $value['stok'] = $b->stok;  
            $value['tanggal'] = $b->created_at->isoFormat('D-MMMM-Y');
            array_push($result,$value);  
        }

        return $result;


    }

}
