<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <style>
        .chat-bubble {
            position: fixed;
            bottom: 4rem;
            right: 4rem;
            z-index: 50;
            width: 4rem;
            height: 4rem;
            border-radius: 50%;
            background-color: #0054d4;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .chat-widget {
            position: fixed;
            bottom: 0;
            right: 0;
            z-index: 50;
            width: 30rem;
            max-width: 90%;
            height: 40rem;
            background-color: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            border-radius: 0.5rem 0.5rem 0 0;
            overflow: hidden;
            display: none;
        }

        .chat-header {
            padding: 1rem;
            background-color: #0054d4;
            color: #fff;
            font-weight: bold;
        }

        .chat-content {
            height: 26rem;
            padding: 1rem;
            overflow-y: auto;
        }

        .chat-input {
            padding: 1rem;
            border-top: 1px solid #ddd;
            background-color: #f8f8f8;
        }

        /* Media query for mobile devices */
        @media (max-width: 640px) {
            .chat-widget {
                width: 100%;
            }
        }
    </style>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div id="chat-bubble" class="chat-bubble">
            <i class="fas fa-comment-dots text-xl"></i>
        </div>

        <div id="chat-widget" class="chat-widget">
            <div class="chat-header">
                Chat with our AI
            </div>
            <div class="chat-content">
                <!-- Chat goes here -->
                <livewire:chat-bot />
            </div>
            <div class="chat-input">
                <!-- Chat input goes here -->
            </div>
        </div>

        <script>
            var chatBubble = document.getElementById('chat-bubble');
            var chatWidget = document.getElementById('chat-widget');

            chatBubble.addEventListener('click', function () {
                if (chatWidget.style.display === 'none') {
                    chatWidget.style.display = 'block';
                } else {
                    chatWidget.style.display = 'none';
                }
            });
        </script>
        <script type="module">
            import Chatbot from "https://cdn.jsdelivr.net/npm/flowise-embed/dist/web.js"
            Chatbot.init({
                chatflowid: "1a199359-9ccf-4239-b30d-4ab2c1fdb024",
                apiHost: "http://localhost:3000",
            })
        </script>
    </div>
</x-app-layout>
