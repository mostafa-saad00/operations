<?php

namespace App\Http\Controllers;

use App\Models\Kitchenitem;
use Illuminate\Http\Request;
use App\Models\Kitchendailydistribution;
use Illuminate\Support\Facades\Validator;
use App\Models\Kitchendailydistributionitem;
use App\Http\Requests\KitchendailydistributionFormRequest;

class KitchendailydistributionController extends Controller
{
    public function create()
    {
        return view('kitchendailydistribution.create');
    }

    public function store(KitchendailydistributionFormRequest $request)
    {
        $date = $request->date;

        if($request->date == null)
        {
            $date = date("Y-m-d");
        }

        
        $kitchendailydistribution = Kitchendailydistribution::create([
            'date' => $date,
            'day' => strtolower(date('l', strtotime($date))),
            'officers_number' => $request->officers_number,
            'amens_number' => $request->amens_number,
            'soliders_number' => $request->soliders_number,
        ]);
        

        //define the season
        if(date("m",strtotime($date)) == '11' || date("m",strtotime($date)) == '12' || date("m",strtotime($date)) == '01' || date("m",strtotime($date)) == '02')
        {
            $season = "winter";
        }
        else
        {
            $season = "summer";
        }

        //get the day of the date in lower case
        $day = strtolower(date('l', strtotime($date)));

        //get all distribution string to use it getting values from kitchenitems table
        $officer_distribution_string = $day. '_' . $season . '_officer';
        $amen_distribution_string = $day. '_' . $season . '_amen';
        $solider_distribution_string = $day. '_' . $season . '_solider';

        $kitchenitems = Kitchenitem::all();
        foreach ($kitchenitems as $key => $kitchenitem) 
        {
            $officer_distribution = Kitchenitem::where('id', $kitchenitem->id)->first()->$officer_distribution_string;
            $amen_distribution = Kitchenitem::where('id', $kitchenitem->id)->first()->$amen_distribution_string;
            $solider_distribution = Kitchenitem::where('id', $kitchenitem->id)->first()->$solider_distribution_string;

            $total_officers_distribution_of_the_day = $officer_distribution * bcadd($request->officers_number, '0', 3);
            $total_amens_distribution_of_the_day = $amen_distribution * bcadd($request->amens_number, '0', 3);
            $total_soliders_distribution_of_the_day = $solider_distribution * bcadd($request->soliders_number, '0', 3);
            
            $total_distribution = $total_officers_distribution_of_the_day + $total_amens_distribution_of_the_day + $total_soliders_distribution_of_the_day;


            $before_quantity = Kitchenitem::where('id', $kitchenitem->id)->first()->current_quantity;

            $after_quantity = Kitchenitem::where('id', $kitchenitem->id)->first()->current_quantity - $total_distribution;

            Kitchendailydistributionitem::create([
                'kitchendailydistribution_id' => $kitchendailydistribution->id,
                'kitchenitem_id' => $kitchenitem->id,
                'mokrar_officer' => $officer_distribution,
                'mokrar_amen' => $amen_distribution,
                'mokrar_solider' => $solider_distribution,
                'before_quantity' => $before_quantity,
                'after_quantity' => $after_quantity,
                'total_distribution' => $total_distribution,
            ]);

            $edit_kitchen_item = Kitchenitem::where('id', $kitchenitem->id)->update([
                'current_quantity' => $after_quantity
            ]);
            
        }

        return redirect()->route('show-kitchendailydistribution', $kitchendailydistribution->id)->with('message', 'تم اضافة صرف يومي بنجاح');
        

        

    }

    public function show(Kitchendailydistribution $Kitchendailydistribution)
    {
        return view('kitchendailydistribution.show', compact('Kitchendailydistribution'));
    }


}
