<div class="bg-gray-50 px-4 py-6 sm:px-6 lg:px-8">
    <div class="chat-window overflow-auto bg-white border border-gray-200 rounded-lg p-4 space-y-4" style="height: 400px;">
        @foreach($responses as $index => $response)
            @if($index % 2 == 0)
                <div class="chat-response text-right">
                    <div class="inline-block bg-blue-600 text-white rounded py-2 px-3 text-sm">{{ $response }}</div>
                </div>
            @else
                <div class="chat-response">
                    <div class="inline-block bg-gray-300 text-gray-700 rounded py-2 px-3 text-sm">{{ $response }}</div>
                </div>
            @endif
        @endforeach
        <div id="end"></div>
    </div>

    <form wire:submit.prevent="updatedInput" class="mt-4">
        <div class="flex items-center">
            <input type="text" wire:model="input" class="w-full rounded-l-lg p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-200 bg-white" placeholder="Type your message here...">
            <button type="submit" class="px-8 rounded-r-lg bg-blue-600 text-white font-bold p-4 uppercase border-blue-600 border-t border-b border-r">Send</button>
        </div>
    </form>
</div>

<script>
    window.addEventListener('livewire:load', function () {
        var objDiv = document.getElementById("end");
        objDiv.scrollIntoView();
    })
    Livewire.on('messageAdded', () => {
        var objDiv = document.getElementById("end");
        objDiv.scrollIntoView();
    })
</script>
