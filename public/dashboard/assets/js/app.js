$(".sideBar__link[data-sideBar-toggle|='articles']").click(function () {
    $("#articles").toggleClass("show");
})

$(".sideBar__link[data-sideBar-toggle|='users']").click(function () {
    $("#users").toggleClass("show");
})

$(".sideBar__link[data-sideBar-toggle|='articles']").click(function () {
    $(".arrow[data-arrow |='articles']").toggleClass("spring");
});
$(".sideBar__link[data-sideBar-toggle|='users']").click(function () {
    $(".arrow[data-arrow |='users']").toggleClass("spring");
});

// Hamburger Control
let hamburger = $('.hamburger');

hamburger.on('click', function() {
    $(this).toggleClass('active');
    $(this).toggleClass('not-active');

    $(".sideBar").toggleClass('mobile__sidebar__add');
    $(".sideBar").toggleClass('remove-sidebar');


});

// User Info dropdown control
let user__info = $('.user__info');

user__info.on('click',function () {
$('.user__info ul').toggleClass('show');
})

//mobile side bar
let mobile__sidebar__remove = $(".mobile__sidebar__remove");
mobile__sidebar__remove.on('click',function () {
$('.sideBar').removeClass('mobile__sidebar__add');
})

let show__mobile__sidebar = $('.show__mobile__sidebar');
show__mobile__sidebar.on('click',function () {
    $('.sideBar').addClass('mobile__sidebar__add');

})

