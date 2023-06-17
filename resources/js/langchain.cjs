require('dotenv').config();

const { OpenAI } = require('langchain/llms/openai');
const { BufferMemory } = require('langchain/memory');
const { ConversationChain } = require('langchain/chains');

const model = new OpenAI({ key: process.env.OPENAI_API_KEY });
const memory = new BufferMemory();
const chain = new ConversationChain({ llm: model, memory: memory });
const cors = require('cors');

const express = require('express');
const app = express();
app.use(cors());

app.use(express.json());

app.post('/chat', async (req, res) => {
    console.log(`Request body: ${JSON.stringify(req.body)}`);
    const result = await chain.call({ input: req.body.input });
    console.log(`API response: ${JSON.stringify(result)}`);
    res.send(result);
});

app.get('/healthcheck', (req, res) => {
    res.sendStatus(200);
  });


app.listen(3005, () => {
    console.log('Langchain server running');
});
