<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
            return view('giaodienadmin');
        } else {
            return view('not-authorized'); // hoặc redirect về trang khác
        }
    }
}
