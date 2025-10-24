<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

Trait ToggleTrait
{
     public function active(Model $model)
    {   
       
        if(!$model) {
            return response()->json([
                'success' => false,
                'message' => 'Model not found',
            ]);
        }
        $model->update([
            'active' => !$model->active
        ]);

        return response()->json([
            'success' => true,
            'active' => $model->active,
        ]);
    }
}