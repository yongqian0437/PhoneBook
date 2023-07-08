var dealing = [
	"1. Be patient and understanding",
	"2. Maintain a calm and reassuring environment",
	"3. Establish a routine",
	"4. Use gentle and respectful touch",
	"5. Maintain good non-verbal communication",
	"6. Simplify choices",
	"7. Break tasks into manageable steps",
	"8. Avoid correcting or arguing",
	"9. Practice active listening",
	"10. Seek support and education",
];

var dealing_explanations = [
	"Show patience and understanding when dealing with the challenges of dementia.",
	"Create a calm and reassuring environment to help the person with dementia feel at ease.",
	"Establishing a consistent routine can provide structure and familiarity.",
	"Use gentle touch to convey love and reassurance, respecting the person's boundaries.",
	"Non-verbal cues like facial expressions and body language are important for communication.",
	"Simplify choices to prevent overwhelming the person with dementia.",
	"Break down tasks into smaller steps to make them more manageable.",
	"Avoid correcting or arguing, and focus on validating their feelings and experiences.",
	"Listen actively, show genuine interest, and respond empathetically.",
	"Seek support from dementia support groups and educational resources.",
];

if (last == 0) {
	var currentIndex = 0;
} else {
	var currentIndex = last - 1;
}

$(document).ready(function () {
	// Function to update the topic and explanation
	function updateContent(progress) {
		// Get the topic and explanation elements
		$("#contents").text(dealing[currentIndex]);
		$("#explanations").text(dealing_explanations[currentIndex]);

		// Hide or show the previous and next buttons based on the current index
		if (currentIndex === 0) {
			$("#previous_button").hide();
		} else {
			$("#previous_button").show();
		}

		if (currentIndex === dealing.length - 1) {
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
			url: base_url + "reading_corner_dealing/get_saved_progress",
			type: "GET",
			success: function (response) {
				var savedProgress = parseInt(response.progress);

				// Compare the current progress with the saved progress
				if (currentProgress > savedProgress) {
					// Only save the progress if it is larger than the saved progress
					$.ajax({
						url: base_url + "reading_corner_dealing/save_progress",
						type: "POST",
						data: { progress: currentProgress, stat: 1 },
						success: function (response) {
							console.log("Progress saved successfully");
						},
						error: function (xhr, status, error) {
							//console.error(error);
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
			url: base_url + "reading_corner_dealing/save_dealing_last",
			type: "POST",
			data: { last_progress: dealing[currentIndex] },
			success: function (response) {
				console.log("Dealing last saved successfully");
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
		if (currentIndex < dealing.length - 1) {
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
