<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskFormModel;
class FormController extends Controller
{
    public function index()
    {
        return view('add-data');
    }

     public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $formData = new TaskFormModel;
        $formData->title = $request->title;
        $formData->description = $request->description;
        $fileName = $formData->saveAsJson();
        return redirect('/hw/add-data')->with('status', 'Your form data has been saved as: '.$fileName.".  To look at the stored data go to /hw/show-data routing");
    }
}
