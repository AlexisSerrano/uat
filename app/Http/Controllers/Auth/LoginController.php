<?php

namespace App\Http\Controllers\Auth;

/*inicio pruebas*/
use Auth;
use Illuminate\Http\Request;
use Session;
/*fin pruebas*/
/* inicio pruebas unidad */
use App\Models\Unidad;
/* fin pruebas unidad */
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        if ($previous_session) {
            \Session::getHandler()->destroy($previous_session);
        }

        Auth::user()->session_id = \Session::getId();
        Auth::user()->save();
        $this->clearLoginAttempts($request);
        /* inicio agregar unidad */
        $unidad=Unidad::where('id',Auth::User()->idUnidad)->first();
        // dd($unidad->descripcion);
        session(['unidad' => $unidad->descripcion]);
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
