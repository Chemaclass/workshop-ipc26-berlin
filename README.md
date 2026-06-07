# Hands-On Refactoring Workshop: Modernizing Legacy PHP with Pair Programming

Transform messy legacy PHP into clean, maintainable software, without breaking
existing behavior.

We start with simple refactoring exercises and progress to advanced
techniques. Using legacy-style code katas, you practice automated tests
(golden, characterization, snapshot) to build confidence and safety while
modernizing code.

Through pair programming, you experience:

- Collaborative problem-solving
- Test-Driven Development (TDD) in action
- Safe, incremental changes that bring clarity and structure to real legacy
  code

---

## Katas

Four independent katas. Each lives in its own folder with its own
`composer.json`, `Dockerfile`, and `docker-compose.yml`. Pick any and start.

| # | Kata | Track | Focus | Time |
|---|---|---|---|---|
| 1 | [Rock Paper Scissors](tdd/rock-paper-scissors/README.md) | TDD | Parameterized tests, clear rules | 30–45 min |
| 2 | [Guess the Random Number](tdd/guess-random-number/README.md) | TDD | Mocking randomness, isolating I/O | 45–60 min |
| 3 | [Parrot](refactoring/parrot/README.md) | Refactoring | Polymorphism, removing smells | 30–45 min |
| 4 | [Tennis](refactoring/tennis/README.md) | Refactoring | Taming conditionals, naming | 45–60 min |

---

## Setup

> **Attending the workshop?** Read [SETUP.md](SETUP.md) first. A 10-minute
> pre-workshop checklist to verify your machine before the day.

### Option 1: Docker (recommended)

No local PHP needed. Requires Docker running.

```bash
make up                           # start all 4 kata containers at once
make test                         # run all tests
make down                         # stop all containers
```

Or work on a single kata:

```bash
cd tdd/rock-paper-scissors        # or any other kata
make up                           # build + install deps + keep container alive
make test                         # run tests
make watch                        # run tests on every file save (TDD flow)
make stan                         # static analysis
make cs                           # check coding standards
make fix-cs                       # fix coding standards
make down                         # stop when done
```

Service names: `rock-paper-scissors-tdd`, `guess-number-tdd`,
`parrot-refactoring`, `tennis-refactoring`.

Each kata builds a PHP 8.4 image with Xdebug + Composer.

### Option 2: Local PHP

Requires PHP 8.4+ and Composer.

```bash
cd <kata-folder>
composer install
composer test
```

See each kata's README for details.

---

## Cleanup

Stop and remove all workshop containers:

```bash
docker rm -f ipc26-parrot ipc26-tennis ipc26-rps ipc26-guess-number
```

---

## Further Reading

### Books

- **Test-Driven Development by Example** by Kent Beck
  ([Amazon](https://www.amazon.de/-/en/Kent-Beck/dp/0321146530/))
- **Refactoring** by Martin Fowler
  ([Amazon](https://www.amazon.de/-/en/Martin-Fowler/dp/0134757599/))
- **Working Effectively with Legacy Code** by Michael C. Feathers
  ([Amazon](https://www.amazon.de/-/en/Michael-C-Feathers/dp/0131177052/))

### Videos

- [Does TDD Really Lead to Good Design?](https://youtu.be/KyFVA4Spcgg)
- [Introduction to Test Driven Development](https://youtu.be/04FzlrMKPTM)

### Blog Posts

- [The art of testing: where design meets quality](https://chemaclass.com/blog/the-art-of-testing/)
- [Test-Driven (Development) – What is challenging about it?](https://chemaclass.com/blog/test-driven-development/)
- [TDD vs BDD - Design or Workflow?](https://chemaclass.com/blog/tdd-vs-bdd/)

---

## Extra

- [Workshop Presentation Slides](https://docs.google.com/presentation/d/1wo_45EQuy39sTKTo45xtjUP_bLdo-VkpHLOP79frRic/edit?usp=sharing)

