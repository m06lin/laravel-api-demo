# Demo
Laravel API範例

目的:
- 開立API
- 安裝套件ixudra/curl(https://github.com/ixudra/curl)
- 使用curl串接API、設置Header、紀錄Log
- 將串接API所需連線設定寫成config檔，並可於.env修改
- 建立ServiceProvide，將config和API註冊綁定

功能:

API串接在席取車位資訊

- /demo/api/maps/list
1. 於ServiceProvide，將config和API註冊綁定
2. 串接API拆出由另一隻APIService處理，達到與Controller分開邏輯

- /demo/api/maps/list2
簡易寫法，直接於controller使用curl做完介接
