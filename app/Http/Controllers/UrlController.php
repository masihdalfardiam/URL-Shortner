<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use chillerlan\QRCode\QRCode;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = Auth::user()->urls()->orderBy('created_at', 'desc')->get();
        return view('url.index',compact('urls'));
    }


    public function link($link)
    {
        $visit = intval(Url::where('short_url',$link)->get()->toArray()[0]['visit']);
        $url = Url::where('short_url',$link)->update(['visit' => $visit+1]);

        $urlAddress = Url::where('short_url',$link)->get()->toArray()[0]['url'];
        return redirect()->to($urlAddress);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('url.create');
    }

    public function qrcode(Url $url){
        $result = '
        <table class="table text-center align-middle">
                            <thead>
                                <tr>
                                    <th>Short Url Qr Code</th>
                                    <th>Main Url Qr Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="'.(new QRCode)->render(request()->root().'/link/'.$url->short_url).'" alt="QR Code" width="256"/></td>
                                    <td><img src="'.(new QRCode)->render($url->url).'" alt="QR Code" width="256"/></td>
                                </tr>
                            </tbody>
                        </table>
        ';
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $str = "";
        while (true) {
            $str = Str::random(10);
            if(count(Url::where('short_url',$str)->get()->toArray()) == 0){
                break;
            }
        }
        Url::create([
            'url' => $request->url,
            'short_url' => $str,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('url.index')->with('swal','Url Added Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        return view('url.edit',compact('url'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url->url = $request->url;
        $url->save();

        return redirect()->route('url.index')->with('swal','Url Updated Successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        $url->delete();
        return redirect()->route('url.index')->with('swal','Url Deleted Successfully!');
    }
}
