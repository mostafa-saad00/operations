<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gehat;
use App\Models\Photo;
use App\Models\Pistol;
use App\Models\Officer;
use App\Models\Ma2moryat;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\Dailyoperation;
use App\Models\Weeklyofficeroperation;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Shared\Converter;
use App\Http\Requests\OfficerFormRequest;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpWord\Style\TablePosition;

class OfficerController extends Controller
{
    public function word(Request $request)
    {
        $title = $request->title;
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        
        // New section
$section = $phpWord->addSection();

$section->addText('By default, when you insert an image, it adds a textbreak after its content.');
$section->addText('If we want a simple border around an image, we wrap the image inside a table->row->cell');
$section->addText(
    'On the image with the red border, even if we set the row height to the height of the image, '
        . 'the textbreak is still there:'
);

$table1 = $section->addTable(['cellMargin' => 0, 'cellMarginRight' => 0, 'cellMarginBottom' => 0, 'cellMarginLeft' => 0]);
$table1->addRow(3750);
$cell1 = $table1->addCell(null, ['valign' => 'top', 'borderSize' => 30, 'borderColor' => 'ff0000']);
$cell1->addImage('./cs_security.png', ['width' => 250, 'height' => 250, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);

$section->addTextBreak();
$section->addText("But if we set the rowStyle 'exactHeight' to true, the real row height is used, removing the textbreak:");

$table2 = $section->addTable(
    [
        'cellMargin' => 0,
        'cellMarginRight' => 0,
        'cellMarginBottom' => 0,
        'cellMarginLeft' => 0,
    ]
);
$table2->addRow(3750, ['exactHeight' => true]);
$cell2 = $table2->addCell(null, ['valign' => 'top', 'borderSize' => 30, 'borderColor' => '00ff00']);
$cell2->addImage('./cs_security.png', ['width' => 250, 'height' => 250, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER]);

$section->addTextBreak();
$section->addText('In this example, image is 250px height. Rows are calculated in twips, and 1px = 15twips.');
$section->addText('So: $' . "table2->addRow(3750, array('exactHeight'=>true));");


        $phpWord->save('first-test.docx');

        return response()->download('first-test.docx')->deleteFileAfterSend();
    }

    public function index()
    { 
        $officers = Officer::all();
        return view('officer.index', compact('officers'));
    }

    public function show_officer(Officer $officer)
    { 
        $gehats = Gehat::all();
        $dailyOperations = Dailyoperation::all();

        // tash8el code
        $UniqueofficerOperations = Weeklyofficeroperation::where('officer_id', $officer->id)
                                                    ->where('year', date("Y"))
                                                    ->get()
                                                    ->unique('date');
   
        $officerOperations = Weeklyofficeroperation::where('officer_id', $officer->id)
        ->where('year', date("Y"))
        ->get();

        $monthsArray = [];
        foreach($officerOperations as $operation)
        {
            array_push($monthsArray, $operation->month);
        }
        $monthsUniqueArray = array_unique($monthsArray);   
        // End tash8el code

        // Ma2moryat code
        $officerMa2moryats = Ma2moryat::where('officer_id', $officer->id) 
                                                    ->get(); 
        
        $officerYearsArray = [];
        foreach($officerMa2moryats as $ma2moryat)
        {
            array_push($officerYearsArray, $ma2moryat->year);
        }
        $yearsUniqueArray = array_unique($officerYearsArray); 

        // End Ma2moryat code   
        

        return view('officer.show', compact('officer', 'gehats', 'UniqueofficerOperations', 'officerOperations', 'monthsUniqueArray', 'dailyOperations', 'officerMa2moryats', 'yearsUniqueArray'));
    }

    public function create()
    {
        $gehats = Gehat::all();        
        

        $officers = Officer::all();

        $theArray = [];

        foreach($officers as $officer)
        {
            array_push($theArray, $officer->pistol_id);
        }
        


        $pistols = Pistol::whereNotIn('id', $theArray)->get();

        

        return view('officer.create', compact('gehats', 'pistols'));
    }





    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gehat' => 'required|max:255',
            'pistol' => 'required|max:255',
            'rank' => 'required|max:255',
            'name' => 'required|max:255',
            'nick_name' => 'required|max:255',
            'tarteb' => 'required|numeric',
            'year_of_graduate' => 'required|numeric',
            'what_he_do' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'religion' => 'required|max:255',
            'status' => 'required|max:255',
            'phone1' => 'required|numeric',
            'health' => 'required|max:255',
        ]);

        $tmp_file = TemporaryFile::where('folder', $request->image)->first();

        if ($validator->fails() && $tmp_file) 
        {
            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            foreach(TemporaryFile::all() as $temporary_file)
            {
                $temporary_file->delete();  
            }   
            return redirect('/create-officer')->withErrors($validator)->withInput(); 
        }
        elseif ($validator->fails())
        {
            return redirect('/create-officer')->withErrors($validator)->withInput(); 
        }

        if($tmp_file)
        {
            $officer = Officer::create([
                'gehat_id' => $request->gehat,
                'pistol_id' => $request->pistol,
                'rank' => $request->rank,
                'name' => $request->name,
                'nick_name' => $request->nick_name,
                'tarteb' => $request->tarteb,
                'year_of_graduate' => $request->year_of_graduate,
                'what_he_do' => $request->what_he_do,
                'address' => $request->address,
                'city' => $request->city,
                'religion' => $request->religion,
                'status' => $request->status,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'health' => $request->health,
                'height' => $request->height,
                'weight' => $request->weight,
                'age' => $request->age,
            ]);
    
            if($request->officerTrainings != null)
            {
                foreach($request->officerTrainings as $officerTraining)
                {
                    $officer->trainings()->attach($officerTraining);
                }
            }


            Storage::copy('posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'posts/' . $tmp_file->folder . '/' . $tmp_file->file);
            
            Photo::create([
                'officer_id' => $officer->id,
                'folder' => $tmp_file->folder,
                'text' => $tmp_file->file,
            ]);
            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            foreach(TemporaryFile::all() as $temporary_file)
            {
                $temporary_file->delete();  
            }
            
            return redirect('/create-officer')->with('message', '???? ?????????? ???????? ??????????');
        }
        else
        {
            $officer = Officer::create([
                'gehat_id' => $request->gehat,
                'pistol_id' => $request->pistol,
                'rank' => $request->rank,
                'name' => $request->name,
                'nick_name' => $request->nick_name,
                'tarteb' => $request->tarteb,
                'year_of_graduate' => $request->year_of_graduate,
                'what_he_do' => $request->what_he_do,
                'address' => $request->address,
                'city' => $request->city,
                'religion' => $request->religion,
                'status' => $request->status,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'health' => $request->health,
                'height' => $request->height,
                'weight' => $request->weight,
                'age' => $request->age,
            ]);
    
            if($request->officerTrainings != null)
            {
                foreach($request->officerTrainings as $officerTraining)
                {
                    $officer->trainings()->attach($officerTraining);
                }
            }
            return redirect('/create-officer')->with('message', '???? ?????????? ???????? ??????????');
        }

    }

    public function edit(Officer $officer)
    {
        $officers = Officer::all();

        $theArray = [];

        foreach($officers as $x_officer)
        {
            array_push($theArray, $x_officer->pistol_id);
        }

        $pistols = Pistol::whereNotIn('id', $theArray)->get();
        $gehats = Gehat::all();
        return view('officer.edit', compact('officer', 'gehats', 'pistols'));
    }

    public function update(Request $request, Officer $officer)
    {
        $validator = Validator::make($request->all(), [
            'gehat' => 'required|max:255',
            'pistol' => 'required|max:255',
            'rank' => 'required|max:255',
            'name' => 'required|max:255',
            'nick_name' => 'required|max:255',
            'tarteb' => 'required|numeric',
            'year_of_graduate' => 'required|numeric',
            'what_he_do' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'religion' => 'required|max:255',
            'status' => 'required|max:255',
            'phone1' => 'required|numeric',
            'health' => 'required|max:255',
        ]);

        $tmp_file = TemporaryFile::where('folder', $request->image)->first();

        if ($validator->fails() && $tmp_file) 
        {
            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            foreach(TemporaryFile::all() as $temporary_file)
            {
                $temporary_file->delete();  
            }   
            return redirect('/edit-officer'. '/' .$officer->id)->withErrors($validator)->withInput(); 
        }
        elseif ($validator->fails())
        {
            return redirect('/edit-officer'. '/' .$officer->id)->withErrors($validator)->withInput(); 
        }


        
        if($tmp_file)
        {
            Officer::where('id', $officer->id)->update([
                'gehat_id' => $request->gehat,
                'pistol_id' => $request->pistol,
                'rank' => $request->rank,
                'name' => $request->name,
                'nick_name' => $request->nick_name,
                'tarteb' => $request->tarteb,
                'year_of_graduate' => $request->year_of_graduate,
                'what_he_do' => $request->what_he_do,
                'address' => $request->address,
                'city' => $request->city,
                'religion' => $request->religion,
                'status' => $request->status,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'health' => $request->health,
                'height' => $request->height,
                'weight' => $request->weight,
                'age' => $request->age,
            ]);

            if($request->officerTrainings != null)
            {
                $officer->trainings()->detach();
                foreach($request->officerTrainings as $officerTraining)
                {
                    $officer->trainings()->attach($officerTraining);
                }
            }


            Storage::copy('posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'posts/' . $tmp_file->folder . '/' . $tmp_file->file);
            
            $officer_photo = Photo::where('officer_id', $officer->id)->first();
            if($officer_photo)
            {
                $officer_photo->update([
                    'folder' => $tmp_file->folder,
                    'text' => $tmp_file->file,
                ]);
            }
            else
            {
                Photo::create([
                    'officer_id' => $officer->id,
                    'folder' => $tmp_file->folder,
                    'text' => $tmp_file->file,
                ]);
            }
            
            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            foreach(TemporaryFile::all() as $temporary_file)
            {
                $temporary_file->delete();  
            }
            
            return redirect('/edit-officer'. '/' .$officer->id)->with('message', '???? ?????????? ???????????? ??????????');

        }
        else
        {
            Officer::where('id', $officer->id)->update([
                'gehat_id' => $request->gehat,
                'pistol_id' => $request->pistol,
                'rank' => $request->rank,
                'name' => $request->name,
                'nick_name' => $request->nick_name,
                'tarteb' => $request->tarteb,
                'year_of_graduate' => $request->year_of_graduate,
                'what_he_do' => $request->what_he_do,
                'address' => $request->address,
                'city' => $request->city,
                'religion' => $request->religion,
                'status' => $request->status,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'health' => $request->health,
                'height' => $request->height,
                'weight' => $request->weight,
                'age' => $request->age,
            ]);

            if($request->officerTrainings != null)
            {
                $officer->trainings()->detach();
                foreach($request->officerTrainings as $officerTraining)
                {
                    $officer->trainings()->attach($officerTraining);
                }
            }

            
            return redirect('/edit-officer'. '/' .$officer->id)->with('message', '???? ?????????? ???????????? ??????????');
        }

    
    }

    public function destroy(Officer $officer)
    {    
        $officer_photo = Photo::where('officer_id', $officer->id)->first();
        if($officer_photo)
        {
            $officer_photo->delete();
        }

        foreach($officer->trainings as $training)
        {
            $officer->trainings()->detach($training->id);
        }
        
        $officer->delete();
        return redirect('/officers')->with('message', '???? ?????? ???????????? ??????????');

    }

}
