<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\liquid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function home()
    {
        return view("home", ["key" => "home"]);
    }

    public function drink()
    {
        $drink = liquid :: orderBy('id', 'desc') -> get();
        return view("drink", ["key" => "drink", "mv" => $drink]);
    }
    
    public function messages()
    {
        return view("messages", ["key" => "messages"]);
    }

    public function settings()
    {
        return view("settings", ["key" => "settings"]);
    }

    public function formadddrink()
    {
        return view("form-add", ["key" => "drink"]);
    }

    public function savedrink(Request $request)
    {

        $file_name = time().'-'. $request->file('foto')->getClientOriginalName();
        $path = $request->file('foto')->storeAs('foto', $file_name, 'public');

        liquid::create([
            'merek' => $request->merek,
            'distributor' => $request->distributor,
            'stok' => $request->stok,
            'foto' => $path
        ]);

        return redirect('/drink')->with('alert', 'Data Berhasil Disimpan');
    }

    public function formeditdrink($id)
    {
        $drink = liquid::find($id);
        return view("form-edit", ["key" => "drink", "mv" => $drink]);
    }

    public function updatedrink($id, Request $request)
    {
        $drink = liquid::find($id);
        $drink->merek = $request->merek;
        $drink->distributor = $request->distributor;
        $drink->stok = $request->stok;

        if($request->foto)
        {
            if($drink->foto)
            {
                Storage::disk('public')->delete($drink->foto);
            }

            $file_name = time().'-'. $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('foto', $file_name,'public');
            $drink->foto = $path;
        }
        $drink->save();
        return redirect('/drink')->with('alert', 'Data Berhasil Diubah');
    }

    public function deletedrink($id)
    {
        $drink = liquid::find($id);

        if ($drink->foto)
        {
            Storage::disk('public')->delete($drink->foto);
        }
        $drink->delete();
        return redirect('/drink')->with('alert', 'Data Berhasil Dihapus');
    }

    public function login()
    {
        return view("login");
    }

    public function formedituser()
    {
        return view("formedituser", ["key" =>""]);
    }

    public function updateuser(Request $request)
    {
        if ($request->password_baru == $request->konfirmasi_password)
        {
            $user = Auth::user();

            $user->password = bcrypt($request->password_baru);
            $user->save();

            return redirect("/user")->with("info", "Password Berhasil di Ubah");
        }
        else
        {
            return redirect("/user")->with("info", "Password Tidak Sama");
        }
    }
}   


