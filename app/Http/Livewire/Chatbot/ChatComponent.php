<?php

namespace App\Http\Livewire\Chatbot;

use GuzzleHttp\Client;
use Livewire\Component;
use Amohamed\JSConnector\JSConnectorService;
use Amohamed\JSConnector\Facades\JSConnector;

class ChatComponent extends Component
{
    public $input;
    public $responses = [];

    public function prompt()
    {
        $response = JSConnector::post('chat', ['input' => $this->input]);

        // Check if the response is not null and has a 'response' key
        if ($response && isset($response['response'])) {
            // Add the response to the responses array
            $this->responses[] = $response['response'];
        } else {
            // In case there was an error and you didn't receive a valid response
            $this->responses[] = 'Unable to process request. Please try again later.';
        }

        $this->input = '';
    }



    public function render()
    {
        return view('livewire.chatbot.chat-component');
    }
}
