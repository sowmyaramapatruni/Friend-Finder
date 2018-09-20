
## Aim: Develop a friend finder app. Here are the different components of the app.

1. A Mobile App: The mobile app will upload the latitude and longitude information to a backend
sever/database. The mobile app should have a log in screen and a registration screen to register
a user.
2.  A server database: The database will reside on a server. The design of the database is upto you.
However, the database should have tables that will store the latitude, and longitude data for
every user that registers with the app. It should also store the username and password for every
user during the registration process.
3.  A webservice written in php that is accessed from the mobile app to upload the data to the
backend database. The webservice should also calculate the friends who are within a radius of 1
kilometer and send back to the mobile app, the IDs and last known location of the friends to the
mobile app. The mobile app then display the friends around you on a Map UI.
4.  We will assume that anyone who registers using the app, is your friend.
5.  You should use XMPP for testing the code. 

### Implemention summary:

### Database schema:

* ID primary key
* Email ID unique key
* Name
* Password
* Latitude
* Longitude
* Last_active_time

1. User can register into App using sign up button and provide the name, email-id and password.

2. Once login is successful, the app captures the current latitude and longitude along with the timestamp and
updates them into them to the table.

3. It also checks whether there are any other friends who have logged in with in one hour at a distance of 1 km
radius and displays them in the map with yellow marker.

4. And when any other friend who has already registered logins to the app, it updates his current latitude,longitude
and current time.

5. All the source files, php files are placed along with the
video demonstrating in the google drive link.

### Query for selecting friends who have logged in within one hour of time:

````
SELECT email, full_name, last_active_time,
latitude, longitude FROM users WHERE email &lt;&gt;
&#39;$email&#39; AND last_active_time &gt;
TIME(DATE_SUB(NOW(),INTERVAL 1 HOUR)) ORDER BY
email ASC&quot;;
````

Once the entries are collected, it calculates the distance
between all users and sends the one’s who distance is less than
1 km.

### Distance Formula 
1. $theta = $lon1 - $lon2;
2. $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
3. cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
4. $dist = acos($dist);
5. $dist = rad2deg($dist);
6. $miles = $dist * 60 * 1.1515;
