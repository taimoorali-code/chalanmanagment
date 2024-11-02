
# Chalan Management System

The **Chalan Management System** is a Laravel-based web application designed to manage chalans for educational institutions. This system enables administrators to create, view, and manage chalans for students, while students can view their chalans and make payments. Key features include chalan creation, rules and regulations management, role-based access, and an intuitive dashboard for both administrators and students.

## Features

- **Role-Based Access Control**:
  - **Admin**: Can create chalans, view student records, manage rules, and view payment statuses.
  - **Student**: Can view assigned chalans, make payments, and track the status of each payment.

- **Chalan Management**:
  - Create, assign, and view chalans.
  - Track payment proofs for student chalans.
  - Generate a list of students with their assigned chalans, amounts, and payment statuses.

- **Rule Management**:
  - Define and assign rules related to chalan creation.
  - Modify existing rules based on institutional requirements.

- **Payment Proof Upload**:
  - Students can upload proof of payment, which updates the payment status of the chalan.

## Requirements

- PHP >= 8.0
- Composer
- Node.js and npm
- MySQL (or another supported database)

## Installation

### Step 1: Clone the Repository

```bash
git clone https://github.com/your-username/chalan-management-system.git
cd chalan-management-system
```

### Step 2: Install Dependencies

Install PHP dependencies with Composer and JavaScript dependencies with npm:

```bash
composer install
npm install
```

### Step 3: Configure the Environment

Copy the example environment file and update your configuration settings:

```bash
cp .env.example .env
```

Open `.env` and set up your database connection:

```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Step 4: Generate Application Key

```bash
php artisan key:generate
```

### Step 5: Run Migrations and Seeders

This will create the necessary database tables and insert initial data for roles, users, and rules.

```bash
php artisan migrate --seed
```

### Step 6: Install Laravel Breeze

To set up authentication and basic routes, install Laravel Breeze:

```bash
php artisan breeze:install
npm run build
```

### Step 7: Serve the Application

You can now start the application locally:

```bash
php artisan serve
```

Visit the application at `http://localhost:8000`.

### Step 8: Compile Frontend Assets

To compile the frontend assets, run the following command:

```bash
npm run dev
```

## Usage

### Admin Dashboard

1. Log in as an admin to access the admin dashboard.
2. Manage student chalans, track payments, and define rules.
3. Access specific sections for students, rules, payments, and chalans.

### Student Dashboard

1. Log in as a student to access the student dashboard.
2. View assigned chalans, check payment statuses, and upload proof of payment.
3. Use the "Pay" button to initiate the payment process for any pending chalan.

## File Structure

Here’s an overview of the main directories and files in this project:

- **app/Models**: Contains the `Challan`, `User`, `Rule`, `Department`, and `Semester` models.
- **app/Http/Controllers**: Includes controllers like `AdminController`, `StudentController`, `ChallanController`, `RuleController`, and `UserController`.
- **routes/web.php**: Defines routes for admin and student access with appropriate middleware.

## Contributing

1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to the branch (`git push origin feature/new-feature`).
5. Open a pull request.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support or any questions, please open an issue on GitHub or contact the project maintainer.

---

Happy Coding!
