// setTimeout to make the popup window appear after 3000 = 3 seconds. 
setTimeout(function(){
	
// make the window appear
document.getElementById('myDialog_popup').open=true;  

// make the close_button.png clickable and call the for_close_button function
document.getElementById('close_button').addEventListener('click', for_close_button);
}
, 3000);

//when you click the close button the dialog is closing
function for_close_button() {
document.getElementById('myDialog_popup').style.display = 'none';
}