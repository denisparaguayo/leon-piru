<?php

namespace App\Http\Controllers;
use App\Models\Cuchillo;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    //

    public function index()
    {
        $cuchillos = Cuchillo::paginate(6);
        return view('welcome', compact('cuchillos'));
    }






    // public function index()
    // {
    //     //
    //     $datos['cuchillos']=Cuchillo::paginate(3);
    //     return view('cuchillo.index', $datos);
    // }
}
