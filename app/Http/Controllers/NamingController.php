<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Naming;
use App\Star;
use Illuminate\Support\Facades\DB;

class NamingController extends Controller
{
    public function create(Request $request, $theme_id) {
        //不正なIDならエラー
        $theme = Theme::where('id', $theme_id)->firstOrFail();
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $naming = new Naming();
        $naming->fill($request->all());
        $naming->user_id = $request->user()->id;
        $naming->theme_id = $theme_id;
        $naming->save();

        $request->session()->flash('message', '新しくなづけた名前を登録しました。');

        return redirect('/mypage/namings');
    }

    public function mark(Request $request, $naming_id) {
        $naming = Naming::where('id', $naming_id)->firstOrFail();
        if ($naming->user_id == $request->user()->id) {
            //自分のなづけた名前を採点するとエラー
            abort(400);
        }
        $star = Star::where('user_id', $request->user()->id)->where('naming_id', $naming_id)->first();
        if (empty($star)) {
            $star = new Star();
            $star->user_id = $request->user()->id;
            $star->naming_id = $naming_id;
        }
        $star->point = $request->point;

        DB::beginTransaction();
        $star->save();
        $naming->total_point = $naming->calculateTotalPoint();
        $naming->save();
        DB::commit();

        return ['point' => $star->point];
    }

    public function getTotalPoint(Request $request, $naming_id) {
        $naming = Naming::findOrFail($naming_id);
        return ['totalPoint' => $naming->total_point];
    }
}
