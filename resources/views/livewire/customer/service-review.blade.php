<div>
    <h3 class="section-title style-1 mb-30 mt-30">Reviews ({{ $serviceReviews->count() }})</h3>
    <!--Comments-->
    <div class="comments-area style-2">
        <div class="row">

            @if ($serviceReviews->isNotEmpty())
                <div class="col-lg-8">
                    <div class="comment-list">

                        @foreach ($serviceReviews as $serviceReview)
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb text-center">
                                        <img src="{{ asset('customer/assets/imgs/default_user.png') }}" alt="default_user">
                                        <h6><a href="">{{ $serviceReview->user->name }}</a></h6>
                                    </div>
                                    <div class="desc">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width:{{ round(($serviceReview->rating/5)*100) }}%"></div>
                                        </div>
                                        <strong>{{ $serviceReview->heading }}</strong>
                                        <p>{{ $serviceReview->review }}</p>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <p class="font-xs mr-30">{{ \Carbon\Carbon::parse($serviceReview->created_at)->format('M d, Y h:i A') }} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endif
            <div class="col-lg-4">
                <h4 class="mb-30">Customer reviews</h4>
                <div class="d-flex mb-30">
                    <div class="product-rate d-inline-block mr-15">
                        <div class="product-rating" style="width:{{ $service->avg_rating/5*100 }}%">
                        </div>
                    </div>
                    <h6>{{ $service->avg_rating }} out of 5</h6>
                </div>

                <div class="progress">
                    <span>5 star</span>
                    <div class="progress-bar" role="progressbar" style="width: {{ $fivePercent }}%;">{{ $fivePercent }}%</div>
                </div>
                <div class="progress">
                    <span>4 star</span>
                    <div class="progress-bar" role="progressbar" style="width: {{ $fourPercent }}%;">{{ $fourPercent }}%</div>
                </div>
                <div class="progress">
                    <span>3 star</span>
                    <div class="progress-bar" role="progressbar" style="width: {{ $threePercent }}%;">{{ $threePercent }}%</div>
                </div>
                <div class="progress">
                    <span>2 star</span>
                    <div class="progress-bar" role="progressbar" style="width: {{ $twoPercent }}%;">{{ $twoPercent }}%</div>
                </div>
                <div class="progress mb-30">
                    <span>1 star</span>
                    <div class="progress-bar" role="progressbar" style="width: {{ $onePercent }}%;">{{ $onePercent }}%</div>
                </div>
            </div>

        </div>
    </div>

    <!--comment form-->
    <div class="comment-form">
        <h4 class="mb-15">Add a review</h4>

        @if (session()->has('review_message'))
            <div class="row justify-content-center my-3">
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <span>{{ session()->get('review_message') }}</span>
                    </div>
                </div>
            </div>
        @endif

        {{-- <div class="product-rate d-inline-block mb-30"></div> --}}
        <div class="feedback">
            <span class="rating">
                @auth
                    @if ($myReview)
                        <span class="rating-number">{{ $myReview->rating }}</span>
                        <input type="radio" value="5" name="rating1" id="rating-5" readonly disabled {{ $myReview->rating == 5 ? 'checked' : '' }}> <label for="rating-5"></label>
                        <input type="radio" value="4" name="rating1" id="rating-4" readonly disabled {{ $myReview->rating == 4 ? 'checked' : '' }}> <label for="rating-4"></label>
                        <input type="radio" value="3" name="rating1" id="rating-3" readonly disabled {{ $myReview->rating == 3 ? 'checked' : '' }}> <label for="rating-3"></label>
                        <input type="radio" value="2" name="rating1" id="rating-2" readonly disabled {{ $myReview->rating == 2 ? 'checked' : '' }}> <label for="rating-2"></label>
                        <input type="radio" value="1" name="rating1" id="rating-1" readonly disabled {{ $myReview->rating == 1 ? 'checked' : '' }}> <label for="rating-1"></label>
                    @else
                        <input type="radio" value="5" id="rating-5" name="rating" wire:model.defer="rating" checked> <label for="rating-5"></label>
                        <input type="radio" value="4" id="rating-4" name="rating" wire:model.defer="rating"> <label for="rating-4"></label>
                        <input type="radio" value="3" id="rating-3" name="rating" wire:model.defer="rating"> <label for="rating-3"></label>
                        <input type="radio" value="2" id="rating-2" name="rating" wire:model.defer="rating"> <label for="rating-2"></label>
                        <input type="radio" value="1" id="rating-1" name="rating" wire:model.defer="rating"> <label for="rating-1"></label>
                    @endif
                @endauth
                @guest
                    <input type="radio" value="5" name="rating1" id="rating-5" wire:model.defer="rating" checked> <label for="rating-5"></label>
                    <input type="radio" value="4" name="rating1" id="rating-4" wire:model.defer="rating"> <label for="rating-4"></label>
                    <input type="radio" value="3" name="rating1" id="rating-3" wire:model.defer="rating"> <label for="rating-3"></label>
                    <input type="radio" value="2" name="rating1" id="rating-2" wire:model.defer="rating"> <label for="rating-2"></label>
                    <input type="radio" value="1" name="rating1" id="rating-1" wire:model.defer="rating"> <label for="rating-1"></label>
                @endguest
            </span>
        </div>
        @error('rating')
            <span class="invalid-feedback" style="display:block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <br>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control @error('heading') is-invalid @enderror" name="heading" id="heading" wire:model.defer="heading" {{ $myReview ? 'disabled' : '' }} type="text" placeholder="Reveiw Heading">
                            @error('heading')
                                <span class="invalid-feedback" style="display:block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control w-100 @error('review') is-invalid @enderror" name="review" id="review" wire:model.defer="review" {{ $myReview ? 'disabled' : '' }} cols="30" rows="9" placeholder="Write Review"></textarea>
                            @error('review')
                                <span class="invalid-feedback" style="display:block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" wire:click="postReview()" class="button button-contactForm">Submit Review</button>
                </div>
            </div>
        </div>
    </div>
</div>
