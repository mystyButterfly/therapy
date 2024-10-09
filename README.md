# Therapy [therapy.great-site.net](https://therapy.great-site.net/)
A full-stack project to help doctors in their work. Please be aware that some content has been temporarily removed due to intellectual property considerations.

Create a new account or use an activated one
test@mail.com pwd:123

It is possible to add new data in the Profile section.

## Project Description

This project is a secure user registration and login web application that utilizes PHP and MySQL to manage user sessions and handle authentication. The main features of the application include user registration, login functionality, session management, and the ability to enforce device limits for users. Below is a detailed description of the key components and functionalities implemented in the code.

### Key Features

1. **User Registration**:
   - New users can register by providing their first name, last name, email, and password. Passwords are hashed using `PASSWORD_BCRYPT` to ensure secure storage.
   - The application checks for duplicate email addresses to avoid multiple accounts with the same email and provides feedback accordingly.

2. **User Login**:
   - Users can log in using their email and password. The application verifies the provided credentials against stored data in the database.
   - If the credentials are valid, the user is redirected to a secure page.
   - Upon successful login, a session cookie (`device_id`) is set to maintain the user's logged-in status.

3. **Session Management**:
   - The application tracks user sessions to ensure that users are not logged in from multiple devices simultaneously beyond a certain limit (in this case, two devices).
   - If a user tries to log in from a third device, the application denies access and informs the user that they have reached the device limit.

4. **Enhanced Security Features**:
   - Uses secure cookie parameters (e.g., `HttpOnly`, `Secure`, `SameSite`) for the session cookie to prevent cross-site scripting (XSS) and cross-site request forgery (CSRF) attacks.
   - Implements input sanitization to prevent SQL injection and XSS attacks.

5. **Responsive Design**:
   - The application includes a responsive layout using HTML and CSS, making it accessible on both desktop and mobile devices.

6. **Dynamic Content Based on Login Status**:
   - The UI dynamically changes based on whether the user is logged in or not. If the user is logged in, certain elements are displayed (such as a logout link).

7. **Modular Code Structure**:
   - The application follows a clean structure, separating concerns by including functions and external files for database connections and custom configurations.

### Technical Components

- **Frontend**:
  - HTML, CSS (external stylesheets), and JavaScript for form handling and user interactions.
  - Dynamic content updates through inline PHP that decides the course of action based on the user's login status.

- **Backend**:
  - PHP scripting for server-side logic, including user registration, authentication, and session handling.
  - MySQL database for data storage, including user credentials and active session management.

### Security Considerations

- The project has implemented security measures such as:
  - Hashed passwords for user accounts.
  - Prepared statements for SQL queries to avoid SQL injection.
  - Strict cookie attributes to enhance security against XSS and CSRF.
### Conclusion

This project serves as a foundational structure for a user authentication system in a web application. Ideal for learning and understanding concepts of PHP, user sessions, and secure practices in web development, it can also be extended further to accommodate additional features such as password recovery, email confirmation, and more robust profiling based on user roles and permissions.

This how looks admin's page.
![adminspage](https://github.com/user-attachments/assets/1f4ebc5f-e3ef-472d-8e80-05bde304bf7d)



