<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UsrController;
use Illuminate\Http\Request;
use App\Models\Rol;
use DB;
use App\Models\Usr;
use App\Models\Persona;
use App\Models\Usr_rol;
use App\Models\Sesion;
class index extends Controller
{
    public function prueba(){
        return view('prueba');

    }
    public function Index()
    {

             if(session()->get('user_rol') ?? ''){
               if(session()->get('user_rol')->first()<=$maxr=DB::table('rol')->max('id_rol')){
                session()->flush();
                return view('welcome');

              }else
              return view('welcome');
            }else     return view('welcome');

     }
     public function user(){

         if(session()->get('id') ?? ''){
             $maxs=Rol::max('id_rol');
             if(session()->get('user_rol')->first()<=$maxs){

                 $countA=Usr_rol::where('usr_rol.rol_id','=',2)->count('rol_id');
                 $countS=Usr_rol::where('usr_rol.rol_id','=',3)->count('rol_id');
                 $countE=Usr_rol::where('usr_rol.rol_id','=',4)->count('rol_id');
                 $countT=Usr_rol::where('usr_rol.rol_id','=',5)->count('rol_id');
                 $countG=Usr_rol::count('rol_id');
                 $count=$countG-1;
                 $rol=DB::table('rol')->select('id_rol')->get();
                 return view('superU.inicio',compact('countA','countS','countE','countT','count','rol'));


             }else
             return redirect()->route('login')
             ->with('info');

         }else return redirect()->route('login')
         ->with('info');

     }
     public function usuario()
     {
         if(session()->get('id') ?? ''){
             $maxs=Rol::max('id_rol');
             if(session()->get('user_rol')->first()<=$maxs){
                 $vehs=DB::table('vehiculo')->select('nombr_ve','peso','pesoI','distan_ini','distan_ini','distaci_fin','imagen')->get();

                 $rol=DB::table('rol')->select('id_rol')->get();
                 return view('users.index',compact('rol','vehs'));


             }else
             return redirect()->route('login')
             ->with('info');

         }else return redirect()->route('login')
         ->with('info');
     }
     public function loading(){
         if(session()->get('id') ?? ''){
             $maxs=Rol::max('id_rol');
             if(session()->get('user_rol')->first()<=$maxs){
                 return view('categoria.loading');

             }else
             return redirect()->route('login')
             ->with('info');

         }else return redirect()->route('login')
         ->with('info');
     }
}
