<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">

    <div class="row">
        <div class="col-3">
            <input type="text" class="form-control" id="message">
        </div>
        <div class="col-3">
            <button type="button" class="btn btn-secondary" onclick="sendMessage()">送出</button>
        </div>
        <div class="col-6">
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <textarea class="form-control" id="chat" rows="100"></textarea>
        </div>
    </div>

    <script>
        // 設定 WebSocket 連線
        const ws = new WebSocket('ws://127.0.0.1:6002/app/3ore8imnjtxikbarw5re');

        // 連線開啟
        ws.onopen = function() {
            console.log('✅ WebSocket 已連線');

            // 訂閱頻道 (Public Channel)
            const subscribePayload = {
                event: "pusher:subscribe", 
                data: {
                    channel: "test-channel"
                }
            };
            ws.send(JSON.stringify(subscribePayload));

            console.log('📡 訂閱 test-channel 成功');
        };

        // 接收訊息
        ws.onmessage = function(event) {
            const data = JSON.parse(event.data);
            console.log('📩 收到訊息:', data);

            if (typeof data.data !== 'undefined' && typeof data.data.message !== 'undefined') {
                $('#chat').val(
                        $('#chat').val() + `\n ${data.data.message}`
                    );
            }
        };

        // 連線關閉
        ws.onclose = function() {
            console.log('❌ WebSocket 連線已關閉');
        };

        // 發送自訂訊息
        function sendMessage() {

            const payload = {
                event: "client-message", 
                channel: "test-channel", 
                data: {
                    message: $('#message').val()
                }
            };
            
            ws.send(JSON.stringify(payload));
            console.log('📤 已發送訊息:', payload);
        }

    </script>
</body>
</html>
