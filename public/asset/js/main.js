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
$(document).on("click", "#edit-destination", function() {
    let id = $(this).data('id');

    let name = $(this).data('name');

    let description = $(this).data('description');

    $("#destination_Id").val(id);
    $("#name").val(name);
    $('#description').val(description);
    $('#editModal').modal('show');



});
$(document).on("click", "#edit-tour", function() {
    let id = $(this).data('id');
    let country = $(this).data('country');
    let name = $(this).data('name');
    let hotel = $(this).data('hotel');
    let restaurant = $(this).data('restaurant');
    let description = $(this).data('description');
    let price = $(this).data('price');
    let image = $(this).data('image');

    $("#tour_Id").val(id)
    $("#name").val(name);
    $(".modal-body #hotel").val(hotel)
    $(".modal-body #restaurant").val(restaurant)
    $(".modal-body #description").val(description)
    $(".modal-body #price").val(price)
    $(".modal-body #image").val(image)
    $(".modal-body #country").val(country)
    $('#editModal').modal('show');



});
$(document).on("click", "#edit-restaurant", function() {
    let id = $(this).data('id');

    let name = $(this).data('name');
    let city = $(this).data('city');
    let country = $(this).data('country');
    let description = $(this).data('description');

    $("#city").val(city);
    $("#hotel_Id").val(id);
    $("#name").val(name);
    $("#country").val(country);
    $('#description').val(description);
    $('#editModal').modal('show');



});
$(document).on("click", "#edit-hotel", function() {
    let id = $(this).data('id');

    let name = $(this).data('name');
    let city = $(this).data('city');
    let country = $(this).data('country');
    let description = $(this).data('description');

    $("#city").val(city);
    $("#hotel_Id").val(id);
    $("#name").val(name);
    $("#country").val(country);
    $('#description').val(description);
    $('#editModal').modal('show');



});


