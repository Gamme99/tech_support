This is a PHP and MySQL project developed using the MVC (Model-View-Controller) design pattern. The project aims to provide a Tech Support Management System where users can manage product customers and register products.

Installation
To run this project, follow these steps:

Upload the tech_support directory to your web server's document root directory.
Import the provided SQL file tech_support.sql into your MySQL database to set up the required tables and data.

Usage
Once you have completed the installation steps, you can access the project by visiting the URL where you uploaded the tech_support directory in a web browser.

The project follows the MVC pattern, which separates the application into three main components:

Models: The models represent the data structures and business logic of the application. They interact with the database and provide the necessary data to the controllers.
Views: The views are responsible for rendering the user interface. They receive data from the controllers and present it to the user.
Controllers: The controllers handle user input and interact with the models and views to process requests and generate responses.
The project includes the following main features:

Customer Manager: view, edit customer information using the customer_manager module.
Product Manager: Users can manage products using the product_manager module.
Product Register: Users can register products and associate them with customers using the product_register module.
