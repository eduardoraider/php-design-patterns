# PHP Design Patterns Repository

Welcome to the PHP Design Patterns repository, where we delve into the exploration of fundamental design patterns in software development. Design patterns serve as standardized solutions to recurring challenges in software design, offering pre-established blueprints that can be tailored to address common issues in code implementation.

## Overview

This repository categorizes design patterns into three main groups:

- **Creational Patterns**: Enhance flexibility and code reuse through object creation mechanisms.
- **Structural Patterns**: Illustrate how to organize objects and classes into larger, flexible, and efficient structures.
- **[Behavioral Patterns](./src/BehavioralDesignPatterns/README.md)**: Focus on effective communication and the assignment of responsibilities among objects.

All examples in this repository are based on the classic Gang of Four (GoF) design patterns, with PHP implementations inspired by the [Refactoring.Guru](https://refactoring.guru/design-patterns) project.

## Motivation

The primary goal of this project is to demonstrate the practical application of Design Patterns using PHP. However, the concepts explored here are transferable to other programming languages such as Go, Rust, Java, Python, TypeScript, and C#, among others.

The repository has been upgraded to PHP 8.3, and testing is made seamless using Docker. Detailed instructions for executing each pattern via the command line in Docker are provided in the README of each pattern.

Expect periodic updates, with a new pattern added every two or three days. The sequence will begin with Behavioral Patterns, followed by Structural Patterns, and finally, Creational Patterns.

## Requirements

To run the examples, ensure you have Docker installed on your system. Follow the installation instructions for your operating system on the [official Docker documentation](https://docs.docker.com/get-docker/).

## Getting Started

Follow these steps to set up and use Docker:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/eduardoraider/php-design-patterns.git
   cd php-design-patterns
   ```
2. **Run Composer Dump**

   After cloning the repository, it's essential to run Composer to generate the autoload files:

   ```bash
   composer dump
   ```
   
3. **Build Docker Image**

   Navigate to the project directory and build a Docker image:

   ```bash
   docker build -t php-design-patterns-image .
   ```

4. **Run Docker Container**

   Run a Docker container using the image you built:

   ```bash
   docker run -it --rm -v $(pwd):/app -w /app --name php-design-patterns-container php-design-patterns-image /bin/bash
   ```

5. **Access the Pattern Directory**

   Navigate to the pattern directory (example):

   ```bash
   cd src/BehavioralDesignPatterns/ChainOfResponsibility
   ```

   Launch examples via Docker using the PHP executable:

   ```bash
   php index.php
   ```

6. **Manage Containers**

   Manage Docker containers using various commands:

    - List all running containers:

      ```bash
      docker ps
      ```

    - Stop a container:

      ```bash
      docker stop container_id
      ```

    - Remove a container:

      ```bash
      docker rm container_id
      ```

    - List all images:

      ```bash
      docker images
      ```

    - Remove an image:

      ```bash
      docker rmi image_id
      ```


## License

This work is licensed under a Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License.

<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/80x15.png" /></a>


## Credits

Alexander Shvets ([@neochief](https://github.com/neochief)) and Alexey Pyltsyn ([@lex111](https://github.com/lex111))

---

#### by Eduardo O. Raider
🛠 🥋 **Software Engineer**