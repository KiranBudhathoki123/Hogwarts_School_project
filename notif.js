let notifBtn = document.querySelector('.notif');
let div = document.getElementById('notifications');

notifBtn.addEventListener("click", function() {
    if (div.style.display === 'none') {
        div.style.display = 'block';
    } else {
        div.style.display = 'none';
    }
    console.log(div.style.display);
});

function userRedirect(){
    window.location.href = "userMgmt.php";
}
function contentRedirect(){
    window.location.href = "cms.php";
}