const express = require('express')
const app = express()
const port = 3000

app.get('/', (req, res) => {
    res.send('hola mundo!')
})

app.listen(port,()=>{
    console.log(`Ejemplo de aplicacion escuchando en https://localhost:${port}`)
})