<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $binhluan= DB::select('select * from binhluan where Date(Thoigian)= ?',[date("Y-m-d")]);
       $tintuc= DB::select('select * from tin where Date(Ngaydangtin)= ?',[date("Y-m-d")]);
        return view('admin/home')->with(['binhluan'=>count($binhluan),'tintuc'=>count($tintuc)]);
    }
}
