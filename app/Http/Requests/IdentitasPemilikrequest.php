<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;

class IdentitasPemilikrequest extends Request
{

 public function authorize()
 {
 return true;
 }

 public function rules()
 {
   return [
    'jenis_1' => 'required', 
    'jenis_2' => 'required', 
    'nomor_1' => 'required',
    'nomor_2' => 'required',
    'gambar_1' => 'mimes:jpg,jpeg,png,gif|max:5120',
    'gambar_2' => 'mimes:jpg,jpeg,png,gif|max:5120'
   ];
 }

 public function messages()
 {
   return [
    'jenis_1.required' => 'jenis tidak boleh kosong',
    'jenis_2.required' => 'jenis tidak boleh kosong',
    'nomor_1.required' => 'nomor tidak boleh kosong',
    'nomor_2.required' => 'nomor tidak boleh kosong',
    'gambar_1.max'  => 'max size 5mb',
    'gambar_2.max'  => 'max size 5mb',
    'gambar_1.mimes'  => 'format gambar harus sesuai (jpg,png,bmp)',
    'gambar_2.mimes'  => 'format gambar harus sesuai (jpg,png,bmp)'
   ];
 }
}