<x-customer.layout>

    <!-- Hero Section Start -->
    <section class="pt-[100px]">
        <div class="bg relative z-10 h-[650px] sm:h-[600px] md:h-[700px] lg:h-[800px]">
            <div class="absolute inset-0 z-20 bg-n900/80"></div>
            <div class="swiper home-four-slider-carousel smooth absolute inset-0 mx-auto w-fit">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero1.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero2.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero3.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero4.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero1.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero2.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero3.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero4.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero1.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero2.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero3.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero4.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero1.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero2.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero3.png" alt="" />
                    </div>
                    <div class="swiper-slide">
                        <img src="assets/images/home_four_hero4.png" alt="" />
                    </div>
                </div>
            </div>

            <div class="relative z-30 mx-auto flex h-full max-w-[950px] flex-col items-center justify-center text-center text-white max-xxl:overflow-hidden">
                <h5 class="heading-5 pb-3 text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
                    Your Solution Hub
                </h5>
                <h1 class="display-2 pb-6 font-extrabold" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="0">
                    Find the Right <br />
                    <span class="text-y300">Talent</span> for Any Task
                </h1>
                <p class="w-[95%] pb-10 text-xl sm:text-2xl" data-aos="flip-down" data-aos-duration="1000" data-aos-delay="0">
                    Access assistance from a vast network of reliable local experts,
                    spanning home repairs to beauty services.
                </p>
                <div class="w-[95%] text-n900 md:w-[650px] lg:w-[800px] xl:w-[950px]">
                    <div class="relative z-20 w-full rounded-3xl border border-n20 bg-white p-4 sm:p-8">
                        <form class="flex items-center justify-between text-lg font-medium max-sm:text-sm">
                            <div class="flex items-center justify-start gap-4 sm:gap-10">
                                <div class="relative border-r pr-4 sm:pr-10" id="locationModalOpenButton">
                                    <div class="flex cursor-pointer items-center justify-between gap-2">
                                        <i class="ph ph-map-pin"></i>
                                        <span class="locationText"><span class="max-[400px]:hidden">Select</span> Location</span>
                                    </div>

                                    <div id="locationModal" class="modalClose absolute left-0 top-10 w-[150px] origin-top rounded-3xl border border-n30 bg-white py-3 text-base duration-700 max-sm:text-sm sm:-left-8 sm:w-[220px] sm:py-5">
                                        <input type="text" class="mx-2 w-[90%] rounded-xl border border-n30 px-2 py-2 outline-none placeholder:text-n800 sm:mx-3 sm:px-3" placeholder="Search" />
                                        <p class="locationItem cursor-pointer px-6 py-2 duration-500 hover:bg-b300 hover:text-white">
                                            Alaska
                                        </p>
                                        <p class="locationItem cursor-pointer px-6 py-2 duration-500 hover:bg-b300 hover:text-white">
                                            New York
                                        </p>
                                        <p class="locationItem cursor-pointer px-6 py-2 duration-500 hover:bg-b300 hover:text-white">
                                            California
                                        </p>
                                        <p class="locationItem cursor-pointer px-6 py-2 duration-500 hover:bg-b300 hover:text-white">
                                            Washington
                                        </p>
                                    </div>
                                </div>
                                <div class="relative flex cursor-pointer items-center justify-between gap-2" id="servicesModalOpenButton">
                                    <span class="serviceText"><span class="max-[400px]:hidden">Select your</span> service</span>
                                    <i class="ph ph-caret-down"></i>

                                    <div id="servicesModal" class="modalClose absolute right-0 top-10 w-[150px] origin-top rounded-3xl border border-n30 bg-white py-3 text-sm duration-700 sm:-left-8 sm:w-[220px] sm:py-5 sm:text-base">
                                        <p class="serviceItem cursor-pointer px-3 py-2 duration-500 hover:bg-b300 hover:text-white sm:px-6">
                                            Handyman
                                        </p>
                                        <p class="serviceItem cursor-pointer px-3 py-2 duration-500 hover:bg-b300 hover:text-white sm:px-6">
                                            Cleaning
                                        </p>
                                        <p class="serviceItem cursor-pointer px-3 py-2 duration-500 hover:bg-b300 hover:text-white sm:px-6">
                                            Renovation
                                        </p>
                                        <p class="serviceItem cursor-pointer px-3 py-2 duration-500 hover:bg-b300 hover:text-white sm:px-6">
                                            Photography
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <button class="relative ml-2 flex items-center justify-center overflow-hidden rounded-full bg-b300 text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)] max-xxl:!leading-none max-md:size-11 md:px-8 md:py-3">
                                <i class="ph ph-magnifying-glass text-base !leading-none sm:text-xl md:hidden"></i>
                                <span class="relative z-10 max-md:hidden">Search</span>
                            </button>
                        </form>
                    </div>

                </div>

                <ul class="flex flex-wrap items-center justify-start gap-2 pl-2 pt-8 font-medium text-n900 max-sm:text-sm sm:gap-3">
                    <li class="heading-5 text-white">Popular:</li>
                    <li class="rounded-lg bg-b50 px-2 py-2 sm:px-4">Handyman</li>
                    <li class="rounded-lg bg-bg2 px-2 py-2 sm:px-4">Babysitting</li>
                    <li class="rounded-lg bg-eb50 px-2 py-2 sm:px-4">Photography</li>
                    <li class="rounded-lg bg-bg1 px-2 py-2 sm:px-4">Renovation</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- How It Works Section Start -->
    <section class="stp-30 sbp-30">
        <div class="container">
            <div class="flex flex-col items-center justify-center">
                <h2 class="heading-2 font-bold text-n900">
                    How It <span class="text-b300 underline">Works</span>
                </h2>
                <p class="pt-4 font-medium text-n500">
                    What steps do I need to take to join?
                </p>
            </div>

            <ul class="stp-15 flex w-full items-center justify-center max-[480px]:flex-col max-[480px]:gap-4">
                <li id="step1" class="activeButton stepsButton flex w-full items-center justify-center pb-4 sm:pb-6">
                    <div class="flex items-center justify-between gap-3">
                        <i class="ph ph-sort-descending flex items-center justify-center rounded-xl bg-n30 p-3 text-2xl !leading-none sm:p-[14px] sm:text-3xl"></i>
                        <button class="text-lg font-semibold">Step_01</button>
                    </div>
                </li>
                <li id="step2" class="inActiveButton stepsButton step22222 flex w-full items-center justify-center pb-4 sm:pb-6">
                    <div class="flex items-center justify-between gap-3">
                        <i class="ph ph-calendar-plus flex items-center justify-center rounded-xl bg-n30 p-3 text-2xl !leading-none sm:p-[14px] sm:text-3xl"></i>
                        <button class="text-lg font-semibold">Step_02</button>
                    </div>
                </li>

                <li id="step3" class="inActiveButton stepsButton step3 flex w-full items-center justify-center pb-4 sm:pb-6">
                    <div class="flex items-center justify-between gap-3">
                        <i class="ph ph-book-open-text flex items-center justify-center rounded-xl bg-n30 p-3 text-2xl !leading-none sm:p-[14px] sm:text-3xl"></i>
                        <button class="text-lg font-semibold">Step_03</button>
                    </div>
                </li>
            </ul>

            <div class="stp-15">
                <div id="step_one_data" class="activeTab">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 flex flex-col items-start justify-center md:col-span-5 lg:col-span-4">
                            <h3 class="heading-3">Tasker Evaluation</h3>
                            <p class="pt-3 text-n500">
                                Select a Tasker based on affordability, expertise, and customer
                                feedback, ensuring you find the perfect fit for your needs.
                            </p>
                            <div class="pt-6 sm:pt-10">
                                <a href="sign-up-step-1.html" class="relative flex items-center justify-center overflow-hidden rounded-full bg-b300 px-8 py-3 font-medium !leading-none text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)]">
                                    <span class="m relative z-10">Sign up now</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-7 lg:col-start-6">
                            <img src="assets/images/step_one_illus.png" alt="" />
                        </div>
                    </div>
                </div>
                <div id="step_two_data" class="hiddenTab">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 flex flex-col items-start justify-center md:col-span-5 lg:col-span-4">
                            <h3 class="heading-3">Book Now</h3>
                            <p class="pt-3 text-n500">
                                Secure your spot at the event of your choice by booking your
                                tickets now through our convenient online booking platform.
                            </p>
                            <div class="pt-6 sm:pt-10">
                                <a href="sign-up-step-1.html" class="relative flex items-center justify-center overflow-hidden rounded-full bg-b300 px-8 py-3 font-medium !leading-none text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)]">
                                    <span class="m relative z-10">Sign up now</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-7 lg:col-start-6">
                            <img src="assets/images/step_two_illus.png" alt="" />
                        </div>
                    </div>
                </div>
                <div id="step_three_data" class="hiddenTab">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 flex flex-col items-start justify-center md:col-span-5 lg:col-span-4">
                            <h3 class="heading-3">ChatTip Hub</h3>
                            <p class="pt-3 text-n500">
                                Your Ultimate Destination for Chat-based Tips, Advice, and
                                Insights on a Variety of Topics and Interests.
                            </p>
                            <div class="pt-6 sm:pt-10">
                                <a href="sign-up-step-1.html" class="relative flex items-center justify-center overflow-hidden rounded-full bg-b300 px-8 py-3 font-medium !leading-none text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)]">
                                    <span class="m relative z-10">Sign up now</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-7 lg:col-start-6">
                            <img src="assets/images/step_three_illus.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How It Works Section End -->

    <!-- Top Expert Section Start -->
    <section class="stp-30 sbp-30 bg-n20">
        <div class="container">
            <div class="flex items-center justify-between gap-2">
                <div class="flex max-w-[300px] flex-col">
                    <h2 class="heading-2 font-bold text-n900">
                        Top <span class="text-b300 underline">Experts</span>
                    </h2>
                    <p class="pt-4 font-medium text-n500">
                        Our skilled and reliable experts, your most trusted partners.
                    </p>
                </div>
                <div class="">
                    <a href="find-workers.html" class="flex items-center justify-start gap-3 font-bold duration-300 hover:text-b300">All Experts
                        <i class="ph-bold ph-arrow-right text-2xl !leading-none"></i></a>
                </div>
            </div>

            <div class="stp-15 grid grid-cols-12 gap-6">
                <div class="col-span-12 flex flex-col gap-6 rounded-3xl border border-n40 bg-n10 py-6 md:col-span-6 xl:col-span-4" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">
                    <div class="flex items-center justify-start gap-3 px-3 sm:px-6">
                        <div class="relative max-md:overflow-hidden">
                            <div class="hexagon-styles my-[calc(100px*0.5/2)] h-[calc(100px*0.57736720554273)] w-[100px] rounded-[calc(100px/36.75)] bg-b50 before:rounded-[calc(100px/18.75)] after:rounded-[calc(100px/18.75)]">
                                <div class="absolute -top-[20px] left-[5px]">
                                    <div class="hexagon-styles z-10 my-[calc(90px*0.5/2)] h-[calc(90px*0.57736720554273)] w-[90px] rounded-[calc(90px/50)] bg-b300 before:rounded-[calc(90px/50)] after:rounded-[calc(90px/50)]">
                                        <div class="absolute -top-[19px] left-[4px] z-20">
                                            <div class="hexagon-styles z-10 my-[calc(82px*0.5/2)] h-[calc(82px*0.57736720554273)] w-[82px] rounded-[calc(82px/50)] bg-b50 before:rounded-[calc(82px/50)] after:rounded-[calc(82px/50)]">
                                                <div class="r-hex3 absolute -left-0.5 -top-[19px] z-30 inline-block w-[86px] overflow-hidden">
                                                    <div class="r-hex-inner3">
                                                        <div class="expertImg1 r-hex-inner-3 before:h-[86px] before:bg-cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-3 right-1 z-30">
                                <img src="assets/images/verify-badge.png" alt="" class="" />
                            </div>
                        </div>
                        <div class="max-[350px]:max-w-20">
                            <div class="flex items-center justify-start gap-3">
                                <h5 class="heading-5">Mayme Cole</h5>
                                <p class="rounded-full bg-y300 px-2 py-1 text-xs font-medium">
                                    PRO
                                </p>
                            </div>
                            <p class="pt-2 text-n500">Brooklyn, NY, USA</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-[13px]">
                        <p class="rounded-full bg-r50 px-2 py-1 font-medium text-r300">
                            $75 - $100/hr
                        </p>
                        <p class="rounded-full bg-g50 px-2 py-1 font-medium text-g400">
                            TOP INDEPENDENT
                        </p>
                        <p class="rounded-full bg-v50 px-2 py-1 font-medium text-v300">
                            AVAILABLE
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-n400">
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/settings_icon.png" alt="" />
                            <span>Handyman</span>
                        </p>
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/tap_icon.png" alt="" />
                            <span>Plumber </span>
                        </p>
                        <p class="rounded-xl bg-b50 px-3 py-2 font-medium">+3</p>
                    </div>

                    <div class="relative">
                        <div class="swiper expert-slider-carousel group">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_4.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_1.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_5.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_6.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>
                            </div>
                            <div class="absolute left-2 right-2 top-28 z-10">
                                <div class="flex w-full items-center justify-between">
                                    <button class="ara-prev flex -translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-left"></i>
                                    </button>
                                    <button class="ara-next flex translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-start gap-2 px-6">
                        <a href="worker-profile.html" class="relative w-full overflow-hidden rounded-full bg-n700 px-6 py-3 text-sm font-semibold text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)]">
                            <div class="relative z-20 flex items-center justify-center gap-3">
                                <i class="ph ph-paper-plane-tilt text-xl !leading-none"></i>
                                <span>Get in touch</span>
                            </div>
                        </a>
                        <button class="relative flex items-center justify-center rounded-full border p-3 text-xl !leading-none duration-500 hover:bg-y300">
                            <i class="ph ph-heart"></i>
                        </button>
                    </div>
                </div>
                <div class="col-span-12 flex flex-col gap-6 rounded-3xl border border-n40 bg-n10 py-6 md:col-span-6 xl:col-span-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    <div class="flex items-center justify-start gap-3 px-6">
                        <div class="relative max-md:overflow-hidden">
                            <div class="hexagon-styles my-[calc(100px*0.5/2)] h-[calc(100px*0.57736720554273)] w-[100px] rounded-[calc(100px/36.75)] bg-b50 before:rounded-[calc(100px/18.75)] after:rounded-[calc(100px/18.75)]">
                                <div class="absolute -top-[20px] left-[5px]">
                                    <div class="hexagon-styles z-10 my-[calc(90px*0.5/2)] h-[calc(90px*0.57736720554273)] w-[90px] rounded-[calc(90px/50)] bg-b300 before:rounded-[calc(90px/50)] after:rounded-[calc(90px/50)]">
                                        <div class="absolute -top-[19px] left-[4px] z-20">
                                            <div class="hexagon-styles z-10 my-[calc(82px*0.5/2)] h-[calc(82px*0.57736720554273)] w-[82px] rounded-[calc(82px/50)] bg-b50 before:rounded-[calc(82px/50)] after:rounded-[calc(82px/50)]">
                                                <div class="r-hex3 absolute -left-0.5 -top-[19px] z-30 inline-block w-[86px] overflow-hidden">
                                                    <div class="r-hex-inner3">
                                                        <div class="expertImgBig r-hex-inner-3 before:h-[86px] before:bg-cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-3 right-1 z-30">
                                <img src="assets/images/verify-badge.png" alt="" class="" />
                            </div>
                        </div>
                        <div class="max-[350px]:max-w-20">
                            <div class="flex items-center justify-start gap-3">
                                <h5 class="heading-5">Clyde Gordon</h5>
                                <p class="rounded-full bg-y300 px-2 py-1 text-xs font-medium">
                                    PRO
                                </p>
                            </div>
                            <p class="pt-2 text-n500">Brooklyn, NY, USA</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-[13px]">
                        <p class="rounded-full bg-r50 px-2 py-1 font-medium text-r300">
                            $75 - $100/hr
                        </p>
                        <p class="rounded-full bg-g50 px-2 py-1 font-medium text-g400">
                            TOP INDEPENDENT
                        </p>
                        <p class="rounded-full bg-v50 px-2 py-1 font-medium text-v300">
                            AVAILABLE
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-n400">
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/settings_icon.png" alt="" />
                            <span>Handyman</span>
                        </p>
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/tap_icon.png" alt="" />
                            <span>Plumber </span>
                        </p>
                        <p class="rounded-xl bg-b50 px-3 py-2 font-medium">+3</p>
                    </div>

                    <div class="relative">
                        <div class="swiper expert-slider-carousel group">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_1.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_4.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_5.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_6.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>
                            </div>
                            <div class="absolute left-2 right-2 top-28 z-10">
                                <div class="flex w-full items-center justify-between">
                                    <button class="ara-prev flex -translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-left"></i>
                                    </button>
                                    <button class="ara-next flex translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-start gap-2 px-6">
                        <a href="worker-profile.html" class="relative w-full overflow-hidden rounded-full bg-n700 px-6 py-3 text-sm font-semibold text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)]">
                            <div class="relative z-20 flex items-center justify-center gap-3">
                                <i class="ph ph-paper-plane-tilt text-xl !leading-none"></i>
                                <span>Get in touch</span>
                            </div>
                        </a>
                        <button class="relative flex items-center justify-center rounded-full border p-3 text-xl !leading-none duration-500 hover:bg-y300">
                            <i class="ph ph-heart"></i>
                        </button>
                    </div>
                </div>
                <div class="col-span-12 flex flex-col gap-6 rounded-3xl border border-n40 bg-n10 py-6 md:col-span-6 xl:col-span-4" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                    <div class="flex items-center justify-start gap-3 px-6">
                        <div class="relative max-md:overflow-hidden">
                            <div class="hexagon-styles my-[calc(100px*0.5/2)] h-[calc(100px*0.57736720554273)] w-[100px] rounded-[calc(100px/36.75)] bg-b50 before:rounded-[calc(100px/18.75)] after:rounded-[calc(100px/18.75)]">
                                <div class="absolute -top-[20px] left-[5px]">
                                    <div class="hexagon-styles z-10 my-[calc(90px*0.5/2)] h-[calc(90px*0.57736720554273)] w-[90px] rounded-[calc(90px/50)] bg-b300 before:rounded-[calc(90px/50)] after:rounded-[calc(90px/50)]">
                                        <div class="absolute -top-[19px] left-[4px] z-20">
                                            <div class="hexagon-styles z-10 my-[calc(82px*0.5/2)] h-[calc(82px*0.57736720554273)] w-[82px] rounded-[calc(82px/50)] bg-b50 before:rounded-[calc(82px/50)] after:rounded-[calc(82px/50)]">
                                                <div class="r-hex3 absolute -left-0.5 -top-[19px] z-30 inline-block w-[86px] overflow-hidden">
                                                    <div class="r-hex-inner3">
                                                        <div class="expertImg2 r-hex-inner-3 before:h-[86px] before:bg-cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-3 right-1 z-30">
                                <img src="assets/images/verify-badge.png" alt="" class="" />
                            </div>
                        </div>
                        <div class="max-[350px]:max-w-20">
                            <div class="flex items-center justify-start gap-3">
                                <h5 class="heading-5">Madge Dale</h5>
                                <p class="rounded-full bg-y300 px-2 py-1 text-xs font-medium">
                                    PRO
                                </p>
                            </div>
                            <p class="pt-2 text-n500">Brooklyn, NY, USA</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-[13px]">
                        <p class="rounded-full bg-r50 px-2 py-1 font-medium text-r300">
                            $75 - $100/hr
                        </p>
                        <p class="rounded-full bg-g50 px-2 py-1 font-medium text-g400">
                            TOP INDEPENDENT
                        </p>
                        <p class="rounded-full bg-v50 px-2 py-1 font-medium text-v300">
                            AVAILABLE
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-n400">
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/settings_icon.png" alt="" />
                            <span>Handyman</span>
                        </p>
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/tap_icon.png" alt="" />
                            <span>Plumber </span>
                        </p>
                        <p class="rounded-xl bg-b50 px-3 py-2 font-medium">+3</p>
                    </div>

                    <div class="relative">
                        <div class="swiper expert-slider-carousel group">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_6.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_1.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_4.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_5.png" alt="" class="w-full" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>
                            </div>
                            <div class="absolute left-2 right-2 top-28 z-10">
                                <div class="flex w-full items-center justify-between">
                                    <button class="ara-prev flex -translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-left"></i>
                                    </button>
                                    <button class="ara-next flex translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-start gap-2 px-6">
                        <a href="worker-profile.html" class="relative w-full overflow-hidden rounded-full bg-n700 px-6 py-3 text-sm font-semibold text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)]">
                            <div class="relative z-20 flex items-center justify-center gap-3">
                                <i class="ph ph-paper-plane-tilt text-xl !leading-none"></i>
                                <span>Get in touch</span>
                            </div>
                        </a>
                        <button class="relative flex items-center justify-center rounded-full border p-3 text-xl !leading-none duration-500 hover:bg-y300">
                            <i class="ph ph-heart"></i>
                        </button>
                    </div>
                </div>
                <div class="col-span-12 flex flex-col gap-6 rounded-3xl border border-n40 bg-n10 py-6 md:col-span-6 xl:col-span-4" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">
                    <div class="flex items-center justify-start gap-3 px-6">
                        <div class="relative max-md:overflow-hidden">
                            <div class="hexagon-styles my-[calc(100px*0.5/2)] h-[calc(100px*0.57736720554273)] w-[100px] rounded-[calc(100px/36.75)] bg-b50 before:rounded-[calc(100px/18.75)] after:rounded-[calc(100px/18.75)]">
                                <div class="absolute -top-[20px] left-[5px]">
                                    <div class="hexagon-styles z-10 my-[calc(90px*0.5/2)] h-[calc(90px*0.57736720554273)] w-[90px] rounded-[calc(90px/50)] bg-b300 before:rounded-[calc(90px/50)] after:rounded-[calc(90px/50)]">
                                        <div class="absolute -top-[19px] left-[4px] z-20">
                                            <div class="hexagon-styles z-10 my-[calc(82px*0.5/2)] h-[calc(82px*0.57736720554273)] w-[82px] rounded-[calc(82px/50)] bg-b50 before:rounded-[calc(82px/50)] after:rounded-[calc(82px/50)]">
                                                <div class="r-hex3 absolute -left-0.5 -top-[19px] z-30 inline-block w-[86px] overflow-hidden">
                                                    <div class="r-hex-inner3">
                                                        <div class="expertImg3 r-hex-inner-3 before:h-[86px] before:bg-cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-3 right-1 z-30">
                                <img src="assets/images/verify-badge.png" alt="" class="" />
                            </div>
                        </div>
                        <div class="max-[350px]:max-w-20">
                            <div class="flex items-center justify-start gap-3">
                                <h5 class="heading-5">Evan Dev</h5>
                                <p class="rounded-full bg-y300 px-2 py-1 text-xs font-medium">
                                    PRO
                                </p>
                            </div>
                            <p class="pt-2 text-n500">Brooklyn, NY, USA</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-[13px]">
                        <p class="rounded-full bg-r50 px-2 py-1 font-medium text-r300">
                            $75 - $100/hr
                        </p>
                        <p class="rounded-full bg-g50 px-2 py-1 font-medium text-g400">
                            TOP INDEPENDENT
                        </p>
                        <p class="rounded-full bg-v50 px-2 py-1 font-medium text-v300">
                            AVAILABLE
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-n400">
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/settings_icon.png" alt="" />
                            <span>Handyman</span>
                        </p>
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/tap_icon.png" alt="" />
                            <span>Plumber </span>
                        </p>
                        <p class="rounded-xl bg-b50 px-3 py-2 font-medium">+3</p>
                    </div>

                    <div class="relative">
                        <div class="swiper expert-slider-carousel group">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_1.png" alt="" class="w-full" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_4.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_5.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_6.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>
                            </div>
                            <div class="absolute left-2 right-2 top-28 z-10">
                                <div class="flex w-full items-center justify-between">
                                    <button class="ara-prev flex -translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-left"></i>
                                    </button>
                                    <button class="ara-next flex translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-start gap-2 px-6">
                        <a href="worker-profile.html" class="relative w-full overflow-hidden rounded-full bg-n700 px-6 py-3 text-sm font-semibold text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)]">
                            <div class="relative z-20 flex items-center justify-center gap-3">
                                <i class="ph ph-paper-plane-tilt text-xl !leading-none"></i>
                                <span>Get in touch</span>
                            </div>
                        </a>
                        <button class="relative flex items-center justify-center rounded-full border p-3 text-xl !leading-none duration-500 hover:bg-y300">
                            <i class="ph ph-heart"></i>
                        </button>
                    </div>
                </div>
                <div class="col-span-12 flex flex-col gap-6 rounded-3xl border border-n40 bg-n10 py-6 md:col-span-6 xl:col-span-4" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                    <div class="flex items-center justify-start gap-3 px-6">
                        <div class="relative max-md:overflow-hidden">
                            <div class="hexagon-styles my-[calc(100px*0.5/2)] h-[calc(100px*0.57736720554273)] w-[100px] rounded-[calc(100px/36.75)] bg-b50 before:rounded-[calc(100px/18.75)] after:rounded-[calc(100px/18.75)]">
                                <div class="absolute -top-[20px] left-[5px]">
                                    <div class="hexagon-styles z-10 my-[calc(90px*0.5/2)] h-[calc(90px*0.57736720554273)] w-[90px] rounded-[calc(90px/50)] bg-b300 before:rounded-[calc(90px/50)] after:rounded-[calc(90px/50)]">
                                        <div class="absolute -top-[19px] left-[4px] z-20">
                                            <div class="hexagon-styles z-10 my-[calc(82px*0.5/2)] h-[calc(82px*0.57736720554273)] w-[82px] rounded-[calc(82px/50)] bg-b50 before:rounded-[calc(82px/50)] after:rounded-[calc(82px/50)]">
                                                <div class="r-hex3 absolute -left-0.5 -top-[19px] z-30 inline-block w-[86px] overflow-hidden">
                                                    <div class="r-hex-inner3">
                                                        <div class="expertImg4 r-hex-inner-3 before:h-[86px] before:bg-cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-3 right-1 z-30">
                                <img src="assets/images/verify-badge.png" alt="" class="" />
                            </div>
                        </div>
                        <div class="max-[350px]:max-w-20">
                            <div class="flex items-center justify-start gap-3">
                                <h5 class="heading-5">Ruth Vega</h5>
                                <p class="rounded-full bg-y300 px-2 py-1 text-xs font-medium">
                                    PRO
                                </p>
                            </div>
                            <p class="pt-2 text-n500">Brooklyn, NY, USA</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-[13px]">
                        <p class="rounded-full bg-r50 px-2 py-1 font-medium text-r300">
                            $75 - $100/hr
                        </p>
                        <p class="rounded-full bg-g50 px-2 py-1 font-medium text-g400">
                            TOP INDEPENDENT
                        </p>
                        <p class="rounded-full bg-v50 px-2 py-1 font-medium text-v300">
                            AVAILABLE
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-n400">
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/settings_icon.png" alt="" />
                            <span>Handyman</span>
                        </p>
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/tap_icon.png" alt="" />
                            <span>Plumber </span>
                        </p>
                        <p class="rounded-xl bg-b50 px-3 py-2 font-medium">+3</p>
                    </div>

                    <div class="relative">
                        <div class="swiper expert-slider-carousel group">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_1.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>

                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_4.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_5.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_6.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>
                            </div>
                            <div class="absolute left-2 right-2 top-28 z-10">
                                <div class="flex w-full items-center justify-between">
                                    <button class="ara-prev flex -translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-left"></i>
                                    </button>
                                    <button class="ara-next flex translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-start gap-2 px-6">
                        <a href="worker-profile.html" class="relative w-full overflow-hidden rounded-full bg-n700 px-6 py-3 text-sm font-semibold text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)]">
                            <div class="relative z-20 flex items-center justify-center gap-3">
                                <i class="ph ph-paper-plane-tilt text-xl !leading-none"></i>
                                <span>Get in touch</span>
                            </div>
                        </a>
                        <button class="relative flex items-center justify-center rounded-full border p-3 text-xl !leading-none duration-500 hover:bg-y300">
                            <i class="ph ph-heart"></i>
                        </button>
                    </div>
                </div>
                <div class="col-span-12 flex flex-col gap-6 rounded-3xl border border-n40 bg-n10 py-6 md:col-span-6 xl:col-span-4" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                    <div class="flex items-center justify-start gap-3 px-6">
                        <div class="relative max-md:overflow-hidden">
                            <div class="hexagon-styles my-[calc(100px*0.5/2)] h-[calc(100px*0.57736720554273)] w-[100px] rounded-[calc(100px/36.75)] bg-b50 before:rounded-[calc(100px/18.75)] after:rounded-[calc(100px/18.75)]">
                                <div class="absolute -top-[20px] left-[5px]">
                                    <div class="hexagon-styles z-10 my-[calc(90px*0.5/2)] h-[calc(90px*0.57736720554273)] w-[90px] rounded-[calc(90px/50)] bg-b300 before:rounded-[calc(90px/50)] after:rounded-[calc(90px/50)]">
                                        <div class="absolute -top-[19px] left-[4px] z-20">
                                            <div class="hexagon-styles z-10 my-[calc(82px*0.5/2)] h-[calc(82px*0.57736720554273)] w-[82px] rounded-[calc(82px/50)] bg-b50 before:rounded-[calc(82px/50)] after:rounded-[calc(82px/50)]">
                                                <div class="r-hex3 absolute -left-0.5 -top-[19px] z-30 inline-block w-[86px] overflow-hidden">
                                                    <div class="r-hex-inner3">
                                                        <div class="expertImg5 r-hex-inner-3 before:h-[86px] before:bg-cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-3 right-1 z-30">
                                <img src="assets/images/verify-badge.png" alt="" class="" />
                            </div>
                        </div>
                        <div class="max-[350px]:max-w-20">
                            <div class="flex items-center justify-start gap-3">
                                <h5 class="heading-5">Scott Wade</h5>
                                <p class="rounded-full bg-y300 px-2 py-1 text-xs font-medium">
                                    PRO
                                </p>
                            </div>
                            <p class="pt-2 text-n500">Brooklyn, NY, USA</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-[13px]">
                        <p class="rounded-full bg-r50 px-2 py-1 font-medium text-r300">
                            $75 - $100/hr
                        </p>
                        <p class="rounded-full bg-g50 px-2 py-1 font-medium text-g400">
                            TOP INDEPENDENT
                        </p>
                        <p class="rounded-full bg-v50 px-2 py-1 font-medium text-v300">
                            AVAILABLE
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 px-6 text-n400">
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/settings_icon.png" alt="" />
                            <span>Handyman</span>
                        </p>
                        <p class="flex items-center justify-center gap-2 rounded-xl bg-b50 px-3 py-2 font-medium">
                            <img src="assets/images/tap_icon.png" alt="" />
                            <span>Plumber </span>
                        </p>
                        <p class="rounded-xl bg-b50 px-3 py-2 font-medium">+3</p>
                    </div>

                    <div class="relative">
                        <div class="swiper expert-slider-carousel group">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_4.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_1.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_5.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_6.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_3.png" alt="" class="w-full" />
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/expert_slider_img_2.png" alt="" class="w-full" />
                                </div>
                            </div>
                            <div class="absolute left-2 right-2 top-28 z-10">
                                <div class="flex w-full items-center justify-between">
                                    <button class="ara-prev flex -translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-left"></i>
                                    </button>
                                    <button class="ara-next flex translate-x-12 items-center justify-center rounded-full border-2 border-r300 p-2 text-lg !leading-none text-r300 opacity-0 duration-500 hover:bg-r300 hover:text-white group-hover:translate-x-0 group-hover:opacity-100">
                                        <i class="ph-bold ph-caret-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-start gap-2 px-6">
                        <a href="worker-profile.html" class="relative w-full overflow-hidden rounded-full bg-n700 px-6 py-3 text-sm font-semibold text-white duration-700 after:absolute after:inset-0 after:left-0 after:w-0 after:rounded-full after:bg-yellow-400 after:duration-700 hover:text-n900 hover:after:w-[calc(100%+2px)]">
                            <div class="relative z-20 flex items-center justify-center gap-3">
                                <i class="ph ph-paper-plane-tilt text-xl !leading-none"></i>
                                <span>Get in touch</span>
                            </div>
                        </a>
                        <button class="relative flex items-center justify-center rounded-full border p-3 text-xl !leading-none duration-500 hover:bg-y300">
                            <i class="ph ph-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Top Expert Section End -->

    <!-- Looking for service section Start -->
    <section class="stp-30 sbp-30">
        <div class="container grid grid-cols-12 max-lg:gap-6">
            <div class="relative col-span-12 lg:col-span-6">
                <div class="overflow-hidden pb-6 pl-6">
                    <img src="assets/images/home_one_contact_img.png" alt="" class="relative z-10 overflow-hidden rounded-2xl" />
                </div>
                <div class="absolute bottom-0 left-0 h-[250px] w-[200px] rounded-2xl bg-n900 sm:h-[300px] lg:w-[300px] xl:h-[600px]"></div>
            </div>

            <div class="col-span-12 flex flex-col items-start justify-center lg:col-span-5 lg:col-start-8">
                <h5 class="heading-5 pb-4 text-r300">Fixed Price Service</h5>
                <ul class="flex flex-wrap items-center justify-start gap-3">
                    <li class="flex items-center justify-start gap-2">
                        <i class="ph ph-currency-circle-dollar text-xl !leading-none"> </i>
                        See your price.
                    </li>
                    <li class="flex items-center justify-start gap-2">
                        <i class="ph ph-calendar-check text-xl !leading-none"> </i> Book a time.
                    </li>
                    <li class="flex items-center justify-start gap-2">
                        <i class="ph ph-credit-card text-xl !leading-none"></i> Pay online.
                    </li>
                </ul>

                <h2 class="heading-2 max-w-[400px] pt-6 font-bold sm:pt-8">
                    Looking to book a fixed price service?
                </h2>
                <p class="pt-4 font-medium text-n500">
                    Interested in scheduling a service at a set rate? Browse our selection of
                    fixed-price offerings and book with confidence today
                </p>
                <p class="pb-6 pt-4 font-medium text-n800 sm:pb-10 sm:pt-8">
                    Plumbing, Handyman, House Cleaning, and more...
                </p>
                <div class="">
                    <a href="contact.html" class="group relative flex items-center justify-start pr-12 font-semibold"><span class="rounded-full bg-y300 px-6 py-3 duration-500 group-hover:translate-x-12">Contact Now</span>
                        <i class="ph-bold ph-arrow-up-right absolute right-0 top-0 translate-x-0 rounded-full bg-y300 p-[14px] text-xl !leading-none duration-500 group-hover:right-[154px] group-hover:rotate-45"></i></a>
                </div>
            </div>
        </div>

    </section>
    <!-- Looking for service section End -->

    <!-- Newsletter Section Start -->
    <section class="stp-30 sbp-30 relative overflow-hidden bg-r300">
        <div class="jumping1 absolute -right-40 top-96 size-[300px] rounded-full bg-b900 sm:top-48 sm:size-[400px] lg:-right-10 lg:top-20 xl:size-[640px]"></div>
        <div class="jumping2 absolute -left-64 bottom-96 z-10 size-[350px] rounded-full bg-g300 sm:bottom-64 sm:size-[400px] lg:-left-40 lg:bottom-20 xl:size-[640px]"></div>
        <div class="slideRight absolute -left-64 top-96 size-[350px] rounded-full bg-b100 sm:top-64 sm:size-[500px] lg:-left-40 lg:top-20 xl:size-[876px]"></div>
        <div class="slideLeft absolute left-1/4 top-[400px] size-[300px] rounded-full bg-y200 max-sm:hidden sm:size-[400px] lg:top-80 xl:top-60 xl:size-[754px]"></div>

        <div class="container relative z-20 grid grid-cols-12 text-white max-lg:gap-6">
            <div class="col-span-12 flex flex-col items-start justify-center md:col-span-5">
                <h5 class="heading-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
                    Newsletter
                </h5>
                <h2 class="heading-2 pt-4" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="0">
                    Don't Miss a Beat with Our Newsletter
                </h2>
            </div>
            <div class="col-span-12 md:col-span-7 md:col-start-6 lg:col-span-6 lg:col-start-7 xl:col-span-5 xl:col-start-8">
                <h5 class="heading-5">Sign up to stay up to date</h5>
                <div class="flex items-start justify-start gap-3 pt-6 max-[450px]:flex-col md:items-center">
                    <div class="">
                        <input type="text" placeholder="Email" class="rounded-full bg-white px-8 py-3 text-n900 outline-none placeholder:text-n700" />
                    </div>
                    <div class="text-n900">
                        <button class="group relative flex items-center justify-start pr-12 font-semibold">
                            <span class="rounded-full bg-y300 px-6 py-3 duration-500 group-hover:translate-x-12">Send</span>
                            <i class="ph-bold ph-arrow-up-right absolute right-0 top-0 translate-x-0 rounded-full bg-y300 p-[14px] text-xl !leading-none duration-500 group-hover:right-[90px] group-hover:rotate-45"></i>
                        </button>
                    </div>
                </div>
                <div class="stp-15 flex flex-wrap items-center justify-start gap-6">
                    <div class="flex items-center justify-start">
                        <div class="overflow-hidden rounded-full bg-n900 p-1">
                            <img src="assets/images/cta_img1.png" alt="" class="rounded-full" />
                        </div>
                        <div class="-ml-5 overflow-hidden rounded-full bg-n900 p-1">
                            <img src="assets/images/cta_img2.png" alt="" class="rounded-full" />
                        </div>
                        <div class="-ml-5 overflow-hidden rounded-full bg-n900 p-1 text-n900">
                            <p class="flex h-[60px] w-[60px] items-center justify-center rounded-full bg-white text-lg font-semibold !leading-none">
                                +15K
                            </p>
                        </div>
                    </div>
                    <div class="">
                        <h5 class="heading-5">More than 15k active users!</h5>
                        <a href="sign-up-step-1.html" class="flex items-center justify-start gap-3 pt-3 font-medium">Join them now <i class="ph ph-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->

    <!-- Secure Guard Start -->
    <section class="stp-30 sbp-30">
        <div class="container grid grid-cols-12 max-lg:gap-6">
            <div class="col-span-12 lg:col-span-6">
                <h5 class="heading-5 text-r300" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
                    Secure Guard
                </h5>
                <h2 class="heading-2 max-w-[550px] pt-4" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="0">
                    Trust and safety features for your protection
                </h2>
                <ul class="flex flex-col gap-8 pt-6 lg:pt-10">
                    <li class="relative flex items-start justify-start gap-4">
                        <div class="flex items-center justify-center rounded-full bg-b300 p-3 text-2xl !leading-none text-white">
                            <i class="ph ph-currency-dollar-simple"></i>
                            <div class="linear_gradient_one absolute bottom-3 left-6 h-[50px] w-[2px]"></div>
                        </div>
                        <div class="">
                            <h5 class="heading-5">Secure payments</h5>
                            <p class="max-w-[500px] py-3 text-n500">
                                Only release payment when the task is completed to your satisfaction
                            </p>
                            <a href="#" class="font-bold text-b300">Read More</a>
                        </div>
                    </li>
                    <li class="relative flex items-start justify-start gap-4">
                        <div class="flex items-center justify-center rounded-full bg-b300 p-3 text-2xl !leading-none text-white">
                            <i class="ph ph-star"></i>
                            <div class="linear_gradient_one absolute bottom-3 left-6 h-[50px] w-[2px]"></div>
                        </div>
                        <div class="">
                            <h5 class="heading-5">Trusted ratings and reviews</h5>
                            <p class="max-w-[500px] py-3 text-n500">
                                Pick the right person for the task based on real ratings and reviews
                                from other users
                            </p>
                            <a href="#" class="font-bold text-b300">Read More</a>
                        </div>
                    </li>
                    <li class="relative flex items-start justify-start gap-4">
                        <div class="flex items-center justify-center rounded-full bg-b300 p-3 text-2xl !leading-none text-white">
                            <i class="ph ph-shield-check"></i>
                            <div class="linear_gradient_one absolute bottom-3 left-6 h-[50px] w-[2px]"></div>
                        </div>
                        <div class="">
                            <h5 class="heading-5">Insurance for peace of mind</h5>
                            <p class="max-w-[500px] py-3 text-n500">
                                Only release payment when the task is completed to your satisfaction
                            </p>
                            <a href="#" class="font-bold text-b300">Read More</a>
                        </div>
                    </li>
                </ul>
                <div class="flex justify-start pt-10">
                    <a href="working-processed-step-01.html" class="group relative flex items-center justify-start pr-12 font-semibold"><span class="rounded-full bg-y300 px-6 py-3 duration-500 group-hover:translate-x-12">Post your task for free</span>
                        <i class="ph-bold ph-arrow-up-right absolute right-0 top-0 translate-x-0 rounded-full bg-y300 p-[14px] text-xl !leading-none duration-500 group-hover:right-[230px] group-hover:rotate-45"></i></a>
                </div>
            </div>

            <div class="relative col-span-12 items-end justify-center lg:col-span-5 lg:col-start-8 lg:flex">
                <div class="overflow-hidden pb-4 pr-4">
                    <img src="assets/images/safe_guard_section_img.png" alt="" class="relative z-10 h-full w-full overflow-hidden rounded-2xl" />
                </div>
                <div class="absolute bottom-0 right-0 h-[250px] w-[200px] rounded-2xl bg-n900 sm:h-[300px] lg:w-[300px] xl:h-[500px]"></div>

                <div class="box-shadow-2 absolute right-0 top-4 z-10 flex items-center justify-start gap-2 rounded-xl border border-b50 bg-white px-3 py-2 sm:top-12 sm:gap-3 sm:px-8 sm:py-6 3xl:-right-32">
                    <div class="rounded-full bg-b100 p-0.5">
                        <img src="assets/images/safe_guard_review_img.png" alt="" class="rounded-full" />
                    </div>

                    <div class="">
                        <div class="flex items-center justify-start gap-3">
                            <span class="heading-3">4.5</span>
                            <i class="ph-fill ph-star text-xl !leading-none text-y300"></i>
                        </div>
                        <p class="font-medium text-n500">Over all Rating</p>
                    </div>
                </div>

                <div class="box-shadow-2 absolute -left-2 bottom-20 z-10 flex items-center justify-start gap-2 rounded-xl border border-b50 bg-white px-3 py-2 font-medium sm:bottom-40 sm:gap-3 sm:px-8 sm:py-6 lg:-left-20">
                    <i class="ph ph-thumbs-up text-xl !leading-none"></i>
                    <p>Job Completed</p>
                    <span class="text-n300">2m ago</span>
                </div>
                <div class="box-shadow-2 absolute -left-2 bottom-8 z-10 flex items-center justify-start gap-2 rounded-xl border border-b50 bg-white px-3 py-2 font-medium sm:bottom-16 sm:gap-3 sm:px-8 sm:py-6 lg:-left-20">
                    <i class="ph ph-check-circle text-xl !leading-none"></i>
                    <p>Payment released</p>
                    <span class="text-n300">2m ago</span>
                </div>
            </div>
        </div>

    </section>
    <!-- Secure Guard End -->

    <!-- Testimonial Section Start -->
    <section class="stp-30 sbp-30 relative overflow-hidden bg-b50">
        <div class="absolute right-0 top-0">
            <img src="assets/images/home-four-illus.png" alt="" class="max-[1860px]:w-[280px] max-3xl:w-[150px] max-xl:hidden" />
        </div>
        <div class="container">
            <div class="sbp-15 flex items-center justify-between gap-6 border-b border-sp max-sm:flex-col">
                <div class="">
                    <h5 class="heading-5 text-r300">Testimonials</h5>
                    <h2 class="heading-2 max-w-[500px] pt-4">
                        What Users Are Saying About The Servibe
                    </h2>
                </div>
                <p class="font-medium text-n500 sm:max-w-[300px]">
                    Incredibly impressed on-demand cleaning service. Prompt, thorough
                    and left home sparkling.
                </p>
            </div>

            <div class="grid grid-cols-12 max-lg:gap-6">
                <div class="stp-15 col-span-12 flex items-center justify-center border-sp pr-6 md:col-span-4 md:border-r lg:col-span-5 lg:pr-20">
                    <img src="assets/images/testimonial_img.png" alt="" class="max-md:max-h-[300px]" />
                </div>

                <div class="col-span-12 flex items-center justify-start md:col-span-7 lg:col-span-6 lg:col-start-7">
                    <div class="swiper testimonial4-slider-carousel md:max-lg:pt-6">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide w-full">
                                <p class="border-b border-sp pb-5 text-lg font-medium text-n500 sm:text-xl">
                                    "Incredibly impressed on-demand cleaning service. Prompt,
                                    thorough and left home sparkling. A game-changer for busy
                                    schedules! Uber has transformed my daily commute. Reliable
                                    drivers, easy booking, and the app's convenience
                                </p>

                                <h4 class="heading-4 pt-5">Andrew Russel</h4>
                                <p class="pt-1 font-medium text-n500">VP of Marketing</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-start gap-3 pt-6 text-2xl !leading-none text-b300 lg:pt-10">
                            <button class="hover: ara-prev flex items-center justify-center rounded-full border border-b300 p-3 duration-500 hover:-rotate-45 hover:bg-b300 hover:text-white lg:p-4">
                                <i class="ph ph-arrow-up-left"></i>
                            </button>
                            <button class="hover: ara-next flex items-center justify-center rounded-full border border-b300 p-3 duration-500 hover:rotate-45 hover:bg-b300 hover:text-white lg:p-4">
                                <i class="ph ph-arrow-up-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Recent Post Section Start -->
    <section class="stp-30 sbp-30">
        <div class="container">
            <div class="flex items-center justify-between gap-4">
                <div class="flex flex-col">
                    <h2 class="heading-2 font-bold text-n900">
                        Recent <span class="text-b300 underline">Posts</span>
                    </h2>
                    <p class="pt-4 font-medium text-n500">
                        Read the recent articles from our blog.
                    </p>
                </div>
                <div class="">
                    <a href="blog.html" class="flex items-center justify-start gap-3 font-bold duration-300 hover:text-b300">All Article
                        <i class="ph-bold ph-arrow-right text-2xl !leading-none"></i></a>
                </div>
            </div>
            <div class="stp-15 grid grid-cols-12 gap-6">
                <div class="group col-span-12 sm:col-span-6 lg:col-span-4" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="0">
                    <div class="relative">
                        <img src="assets/images/blog-post-image-1.png" alt="" class="w-full rounded-xl" />
                        <p class="absolute bottom-3 left-3 rounded-2xl bg-b75 px-6 py-2 text-sm">
                            Tips & Tricks
                        </p>
                    </div>
                    <div class="rounded-2xl bg-r50 px-6 py-5 duration-500 group-hover:bg-bg2">
                        <a href="blog-details.html">
                            <h4 class="heading-4 pb-3">Exploring Service Success Stories</h4>
                        </a>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-n500">
                                Latest News December <br />
                                12, 2024
                            </p>
                            <a href="blog-details.html" class="flex items-center justify-center rounded-full bg-n900 p-2 text-2xl !leading-none text-white duration-500 group-hover:rotate-45">
                                <i class="ph ph-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="group col-span-12 sm:col-span-6 lg:col-span-4" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="200">
                    <div class="relative">
                        <img src="assets/images/blog-post-image-2.png" alt="" class="w-full rounded-xl" />
                        <p class="absolute bottom-3 left-3 rounded-2xl bg-b75 px-6 py-2 text-sm">
                            Tips & Tricks
                        </p>
                    </div>
                    <div class="rounded-2xl bg-r50 px-6 py-5 duration-500 group-hover:bg-bg2">
                        <a href="blog-details.html">
                            <h4 class="heading-4 pb-3">
                                Stories of Triumph in the On-Demand Era
                            </h4>
                        </a>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-n500">
                                Latest News December <br />
                                12, 2024
                            </p>
                            <a href="blog-details.html" class="flex items-center justify-center rounded-full bg-n900 p-2 text-2xl !leading-none text-white duration-500 group-hover:rotate-45">
                                <i class="ph ph-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="group col-span-12 sm:col-span-6 lg:col-span-4" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="400">
                    <div class="relative">
                        <img src="assets/images/blog-post-image-3.png" alt="" class="w-full rounded-xl" />
                        <p class="absolute bottom-3 left-3 rounded-2xl bg-b75 px-6 py-2 text-sm">
                            Tips & Tricks
                        </p>
                    </div>
                    <div class="rounded-2xl bg-r50 px-6 py-5 duration-500 group-hover:bg-bg2">
                        <a href="blog-details.html">
                            <h4 class="heading-4 pb-3">
                                Journey Through Service Experiences
                            </h4>
                        </a>
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-n500">
                                Latest News December <br />
                                12, 2024
                            </p>
                            <a href="blog-details.html" class="flex items-center justify-center rounded-full bg-n900 p-2 text-2xl !leading-none text-white duration-500 group-hover:rotate-45">
                                <i class="ph ph-arrow-up-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Recent Post Section End -->

    <!-- Find work and hiring section start -->
    <section class="stp-30 sbp-30 relative">
        <div class="absolute left-0 top-0 w-full bg-g300 max-md:h-1/2 md:bottom-0 md:w-1/2"></div>
        <div class="absolute bottom-0 right-0 w-full bg-r300 max-md:h-1/2 md:top-0 md:w-1/2"></div>
        <div class="container relative z-10 grid grid-cols-12 overflow-hidden max-md:gap-6">
            <div class="col-span-12 grid grid-cols-6 max-sm:pb-6 sm:max-md:pb-24 md:col-span-5">
                <div class="col-span-6 rounded-xl border bg-g75 p-8 lg:col-span-5">
                    <div class="flex items-start justify-between">
                        <p class="rounded-full bg-y300 px-2 py-1 text-sm font-medium">
                            PRO
                        </p>
                        <div class="">
                            <div class="">
                                <img src="assets/images/review_img.png" alt="" class="w-[75px]" />
                            </div>
                            <div class="flex gap-2 pt-2">
                                <p class="flex items-center justify-start gap-2 text-sm font-bold !leading-none text-o300">
                                    <i class="ph-fill ph-star"></i> 4.7
                                </p>
                                <div class="text-sm text-n300">
                                    <p class="">(81)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center py-6">
                        <div class="relative max-md:overflow-hidden">
                            <div class="hexagon-styles my-[calc(200px*0.5/2)] h-[calc(200px*0.57736720554273)] w-[200px] rounded-[calc(200px/36.75)] bg-b50 before:rounded-[calc(200px/18.75)] after:rounded-[calc(200px/18.75)]">
                                <div class="absolute -top-11 left-[5px]">
                                    <div class="hexagon-styles z-10 my-[calc(190px*0.5/2)] h-[calc(190px*0.57736720554273)] w-[190px] rounded-[calc(190px/50)] bg-b300 before:rounded-[calc(190px/50)] after:rounded-[calc(190px/50)]">
                                        <div class="absolute -top-[42px] left-[5px] z-20">
                                            <div class="hexagon-styles z-10 my-[calc(180px*0.5/2)] h-[calc(180px*0.57736720554273)] w-[180px] rounded-[calc(180px/50)] bg-b50 before:rounded-[calc(180px/50)] after:rounded-[calc(180px/50)]">
                                                <div class="r-hex3 absolute -left-[5px] -top-[43px] z-30 inline-block w-[190px] overflow-hidden">
                                                    <div class="r-hex-inner3">
                                                        <div class="expertImg5 r-hex-inner-3 before:h-[190px] before:bg-cover"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-5 right-1 z-30">
                                <img src="assets/images/verify-badge2.png" alt="" class="" />
                            </div>
                        </div>
                        <div class="pt-3">
                            <div class="flex flex-col items-center justify-start gap-3">
                                <h5 class="heading-5">I am an Expert</h5>
                            </div>
                            <p class="pt-2 text-center text-n500 sm:px-3">
                                I'm a Skilled Professional, Ready to Assist with Expertise and
                                Dedication in Your Task.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between border-b border-n40 pb-6">
                        <div class="flex items-center justify-start gap-2">
                            <i class="ph ph-clock text-2xl !leading-none"></i>
                            <p>Full-Time</p>
                        </div>
                        <div class="flex items-center justify-start gap-2">
                            <i class="ph ph-chart-line text-2xl !leading-none"></i>
                            <p>10+ Years</p>
                        </div>
                    </div>

                    <div class="flex w-full items-center justify-center pt-8">
                        <a href="find-workers.html" class="group relative flex items-center justify-start pr-12 font-semibold"><span class="rounded-full bg-g300 px-6 py-3 duration-500 group-hover:translate-x-12">Explore Now</span>
                            <i class="ph-bold ph-arrow-up-right absolute right-0 top-0 translate-x-0 rounded-full bg-g300 p-[14px] text-xl !leading-none duration-500 group-hover:right-[152px] group-hover:rotate-45"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-span-12 flex flex-col items-start max-sm:pt-6 md:col-span-5 md:col-start-8">
                <div class="col-span-12 grid grid-cols-6 sm:col-span-5">
                    <div class="col-span-6 rounded-xl border bg-r50 p-8 lg:col-span-5 lg:col-start-2">
                        <div class="flex items-start justify-between">
                            <p class="rounded-full bg-y300 px-2 py-1 text-sm font-medium">
                                PRO
                            </p>
                            <div class="">
                                <div class="">
                                    <img src="assets/images/review_img.png" alt="" class="w-[75px]" />
                                </div>
                                <div class="flex gap-2 pt-2">
                                    <p class="flex items-center justify-start gap-2 text-sm font-bold !leading-none text-o300">
                                        <i class="ph-fill ph-star"></i> 4.7
                                    </p>
                                    <div class="text-sm text-n300">
                                        <p class="">(81)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center justify-center py-6">
                            <div class="relative max-md:overflow-hidden">
                                <div class="hexagon-styles my-[calc(200px*0.5/2)] h-[calc(200px*0.57736720554273)] w-[200px] rounded-[calc(200px/36.75)] bg-b50 before:rounded-[calc(200px/18.75)] after:rounded-[calc(200px/18.75)]">
                                    <div class="absolute -top-11 left-[5px]">
                                        <div class="hexagon-styles z-10 my-[calc(190px*0.5/2)] h-[calc(190px*0.57736720554273)] w-[190px] rounded-[calc(190px/50)] bg-b300 before:rounded-[calc(190px/50)] after:rounded-[calc(190px/50)]">
                                            <div class="absolute -top-[42px] left-[5px] z-20">
                                                <div class="hexagon-styles z-10 my-[calc(180px*0.5/2)] h-[calc(180px*0.57736720554273)] w-[180px] rounded-[calc(180px/50)] bg-b50 before:rounded-[calc(180px/50)] after:rounded-[calc(180px/50)]">
                                                    <div class="r-hex3 absolute -left-[5px] -top-[43px] z-30 inline-block w-[190px] overflow-hidden">
                                                        <div class="r-hex-inner3">
                                                            <div class="expertImg2 r-hex-inner-3 before:h-[190px] before:bg-cover"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute bottom-5 right-1 z-30">
                                    <img src="assets/images/verify-badge2.png" alt="" class="" />
                                </div>
                            </div>
                            <div class="pt-3">
                                <div class="flex flex-col items-center justify-start gap-3">
                                    <h5 class="heading-5">I am an Expert</h5>
                                </div>
                                <p class="pt-2 text-center text-n500 sm:px-3">
                                    I'm a Skilled Professional, Ready to Assist with Expertise
                                    and Dedication in Your Task.
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center justify-between border-b border-n40 pb-6">
                            <div class="flex items-center justify-start gap-2">
                                <i class="ph ph-clock text-2xl !leading-none"></i>
                                <p>Full-Time</p>
                            </div>
                            <div class="flex items-center justify-start gap-2">
                                <i class="ph ph-chart-line text-2xl !leading-none"></i>
                                <p>10+ Years</p>
                            </div>
                        </div>

                        <div class="flex w-full items-center justify-center pt-8">
                            <a href="find-workers.html" class="group relative flex items-center justify-start pr-12 font-semibold"><span class="rounded-full bg-y300 px-6 py-3 duration-500 group-hover:translate-x-12">Explore Now</span>
                                <i class="ph-bold ph-arrow-up-right absolute right-0 top-0 translate-x-0 rounded-full bg-y300 p-[14px] text-xl !leading-none duration-500 group-hover:right-[152px] group-hover:rotate-45"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Find work and hiring section end -->

    <!-- Get Help Section Start -->
    <section class="stp-30">
        <div class="relative flex items-center justify-center">
            <h2 class="heading-2 relative font-bold text-n900">
                Get help <span class="text-b300 underline">Today</span>

                <img src="assets/images/get_help_icon.png" alt="" class="absolute -bottom-24 right-0 z-20 sm:-bottom-20 sm:-right-28" />
            </h2>
        </div>

        <div class="overflow-hidden">
            <div class="tags-container relative"></div>
        </div>
    </section>
    <!-- Get Help Section End -->

</x-customer.layout>
