#Overview
Since this project is still in rapid development, I don't want to be too thorough in the documentation. When the code is in a more stable form I will get to work re-writing this. 

####A very simple explanation of the way that this software works technically:

When the 'submit' button is clicked the application logic is started.

When the user clicks the 'submit' button we retrieve the values of all of our options with jQuery selectors.

One of the first steps that this software takes is to send off a request for our word bank. This is the word bank that the user selected with the 'WORD LIST'. We need to get this first because we will use this list to decide HOW MANY places we will look for files or directories, as well as WHERE we will look. 

We then set an interval based on the 'INTERVAL:' value retrieved from the options. Now, at the specified interval we will send a request for to the PHP files called '````seeker.php````'. 

This file simply sends a cURL request for the headers of our target server (with the current test file or directory appended) and returns them to our javascript. 

Before the '````seeker.php````' file returns a response it will also check if our response does fall into the category we have selected (i.e. NOT 404) it will be filtered out and show up as a symbol instead of a verbose result. 

If the response does fit into out selected category, it will be returned to the JS as a full header as a text string. 

Regardless of the result, it will be appended as text to our main application when it is returned. 

