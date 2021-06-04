// jQuery short-hand for $(document).ready(function() {});
$(function () {
	$('.chat_table').DataTable({
		"lengthMenu": [3, 5, 10],
	  });
	  
	$('.chat_table tbody').on('click', 'td', function () {
	// change in view (selectVendor) ~
	chat_section(1);
	var receiver_id = $(this).attr('id');
	//alert(receiver_id);
	$('#receiver_id').val(receiver_id); // change in view (#ReciverId_txt) ~
	$('#receiver_name').html($(this).attr('title')); // change in view (#ReciverName_txt) ~
	get_chat_history(receiver_id); 

    // Allows user to send message by tapping the 'Enter' key
	$('#message').keypress(function (event) {
		var keycode = (event.keyCode ? event.keyCode : event.which);
		// keycode '13' refers to the 'Enter' key on the keyboard
		if (keycode == '13') {
			send_text($(this).val());
		}
	});

    // change in view (btnSend) ~
	$('.btn_send').click(function () {
		send_text($('#message').val());
		
	});
	
    // change in view and css (upload_attachmentfile) ~
	$('.upload_attachment').change(function () {

		display_message('<div class="spiner"><i class="fa fa-circle-o-notch fa-spin"></i></div>');
		scroll_down();

		var file_data = $('.upload_attachment').prop('files')[0];
		var receiver_id = $('#receiver_id').val();
		var form_data = new FormData();
		form_data.append('attachmentfile', file_data);
		form_data.append('type', 'Attachment');
		form_data.append('receiver_id', receiver_id);

		$.ajax({
			url: 'Chat/send_text_message', //chat-attachment/upload
			dataType: 'json',
			cache: false,
			contentType: false,
			processData: false,
			data: form_data,
			type: 'post',
			success: function (response) {
				$('.upload_attachment').val('');
				get_chat_history(receiver_id);
			},
			error: function (jqXHR, status, err) {
				// alert('Local error callback');
			}
		});
	});
	});

    // change in view (clear_chat) ~
	$('.clear_chat').click(function () { 
		var receiver_id = $('#receiver_id').val();
		//alert(receiver_id);
		$.ajax({
			//dataType : "json",
			url: 'Chat/clear_chat?receiver_id=' + receiver_id, //chat-clear?receiver_id=
			success: function (data) {
				//alert('sucess?');
				get_chat_history(receiver_id);
			},
			error: function (jqXHR, status, err) {
				//alert('Clear chat not working sia');
			}
		});
	});

});	// End of JQuery


function chat_section (status) {
	if (status == 0) {
		$('#chat_section :input').attr('disabled', true); // change in view (#chatSection)~
	} else {
		$('#chat_section :input').removeAttr('disabled');
	}
}
chat_section(0);

function scroll_down() {
	var elmnt = document.getElementById("content");
	var h = elmnt.scrollHeight;
	$('#content').animate({ scrollTop: h }, 1500);
}
window.onload = scroll_down();

// change in view (Sender_Name) and (Sender_ProfilePic) ~
function display_message(message) {
	var sender_name = $('#sender_name').val();
	var sender_pic = $('#sender_pic').val();

	var str = '<div class="direct-chat-msg right">';
	str += '<div class="direct-chat-info clearfix">';
	str += '<span class="direct-chat-name pull-right">' + sender_name;
	str += '</span><span class="direct-chat-timestamp pull-left"></span>'; //23 Jan 2:05 pm
	str += '</div><img class="direct-chat-img" src="' + sender_pic + '" alt="">';
	str += '<div class="direct-chat-text">' + message;
	str += '</div></div>';
	$('#dump_content').append(str); // change in view (#dumppy) ~
}

function send_text(message) {
	//alert(message);
	var text_message = message.trim();
	if (text_message != '') {
		//console.log(message);
		display_message(text_message);
		var receiver_id = $('#receiver_id').val();
		//alert(receiver_id); //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		$.ajax({
			dataType: "json",
			type: 'post',
			data: { text_message: text_message, receiver_id: receiver_id },

			url: 'Chat/send_text_message', //send-message , calls the controller method.. so issue is hereeee

			success: function (data) {
				get_chat_history(receiver_id)
			},
			error: function (jqXHR, status, err) {
				//alert('Local error callback');
			}
		});

		scroll_down();
		$('#message').val('');
		$('#message').focus();
	} 
    else {
		$('#message').focus();
	}
}

function get_chat_history(receiver_id) {
	$.ajax({
		//dataType : "json",
		url: 'Chat/get_chat_history?receiver_id=' + receiver_id, //get-chat-history-vendor?receiver_id=
		success: function (data) {
			$('#dump_content').html(data);
			scroll_down(); //comment this out if you want the chat to remain on the top and not scroll down.
		},
		error: function (jqXHR, status, err) {
			//alert('Local error callback');
		}
	});
}

setInterval(function () {
	var receiver_id = $('#receiver_id').val();
	if (receiver_id != '') { get_chat_history(receiver_id); }
}, 8000);