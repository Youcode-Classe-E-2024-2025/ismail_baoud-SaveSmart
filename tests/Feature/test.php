<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User; // Add this if testing database interactions
use App\Models\Book; // Add this if testing book-related routes
use App\Models\Reservation; // Add this if testing reservation-related routes

class ExampleTest extends TestCase
{
    use RefreshDatabase; // Resets the database after each test

    /**
     * Test if the dashboard page is accessible.
     */
    public function test_dashboard_page_is_accessible(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Dashboard'); // Replace with expected text
    }

    /**
     * Test if the signin page is accessible.
     */
    public function test_signin_page_is_accessible(): void
    {
        $response = $this->get('/signin');

        $response->assertStatus(200);
        $response->assertSee('Sign In'); // Replace with expected text
    }

    /**
     * Test if the signup page is accessible.
     */
    public function test_signup_page_is_accessible(): void
    {
        $response = $this->get('/signup');

        $response->assertStatus(200);
        $response->assertSee('Sign Up'); // Replace with expected text
    }

    /**
     * Test if the profile page is accessible.
     */
    public function test_profile_page_is_accessible(): void
    {
        // Create a user and authenticate them
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/profile');

        $response->assertStatus(200);
        $response->assertSee('Profile'); // Replace with expected text
    }

    /**
     * Test if the user dashboard page is accessible.
     */
    public function test_user_dashboard_page_is_accessible(): void
    {
        // Create a user and authenticate them
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/userDashboard');

        $response->assertStatus(200);
        $response->assertSee('User Dashboard'); // Replace with expected text
    }

    /**
     * Test if the admin dashboard page is accessible.
     */
    public function test_admin_dashboard_page_is_accessible(): void
    {
        // Create an admin user and authenticate them
        $admin = User::factory()->create(['role' => 'admin']); // Adjust role field as needed
        $this->actingAs($admin);

        $response = $this->get('/adminDashboard');

        $response->assertStatus(200);
        $response->assertSee('Admin Dashboard'); // Replace with expected text
    }

    /**
     * Test if the emprunts (reservations) page is accessible.
     */
    public function test_emprunts_page_is_accessible(): void
    {
        // Create a user and authenticate them
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/emprunts');

        $response->assertStatus(200);
        $response->assertSee('Emprunts'); // Replace with expected text
    }

    /**
     * Test if the create book page is accessible.
     */
    public function test_create_book_page_is_accessible(): void
    {
        // Create an admin user and authenticate them
        $admin = User::factory()->create(['role' => 'admin']); // Adjust role field as needed
        $this->actingAs($admin);

        $response = $this->get('/adminDashboard/create');

        $response->assertStatus(200);
        $response->assertSee('Create Book'); // Replace with expected text
    }

    /**
     * Test if the store book route works.
     */
    public function test_store_book_route_works(): void
    {
        // Create an admin user and authenticate them
        $admin = User::factory()->create(['role' => 'admin']); // Adjust role field as needed
        $this->actingAs($admin);

        $response = $this->post('/storebook', [
            'title' => 'Test Book',
            'author' => 'Test Author',
            'description' => 'This is a test book.',
        ]);

        $response->assertStatus(302); // Assuming the route redirects after submission
        $this->assertDatabaseHas('books', [ // Replace 'books' with your table name
            'title' => 'Test Book',
        ]);
    }

    /**
     * Test if the delete book route works.
     */
    public function test_delete_book_route_works(): void
    {
        // Create an admin user and authenticate them
        $admin = User::factory()->create(['role' => 'admin']); // Adjust role field as needed
        $this->actingAs($admin);

        // Create a book to delete
        $book = Book::factory()->create();

        $response = $this->get('/adminDashboard/delete/' . $book->id);

        $response->assertStatus(302); // Assuming the route redirects after deletion
        $this->assertDatabaseMissing('books', [ // Replace 'books' with your table name
            'id' => $book->id,
        ]);
    }

    /**
     * Test if the update book route works.
     */
    public function test_update_book_route_works(): void
    {
        // Create an admin user and authenticate them
        $admin = User::factory()->create(['role' => 'admin']); // Adjust role field as needed
        $this->actingAs($admin);

        // Create a book to update
        $book = Book::factory()->create();

        $response = $this->post('/updateData/' . $book->id, [
            'title' => 'Updated Book Title',
            'author' => 'Updated Author',
            'description' => 'This is an updated book.',
        ]);

        $response->assertStatus(302); // Assuming the route redirects after submission
        $this->assertDatabaseHas('books', [ // Replace 'books' with your table name
            'id' => $book->id,
            'title' => 'Updated Book Title',
        ]);
    }

    /**
     * Test if the delete user route works.
     */
    public function test_delete_user_route_works(): void
    {
        // Create an admin user and authenticate them
        $admin = User::factory()->create(['role' => 'admin']); // Adjust role field as needed
        $this->actingAs($admin);

        // Create a user to delete
        $user = User::factory()->create();

        $response = $this->get('/deleteUser/' . $user->id);

        $response->assertStatus(302); // Assuming the route redirects after deletion
        $this->assertDatabaseMissing('users', [ // Replace 'users' with your table name
            'id' => $user->id,
        ]);
    }

    /**
     * Test if the reservation route works.
     */
    public function test_reservation_route_works(): void
    {
        // Create a user and authenticate them
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create a book to reserve
        $book = Book::factory()->create();

        $response = $this->get('/reservation/' . $book->id);

        $response->assertStatus(302); // Assuming the route redirects after reservation
        $this->assertDatabaseHas('reservations', [ // Replace 'reservations' with your table name
            'user_id' => $user->id,
            'book_id' => $book->id,
        ]);
    }
}
