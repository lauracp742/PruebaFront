# Drink app

<img src="https://media.giphy.com/media/CL75lzAA8Aais/giphy.gif" width="100%" />

## About

We built a cocktail app in Laravel which lets you search for and save your favorite drink recipes.
We have used the API from [TheCocktailDB](https://www.thecocktaildb.com/).

## Instructions

-   Clone the repository
-   Cd to the root of the project in your terminal.
-   Run `composer update` in your CLI to install the required packages.
-   Create a .env-file with credentials to your database similar to the .env.example file.
-   Run `php artisan migrate` in your terminal.
-   Run `php artisan serve` in the terminal to start a localhost server.
-   You're good to go!

## Built with

-   Laravel

## Code Review

1. Don't forget to include `/public/css` and `/public/js` folders in your `.gitignore` file, since we don't want to include generated files.
2. When a user enters an incorrect password, it would be nice if they didn't have to enter their email again. You could save the email in a session to prevent this.
3. If a user tries to register an already registered email address, they don't get an error message, but gets sent to Laravels own error page. You could add an error message instead, and redirect the user back to the page.
4. In `RegisterTest.php:19` you could use `assertDatabaseHas` to make sure the user exists in the database.
5. The user can now visit the `/register` view when logged in, to prevent this you could add `->middleware('guest')` in `web.php:19`.
6. You could add a minimum length for the password when a user wants to register.
7. In `LoginController.php` you could add a validation so that email and password is required, that way Laravel automatically creates error messages to tell the user what went wrong.
8. In `web.php:22`, instead of using `Route::post` to delete a favorite you could use `Route::delete`.
9. You could write a test for checking that someone who isn't logged in can't access the `/dashboard` view.
10. You could write a test for checking that someone who isn't logged in can't access the `/favorites` view.
11. Impressive that you used an API!
12. On some drinks the recipe shows empty list items, not sure why this happens...
13. You could add an active state on the link you're currently visiting.
14. Nice that you used `@yield('content')` in `master.blade.php`, never heard of that before! Makes the code easy to navigate.
15. For semantics you could use a `<main>` tag.
16. Cool clockwork toolbar!
17. The search results dissappear when you go in to the favorites page and come back, maybe they could be saved in a session also?
18. You could have some default content on the `dashboard.blade.php` page, maybe random drinks you could browse through, so that it's not empty.
19. You could add a message in `/favorites` to confirm to the user when they removed a drink.
20. Great job, super fun app!

## By

-   [Ida From](https://github.com/fvrom)
-   [Moa Berg](https://github.com/moasannacatharina)
