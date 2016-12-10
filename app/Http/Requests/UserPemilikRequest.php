<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserPemilikRequest extends Request
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
                'username' => 'required|unique:users',
                'nama' => 'required',
                'email' => 'required|unique:users',
                'alamat' => 'required',
                'no_hp' => 'required|between:9,12',
                'foto' => 'mimes:jpg,jpeg,png,gif|max:5120'
            ];
            }
            case 'PUT':{
                
            }
            case 'PATCH':
            {
                return [
                'nama' => 'required',
                // 'email' => 'required|unique:users',
                'alamat' => 'required',
                'no_hp' => 'required|between:9,12',
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
            'alamat' => 'alamat harus diisi',
            'foto.max'  => 'max size 5mb',
            'foto.mimes'  => 'format gambar harus sesuai (jpg,png,bmp)'
            
         ];
    }
}
