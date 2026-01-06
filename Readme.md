# My garage

Indie projects, old internet, new internet, and stuff that I like. Just my place to be.

I'm going to start rough documentation of things I'm learning, along with concepts I've already seen but completely forgotten. This will help me in the near future to have my projects documented and maintain a variety of implementations of how I've been doing things. This way I can refer back to my own work in future projects and avoid wasting time searching, testing, etc. Even when I do spend time researching, I can build upon what I've already done to advance further in my learning.

## My PHP Evolution

Just in case someone starting PHP ever sees my project and thinks it's interesting of any use for them, ill let you know how it started for me like I said before it will also help myself.

### Spaghetti

This is the most basic approach where HTML, CSS, Logic (PHP), and Database queries are all mixed together in a single file.
Fast to write for very small projects, extremely difficult to maintain and escalate.

### Spaghetti-Hibrid

This is an intermediate step I started to separate concerns didn't fully committed to a framework structure. Something like having files for a header.php, footer.php, and separate files for functions, but still lack of organization, and in larger projects hard to maintain also.

### Standard-MVC

This is the professional architecture used by modern frameworks like Laravel or Symfony. A strict separation of duties:
Model: Handles data and business logic (Database interaction).
View: Handles only the presentation (HTML/UI).
Controller: The "brain" that connects the Model and the View based on the user's request.
Front Controller & Routing: Unlike the other two, this uses a single entry point (usually index.php). A Router intercepts the URL and tells the application exactly which Controller to trigger.

This is what I'm trying to acomplish in this project.

---

## Structure

I've tried to create folders that refence themselves and also that can be similar to what you find in laravel or even in a node backend, since folders structures tend to be similar. I could have done a separated folder like "Backend" or something similar but do to the small nature of this project I tought it was not necessary, ill just keep this really simple.

- [routes]
- [views]
- [models]
- [controllers]
- [helpers]
- [config]
- [assets]
- [vendor]

## Documentation

- [index.php]
- [Regex & preg_match()](docs/regex.md#regex--preg_match-notes)
- [Essential Regex Symbols](docs/regex.md#essential-regex-symbols)

## Tools

I already have a list of tools that I'm using on my website [https://thelastgaragekid.com](https://thelastgaragekid.com/tools) but I'll include any usefull ones while doing this project.

- [regex101.com](https://regex101.com)
- [mycompiler.io](https://www.mycompiler.io/new/php)

## What I'm learning and practing in this project

- A more professional architecture Model, View, Controller.
- How to create a cache file.
- How to create a small router.
- Parsedown library to parse markdown.
- Also learned a small github trick sometimes projects with php no framework get tagged has hack code, so fix this we need to create a `.gitattributes` file, and add `*.php linguist-language=PHP` to it, then do a push and that will fix it.

<!-- PORTFOLIO_DATA_START
**Stack:** Php no frames, bootstrap, html, css.
**Description:** My hooby website
**What I've learned and tested:**
- A more Standard-MVC like the ones that professional architecture used by modern frameworks like Laravel or Symfony.
- Also learned a small github trick sometimes projects with php no framework get tagged has hack code, so fix this we need to create a .gitattributes file, and add *.php linguist-language=PHP to it, then do a push and that will fix it.
**Highlights:**
- Using classes
- Front Controller + Simple Router + MVC DIY (no framework)
- Routing → Controller → Logic/DB → Vista (PHP templates)
PORTFOLIO_DATA_END -->
