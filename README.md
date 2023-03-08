# Wonde Developer Test

Thanks again for this opportunity. I decided to spin up a Laravel App for this test as i know this is the system and frame work you use. 

# Solution to the Problem 

I have made a simple system in which a teacher can enter the id (Wonde ID) then are taken to another page where there week schedule is displayed both by day of the week and by student. This can be done with different employee ids in the same school. 

# Screen Shots
![Welcome](https://raw.githubusercontent.com/dan-ling93/wonde-developer-test/master/wonde-test/public/images/Screenshot%202023-03-08%20at%2013.44.09.png "Welcome")


# Main  files 
resources -> views -> *
app ->  Http -> Controllers -> ClassController.
resources -> routes -> web

# Important to know
I have not pushed up the token or the school id as this is a public repo, I have sent them in the email over with the link to this repo. They will need to be added to the .env file
```
...
WONDE_KEY=<KEY> 
WONDE_SCHOOL=<SCHOOLID>   
```
# Next Steps 
I did not spend a large amount of time on this, and have made some quick implementation. If i was going to continue developing this further I would :
    - Set up models for Employee, Class, Student and Lesson.
    - Use a auth system to authenticate the user.
    - Move the data structures of the response to there relevant class. 
    - Move the client connection into its own method 
    - Refactor and improve the code from a readability and efficiency point of view
    - More in depth error handling and testing.
    - improve the UI.
