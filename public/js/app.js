// import './bootstrap';
const crossDiv = document.querySelector('.alert'),
crossBtn = document.querySelector('.alert i');
crossBtn.addEventListener('click', function (){
    crossDiv.remove();
});

setTimeout(() => {
    crossDiv.remove();
}, 10000);