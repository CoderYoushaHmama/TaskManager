var profile = document.getElementById('profile');
var profile_btn = document.getElementById('profile_btn');
var is_open = false;
var returns = document.getElementById('return');

profile_btn.addEventListener('click',()=>{
    if(!is_open){
        is_open = true;
        profile.style.animationName = 'open';
        profile.style.left = '0%';
    }else{

    }
});

returns.addEventListener('click',()=>{
    is_open = false;
    profile.style.animationName = 'close';
    profile.style.left = '-100%';
});
