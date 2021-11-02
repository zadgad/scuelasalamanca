<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Rol;
use DB;
use App\Models\Usr;
use App\Http\Controllers\Controller;

class escuelaController extends Controller
{
    public function formgestion(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                    return view('escuela.formgestion');

            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }
    public function insertges(Request $request){
        $this->validate(
            $request,
            [
                'año' =>'required|digits_between:4,4',
                'inicio'=>'required|date',
                'fin'=>'required|date',

            ] );
            $año=$request->input('año');
            $inicio=$request->input('inicio');
            $final=$request->input('fin');
                $inser=DB::table('gestion')->insert(['año'=>$año,'fecha_ini'=>$inicio,'fecha_fin'=>$final]);
                return redirect()->route('tabgestion')
                ->with('info');
    }
    public function tablasg(){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $select=DB::table('gestion')->select('id_gest','año','fecha_ini','fecha_fin')->get();
                    return view('escuela.tablag',compact('select'));

            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }
    public function tablacursos($id){
        if(session()->get('id') ?? ''){
            $maxs=Rol::max('id_rol');
            if(session()->get('user_rol')->first()<=$maxs){

                $aux=$id;
                $curso=DB::table('curso')->select('id_curso','nomb_cur')->get();
                $para=DB::table('paralelo')->select('id_para','letra')->get();

                $datos=DB::table('registrado')->join('curso','curso_id','id_curso')->join('paralelo','par_id','id_para')->join('gestion','id_gest','gest_id')->where('id_gest','=',$aux)->distinct('nomb_cur','letra','id_curso','id_par')->get();
                return view('escuela.formucurso',compact('curso','para','aux'));
            }else
            return redirect()->route('login')
            ->with('info');
        }else return redirect()->route('login')
        ->with('info');
    }
    public function estudicurso(Request $request){
        $this->validate(
            $request,
            [
                'gestion' =>'required|integer',
                'cur'=>'required|integer',
                'para'=>'required|integer',

            ] );

            $año=$request->input('gestion');
            $curso=$request->input('cur');
            $para=$request->input('para');

            $datos=DB::table('persona')->join('usr','ci_per','ci')->join('estudiante','user_id','id_usr')->join('registrado','estu_id','id_estu')->join('curso','curso_id','id_curso')->join('paralelo','par_id','id_para')->join('gestion','id_gest','gest_id')->where('id_gest','=',$año)
            ->where('id_curso','=',$curso)->where('id_para','=',$para)->select('nombre','ci','apepa','apema','email','ci','nomb_cur','letra','id_curso','id_para','id_estu')->get();
            return view('escuela.tablaestucur',compact('datos'));


    }
}
