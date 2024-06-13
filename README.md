#### User Management System
This system uses vue components for authentication and profile views, as well as blade with tailwind for a better a clean design.

### Setup:
1. Clone the repository in your local machine
2. Install all composer dependencies
3. Create and configure the `.env` file 
4. Set up the database:
    1. To set up the database you need to create two MySQL databases, one for the app, and one for testing.
    2. The first one should be named: `ManagmentSystem`
5. Run migrations and seed the database with the command:
    ```bash
    php artisan migrate:fresh --seed
    ```
6. Run the following commands in your console:
    ```bash
    npm run dev
    php artisan serve
    ```
7. Test the epi endpoints in Postman
    1. Install Postman (If you are new to postman here is the link where you can find it: https://www.postman.com/)
    2. Open a new workspace and select a Post method. Then type the URL's (http://(your local route)/api/auth/register)
    3. In the body of the request type the inputs, name, email, password, and confirm password as well as the values: Here is an example of that part of the process
        1. ![image](https://github.com/Dylan378/thiio_user_system_managment/assets/69223981/3255795a-eea2-4c6d-93f4-eae703e4d450)
    4. Click send and you may recieve a response like this: 
        1. ![image](https://github.com/Dylan378/thiio_user_system_managment/assets/69223981/460a2c19-4874-4617-a230-5d82e11f1f7a)
    5. For login, you just need to remove the name and password confirmation tag
    6. For logout, you need to copy the bearer token that you just got doing the login and inlude it in the authorization part:
        1. ![image](https://github.com/Dylan378/thiio_user_system_managment/assets/69223981/14642dee-676d-4dd6-a0e7-ba8a0a3995d9)
        

