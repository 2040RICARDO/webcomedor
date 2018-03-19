var express = require('./public/node_modules/express');
var app = express();
var server = require('http').Server(app);
var io = require('./public/node_modules/socket.io').listen(server);

var serialport = require('./public/node_modules/serialport');
var Serialport = serialport.SerialPort;

var port    = process.env.PORT || 3000;


io.on('connection',function(socket){
	console.log("alguien se conecto");
});


var myPort = new Serialport("COM3", {
        baudrate: 9600,
        parser: serialport.parsers.readline("\n")
    });

myPort.on("open",onOpen);
myPort.on("data",onData);


function onOpen(){
	console.log("Arduino conectado");
}

function onData(dato){
	io.sockets.emit('leer',dato);
}

app.get('/',function(req,res){
	res.sendfile(__dirname+'/index.html');
});


server.listen(port, function () {
  console.log('puerto en escucha %d', port);
});
