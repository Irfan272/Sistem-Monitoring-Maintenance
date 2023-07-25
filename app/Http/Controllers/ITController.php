<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Divisi;
use App\Models\Peralatan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonInterval;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class ITController extends Controller
{

   

    public function dashboard(){

        $total_divisi = Divisi::all()->count();
        $total_akun = User::all()->count();
        $total_peralatan = Peralatan::all()->count();

        $peralatan = Peralatan::all();
        $divisi = Divisi::all();
        $akun = User::all();

        return view('ITSupport.dashboard', compact('total_divisi', 'total_akun', 'total_peralatan', 'divisi', 'peralatan', 'akun'));
    }


    // Start DivisiController
    public function indexDivisi(){
        $divisi = Divisi::all();

        return view('ITSupport.divisi.index', compact('divisi'));
    }

    public function createDivisi(){
        return view('ITSupport.divisi.create');
    }

    public function storeDivisi(Request $request){
        // Divisi::create([
        //     'nama_divisi' => $request->nama_divisi,
        //     'keterangan' => $request->keterangan
        // ]);
        $validasiData = $request->validate([
            'nama_divisi' => 'nullable|string|max:30',
            'keterangan' => 'nullable|string|max:50',
        ]);
        Divisi::create($validasiData);



        // $validasiData = $request->validate([
        //     'nama_divisi' => 'required',
        //     'keterangan' => 'required',
        // ]);

        // Divisi::create($validasiData);

        return redirect('/IT/divisi');
    }

    public function editDivisi($id){
        $divisi = Divisi::where('id',$id)->get();
     
        return view('ITSupport.divisi.edit', compact('divisi'));
    } 

    public function updateDivisi(Request $request, $id){
        Divisi::where('id', $id)->update([
            'nama_divisi' => $request->nama_divisi,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/IT/divisi');
    }

    public function deleteDivisi($id){
        Divisi::destroy($id);
        return back();
    }
    
    // End DivisiController

    // Start RoleController 
    public function indexRole(){
        $roles = Role::all();

     
        return view('ITSupport.role.index', compact('roles'));
    }


    public function createRole(){
        return view('ITSupport.role.create');
    }

    public function storeRole(Request $request){
  
        Role::create([
            'nama_role' => $request->nama_role,
            'keterangan' => $request->keterangan,
        ]);
  
        return redirect('/IT/role');
    }

    public function editRole($id){
        $roles = Role::where('id',$id)->first();
     
        return view('ITSupport.role.edit', compact('roles'));
    } 

    public function updateRole(Request $request, $id){
        Role::where('id', $id)->update([
            'nama_role' => $request->nama_role,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/IT/role');
    }

    public function deleteRole($id){
        Role::destroy($id);
        return back();
    }

    // End RoleController


    // Start AkunController
    public function indexAkun(){
        $akun = User::with('divisi')->paginate(10);


        return view('ITSupport.akun.index', compact('akun'));
    }

    public function createAkun(){
        $divisi = Divisi::all();
        return view('ITSupport.akun.create', compact('divisi'));
    }
    
    public function storeAkun(Request $request){
        

            $validasiData = $request->validate([
    

        'username' =>  'required|string|max:255',
        'nama_lengkap' =>  'required|string|max:255',
        'email' =>  'required|string|max:255|unique:users',
        'password' =>  'required|string|max:20',
        'tanggal_lahir' =>  'required|max:255',
        'jenis_kelamin' =>  'required',
        'alamat' =>  'required|string|max:255',
        'no_telpon' =>  'required|string|max:255',
        'jabatan' =>  'required|string|max:255',
        'id_divisi' =>  'required',
        'role' =>  'required|string|max:255',



        ]);
        $validasiData['password'] = Hash::make($validasiData['password']);

        User::create($validasiData);



        return redirect('/IT/akun');
    }

    public function editAkun($id){
        $divisi = Divisi::all();
        $role = Role::all();
        $akun = User::where('id',$id)->get();
     
        return view('ITSupport.akun.edit', compact('akun', 'divisi', 'role'));
    } 

    public function updateAkun(Request $request, $id){
        // User::where('id', $id)->update([

        //     'username' =>  $request->username,
        //     'nama_lengkap' =>  $request->nama_lengkap,
        //     'email' =>  $request->email,
        //     'password' =>  Hash::make($request->password) ,
        //     'tanggal_lahir' =>  $request->tanggal_lahir,
        //     'jenis_kelamin' =>  $request->jenis_kelamin,
        //     'alamat' =>  $request->alamat,
        //     'no_telpon' =>  $request->no_telpon,
        //     'jabatan' =>  $request->jabatan,
        //     'id_divisi' =>  $request->id_divisi,
        //     'id_role' =>  $request->id_role,
        // ]);

        $validasiData = $request->validate([
    

            'username' =>  'required|string|max:255',
            'nama_lengkap' =>  'required|string|max:255',
            'email' =>  'required|string|max:255|unique:users',
            'password' =>  'required|string|max:20',
            'tanggal_lahir' =>  'required|max:255',
            'jenis_kelamin' =>  'required',
            'alamat' =>  'required|string|max:255',
            'no_telpon' =>  'required|string|max:255',
            'jabatan' =>  'required|string|max:255',
            'id_divisi' =>  'required',
            'role' =>  'required|string|max:255',
    
    
    
            ]);
            $validasiData['password'] = Hash::make($validasiData['password']);
        User::where('id', $id)->update($validasiData);







        return redirect('/IT/akun');
    }

    public function deleteAkun($id){
        User::destroy($id);
        return back();
    }
    // End AkunController


    // Start Peralatan
    public function indexPeralatan(){
        $peralatans = Peralatan::with('divisi')->paginate(10);

        return view ('ITSupport.peralatan.index', compact('peralatans'));
    }

    public function createPeralatan(){
        $divisi = Divisi::all();

        return view ('ITSupport.peralatan.create', compact('divisi'));
    }

    public function storePeralatan(Request $request){


        // Peralatan::create([
         

        //     'nama_peralatan'=> $request->nama_peralatan,
        //     'jenis_peralatan'=> $request->jenis_peralatan,
        //     'merk_peralatan'=> $request->merk_peralatan,
        //     'produsen'=> $request->produsen,
        //     'id_divisi'=> $request->id_divisi,
        //     'tahun_pembuatan'=> $request->tahun_pembuatan,
        //     'tahun_batas'=> $request->tahun_batas,
        //     'kondisi'=> $request->kondisi,
        // ]);

        $validasiData = $request->validate([
            'nama_peralatan'=> 'required|max:50',
            'jenis_peralatan'=> 'required|max:50',
            'merk_peralatan'=> 'required|max:50',
            'produsen'=> 'required|max:50',
            'id_divisi'=> 'required',
            'tahun_pembuatan'=> 'required|max:255',
            'tahun_batas' => 'required',
            'kondisi'=> 'required|max:50',
        ]);

        $tahun_pembuatan = $request->input('tahun_pembuatan');
        $tahun_batas = $request->input('tahun_batas');

        $tanggal_pembuatan = Carbon::parse($tahun_pembuatan);
        $tanggal_batas = Carbon::parse($tahun_batas);
        
        $umur_tahun = $tanggal_batas->diffInYears($tanggal_pembuatan);
        $umur_bulan = $tanggal_batas->diffInMonths($tanggal_pembuatan) - ($umur_tahun * 12);
        $umur_hari = $tanggal_batas->diffInDays($tanggal_pembuatan) - $tanggal_pembuatan->addMonths($umur_bulan)->diffInDays($tanggal_batas);
        
        $umur = $umur_tahun . ' tahun ' . $umur_bulan . ' bulan ' . $umur_hari . ' hari';
        
        $validasiData['umur'] = $umur;
       
        Peralatan::create($validasiData);


        

        return redirect('/IT/peralatan');
    }
 
  

   

    public function editPeralatan($id){
        $divisi = Divisi::all();
        $peralatan = Peralatan::where('id',$id)->get();
     
        return view('ITSupport.peralatan.edit', compact('peralatan', 'divisi'));
    } 

    public function updatePeralatan(Request $request, $id){
        // Peralatan::where('id', $id)->update([
        //     'nama_peralatan'=> $request->nama_peralatan,
        //     'jenis_peralatan'=> $request->jenis_perawatan,
        //     'merk_peralatan'=> $request->merk_peralatan,
        //     'produsen'=> $request->produsen,
        //     'id_divisi'=> $request->id_divisi,
        //     'tahun_pembuatan'=> $request->tahun_pembuatan,
        //     'tahun_batas'=> $request->tahun_batas,
        //     'kondisi'=> $request->kondisi,
        // ]);

        
        $validasiData = $request->validate([
            'nama_peralatan'=> 'required|max:50',
            'jenis_peralatan'=> 'required|max:50',
            'merk_peralatan'=> 'required|max:50',
            'produsen'=> 'required|max:50',
            'id_divisi'=> 'required',
            'tahun_pembuatan'=> 'required|max:255',
            'tahun_batas' => 'required',
            'kondisi'=> 'required|max:50',
        ]);

        $tahun_pembuatan = $request->input('tahun_pembuatan');
        $tahun_batas = $request->input('tahun_batas');

        $tanggal_pembuatan = Carbon::parse($tahun_pembuatan);
        $tanggal_batas = Carbon::parse($tahun_batas);
        
        $umur_tahun = $tanggal_batas->diffInYears($tanggal_pembuatan);
        $umur_bulan = $tanggal_batas->diffInMonths($tanggal_pembuatan) - ($umur_tahun * 12);
        $umur_hari = $tanggal_batas->diffInDays($tanggal_pembuatan) - $tanggal_pembuatan->addMonths($umur_bulan)->diffInDays($tanggal_batas);
        
        $umur = $umur_tahun . ' tahun ' . $umur_bulan . ' bulan ' . $umur_hari . ' hari';
        
        $validasiData['umur'] = $umur;

            Peralatan::where('id', $id)->update($validasiData);



        return redirect('/IT/peralatan');
    }

    public function deletePeralatan($id){
        Peralatan::destroy($id);
        return back();
    }
    // End Peralatan

}
