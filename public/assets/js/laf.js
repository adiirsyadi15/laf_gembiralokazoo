// tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
// popover
$(function () {
  $('[data-toggle="popover"]').popover()
})
// tampil gambar modal
$(document).ready(function() {
	$('img').on('click', function() {
		$("#showImg").empty();
		var image = $(this).attr("src");
		$("#showImg").append("<img class='img-responsive' src='" + image + "' />")
		//alert(image);
		})
});

$(document).ready(function() {
	var checker = document.getElementById('setuju');
	var sendbtn = document.getElementById('simpandata');
	if (checker) {
		    checker.onchange = function(){
			if(this.checked){
			    sendbtn.disabled = false;
			} else {
			    sendbtn.disabled = true;
			}
		}
	}
});
