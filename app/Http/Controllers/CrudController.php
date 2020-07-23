<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    //
    public function getOffer(){
        //return \App\Models\Offer::get();
        Offer::get();
    }

    public function hidePrice(){
        return Offer::select('name','photo')->get();
    }
/*
    public function store(){
        
        
        Offer::create([
            'name' =>'Offer3',
            'price' =>'444',
            'details' =>'offer3 details',
        ]);
        return 'offer inserted';
        

    }
    */

    public function create(){
        return view('offers.create');
    }

    public function store(Request $request)
    {
        //validation before insert data to db
        /*make method syntax:
            make([array of request],[array of rules],[array of messages])
        */
        $rules     = $this->getRules();
        $messages  = $this->getMessages();

        $validateData = Validator::make($request->all(),$rules,$messages);

        //if there is an error
        if($validateData ->fails()) {
            //return $validateData->errors();
            return redirect()->back()->withErrors($validateData)->withInputs($request->all());
        }
        //else if there is no errors 
        //insert
        //print_r($request);
        Offer::create([
            'name'      => $request->name,
            'price'     => $request->price,
            'details'   => $request->details,
        ]);

        return redirect()->back()->with(['success' => ' تمت عمية اضافة العرض بنجاح ']);
    }
    

    protected function getRules()
    {
        return $rules = [
            'name'    => 'required|max:100|unique:offers,name',
            'price'   => 'required|numeric',
            'details' => 'required',      
        ];
    }

    protected function getMessages() 
    {
        return $messages = [
            'name.required'    => __('messages.offer name required'),
            'name.unique'      => __('messages.offer name Unique'),
            'name.max'         => __('messages.offer name Max'),
    
            'price.required'   => __('messages.offer Price required'),
            'price.numeric'    => __('messages.offer price Numeric'),//'سعر العرض يجب ان يكون قيمة رقميه',
    
            'details.required' => __('messages.offer Details required'), //'تفاصيل العرض مطلوبه',
        ];
    }
}