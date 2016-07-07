Author: Rajat Bajaj
Author Email: rajatbajaj56@gmail.com

============ Introduction ============
This project helps web developers to implement the user registration with Google account using PHP at their website project. Also the user information would be stored at the MySQL database.

============ Installation ============
1. Go to https://console.developers.google.com
2. Create a new project
3. After the project is created , go to Credentionals and create credentials (fill the required details)
4. Go to Enabled APIs and enable the Gmail API
5. Create a database flipkart at phpMyAdmin.
6. Import the users.sql file into the database (flipkart).
7. Open the "includes/functions.php" file and modify the $dbServer, $dbUsername, $dbPassword, $dbName variables value with your phpMyAdmin details.
8. Open the "config.php" file and modify the $clientId, $clientSecret, $redirectUrl and $homeUrl variables value with your Google Project API credentials.
9. Test the functionalities.

