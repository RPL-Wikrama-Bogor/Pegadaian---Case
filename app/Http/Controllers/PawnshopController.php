<?php

namespace App\Http\Controllers;

use App\Models\Pawnshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;
use App\Exports\PawnshopsExport;

class PawnshopController extends Controller
{
    public function auth(Request $request)
    {
        // array ke2 sbgai custom msg
        $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        $user = $request->only('email', 'password');
        // authentication
        if (Auth::attempt($user)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.data');
            }else if (Auth::user()->role == 'petugas') {
                return redirect()->route('petugas.data');
            }
        }else {
            return redirect()->back()->with('error', 'Failed, try again!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function dataAdmin(Request $request)
    {
        $data = Pawnshop::with('response')->where('name', 'LIKE', $request->name)->get();
        return view('admin.data', compact('data'));
    }

    public function dataPetugas(Request $request)
    {
        $data = Pawnshop::with('response')->where('name', 'LIKE', $request->search)->get();
        return view('petugas.data', compact('data'));
    }

    public function dataStatus()
    {
        $data = Pawnshop::with('response')->get();
        return view('petugas.status', compact('data'));
    }

    public function printPDF()
    {
        $data = Pawnshop::with('response')->get();
        view()->share('data',$data);
        $pdf = PDF::loadView('admin.print_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->download('data_pegadaian_terverifikasi.pdf');
    }

    public function printExcel()
    {
        $file_name = 'data_pegadaian_terverifikasi'.'.xlsx';
        return Excel::download(new PawnshopsExport, $file_name);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email:dns',
            'phone_number' => 'required',
            'nik' => 'required|min:11',
            'age' => 'required|numeric|min:17',
            'item' => 'required',
            'item_photo' => 'required|image|mimes:jpg,jpeg,png,svg',
        ]);

        $image = $request->file('item_photo');
        $imgName = time().rand().'.'.$image->extension();
        $destinationPath = public_path('/assets/img-upload/');
        $image->move($destinationPath, $imgName);

        Pawnshop::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'phone_number' => $request->phone_number,
            'nik' => $request->nik,
            'item' => $request->item,
            'item_photo' => $imgName,
        ]);

        return redirect()->back()->with('success', 'Success submit form, see more information on your WA!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pawnshop  $pawnshop
     * @return \Illuminate\Http\Response
     */
    public function show(Pawnshop $pawnshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pawnshop  $pawnshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Pawnshop $pawnshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pawnshop  $pawnshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pawnshop $pawnshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pawnshop  $pawnshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pawnshop $pawnshop)
    {
        //
    }
}
