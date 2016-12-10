<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;

class BarangRequest extends Request
{

 public function authorize()
 {
 return true;
 }


 public function rules()
 {
   return [
    'nama_barang' => 'required',
    'id_kategori' => 'required',
    'ciri_ciri' => 'required', 
    'gambar_1' => 'mimes:jpg,jpeg,png,gif|max:5120',
    'gambar_2' => 'mimes:jpg,jpeg,png,gif|max:5120',
    'gambar_3' => 'mimes:jpg,jpeg,png,gif|max:5120'
   ];
 }

 public function messages()
 {
   return [
    'nama_barang.required' => 'nama tidak boleh kosong',
    'ciri_ciri.required' => 'ciri-ciri tidak boleh kosong',
    'gambar_1.max'  => 'max size 5mb',
    'gambar_1.mimes'  => 'format gambar harus sesuai (jpg,png,bmp)',
    'gambar_2.max'  => 'max size 5mb',
    'gambar_2.mimes'  => 'format gambar harus sesuai (jpg,png,bmp)',
    'gambar_3.max'  => 'max size 5mb',
    'gambar_3.mimes'  => 'format gambar harus sesuai (jpg,png,bmp)'
   ];
 }
}