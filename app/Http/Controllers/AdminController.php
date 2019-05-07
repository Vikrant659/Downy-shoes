<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Order;
use App\User;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


// Admin login request is handled here
    public function signin(Request $request)
    {
        if($request->isMethod('post'))
        {
            $data=$request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'1'])){
              
                return redirect('/admin/index');
            }
            else
            {
                return view('admin.adminlogin');
            }
        }  
        return view('admin.adminlogin');
    }
// Dashboard dynamic charts of users and transactions
    public function dashboard()
    {
        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Transactions by dates',
            'report_type' => 'group_by_date',
            'model' => 'App\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total_Price',
            'chart_type' => 'line',
        ];
    
        $chart1 = new LaravelChart($chart_options);
    
        return view('admin.index', compact('chart','chart1'));
        
    }

    public function signout()
    {
        Session::flush();
        return view('admin.adminlogin');
    } 
    
    // To show number of users registered on Admin
    public function showuser()
    {
        $users = User::all();
        return view('admin.viewuser',compact('users'));
    }
}
