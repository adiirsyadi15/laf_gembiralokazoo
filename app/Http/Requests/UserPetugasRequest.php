<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserPetugasRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        switch($this->method())
        {
            case 'GET':
            {

            }
            case 'POST':
            {
            return [
                'nama' => 'required',
                'username' => 'required|unique:petugas',
                'email' => 'required|unique:users',
                'password' => 'required|between:6,20',
                'no_hp' => 'required|between:9,12',
                'jk' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'agama' => 'required',
                // 'foto' => 'mimes:jpg,jpeg,png,gif|max:10240'
                'foto' => 'mimes:jpg,jpeg,png,gif|max:5120'
            ];
            }
            case 'PUT':{

            }
            case 'PATCH':
            {
                return [
                'nama' => 'required',
                'email' => 'required',
                'no_hp' => 'required|between:9,12',
                'jk' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'agama' => 'required',
                // 'foto' => 'mimes:jpg,jpeg,png,gif|max:10240'
                'foto' => 'mimes:jpg,jpeg,png,gif|max:5120'
                ];
            }
            default:break;
        }
    }

     public function messages()
    {
        return [
            'nama.required'  => 'nama harus diisi',
            'username.required'  => 'username harus diisi',
            'username.unique'  => 'username sudah ada',
            'email.required'  => 'email harus diisi',
            'email.unique'  => 'email sudah digunakan',
            'no_hp.required'  => 'Kolom no hp harus diisi',
            'no_hp.between'  => 'no hp minimal 9 max 12',
            'jk' => 'jenis kelamin harus diisi',
            'tempat_lahir' => 'Tempat lahir harus diisi',
            'tanggal_lahir' => 'tanggal lahir harus diisi',
            'alamat' => 'alamat harus diisi',
            'agama' => 'agama harus diisi',
            'foto.max'  => 'max size 5mb',
            'foto.mimes'  => 'format gambar harus sesuai (jpg,png,bmp)'
            
         ];
    }
}
