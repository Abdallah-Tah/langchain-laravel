<div class="flex flex-col h-screen justify-between">
    <div class="overflow-auto p-6 space-y-4">
      @foreach($responses as $response)
        <div class="flex items-start justify-end space-x-2">
          <div class="w-12 h-12 bg-blue-500 rounded-full"></div>
          <div class="bg-blue-500 text-white p-4 rounded-l-lg">
            <p class="font-semibold">User</p>
            <p>{!! nl2br(e($response)) !!}</p>
          </div>
        </div>
        <div class="flex items-start space-x-2">
          <div class="bg-gray-200 p-4 rounded-r-lg">
            <p class="font-semibold">Assistant</p>
            <p>Response from your AI...</p>
          </div>
          <div class="w-12 h-12 bg-gray-300 rounded-full"></div>
        </div>
      @endforeach
    </div>
    <form wire:submit.prevent="prompt" class="flex-none p-6">
      <div class="flex space-x-4">
        <input type="text" placeholder="Enter your message here" wire:model="input" class="w-full p-4 rounded border-gray-300"/>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Send
        </button>
      </div>
    </form>
  </div>

  <script>
    document.addEventListener("livewire:load", function() {
      Livewire.hook('element.updated', (message, component) => {
        let chatbox = document.querySelector('.overflow-auto');
        chatbox.scrollTop = chatbox.scrollHeight;
      });
    });
  </script>
