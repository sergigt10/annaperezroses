<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use Artesaos\SEOTools\Facades\SEOTools;

use App\Models\Portada;
use App\Models\Obra;

class HomeFrontendController extends Controller
{

    public function index()
    {
        SEOTools::setTitle('Anna Perez Roses, Passió per la pintura');
        SEOTools::setCanonical('https://www.annaperezroses.com/');

        $portades = Portada::where('actiu','=',1)->orderBy('ordre','asc')->get();

        return view('frontend.inici.index', compact('portades'));
    }

    public function biografia()
    {
        SEOTools::setTitle('Anna Perez Roses biografia');

        return view('frontend.biografia.index');
    }

    public function pintures()
    {
        SEOTools::setTitle('Pintura Anna Perez Roses');

        $pintures = Obra::where('categoria','=','Pintura')->where('actiu','=',1)->orderBy('ordre')->get();

        return view('frontend.pintures.index', compact('pintures'));
    }

    public function ceramiques()
    {
        SEOTools::setTitle('Ceràmica Anna Perez Roses');

        $ceramiques = Obra::where('categoria','=','Ceràmica')->where('actiu','=',1)->orderBy('ordre')->get();

        return view('frontend.ceramiques.index', compact('ceramiques'));
    }

    public function ilustracions()
    {
        SEOTools::setTitle('Il·lustració Anna Perez Roses');

        $ilustracions = Obra::where('categoria','=','Il·lustració')->where('actiu','=',1)->orderBy('ordre')->get();

        return view('frontend.ilustracions.index', compact('ilustracions'));
    }

    public function contacte()
    {
        SEOTools::setTitle('Contacte Anna Perez Roses');

        return view('frontend.contacte.index');
    }

    public function sendEmail(Request $request){

        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'poblacio' => $request->poblacio,
            'message' => $request->message
        ];

        $AdminMessage  = "Formulari de contacte WEB\n\n";
        $AdminMessage .= "Nom i cognoms: ".utf8_decode($data['name'])."\n";
        $AdminMessage .= "Email: ".utf8_decode($data['email'])."\n";
        $AdminMessage .= "Tlf.: ".utf8_decode($data['phone'])."\n";
        $AdminMessage .= "Pobl.: ".utf8_decode($data['poblacio'])."\n";
        $AdminMessage .= "Missatge: ".utf8_decode($data['message'])."\n";

        mail("info@annaperezroses.com", "Formulari de contacte", $AdminMessage, "From: ".$data['email']);

        return back()->with(['message_mail' => trans('Missatge enviat correctament! En breu ens posarem en contacte amb vosté. Gràcies')]);

    }

}
