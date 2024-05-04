curl http://localhost:8080/wp-json/subscription/test
curl -X POST http://localhost:8080/wp-json/subscription/order/123
curl -X POST http://localhost:8080/wp-json/subscription/payment -d "CustomField1=1&CustomField2=&CustomField3=&CustomField4=&MerchantID=2000132
&MerchantTradeNo=Test1510056539&PaymentDate=2017/11/02 16:22:18
&PaymentType=Credit_CreditCard&PaymentTypeChargeFee=1&RtnCode=1&RtnMsg=交易成功&SimulatePaid=0&StoreID=&TradeAmt=100&TradeDate=2017/11/07 20:08:59&TradeNo=17110720085960236789
&CheckMacValue=9139AF2AC5D0F9EBC5F3CD44064F666AAA62F0B202B95B341CC25E080EA4FC6E"
curl -X POST http://localhost:8080/wp-json/subscription/period/123