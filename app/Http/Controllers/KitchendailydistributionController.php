<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kitchenitem;
use Illuminate\Http\Request;
use App\Models\Kitchendailydistribution;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Validator;
use App\Models\Kitchendailydistributionitem;
use App\Http\Requests\KitchendailydistributionFormRequest;
use App\Models\SectorKitchenItemTransaction;

class KitchendailydistributionController extends Controller
{
    public function create()
    {
        return view('kitchendailydistribution.create');
    }

    public function store(KitchendailydistributionFormRequest $request, User $user)
    {
        $checkIfTheRecordExict = Kitchendailydistribution::where('date', $request->date)->first();
        if($checkIfTheRecordExict)
        {
            return redirect()->route('create-kitchendailydistribution')->withErrors(['msg' => 'خطأ: تاريخ اليوم المحدد موجود بالفعل']);
        }

        $date = $request->date;

        if($request->date == null)
        {
            $date = date("Y-m-d");
        }

        
        $kitchendailydistribution = Kitchendailydistribution::create([
            'area_id' => $user->area_id,
            'sector_id' => $user->sector_id,
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
                'area_id' => $user->area_id,
                'sector_id' => $user->sector_id,
                'kitchendailydistribution_id' => $kitchendailydistribution->id,
                'kitchenitem_id' => $kitchenitem->id,
                'date' => $date,
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

            SectorKitchenItemTransaction::create([
                'area_id' => $user->area_id,
                'sector_id' => $user->sector_id,
                'kitchenitem_id' => $kitchenitem->id, 
                'kitchendailydistribution_id' => $kitchendailydistribution->id,
                'in_out' => 0,
                'date' => $date,
                'before_quantity' => $before_quantity,
                'after_quantity' => $after_quantity,
                'transaction_quantity' => $total_distribution,
            ]);
            
        }

        return redirect()->route('show-kitchendailydistribution', $kitchendailydistribution->id)->with('message', 'تم اضافة صرف يومي بنجاح');
        

        

    }

    public function show(Kitchendailydistribution $kitchendailydistribution)
    {
        return view('kitchendailydistribution.show', compact('kitchendailydistribution'));
    }

    public function destroy(Kitchendailydistribution $Kitchendailydistribution)
    {
        $kitchendailydistributionitems = Kitchendailydistributionitem::where('kitchendailydistribution_id', $Kitchendailydistribution->id)->get();
        $sector_kitchen_item_transactions = SectorKitchenItemTransaction::where('kitchendailydistribution_id', $Kitchendailydistribution->id)->get();
        
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

            $kitchendailydistributionitem->delete();
        }

        foreach($sector_kitchen_item_transactions as $transaction)
        {
            $transaction->delete();
        }

        $Kitchendailydistribution->delete();

        return redirect()->route('index-kitchendailydistribution')->with('message', 'تم حذف الصرف اليومي بنجاح وتم تعديل كميات الاصناف');
    }

    public function print_kitchendailydistribution(Kitchendailydistribution $kitchendailydistribution)
    {
        $templateProcessor = new TemplateProcessor('word-templates/kitchen_daily_distribution_template.docx');

        if($kitchendailydistribution->day == 'saturday') { $day = 'السبت'; }  
        if($kitchendailydistribution->day == 'sunday') { $day = 'الاحد'; }  
        if($kitchendailydistribution->day == 'monday') { $day = 'الاثنين'; }  
        if($kitchendailydistribution->day == 'tuesday') { $day = 'الثلاثاء'; }  
        if($kitchendailydistribution->day == 'wednesday') { $day = 'الاربعاء'; }  
        if($kitchendailydistribution->day == 'thursday') { $day = 'الخميس'; }  
        if($kitchendailydistribution->day == 'friday') { $day = 'الجمعة'; }  

        $officers_number = $kitchendailydistribution->officers_number;
        $amens_number = $kitchendailydistribution->amens_number;
        $soliders_number = $kitchendailydistribution->soliders_number;
        $kt3_total = $kitchendailydistribution->officers_number + $kitchendailydistribution->amens_number + $kitchendailydistribution->soliders_number;
        
        $templateProcessor->setValue('day', $day);
        $templateProcessor->setValue('date', $kitchendailydistribution->date);
        $templateProcessor->setValue('officers_number', $officers_number);
        $templateProcessor->setValue('amens_number', $amens_number);
        $templateProcessor->setValue('soliders_number', $soliders_number);
        $templateProcessor->setValue('kt3_total', $kt3_total);

        foreach($kitchendailydistribution->kitchendailydistributionitems as $distributionitem)
        {
            // الارز
            if($distributionitem->kitchenitem_id == 1)
            {
                $templateProcessor->setValue('rise_of', $distributionitem->mokrar_officer * $officers_number * $officers_number);
                $templateProcessor->setValue('rise_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('rise_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('rise_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('rise_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('rise_total', $distributionitem->total_distribution);
            }
            // المكرونة
            if($distributionitem->kitchenitem_id == 2)
            {
                $templateProcessor->setValue('mkr_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('mkr_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('mkr_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('mkr_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('mkr_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('mkr_total', $distributionitem->total_distribution);
            }
            // شعرية
            if($distributionitem->kitchenitem_id == 3)
            {
                $templateProcessor->setValue('sh3r_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('sh3r_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('sh3r_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('sh3r_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('sh3r_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('sh3r_total', $distributionitem->total_distribution);
            }
            // فول صحيح
            if($distributionitem->kitchenitem_id == 4)
            {
                $templateProcessor->setValue('fol1_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('fol1_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('fol1_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('fol1_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('fol1_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('fol1_total', $distributionitem->total_distribution);
            }
            // زيت طعام
            if($distributionitem->kitchenitem_id == 5)
            {
                $templateProcessor->setValue('zat_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('zat_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('zat_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('zat_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('zat_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('zat_total', $distributionitem->total_distribution);
            }
            // شاي فتلة
            if($distributionitem->kitchenitem_id == 6)
            {
                $templateProcessor->setValue('shay_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('shay_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('shay_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('shay_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('shay_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('shay_total', $distributionitem->total_distribution);
            }
            // سكر باكة
            if($distributionitem->kitchenitem_id == 7)
            {
                $templateProcessor->setValue('sokr_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('sokr_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('sokr_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('sokr_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('sokr_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('sokr_total', $distributionitem->total_distribution);
            }
            // لحوم
            if($distributionitem->kitchenitem_id == 8)
            {
                $templateProcessor->setValue('meat_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('meat_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('meat_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('meat_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('meat_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('meat_total', $distributionitem->total_distribution);
            }
            // دواجن
            if($distributionitem->kitchenitem_id == 9)
            {
                $templateProcessor->setValue('chkn_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('chkn_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('chkn_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('chkn_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('chkn_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('chkn_total', $distributionitem->total_distribution);
            }
            // خضار مجمد
            if($distributionitem->kitchenitem_id == 10)
            {
                $templateProcessor->setValue('5dar_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('5dar_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('5dar_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('5dar_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('5dar_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('5dar_total', $distributionitem->total_distribution);
            }
            // فاصوليا جاغة
            if($distributionitem->kitchenitem_id == 11)
            {
                $templateProcessor->setValue('fsol_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('fsol_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('fsol_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('fsol_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('fsol_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('fsol_total', $distributionitem->total_distribution);
            }
            // ملح
            if($distributionitem->kitchenitem_id == 12)
            {
                $templateProcessor->setValue('salt_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('salt_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('salt_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('salt_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('salt_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('salt_total', $distributionitem->total_distribution);
            }
            // فلفل
            if($distributionitem->kitchenitem_id == 13)
            {
                $templateProcessor->setValue('flfl_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('flfl_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('flfl_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('flfl_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('flfl_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('flfl_total', $distributionitem->total_distribution);
            }
            // كمون
            if($distributionitem->kitchenitem_id == 14)
            {
                $templateProcessor->setValue('kmon_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('kmon_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('kmon_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('kmon_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('kmon_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('kmon_total', $distributionitem->total_distribution);
            }
            // بصل ناشف
            if($distributionitem->kitchenitem_id == 15)
            {
                $templateProcessor->setValue('bsal_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('bsal_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('bsal_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('bsal_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('bsal_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('bsal_total', $distributionitem->total_distribution);
            }
            // سلطة
            if($distributionitem->kitchenitem_id == 16)
            {
                $templateProcessor->setValue('slta_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('slta_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('slta_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('slta_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('slta_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('slta_total', $distributionitem->total_distribution);
            }
            // فاكهة
            if($distributionitem->kitchenitem_id == 17)
            {
                $templateProcessor->setValue('frut_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('frut_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('frut_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('frut_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('frut_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('frut_total', $distributionitem->total_distribution);
            }
            // صلصة
            if($distributionitem->kitchenitem_id == 18)
            {
                $templateProcessor->setValue('sals_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('sals_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('sals_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('sals_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('sals_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('sals_total', $distributionitem->total_distribution);
            }
            // جبنة
            if($distributionitem->kitchenitem_id == 19)
            {
                $templateProcessor->setValue('gebn_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('gebn_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('gebn_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('gebn_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('gebn_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('gebn_total', $distributionitem->total_distribution);
            }
            // حلاوة طحينية
            if($distributionitem->kitchenitem_id == 20)
            {
                $templateProcessor->setValue('7law_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('7law_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('7law_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('7law_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('7law_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('7law_total', $distributionitem->total_distribution);
            }
            // مربة
            if($distributionitem->kitchenitem_id == 21)
            {
                $templateProcessor->setValue('mrba_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('mrba_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('mrba_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('mrba_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('mrba_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('mrba_total', $distributionitem->total_distribution);
            }
            // عدس
            if($distributionitem->kitchenitem_id == 22)
            {
                $templateProcessor->setValue('3ads_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('3ads_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('3ads_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('3ads_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('3ads_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('3ads_total', $distributionitem->total_distribution);
            }
            // فول معلب
            if($distributionitem->kitchenitem_id == 23)
            {
                $templateProcessor->setValue('fol2_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('fol2_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('fol2_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('fol2_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('fol2_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('fol2_total', $distributionitem->total_distribution);
            }
            // بيض
            if($distributionitem->kitchenitem_id == 26)
            {
                $templateProcessor->setValue('egg_of', $distributionitem->mokrar_officer * $officers_number);
                $templateProcessor->setValue('egg_am', $distributionitem->mokrar_amen * $amens_number);
                $templateProcessor->setValue('egg_so', $distributionitem->mokrar_solider * $soliders_number);
                $templateProcessor->setValue('egg_before', $distributionitem->before_quantity);
                $templateProcessor->setValue('egg_after', $distributionitem->after_quantity);
                $templateProcessor->setValue('egg_total', $distributionitem->total_distribution);
            }
        }

        $file_name = "الصرف اليومي بتاريخ " . $kitchendailydistribution->date;

        $templateProcessor->saveAs($file_name . '.docx');

        return response()->download($file_name . '.docx')->deleteFileAfterSend(true);
    }


}
