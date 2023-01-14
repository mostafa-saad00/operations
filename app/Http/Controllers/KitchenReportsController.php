<?php

namespace App\Http\Controllers;

use App\Models\Kitchendailydistribution;
use App\Models\Kitchendailydistributionitem;
use App\Models\Kitchenitem;
use App\Models\User;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\SimpleType\TblWidth;
use PhpOffice\PhpWord\Style\TablePosition;

class KitchenReportsController extends Controller
{
    public function kitchen_reports()
    {
        return view('kitchen.reports');
    }

    public function kitchen_monthly_consumption_numbers(Request $request, User $user)
    {
        if(strlen($request->date_range) > 15)
        {
            // Split the date range into two dates
            $dates = explode(" to ", $request->date_range);

            $date_from = $dates[0];
            $date_to = $dates[1];
          
        }
        else
        {
            return redirect()->route('kitchen-reports')->withErrors(['msg' => 'خطأ: برجاء تحديد التاريخ بطريقة صحيحة']);
        }

        $month = date("m",strtotime($date_from));
        $year = date("Y",strtotime($date_from));

        if($month == 1) { $month = 'يناير'; }  
        if($month == 2) { $month = 'فبراير'; }  
        if($month == 3) { $month = 'مارس'; }  
        if($month == 4) { $month = 'ابريل'; }  
        if($month == 5) { $month = 'مايو'; }  
        if($month == 6) { $month = 'يونيو'; }  
        if($month == 7) { $month = 'يوليو'; }  
        if($month == 8) { $month = 'اغسطس'; }  
        if($month == 9) { $month = 'سبتمبر'; }  
        if($month == 10) { $month = 'اكتوبر'; }  
        if($month == 11) { $month = 'نوفمبر'; }  
        if($month == 12) { $month = 'ديسمبر'; }  

        
        
        $kitchendailydistriputions = Kitchendailydistribution::where('sector_id', $user->sector_id)
                                ->whereBetween('date', [$date_from, $date_to])
                                ->get();

        $templateProcessor = new TemplateProcessor('word-templates/default_cs_security_with_two_text.docx');
        $cellHCentered = ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END];
        $cellVCentered = ['valign' => \PhpOffice\PhpWord\SimpleType\VerticalJc::CENTER];
        $style = ['rtl' => true, 'size' => 11];

        $text1 = new TextRun();
        $text1->addText('قطاع الشهيد/ النقيب محمد ناجي الشماشرجي', array('size' => 16, 'color' => 'black', 'bold' => true));
        $templateProcessor->setComplexValue('text1', $text1);

        $text2 = new TextRun();
        $text2->addText('بيان حصر اعداد استهلاك الوجبات عن شهر ' . $month . $year , array('size' => 16, 'color' => 'black', 'bold' => true));
        $templateProcessor->setComplexValue('text2', $text2);


        $table = new Table(['borderSize' => 1, 'borderColor' => 'black', 'width' => 10000, 'unit' => TblWidth::TWIP]);
        
        $table->addRow();

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('وجبة جافة', $style);
        
        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('اجمالي', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('مجندين', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('افراد', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('ضباط', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('التاريخ', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('اليوم', $style);

        $total_officers_all_days = 0;
        $total_amens_all_days = 0;
        $total_soliders_all_days = 0;
        $total_numbers_all_days = 0;

        foreach($kitchendailydistriputions as $key => $distripution)
        {
            $officers_number = $distripution->officers_number;
            $total_officers_all_days = $total_officers_all_days + $distripution->officers_number;

            $amens_number = $distripution->amens_number;
            $total_amens_all_days = $total_amens_all_days + $distripution->amens_number;

            $soliders_number = $distripution->soliders_number;
            $total_soliders_all_days = $total_soliders_all_days + $distripution->soliders_number;

            $total_number = $distripution->officers_number + $distripution->amens_number + $distripution->soliders_number;
            $total_numbers_all_days = $total_numbers_all_days + $total_number;

            $date = date("d/m/Y", strtotime($distripution->date)); 
            
            if($distripution->day == 'saturday') { $day = 'السبت'; }  
            if($distripution->day == 'sunday') { $day = 'الاحد'; }  
            if($distripution->day == 'monday') { $day = 'الاثنين'; }  
            if($distripution->day == 'tuesday') { $day = 'الثلاثاء'; }  
            if($distripution->day == 'wednesday') { $day = 'الاربعاء'; }  
            if($distripution->day == 'thursday') { $day = 'الخميس'; }  
            if($distripution->day == 'friday') { $day = 'الجمعة'; }  


            $table->addRow();

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText('', $style);
            
            $cell = $table->addCell(500, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($total_number, $style);

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($soliders_number, $style);
            
            $cell = $table->addCell(500, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($amens_number, $style);

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($officers_number, $style);
            
            $cell = $table->addCell(500, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($date, $style);

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($key + 1, $style);
            
            $cell = $table->addCell(500, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($day, $style);

        }
        $cellRowSpan = ['valign' => \PhpOffice\PhpWord\SimpleType\VerticalJc::CENTER, 'vMerge' => 'restart'];
        $cellColSpan = array('gridSpan' => 3);

        $cellHCentered = ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END];
    

        $table->addRow();
        $cell = $table->addCell(2000, $cellRowSpan);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(2000, $cellRowSpan);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText($total_numbers_all_days, $style);

        $cell = $table->addCell(2000, $cellRowSpan);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText($total_soliders_all_days, $style);

        $cell = $table->addCell(2000, $cellRowSpan);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText($total_amens_all_days, $style);

        $cell = $table->addCell(2000, $cellRowSpan);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText($total_officers_all_days, $style);

        $cell = $table->addCell(6000, $cellColSpan);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('الاجمالي العام', $style);



        $templateProcessor->setComplexBlock('table', $table);

        $file_name = 'حصر اعداد استهلاك الوجبات ' . $month . ' ' . $year;

        $templateProcessor->saveAs($file_name . '.docx');


        return response()->download($file_name . '.docx')->deleteFileAfterSend(true);
    }

    public function kitchen_monthly_amdad_numbers(Request $request, User $user)
    {
        if(strlen($request->date_range) > 15)
        {
            // Split the date range into two dates
            $dates = explode(" to ", $request->date_range);

            $date_from = $dates[0];
            $date_to = $dates[1];
          
        }
        else
        {
            return redirect()->route('kitchen-reports')->withErrors(['msg' => 'خطأ: برجاء تحديد التاريخ بطريقة صحيحة']);
        }

        $month = date("m",strtotime($date_from));
        $year = date("Y",strtotime($date_from));

        if($month == 1) { $month = 'يناير'; }  
        if($month == 2) { $month = 'فبراير'; }  
        if($month == 3) { $month = 'مارس'; }  
        if($month == 4) { $month = 'ابريل'; }  
        if($month == 5) { $month = 'مايو'; }  
        if($month == 6) { $month = 'يونيو'; }  
        if($month == 7) { $month = 'يوليو'; }  
        if($month == 8) { $month = 'اغسطس'; }  
        if($month == 9) { $month = 'سبتمبر'; }  
        if($month == 10) { $month = 'اكتوبر'; }  
        if($month == 11) { $month = 'نوفمبر'; }  
        if($month == 12) { $month = 'ديسمبر'; }  

        
        
        $kitchendailydistriputionitems = Kitchendailydistributionitem::where('sector_id', $user->sector_id)
                                                                    ->whereBetween('date', [$date_from, $date_to])
                                                                    ->get();

        $kitchenitems_amdad = Kitchenitem::where('kitchensupplier_id', 1)->get();                                                            

        $templateProcessor = new TemplateProcessor('word-templates/default_cs_security_with_two_text.docx');
        $cellHCentered = ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END];
        $cellVCentered = ['valign' => \PhpOffice\PhpWord\SimpleType\VerticalJc::CENTER];
        $style = ['rtl' => true, 'size' => 11];

        $text1 = new TextRun();
        $text1->addText('قطاع الشهيد/ النقيب محمد ناجي الشماشرجي', array('size' => 16, 'color' => 'black', 'bold' => true));
        $templateProcessor->setComplexValue('text1', $text1);

        $text2 = new TextRun();
        $text2->addText('بيان للاستهلاك الشهري للاصناف الواردة من امداد الشرطة عن شهر ' . $month . $year , array('size' => 16, 'color' => 'black', 'bold' => true));
        $templateProcessor->setComplexValue('text2', $text2);


        $table = new Table(['borderSize' => 1, 'borderColor' => 'black', 'width' => 10000, 'unit' => TblWidth::TWIP]);
        
        $table->addRow();

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('اجمالي المستهلك', $style);
        
        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('استهلاك المجندين', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('استهلاك الافراد', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('استهلاك الضباط', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('الصنف', $style);

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('م', $style);

        foreach($kitchenitems_amdad as $key => $item)
        {
            $table->addRow();

            // اجمالي المستهلك
            $total_consumption = 0;
            foreach($kitchendailydistriputionitems as $item_distripution)
            {
                if($item_distripution->kitchenitem_id == $item->id)
                {
                    $total_consumption = $total_consumption + $item_distripution->total_distribution;
                }
            }

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($total_consumption, $style);

            // استهلاك المجندين
            $solider_consumption = 0;
            foreach($kitchendailydistriputionitems as $item_distripution)
            { 
                if($item_distripution->kitchenitem_id == $item->id)
                {
                    $solider_consumption = $solider_consumption + ($item_distripution->mokrar_solider * $item_distripution->kitchendailydistribution->soliders_number);
                }
            }
            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($solider_consumption, $style);




            // استهلاك الافراد
            $amen_consumption = 0;
            foreach($kitchendailydistriputionitems as $item_distripution)
            { 
                if($item_distripution->kitchenitem_id == $item->id)
                {
                    $amen_consumption = $amen_consumption + ($item_distripution->mokrar_amen * $item_distripution->kitchendailydistribution->amens_number);
                }
            }
            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($amen_consumption, $style);




            // استهلاك الضباط
            $officer_consumption = 0;
            foreach($kitchendailydistriputionitems as $item_distripution)
            { 
                if($item_distripution->kitchenitem_id == $item->id)
                {
                    $officer_consumption = $officer_consumption + ($item_distripution->mokrar_officer * $item_distripution->kitchendailydistribution->officers_number);
                }
            }
            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($officer_consumption, $style);

           
            

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($item->name , $style);

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($key + 1, $style);
            
        }


        $table->addRow();

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);
        
        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('تونة', $style);

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText($key + 2, $style);



        $table->addRow();

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);
        
        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('عصير', $style);

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText($key + 3, $style);




        $table->addRow();

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);
        
        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('مياة معدنية', $style);

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText($key + 4, $style);





        $templateProcessor->setComplexBlock('table', $table);

        $file_name = 'حصر للاستهلاك الشهري للاصناف الواردة من الامداد ' . $month . ' ' . $year;

        $templateProcessor->saveAs($file_name . '.docx');


        return response()->download($file_name . '.docx')->deleteFileAfterSend(true);

    }

    public function kitchen_monthly_ta7sen_numbers(Request $request, User $user)
    {
        if(strlen($request->date_range) > 15)
        {
            // Split the date range into two dates
            $dates = explode(" to ", $request->date_range);

            $date_from = $dates[0];
            $date_to = $dates[1];
          
        }
        else
        {
            return redirect()->route('kitchen-reports')->withErrors(['msg' => 'خطأ: برجاء تحديد التاريخ بطريقة صحيحة']);
        }

        $month = date("m",strtotime($date_from));
        $year = date("Y",strtotime($date_from));

        if($month == 1) { $month = 'يناير'; }  
        if($month == 2) { $month = 'فبراير'; }  
        if($month == 3) { $month = 'مارس'; }  
        if($month == 4) { $month = 'ابريل'; }  
        if($month == 5) { $month = 'مايو'; }  
        if($month == 6) { $month = 'يونيو'; }  
        if($month == 7) { $month = 'يوليو'; }  
        if($month == 8) { $month = 'اغسطس'; }  
        if($month == 9) { $month = 'سبتمبر'; }  
        if($month == 10) { $month = 'اكتوبر'; }  
        if($month == 11) { $month = 'نوفمبر'; }  
        if($month == 12) { $month = 'ديسمبر'; }  

        
        
        $kitchendailydistriputionitems = Kitchendailydistributionitem::where('sector_id', $user->sector_id)
                                                                    ->whereBetween('date', [$date_from, $date_to])
                                                                    ->get();

        $kitchenitems_amdad = Kitchenitem::where('kitchensupplier_id', 2)->get();                                                            

        $templateProcessor = new TemplateProcessor('word-templates/default_cs_security_with_two_text.docx');
        $cellHCentered = ['alignment' => \PhpOffice\PhpWord\SimpleType\Jc::END];
        $cellVCentered = ['valign' => \PhpOffice\PhpWord\SimpleType\VerticalJc::CENTER];
        $style = ['rtl' => true, 'size' => 11];

        $text1 = new TextRun();
        $text1->addText('قطاع الشهيد/ النقيب محمد ناجي الشماشرجي', array('size' => 16, 'color' => 'black', 'bold' => true));
        $templateProcessor->setComplexValue('text1', $text1);

        $text2 = new TextRun();
        $text2->addText('بيان بالكميات المستهلكة عن اصناف صندوق التحسين عن شهر ' . $month . $year , array('size' => 16, 'color' => 'black', 'bold' => true));
        $templateProcessor->setComplexValue('text2', $text2);


        $table = new Table(['borderSize' => 1, 'borderColor' => 'black', 'width' => 10000, 'unit' => TblWidth::TWIP]);
        
        $table->addRow();

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('اجمالي المستهلك', $style);
        
        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('استهلاك المجندين', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('استهلاك الافراد', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('استهلاك الضباط', $style);

        $cell = $table->addCell(500, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('الصنف', $style);

        $cell = $table->addCell(100, $cellVCentered);
        $textrun = $cell->addTextRun($cellHCentered);
        $textrun->addText('م', $style);

        foreach($kitchenitems_amdad as $key => $item)
        {
            $table->addRow();

            // اجمالي المستهلك
            $total_consumption = 0;
            foreach($kitchendailydistriputionitems as $item_distripution)
            {
                if($item_distripution->kitchenitem_id == $item->id)
                {
                    $total_consumption = $total_consumption + $item_distripution->total_distribution;
                }
            }

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($total_consumption, $style);

            // استهلاك المجندين
            $solider_consumption = 0;
            foreach($kitchendailydistriputionitems as $item_distripution)
            { 
                if($item_distripution->kitchenitem_id == $item->id)
                {
                    $solider_consumption = $solider_consumption + ($item_distripution->mokrar_solider * $item_distripution->kitchendailydistribution->soliders_number);
                }
            }
            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($solider_consumption, $style);




            // استهلاك الافراد
            $amen_consumption = 0;
            foreach($kitchendailydistriputionitems as $item_distripution)
            { 
                if($item_distripution->kitchenitem_id == $item->id)
                {
                    $amen_consumption = $amen_consumption + ($item_distripution->mokrar_amen * $item_distripution->kitchendailydistribution->amens_number);
                }
            }
            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($amen_consumption, $style);




            // استهلاك الضباط
            $officer_consumption = 0;
            foreach($kitchendailydistriputionitems as $item_distripution)
            { 
                if($item_distripution->kitchenitem_id == $item->id)
                {
                    $officer_consumption = $officer_consumption + ($item_distripution->mokrar_officer * $item_distripution->kitchendailydistribution->officers_number);
                }
            }
            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($officer_consumption, $style);

           
            

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($item->name , $style);

            $cell = $table->addCell(100, $cellVCentered);
            $textrun = $cell->addTextRun($cellHCentered);
            $textrun->addText($key + 1, $style);
            
        }


        $templateProcessor->setComplexBlock('table', $table);

        $file_name = 'حصر للاستهلاك الشهري للاصناف الواردة من الامداد ' . $month . ' ' . $year;

        $templateProcessor->saveAs($file_name . '.docx');


        return response()->download($file_name . '.docx')->deleteFileAfterSend(true);
    }

}
