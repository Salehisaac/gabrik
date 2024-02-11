<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingSaleRequest;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Http\Requests\Admin\Market\CopanRequest;
use App\Models\Content\Copan;
use App\Models\Market\AmazingSale;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    public function copan()
    {
        $copans = Copan::all();
        return view('admin.market.discount.copon', compact('copans'));
    }

    public function copanCreate()
    {
        $users = User::all();
        return view('admin.market.discount.copon-create', compact('users'));
    }
    public function copanEdit(Copan $copan)
    {
        $users = User::all();
        return view('admin.market.discount.copon-edit', compact('users', 'copan'));
    }

    public function copanUpdate(CopanRequest $request, Copan $copan)
    {

        $inputs = $request->all();
        $realTimestamStart = substr($request->start_date, 0, 10);
        $realTimestamEnd = substr($request->end_date, 0, 10);
        if ($realTimestamStart > $realTimestamEnd)
        {
            return redirect()->route('admin.market.discount.amazingSaleCreate')->with('swal-error', 'زمان شروع نمیتواند از زمان پایان جلوتر باشد  ');
        }
        if ($inputs['type'] == 0)
        {
            $inputs['user_id'] = null;
        }
        $inputs['start_date'] = date("Y-m-d H:i:s" , (int)$realTimestamStart);
        $inputs['end_date'] = date("Y-m-d H:i:s" , (int)$realTimestamEnd);
        $copan->update($inputs);
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'کوپون جدید شما با موفقیت ویرایش شد  ');

    }

    public function copanStore(CopanRequest $request)
    {

        $inputs = $request->all();
        $realTimestamStart = substr($request->start_date, 0, 10);
        $realTimestamEnd = substr($request->end_date, 0, 10);
        if ($realTimestamStart > $realTimestamEnd)
        {
            return redirect()->route('admin.market.discount.amazingSaleCreate')->with('swal-error', 'زمان شروع نمیتواند از زمان پایان جلوتر باشد  ');
        }
        if ($inputs['type'] == 0)
        {
            $inputs['user_id'] = null;
        }
        $inputs['start_date'] = date("Y-m-d H:i:s" , (int)$realTimestamStart);
        $inputs['end_date'] = date("Y-m-d H:i:s" , (int)$realTimestamEnd);
        $copan = Copan::create($inputs);
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'کوپون جدید شما با موفقیت ثبت شد  ');

    }

    public function copanDestroy(Copan $copan)
    {
        $result = $copan->delete();
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'فروش شگفت انگیز شما با موفقیت حذف شد  ');
    }



    public function commonDiscount()
    {
        $commonDiscounts = CommonDiscount::all();
        return view('admin.market.discount.common', compact('commonDiscounts'));
    }

    public function commonDiscountCreate()
    {

        return view('admin.market.discount.common-create');
    }

    public function commonDiscountEdit(CommonDiscount $commonDiscount)
    {

        return view('admin.market.discount.common-edit', compact('commonDiscount'));
    }

    public function commonDiscountStore(CommonDiscountRequest $request)
    {
       $inputs = $request->all();
       $realTimestamStart = substr($request->start_date, 0, 10);
       $realTimestamEnd = substr($request->end_date, 0, 10);
       $inputs['start_date'] = date("Y-m-d H:i:s" , (int)$realTimestamStart);
       $inputs['end_date'] = date("Y-m-d H:i:s" , (int)$realTimestamEnd);
       $commonDiscount = CommonDiscount::create($inputs);
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف عمومی جدید شما با موفقیت ثبت شد  ');

    }

    public function commonDiscountUpdate(CommonDiscountRequest $request, CommonDiscount $commonDiscount)
    {
        $inputs = $request->all();
        $realTimestamStart = substr($request->start_date, 0, 10);
        $realTimestamEnd = substr($request->end_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s" , (int)$realTimestamStart);
        $inputs['end_date'] = date("Y-m-d H:i:s" , (int)$realTimestamEnd);
        $commonDiscount->update($inputs);
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف عمومی جدید شما با موفقیت ویرایش شد  ');

    }

    public function commonDiscountDestroy(CommonDiscount $commonDiscount)
    {
        $result = $commonDiscount->delete();
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف عمومی جدید شما با موفقیت حذف شد  ');
    }

    public function amazingSale()
    {
        $amazingSales = AmazingSale::all();
        return view('admin.market.discount.amazing', compact('amazingSales'));
    }

    public function amazingSaleEdit(AmazingSale $amazingSale)
    {
        $products = Product::all();
        return view('admin.market.discount.amazing-edit', compact('amazingSale', 'products'));
    }

    public function amazingSaleCreate()
    {
        $products = Product::all();
        return view('admin.market.discount.amazing-create', compact('products'));
    }

    public function amazingSaleStore(AmazingSaleRequest $request)
    {

        $inputs = $request->all();
        $realTimestamStart = substr($request->start_date, 0, 10);
        $realTimestamEnd = substr($request->end_date, 0, 10);
        if ($realTimestamStart > $realTimestamEnd)
        {
            return redirect()->route('admin.market.discount.amazingSaleCreate')->with('swal-error', 'زمان شروع نمیتواند از زمان پایان جلوتر باشد  ');
        }
        $inputs['start_date'] = date("Y-m-d H:i:s" , (int)$realTimestamStart);
        $inputs['end_date'] = date("Y-m-d H:i:s" , (int)$realTimestamEnd);
        $amazingSale = AmazingSale::create($inputs);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش شگفت انگیز جدید شما با موفقیت ثبت شد  ');

    }

    public function amazingSaleUpdate(AmazingSaleRequest $request, AmazingSale $amazingSale)
    {
        $inputs = $request->all();
        $realTimestamStart = substr($request->start_date, 0, 10);
        $realTimestamEnd = substr($request->end_date, 0, 10);
        if ($realTimestamStart > $realTimestamEnd)
        {
            return redirect()->route('admin.market.discount.amazingSaleEdit', $amazingSale->id)->with('swal-error', 'زمان شروع نمیتواند از زمان پایان جلوتر باشد  ');
        }
        $inputs['start_date'] = date("Y-m-d H:i:s" , (int)$realTimestamStart);
        $inputs['end_date'] = date("Y-m-d H:i:s" , (int)$realTimestamEnd);
        $amazingSale->update($inputs);
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش شگفت آنگیز شما با موفقیت ویرایش شد  ');

    }

    public function amazingSaleDestroy(AmazingSale $amazingSale)
    {
        $result = $amazingSale->delete();
        return redirect()->route('admin.market.discount.amazingSale')->with('swal-success', 'فروش شگفت انگیز شما با موفقیت حذف شد  ');
    }






}
