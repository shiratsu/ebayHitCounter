<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ebay\EbayApiHandle;


/**
 * EbayのAPIを叩いて処理するもの
 */
class EbayController extends Controller
{
    /**
     * 表示用ページ
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request) {

        return view('ebay.pageview')->with([
            'request' => null,
            'intHitCount' => null,
        ]);
    }

    /**
     * 対象の商品のpageviewをカウントする
     *
     * @param Request $request
     * @return void
     */
    public function countPageView(Request $request) {

        $objEbay = new EbayApiHandle();
        $aryReturn = $objEbay->getSingleItem($request->input('itemId'));
        logger($aryReturn);

        $intHitCount = 0;
        if(isset($aryReturn['Item']['HitCount'])){
            $intHitCount = $aryReturn['Item']['HitCount'];
        }
        
        return view('ebay.pageview')->with([
            'request' => $request->all(),
            'intHitCount' => $intHitCount,
        ]);
    }    

}
