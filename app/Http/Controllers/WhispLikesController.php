<?php

namespace App\Http\Controllers;

use App\Models\Whisp;

class WhispLikesController extends Controller
{
    public function store(Whisp $whisp)
    {
        if ($whisp->islikedBy(current_user())){
            $whisp->likes()->where('user_id', current_user()->id)->delete();
        } else {
            $whisp->like(current_user());
        }

        return back();
    }

    public function destroy(Whisp $whisp)
    {
        if ($whisp->isDislikedBy(current_user())){
            $whisp->likes()->where('user_id', current_user()->id)->delete();
        } else {
            $whisp->dislike(current_user());
        }

        return back();
    }
}
