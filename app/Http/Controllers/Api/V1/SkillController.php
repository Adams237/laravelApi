<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSkillRequest;
use App\Models\Skill;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class SkillController extends Controller
{
    //
    public function index() {
        return response()->json('skills Index');
    }

    public function store(StoreSkillRequest $resquest) {
        try{
            Skill::create($resquest->validated());
            return response()->json('skills created');
        }catch(Exception $e){
            var_dump('exception message :'.$e->getMessage());
        }
      
    }

    public function updatesSkil(StoreSkillRequest $resquest, Skill $skill, $id){
        try{
            Skill::where('id',$id)
                ->update($resquest->validated());
            return response()->json('skill update');
        }catch(Exception $e){
            var_dump('exception message :'.$e->getMessage());
        }
       
    }
}
