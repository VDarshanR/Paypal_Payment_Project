<?php
namespace Payment;
use Omnipay\Omnipay;
class Payment
{ 
   public function gateway()
   {
       $gateway = Omnipay::create('PayPal_Express');
       $gateway->setUsername("sb-7j4hl606677@personal.example.com");
       $gateway->setPassword("ARySNgUCvyU9tEBp-zsd0WbbNO_7Nxxxxoi3xxxxh2cTuDxRh7xxxxVu9W5ZkIBGYqjqfzHrjY3wta");
       $gateway->setSignature("EOEwezsNWMWQM63xxxxxknr8QLoAOoC6lD_-kFqjgKxxxxxwGWIvsJO6vP3syd10xspKbx7LgurYNt9");
       $gateway->setTestMode(true);
       return $gateway;
   }
   public function purchase(array $parameters)
   {
       $response = $this->gateway()
           ->purchase($parameters)
           ->send();
       return $response;
   }
   public function complete(array $parameters)
   {
       $response = $this->gateway()
           ->completePurchase($parameters)
           ->send();
       return $response;
   }
   public function formatAmount($amount)
   {
       return number_format($amount, 2, '.', '');
   }
   public function getCancelUrl($order = "")
   {
       return $this->route('http://phpstack-275615-1077014.cloudwaysapps.com/cancel.php', $order);
   }
   public function getReturnUrl($order = "")
   {
       return $this->route('http://phpstack-275615-1077014.cloudwaysapps.com/return.php', $order);
   }
   public function route($name, $params)
   {
       return $name;
   }
}