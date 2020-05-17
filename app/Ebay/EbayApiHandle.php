<?php

namespace App\Ebay;
use GuzzleHttp\Client;


/**
 * ebayのAPIを扱うクラス
 */
class EbayApiHandle{

    var $objClient = null;

    /**
     * コンストラクタ
     */
    public function __construct(){
        $this->objClient = new Client();
    }


    /**
     * ebayのAPIから値を取得
     *
     * @param [type] $itemId
     * @return mixed
     */
    public function getSingleItem($itemId){

        $response = $this->objClient->request('GET', 'https://open.api.ebay.com/shopping?callname=GetSingleItem&responseencoding=XML&appid='.env('EBAY_APP_ID').'&version=967&ItemID='.$itemId.'&IncludeSelector=Details');
       
        //200じゃない限りはnullを返す
        if($strStatusCode = $response->getStatusCode()){
            // 正常なら
            if($strStatusCode == 200){
                $xmlObject = simplexml_load_string($response->getBody()->getContents());
                $xmlArray = json_decode( json_encode( $xmlObject ), TRUE );
                return $xmlArray;
            }
            
        }
        return null;
    }
}