let dotts = document.getElementById('dotts');
let deleteBox = document.getElementById('delete-box');
dotts.addEventListener("click",function(){
    console.log("hey");
    if(deleteBox.style.display === 'none'){
        deleteBox.style.display = 'block';
    }
    else{
        deleteBox.style.display = 'none';
    }
})