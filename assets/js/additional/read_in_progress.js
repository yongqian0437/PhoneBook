var symptoms = [
	"1. Memory loss",
	"2. Difficulty with language and communication",
	"3. Impaired judgment and decision-making",
	"4. Confusion and disorientation",
	"5. Difficulty with problem-solving and planning",
	"6. Changes in mood and personality",
	"7. Inability to recognize familiar faces or objects",
	"8. Poor coordination and motor skills",
	"9. Sleep disturbances",
	"10. Loss of initiative and motivation",
];

var symptoms_explanations = [
	"One of the most prominent symptoms of dementia is memory loss. This includes forgetting recent events or conversations, struggling to remember new information, and relying on memory aids or family members to recall important details.",
	"Individuals with dementia often experience challenges in finding the right words to express themselves. They may have trouble following conversations, repeating themselves frequently, or forgetting familiar words or phrases.",
	"Dementia can affect a person's ability to make sound judgments and decisions. They may exhibit poor judgment in financial matters, personal hygiene, or social situations, leading to inappropriate or risky behaviors.",
	"Dementia can cause individuals to become disoriented in time and place. They may have difficulty recognizing familiar surroundings or remembering where they are or how they got there. This can contribute to feelings of confusion, anxiety, and fear.",
	"People with dementia often struggle with complex tasks that require planning, organizing, and problem-solving. They may find it challenging to follow instructions, manage finances, or complete daily activities that involve multiple steps.",
	"Dementia can lead to significant changes in mood and behavior. Individuals may experience increased irritability, agitation, anxiety, or depression. They might exhibit uncharacteristic behaviors, such as apathy, social withdrawal, or loss of interest in previously enjoyed activities.",
	"Dementia can impair a person's ability to recognize familiar faces, including those of family members and close friends. They may also struggle to identify common objects, leading to confusion and frustration.",
	"As dementia progresses, individuals may have difficulty with coordination and motor skills. This can manifest as problems with balance, walking, or performing tasks that require fine motor skills, such as buttoning clothes or using utensils.",
	"Many individuals with dementia experience disruptions in their sleep patterns. They may have trouble falling asleep, staying asleep, or suffer from increased nighttime wakefulness. These sleep disturbances can further exacerbate other symptoms of dementia.",
	"Dementia can lead to a decline in initiative and motivation. Individuals may become passive, lose interest in their usual activities, and require constant prompting and encouragement to engage in daily tasks.",
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
		$("#contents").text(symptoms[currentIndex]);
		$("#explanations").text(symptoms_explanations[currentIndex]);

		// Hide or show the previous and next buttons based on the current index
		if (currentIndex === 0) {
			$("#previous_button").hide();
		} else {
			$("#previous_button").show();
		}

		if (currentIndex === symptoms.length - 1) {
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
			url: base_url + "reading_corner/get_saved_progress",
			type: "GET",
			success: function (response) {
				var savedProgress = parseInt(response.progress);

				// Compare the current progress with the saved progress
				if (currentProgress > savedProgress) {
					// Only save the progress if it is larger than the saved progress
					$.ajax({
						url: base_url + "reading_corner/save_progress",
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
			url: base_url + "reading_corner/save_symptoms_last",
			type: "POST",
			data: { last_progress: symptoms[currentIndex] },
			success: function (response) {
				console.log("Symptoms last saved successfully");
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
		if (currentIndex < symptoms.length - 1) {
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
