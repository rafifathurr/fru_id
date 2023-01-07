<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\order\Order;
use App\Models\product\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use DateTime;

use Illuminate\Http\Request;

class DashboardControllers extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Index View and Scope Data
    public function index()
    {
        // SAMPLE
        $allorder = Order::whereRaw('MONTH(date) = MONTH(now())')
        ->select(DB::raw('product_id, sum(qty) as total'))
        ->groupBy(DB::raw('product_id'))
        ->get();

        $month = range(1,12);
        $year=range(date('Y')-4, date('Y'));

        // RETURN DATA
        $data['title'] = "Dashboard";
        $data['orders'] = Order::all();
        $data['dayofweeks'] = Order::whereRaw('date >= DATE(NOW() - INTERVAL 7 DAY)')
                            ->where('is_deleted',null)
                            ->orderBy('date', 'ASC')
                            ->select(DB::raw('DATE_FORMAT(date, "%a") as name_day'))
                            ->get();
        $data['calofday'] = Order::whereRaw('date >= DATE(NOW() - INTERVAL 7 DAY)')
                            ->where('is_deleted',null)
                            ->select(DB::raw('count(*) as total'))
                            ->orderBy('date', 'ASC')
                            ->groupBy('date')
                            ->get();
        $data['profitmonth'] = Order::whereRaw('date <= NOW() and date >= Date_add(Now(),interval - 12 month)')
                            ->where('is_deleted',null)
                            ->select(DB::raw('sum(profit) as profit'))
                            ->orderBy(DB::raw('DATE_FORMAT(date, "%b")'), 'ASC')
                            ->groupBy(DB::raw('DATE_FORMAT(date, "%b")'))
                            ->get();
        $data['countorderall'] = count(Order::all()->where('is_deleted',null));
        $data['countorderyear'] = count(Order::whereYear('date', Carbon::now()->year)->where('is_deleted',null)->get());
        $data['countorderlastyear'] = count(Order::whereYear('date', (Carbon::now()->year)-1)->where('is_deleted',null)->get());
        $data['countordermonth'] = count(Order::whereMonth('date', Carbon::now()->month)
                                            ->where('is_deleted',null)
                                            ->whereRaw('YEAR(date) = YEAR(now())')
                                            ->get());
        $data['countorderlastmonth'] = count(Order::whereMonth('date', Carbon::now()->month-1)
                                                ->where('is_deleted',null)
                                                ->whereRaw('YEAR(date) = YEAR(now())')
                                                ->get());
        $data['countorderday'] = count(Order::whereRaw('DAY(date) = DAY(now())')
                                        ->where('is_deleted',null)
                                        ->whereRaw('YEAR(date) = YEAR(now())')
                                        ->get());
        $data['countorderlastday'] = count(Order::whereRaw('DAY(date) = (DAY(now())-1)')
                                            ->where('is_deleted',null)
                                            ->whereRaw('YEAR(date) = YEAR(now())')
                                            ->get());
        $data['totalincome'] = Order::whereMonth('date', Carbon::now()->month)
                                ->where('is_deleted',null)
                                ->whereRaw('YEAR(date) = YEAR(now())')
                                ->sum('entry_price');
        $data['totalincomelast'] = Order::whereMonth('date', Carbon::now()->month-1)
                                    ->where('is_deleted',null)
                                    ->whereRaw('YEAR(date) = YEAR(now())')
                                    ->sum('entry_price');
        $data['totalprofit'] = Order::whereMonth('date', Carbon::now()->month)
                                ->where('is_deleted',null)
                                ->whereRaw('YEAR(date) = YEAR(now())')
                                ->sum('profit');
        $data['totalprofitlast'] = Order::whereMonth('date', Carbon::now()->month-1)
                                    ->where('is_deleted',null)
                                    ->whereRaw('YEAR(date) = YEAR(now())')
                                    ->sum('profit');
        $data['totaltax'] = Order::whereMonth('date', Carbon::now()->month)
                            ->where('is_deleted',null)
                            ->whereRaw('YEAR(date) = YEAR(now())')
                            ->sum('tax');
        $data['totaltaxlast'] = Order::whereMonth('date', Carbon::now()->month-1)
                                ->where('is_deleted',null)
                                ->whereRaw('YEAR(date) = YEAR(now())')
                                ->sum('tax');
        $data['incomepermonth'] = Order::whereYear('date', Carbon::now()->year)
                                ->where('is_deleted',null)
                                ->selectRaw('sum(entry_price) as income')
                                ->groupBy(DB::raw('MONTH(date)'))
                                ->orderBy(DB::raw('MONTH(date)'), 'ASC')
                                ->get();

        foreach($year as $y){
            $data['years'][] = array(strval($y));
            $checkstat = Order::whereYear('date', $y)
                                ->where('is_deleted',null)
                                ->selectRaw('sum(profit) as profit')
                                ->orderBy(DB::raw('YEAR(date)'), 'ASC')
                                ->groupBy(DB::raw('YEAR(date)'))
                                ->first();
            $profityear = Order::whereYear('date', $y)
                                ->where('is_deleted',null)
                                ->selectRaw('sum(profit) as profit')
                                ->orderBy(DB::raw('YEAR(date)'), 'ASC')
                                ->groupBy(DB::raw('YEAR(date)'))
                                ->get();
            if($checkstat){
                foreach($profityear as $profit){
                    if($profit->profit){
                        $data['profityear'][] = array($profit->profit);
                    }else{
                        $data['profityear'][] = array('0');
                    }
                }
            }else{
                $data['profityear'][] = array('0');
            }
        }

        foreach($month as $mon){
            $dateObj   = DateTime::createFromFormat('!m', $mon);
            $monthName = $dateObj->format('F');
            $data['month'][]=array('month'=>$monthName);
            $checkstat = Order::whereYear('date', Carbon::now()->year)
                                ->where('is_deleted',null)
                                ->whereMonth('date', $mon)
                                ->selectRaw('sum(profit) as profit')
                                ->orderBy(DB::raw('MONTH(date)'), 'ASC')
                                ->groupBy(DB::raw('MONTH(date)'))
                                ->first();
            $profitmonth = Order::whereYear('date', Carbon::now()->year)
                                ->where('is_deleted',null)
                                ->whereMonth('date', $mon)
                                ->selectRaw('sum(profit) as profit')
                                ->orderBy(DB::raw('MONTH(date)'), 'ASC')
                                ->groupBy(DB::raw('MONTH(date)'))
                                ->get();
            if($checkstat){
                foreach($profitmonth as $profit){
                    if($profit->profit){
                        $data['profitpermonth'][] = array($profit->profit);
                    }else{
                        $data['profitpermonth'][] = array('0');
                    }
                }
            }else{
                $data['profitpermonth'][] = array('0');
            }
        }

        $data['topproduct'] = Order::whereYear('date', Carbon::now()->year)
                                ->whereRaw('MONTH(date) = MONTH(now())')
                                ->where('is_deleted',null)
                                ->select(DB::raw('product_id, sum(qty) as total'))
                                ->groupBy(DB::raw('product_id'))
                                ->get();
        $data['topsource'] = Order::whereYear('date', Carbon::now()->year)
                                ->whereRaw('MONTH(date) = MONTH(now())')
                                ->where('is_deleted',null)
                                ->select(DB::raw('source_id, count(*) as total'))
                                ->groupBy(DB::raw('source_id'))
                                ->get();

        // RETURN VIEW
        return view('dashboard', $data);
    }
}
