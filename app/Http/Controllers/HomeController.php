<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    public function homeList(Request $request)
    {
        $hotels = Hotel::where('id', '>', '0');
        if ($request->subCat || $request->cat || $request->sort) {
            if ($request->cat) {
                $hotels = $hotels->where('country_id', 'like', '%' . $request->cat  . '%');
            }

            if ($request->sort == 'price_asc') {
                $hotels = $hotels->orderBy('price', 'asc');
            } else if ($request->sort == 'price_desc') {
                $hotels = $hotels->orderBy('price', 'desc');
            }
            if ($request->sort == 'rate_asc') {
                $hotels = $hotels->orderBy('rating', 'asc');
            } else if ($request->sort == 'rate_desc') {
                $hotels = $hotels->orderBy('rating', 'desc');
            } else if ($request->sort == 'title_asc') {
                $hotels = $hotels->orderBy('title', 'asc');
            } else if ($request->sort == 'title_desc') {
                $hotels = $hotels->orderBy('title', 'desc');
            }
        }
        $perPage = match ($request->per_page) {
            '5' => 5,
            '11' => 11,
            '20' => 20,
            default => 11
        };

        if ($request->s) {
            $hotels = $hotels->where('title', 'like', '%' . $request->s . '%');
        }


        return view('home.index', [
            'hotels' => $hotels->orderBy('title', 'asc')->paginate($perPage)->withQueryString(),
            'countries' => Country::orderBy('title', 'desc')->get(),
            'cat' => $request->cat ?? '0',
            'sort' => $request->sort ?? '0',
            'sortSelect' => Hotel::SORT_SELECT,
            's' => $request->s ?? '',
            'perPage' => $request->per_page
        ]);
    }



}
