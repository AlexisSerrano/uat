<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preregistro;

class NotificacionesController extends Controller
{
    public function getNotificacionesCola(Request $request){
        if($request->ajax()){
            $notificaciones = Preregistro::select('id')
            ->whereIn('statusCola', array(0, 1))
            ->count();
            return response()->json(['espera'=>$notificaciones]);
        }
    }
}
