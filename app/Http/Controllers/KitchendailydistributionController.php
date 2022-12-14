<?php

namespace App\Http\Controllers;

use App\Models\Kitchenitem;
use Illuminate\Http\Request;
use App\Models\Kitchendailydistribution;
use Illuminate\Support\Facades\Validator;
use App\Models\Kitchendailydistributionitem;
use App\Http\Requests\KitchendailydistributionFormRequest;
use PhpOffice\PhpWord\TemplateProcessor;

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

        return redirect()->route('show-kitchendailydistribution', $kitchendailydistribution->id)->with('message', '???? ?????????? ?????? ???????? ??????????');
        

        

    }

    public function show(Kitchendailydistribution $kitchendailydistribution)
    {
        return view('kitchendailydistribution.show', compact('kitchendailydistribution'));
    }

    public function destroy(Kitchendailydistribution $Kitchendailydistribution)
    {
        $kitchendailydistributionitems = Kitchendailydistributionitem::where('kitchendailydistribution_id', $Kitchendailydistribution->id)->get();
        
        foreach($kitchendailydistributionitems as $kitchendailydistributionitem)
        {
            $item_current_quantity = Kitchenitem::where('id', $kitchendailydistributionitem->kitchenitem_id)->first()->current_quantity;
            $total_distribution = $kitchendailydistributionitem->total_distribution;

            // The new value after adding the quantity after deleting
            $restore_quantity_value = $item_current_quantity + $total_distribution;

            // Update the item current value
            Kitchenitem::where('id', $kitchendailydistributionitem->kitchenitem_id)->update([
                'current_quantity' => $restore_quantity_value
            ]);
        }

        $Kitchendailydistribution->delete();

        return redirect()->route('index-kitchendailydistribution')->with('message', '???? ?????? ?????????? ???????????? ?????????? ?????? ?????????? ?????????? ??????????????');
    }

    public function print_kitchendailydistribution(Kitchendailydistribution $kitchendailydistribution)
    {
        $templateProcessor = new TemplateProcessor('word-templates/kitchen_daily_distribution_template.docx');

        if($kitchendailydistribution->day == 'saturday') { $day = '??????????'; }  
        if($kitchendailydistribution->day == 'sunday') { $day = '??????????'; }  
        if($kitchendailydistribution->day == 'monday') { $day = '??????????????'; }  
        if($kitchendailydistribution->day == 'tuesday') { $day = '????????????????'; }  
        if($kitchendailydistribution->day == 'wednesday') { $day = '????????????????'; }  
        if($kitchendailydistribution->day == 'thursday') { $day = '????????????'; }  
        if($kitchendailydistribution->day == 'friday') { $day = '????????????'; }  
        
        $templateProcessor->setValue('day', $day);
        $templateProcessor->setValue('date', $kitchendailydistribution->date);
        $templateProcessor->setValue('officers_number', $kitchendailydistribution->officers_number);
        $templateProcessor->setValue('amens_number', $kitchendailydistribution->amens_number);
        $templateProcessor->setValue('soliders_number', $kitchendailydistribution->soliders_number);

        foreach($kitchendailydistribution->kitchendailydistributionitems as $distributionitem)
        {
            // ??????????
            if($distributionitem->kitchenitem_id == 1)
            {
                $templateProcessor->setValue('rise_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('rise_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('rise_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('rise_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('rise_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('rise_total', $distributionitem->total_distribution);
            }
            // ????????????????
            if($distributionitem->kitchenitem_id == 2)
            {
                $templateProcessor->setValue('mkro_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('mkro_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('mkro_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('mkro_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('mkro_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('mkro_total', $distributionitem->total_distribution);
            }
            // ??????????
            if($distributionitem->kitchenitem_id == 3)
            {
                $templateProcessor->setValue('sh3r_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('sh3r_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('sh3r_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('sh3r_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('sh3r_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('sh3r_total', $distributionitem->total_distribution);
            }
            // ?????? ????????
            if($distributionitem->kitchenitem_id == 4)
            {
                $templateProcessor->setValue('fol1_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('fol1_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('fol1_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('fol1_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('fol1_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('fol1_total', $distributionitem->total_distribution);
            }
            // ?????? ????????
            if($distributionitem->kitchenitem_id == 5)
            {
                $templateProcessor->setValue('zat_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('zat_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('zat_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('zat_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('zat_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('zat_total', $distributionitem->total_distribution);
            }
            // ?????? ????????
            if($distributionitem->kitchenitem_id == 6)
            {
                $templateProcessor->setValue('shay_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('shay_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('shay_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('shay_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('shay_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('shay_total', $distributionitem->total_distribution);
            }
            // ?????? ????????
            if($distributionitem->kitchenitem_id == 7)
            {
                $templateProcessor->setValue('sokr_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('sokr_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('sokr_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('sokr_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('sokr_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('sokr_total', $distributionitem->total_distribution);
            }
            // ????????
            if($distributionitem->kitchenitem_id == 8)
            {
                $templateProcessor->setValue('meat_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('meat_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('meat_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('meat_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('meat_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('meat_total', $distributionitem->total_distribution);
            }
            // ??????????
            if($distributionitem->kitchenitem_id == 9)
            {
                $templateProcessor->setValue('chkn_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('chkn_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('chkn_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('chkn_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('chkn_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('chkn_total', $distributionitem->total_distribution);
            }
            // ???????? ????????
            if($distributionitem->kitchenitem_id == 10)
            {
                $templateProcessor->setValue('5dar_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('5dar_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('5dar_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('5dar_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('5dar_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('5dar_total', $distributionitem->total_distribution);
            }
            // ?????????????? ????????
            if($distributionitem->kitchenitem_id == 11)
            {
                $templateProcessor->setValue('fsol_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('fsol_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('fsol_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('fsol_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('fsol_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('fsol_total', $distributionitem->total_distribution);
            }
            // ??????
            if($distributionitem->kitchenitem_id == 12)
            {
                $templateProcessor->setValue('salt_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('salt_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('salt_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('salt_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('salt_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('salt_total', $distributionitem->total_distribution);
            }
            // ????????
            if($distributionitem->kitchenitem_id == 13)
            {
                $templateProcessor->setValue('flfl_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('flfl_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('flfl_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('flfl_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('flfl_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('flfl_total', $distributionitem->total_distribution);
            }
            // ????????
            if($distributionitem->kitchenitem_id == 14)
            {
                $templateProcessor->setValue('kmon_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('kmon_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('kmon_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('kmon_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('kmon_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('kmon_total', $distributionitem->total_distribution);
            }
            // ?????? ????????
            if($distributionitem->kitchenitem_id == 15)
            {
                $templateProcessor->setValue('bsal_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('bsal_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('bsal_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('bsal_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('bsal_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('bsal_total', $distributionitem->total_distribution);
            }
            // ????????
            if($distributionitem->kitchenitem_id == 16)
            {
                $templateProcessor->setValue('slta_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('slta_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('slta_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('slta_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('slta_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('slta_total', $distributionitem->total_distribution);
            }
            // ??????????
            if($distributionitem->kitchenitem_id == 17)
            {
                $templateProcessor->setValue('frut_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('frut_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('frut_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('frut_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('frut_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('frut_total', $distributionitem->total_distribution);
            }
            // ????????
            if($distributionitem->kitchenitem_id == 18)
            {
                $templateProcessor->setValue('sals_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('sals_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('sals_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('sals_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('sals_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('sals_total', $distributionitem->total_distribution);
            }
            // ????????
            if($distributionitem->kitchenitem_id == 19)
            {
                $templateProcessor->setValue('gebn_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('gebn_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('gebn_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('gebn_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('gebn_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('gebn_total', $distributionitem->total_distribution);
            }
            // ?????????? ????????????
            if($distributionitem->kitchenitem_id == 20)
            {
                $templateProcessor->setValue('7law_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('7law_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('7law_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('7law_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('7law_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('7law_total', $distributionitem->total_distribution);
            }
            // ????????
            if($distributionitem->kitchenitem_id == 21)
            {
                $templateProcessor->setValue('mrba_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('mrba_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('mrba_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('mrba_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('mrba_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('mrba_total', $distributionitem->total_distribution);
            }
            // ??????
            if($distributionitem->kitchenitem_id == 22)
            {
                $templateProcessor->setValue('3ads_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('3ads_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('3ads_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('3ads_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('3ads_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('3ads_total', $distributionitem->total_distribution);
            }
            // ?????? ????????
            if($distributionitem->kitchenitem_id == 23)
            {
                $templateProcessor->setValue('fol2_of_mok', $distributionitem->mokrar_officer);
                $templateProcessor->setValue('fol2_am_mok', $distributionitem->mokrar_amen);
                $templateProcessor->setValue('fol2_so_mok', $distributionitem->mokrar_solider);
                $templateProcessor->setValue('fol2_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('fol2_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('fol2_total', $distributionitem->total_distribution);
            }
        }

        $file_name = "?????????? ???????????? ???????????? " . $kitchendailydistribution->date;

        $templateProcessor->saveAs($file_name . '.docx');

        return response()->download($file_name . '.docx')->deleteFileAfterSend(true);
    }


}
