<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
class IdentitasRequest extends Request
{

 public function authorize()
 {
 return true;
 }

  public function rules()
 {
   return [
    'jenis' => 'required', 
    'nomor' => 'required',
    'gambar' => 'mimes:jpg,jpeg,png,gif|max:5120'
   ];
 }

 public function messages()
 {
   return [
    'jenis.required' => 'jenis tidak boleh kosong',
    'nomor.required' => 'nomor tidak boleh kosong',
    'gambar.max'  => 'max size 5mb',
    'gambar.mimes'  => 'format gambar harus sesuai (jpg,png,bmp)'
   ];
  }
}