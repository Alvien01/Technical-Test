<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tukang;
use App\Models\User;

class TukangController extends Controller
{
    public function index()
    {
        $tukangs = Tukang::with('user')->get();
        return view('admin.tukang.index', compact('tukangs'));
    }
}
