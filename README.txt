1. Zadatak - I have cloned the given repository into my local folder.


2. Zadatak - Seperated index.html file into pieces of needed files of PHP. 
	     Specifically created new folder for partial elements header, footer, sidebar.
	     Created index.php file as a main file to work with posts.

     // FIXED deleted index.php for now, and made posts.php main file to view through,
3. Zadatak - Made style changes to all h elements, also changed color of navbar and links,
	     turned headings into links as well.

     // FIXED Navbar elements color had to be changed to grey, because they werent visible,
	     because they are links and had the same color as navbar(except active links)

4. Zadatak  - Created new database and coded 3 posts. Then I've changed hardcoded posts in posts.php
	      Used foreach loop to list all posts fetched from database and fit them into the HTML div.
	      Created database.php to store all the necessary data for MySQL connection.

5. Zadatak  - Created a redirection link with a element using $_GET method, in order to fetch data for
	      specific post that has been clicked. Also created database for comments that goes for specific post
	      Created a div for comments section and used foreach to list all the comments made on the current post.
-----------------------------------------------------------------------------------------------------------------

BONUS:
	    - Created a form for publishing new posts.
  		Added new table in database called authors.
		Created new queries that insert new author into database,
		then fetch that author and connects him to the new post he posted,
		Made new references for foreign key in 'posts' and 'comments'
		And accordingly made changes in php files to the new references of author
		Added a couple of queries that execute by order with POST METHOD after user
		filled the fields.
		Also made the input fields required in the HTML file.

// FIXED: 	Changed links in the navbar for "Home" = "posts.php" "Publish a post" = "create-post.php"
		Changed sql query keys in php to match database column names.
		Made some changes into sidebar, footer, header (Hard-coded some fresh information)
		Made a lot of small tweaks into all the php files, where necessary,
-------------------------------------------------------------------------------------------------
BONUS 2:     -  Changed navigation bar to have only necessary link.
		Seperated author form from post form
		Created new query to insert author into the database
		Made some styles for color changes on Create author page(blue for male, pink for female)
		On PUBLISH A POST page added some bootstrap class for input fields
		
		Used Javascript DOM to change colors of the selected authors, and included main.js into the file
----------------------------------------------------------------------------------------------------------------------
		--------IMPORTANT!!!-------

		CHANGED posts.php TO index.php for easier launching of the website

		--------IMPORTANT!!!-------

----------------------------------------------------------------------------------------------------------------------
BONUS 3:     -  Authors were already dinamically being fetched from the database
		Colors have been changed on single post of the author according to the class of a element
		Added new styles for a couple of HTML elements
		Changed navbar redirection links from posts.php to index.php
		Made some slight position changes in all files to make it more readable,
		Added comments where necessary.
		
		

		

		
		
 