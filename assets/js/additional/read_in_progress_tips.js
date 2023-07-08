var tips = [
	"1. Use simple and clear language",
	"2. Maintain eye contact and non-verbal cues",
	"3. Speak slowly and calmly",
	"4. Give one instruction at a time",
	"5. Use visual aids and gestures",
	"6. Be patient and allow extra time",
	"7. Avoid arguing or correcting",
	"8. Listen actively",
	"9. Use reminiscence therapy",
	"10. Adapt to their communication style",
];

var tips_explanations = [
	"Speak in short sentences and use simple words to ensure understanding.",
	"Establish eye contact and use facial expressions and gestures to enhance communication.",
	"Speak at a moderate pace, allowing time for processing and response.",
	"Break down tasks and instructions into simple steps.",
	"Incorporate visual aids and gestures to aid comprehension.",
	"Practice patience and avoid rushing or interrupting.",
	"Avoid arguments or corrections, focus on maintaining a positive conversation.",
	"Give your full attention, show interest, and respond appropriately.",
	"Encourage conversations that involve reminiscing about the past.",
	"Adapt to the person's unique communication style and understand their intended meaning.",
];

if (last == 0) {
	var currentIndex = 0;
} else {
	var currentIndex = last - 1;
}

$(document).ready(function () {
	// Array index to keep track of the current topic

	// Function to update the topic and explanation
	function updateContent(progress) {
		// Get the topic and explanation elements
		$("#contents").text(tips[currentIndex]);
		$("#explanations").text(tips_explanations[currentIndex]);

		// Hide or show the previous and next buttons based on the current index
		if (currentIndex === 0) {
			$("#previous_button").hide();
		} else {
			$("#previous_button").show();
		}

		if (currentIndex === tips.length - 1) {
			$("#next_button").hide();
		} else {
			$("#next_button").show();
		}
	}

	// Function to save the progress to the database
	function saveProgress() {
		var currentProgress = currentIndex + 1;
		// Retrieve the saved progress from the database
		$.ajax({
			url: base_url + "reading_corner_tips/get_saved_progress",
			type: "GET",
			success: function (response) {
				var savedProgress = parseInt(response.progress);

				// Compare the current progress with the saved progress
				if (currentProgress > savedProgress) {
					// Only save the progress if it is larger than the saved progress
					$.ajax({
						url: base_url + "reading_corner_tips/save_progress",
						type: "POST",
						data: { progress: currentProgress, stat: 1 },
						success: function (response) {
							console.log("Progress saved successfully");
						},
						error: function (xhr, status, error) {
							console.error(error);
						},
					});
				}
			},
			error: function (xhr, status, error) {
				console.error(error);
			},
		});
		// Save the current content to the symptoms_last field
		$.ajax({
			url: base_url + "reading_corner_tips/save_tips_last",
			type: "POST",
			data: { last_progress: tips[currentIndex] },
			success: function (response) {
				console.log("Tips last saved successfully");
			},
			error: function (xhr, status, error) {
				console.error(error);
			},
		});
	}

	// Initial content update
	updateContent(currentIndex);

	// Navigation button click event for "Previous"
	$("#previous_button").click(function () {
		if (currentIndex > 0) {
			currentIndex--;
			updateContent();
			saveProgress();
		}
	});

	// Navigation button click event for "Next"
	$("#next_button").click(function () {
		if (currentIndex < tips.length - 1) {
			currentIndex++;
			updateContent();
			saveProgress();
		}
	});

	// Navigation button click event for "Leave"
	$("#leave_button").click(function () {
		Swal.fire({
			text: "Are you sure you want leave?",
			icon: "question",
			showCancelButton: true,
			confirmButtonColor: "#1cc88a",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes",
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = base_url + "reading_corner";
			}
		});
	});
});
