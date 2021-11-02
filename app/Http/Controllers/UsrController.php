<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Rol;
use DB;
use App\Models\Usr;
use App\Http\Controllers\Controller;


class UsrController extends Controller
{

    public function form()
    {        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '=', 2)-> select('id_rol', 'ro')->get();
                    return view('admin.añadirU', compact('rols'));
                }
                 else{
                    $rols=DB::table('rol')->where('rol.id_rol', '=', 3)-> select('id_rol', 'ro')->get();
                    return view('admin.añadirU', compact('rols'));
                }
            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }
    public function reDisct($id)
    {
         if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rol=$id;
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    return view('users.create',compact('rol'));
                }
                 else{
                    $rol=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    return view('users.create',compact('rol'));
                }
            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }
    public function listestud(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                if(session()->get('user_rol')->first()==1){

                    $userE=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',5)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();

                }else{

                    $userE=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',5)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();
                }
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();

                    return view('admin.listaestu', compact('rols','userE','rol'));
                }
                else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();

                    return view('admin.listaestu', compact('rols','userE','rol'));
                }
                // return view('superU.users');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function listU(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                if(session()->get('user_rol')->first()==1){

                    $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                       'usr_rol',
                       'id_usr',
                       'usr_id'
                   )->join('rol', 'id_rol', 'rol_id')->select(
                        'usr.foto',
                        'usr.id_usr',
                        'persona.nombre',
                        'persona.apepa',
                        'persona.apema',
                        'usr.login',
                        'usr.email',
                        'rol.ro'
                    )->get();
                }else{

                   $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join('usr_rol','id_usr','usr_id')->join('rol', 'id_rol', 'rol_id')->where('rol.id_rol','!=',1)->select('usr.id_usr',
                        'usr.foto',
                        'usr.id_usr',
                        'persona.nombre',
                        'persona.apepa',
                        'persona.apema',
                        'usr.login',
                        'usr.email',
                        'rol.ro'
                    )->get();
                }
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    return view('superU.lisUs', compact('rols','users'));
                }
                else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    return view('superU.lisUs', compact('rols','users'));
                }
                // return view('superU.users');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function listE(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                if(session()->get('user_rol')->first()==1){

                    $userE=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',3)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();

                }else{

                    $userE=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',3)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();
                }
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();

                    return view('admin.listE', compact('rols','userE','rol'));
                }
                else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();

                    return view('admin.listE', compact('rols','userE','rol'));
                }
                // return view('superU.users');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function listA(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                if(session()->get('user_rol')->first()==1){
                     $userA=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',2)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();

                }else{

                     $userA=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',2)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();
                }
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();
                    return view('admin.listA', compact('rols','userA','rol'));
                }
                else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();
                    return view('admin.listA', compact('rols','userA','rol'));
                }
                // return view('superU.users');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }

    public function listUs(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                if(session()->get('user_rol')->first()==1){
                     $userU=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',4)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();

                }else{

                     $userU=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                        'usr_rol',
                        'id_usr',
                        'usr_id'
                    )->join('rol', 'id_rol', 'rol_id')->where('usr_rol.rol_id','=',4)->select(
                         'usr.foto',
                         'usr.id_usr',
                         'persona.nombre',
                         'persona.apepa',
                         'persona.apema',
                         'usr.login',
                         'usr.email',
                         'rol.ro'
                     )->get();
                }
                $idus=session()->get('user_rol');
                if($idus[0] == 1){
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();
                    return view('admin.listU', compact('rols','userU','rol'));
                }
                else{
                    $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
                    $rol=DB::table('rol')->select('id_rol')->get();
                    return view('admin.listU', compact('rols','userU','rol'));
                }
                // return view('superU.users');
            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertar(Request $request){
        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'apelliP'=>'required|string|max:255',
                'apelliM'=>'required|string|max:255',
                'CI'=>'required|digits_between:6,12',
                'rol'=>'required|integer',
                'email' => 'required|string|email|max:255|unique:usr,email',
                'telefono' =>'required|digits_between:6,12',
                'password' => 'required|string:password_confirmation|min:6|confirmed',
                'Foto' => 'image'
            ] );
            $name=$request->input('name');
            $last_name=$request->input('apelliP');
            $last_ape=$request->input('apelliM');
            $ci = $request->input('CI');
            $rol=$request->input('rol');
            $email=$request->input('email');
            $tel=$request->input('telefono');
            $pas=$request->input('password');
            $password=sha1($pas);
            $pass=$request->input('password_confirmation');
            $passwordR=sha1($pass);
            $prueba=DB::table('usr')->where('usr.ci_per','=',$ci)->count();
            $prueba1=DB::table('usr')->where('usr.email','=',$email)->count();
            $roles=Rol::where('id_rol','=',$rol)->pluck('ro');
            $ina=request()->except('_token');
                //dd($request->file('Foto'));
            if(!empty($ina['Foto'])){

                //dd($request->file('Foto'));
                $loca=$ina['Foto']->store('uploads','public');
              if($prueba < 1 || $prueba1<1){
                if ($prueba<1) {
                    if ($prueba1<1) {
                     if($password==$passwordR){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                         $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'foto'=>$loca ,'ci_per'=>$ci,'telefono'=>$tel]);

                         //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                         //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                         $getuser = DB::table('usr')->where('usr.ci_per', '=', $ci)->select('id_usr', 'email', 'password')->get();
                         //return $insertpersona." user".$insertuser."get ".$getuser;
                         $id=Usr::where('ci_per','=',$ci )->pluck('id_usr');
                         foreach ($getuser as $key => $value) {
                             DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>$rol]);
                            //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                              DB::table('password_resets')->insert(['email'=>$email,'token'=>$password,'id_us'=>$id[0]]);

                             break;
                         }
                      }else
                      {
                        return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                      }
                    }else{
                        return back()->with('Mensaje', 'El CI ya esta registrado');

                    }
                    return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                  }else{
                    return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                  }
                  return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                }
        }else{
            if($prueba < 1 || $prueba1<1){
                if ($prueba<1) {
                    if ($prueba1<1) {
                     if($password==$passwordR){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                         $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'ci_per'=>$ci,'telefono'=>$tel]);

                         //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                         //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                         $getuser = DB::table('usr')->where('usr.ci_per', '=', $ci)->select('id_usr', 'email', 'password')->get();
                         //return $insertpersona." user".$insertuser."get ".$getuser;
                         $id=Usr::where('ci_per','=',$ci )->pluck('id_usr');
                         foreach ($getuser as $key => $value) {
                             DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>$rol]);
                            //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                              DB::table('password_resets')->insert(['email'=>$email,'token'=>$password,'id_us'=>$id[0]]);

                             break;
                         }
                      }else
                      {
                        return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                      }
                    }else{
                        return back()->with('Mensaje', 'El CI ya esta registrado');

                    }
                    return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                  }else{
                    return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                  }
                  return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                }

        }

    }
    public function insertar2(Request $request,$id){
        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'apelliP'=>'required|string|max:255',
                'apelliM'=>'required|string|max:255',
                'CI'=>'required|digits_between:6,12',
                'email' => 'required|string|email|max:255|unique:usr,email',
                'telefono' =>'required|digits_between:6,12',
                'password' => 'required|string:password_confirmation|min:6|confirmed',
                'Foto' => 'image'
            ] );

            $name=$request->input('name');
            $last_name=$request->input('apelliP');
            $last_ape=$request->input('apelliM');
            $ci = $request->input('CI');
            $email=$request->input('email');
            $tel=$request->input('telefono');
            $pas=$request->input('password');
            $password=sha1($pas);
            $pass=$request->input('password_confirmation');
            $passwordR=sha1($pass);
            $ids=$id;
            $prueba=DB::table('usr')->where('usr.ci_per','=',$ci)->count();
            $prueba1=DB::table('usr')->where('usr.email','=',$email)->count();
            $ina=request()->except('_token');
                //dd($request->file('Foto'));
            if(!empty($ina['Foto'])){

                //dd($request->file('Foto'));
                $loca=$ina['Foto']->store('uploads','public');
              if($prueba < 1 || $prueba1<1){
                if ($prueba<1) {
                    if ($prueba1<1) {
                     if($password==$passwordR){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                         $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'foto'=>$loca ,'ci_per'=>$ci,'telefono'=>$tel]);

                         //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                         //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                         $getuser = DB::table('usr')->where('usr.ci_per', '=', $ci)->select('id_usr', 'email', 'password')->get();
                         //return $insertpersona." user".$insertuser."get ".$getuser;
                         $id=Usr::where('ci_per','=',$ci )->pluck('id_usr');
                         foreach ($getuser as $key => $value) {
                             DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>$ids]);
                            //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                              DB::table('password_resets')->insert(['email'=>$email,'token'=>$password,'id_us'=>$id[0]]);

                             break;
                         }
                      }else
                      {
                        return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                      }
                    }else{
                        return back()->with('Mensaje', 'El CI ya esta registrado');

                    }
                    return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                  }else{
                    return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                  }
                  return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                }
        }else{
            if($prueba < 1 || $prueba1<1){
                if ($prueba<1) {
                    if ($prueba1<1) {
                     if($password==$passwordR){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ci, 'nombre'=>$name, 'apepa'=>$last_name,'apema'=>$last_ape]);
                         $insertuser=DB::table('usr')->insert(['login'=>$email, 'email'=>$email, 'password'=>$password,'ci_per'=>$ci,'telefono'=>$tel]);

                         //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                         //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                         $getuser = DB::table('usr')->where('usr.ci_per', '=', $ci)->select('id_usr', 'email', 'password')->get();
                         //return $insertpersona." user".$insertuser."get ".$getuser;
                         $id=Usr::where('ci_per','=',$ci )->pluck('id_usr');
                         foreach ($getuser as $key => $value) {
                             DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>$ids]);
                            //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                              DB::table('password_resets')->insert(['email'=>$email,'token'=>$password,'id_us'=>$id[0]]);

                             break;
                         }
                      }else
                      {
                        return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                      }
                    }else{
                        return back()->with('Mensaje', 'El CI ya esta registrado');

                    }
                    return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                  }else{
                    return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                  }
                  return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                }

        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function info()
    {
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $id=session()->get('id')->first();
                $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                    'usr_rol',
                    'id_usr',
                    'usr_id'
                )->join('rol', 'id_rol', 'rol_id')->where('usr.id_usr','=',$id)->select(
                     'usr.id_usr',
                     'persona.nombre',
                     'persona.apepa',
                     'persona.apema',
                     'persona.ci',
                     'usr.login',
                     'usr.email',
                     'rol.ro',
                     'usr.foto',
                     'usr.telefono',
                     'usr.direccion','usr.fecha_n','usr.edad','persona.ci2'
                 )->first();
        return view('iditU.infop',compact('users'));

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function editarUs( $id)
    {

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $idus=session()->get('user_rol');
         if($idus[0] == 1){
            $rols=DB::table('rol')->where('rol.id_rol', '>', 1)-> select('id_rol', 'ro')->get();
           }
           else{
            $rols=DB::table('rol')->where('rol.id_rol', '>', 2)-> select('id_rol', 'ro')->get();
           }

           $ids=$id;

                $users=DB::table('usr')->join('persona', 'ci_per', 'ci')->join(
                    'usr_rol',
                    'id_usr',
                    'usr_id'
                )->join('rol', 'id_rol', 'rol_id')->where('usr.id_usr','=',$ids)->select(
                     'usr.id_usr',
                     'persona.nombre',
                     'persona.apepa',
                     'persona.apema',
                     'persona.ci',
                     'usr.login',
                     'usr.email',
                     'usr.telefono',
                     'rol.ro',
                     'usr.foto'
                 )->first();

                return view('iditU.editU',compact('users','rols'));

            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');

    }
    public function editarU(Request $request,$id){
        if(session()->get('id')??''){
            $this->validate(
                $request,
                [   'foto'=>'image',
                    'name' =>'required|string|max:255',
                    'appa'=>'required|string|max:255',
                    'apema'=>'required|string|max:255',
                    'carnet'=>'required|digits_between:6,12',
                    'login' => 'required|string|email|max:255',
                    'email' => 'required|string|email|max:255',
                    'direccion' => 'required|string|max:255',
                    'nacimiento' => 'required|date',
                    'edad' => 'required|integer',
                    'telef'=>'required|digits_between:6,12'
                ] );

                $user=session()->get('id')->first();
                $ci=DB::table('usr')->join('persona','ci','ci_per')->where('usr.id_usr','=',$user)->pluck('persona.ci');
                $ema=session()->get('email')->first();
                $name=$request->input('name');
                $last_name=$request->input('appa');
                $last_ape=$request->input('apema');
                $car=$request->input('carnet');
                $direccion=$request->input('direccion');
                $naci=$request->input('nacimiento');
                $edad=$request->input('edad');
                //$ci = $request->input('ci');
                $login=$request->input('login');
                $email=$request->input('email');
                $tel=$request->input('telef');
                $ina=request()->except('_token');

                if(!empty($ina['Foto'])){

                    $loca=$ina['Foto']->store('uploads','public');
                    if($ema[0]==$email[0]){
                        $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'ci2'=>$car,'apepa'=>$last_name,'apema'=>$last_ape]);
                        $usr=DB::table('usr')->where('id_usr','=',$user)->update(['login'=>$login,'foto'=>$loca,'telefono'=>$tel,'direccion'=>$direccion,'fecha_n'=>$naci,'edad'=>$edad]);


                        return back()->with('Mensaje', 'La Informacion fue actualizado');

                     }else{
                        $count=Usr::where('email','=',$email)->count();
                        if($count>0){

                            return back()->with('Mensaje', 'El correo ya existe');

                        }else{
                            $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'ci2'=>$car,'apepa'=>$last_name,'apema'=>$last_ape]);
                            $usr=Usr::where('id_usr','=',$user)->update(['login'=>$login,'email'=>$email,'foto'=>$loca,'telefono'=>$tel,'direccion'=>$direccion,'fecha_n'=>$naci,'edad'=>$edad]);
                            $reset=DB::table('password_resets')->where('id_us','=',$user)->update(['email'=>$email]);

                            return back()->with('Mensaje', 'La Informacion fue actualizado');

                        }
                     }

                }else{
                    if($ema[0]==$email[0]){
                        $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'ci2'=>$car,'apepa'=>$last_name,'apema'=>$last_ape]);
                        $usr=DB::table('usr')->where('id_usr','=',$user)->update(['login'=>$login,'telefono'=>$tel,'direccion'=>$direccion,'fecha_n'=>$naci,'edad'=>$edad]);


                        return back()->with('Mensaje', 'La Informacion fue actualizado');

                     }else{
                        $count=Usr::where('email','=',$email)->count();
                        if($count>0){

                            return back()->with('Mensaje', 'El correo ya existe');

                        }else{
                            $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'ci2'=>$car,'apepa'=>$last_name,'apema'=>$last_ape]);
                            $usr=Usr::where('id_usr','=',$user)->update(['login'=>$login,'email'=>$email,'telefono'=>$tel,'direccion'=>$direccion,'fecha_n'=>$naci,'edad'=>$edad]);
                            $reset=DB::table('password_resets')->where('id_us','=',$user)->update(['email'=>$email]);

                            return back()->with('Mensaje', 'La Informacion fue actualizado');

                        }
                     }


                }


        }else {
            return redirect()->route('login') ->with('info');
         }

    }

    public function editarPas(Request $request,$id){

        $this->validate(
            $request,
            [
                'old_password'=>'required|string|max:255',
                'password' => 'required|string:password_confirmation|min:6|confirmed'

            ] );

                $pasw1=$request->input('old_password');
                $pasw=sha1($pasw1);
                $newpas1=$request->input('password');
                $newpas=sha1($newpas1);
                $confir1=$request->input('password_confirmation');
                $confir=sha1($confir1);
        if(session()->get('id') ?? ''){
                $rol=session()->get('user_rol')->first();
                $maxr=DB::table('rol')->max('id_rol');

                if($rol<=$maxr){
                    $idr=session()->get('id')->first();
                    $pasd=Usr::where('id_usr', '=', $idr)->pluck('password');
                  if($pasd!=$newpas){

                    $pat=Usr::where('id_usr','=',$idr)->update(['password'=>$newpas]);
                    $reset=DB::table('password_resets')->where('id_us','=',$idr)->update(['token'=>$newpas]);
                    return back()->with('Mensaje','La contraseña se cambio correctamente');
                  }else{
                    return back()->with('Mensaje', 'Se pide que la nueva contraseña sea diferente');
                  }
                }
                else{
                    return redirect()->route('login') ->with('info');
                }
            }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function editUs(Request $request,$edit)
    {
        $this->validate(
            $request,
            [
                'name' =>'required|string|max:255',
                'apelliP'=>'required|string|max:255',
                'apelliM'=>'required|string|max:255',
                'Login'=>'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'telefono'=>'required|digits_between:6,12',
                'rol'=>'required|integer',
/*                 'password' => 'string:password_confirmation|min:6|confirmed'
 */
                ] );

                $name=$request->input('name');
                $last_name=$request->input('apelliP');
                $last_ape=$request->input('apelliM');
                //$ci = $request->input('ci');
                $login=$request->input('Login');
                $ema=$request->input('email');
                $tel=$request->input('telefono');
                $idr=$edit;
                $rol=$request->input('rol');
                /* $passw=$request->input('password');
                $conf=$request->input('password_confirmation'); */

        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $ci=DB::table('usr')->join('persona','ci','ci_per')->where('usr.id_usr','=',$idr)->pluck('persona.ci');
                $email=DB::table('usr')->join('persona','ci','ci_per')->where('usr.id_usr','=',$idr)->pluck('usr.email');

                if($ema==$email[0]){
                    $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                    $usr=DB::table('usr')->where('id_usr','=',$idr)->update(['login'=>$login, 'telefono'=>$tel]);


                    return back()->with('Mensaje', 'La Informacion fue actualizado');

                 }else{
                    $count=Usr::where('email','=',$email)->count();
                    if($count>0){

                        return back()->with('Mensaje', 'El correo ya existe');

                    }else{
                        $per=Persona::where('ci','=',$ci[0])->update(['nombre'=>$name,'apepa'=>$last_name,'apema'=>$last_ape]);
                        $usr=Usr::where('id_usr','=',$idr)->update(['login'=>$login,'email'=>$email,'telefono'=>$tel]);
                        $reset=DB::table('password_resets')->where('id_us','=',$idr)->update(['email'=>$email]);

                        return back()->with('Mensaje', 'La Informacion fue actualizado');

                    }
                 }


            }else
            return redirect()->route('login')
            ->with('info');

        }else return redirect()->route('login')
        ->with('info');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usr $usr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usr  $usr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usr $usr)
    {
        //
    }

    public function formuini(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $gestion=DB::table('gestion')->select('id_gest','año')->get();
                $curso=DB::table('curso')->where('id_curso','>',1)->select('nomb_cur','id_curso')->get();
                $para=DB::table('paralelo')->select('id_para','letra')->get();
                return view('escuela.formuini',compact('curso','para','gestion'));
            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }

    public function forminifa(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $gestion=DB::table('gestion')->select('id_gest','año')->get();
                $padr=DB::table('persona')->join('usr','ci','ci_per')->join('tutor','us_id','id_usr')->select('persona.ci','persona.nombre','persona.apepa','persona.apema')->get();
                return view('escuela.formuinifami',compact('gestion','padr'));
            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }
    public function estunuevo(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){
                $gestion=DB::table('gestion')->select('id_gest','año')->get();
                $curso=DB::table('curso')->where('id_curso','>',1)->select('nomb_cur','id_curso')->get();
                $para=DB::table('paralelo')->select('id_para','letra')->get();
                return view('escuela.formuest',compact('curso','para','gestion'));
            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }

    public function estufami(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $gestion=DB::table('gestion')->select('id_gest','año')->get();
                $curso=DB::table('curso')->where('id_curso','>',1)->select('nomb_cur','id_curso')->get();
                $para=DB::table('paralelo')->select('id_para','letra')->get();

                $padr=DB::table('persona')->join('usr','ci','ci_per')->join('tutor','us_id','id_usr')->select('persona.ci','persona.nombre','persona.apepa','persona.apema')->get();

                return view('escuela.formulfami',compact('curso','para','gestion','padr'));

            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }
    public function insertinicial(Request $request){
        $this->validate(
            $request,
            [
                'gest'=>'required|integer',
                'namEs' =>'required|string|max:255',
                'apelliPEs'=>'required|string|max:255',
                'apelliMEs'=>'required|string|max:255',
                'CIEs'=>'required|digits_between:6,12',
                'emailEs' => 'required|string|email|max:255|unique:usr,email',
                'telefonoEs' =>'required|digits_between:6,12',
                'vive'=>'required|string|max:255',
                'cerca'=>'required|string|max:255',
                'nacimiento'=>'required|string|max:255',
                'luz'=>'required|string|max:255',
                'genero'=>'required|string|max:255',
                /*-*/
                'nameTu' =>'required|string|max:255',
                'apelliPTu'=>'required|string|max:255',
                'apelliMTu'=>'required|string|max:255',
                'CITu'=>'required|digits_between:6,12',
                'emailTu' => 'required|string|email|max:255|unique:usr,email',
                'telefonoTu' =>'required|digits_between:6,12',
                'tipoTu'=>'required|string|max:255'
            ] );
            $gest=$request->input('gest');
            $nameEs=$request->input('namEs');
            $last_nameEs=$request->input('apelliPEs');
            $last_apeEs=$request->input('apelliMEs');
            $ciEs = $request->input('CIEs');
            $emailEs=$request->input('emailEs');
            $telEs=$request->input('telefonoEs');
            $genero=$request->input('genero');
            $vive=$request->input('vive');
            $cerca=$request->input('cerca');
            $nacimiento=$request->input('nacimiento');
            $luz=$request->input('luz');
            $password=sha1($ciEs);
            $passwordR=sha1($ciEs);
            /*-- */
            $nameTu=$request->input('nameTu');
            $last_nameTu=$request->input('apelliPTu');
            $last_apeTu=$request->input('apelliMTu');
            $ciTu = $request->input('CITu');
            $emailTu=$request->input('emailTu');
            $telTu=$request->input('telefonoTu');
            $tipotu=$request->input('tipoTu');
            $passwordTu=sha1($ciTu);
            $passwordRTu=sha1($ciTu);

            $pruebaEs=DB::table('usr')->where('usr.ci_per','=',$ciEs)->count();
            $prueba1Es=DB::table('usr')->where('usr.email','=',$emailEs)->count();

            $pruebaTu=DB::table('usr')->where('usr.ci_per','=',$ciTu)->count();
            $prueba1Tu=DB::table('usr')->where('usr.email','=',$emailTu)->count();

            if($pruebaTu < 1 || $prueba1Tu<1){
                if ($pruebaTu<1) {
                    if ($prueba1Tu<1) {
                     if($passwordTu==$passwordRTu){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ciTu, 'nombre'=>$nameTu, 'apepa'=>$last_nameTu,'apema'=>$last_apeTu]);
                         $insertuser=DB::table('usr')->insert(['login'=>$emailTu, 'email'=>$emailTu, 'password'=>$passwordTu,'ci_per'=>$ciTu,'telefono'=>$telTu]);

                         //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                         //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                         $getuserTu = DB::table('usr')->where('usr.ci_per', '=', $ciTu)->select('id_usr', 'email', 'password')->get();
                         //return $insertpersona." user".$insertuser."get ".$getuser;
                         $id=Usr::where('ci_per','=',$ciTu )->pluck('id_usr');
                         foreach ($getuserTu as $key => $value) {
                             DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>4]);
                            //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                              DB::table('password_resets')->insert(['email'=>$emailTu,'token'=>$passwordTu,'id_us'=>$id[0]]);

                             break;
                         }
                         if($pruebaEs < 1 || $prueba1Es<1){
                            if ($pruebaEs<1) {
                                if ($prueba1Es<1) {
                                 if($password==$passwordR){
                                     $insertpersona=DB::table('persona')->insert(['ci'=>$ciEs, 'nombre'=>$nameEs, 'apepa'=>$last_nameEs,'apema'=>$last_apeEs]);
                                     $insertuser=DB::table('usr')->insert(['login'=>$emailEs, 'email'=>$emailEs, 'password'=>$password,'ci_per'=>$ciEs,'telefono'=>$telEs]);

                                     //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                                     //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                                     $getuser = DB::table('usr')->where('usr.ci_per', '=', $ciEs)->select('id_usr', 'email', 'password')->get();
                                     //return $insertpersona." user".$insertuser."get ".$getuser;
                                     $id=Usr::where('ci_per','=',$ciEs )->pluck('id_usr');
                                     foreach ($getuser as $key => $value) {
                                         DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>5]);
                                        //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                                          DB::table('password_resets')->insert(['email'=>$emailEs,'token'=>$password,'id_us'=>$id[0]]);

                                         break;
                                     }
                                     $tutor=DB::table('usr')->where('ci_per','=',$ciTu)->pluck('id_usr')->first();
                                     $estud=DB::table('usr')->where('ci_per','=',$ciEs)->pluck('id_usr')->first();

                                     $insrtuto=DB::table('tutor')->insert(['us_id'=>$tutor,'tipo_p'=>$tipotu]);
                                     $idtuto=DB::table('tutor')->where('us_id','=',$tutor)->pluck('id_tutor')->first();
                                     $insertest=DB::table('estudiante')->insert(['tut_id'=>$idtuto,'user_id'=>$estud,'sexo'=>$genero,'vive'=>$vive,'trabaja'=>$cerca,'luz_f'=>$luz,'cert_naci'=>$nacimiento]);
                                     $idest=DB::table('estudiante')->where('user_id','=',$estud)->pluck('id_estu')->first();
                                     $insert=$this->sortear($idest,$gest,$genero);


                                  }else
                                  {
                                    return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                                  }
                                }else{
                                    return back()->with('Mensaje', 'El CI ya esta registrado');

                                }
                                return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                              }else{
                                return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                              }
                              return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                            }
                      }else
                      {
                        return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                      }
                    }else{
                        return back()->with('Mensaje', 'El CI ya esta registrado');

                    }
                    return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                  }else{
                    return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                  }
                  return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                }

    }

    public function insertinifami(Request $request){
        $this->validate(
            $request,
            [
                'gest'=>'required|integer',
                'namEs' =>'required|string|max:255',
                'apelliPEs'=>'required|string|max:255',
                'apelliMEs'=>'required|string|max:255',
                'CIEs'=>'required|digits_between:6,12',
                'emailEs' => 'required|string|email|max:255|unique:usr,email',
                'telefonoEs' =>'required|digits_between:6,12',
                'vive'=>'required|string|max:255',
                'cerca'=>'required|string|max:255',
                'nacimiento'=>'required|string|max:255',
                'luz'=>'required|string|max:255',
                'genero'=>'required|string|max:255',
                /*-*/

                'codigo'=>'required|digits_between:6,12',
                'tipoTu'=>'required|string|max:255'
            ] );
            $gest=$request->input('gest');
            $nameEs=$request->input('namEs');
            $last_nameEs=$request->input('apelliPEs');
            $last_apeEs=$request->input('apelliMEs');
            $ciEs = $request->input('CIEs');
            $emailEs=$request->input('emailEs');
            $telEs=$request->input('telefonoEs');
            $genero=$request->input('genero');
            $vive=$request->input('vive');
            $cerca=$request->input('cerca');
            $nacimiento=$request->input('nacimiento');
            $luz=$request->input('luz');
            $password=sha1($ciEs);
            $passwordR=sha1($ciEs);
            /*-- */ //dd($request->file('Foto'));
            $ciTu=$request->input('codigo');
            $tipotu=$request->input('tipoTu');

            $pruebaEs=DB::table('usr')->where('usr.ci_per','=',$ciEs)->count();
            $prueba1Es=DB::table('usr')->where('usr.email','=',$emailEs)->count();


                                    if($pruebaEs < 1 || $prueba1Es<1){
                            if ($pruebaEs<1) {
                                if ($prueba1Es<1) {
                                 if($password==$passwordR){
                                     $insertpersona=DB::table('persona')->insert(['ci'=>$ciEs, 'nombre'=>$nameEs, 'apepa'=>$last_nameEs,'apema'=>$last_apeEs]);
                                     $insertuser=DB::table('usr')->insert(['login'=>$emailEs, 'email'=>$emailEs, 'password'=>$password,'ci_per'=>$ciEs,'telefono'=>$telEs]);

                                     //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                                     //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                                     $getuser = DB::table('usr')->where('usr.ci_per', '=', $ciEs)->select('id_usr', 'email', 'password')->get();
                                     //return $insertpersona." user".$insertuser."get ".$getuser;
                                     $id=Usr::where('ci_per','=',$ciEs )->pluck('id_usr');
                                     foreach ($getuser as $key => $value) {
                                         DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>5]);
                                        //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                                          DB::table('password_resets')->insert(['email'=>$emailEs,'token'=>$password,'id_us'=>$id[0]]);

                                         break;
                                     }
                                     $tutor=DB::table('usr')->where('ci_per','=',$ciTu)->pluck('id_usr')->first();
                                     $estud=DB::table('usr')->where('ci_per','=',$ciEs)->pluck('id_usr')->first();

                                     $insrtuto=DB::table('tutor')->insert(['us_id'=>$tutor,'tipo_p'=>$tipotu]);
                                     $idtuto=DB::table('tutor')->where('us_id','=',$tutor)->pluck('id_tutor')->first();
                                     $insertest=DB::table('estudiante')->insert(['tut_id'=>$idtuto,'user_id'=>$estud,'sexo'=>$genero,'vive'=>$vive,'trabaja'=>$cerca,'luz_f'=>$luz,'cert_naci'=>$nacimiento]);
                                     $idest=DB::table('estudiante')->where('user_id','=',$estud)->pluck('id_estu')->first();
                                     $insert=$this->sortear($idest,$gest,$genero);


                                  }else
                                  {
                                    return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                                  }
                                }else{
                                    return back()->with('Mensaje', 'El CI ya esta registrado');

                                }
                                return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                              }else{
                                return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                              }
                              return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                            }
    }
    public function insertnuevo(Request $request){
        $this->validate(
            $request,
            [
                'gest'=>'required|integer',
                'cur'=>'required|integer',
                'para'=>'required|integer',
                'namEs' =>'required|string|max:255',
                'apelliPEs'=>'required|string|max:255',
                'apelliMEs'=>'required|string|max:255',
                'CIEs'=>'required|digits_between:6,12',
                'emailEs' => 'required|string|email|max:255|unique:usr,email',
                'telefonoEs' =>'required|digits_between:6,12',
                'vive'=>'required|string|max:255',
                'cerca'=>'required|string|max:255',
                'nacimiento'=>'required|string|max:255',
                'luz'=>'required|string|max:255',
                'genero'=>'required|string|max:255',
                /*-*/
                'nameTu' =>'required|string|max:255',
                'apelliPTu'=>'required|string|max:255',
                'apelliMTu'=>'required|string|max:255',
                'CITu'=>'required|digits_between:6,12',
                'emailTu' => 'required|string|email|max:255|unique:usr,email',
                'telefonoTu' =>'required|digits_between:6,12',
                'tipoTu'=>'required|string|max:255'
            ] );
            $gest=$request->input('gest');
            $nameEs=$request->input('namEs');
            $curso=$request->input('cur');
            $para=$request->input('para');
            $last_nameEs=$request->input('apelliPEs');
            $last_apeEs=$request->input('apelliMEs');
            $ciEs = $request->input('CIEs');
            $emailEs=$request->input('emailEs');
            $telEs=$request->input('telefonoEs');
            $genero=$request->input('genero');
            $vive=$request->input('vive');
            $cerca=$request->input('cerca');
            $nacimiento=$request->input('nacimiento');
            $luz=$request->input('luz');
            $password=sha1($ciEs);
            $passwordR=sha1($ciEs);
            /*-- */
            $nameTu=$request->input('nameTu');
            $last_nameTu=$request->input('apelliPTu');
            $last_apeTu=$request->input('apelliMTu');
            $ciTu = $request->input('CITu');
            $emailTu=$request->input('emailTu');
            $telTu=$request->input('telefonoTu');
            $tipotu=$request->input('tipoTu');
            $passwordTu=sha1($ciTu);
            $passwordRTu=sha1($ciTu);

            $pruebaEs=DB::table('usr')->where('usr.ci_per','=',$ciEs)->count();
            $prueba1Es=DB::table('usr')->where('usr.email','=',$emailEs)->count();

            $pruebaTu=DB::table('usr')->where('usr.ci_per','=',$ciTu)->count();
            $prueba1Tu=DB::table('usr')->where('usr.email','=',$emailTu)->count();

            if($pruebaTu < 1 || $prueba1Tu<1){
                if ($pruebaTu<1) {
                    if ($prueba1Tu<1) {
                     if($passwordTu==$passwordRTu){
                         $insertpersona=DB::table('persona')->insert(['ci'=>$ciTu, 'nombre'=>$nameTu, 'apepa'=>$last_nameTu,'apema'=>$last_apeTu]);
                         $insertuser=DB::table('usr')->insert(['login'=>$emailTu, 'email'=>$emailTu, 'password'=>$passwordTu,'ci_per'=>$ciTu,'telefono'=>$telTu]);

                         //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                         //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                         $getuserTu = DB::table('usr')->where('usr.ci_per', '=', $ciTu)->select('id_usr', 'email', 'password')->get();
                         //return $insertpersona." user".$insertuser."get ".$getuser;
                         $id=Usr::where('ci_per','=',$ciTu )->pluck('id_usr');
                         foreach ($getuserTu as $key => $value) {
                             DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>4]);
                            //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                              DB::table('password_resets')->insert(['email'=>$emailTu,'token'=>$passwordTu,'id_us'=>$id[0]]);

                             break;
                         }
                        if($pruebaEs < 1 || $prueba1Es<1){
                            if ($pruebaEs<1) {
                                if ($prueba1Es<1) {
                                 if($password==$passwordR){
                                     $insertpersona=DB::table('persona')->insert(['ci'=>$ciEs, 'nombre'=>$nameEs, 'apepa'=>$last_nameEs,'apema'=>$last_apeEs]);
                                     $insertuser=DB::table('usr')->insert(['login'=>$emailEs, 'email'=>$emailEs, 'password'=>$password,'ci_per'=>$ciEs,'telefono'=>$telEs]);

                                     //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                                     //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                                     $getuser = DB::table('usr')->where('usr.ci_per', '=', $ciEs)->select('id_usr', 'email', 'password')->get();
                                     //return $insertpersona." user".$insertuser."get ".$getuser;
                                     $id=Usr::where('ci_per','=',$ciEs )->pluck('id_usr');
                                     foreach ($getuser as $key => $value) {
                                         DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>5]);
                                        //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                                          DB::table('password_resets')->insert(['email'=>$emailEs,'token'=>$password,'id_us'=>$id[0]]);

                                         break;
                                     }
                                     $tutor=DB::table('usr')->where('ci_per','=',$ciTu)->pluck('id_usr')->first();
                                     $estud=DB::table('usr')->where('ci_per','=',$ciEs)->pluck('id_usr')->first();

                                     $insrtuto=DB::table('tutor')->insert(['us_id'=>$tutor,'tipo_p'=>$tipotu]);
                                     $idtuto=DB::table('tutor')->where('us_id','=',$tutor)->pluck('id_tutor')->first();
                                     $insertest=DB::table('estudiante')->insert(['tut_id'=>$idtuto,'user_id'=>$estud,'sexo'=>$genero,'vive'=>$vive,'trabaja'=>$cerca,'luz_f'=>$luz,'cert_naci'=>$nacimiento,'tipo_pare'=>$tipotu]);
                                     $idest=DB::table('estudiante')->where('user_id','=',$estud)->pluck('id_estu')->first();

                                         $insert=DB::table('registrado')->insert(['curso_id'=>$curso,'estu_id'=>$idest,'gest_id'=>$gest,'par_id'=>$para,'estado'=>'Abandono']);
                                         return redirect()->route('estudnuevo')
                                         ->with('info');
                                  }else
                                  {
                                    return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                                  }
                                }else{
                                    return back()->with('Mensaje', 'El CI ya esta registrado');

                                }
                                return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                              }else{
                                return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                              }
                              return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                        }
                      }else
                      {
                        return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                      }
                    }else{
                        return back()->with('Mensaje', 'El CI ya esta registrado');

                    }
                    return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                  }else{
                    return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                  }
                  return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                }

    }

    public function insertnuevfami(Request $request){
        $this->validate(
            $request,
            [
                'gest'=>'required|integer',
                'cur'=>'required|integer',
                'para'=>'required|integer',
                'namEs' =>'required|string|max:255',
                'apelliPEs'=>'required|string|max:255',
                'apelliMEs'=>'required|string|max:255',
                'CIEs'=>'required|digits_between:6,12',
                'emailEs' => 'required|string|email|max:255|unique:usr,email',
                'telefonoEs' =>'required|digits_between:6,12',
                'vive'=>'required|string|max:255',
                'cerca'=>'required|string|max:255',
                'nacimiento'=>'required|string|max:255',
                'luz'=>'required|string|max:255',
                'genero'=>'required|string|max:255',
                /*  */
                'codigo'=>'required|integer',
                'tipoTu'=>'required|string|max:255'
                ] );
            $gest=$request->input('gest');
            $nameEs=$request->input('namEs');
            $curso=$request->input('cur');
            $para=$request->input('para');
            $last_nameEs=$request->input('apelliPEs');
            $last_apeEs=$request->input('apelliMEs');
            $ciEs = $request->input('CIEs');
            $emailEs=$request->input('emailEs');
            $telEs=$request->input('telefonoEs');
            $genero=$request->input('genero');
            $vive=$request->input('vive');
            $cerca=$request->input('cerca');
            $nacimiento=$request->input('nacimiento');
            $luz=$request->input('luz');
            $password=sha1($ciEs);
            $passwordR=sha1($ciEs);
            /*-- */
            $ciTu=$request->input('codigo');
            $tipotu=$request->input('tipoTu');


            //dd($request->file('Foto'));
                $pruebaEs=DB::table('usr')->where('usr.ci_per','=',$ciEs)->count();
                $prueba1Es=DB::table('usr')->where('usr.email','=',$emailEs)->count();


                if($pruebaEs < 1 || $prueba1Es<1){
                    if ($pruebaEs<1) {
                        if ($prueba1Es<1) {
                         if($password==$passwordR){
                             $insertpersona=DB::table('persona')->insert(['ci'=>$ciEs, 'nombre'=>$nameEs, 'apepa'=>$last_nameEs,'apema'=>$last_apeEs]);
                             $insertuser=DB::table('usr')->insert(['login'=>$emailEs, 'email'=>$emailEs, 'password'=>$password,'ci_per'=>$ciEs,'telefono'=>$telEs]);

                             //$rol = rol ::where('rol.id_rol', '=',1)->select('id_rol') ->get();
                             //$usr = usr::where('usr.ci_per','=', $ci)->select('id_usr')->get();
                             $getuser = DB::table('usr')->where('usr.ci_per', '=', $ciEs)->select('id_usr', 'email', 'password')->get();
                             //return $insertpersona." user".$insertuser."get ".$getuser;
                             $id=Usr::where('ci_per','=',$ciEs )->pluck('id_usr');
                             foreach ($getuser as $key => $value) {
                                 DB::table('usr_rol')->insert(['usr_id'=>$value->id_usr, 'rol_id'=>5]);
                                //  DB::table('password_reset')->insert(['email'=>$value->email,'token'=>$value->password,'id_us'=>$value->id_usr]);
                                  DB::table('password_resets')->insert(['email'=>$emailEs,'token'=>$password,'id_us'=>$id[0]]);

                                 break;
                             }
                             $tutor=DB::table('usr')->where('ci_per','=',$ciTu)->pluck('id_usr')->first();
                             $estud=DB::table('usr')->where('ci_per','=',$ciEs)->pluck('id_usr')->first();

                             $insrtuto=DB::table('tutor')->insert(['us_id'=>$tutor,'tipo_p'=>$tipotu]);
                             $idtuto=DB::table('tutor')->where('us_id','=',$tutor)->pluck('id_tutor')->first();
                             $insertest=DB::table('estudiante')->insert(['tut_id'=>$idtuto,'user_id'=>$estud,'sexo'=>$genero,'vive'=>$vive,'trabaja'=>$cerca,'luz_f'=>$luz,'cert_naci'=>$nacimiento,'tipo_pare'=>$tipotu]);
                             $idest=DB::table('estudiante')->where('user_id','=',$estud)->pluck('id_estu')->first();

                                 $insert=DB::table('registrado')->insert(['curso_id'=>$curso,'estu_id'=>$idest,'gest_id'=>$gest,'par_id'=>$para,'estado'=>'Abandono']);
                                 return redirect()->route('estudnuevo')
                                 ->with('info');
                          }else
                          {
                            return back()->with('Mensaje', 'Las contraseñas no coinciden, intente de nuevo');
                          }
                        }else{
                            return back()->with('Mensaje', 'El CI ya esta registrado');

                        }
                        return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                      }else{
                        return back()->with('Mensaje', 'El EMAIL ya esta registrado');

                      }
                      return back()->with('Mensaje', 'Has agregado un nuevo Usuario');

                }
    }
    private function sortear($idest,$gest,$genero){
        $est=$idest;
        $gestion=$gest;
        $gene=$genero;
        $curso=1;
        $countA=DB::table('estudiante')->join('registrado','estu_id','id_estu')->where('gest_id','=',$gestion)->where('curso_id','=',1)->where('par_id','=',1)->count('estu_id');
        $countB=DB::table('estudiante')->join('registrado','estu_id','id_estu')->where('gest_id','=',$gestion)->where('curso_id','=',1)->where('par_id','=',2)->count('estu_id');
        $countC=DB::table('estudiante')->join('registrado','estu_id','id_estu')->where('gest_id','=',$gestion)->where('curso_id','=',1)->where('par_id','=',3)->count('estu_id');

        $countAM=DB::table('estudiante')->join('registrado','estu_id','id_estu')->where('gest_id','=',$gestion)->where('curso_id','=',1)->where('par_id','=',1)->count('estu_id');
        $countAH=DB::table('estudiante')->join('registrado','estu_id','id_estu')->where('gest_id','=',$gestion)->where('curso_id','=',1)->where('par_id','=',1)->count('estu_id');
        $countBM=DB::table('estudiante')->join('registrado','estu_id','id_estu')->where('gest_id','=',$gestion)->where('curso_id','=',1)->where('par_id','=',2)->count('estu_id');
        $countBH=DB::table('estudiante')->join('registrado','estu_id','id_estu')->where('gest_id','=',$gestion)->where('curso_id','=',1)->where('par_id','=',2)->count('estu_id');
        $countCM=DB::table('estudiante')->join('registrado','estu_id','id_estu')->where('gest_id','=',$gestion)->where('curso_id','=',1)->where('par_id','=',3)->count('estu_id');
        $countCH=DB::table('estudiante')->join('registrado','estu_id','id_estu')->where('gest_id','=',$gestion)->where('curso_id','=',1)->where('par_id','=',3)->count('estu_id');


        if($countA==0 && $countB==0 && $countC==0){
            $paralelo=[1,2,3];
            $al_par=$paralelo[mt_rand(0,count($paralelo)-1)];
                $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$al_par]);
                return redirect()->route('curinicial')
                ->with('info');
            }

            if($countA!=0 && $countB==0 && $countC==0){
                $paralelo=[2,3];
                $al_par=$paralelo[mt_rand(0,count($paralelo)-1)];
                $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$al_par]);
                return redirect()->route('curinicial')
                ->with('info');
            }
            if($countA==0 && $countB!=0 && $countC==0){
                $paralelo=[1,3];
                $al_par=$paralelo[mt_rand(0,count($paralelo)-1)];
                $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$al_par]);
                return redirect()->route('curinicial')
                ->with('info');
            }
            if($countA==0 && $countB==0 && $countC!=0){
                $paralelo=[1,2];
                $al_par=$paralelo[mt_rand(0,count($paralelo)-1)];
                $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$al_par]);
                return redirect()->route('curinicial')
                ->with('info');
            }
            if($countA==0 && $countB!=0 && $countC!=0){
                $paralelo=1;
                $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$paralelo]);
                return redirect()->route('curinicial')
                ->with('info');
            }
            if($countA!=0 && $countB==0 && $countC!=0){
                $paralelo=2;
                $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$paralelo]);
                return redirect()->route('curinicial')
                ->with('info');
            }
            if($countA!=0 && $countB!=0 && $countC==0){
                $paralelo=3;
                $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$paralelo]);
                return redirect()->route('curinicial')
                ->with('info');
            }

            if($countA==$countB && $countA == $countC && $countB == $countC){

                if($countAH==$countBH && $countAH ==$countCH && $countBH==$countCH){

                    if($countAM==$countBM && $countAM ==$countCM && $countBM==$countCM){
                        $paralelo=[1,2,3];
                        $al_par=$paralelo[mt_rand(0,count($paralelo)-1)];
                            $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$al_par]);
                            return redirect()->route('curinicial')
                            ->with('info');
                    }
                }
            }
            if($countA>=$countB){
               if($countA>$countC){
                $paralelo=3;
                $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$paralelo]);
                return redirect()->route('curinicial')
                ->with('info');
               }
            }
            if($countA>=$countC){
                if($countA>$countB){
                 $paralelo=2;
                 $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$paralelo]);
                 return redirect()->route('curinicial')
                 ->with('info');
                }
             }

             if($countB>=$countC){
                if($countB>$countA){
                 $paralelo=1;
                 $inserregi=DB::table('registrado')->insert(['curso_id'=>1,'estu_id'=>$est,'gest_id'=>$gestion,'par_id'=>$paralelo]);
                 return redirect()->route('curinicial')
                 ->with('info');
                }
             }


    }

}
