<?php

namespace App\Http\Livewire\Customer;

use App\Models\Category;
use App\Models\CategoryRating;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ServiceReview extends Component
{
    // Component PROPS
    public $category_id;

    // FORM PROPERTIES
    public $rating, $heading, $review;


    public function render()
    {
        $service = Category::where('id', $this->category_id)
                            ->with(['reviews' => fn($q) => $q->with('user')->latest()->limit(3)])
                            ->withCount([
                                'reviews as five' => fn($q) => $q->where('rating', 5),
                                'reviews as four' => fn($q) => $q->where('rating', 4),
                                'reviews as three' => fn($q) => $q->where('rating', 3),
                                'reviews as two' => fn($q) => $q->where('rating', 2),
                                'reviews as one' => fn($q) => $q->where('rating', 1),
                            ])
                            ->first();

        $authUser = Auth::user();
        $myReview = $authUser ? CategoryRating::where(['category_id' => $this->category_id, 'user_id' => Auth::user()->id])->first() : null;
        if($myReview)
        {
            $this->heading = $myReview->heading;
            $this->review = $myReview->review;
        }

        $serviceReviews = $service->reviews;
        $totalReviews = ($service->five+$service->four+$service->three+$service->two+$service->one);

        $fivePercent = $service->five ? round(($service->five/$totalReviews)*100) : 0;
        $fourPercent = $service->four ? round(($service->four/$totalReviews)*100) : 0;
        $threePercent = $service->three ? round(($service->three/$totalReviews)*100) : 0;
        $twoPercent = $service->two ? round(($service->two/$totalReviews)*100) : 0;
        $onePercent = $service->one ? round(($service->one/$totalReviews)*100) : 0;

        return view('livewire.customer.service-review')->with([
            'serviceReviews' => $serviceReviews,
            'service' => $service,
            'totalReviews' => $totalReviews,
            'fivePercent' => $fivePercent,
            'fourPercent' => $fourPercent,
            'threePercent' => $threePercent,
            'twoPercent' => $twoPercent,
            'onePercent' => $onePercent,
            'myReview' => $myReview,
        ]);
    }


    public function postReview()
    {
        $this->resetErrorBag();
        $this->validate([
            'rating'=>'required',
            'heading'=>'required|string|max:150',
            'review'=>'required|string|max:1000'
        ],
        [
            'rating.required'=> 'Select stars to rate this service',
            'heading.required'=> 'Type short heading of your review',
            'review.required'=> 'Type some text to review this service',
        ]);


        $authUser = Auth::user();
        if(!$authUser)
            return redirect()->route('customer.login');

        $check_if_rated = DB::table('category_ratings')
                        ->where(['user_id'=> $authUser->id, 'category_id'=> $this->category_id])
                        ->first();

        if($check_if_rated)
        {
            session()->flash('review_message', 'You have already rated this service');
            $this->rating = '';
            $this->review = '';
            $this->heading = '';
        }
        else
        {
            $timestamp = Carbon::now()->toDateTimeString();
            try
            {
                DB::table('category_ratings')->insert([
                    'user_id' => $authUser->id,
                    'category_id' => $this->category_id,
                    'rating' => $this->rating,
                    'review' => $this->review,
                    'heading' => $this->heading,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp
                ]);

                $this->rating = '';
                $this->review = '';
                $this->heading = '';
                session()->flash('review_message', 'Review posted successfully !');
            }
            catch(\Exception $e)
            {
                Log::info('adding review error : '.$e);
                session()->flash('review_message', 'Something went wrong while posting review');
            }
        }
    }
}
