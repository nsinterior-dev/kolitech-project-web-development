// fixed navbar
var nav = document.querySelector(".border-one");
var sticky = nav.offsetTop;

window.addEventListener('scroll', function (){

    if (window.pageYOffset > sticky){
        nav.classList.add("sticky");

    }
    else {
        nav.classList.remove("sticky");
    }
})
// current for big-data

var dm = document.getElementById('data-management');
var dbm = document.getElementById('database-management');
var ml = document.getElementById('machine-learning');
var pr = document.getElementById('programming');


dm.addEventListener('click',function (){


    document.getElementById('one').style.display = 'flex';
    document.getElementById('two').style.display = 'none';
    document.getElementById('three').style.display = 'none';
    document.getElementById('four').style.display = 'none';
});
dbm.addEventListener('click',function (){

    document.getElementById('one').style.display = 'none';
    document.getElementById('two').style.display = 'flex';
    document.getElementById('three').style.display = 'none';
    document.getElementById('four').style.display = 'none';
});
ml.addEventListener('click',function (){

    document.getElementById('one').style.display = 'none';
    document.getElementById('two').style.display = 'none';
    document.getElementById('three').style.display = 'flex';
    document.getElementById('four').style.display = 'none';
});
pr.addEventListener('click',function (){

    document.getElementById('one').style.display = 'none';
    document.getElementById('two').style.display = 'none';
    document.getElementById('three').style.display = 'none';
    document.getElementById('four').style.display = 'flex';
});

