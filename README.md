# URS
Universal Resource Seeker, a web server security audit tool meant to find unindexed files and directories. 

##What exactly does this do?

A site map will tell you about every page, file or directory that is linked to from another page or directory on that site. However, if a file, page or directory is not linked to anywhere on the site or anywhere else on the web for that matter, it may not be visible to search engines or visitors to a site. 

That does not mean that this information is  hidden or secure in any way. Still, all too often, you will find developers leaving vulnerable files such as insecure unfinished code, login screens or even confidential information in publicly accessible areas of their server. 

This software uses a library of word banks containing thousands of common file names and directories to automate the process of checking for vulnerable files on your server. 

##Setup:
To get this running on your server, just clone it. No additional setup is needed. However, this does require PHP and cURL. Due to the nature of this software you may wish to implement some additional security measures such as an IP white-list. 

##Options:

Here I will list the options in the order they are currently presented in the UI from top right to bottom left. 

####BASE URL:
This is the URL that you want to scan. It should always start with a protocol such as TEST. It should ALWAYS end in a trailing slash.

````http://mzero.space/```` OK

````https://www.google.com/```` OK

````https://www.google.com```` NOT OK

````www.google.com/```` NOT OK

````https://www.google.com```` NOT OK

####WORD LIST:
Select which word list you would like to use for your search. Some lists search just for directories, some search just for files and some for both. The name of the word list should be pretty self explanatory and is also indicative of the relative path and file name of the word list. At the end of the options, there is a link to look at the ````word_bank```` directory. Use this if you want to read through or edit the raw word lists.

####SHOW:
Show 'NOT 404' will show any link that is not a 404, this includes redirects and files or directories with forbidden access. 

Show 'ONLY 200' will show only files that are reporting a 200 status code. This should limit your search to only files that currently exist and are accessible to you. 

Show 'SHOW ALL' will show every single attempt made on the server, this is the most verbose of the options. This will show even files with no result on the server whatsoever. 

####SEARCH FOR:
You will probably want to leave this at it's default value unless you want to look for files of a specific type or files that are not listed with an extension on any word list.  Setting this to 'ONLY FILES OF TYPE' will allow you to use the 'FILE TYPE' input area to specify a file type that you want to search for. This input should be in the form of a file type extension including the dot. For example: '.PHP'.

####FILE TYPE:
See 'SEARCH FOR:' above for info on how to use this option. 

####INTERVAL: 
The interval with which we should send off our requests to the target server. This is measured in milliseconds so the lower the number the faster the requests will send and the sooner your scan with complete. Setting this number too low can lead to issues with your browser, server or the target server. Sending too frequent a request to a target server may also be seen as an attack.   

####SUBMIT:
Do you really need to know what this does? If you do, it will start the application. 

####EXPORT LIST:
Creates a text box with some specs about out scan and a CSV generated based off our current results. Use this to save your data. 



