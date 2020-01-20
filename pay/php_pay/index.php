<?php
class Index{
  public function index(){
    header ( 'content-Type: text/html; charset=utf-8' );
    include_once './lib/WxPay.Api.php';
    $input = new \WxPayUnifiedOrder();
    //设置商品描述
    $input -> SetBody('测试商品');
    //设置订单号
    $input -> SetOut_trade_no(date('YmdHis'));
    //设置订单金额(单位：分)
    $input -> SetTotal_fee('1');
    //设置异步通知地址
    $input -> SetNotify_url('http://www.php.wx/index.php/index/Notify/index');
    //设置交易类型
    $input -> SetTrade_type('NATIVE');
    //设置商品id
    $input -> SetProduct_id('123456780');
    $result = WxPayApi::unifiedOrder(1,array(),$input);
    var_dump($input);
    var_dump($result);
    //
  }
}
$index = new Index();




 ?>
