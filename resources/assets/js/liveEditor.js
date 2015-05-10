
function liveEditor()
{
	var contentToUpload = {};
	var $token = $('meta[name="_token"]').attr('content');


	window.setInterval(sendContentUpdates, 3000);

	// 
	// load content into a queue to be saved to db via ajax
	// 
	function queueContentUpdates(id, content) {

		$susReportTextId = $('#' + id).attr('data-reporttext-id');

		input = {
			'id': $susReportTextId,
			'content': content.trim()
		};

		contentToUpload[counter] = input;
		counter++;
	}

	// 
	// send post request to save update
	// 
	function sendContentUpdates()
	{
		if ( Object.keys(contentToUpload).length === 0 )
		{
			return;
		} 

		$.ajax({
			type: "POST",
			dataType: 'json',
			headers: {'X-CSRF-Token': $token },
			url: url,
			data: contentToUpload,
			success: function(data) {
				contentToUpload = {};
			},
			error: function (xhr, ajaxOptions, thrownError) {
				console.log(xhr.status);
				console.log(thrownError);
			}
		});

		return; 
	}

	// 
	// initialize tinyMCE
	// 
	tinymce.init({
	    selector: "input.editable",
	    theme: 'modern',
	    skin: 'light',
	    inline: true,
	    plugins: [
	        "advlist autolink lists link image charmap print preview anchor",
	        "searchreplace visualblocks code fullscreen",
	        "insertdatetime media table contextmenu paste"
	    ],
	    toolbar: "undo redo | styleselect | bold italic | bullist numlist outdent indent | link image | emissions",

	}); //end init	




}