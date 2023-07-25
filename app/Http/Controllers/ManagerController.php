<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Peralatan;
use Illuminate\Http\Request;
use App\Models\PerawatanRutin;
use App\Models\PengajuanPerbaikan;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use App\Notifications\NewItem;

class ManagerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('Manager');
    // }

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

        return view('manager_MT.dashboard', compact('akun','divisi','total_perawatan', 'total_peralatan', 'total_perbaikan', 'peralatan', 'perbaikan', 'perawatan'));
    }


    public function indexPerawatan(){
        $perawatan = PerawatanRutin::with('peralatan', 'user')->paginate(10);

        return view('manager_MT.perawatan.index', compact('perawatan'));
    }

    public function createPerawatan(){
        $peralatan = Peralatan::all();
        $user = User::where('role', 'Teknisi')->get();
        return view('manager_MT.perawatan.create', compact('peralatan', 'user'));
    }

    public function storePerawatan(Request $request){
  

        $validasiData = $request->validate([
        

            'judul' => 'required|max:255',
            'id_peralatan' => 'required',            
            'keterangan' => 'required|max:255',
            'tanggal_pekerjaan' => 'required|max:255',
            'status' => 'required|max:50',
            'id_teknisi' => 'required',

        ]);
        PerawatanRutin::create($validasiData);

        // $validasiData = $request->validate([
        //     'nama_divisi' => 'required',
        //     'keterangan' => 'required',
        // ]);

        // Divisi::create($validasiData);

        return redirect('/manager/perawatan');
    }


    public function editPerawatan($id){
   
        $peralatan = Peralatan::all();
        $user = User::where('role', 'Teknisi')->get();
        $perawatan = PerawatanRutin::where('id', $id)->first();

        return view('manager_MT.perawatan.edit', compact('peralatan', 'user', 'perawatan'));
    }


    public function updatePerawatan(Request $request, $id){
        $validasiData = $request->validate([
        

            'judul' => 'required|max:255',
            'id_peralatan' => 'required',            
            'keterangan' => 'required|max:255',
            'tanggal_pekerjaan' => 'required|max:255',
            'status' => 'required|max:50',
            'id_teknisi' => 'required',

        ]);
        PerawatanRutin::where('id', $id)->update($validasiData);

        // $validasiData = $request->validate([
        //     'nama_divisi' => 'required',
        //     'keterangan' => 'required',
        // ]);

        // Divisi::create($validasiData);

        return redirect('/manager/perawatan');
    }


    public function indexPerbaikan(){
        $permintaan = PengajuanPerbaikan::with('peralatan', 'user')->paginate(10);

        return view('manager_MT.perbaikan.index', compact('permintaan'));
    }


    public function createPerbaikan(){
        $permintaan = PengajuanPerbaikan::with('peralatan', 'user')->paginate(10);


        return view('manager_MT.perbaikan.create', compact('permintaan'));
    }

    public function editPerbaikan($id){
        $permintaan = PengajuanPerbaikan::where('id',$id)->first();
        $peralatan = Peralatan::all();
        $user = User::all();
        return view('manager_MT.perbaikan.edit', compact('permintaan', 'peralatan', 'user'));
    } 

    public function updatePerbaikan(Request $request, $id){
        // PengajuanPerbaikan::where('id', $id)->update([
        //     'nama_divisi' => $request->nama_divisi,
        //     'keterangan' => $request->keterangan
        // ]);

        $validasiData = $request->validate([
            // 'nama_divisi' => 'nullable|string|max:10',
            // 'keterangan' => 'nullable|string|max:50',

            'judul' => 'required|max:255',
            'id_peralatan' => 'required',
            'id_user' =>  'required',
            'keterangan' => 'required|max:255',
            'prioritas' => 'required|max:255',
            'lokasi' => 'required|max:255',
            'tanggal_pekerjaan' => 'required|max:255',
            'status' => 'nullable|max:50',
            'id_teknisi' => 'nullable|max:50',

        ]);
        PengajuanPerbaikan::where('id', $id)->update($validasiData);





        return redirect('manager/perbaikan');
    }

    public function cetakRiwayat(){
        $peralatan = Peralatan::all();
        return view('manager_MT.laporan.cetak-riwayat', compact(('peralatan')));
    }

    public function cetakRiwayatPeralatan($nama_peralatan){
        // dd($nama_peralatan);
        // $nama_peralatan = $request->input('nama_peralatan');
        $cetakRiwayat = Peralatan::where('nama_peralatan', $nama_peralatan)->get();
        $peralatan = Peralatan::where('nama_peralatan', $nama_peralatan)->get()->first();

        $riwayat = Peralatan::with('perawatan', 'pengajuan')->get();
        // dd([$cetakRiwayat]);
        return view('manager_MT.laporan.cetak-nama-peralatan', compact('cetakRiwayat', 'peralatan', 'riwayat'));
    }
}
