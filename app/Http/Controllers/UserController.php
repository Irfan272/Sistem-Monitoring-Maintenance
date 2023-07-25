<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Divisi;
use App\Models\Peralatan;
use Illuminate\Http\Request;
use App\Models\PengajuanPerbaikan;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('User');
    }



    public function dashboard(){
        $total_peralatan = Peralatan::all()->count();
        $total_permintaan = PengajuanPerbaikan::all()->count();

        $peralatan = Peralatan::all();
      
        $permintaan = PengajuanPerbaikan::all();
        $akun = User::all();

        return view('penanggung_jawab.dashboard', compact('total_peralatan', 'total_permintaan', 'peralatan', 'permintaan', 'akun'));
    }


    public function index(){

        $user = Auth::user()->id;
        $result = PengajuanPerbaikan::with('peralatan', 'user')
                ->where('id_user', $user)
                ->get();

        // $permintaan = PengajuanPerbaikan::with('peralatan', 'user')->get();

        return view('penanggung_jawab.permintaan_perbaikan.index', compact('result'));
    }

    public function create(){
        $peralatan = Peralatan::all();
        // $user = User::where('role', 'Teknisi')->get();

        return view('penanggung_jawab.permintaan_perbaikan.create', compact('peralatan'));
    }

    public function store(Request $request){
        // PengajuanPerbaikan::create([
      
        //     'judul' => $request-> judul,
        //     'id_peralatan' => $request-> id_peralatan,
        //     'id_user' => $request-> id_user,
        //     'keterangan' => $request-> keterangan,
        //     'prioritas' => $request-> prioritas,
        //     'lokasi' => $request-> lokasi,
        //     'tanggal_pekerjaan' => $request-> tanggal_pekerjaan ,
        //     // 'status' => $request-> status ,
        //     // 'id_teknisi' => $request-> id_teknisi,
            
        // ]);

        $validasiData = $request->validate([
       

            'judul' => 'required|max:255',
            'id_peralatan' => 'required',
            'keterangan' => 'required|max:255',
            'prioritas' => 'required|max:255',
            'lokasi' => 'required|max:255',

        ]);

        $status = "Menunggu Approval";
        $user = Auth::id();

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
        $validasiData['id_user'] = $user;
        $validasiData['status'] = $status;





        PengajuanPerbaikan::create($validasiData);

        // $validasiData = $request->validate([
        //     'nama_divisi' => 'required',
        //     'keterangan' => 'required',
        // ]);

        // Divisi::create($validasiData);

        return redirect('/user/permintaan');
    }

   

    public function edit($id){
        $permintaan = PengajuanPerbaikan::where('id',$id)->first();
        $peralatan = Peralatan::all();
        $user = User::all();
        return view('penanggung_jawab.permintaan_perbaikan.edit', compact('permintaan', 'peralatan', 'user'));
    } 

    public function update(Request $request, $id){
        // PengajuanPerbaikan::where('id', $id)->update([
        //     'nama_divisi' => $request->nama_divisi,
        //     'keterangan' => $request->keterangan
        // ]);

        $validasiData = $request->validate([

            'judul' => 'required|max:255',
            'id_peralatan' => 'required',
            'keterangan' => 'required|max:255',
            'prioritas' => 'required|max:255',
            'lokasi' => 'required|max:255',

        ]);


        $status = "Menunggu Approval";
        $user = Auth::id();

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
        $validasiData['id_user'] = $user;
        $validasiData['status'] = $status;

        PengajuanPerbaikan::where('id', $id)->update($validasiData);





        return redirect('/user/permintaan');
    }

    public function delete($id){
        PengajuanPerbaikan::destroy($id);
        return back();
    }

}
