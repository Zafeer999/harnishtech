<?php

namespace App\Http\Controllers\Admin\Masters;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Masters\UpdateWebsiteSettingRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class VariableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $isServiceChargeEnable = config('setting_data.IS_SERVICE_CHARGE_ENABLE');
        $serviceCharge = config('setting_data.SERVICE_CHARGE');
        $isGstEnable = config('setting_data.IS_GST_ENABLE');
        $gstPercentage = config('setting_data.GST_PERCENTAGE');
        $scheduleSameDayIfBookedBefore = config('setting_data.SCHEDLE_TODAY_IF_TIME_BEFORE');
        $scheduleSameDayIfBookedBefore = Carbon::createFromTime($scheduleSameDayIfBookedBefore, '00');
        $maxDiscountPercent = config('setting_data.MAX_DISCOUNT_PERCENT');
        $headerLogo = config('setting_data.HEADER_LOGO');

        return view('admin.masters.variables', compact('isServiceChargeEnable', 'serviceCharge', 'isGstEnable', 'gstPercentage', 'scheduleSameDayIfBookedBefore', 'maxDiscountPercent', 'headerLogo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateWebsiteSettingRequest $request)
    {
        try
        {
            $this->updateConfigValue("IS_SERVICE_CHARGE_ENABLE", $request->is_service_charge_enable);
            $this->updateConfigValue("SERVICE_CHARGE", $request->service_charge);
            $this->updateConfigValue("IS_GST_ENABLE", $request->is_gst_enable);
            $this->updateConfigValue("GST_PERCENTAGE", $request->gst_percentage);
            $this->updateConfigValue("SCHEDLE_TODAY_IF_TIME_BEFORE", substr($request->schedule_same_day_if_booked_before, 0, 2));
            $this->updateConfigValue("MAX_DISCOUNT_PERCENT", $request->max_discount_percent);
            $this->updateConfigValue("FOOTER_ADDRESS", $request->footer_address);
            $this->updateConfigValue("FOOTER_PHONE", $request->footer_phone);
            $this->updateConfigValue("FOOTER_HOURS", $request->footer_hours);
            if($request->header_logo)
            {
                if (File::exists(public_path('\\') . config('setting_data.HEADER_LOGO'))) {
                    File::delete(public_path('\\') . config('setting_data.HEADER_LOGO'));
                }
                $path = 'storage/' . $request->header_logo->store('logo', 'public');
                $this->updateConfigValue("HEADER_LOGO", $path);
            }

            return response()->json(['success' => 'Settings updated successfully!']);
        }
        catch (\Exception $e)
        {
            return $this->respondWithAjax($e, 'updating', 'Settings');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    function updateConfigValue($key, $newValue)
    {
        $path = config_path('setting_data.php');

        if (File::exists($path)) {
            $configArray = include $path;

            if (array_key_exists($key, $configArray)) {
                $configArray[$key] = $newValue;

                $newConfigContent = '<?php return ' . var_export($configArray, true) . ';' . PHP_EOL;

                File::put($path, $newConfigContent);
            }
        }
    }
}
