<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use App\Models\Inventory_report;
use App\Models\Venue;

class CaculatingController extends Controller
{
    public function getList()
    {
        $inventories = Inventory::where('status', '=', 'Chờ đánh giá tổng kết')
            ->orderBy('date_inventory', 'desc')->get();
        foreach ($inventories as $inventory) {
            $inventory->user = $inventory->user->full_name;
            $inventory->locate = unserialize($inventory->locate);
            $array_locate = [];
            foreach ($inventory->locate as $id_venue) {
                $venue = Venue::where('id', $id_venue)->first();
                array_push($array_locate, $venue->venue_name);
            }
            $inventory->locate = $array_locate;

            $group = $inventory->group;
            $array_mem = [];
            $inventory->member = false;
            foreach ($group as $tv) {
                if ($tv->user->id == Auth::id()) {
                    $inventory->member = true;
                }
                array_push($array_mem, $tv->user->full_name . ' - ' . $tv->position_inventory);
            }
            $inventory->date_inventory = Carbon::createFromFormat('Y-m-d', $inventory->date_inventory)->format('d/m/Y');
            $inventory->group = $array_mem;
        }

        return view('rate', [
            'inventories' => $inventories,
            'active' => 'rate',
        ]);
    }
    public function rate(Request $request){
        $report = Inventory_report::where('id_inventory', $request->id)->first();
        $report->comments = empty($request->comment)?'':$request->comment;
        $report->notes = empty($request->note)?'':$request->note;


        $report->save();
        return redirect()->route('inven_end', array('id_inventory'=>$request->id));

    }
}
