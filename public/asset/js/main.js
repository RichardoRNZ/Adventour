const profileMenu = document.getElementById("profilemenu");
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const plus = document.getElementById('plus');
const minus = document.getElementById('minus');
 quantity = document.getElementById('quantity');
var number = 1;
function ProfileMenu(){
    profileMenu.classList.toggle("open-menu");

}

function AddRightPanel()
{
    container.classList.add('right-panel-active');
}
function RemoveRightPanel()
{
    container.classList.remove('right-panel-active');
}
function IncreaseItem(){
    var number = quantity.value;
    if(number<=100){
        number++;
        quantity.value = number;
    }
}
function DecreaseItem(){
    var number = quantity.value;
    if(number>1)
    {
         number--;
         quantity.value  = number;
    }
}

