![Screenshot ](https://user-images.githubusercontent.com/9254656/118858028-98ba8100-b8d0-11eb-853b-e2ab60b94313.png)

## Document Search Engine Application 
Document Search Engine with Laravel 8 :It allows users to upload their documents and make them  shareable with other users and it also makes the documents and the contents of the ducuments searchable. 

## This application is covering alot of Technologies 
    
- Laravel 8
- Breeze 
- PHP 8
- Tailwindcss
- Sail Docker
- MYSQL
- Scout drivers
- Meilisearch 
- livewire components etc

 ## Functionality 
- The system shows the list of documents  and they are all paginated according to the requirements.
- User must be register inorder to upload the documents.
- User can be  to download each of the these documents once he/she has been authenticated.
- User can be able to delete the document with nice error modal message (Tailwindcss UI).
- User can be able to search the  title of document via search engine. This is powered by laravel scout and Meilisearch

 ## Installation Process
 
 1: Clone the repo and cd into it
 
 2: composer install 
 
 3: Rename or copy .env.example file to .env
 
 4: php artisan key:generate
 
 5: Set your database credentials in your .env file
 
 6: npm install && npm run dev
 
 7:php artisan serve or use Laravel Valet / Docker Sail
 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
