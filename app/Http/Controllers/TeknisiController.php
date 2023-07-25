<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Peralatan;
use Illuminate\Http\Request;
use App\Models\PerawatanRutin;
use App\Models\PengajuanPerbaikan;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;

class TeknisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('Teknisi');
    }

    public function home(){
        $total_perawatan = PerawatanRutin::all()->count();
        $total_peralatan = Peralatan::all()->count();
        $total_perbaikan = PengajuanPerbaikan::all()->count();

        $perawatan = PerawatanRutin::all();
        $peralatan = Peralatan::all();
        $perbaikan = PengajuanPerbaikan::all();
        $divisi = Divisi::all();
        $akun = User::all();
        // $akun = User::with('divisi')->paginate(10);

        return view('teknisi.dashboard', compact('akun','divisi','total_perawatan', 'total_peralatan', 'total_perbaikan', 'peralatan', 'perbaikan', 'perawatan'));
    }

    public function indexPerawatan(){
        $perawatan = PerawatanRutin::with('peralatan', 'user')->paginate(10);

        return view('teknisi.perawatan.index', compact('perawatan'));
    }

    public function editPerawatan($id){
   
        $peralatan = Peralatan::all();
        $user = User::where('role', 'Teknisi')->get();
        $perawatan = PerawatanRutin::where('id', $id)->get();

        return view('teknisi.perawatan.edit', compact('peralatan', 'user', 'perawatan'));
    }


    public function updatePerawatan(Request $request, $id){
        $validasiData = $request->validate([
        

            'judul' => 'required|max:255',
            'id_peralatan' => 'required',            
            'keterangan' => 'required|max:255',
            'prioritas' => 'required',
            'id_teknisi' => 'required',
            'status' => 'nullable|max:50',
        ]);

    
        $prioritas = $request->input('prioritas');
        $tanggal_pekerjaan = Carbon::today();

        if($prioritas === 'critical'){
            $tanggal_pekerjaan->addDays(2);
        }elseif($prioritas === 'hight'){
            $tanggal_pekerjaan->addDays(14);
        }elseif($prioritas === 'medium'){
            $tanggal_pekerjaan->addDays(30);
        }elseif($prioritas === 'low'){
            $tanggal_pekerjaan->addDays(90);
        }

        $validasiData['tanggal_pekerjaan'] = $tanggal_pekerjaan;
    
        PerawatanRutin::where('id', $id)->update($validasiData);

        // $validasiData = $request->validate([
        //     'nama_divisi' => 'required',
        //     'keterangan' => 'required',
        // ]);

        // Divisi::create($validasiData);

        return redirect('/teknisi/perawatan');
    }

    public function indexPerbaikan(){
        $permintaan = PengajuanPerbaikan::with('peralatan', 'user')->paginate(10);
        return view('teknisi.perbaikan.index', compact('permintaan'));
    }


    
    public function editPerbaikan($id){
        $permintaan = PengajuanPerbaikan::where('id',$id)->get();
        $peralatan = Peralatan::all();
        $user = User::where('role', 'User')->get();
        $teknisi = User::where('role', 'Teknisi')->get();
        return view('teknisi.perbaikan.edit', compact('permintaan', 'peralatan', 'teknisi', 'user'));
    } 

    public function updatePerbaikan(Request $request, $id){


        $validasiData = $request->validate([

            'judul' => 'required|max:255',
            'id_peralatan' => 'required',
            'id_user' =>  'required',
            'keterangan' => 'required|max:255',
            'prioritas' => 'required|max:255',
            'lokasi' => 'required|max:255',
       
            'status' => 'nullable|max:50',
            'id_teknisi' => 'nullable|max:50',



           

        ]);

        $prioritas = $request->input('prioritas');
        $tanggal_pekerjaan = Carbon::today();

        if($prioritas === 'critical'){
            $tanggal_pekerjaan->addDays(2);
        }elseif($prioritas === 'hight'){
            $tanggal_pekerjaan->addDays(14);
        }elseif($prioritas === 'medium'){
            $tanggal_pekerjaan->addDays(30);
        }elseif($prioritas === 'low'){
            $tanggal_pekerjaan->addDays(90);
        }

        $validasiData['tanggal_pekerjaan'] = $tanggal_pekerjaan;
        PengajuanPerbaikan::where('id', $id)->update($validasiData);





        return redirect('teknisi/perbaikan');
    }
}
