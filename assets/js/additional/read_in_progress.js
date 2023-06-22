var symptoms = [
	"Memory loss",
	"Difficulty with language and communication",
	"Impaired judgment and decision-making",
	"Confusion and disorientation",
	"Difficulty with problem-solving and planning",
	"Changes in mood and personality",
	"Inability to recognize familiar faces or objects",
	"Poor coordination and motor skills",
	"Sleep disturbances",
	"Loss of initiative and motivation",
];

var explaination = [
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

$(document).ready(function () {
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

$(document).ready(function () {
	// Array index to keep track of the current topic
	var currentIndex = 0;

	// Function to update the topic and explanation
	function updateContent() {
		// Get the topic and explanation elements
		var topicElement = $("#topic");
		var explanationElement = $("#explaination");

		// Update the text content with the current topic and explanation
		topicElement.text(symptoms[currentIndex]);
		explanationElement.text(explaination[currentIndex]);
	}

	// Initial content update
	updateContent();

	// Navigation button click event for "Previous"
	$("#previous_button").click(function () {
		if (currentIndex > 0) {
			currentIndex--;
			updateContent();
		}
	});

	// Navigation button click event for "Next"
	$("#next_button").click(function () {
		if (currentIndex < symptoms.length - 1) {
			currentIndex++;
			updateContent();
		}
	});
});
