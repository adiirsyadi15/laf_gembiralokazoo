<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
class KejadianRequest extends Request
{
 public function authorize()
 {
 return true;
 }
 public function rules()
 {
   return [
    'hari' => 'required', 
    'waktu' => 'required', 
    'tanggal_kejadian' => 'required', 
    'lokasi' => 'required', 
    'keterangan' => 'required', 
   ];
 }

 public function messages()
 {
   return [
    'username.required' => 'username tidak boleh kosong', 
    'waktu.required' => 'waktu tidak boleh kosong', 
    'tanggal_kejadian.required' => 'tanggal kejadian tidak boleh kosong', 
    'lokasi.required' => 'lokasi tidak boleh kosong', 
    'keterangan.required' => 'keterangan tidak boleh kosong'
   ];
 }
}