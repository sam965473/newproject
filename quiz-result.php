<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Initialize an array to store the responses
    $responses = array();

    // Get the responses from the POST data
    $responses['question1'] = isset($_POST['question1']) ? $_POST['question1'] : '';
    $responses['question2'] = isset($_POST['question2']) ? $_POST['question2'] : '';

    // Open the file for writing (create it if it doesn't exist)
    $file = fopen('quiz_responses.txt', 'a');

    if ($file) {
        // Format the responses as a string and write them to the file
        $responseString = date('Y-m-d H:i:s') . "\n"; // Include a timestamp
        $responseString .= "Question 1: " . $responses['question1'] . "\n";
        $responseString .= "Question 2: " . $responses['question2'] . "\n";
        $responseString .= "-------------------------\n";

        fwrite($file, $responseString);

        // Close the file
        fclose($file);

        echo "Your responses have been recorded. Thank you!";
    } else {
        echo "Error: Unable to open the file for writing.";
    }
} else {
    echo "Error: This script should be accessed via a form submission.";
}
?>
