<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryWork;

class DesignerController extends Controller
{
    public function index($id)
    {
        $temporary_works=TemporaryWork::find($id);
        return view('dashboard.designer.index', compact('temporary_works'));
    }
}
