<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    public function homeList(Request $request)
    {
        // filter
        if($request->cat){
            $hotels = Hotel::where('country_id', $request->cat);
        }
        else if ($request->s) {

            $search = explode(' ', $request->s);

            if(count($search)== 1){
                $hotels = Hotel::where('title', 'like', '%' . $request->s . '%');
            }
            else{
                $hotels = Hotel::where('title', 'like', '%' . $search[0].' '. $search[1]. '%')
                ->orWhere('title', 'like', '%' . $search[1].' '. $search[0]. '%');
            }

            
        }
        else{
            $hotels = Hotel::where('id', '>', '0');
        }
        // sort
        if($request->sort == 'price_asc'){
            $hotels->orderBy('price', 'asc');
        }
        else if($request->sort == 'price_desc'){
            $hotels->orderBy('price', 'desc');
        }


        return view('home.index', [
            'hotels' => $hotels->paginate(5)->withQueryString(),
            'countries' => Country::orderBy('title', 'desc')->get(),
            'cat' => $request->cat ?? '0',
            'sort' => $request->sort ?? '0',
            'sortSelect' => Hotel::SORT_SELECT,
            's' => $request->s ?? '',
        ]);
    }



}
