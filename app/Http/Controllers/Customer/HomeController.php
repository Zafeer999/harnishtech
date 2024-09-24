<?php

namespace App\Http\Controllers\Customer;

// use App\Http\Controllers\Controller;
use App\Models\BannerSlider;
use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\Admin\Masters\StoreContactRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Query;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::get();
        $colorsArray = config('default_data.colors_array');
        $allServices = $categories;
        $categories = $categories->where('category_id', null);
        $featuredServices = Category::with('category')->where(['is_featured' => 1, 'level' => 2])->get();
        $cities = City::selectRaw('MIN(id) as id, name')->groupBy('name')->get();

        $bannerSliders = BannerSlider::where('status', 1)->get();

        return view('customer.home')->with(['categories' => $categories, 'allServices' => $allServices, 'colorsArray' => $colorsArray, 'featuredServices' => $featuredServices, 'cities' => $cities, 'bannerSliders' => $bannerSliders]);
    }

    public function contact()
    {
        return view('customer.contact');
    }

    public function contactStore(StoreContactRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->validated();
            Query::create(Arr::only($input, Query::getFillables()));
            DB::commit();

            return redirect()->back()->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return $this->respondWithAjax($e, 'storing', 'contact');
        }
    }

    public function deleteAddress($id)
    {
        try {
            $address = UserAddress::find($id);

            // Check if the address exists and belongs to the authenticated user
            if ($address && $address->user_id == auth()->id()) {
                $address->delete();

                return response()->json(['success' => 'Address deleted successfully.']);
            }

            return response()->json(['error' => 'Address not found or you are not authorized to delete it.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong. Please try again.']);
        }
    }
}
