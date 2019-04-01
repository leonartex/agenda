$(document).ready(function () {
    if (window.innerWidth >= 768) { $('#colapsa').toggleClass('active'); $('#lateral').collapse({ toggle: true }); }
    
    $('#colapsa').on('click', function () { $(this).toggleClass('active') });  
})