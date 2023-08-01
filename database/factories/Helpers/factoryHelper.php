<?php

namespace Database\Factories\Helpers;



use Illuminate\Database\Eloquent\Factories\HasFactory;

class factoryHelper
{
    /**
     * @param string | HasFactory $model
     * @return int|mixed
     */
    public static function getRandomModelId($model){

        $count = $model::query()->count();

        if ($count == 0){
            return $model::factory()->create()->id;
        }else{
            return rand(1,$count);
        }
    }
}
