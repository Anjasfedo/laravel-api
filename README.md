# Book RESTful API with Laravel 📚🚀

This project is a simple RESTful API built using Laravel for managing a book. It includes features for creating, retrieving, updating, and deleting books.

## Getting Started 🛠️

Follow these steps to run the project locally:

1. **Set Up the Database:**

    Make sure you have a MySQL database set up. Update the `.env` file with your database connection details.

2. **Run Migrations:**

    ```bash
    php artisan migrate
    ```

3. **Seed the Database:**

    ```bash
    php artisan db:seed --class=BookSeeder
    ```

4. **Start the Development Server:**
    ```bash
    php artisan serve
    ```

The server will start at `http://localhost:8000`.

## API Endpoints 🚪

### Get All Books

-   **Endpoint:** `GET /api/book`
-   **Description:** Retrieve a list of all books.

### Get Book by ID

-   **Endpoint:** `GET /api/book/{id}`
-   **Description:** Retrieve a specific book by ID.

### Create Book

-   **Endpoint:** `POST /api/book`
-   **Description:** Create a new book.

### Update Book by ID

-   **Endpoint:** `PUT /api/book/{id}`
-   **Description:** Update a specific book by ID.

### Delete Book by ID

-   **Endpoint:** `DELETE /api/book/{id}`
-   **Description:** Delete a specific book by ID.

The API Postman Collection is available in the /postman-collection/ directory.

## Database Schema 🗄️

The database schema includes the following table:

-   **Table Name:** `books`
    -   `id`: Auto-incremental primary key
    -   `title`: Title of the book (string)
    -   `author`: Author of the book (string)
    -   `published_date`: Published date of the book (date)
    -   `created_at` and `updated_at`: Timestamps for creation and last update

## Closing Notes📝

If you find any issues or have suggestions for improvement, please feel free to open an issue or submit a pull request.

Happy coding!🚀👨‍💻
