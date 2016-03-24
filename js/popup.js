setTimeout(function(){  document.getElementById('myDialog_popup').open=true;  document.getElementById('close_button').addEventListener('click', for_close_button);
}, 3000);

function for_close_button() {
document.getElementById('myDialog_popup').style.display = 'none';
}