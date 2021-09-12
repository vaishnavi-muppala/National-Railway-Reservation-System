# National-Railway-Reservation-System
A minimized model of the National Railway Reservation System is developed with basic operations. A website is developed with two accesses, the admin and the user. Various operations possible are adding/ modifying train, fares, tickets by an Admin, and Train enquiry, Ticket booking, Ticket Information, and Ticket Cancellation, by a User.


### SYSTEM REQUIREMENTS:
#### Software:
•	UI – HTML, CSS, JavaScript, jQuery <br />
•	Server side – PHP   <br />
•	Database – XAAMPP (MariaDB, MySQL for RDBMS)
#### User Requirements:
•	Train enquiry  <br />
•	Ticket booking <br />
•	Ticket Information <br />
•	Ticket Cancellation <br />
#### Admin Requirements:
•	Ticket enquiry <br />
Manage database operations like – <br />
•	Add trains  <br />
•	Add stations <br />
•	Add classes <br />
•	Add Fare <br />

### APPLICATIONS: 
Home page consists of Login and Register tabs; <br />
##### USER    <br />
1.	After successful sign in, User gets navigated to page which has three tabs:  <br />
•	Train Enquiry where user can search and book tickets for passengers- <br />
i.	User can select any no of seats available and proceed to payment <br />
ii.	A ticket with a PNR is generated at the end of ticket booking. <br />
•	Ticket Info where user can view the tickets he/she has booked earlier. <br />
•	Ticket cancellation where user can cancel the ticket he/she has booked.
##### ADMIN <br />
1.	After successful sign in as Admin, Admin gets navigated to a page which has five tabs: <br />
•	Insert Trains where the admin can add new trains into the train table. <br />
i.	Check the Start and Stop stations properly while adding train details, since we have to add Station ID’s corresponding to these Station names  <br />
ii.	After submit button, a train is added into the database. <br />
•	Add Stations where the admin inserts a new station. <br />
•	Add Class in which no of seats available for each class are inserted for corresponding date and Train Number. <br />
•	Add Fare where admin adds fare for each class in each train. <br />
•	Train Enquiry which has the same applications as the USER one. <br />
