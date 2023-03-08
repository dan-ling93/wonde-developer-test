# Wonde Developer Test

Thanks again for this opportunity. I decided to spin up a Laravel App for this test as I know this is the system and framework you use. 

# Solution to the Problem 

I have created a simple system in which a teacher can enter the Wonde ID, and then be taken to another page where the schedule for their week is displayed both by day of the week and by student. This can be done with different employee IDs within the same school.  Example ID 
```
A341239484
```

# Main  files 
These are the files where I wrote most of the code, and handling the passing and displaying of data.

```
resources -> views -> *
app ->  Http -> Controllers -> ClassController.
resources -> routes -> web
```

# Important to know
I have not included the token or the school ID as this is a public repository, instead I have included them in the email. They will need to be added to the .env file for this to work.
```
...
WONDE_KEY=<KEY> 
WONDE_SCHOOL=<SCHOOLID>   
```
# Next Steps 
I did not spend a large amount of time on this, and have made some quick implementation. If I was going to continue developing this further I would :\
    - Set up models for Employee, Class, Student and Lesson.\
    - Use a auth system to authenticate the user.\
    - Move the data structures of the response to their relevant class. \
    - Move the client connection into its own method \
    - Refactor and improve the code from a readability and efficiency point of view\
    - More in depth error handling and testing.\
    - Improve the UI.\

# Screen Shots
Welcome page 

![Welcome](https://raw.githubusercontent.com/dan-ling93/wonde-developer-test/master/wonde-test/public/images/Screenshot%202023-03-08%20at%2013.44.09.png "Welcome")

Timetable by Days
![days](https://github.com/dan-ling93/wonde-developer-test/blob/master/wonde-test/public/images/Screenshot%202023-03-08%20at%2013.44.23.png "days")

Timetable by Student
![students](https://github.com/dan-ling93/wonde-developer-test/blob/master/wonde-test/public/images/Screenshot%202023-03-08%20at%2013.44.31.png "Students")
