# SE-Sprint03

## Contributors (Sprint 3):
    1. Matias Merko
    2. Blen Daniel Assefa

## Past contributors
### Contributors (Sprint 2):
    1. Suraj Giri
    2. Saad Aboujid

### Contributors (Sprint 1):
    1. Flavia Tasellari
    2. Ankel Lazaj

## Built with:
    - HTML
    - CSS
    - JavaScript
    - PHP
    - MySQL
 
### Link to page hosted on ClamV: https://clabsql.clamv.jacobs-university.de./
### Link to page hosted on ClamV: https://clabsql.clamv.jacobs-university.de/~mmerko/

## Sprint 3 Additions
- [x] DeviceID variable not stored in database
- [x] QR code for palaces not stored in database
- [x] After Visitors scan qrcode nothing happenes
- [x] The VisitorToPlaces table was not used anywhere
- [x] Agent can not see the VisitorToPlaces data
- [x] Agent can not filter the data displayed
- [x] Hospitals could not mark people as infected or not
- [x] Additiona Tables by the name created 
- [x] All registration redone for handing cornor cases of registration errors
- [x] Navigation bar and footer added with bootstrap4
- [x] Creating a new QR code generator for Places for specific use cases
- [x] QR Code successfully stored in the database as a Blob
- [x] Event creating with specific qr-code now avilable
- [x] Additional Tests added
- [x] Password hashing



 ## Project changes and additions:
 - Changed the database (most changes were on visitortoplaces table)
    - New Tables by the name ```keystring```, ```EventsForPlaces```, ```Images``` are created
 - DeviceID variable is stored in the database 
 - The generated QR code for places is now stored in the database 
 - Visitors are directed to a timer page after they scan the QR code 
 - Visitors can now leave the place and the entry and exit date are stored in the database (visitortoplaces table)
 - Added a page for the agent to see the VisitorToPlaces data
 - Agent can now filter the data displayed in a table
 - Gave the hospitals the ability to mark people as infected or not


 ## Guide for running the application (Macbook M1):
 ### MySQL installation and use:
 - First install MySql on your pc (Watch the *[Tutorial Guide](https://youtu.be/oxToe-4c6OM)*)
 - Run the server before accessing your database
 - Access database:
 ```shell
 mysql -u root -p
 Enter password: 
 # Please enter the password you put into your mysql database
 ```
 - After you enter your password, please copy and paste the code in se_database.sql file (DO THIS ONLY ONCE AT THE BEGINNING)
 ### XAMPP installation and use:
 - First install XAMPP on your pc (Watch the *[Tutorial Guide](https://www.youtube.com/watch?v=ydOsQ1Xgln8)*)
 - Download the folder containing the app files found in this repository
 - Put the folder in "htdocs" inside XAMPP
 - Open "manager-osx" , click "Apache Web Server" then click Start

 ### Running the app after setting everything up:
 - First, go to "System Preferences" (on mac), open MySQL and start the database server
 - Then, go to XAMPP -> "manager-osx" and click "Apache Web Server" then click start
 - Then open Google and type "localhost/se-03-team-17/"

### Please note that for testing follow the instructions given in the last sprint (test.py explanation)

### Also keep in mind that you need to change connection info in paths/auth/config.php accordingly

### For Unit Testing using Python
    Note that either you have to be connected to a internet inside the university or you have to be
    connected to JacobsVPN to acccess the clamv because the url used for testing is borrowed from ClamV.
    Open terminal in the cd se-02-team-17 folder and run:

    $ python ./tests/test.py
## For specific PHPUnit testing 

1. Install ```Composer```  [Download from here](https://getcomposer.org/)

2. Make sure it is installed by running the following command
    ./vendor/bin/phpunit --version

2. Run the following Command
    ./vendor/bin/phpunit 

## File Structure

    .
        ├── assets                  # Images and such used for the websites
        │   ├── css                 # CSS stylesheets
        │   ├── fonts               # Fonts used
        │   ├── img                 # Images folder
        │   └── js                  # javascript ;)
        ├── classes                 # for test purposes
        ├── data                    # QR code generated is stored here
        ├── lib                     # library for qr code generation for php
        ├── paths                   # Source files
        │   ├── agency              # Agency stuffs
        │   ├── auth                # Authentications
        │   ├── hospitals           # Hospital stuffs
        │   ├── landing page        # Landing pages accessable for everyone
        │   ├── layouts             # Header and footer layouts
        │   ├── places              # Places stuffs
        │   └── visitors            # Visitors stuffs
        ├── sql                     # Folder for running sql queries
        ├── tests                   # Tools and utilities for testing
        ├── vendors                 # PHPUnit testing helper
        ├── composer.lock           # PHPUnit testing helper
        ├── composer.json.          # PHPUnit testing helper
        ├── phpunit.xml             # PHPUnit testing helper
        ├── index.php               # PHPUnit testing helper
        └── README.md               # Starting point

## Dummy Login Credentials (Sprint 2):

### Agent:
    username: agent1
    password: 123456

### Visitors: 
    email: visitor1@gmail.com
    password: password

### Places:
    email: place1@gmail.com
    password: password

### Hospital:
    username: hospital1
    password: password
# SPRINT 2 - SE-Sprint01-Team17

The application is hosted on Clamv. It can be accessed via: [Corona Archive](https://clabsql.clamv.jacobs-university.de/~sgiri/se-02-team-17/) or copy and paste the following link into your browser. 
The application can also be manually tested with the dummy data provided within this readme file.

   https://clabsql.clamv.jacobs-university.de/~sgiri/se-02-team-17/

## Contributors (Sprint 2):
    1. Suraj Giri
    2. Saad Aboujid
## Built with:
    - HTML
    - CSS
    - JavaScript
    - PHP
    - MySQL

## About the Project:
Corona Archive is an application that aims to track COVID (Corona) Infections via contact tracing. In this appliation we have tried to track when a visitor enters any business (new place) by the help of a QR Code available at the place taht would be scanned by the visitor. Also, if any visitor who is in tge database is infected by COVID, then s/he would be marked infected by a hospital and if s/he is not Infected with COVID, then would be marked Not Infected. All hte analytics of the application is to be observed by the admin/agent.

## Prerequisites
- Mysql
- html5

## Installation Guide:
To run this application locally, you will have to follow the following steps:

First of all, clone the repository. <br>
    ``` git clone https://github.com/Magrawal17/se-02-team-17.git ```

Aftet that go (cd) to the project folder. <br>
    ``` cd se-02-team-17 ```

You will also need a MYSQL database for this project. To create one:

    # Open MYSQL
    $ mysql -u {Enter your username or ROOT} -p

    # Once you are in your MYSQL terminal, run this command for creating the db.
    mysql> create database seteam17;
    mysql> use seteam17; 
    mysql> source se_database.sql
    mysql> exit

Go to http://localhost: and then the relative path to where you cloned this Repo. <br>
P.S. You need to have a XAMP(if you use windows) or LAMP stack(if you use LinuX or Mac) installed.

## File Structure
	\se-print-02-team-17 	# github's branch
    |
    |---\connect.php
    |
    |---\imprint.php
    |
    |---\index.php
    |
    |---\learn_more.php
    |
    |---\login.php
    |
    |---\register.php
    |
    |---\se_database.sql
    |
    |---\agency
    |   |
    |   |--- # All the Files Related to the Agent 
    |---\css
	|	|
    |   |--- # All the CSS Files
	|---\hospital
    |   |
    |   |--- # All the Files Related to the Hospital
    |---\images
    |   |
    |   |--- # All the images used.
    |---\places
    |   |
    |   |--- # All the Files Related to the Places
    |---\visitor
    |   |
    |   |--- # All the Files Related to the Visitors
    |---\tests
    |   |--- # Includes the file for unit testing using Python.
    
   

## Sprint 2 Changes Done:
- [x] Restructured the databse structure as Database missed many columns in various tables. 
- [x] Updated database entries to easier values for testing.
- [x] Updated the whole frontend.
- [x] **Places Login** page was created as Places could only register and genereate QR code once, which would create problems if the place lost QR code.
- [x] QR generation (encoded with the registration data) for Places was Added.
- [x] Added the feature to see the information and generate the QR code again after Logging In for Places.
- [x] **Hospital Adding** feature was added to the **Agent** as Agents could not add Hospitals.
- [x] Added hospital analytics observation to agent.
- [x] Added Visitor Log In functionality.
- [x] Added QR Scan Result showing functionality after Visitor Login.
- [x] Separated all the **Log In** and **Registration** pages.
- [x] Added the **Imprint**.
- [x] Used **SESSION** keys to redirect Visitor Registration to **Scanning Pages**.
- [x] Used **SESSION** keys to redirect Places Registration to **QR Generation Pages**.
- [x] Created the button for changing the visitor infected status but it does bot work properly.
- [x] Added the .gitignore file.
- [x] Added requirements.txt file
- [x] Added the Testing. It wasn't previously included. We tried to implement the Unit Testing in PHP but it kept failing. So we used the Unit Test in Python.

### For Unit Testing using Python
    Note that either you have to be connected to a internet inside the university or you have to be
    connected to JacobsVPN to acccess the clamv because the url used for testing is borrowed from ClamV.
    Open terminal in the cd se-02-team-17 folder and run:

    $ python ./tests/test.py

### for connecting to Jacobs VPN:

follow the link: 
https://vpnasa.jacobs-university.de/
or <br>
install Cisco anyconnect Application following the link: 
https://teamwork.jacobs-university.de/display/ircit/VPN+Access

    username: {your campusnet USERNAME}
    password: {your campusnet PASSWORD}

## Dummy Login Credentials (Sprint 2):

### Agent:
    username: agent1
    password: agent_password

### Visitors: 
    First Visitor:
        email: visitor1@gmail.com
        password: password
    Second Visitor:
        email: visitor2@gmail.com
        password: password
    Third Visitor:
        email: visitor3@gmail.com
        password: password

### Places:
    First Place:
        email: place1@gmail.com
        password: password
    Second Place:
        email: place2@gmail.com
        password: password
    Third Place:
        email: place3@gmail.com
        password: password 

### Hospital:
    First Hospital:
        username: hospital1
        password: password
    Second Hospital:
        username: hospital2
        password: password
    Third HOspital:
        username: hospital3
        password: password 

## Future Updates
- [ ] Connect the String Decoded by the QR scanner to the database.
- [ ] Implement the relation between the visitors and places.
- [ ] Implement date and time fetching feature from visitor's device.
- [ ] Hospitals Searching Visitors by name
- [ ] Manage the required respective analysis for the agent.


# SPRINT 1 - SE-Sprint01-Team17

Link to the application: http://clabsql.clamv.jacobs-university.de/~ftasellari/Corona/main_page.html

Corona Archive: a web service for Corona disease management which enables digital tracking of citizens which enter certain places and keeps the records in case of a 
Covid infection spread.

## Contributors (Sprint 1):
    - Flavia Tasellari
    - Ankel Lazaj

## Built with:
    - HTML
    - CSS
    - JavaScript
    - PHP
    - MySQL

## Implementation (Done by Sprint 1):

    - Created database of Corona Archive
    - Build the main page 
    - Inserted redirection links from main page to the registration/login forms
    - Created login form for agent
    - Created login form for hospital
    - Created registration for visitors
    - Created registration for places
    - Inserted data to the database
    - Passed Device ID as hidden field
    - Generated and displayed QR code
    - Camera feature was enabled
    - Displayed visitors tables in the Hospital page
    - Displayed visitors tables in the Agent page
    - Displayed places tables in the Agent page
    - Implemented test cases
    - Used CSS and JavaScript to make the pages more interactive
    - Created 'Go Back' buttons
    - Linked the pages together
    - Implemented Search button in the Agent page which is yet to be functional
    - Connected the client side with server side/database

## Tests (Sprint 1): 
    test.html which redirects to 4 different pages to try different test cases for login/registration validation for Visitors, Places, Agent, Hospital

The only instance accepted in Agent login is:

username: agent1234,
password: corona_statistics1

Hospital login :

    username: 
    1. Johns_Hopkins_Hospital
    2. Alpha_Health_Hospital
    3. 24hr_Service_Clinic

    password:
    1. hospital_hopkins1
    2. alphahealth777
    3. service_clinic!

