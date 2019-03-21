const express = require ('express');
const morgan = require ('morgan');
const app = express ();
const path = require('path');

const {mongoose} = require('./database');


// Settings
app.set('port', process.env.PORT||3000)

//Middlewares
app.use(morgan('dev'));
app.use(express.json());

// Routers

app.use('/appi/tasks',require('./routers/task.router'));
app.use('/appi/admin', require('./routers/administator.router'));
app.use('/appi/user', require('./routers/user.router'));
app.use('/appi/chat',require('./routers/chat.router'));
app.use('/appi/veh', require('./routers/vehicle.router'));
// Static files 
// console.log(path.join(__dirname,'public'));
app.use(express.static(path.join(__dirname,'public')));




//starting  the server 
app.listen (app.get('port'),()=>{
    console.log(`server on port ${app.get('port')}`);
    {
        useNewUrlparer: true
    }
})