<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\TestRemind;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function create(Request $request)
    {
        $request->validate([
           'task' => 'required',
        ]);

        $nowDt = Carbon::now();
        //それぞれ選択している期限の分、日数加算
        if($request->input('deadline') == 1){
            $nowDt->addWeek();
        }else if($request->input('deadline') == 2){
            $nowDt->addWeek(2);
        }if($request->input('deadline') == 3){
        $nowDt->addWeek(3);
        }

        TestRemind::create([
            'task' => $request->input('task'),
            'deadline' => $nowDt
        ]);
        return redirect()->route('dashboard');
    }

    public function sort(Request $request)
    {
        $nowDt = Carbon::now()->addWeek();
        $sortDates = TestRemind::whereDate('deadLine','<=',$nowDt)->oldest('deadLine')->get();

        $dates = TestRemind::all();

        //検索
        $keyWord = $request->input('keyWord');
        if($keyWord !== "")
        {
            $dates = TestRemind::where('task','like','%'.$keyWord.'%')->get();
        }


        $user = Auth::user()->two_factor_secret;
        if($user === null){
            return view('profile/show');
        }

        if($request->item === null)
        {
            $bbb =' ';
        }
        else
        {
            $bbb = $request->item;
            $request->item = '';
        }

        return view('dashboard', compact('dates','bbb','sortDates'));
    }

    public function counter(Request $request)
    {
        return view('livewire/counter');
    }


}
