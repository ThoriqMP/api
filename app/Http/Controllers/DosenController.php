<?php

namespace App\Http\Controllers;

use App\Http\Requests\DosenRequest;
use App\Http\Resources\DosenResource;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    //
    public function store(DosenRequest $request){
        $data = $request ->validated();
        Dosen::create($data);
        return response()->json([
            'msg'=>'Data '.$request->nama.' berhasil ditambahkan',
        ], 201);
    }
    public function get(){
        $Dosen = Dosen::all();
        return response()->json([
            'data' => $Dosen
        ],  201);
    }
    public function getUsia(Request $request){
        $Dosen = Dosen::where('usia', $request->usia) -> get();
        return response()->json([
            'data' => $Dosen
        ],  201);
    }

    public function delete(Request $request){
        $Delete = Dosen::where('id',$request->id) -> delete();
        if($Delete == true){
            return response()->json([
                'msg'=>'Data '.$request->id.' berhasil dihapus',
            ], 201);
        } else{
            return response()->json([
                'msg'=>'Tidak ada parameter yang dipilih',
            ], 201);
        }
    }
    public function update(Request $request){
        // $data = $request ->validated();
        // $data = $request->validated();
        $Dosen = Dosen::find($request->id);

        if (!$Dosen) {
            
            return response()->json([
                'msg' => 'Dosen tidak ditemukan',
            ], 404);
        } else {
            if(isset($request->nama)){
            $Dosen->nama = $request->nama;
            }
            if(isset($request->usia)){
                $Dosen->usia = $request->usia;
            }
            if(isset($request->jenis)){
                $Dosen->jenis = $request->jenis;
            }
            $Dosen->save();
            // return (new DosenResource($Dosen))->response()->setStatusCode(201);
            if($Dosen == true){
                return response()->json([
                    'msg'=>'Data Berhasil Diupdate',
                ], 201);
            }
        }
        // $dosen = Dosen::where('id',$request->id);
        // if(isset($request->nama)){
        //     $dosen->nama = $request->nama;
        // }
        // if(isset($request->usia)){
        //     $dosen->usia = $request->usia;
        // }
        // if(isset($request->jenis)){
        //     $dosen->jenis = $request->jenis;
        // }
        // $dosen->save();
        // return (new DosenResource($dosen))->response()->setStatusCode(201);
    }
}
