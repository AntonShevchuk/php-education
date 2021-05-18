<?php

include_once 'template/header.php' ?>
    <div id="chat" style="overflow: auto;">
        <p><strong>@system</strong>: please wait, I try to connect to the server.</p>
    </div>

    <div class="navbar-fixed-bottom">
        <form id="form" action="">
            <input id="input" type="text" class="form-control" placeholder="Text input" style="width: 100%;"
                   maxlength="140" autocomplete="off">
        </form>
    </div>

    <!-- WebScokets -->
    <script>
        $(function () {
            let ws;
            let $chat = $('#chat');
            let $form = $('#form');
            let $input = $('#input');

            function wsConnect() {
                ws = new WebSocket("ws://seven.php.nixdev.co:1000/");
                ws.onopen = function () {
                    msg("connection is open");
                };
                ws.onclose = function () {
                    msg("the connection is closed, I try to reconnect");
                    setTimeout(wsConnect, 1000);
                };
                ws.onmessage = function (evt) {
                    msg(evt.data);
                    $chat.scrollTop($chat[0].scrollHeight);
                };
            }

            wsConnect();

            $form.submit(function () {
                ws.send($input.val());
                $input.val('');
                return false;
            });

            $chat.height($(window).height() - 80);
            $input.focus();

            function msg(message) {
                $chat.append("<p>" + message + "</p>");
            }
        });


    </script>

<?php
include_once 'template/footer.php' ?>