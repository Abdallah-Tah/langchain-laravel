# Laravel LangChain Chat

The Laravel LangChain Chat project provides a simple and elegant way to integrate OpenAI's language models into your Laravel application using the LangChain JavaScript library and the Laravel JS Connector package. This allows you to create engaging and interactive AI-powered chat applications.

## Installation

Clone the project repository:

```bash
git clone https://github.com/user/laravel-langchain-chat
```

## Navigate into the project directory:

```bash
cd laravel-langchain-chat
```

Install the PHP dependencies:

```bash
composer install
```

Install the JavaScript dependencies:

```bash
npm install
```

Setup your environment file by copying the provided example:

```bash
cp .env.example .env
```

Then, update the JS_CONNECTOR_API_URL and OPENAI_API_KEY with the correct values.

## Generate an app key:

```bash
php artisan key:generate
```

## Install the Laravel JS Connector package:

```bash
composer require amohamed/jsconnector
```

## Publish the Laravel JS Connector config file:

```bash
php artisan vendor:publish --provider="Amohamed\JSConnector\JSConnectorServiceProvider" --tag="config"
```

## Usage

Start the Node.js server:

```bash
php artisan jsconnector:serve
```

Visit your application in a web browser.

Code Example
Here's how the Laravel application communicates with the LangChain JS service:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Amohamed\JSConnector\Facades\JSConnector;

class LangChainController extends Controller
{
    public function chat(Request $request)
    {
        $input = $request->input('message');

        // We use the post method on the JSConnector facade
        $response = JSConnector::post('chat', ['input' => $input]);

        // Then we return the response from the langchainjs service
        return response()->json(['response' => $response]);
    }
}
```

And here's how the Node.js server processes incoming requests:

```js
const { OpenAI } = require('langchain/llms/openai');
const { BufferMemory } = require('langchain/memory');
const { ConversationChain } = require('langchain/chains');
const cors = require('cors');
const express = require('express');

const model = new OpenAI({ key: process.env.OPENAI_API_KEY });
const memory = new BufferMemory();
const chain = new ConversationChain({ llm: model, memory: memory });

const app = express();
app.use(cors());
app.use(express.json());

app.post('/chat', async (req, res) => {
    const result = await chain.call({ input: req.body.input });
    res.send(result);
});

app.listen(3000, () => {
    console.log('LangChain server running on port 3000');
});
```

## Testing

Run the tests with:

```bash
vendor/bin/phpunit
```

## License

The Laravel LangChain Chat project is open-sourced software licensed under the MIT license.

Please make sure to update the examples and command instructions based on your actual codebase and project structure.
