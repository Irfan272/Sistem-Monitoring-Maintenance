<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use Illuminate\Http\Request;
use App\Models\PengajuanPerbaikan;
use App\Models\User;
use Carbon\Carbon;

class ManagerPerbaikanController extends Controller
{
   
    
    public function index(){
        $permintaan = PengajuanPerbaikan::with('peralatan', 'user')->paginate(10);

        return view('manager_MT.perbaikan.index', compact('permintaan'));
    }


    public function create(){
        $permintaan = PengajuanPerbaikan::with('peralatan', 'user')->paginate(10);


        return view('manager_MT.perbaikan.create', compact('permintaan'));
    }

    public function edit($id){
        $permintaan = PengajuanPerbaikan::where('id',$id)->get();
        $peralatan = Peralatan::all();
        $user = User::where('role', 'User')->get();
        $teknisi = User::where('role', 'Teknisi')->get();
        return view('manager_MT.perbaikan.edit', compact('permintaan', 'peralatan', 'teknisi', 'user'));
    } 

    public function update(Request $request, $id){


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





        return redirect('manager/perbaikan');
    }

    public function cetakPerbaikan(){
        return view('manager_MT.laporan.cetak-perbaikan');
    }
    public function cetakPerbaikanPertanggal($tanggal_awal, $tanggal_akhir){

        $tanggal_mulai = Carbon::parse($tanggal_awal)->format('d-m-Y');
        
        $tanggal_terakhir = Carbon::parse($tanggal_akhir)->format('d-m-Y');
        //dd(["Tanggal Awal : ".$tanggal_awal,"Tanggal Akhir : ".$tanggal_akhir]  );
        $cetakperbaikan = PengajuanPerbaikan::whereBetween('tanggal_pekerjaan', [$tanggal_awal, $tanggal_akhir])->get();
        $total =  $cetakperbaikan->count();
        $tanggal_cetak = Carbon::today()->startOfDay()->format('d-m-Y');
        
        return view('manager_MT.laporan.cetak-perbaikan-pertanggal', compact('tanggal_cetak','cetakperbaikan', 'tanggal_mulai', 'tanggal_terakhir', 'total'));

        // return view('manager_MT.perawatan.index', compact('cetakperawatan'));
        // return view('manager_MT.perawatan.index', compact('cetakperawatan'));
    }

}
