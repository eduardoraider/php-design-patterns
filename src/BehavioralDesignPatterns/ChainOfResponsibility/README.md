# Chain of Responsibility

Chain of Responsibility is a behavioral design pattern that lets you pass requests along a chain of handlers. Upon receiving a request, each handler decides either to process the request or to pass it to the next handler in the chain.

The pattern allows multiple objects to handle the request without coupling sender class to the concrete classes of 
the receivers. The chain can be composed dynamically at runtime with any handler that follows a standard handler interface.

**Usage examples:** The Chain of Responsibility is pretty common in various PHP frameworks. Arguably, one of the most 
famous examples of using this pattern in PHP is HTTP Request Middleware described in PSR-15.

**Identification:** The pattern is recognizable by behavioral methods of one group of objects that indirectly call the 
same methods in other objects, while all the objects follow the common interface.

**[Learn more on Refactoring.Guru](https://refactoring.guru/design-patterns/chain-of-responsibility)**

## Real World Example

The most widely known use of the Chain of Responsibility (CoR) pattern in the PHP world is found in HTTP request 
middleware. These are implemented by the most popular PHP frameworks and even got standardized as part of PSR-15.

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
   cd src/BehavioralDesignPatterns/ChainOfResponsibility
   ```

    - Run the container and directly enter the pattern directory:

   ```bash
   docker run -it --rm -v $(pwd):/app -w /app --name php-design-patterns-container php-design-patterns-image /bin/bash -c "cd src/BehavioralDesignPatterns/ChainOfResponsibility && /bin/bash"
   ```

3. **Execute via Command Line**

   Launch the example via Docker using the PHP executable:

   ```bash
   php index.php
   ```

4. **Interact via Terminal**

   Follow the on-screen instructions in the terminal to experience the Chain of Responsibility in action:
   ```bash
    Enter your email:
    asd
    Enter your password:
    123
    UserExistsMiddleware: This email is not registered!
    
    Enter your email:
    admin@example.com
    Enter your password:
    wrong
    UserExistsMiddleware: Wrong password!
    
    Enter your email:
    admin@example.com
    Enter your password:
    letmein
    ThrottlingMiddleware: Request limit exceeded!
    
    Enter your email:
    admin@example.com
    Enter your password:
    admin_pass
    RoleCheckMiddleware: Hello, admin!
    Server: Authorization has been successful!
   ```