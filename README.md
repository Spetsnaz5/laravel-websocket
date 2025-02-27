
### Installation
```
php artisan install:broadcasting
```

### Running the Server
```
php artisan reverb:start
```

### URL範例
```
ws://127.0.0.1:{REVERB_SERVER_PORT}/app/{REVERB_APP_KEY}
```

### 測試介面
```
http://127.0.0.1/laravel_websocket/public/websocket
```

### 訂閱 
```
{
    "event": "pusher:subscribe",
    "data": {
        "channel": "test-channel"
    }
}
```

### 發送訊息
```
{
    "event": "client-message",
    "channel": "test-channel",
    "data": {
        "message": "Hello from Postman1235555"
    }
}
```

### 主要參數
| 參數  | 說明 |
|:-------------|:-------------:|
|event|事件名稱，例如 pusher:subscribe、pusher:unsubscribe、client-message
|channel|頻道名稱，例如 public-chat、private-chat.1
|data|事件附帶的數據，通常是 JSON 物件

### 內部事件
| 事件名稱  | 說明 |
|:-------------|:-------------:|
|pusher:subscribe|訂閱 WebSocket 頻道|
|pusher:unsubscribe|取消訂閱頻道|
|pusher:error|發生錯誤時伺服器回應|
|pusher:ping|WebSocket保持連線的 Ping|
|pusher:pong|伺服器回應 Ping|
|pusher:connection_established|連線成功|

### 其他
```
列出視窗
screen -ls

建立視窗
screen -S {screenName}

重新連接
screen -r {screenName}

退出
Ctrl + A，D

停止執行：
Ctrl + C

刪除視窗
Ctrl + A，K

顯示系統中所有運行中的進程
ps aux
```
