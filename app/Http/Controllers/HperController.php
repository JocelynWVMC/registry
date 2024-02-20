<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class HperController extends Controller
{
    public function hper_view(Request $request){
        return view('/hper');
    }
    public function hper_search_patient(Request $request){
        $hcode = strip_tags($request->input('hpatcode'));
        $patf = strip_tags($request->input('patfirst'));
        $patm = strip_tags($request->input('patmiddle'));
        $patl = strip_tags($request->input('patlast'));
        $max = strip_tags($request->input('max_data'));

        $data = DB::table('hperson')
            ->where('hpatcode','like','%'.$hcode.'%')
            ->where('patfirst','like','%'.$patf.'%')                                      
            ->where('patmiddle','like','%'.$patm.'%')
            ->where('patlast','like','%'.$patl.'%') 
            ->skip(0)
            ->take($max)
            ->get();

        return response()->json([
            'status'=>200,
            'data'=>$data,
        ]);
    }
    public function hper(Request $request){
        return 'this is patient111';
    }

    // public function hper_test(Request $request)
    // {
    //     // Your logic to search for the patient                     
    //     $patients1 = 'fghgf';

    //     // Return the view with the search results
    //     return view('your-view-name', ['patients' => $patients1]);
    // }
}

