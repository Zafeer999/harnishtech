<x-admin.admin-layout>
    <x-slot name="title">Core Bio - Dashboard</x-slot>

    <style>
        .id-card {
            margin: 20px 0px;
            padding: 0px;
            width: 600px;
            height: 460px;
            border: 2px solid rgba(217, 127, 61, 0.815);
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.849);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            /* Smooth transition effect */
        }

        /* Hover effect for the entire card */
        .id-card:hover {
            transform: scale(1.01);
            /* Slightly scale up the card */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            /* Add more shadow on hover */
            cursor: pointer;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #d97f3d;
            color: rgb(255, 255, 255);
            height: 80px;
        }

        .logo img {
            width: 50px;
            height: 50px;
        }

        .school-info {
            text-align: right;
            font-size: 14px;
        }

        .card-body {
            display: flex;
            padding: 20px;
        }

        .photo img {
            width: 150px;
            height: 150px;
            border: 2px solid #ddd;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .photo img:hover {
            transform: scale(1.03);
            border-color: #ce3b0fe5;
        }

        .info {
            flex: 1;
            margin-left: 20px;
            color: #333;
        }

        .info h3 {
            font-size: 22px;
            margin-bottom: 10px;
            transition: color 0.3s ease;
            /* Smooth transition effect */
        }

        /* Hover effect for the student name text */
        .info h3:hover {
            color: #B2001F;
            /* Change color on hover */
        }

        .designation {
            font-size: 16px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            font-size: 14px;
        }

        table td {
            padding: 3px;
        }

        table strong {
            /* color: #B2001F; */
            color: #ce3b0fe5;
        }

        table tr {
            vertical-align: baseline;
        }
    </style>


    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid dashboard-default-sec">

            <div class="row">
                <div class="col-12 px-0">
                    <div class="row">
                        <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden border-0">
                                <div class="bg-blue b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body"><span class="m-0">Total Count</span>
                                            <h4 class="mb-0 counter"> {{ $totalAllCount }} </h4><i class="icon-bg" data-feather="package"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden border-0">
                                <div class="bg-info b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body"><span class="m-0">Total Unassigned</span>
                                            <h4 class="mb-0 counter"> {{ $totalUnassignedCount }} </h4><i class="icon-bg" data-feather="user-x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden border-0">
                                <div class="bg-warning b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body"><span class="m-0">Total Pending</span>
                                            <h4 class="mb-0 counter"> {{ $totalPendingCount }} </h4><i class="icon-bg" data-feather="clock"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden border-0">
                                <div class="bg-danger b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body"><span class="m-0">Total Working</span>
                                            <h4 class="mb-0 counter"> {{ $totalWorkingCount }} </h4><i class="icon-bg" data-feather="briefcase"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden border-0">
                                <div class="bg-success b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body"><span class="m-0">Total Completed</span>
                                            <h4 class="mb-0 counter"> {{ $totalCompletedCount }} </h4><i class="icon-bg" data-feather="check-square"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden border-0">
                                <div class="bg-dark text-white b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body"><span class="m-0">Total Cancelled</span>
                                            <h4 class="mb-0 counter"> {{ $totalCancelledCount }} </h4><i class="icon-bg" data-feather="x-square"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="col-sm-6 col-xl-3 col-lg-6">
                            <div class="card o-hidden border-0">
                                <div class="bg-success b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body"><span class="m-0">Total Department</span>
                                            <h4 class="mb-0 counter"> {{ $totalDepartments }} </h4><i class="icon-bg" data-feather="book"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12  px-0">
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                {{-- Todays present --}}
                        {{-- <div class="col-md-6 col-lg-6 col-xl-6 box-col-6">
                                    <div class="card custom-card rounded">
                                        <h6 class="card-header rounded bg-primary py-2 px-3 text-center">Today's Present</h6>
                                        <div class="card-body px-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    @php
                                                        $todaysPresentCount = $todayPunchData->where('check_in', '!=', '0000-00-00 00:00:00')->count();
                                                        $todaysPresentPercent = $totalEmployees ? round(($todaysPresentCount/$totalEmployees)*100) : '0';
                                                        $todaysAbsentCount = $totalEmployees-$todaysPresentCount;
                                                    @endphp
                                                    <label for=""> <a href="{{ route('dashboard.todays-present-report') }}">{{ $todaysPresentPercent }}%</a> </label>
                                                    <div class="progress">
                                                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: {{$todaysPresentPercent}}%" aria-valuenow="{{$todaysPresentPercent}}" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <a href="{{ route('dashboard.todays-present-report') }}"> <strong style="font-size:22px">{{$todaysPresentCount}} </strong>({{ $todaysPresentPercent }}%)  </a> <br>
                                                    <strong>Present Count</strong>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer row">
                                            @php
                                                $till10AMCount = $todayPunchData->countBy( fn($item) => Carbon\Carbon::parse($item->check_in)->gte($todaysDate.' 10:00:00') );
                                                $after10AMCount = array_key_exists('1', $till10AMCount->toArray()) ? $till10AMCount['1'] : 0;
                                                $till10AMCount = array_key_exists('0', $till10AMCount->toArray()) ? $till10AMCount['0'] : 0;
                                            @endphp
                                            <div class="col-6 col-sm-6">
                                                <h6>Till 10AM</h6>
                                                <h3><span class="counter" style="font-size:22px">{{ $till10AMCount }}</span><span style="font-size:14px">({{ $totalEmployees ? round(($till10AMCount/$totalEmployees)*100) : '0' }}%)</span></h3>
                                            </div>
                                            <div class="col-6 col-sm-6">
                                                <h6>After 10AM</h6>
                                                <h3><span class="counter" style="font-size:22px">{{ $after10AMCount }}</span><span style="font-size:14px">({{ $totalEmployees ? round(($after10AMCount/$totalEmployees)*100) : '0' }}%)</span></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                    </div>
                </div>


                {{-- Side recent 6 attendance list --}}
                {{-- <div class="col-3">

                            <h6 class="mb-4">Today's Latest 6 Records</h6>
                            @php
                                $latestFives = $todayPunchData->where('punch_by', '0')->reverse()->take(6);
                            @endphp
                            @foreach ($latestFives as $latest)
                                <div class="col-12 card rounded latest-update-sec mb-2">
                                    <div class="media py-2">
                                        <div class="col-12">
                                            <div class="media-body">
                                                <span>{{ Str::limit(ucwords($latest->user->name), 25) }}</span> <br>
                                                <span>#{{ $latest->emp_code }}</span> &nbsp;&nbsp; <span class="text-danger"> {{  Carbon\Carbon::parse($latest->check_in)->format('d-m-Y h:i A') }} </span>
                                                <p style="font-size: 10px">{{ Str::limit(ucfirst($latest->user->department?->name), 25) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-12">
                                <a href="{{ route('dashboard.device-log-report') }}" class="btn btn-primary w-100 py-1">View more </a>
                            </div>

                        </div> --}}
            </div>
        </div>


        {{-- ID Card --}}

        <div class="id-card">
            <div class="card-header">
                <div class="logo">
                    <img src="{{ asset(config('setting_data.HEADER_LOGO')) }}" style="width: 160px; height:55px" alt="Logo">
                </div>
                <div class="school-info">
                    <h2 class="text-start" style="text-align: center">{{ ucfirst(env('APP_NAME')) }}</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="photo">
                    <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('customer/assets/imgs/profile-img.png') }}" class="img-fluid" alt="profile photo">
                    {{-- <img src=" {{asset(Auth::user()->avatar) ?? asset('customer/assets/imgs/profile-img.png') }}" class="img-fluid" alt="profile photo"> --}}
                </div>
                <div class="info">
                    <h3><span>{{ Auth::user()->name }}</span></h3>
                    <table>
                        <tr>
                            <td><strong>EMP ID: </strong></td>
                            <td><span>{{ Auth::user()->serviceBoy->first()->emp_code }}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Mobile: </strong></td>
                            <td><span>{{ Auth::user()->mobile }}</span></td>
                        </tr>
                        <tr>
                            <td><strong>Email: </strong></td>
                            <td><span>{{ Auth::user()->email }}</span></td>
                        </tr>
                        <tr>
                            <td><strong>DOJ: </strong></td>
                            <td><span>{{ Auth::user()->serviceBoy->first()->doj }}</span></td>
                        </tr>
                        <tr>
                            <td><strong>DOB: </strong></td>
                            <td><span>{{ Auth::user()->serviceBoy->first()->dob }}</span></td>
                        </tr>
                        {{-- <tr>
                                    <td><strong>Gender:</strong></td>
                                    <td>{{ Auth::user()->serviceBoy->first()->gender }}</td>
                                </tr> --}}
                        <tr>
                            <td><strong>Address: </strong></td>
                            <td><span> {{ Auth::user()->serviceBoy->first()->address }} </span></td>
                        </tr>
                        <tr>
                            <td><strong>Services: </strong></td>
                            <td><span>
                                    @foreach (Auth::user()->services as $service)
                                        {{ $service->category->name }},
                                    @endforeach
                                </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        {{-- Shift wise details --}}
        {{-- <div class="col-12 px-0 mt-4">
                    <div class="row">
                        <div class="card rounded">
                            <div class="card-header px-2 py-3">
                                <h6>Shift Wise Details</h6>
                            </div>
                            <div class="row">
                                @foreach ($shiftWiseData as $shift)
                                @php
                                    $currentShiftData = $todayPunchData->where('check_in', '>=', $todaysDate.' '.$shift->from_time)->where('check_in', '<=', $todaysDate.' '.$shift->to_time)
                                    $currentShiftData = $todayPunchData->where( fn($item) => $item->user->shift_id == $shift->id )
                                @endphp

                                    <div class="col-md-6 col-lg-6 col-xl-6 box-col-6">
                                        <div class="card custom-card rounded">
                                            <h6 class="card-header rounded bg-primary py-2 px-3 text-center"> {{ ucwords($shift->name) }} Employees</h6>
                                            <div class="card-body p-3">
                                                <div class="row">
                                                    <div class="col-4 br-right text-center">
                                                        <h6 class="mb-0">Total</h6>
                                                        <strong style="font-size:22px"> <a href="{{ route('dashboard.shift-wise-employee', ['shift_id'=> Crypt::encrypt($shift->id)]) }}"> {{ $shift->employees_count }} </a> </strong> <br>
                                                    </div>
                                                    <div class="col-4 br-right  text-center">
                                                        <h6 class="mb-0">Present</h6>
                                                        <a href="{{ route('dashboard.shift-wise-employee', ['shift_id'=> Crypt::encrypt($shift->id)]) }}"> <strong style="font-size:22px; display:inline-block;">{{ $currentShiftData->count() }} </span><span style="font-size:14px; display:inline-block;">({{ $shift->employees_count ? round(($currentShiftData->count()/$shift->employees_count)*100) : '0' }}%)</strong></a> <br>
                                                    </div>
                                                    <div class="col-4  text-center">
                                                        <h6 class="mb-0">Absent</h6>
                                                        <a href="{{ route('dashboard.shift-wise-employee', ['shift_id'=> Crypt::encrypt($shift->id)]) }}"> <strong style="font-size:22px; display:inline-block;">{{ abs( $shift->employees_count-$currentShiftData->count() ) }} </span><span style="font-size:14px; display:inline-block;">({{ $shift->employees_count ? round(((($shift->employees_count-$currentShiftData->count() ))/$shift->employees_count)*100) : '0' }}%)</strong></a> <br>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer row">
                                                <div class="col-2 col-sm-2">
                                                    <h6 class="font-12">CL</h6>
                                                    <h3 class="font-16"><span class="counter">{{ $currentShiftData->where('leave_type_id', '6')->count() }}</span></h3>
                                                </div>
                                                <div class="col-2 col-sm-2">
                                                    <h6 class="font-12">EL</h6>
                                                    <h3 class="font-16"><span class="counter">{{ $currentShiftData->where('leave_type_id', '5')->count() }}</span></h3>
                                                </div>
                                                <div class="col-2 col-sm-2">
                                                    <h6 class="font-12">ML</h6>
                                                    <h3 class="font-16"><span class="counter">{{ $currentShiftData->where('leave_type_id', '7')->count() }}</span></h3>
                                                </div>
                                                <div class="col-3 col-sm-3">
                                                    <h6 class="font-12">OL</h6>
                                                    <h3 class="font-16"><span class="counter">{{ $currentShiftData->where('leave_type_id', '4')->count() }}</span></h3>
                                                </div>
                                                <div class="col-3 col-sm-3">
                                                    <h6 class="font-12">HDL</h6>
                                                    <h3 class="font-16"><span class="counter">{{ $currentShiftData->where('leave_type_id', '0')->count() }}</span></h3>
                                                </div>
                                            </div>
                                            <div class="card-footer row">
                                                @php
                                                    $beforeTime = $todayPunchData->where('check_in', '>=', Carbon\Carbon::parse($todaysDate.' '.$shift->from_time)->subHour()->toDateTimeString())->where('check_in', '<=', Carbon\Carbon::parse($todaysDate.' '.$shift->from_time)->toDateTimeString() )->count();
                                                    $afterTime = $todayPunchData->where('check_in', '<=', Carbon\Carbon::parse($todaysDate.' '.$shift->from_time)->addHour()->toDateTimeString())->where('check_in', '>=', Carbon\Carbon::parse($todaysDate.' '.$shift->from_time)->toDateTimeString() )->count();
                                                @endphp

                                                <div class="col-6 col-sm-6">
                                                    <h6 class="color-black">Before Time</h6>
                                                    <h3><span class="counter" style="font-size:20px">{{ $beforeTime }}</span><span style="font-size:12px">( {{ $currentShiftData->count() ? round(($beforeTime/$currentShiftData->count())*100) : '0' }}%)</span></h3>
                                                </div>
                                                <div class="col-6 col-sm-6">
                                                    <h6  class="color-black">After Time</h6>
                                                    <h3><span class="counter" style="font-size:20px">{{ ($afterTime) }}</span><span style="font-size:12px">({{ $currentShiftData->count() ? round(($afterTime/$currentShiftData->count())*100) : '0' }}%)</span></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}



        {{-- Office/Ward wise details --}}
        {{-- <div class="col-12 px-0">
                    @if ($is_admin && !request()->ward)
                        <div class="row">
                            <div class="card rounded">
                                <div class="card-header px-2 py-3">
                                    <h6>Office Wise Details</h6>
                                </div>
                                <div class="row">
                                    @foreach ($totalWards as $totalWard)
                                        @php
                                            $currentWardData = $todayPunchData->where( fn($item) => $item->user->ward_id == $totalWard->id );
                                        @endphp
                                        <div class="col-md-4 col-lg-4 col-xl-4 box-col-4">
                                            <div class="card custom-card rounded">
                                                <h6 class="card-header rounded bg-primary py-2 px-3  text-center"> {{ Str::limit(ucwords($totalWard->name), 25) }} Office</h6>
                                                <div class="card-body px-3">
                                                    <div class="row">
                                                        <div class="col-4 br-right text-center">
                                                            <h6 class="mb-0">Total</h6>
                                                            <strong style="font-size:22px">{{ $totalWard->users_count }} </strong> <br>
                                                        </div>
                                                        <div class="col-4 br-right text-center">
                                                            <h6 class="mb-0">Present</h6>
                                                            <strong style="font-size:22px; display:inline-block;">{{ $currentWardData->count() }} </span><span style="font-size:14px; display:inline-block;">({{ $totalWard->users_count ? round(($currentWardData->count()/$totalWard->users_count)*100) : '0' }}%)</strong> <br>
                                                        </div>
                                                        <div class="col-4 text-center">
                                                            <h6 class="mb-0">Absent</h6>
                                                            <strong style="font-size:22px; display:inline-block;">{{ abs( $totalWard->users_count-$currentWardData->count() ) }} </span><span style="font-size:14px; display:inline-block;">({{ $totalWard->users_count ? round(((($totalWard->users_count-$currentWardData->count() ))/$totalWard->users_count)*100) : '0' }}%)</strong> <br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer row">
                                                    <div class="col-12 col-sm-12">
                                                        <a href="{{ route('dashboard', ['ward'=> $totalWard->id]) }}" class="btn btn-primary color-green-blue font-12">CLICK HERE FOR MORE DETAILS</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div> --}}



    </div>

    </div>
    <!-- Container-fluid Ends-->
    </div>

    @push('scripts')
        <script>
            setInterval(function() {
                window.location.reload(1);
                // alert("Refreshed");
            }, 60000);
        </script>
    @endpush

</x-admin.admin-layout>
