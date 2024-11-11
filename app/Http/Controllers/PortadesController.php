<?php

namespace App\Http\Controllers;

use App\Models\Portada;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PortadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portades = Portada::orderBy('ordre')->get();

        return view('backend.portades.index')
            ->with('portades', $portades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.portades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'actiu' => 'required',
            'ordre' => 'nullable',
            'imatge1' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg',
            'imatge2' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg'
        ]);/* Max foto 10 MB */

        $ruta_imatge1 = $request['imatge1']->store('backend/portades', 'public');
        $imatge1 = Image::make( storage_path("app/public/{$ruta_imatge1}") )->fit(1200, 752, function($constraint){$constraint->aspectRatio();});
        $imatge1->save();

        $ruta_imatge2 = $request['imatge2']->store('backend/portades', 'public');
        $imatge2 = Image::make( storage_path("app/public/{$ruta_imatge2}") )->fit(1200, 752, function($constraint){$constraint->aspectRatio();});
        $imatge2->save();

        $portada = new Portada($data);
        $portada->imatge1 = $ruta_imatge1;
        $portada->imatge2 = $ruta_imatge2;
        
        if($request->filled('ordre')){
            $portada->ordre = $data['ordre'];
        } else {
            $portada->ordre = 10;
        }

        $portada->save();

        // Redireccionar
        return redirect()->action('PortadesController@index')->with('estat', 'Portada insertada correctament');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portada $portada
     * @return \Illuminate\Http\Response
     */
    public function edit(Portada $portada)
    {
        return view('backend.portades.edit', compact('portada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portada $portada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portada $portada)
    {
        // Validació
        $data = $request->validate([
            'actiu' => 'required',
            'ordre' => 'nullable'
        ]);
        
        // Asignar valors
        $portada->actiu = $data['actiu'];
        if($request->filled('ordre')) {
            $portada->ordre = $data['ordre'];
        } else {
            $portada->ordre = 10;
        }

        // Si el usuario sube una nueva imagen
        if($request['imatge1']) {
            $ruta_imatge1 = $request['imatge1']->store('backend/portades', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_imatge1}") )->fit(1200, 752, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$portada->imatge1"))) {
                File::delete(storage_path("app/public/$portada->imatge1"));
                // Asignar al objeto
                $portada->imatge1 = $ruta_imatge1;
            }  
        }

        if($request['imatge2']) {
            $ruta_imatge2 = $request['imatge2']->store('backend/portades', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_imatge2}") )->fit(1200, 752, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$portada->imatge2"))) {
                File::delete(storage_path("app/public/$portada->imatge2"));
                // Asignar al objeto
                $portada->imatge2 = $ruta_imatge2;
            }  
        }

        $portada->save();

        // Redireccionar
        return redirect()->action('PortadesController@index')->with('estat', 'Portada modificada correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portada $portada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portada $portada)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$portada->imatge1"))) {
            File::delete(storage_path("app/public/$portada->imatge1"));
        }

        $portada->delete();
        
        return redirect()->action('PortadesController@index');
    }
}
