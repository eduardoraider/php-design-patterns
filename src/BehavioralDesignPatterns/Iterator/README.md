# Iterator

Iterator is a behavioral design pattern that allows sequential traversal through a complex data structure without exposing its internal details.

Thanks to the Iterator, clients can go over elements of different collections in a similar fashion using a single iterator interface.

**Usage examples:** The pattern is very common in PHP code. Many frameworks and libraries use it to provide a standard way for traversing their collections.

PHP has a built-in Iterator interface that can be used for building custom iterators compatible with the rest of the PHP code.

**Identification:** Iterator is easy to recognize by the navigation methods (such as next, previous and others). Client code that uses iterators might not have direct access to the collection being traversed.

**[Learn more on Refactoring.Guru](https://refactoring.guru/design-patterns/iterator)**

## Real World Example
Since PHP already has a built-in Iterator interface, which provides convenient integration with foreach loops, it’s very easy to create your own iterators for traversing almost every imaginable data structure.

This example of the Iterator pattern provides easy access to CSV files.

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
   cd src/BehavioralDesignPatterns/Iterator
   ```

    - Run the container and directly enter the pattern directory:

   ```bash
   docker run -it --rm -v $(pwd):/app -w /app --name php-design-patterns-container php-design-patterns-image /bin/bash -c "cd src/BehavioralDesignPatterns/Iterator && /bin/bash"
   ```

3. **Execute via Command Line**

   Launch the example via Docker using the PHP executable:

   ```bash
   php index.php
   ```

4. **Output on Terminal**

   ```bash
    Array
    (
        [0] => Name
        [1] => Age
        [2] => Owner
        [3] => Breed
        [4] => Image
        [5] => Color
        [6] => Texture
        [7] => Fur
        [8] => Size
    )
      
    Array
    (
        [0] => Steve
        [1] => 3
        [2] => Alexander Shvets
        [3] => Bengal
        [4] => /cats/bengal.jpg
        [5] => Brown
        [6] => Stripes
        [7] => Short
        [8] => Medium
    )
      
    Array
    (
        [0] => Siri
        [1] => 2
        [2] => Alexander Shvets
        [3] => Domestic short-haired
        [4] => /cats/domestic-sh.jpg
        [5] => Black
        [6] => Solid
        [7] => Medium
        [8] => Medium
    )
      
    Array
    (
        [0] => Fluffy
        [1] => 5
        [2] => John Smith
        [3] => Maine Coon
        [4] => /cats/Maine-Coon.jpg
        [5] => Gray
        [6] => Stripes
        [7] => Long
        [8] => Large
    )
   ```