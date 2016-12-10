<?php
namespace App\Http\Requests;
use App\Http\Requests\Request;
class RegisterRequest extends Request
{
 /**
 * Determine if the user is authorized to make this request.
 *
 * @return bool
 */
 public function authorize()
 {
 return true;
 }
/**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
 public function rules()
 {
   return [
    'name' => 'required', 
    'username' => 'required|unique:users', 
    'email' => 'required|unique:users',
    'password' => 'required|min:6|confirmed',
    'password_confirmation' => 'min:6' 
   ];
 }

 public function messages()
 {
   return [
    'nama.required' => 'nama tidak boleh kosong', 
    'username.required' => 'username tidak boleh kosong', 
    'username.unique' => 'username sudah digunakan', 
    'email.required' => 'email tidak boleh kosong', 
    'email.unique' => 'email sudah digunakan', 
    'password.required' => 'password tidak boleh kosong',
    'password.min' => 'password minimal 6 karakter',
    'password.confirmed' => 'password konfirmasi tidak sama'
   ];
 }
}