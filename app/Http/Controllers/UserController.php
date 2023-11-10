<?php

namespace App\Http\Controllers;

use App\Http\Traits\MasterCRUD;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use MasterCRUD;

    public function __construct()
    {
        $this->setViewFolder('pages.master.user');
        $this->setModel(\App\Models\User::class);
        $this->setTitle('User');

        $this->setValidationRule([
            'nama_user' => 'required', 
            'username' => 'required', 
            'password' => 'required', 
            'jabatan' => 'required',
        ]);

        $this->setValidationRuleMassage([
            'nama_user.required' => 'Masukan Nama User', 
            'username.required' => 'Masukan Username', 
            'password.required' => 'Masukan Password',
            'jabatan.required' => 'Masukan Jabatan', 
        ]);
    }
  }
