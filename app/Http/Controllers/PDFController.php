<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Materia;
use App\Models\Familiar;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
Use Carbon\Carbon;

/**
 * Class AlumnoController
 * @package App\Http\Controllers
 */
class PDFController extends Controller
{
    public function create()
    {
        $alumnos = Alumno::all();
        $cursos = Curso::all();
        $materias = Materia::all();
        
        return view('PDF.create', compact('alumnos', 'cursos','materias'));
    }

    public function matriz(Request $request)
    {
        $alumno = Alumno::findOrFail($request->alumno_DNI);

        $data = ['alumno' => $alumno];

        $pdf = Pdf::loadView('PDF.matriz', $data);
        return $pdf->download('[LIBRO MATRIZ]' . $alumno->DNI . '.pdf');
    }

    public function boletin(Request $request)
    {
        $alumno = Alumno::findOrFail($request->alumno_DNI);

        $materias = $alumno->materias()->where('origin',$request->curso_id)->get();

        $data = ['alumno' => $alumno, 'materias' => $materias];
        
        $pdf = Pdf::loadView('PDF.boletin', $data);
        return $pdf->download('[BOLETIN]' . $alumno->DNI . '.pdf');
    }

}