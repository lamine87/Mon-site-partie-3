var container = document.getElementById('container');

var div = document.getElementById('div');

var image = document.createElement('img');
image.src = "/../img/icon/like.png";

photo.appendChild(image);


// var compter = $('<a>');
var counter = document.getElementById('counter');
var i=0;

image.addEventListener('click',
    function(evt){
        i = i+1
        counter.textContent =i;

    });


var container2 = document.getElementById('container2');

var div = document.getElementById('div');

var image = document.createElement('img');
image.src = "/../img/icon/dislike.png";

photo2.appendChild(image);



var counter2 = document.getElementById('counter');
var i=0;

image.addEventListener('click',
    function(evt){
        i = i-1
        counter.textContent =i;

    });




