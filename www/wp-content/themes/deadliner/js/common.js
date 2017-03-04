$(document).ready(function() {
	$("#form_1").submit(function() {
		$.ajax({
			type: "POST",
			url: "wp-content/themes/deadliner/modules/mail.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			 window.location.href = "#close"
			 window.location.href = "#sendwell"
			$("#form_1").trigger("reset");
		});
		return false;
	});
	$(".fw_form_fw_form").submit(function() {
		$.ajax({
			type: "POST",
			url: "wp-content/themes/deadliner/modules/mail_2.php",
			data: $(this).serialize()
		}).done(function() {
			$(this).find("input").val("");
			 window.location.href = "#close"
			 window.location.href = "#sendwell"
			$(".fw_form_fw_form").trigger("reset");
		});
		return false;
	});
});