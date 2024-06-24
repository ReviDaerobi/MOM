<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EncryptPasswords extends Command
{
    protected $signature = 'encrypt:passwords';
    protected $description = 'Encrypt all plain text passwords in tbluser table using bcrypt';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Mengambil semua user dari tabel tbluser
        $users = DB::table('tbluser')->get();

        foreach ($users as $user) {
            // Mengecek apakah password sudah ter-enkripsi (misalnya panjang lebih dari 60 karakter)
            if (strlen($user->password) < 60) {
                // Meng-enkripsi password
                $encryptedPassword = Hash::make($user->password);

                // Update password yang sudah terenkripsi ke database
                DB::table('tbluser')
                    ->where('id', $user->id)
                    ->update(['password' => $encryptedPassword]);
            }
        }

        $this->info('Passwords have been encrypted successfully!');
    }
}
