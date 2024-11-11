<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ObresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($categoria)
    {
        $obres = Obra::where('categoria', '=', $categoria)->orderBy('ordre')->get();

        return view('backend.obres.index')
            ->with('obres', $obres)
            ->with('nomCategoria', $categoria);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.obres.create');
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
            'categoria' => 'required',
            'imatge1' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg'
        ]);/* Max foto 10 MB */

        $ruta_imatge1 = $request['imatge1']->store('backend/obres', 'public');
        $imatge1 = Image::make( storage_path("app/public/{$ruta_imatge1}") )->resize(1879, 1920, function($constraint){$constraint->aspectRatio();});
        $imatge1->save();

        $obra = new Obra($data);
        $obra->imatge1 = $ruta_imatge1;
        
        if($request->filled('ordre')){
            $obra->ordre = $data['ordre'];
        } else {
            $obra->ordre = 10;
        }

        $obra->save();

        // Redireccionar
        return redirect()->action('ObresController@index', ['categoria' => $data['categoria']])->with('estat', 'Obra insertada correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obra $obra
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = ['Pintura','Ceràmica','Il·lustració'];

        return view('backend.obres.show')
            ->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obra $obra
     * @return \Illuminate\Http\Response
     */
    public function edit(Obra $obra)
    {
        return view('backend.obres.edit', compact('obra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obra $obra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obra $obra)
    {
        // Validació
        $data = $request->validate([
            'actiu' => 'required',
            'ordre' => 'nullable',
            'categoria' => 'required'
        ]);
        
        // Asignar valors
        $obra->actiu = $data['actiu'];
        if($request->filled('ordre')) {
            $obra->ordre = $data['ordre'];
        } else {
            $obra->ordre = 10;
        }
        $obra->categoria = $data['categoria'];

        // Si el usuario sube una nueva imagen
        if($request['imatge1']) {
            $ruta_imatge1 = $request['imatge1']->store('backend/obres', 'public');

            $img = Image::make( storage_path("app/public/{$ruta_imatge1}") )->resize(1879, 1920, function($constraint){$constraint->aspectRatio();});
            $img->save();

            // Eliminamos la imagen anterior
            if (File::exists(storage_path("app/public/$obra->imatge1"))) {
                File::delete(storage_path("app/public/$obra->imatge1"));
                // Asignar al objeto
                $obra->imatge1 = $ruta_imatge1;
            }  
        }

        $obra->save();

        // Redireccionar
        return redirect()->action('ObresController@index', ['categoria' => $data['categoria']])->with('estat', 'Obra modificada correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obra $obra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obra $obra)
    {
        // Eliminar imatges
        if (File::exists(storage_path("app/public/$obra->imatge1"))) {
            File::delete(storage_path("app/public/$obra->imatge1"));
        }

        $obra->delete();
        
        return redirect()->action('ObresController@index', ['categoria' => $obra->categoria]);
    }
}
