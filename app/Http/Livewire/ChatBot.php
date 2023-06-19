<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Amohamed\JSConnector\JSConnectorService;

class ChatBot extends Component
{
    public $input;
    public $responses = [];

    public function mount()
    {
        // Initialize the chatbot with a greeting message
        $this->responses[] = 'Hello, How can I help you?';
    }

    public function updatedInput()
    {
        // Send input to JSConnector and update responses
        $jsConnectorService = new JSConnectorService;
        $response = $jsConnectorService->post('chat', ['input' => $this->input]);

        if ($response && isset($response['response'])) {
            $this->responses[] = $response['response'];
        } else {
            $this->responses[] = 'Unable to process request. Please try again later.';
        }

        $this->input = '';
    }

    public function render()
    {
        return view('livewire.chat-bot');
    }
}
