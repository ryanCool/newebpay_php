# README.md

API Doc
https://www.newebpay.com/website/Page/download_file?name=Online%20Payment-Foreground%20Scenario%20API%20Specification_NDNF-1.0.6.pdf

## 藍新支付

這個PHP腳本用於將支付閘道集成到您的應用程序中。它使用NewebPay的支付閘道，並生成一個加密的支付請求表單，該表單將提交到NewebPay的閘道URL。

### 如何使用此腳本

該腳本設計用於包含在您的PHP服務端代碼中。腳本期望在傳入請求中獲得某些GET參數：

- `order_no`: 唯一的訂單號碼
- `amt`: 商品金額
- `email`: 從url參數設置郵箱

例如，您可以通過如下URL發送請求：http://localhost:8080?order_no=itsorderno&amt=100&email=rex78715@gmail.com

此腳本將接收這些參數，並將其加入到要發送到支付閘道的表單中。表單中的所有數據都會被加密並經過哈希處理以確保安全性。

注意：此腳本中的 `$key`、`$iv` 以及 `$mid` 需要您自行替換為您的金鑰，iv和商家ID。

當此腳本被執行時，它會生成一個表單並自動提交到NewebPay的支付閘道。

請根據你的需要調整代碼中的 `NotifyURL` 和 `ReturnURL`，這兩個URL分別為支付成功後的回調地址和返回地址。
