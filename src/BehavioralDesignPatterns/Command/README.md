# Command

Command is a behavioral design pattern that turns a request into a stand-alone object that contains all information about the request. This transformation lets you pass requests as a method arguments, delay or queue a request’s execution, and support undoable operations.

The conversion allows deferred or remote execution of commands, storing command history, etc.

**Usage examples:** The Command pattern is pretty common in PHP code. It’s used for queueing tasks, tracking the 
history of executed tasks and performing the “undo”.

**Identification:** The Command pattern is recognizable by behavioral methods in an abstract/interface type (sender) 
which invokes a method in an implementation of a different abstract/interface type (receiver) which has been encapsulated by the command implementation during its creation. Command classes are usually limited to specific actions.

**[Learn more on Refactoring.Guru](https://refactoring.guru/design-patterns/command)**

## Real World Example
In this example, the Command pattern is used to queue web scraping calls to the IMDB website and execute them one by one. The queue itself is kept in a database that helps to preserve commands between script launches

## Getting Started

1. **Build Docker Image**

   If not done already, build the Docker image:
   ```bash
   docker build -t php-design-patterns-image .
   ```

2. **Run Docker Container**

   Run the Docker container using the built image. You have two options:
    - Run the container, navigate to the pattern directory, and interact manually:
   ```bash
   docker run -it --rm -v $(pwd):/app -w /app --name php-design-patterns-container php-design-patterns-image /bin/bash
   ```
   ```bash
   cd src/BehavioralDesignPatterns/Command
   ```

    - Run the container and directly enter the pattern directory:

   ```bash
   docker run -it --rm -v $(pwd):/app -w /app --name php-design-patterns-container php-design-patterns-image /bin/bash -c "cd src/BehavioralDesignPatterns/Command && /bin/bash"
   ```

3. **Execute via Command Line**

   Launch the example via Docker using the PHP executable:

   ```bash
   php index.php
   ```

4. **Output on Terminal**

   ```bash
    WebScrapingCommand: Downloaded https://www.imdb.com/feature/genre/
    IMDBGenresScrapingCommand: Discovered 23 genres.
    
    WebScrapingCommand: Downloaded https://www.imdb.com/search/title/?title_type=feature&genres=Action
    IMDBGenrePageScrapingCommand: Discovered 50 movies.
    
    WebScrapingCommand: Downloaded https://www.imdb.com/search/title/?title_type=feature&genres=Adventure
    IMDBGenrePageScrapingCommand: Discovered 50 movies.
    
    WebScrapingCommand: Downloaded https://www.imdb.com/search/title/?title_type=feature&genres=Animation
    
    ...
    
    WebScrapingCommand: Downloaded https://www.imdb.com/title/tt15239678/?ref_=sr_t_1
    IMDBMovieScrapingCommand: Parsed movie Dune: Part Two
    
    WebScrapingCommand: Downloaded https://www.imdb.com/title/tt1160419/?ref_=sr_t_2
    IMDBMovieScrapingCommand: Parsed movie Dune: Part One.
    
    ...
   ```