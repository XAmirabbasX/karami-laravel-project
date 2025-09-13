<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceAdminRequest;
use App\Models\Admin;
use App\Models\Orders;
use App\Models\Otp;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Morilog\Jalali\Jalalian;

class AdminController extends Controller
{
    public function changeStatus(string $id){
        $admin = Admin::where('id', $id)->first();
        $admin->status = ($admin->status == 'active' ? 'inactive' : 'active');
        if ($admin->save()){
            toastr('وضعیت عوض شد');
            return redirect()->back();
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // chart1
        $successOrder = 0;
        $failedOrder = 0;
        $orders = Orders::all();
        foreach ($orders as $order){
            if($order->status == 'failed'){
                $failedOrder++;
            }else{
                $successOrder++;
            }
        }
        $chart = (new LarapexChart)->setTitle('گزارش هایی از پرداخت ها') ->setDataset([$successOrder, $failedOrder]) ->setLabels(['پرداخت های موفق', 'پرداخت های ناموفق']);

        //chart2
        $successLogin = 0;
        $failedLogin = 0;
        $otps = Otp::all();
        foreach ($otps as $otp){
            if($otp->used == 0){
                $failedLogin++;
            }else{
                $successLogin++;
            }
        }
        $chart2 = (new LarapexChart)->setTitle('گزارش هایی از ورود های موفق و ناموفق') ->setDataset([$successLogin, $failedLogin]) ->setLabels(['ورود های موفق', 'ورود های ناموفق']);

        //chart3
        // نام ماه‌های شمسی برای محور X نمودار
        $months = [
            'فروردین', 'اردیبهشت', 'خرداد', 'تیر',
            'مرداد', 'شهریور', 'مهر', 'آبان',
            'آذر', 'دی', 'بهمن', 'اسفند'
        ];

// آرایه‌ای که مجموع فروش هر ماه را نگهداری می‌کند
        $salesPerMonth = [];

// سال شمسی جاری (مثلاً 1403)
        $year = jdate()->getYear();

// حلقه برای هر 12 ماه شمسی
        for ($month = 1; $month <= 12; $month++) {

            // تعیین تعداد روزهای هر ماه شمسی (سادۀ معمول)
            // 1-6 => 31 روز, 7-11 => 30 روز, 12 => 29 روز (کبیسه باید جدا بررسی شود)
            if ($month <= 6) {
                $days = 31;
            } elseif ($month <= 11) {
                $days = 30;
            } else {
                $days = 29; // در صورت نیاز می‌توان کبیسه را دقیق‌تر محاسبه کرد
            }

            // ساختن تاریخ شروع ماه (شمسی) و تبدیل به Carbon با شروع روز (00:00:00)
            $start = Jalalian::fromFormat('Y-n-j', "$year-$month-1")
                ->toCarbon()
                ->startOfDay();

            // ساختن تاریخ پایان ماه (شمسی) و تبدیل به Carbon با پایان روز (23:59:59)
            $end = Jalalian::fromFormat('Y-n-j', "$year-$month-$days")
                ->toCarbon()
                ->endOfDay();

            // محاسبه مجموع فروش:
            // - فقط سفارش‌هایی که وضعیت‌شون 'success' هست (در پروژه‌ی شما ممکنه نام وضعیت فرق کنه)
            // - فیلتر بر اساس created_at بین شروع و پایان ماه
            $sum = Orders::where('status', 'paid')
                ->whereBetween('created_at', [$start, $end])
                ->sum('total_amount');

            // اضافه کردن مقدار ماه به آرایه‌ی نتایج
            $salesPerMonth[] = $sum;
            // ساخت نمودار میله‌ای با LarapexChart
            $chart3 = (new LarapexChart)->setType('bar')
                ->setTitle("مجموع فروش ماهانه سال $year")
                ->setXAxis($months)
                ->setDataset([
                    [
                        'name' => 'فروش (تومان)',
                        'data' => $salesPerMonth
                    ]
                ]);
        }
        return view('admin.index', compact('chart', 'chart2', 'chart3'));
    }
    public function showAdmins(){
        if (session('admin')['level'][10]==1){
            $admins = Admin::all();
            return view('admin.manageAdmin', compact('admins'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (session('admin')['level'][9]==1){
            return view('admin.createAdmin');
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResourceAdminRequest $request)
    {
        $level = implode($request->only(['add-brand-access', 'manage-brand-access', 'edit-brand-access', 'add-category-access', 'manage-category-access', 'edit-category-access', 'add-product-access', 'manage-product-access', 'edit-product-access', 'add-admin-access', 'manage-admin-access', 'edit-admin-access']));
        $result = Admin::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
            'level' => $level,
        ]);
        if($result){
            toastr()->success('ثبت با موفقیت');
            return redirect()->back();
        }else{
            toastr()->error('ثبت ناموفق');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (session('admin')['level'][11]==1){
            $admin = Admin::where('id', $id)->first();
            return view('admin.editAdmin', compact('admin'));
        }else{
            return view('admin.dontHaveAccess');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        $level = implode($request->only(['add-brand-access', 'manage-brand-access', 'edit-brand-access', 'add-category-access', 'manage-category-access', 'edit-category-access', 'add-product-access', 'manage-product-access', 'edit-product-access', 'add-admin-access', 'manage-admin-access', 'edit-admin-access']));
        $admin = Admin::find($id);
        $admin->name = $request['name'];
        $admin->lastname = $request['lastname'];
        $admin->email = $request['email'];
        $admin->phone = $request['phone'];
        $admin->level = $level;
        if ($admin->save()){
            toastr()->success('ویرایش موفق');
            return redirect()->back();
        }else{
            toastr()->error('ویرایش ناموفق');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
    }
}
