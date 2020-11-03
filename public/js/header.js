function openMenuBar(){
    document.getElementById("burgermenu").style.transform = "translateX(0%)";
    console.log('opened');
    document.getElementById("hidebar").style.display = "block";
}
function closeMenuBar(){
    document.getElementById("burgermenu").style.transform = "translateX(-105%)";
    document.getElementById("hidebar").style.display = "none";
}