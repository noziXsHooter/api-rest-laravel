<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandController extends Controller
{
   public function getAll(){

        $bands = $this->getBands();


        return response()->json($bands);

   }

   public function getById($id){

        $band = null;

        foreach($this->getBands() as $_band){
            if($_band['id'] == $id)
                $band = $_band;
        }

        return $band ? response()->json($band) : abort(404);
   }

   public function getBandByGender($gender){

    $bands = [];

    foreach($this->getBands() as $_band){
        if($_band['gender'] == $gender)
            $bands = $_band;
    }

    return response()->json($bands);
    }


    public function store(Request $request){

        $validate = $request->validate([
            'name' => 'required',
        ]);

        return response()->json($request->all());

    }

   protected function getBands(){

        return[
            [
                'id'=>1, 'name'=> 'slipknot', 'gender'=> 'metal'
            ],
        ];

   }

}
