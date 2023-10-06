# Credit Management Applicaton

This is a straightforward credit management system developed with Laravel 10. It simplifies the process of granting 
loans, tracking repayments, and ensuring financial stability.

## Getting Started

Follow these steps to set up and use the Credit Management Application:

1. Clone or download project from https://github.com/KrasimiraGeorgieva/credit-management-application.git
2. Copy **.env.example** file and rename it as **.env**
3. Set up a **MySQL database** and configure the database connection in the **.env** file.
4. Open the console/terminal into the root directory of the project
5. Run `composer install` command
6. Run `php artisan key:generate`
7. Run the database migrations to create the required tables. Use `php artisan migrate` command
8. Make sure you’ve started your local server
- Configuring your local Laravel development environment(Homstead(Vagrant), Valet(macOS), XAMPP, Docker)
- To start Laravel Development server run `php artisan serve` command
9. Open the application in the browser

## Features

### Credits List on Startup

- On startup, you will see a list of all credits in a clear tabular format.
- Each credit is uniquely identified by an identification code following a uniform structure.

### Interest Rate

The system applies a fixed annual interest rate of 7.9% to all customers.

### Payment Handling

- If a payment attempt is made for an amount exceeding the remaining due amount, the system will deduct only the 
outstanding amount.
- The user will be promptly notified about the transaction details.

### Credit Limit

- To maintain financial stability, the system enforces a credit limit for borrowers.
- A borrower cannot have loans with a total value exceeding 80 000 BGN.

## Usage

Use the Credit Management System to:

- Create new credits by providing the recipient's name, credit amount, and term.
- View a detailed list of all credits, including recipient information and remaining balances.
- Make payments towards existing credits.
- Ensure borrowers do not exceed the specified credit limit.

## License
This project is open-source and available under the MIT License.
