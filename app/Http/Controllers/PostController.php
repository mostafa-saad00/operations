<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required']
        ]);

        $tmp_file = TemporaryFile::where('folder', $request->image)->first();

        if ($validator->fails() && $tmp_file) 
        {
            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            $tmp_file->delete();   
            return redirect('/create-officer')->withErrors($validator)->withInput(); 
        }
        elseif ($validator->fails())
        {
            return redirect('/create-officer')->withErrors($validator)->withInput(); 
        }

        if($tmp_file)
        {
            Storage::copy('posts/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'posts/' . $tmp_file->folder . '/' . $tmp_file->file);
            
            Post::create([
                'name' => 'test_image',
                'image' => $tmp_file->folder . '/' . $tmp_file->file
            ]);
            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            return "Done";
        }

        return "WithOut image";
    }


    public function tmpUpload(Request $request)
    {
        
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            $folder = uniqid('post', true);
            $image->storeAs('posts/tmp/' . $folder, $file_name);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;    
        }
        return '';
    }
    public function tmpDelete()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if($tmp_file)
        {
            Storage::deleteDirectory('posts/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            return response('');
        }
    }
}
