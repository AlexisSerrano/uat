<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
/*inicio pruebas*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Models\Carpeta;
use Alert;
use Session;
use DB;
/*fin pruebas*/
/* inicio pruebas unidad */
use App\Models\Unidad;
/* fin pruebas unidad */

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //pruebas para la sesion

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $previous_session = Auth::User()->session_id;
        // dd($previous_session);
        // inicio pruebas
        
        if(is_null($previous_session)||$previous_session==''){
            $user=User::find(Auth::User()->id);
            $user->session_id = Session::getId();
            $user->save();
            $grupoad=$user->grupo;
            $this->clearLoginAttempts($request);
        }else{
            // fin pruebas
            
            if ($previous_session) {
                Session::getHandler()->destroy($previous_session);
            }
            $user=User::find(Auth::User()->id);
            $user->session_id = Session::getId();
            $user->save();
            $grupoad=$user->grupo;
            // Auth::user()->session_id = Session::getId();
            // Auth::user()->save();
            $this->clearLoginAttempts($request);
        }
        
        $comprobarRol=DB::table('model_has_roles')
        ->join('users','users.id','=','model_has_roles.model_id')
        ->get();

        if ($comprobarRol->IsEmpty()) {
            switch ($grupoad) {
                case 'coordinador':
                    // $user->syncRoles(['coordinador']);
                    $user->assignRole(['coordinador']);
                    break;
                
                case 'facilitador':
                    // $user->syncRoles(['facilitador']);
                    $user->assignRole(['facilitador']);
                    break;
                
                case 'orientador':
                    // $user->syncRoles(['orientador']);
                    $user->assignRole(['orientador']);
                    break;
                
                case 'recepcion':
                    // $user->syncRoles(['recepcion']);
                    $user->assignRole(['recepcion']);
                    break;
                
                default:
                    Auth::logout();
                    return redirect(route('login'));
                    break;
            }
        } else {
            switch ($grupoad) {
                case 'coordinador':
                    $user->syncRoles(['coordinador']);
                    // $user->assignRole(['coordinador']);
                    break;
                
                case 'facilitador':
                    $user->syncRoles(['facilitador']);
                    // $user->assignRole(['facilitador']);
                    break;
                
                case 'orientador':
                    $user->syncRoles(['orientador']);
                    // $user->assignRole(['orientador']);
                    break;
                
                case 'recepcion':
                    $user->syncRoles(['recepcion']);
                    // $user->assignRole(['recepcion']);
                    break;
                
                default:
                    Auth::logout();
                    return redirect(route('login'));
                    break;
            }
            
        }
        

        /* inicio alerta a soporte */
        if(is_null(Auth::User()->idUnidad) || Auth::User()->numFiscal==0 && Auth::user()->grupo!='coordinador'){
            Auth::logout();
            return redirect(route('error.login'));
        }
        /* fin alerta a soporte */
        /* inicio agregar unidad */
        $unidad=Unidad::where('id',Auth::User()->idUnidad)->first();
        // dd($unidad->descripcion);
        session(['unidad' => $unidad->descripcion]);
        
        if (Auth::user()->grupo=='orientador'||Auth::user()->grupo=='coordinador') {
            $comprobar=Auth::user()->idCarpeta;
            if($comprobar==null){
                session()->forget('carpeta');
                session()->forget('terminada');
                session()->forget('numCarpeta');
                if (session('preregistro')!=null) {
                    session()->forget('preregistro');
                    session()->forget('foliopreregistro');
                }
                return redirect(route('indexcarpetas'));
            }else{
                $numCarpeta=Carpeta::find($comprobar);
                $numCarpeta=$numCarpeta->numCarpeta;
                session(['carpeta' => $comprobar]);
                session(['numCarpeta' => $numCarpeta]);
                Alert::info('Al cerrar sesión dejaste un caso abierto');
                return redirect(route('new.denunciante'));
            }
        }
        if (Auth::user()->grupo=='recepcion') {
            return redirect(route('predenuncias.index'));    
        }
        /* fin agregar unidad */




        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }  

    // protected function sendLoginResponse(Request $request)
    // {
    //     $request->session()->regenerate();

    //     $this->clearLoginAttempts($request);

    //     return $this->authenticated($request, $this->guard()->user())
    //             ?: redirect()->intended($this->redirectPath());
    // }


}
