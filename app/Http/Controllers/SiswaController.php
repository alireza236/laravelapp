<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SiswaRequest;
use App\Siswa;
use App\Telepon;
use App\Kelas;
use App\Hobi;
use Storage;
use Validator;
use Session;


class SiswaController extends Controller
{
    //
    public function __construct()
    {
       $this->middleware('auth',['except'=>[
           'index',
           'show',
           'cari'
       ]]);
    }
    
    public function cari(Request $request){
      
       $kata_kunci = trim($request->input('kata_kunci'));
       if (!empty($kata_kunci)) {
           $jenis_kelamin = $request->input('jenis_kelamin');
           $id_kelas = $request->input('id_kelas');
           
           //Query
           $query = Siswa::where('nama_siswa','LIKE','%'.$kata_kunci.'%');
           (!empty($jenis_kelamin)) ? $query->JenisKelamin($jenis_kelamin) : '';
           (!empty($id_kelas)) ? $query->Kelas($id_kelas) : '';
            $siswa_list = $query->paginate(3);

            //URL link pagination
            $pagination = (!empty($jenis_kelamin)) ? $siswa_list->appends(['jenis_kelamin'=> $jenis_kelamin]) : '';
            $pagination = (!empty($id_kelas)) ? $pagination = $siswa_list->appends(['kata_kunci'=> $kata_kunci]) : '';

            $jumlah_siswa = $siswa_list->total();
            return view('siswa.index', compact('siswa_list','kata_kunci','pagination','jumlah_siswa','id_kelas','jenis_kelamin'));

        }
        return redirect('siswa');

    }

    public function uploadFoto(SiswaRequest $request){
        $foto = $request->file('foto');
        $ext = $foto->getClientOriginalExtension();
        if ($request->file('foto')->isValid()) {
            $foto_name = date('YmdHis').".$ext";
            $upload_path = 'fotoupload';
            $request->file('foto')->move($upload_path, $foto_name);
            return $foto_name; 
        }
        return false;
     }

    public function hapusFoto(Siswa $siswa){
        $exist = Storage::disk('foto')->exists($siswa->foto);
        if (isset($siswa->foto) && $exist) {
             $delete = Storage::disk('foto')->delete($siswa->foto);
             if ($delete) {
                 return true;
             }
             return false;
        }
     }

    public function index(){
        $halaman = 'siswa';
        $siswa_list = Siswa::orderBy('nama_siswa','asc')->paginate(5);
        $jumlah_siswa = Siswa::count(); 
        return view('siswa.index', compact('halaman','siswa_list','jumlah_siswa'));
    }

    public function create(){
        
        return view('siswa.create');
    }

    public function store(SiswaRequest $request){
        $input =  $request->all();

        if ($request->hasFile('foto')) {
            $input['foto'] = $this->uploadFoto($request);
        }
       
        $siswa = Siswa::create($input);
       
        $telepon = new Telepon;
        $telepon->nomor_telepon = $request->input('nomor_telepon');
        $siswa->telepon()->save($telepon);

        $siswa->hobi()->attach($request->input('hobi_siswa'));
        Session::flash('flash_message','data siswa berhasil disimpan');
        return redirect('siswa');
    }

    public function show(Siswa $siswa){
        return view('siswa.show', compact('siswa'));  
     }

     public function edit(Siswa $siswa){
         isset($siswa->nomor_telepon) ?  $siswa->telepon->nomor_telepon : null;
         //dd($siswa); 
         return view('siswa.edit', compact('siswa'));
     }

     public function update(Siswa $siswa, SiswaRequest $request){
          
          $input = $request->all();

          if ($request->hasFile('foto')) {
              
              //hapus foto lama
              $this->hapusFoto($siswa);

              //upload foto baru
              $input['foto'] = $this->uploadFoto($request);
          }

          $siswa->update($input);
         
          $telepon = $siswa->telepon;

          $telepon->nomor_telepon =  $request->input('nomor_telepon');

          $siswa->telepon()->save($telepon);

          $siswa->hobi()->sync($request->input('hobi_siswa'));

          Session::flash('flash_message','data siswa berhasil disimpan');

          return redirect('siswa');  
     }

     public function destroy(Siswa $siswa){
         $this->hapusFoto($siswa);
         $siswa->delete();
         return redirect('siswa');
     }

 
     /* public function testKoleksi(){
         $orang = ['ferry burhan','anwar sanusi','syamsudin surya','dadang zaenal','jaka joko'];
         $koleksi = collect($orang)->map(function($nama){
            return ucwords($nama);
         })->toJson();
         return $koleksi;
     }

     public function dateMutator($id){
         $siswa = Siswa::findOrFail($id);
         $str = "Tanggal Lahir:".
                $siswa->tanggal_lahir->format('d-m-Y')."<br>".
                "Ulang Tahun ke 30 akan jatuh pada tanggal: ".
                "<strong>".$siswa->tanggal_lahir->addYears(30)->format('d-m-Y')."</strong>";
         return $str;        
     } */
}
