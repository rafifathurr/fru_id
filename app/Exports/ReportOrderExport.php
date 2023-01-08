<?php

namespace App\Exports;

use App\Models\order\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Ramsey\Uuid\Type\Integer;

class ReportOrderExport implements FromCollection
{
    
    protected $year, $month;

    public function __construct($year){
        $this->year = $year;
    }

    public function collection()
    {
        return Order::all();
    }
}
