# PHP Functional Prelude

## Implementation

- named functions

<details>

<summary>What to use for implementation?</summary>

- [x] named functions
- [ ] closures
- [ ] ~~methods~~

__*Named functions*__
- named functions are god-knows-what
- 🤮 passed around as stringy, pass-as-stringy
- 🙂 can be exported
- 😐 their name (as string) may be bound to a const
- 🙂 importable as a label (or a bound const)
- 🙂 convertable to closure (all callables are)
- cannot be destroyed

__*Closures*__
- 😕 closures are objects of the `Closure` class
- 🙁 variables (that bind closures) cannot be exported
- 🙁 cannot be imported
- 🙁 cannot be bound to a const (and then expo/imported)
- can be destroyed

__*Methods*__
- methods imply classes - try to avoid classes entirely
- impl as static methods
- impl as instance methods
- impl as both static and instance methods
- convertable to closure (all callables are)
- can be destroyed

</details>


## Import and Export

TL/DR: import special const (and not function)
- use (the same) namespace
- define one function (or more) per file
- define a `const` named the same as the named function's (bare) label, and assing it the value of FQN of named function (prefixed with namespace)
- move phpdocs from function to the const
- when importing: import the const (not the function)


```php
# file: "f.php"

namespace \vndr\fp

/**
 * named function `f`
 */
const nf = '\vndr\fp\nf'

function nf() {}


// in this file
// ============
// (and if there was no const above)

// you CAN use `nf` directly by label in application:
nf(1,2);

// you CANNOT pass it by label to another function
g(nf); // ERROR

// you CANNOT even pass it to another function by the label-stringy
g("nf"); // ERROR

// you MUST use the FQ-stringy form:
g("\\vndr\\fp\\nf"); // OK


// in other files
// ==============

// after importing it with (no matter the eventual aliasing):
use function \vndr\fp\nf; // BAD

// the problem remains the same as above

// so better import the constant
use const \vndr\fp\nf;  // GOOD

// then you can use the same form for every purpose:
nf(1,2); // apply it
g(nf);   // pass it
```




If file "file1.php" contains a named function `f` and file "file2.php" contains a named function `g` and both files declare the namespace `\ns\fp`:
- in "file2.php", you can import the `f` function with `use function \ns\fp\f`
- and you can apply it (using its name/label), e.g. `f(12)`
- but if you want to pass it to another function
- this wont work, `f(g)`, coz it must be passed as string. 
- this won't work either, `f("g")`, coz the string has to incl namespace
- you must do this: `\ns\fp\f("g")`
- regardless of having imported it with: `use function \ns\fp\f`
- That's why: in the source file, "file1.php", declare a `const` with the same name as the function therein, e.g. named function `f`, and assing it the fully qualified name (all with the namespace prefix), e.g. `const f = "\ns\fp\f"`. Then, when you want to use it in another file, you import that const, as in: `use const \ns\fp\f`, instead of importing the function. Then you can apply it (using just the name) as in: `f(12)`; or you can pass it to some other function the same way (using just the name) as in: `f(g)`.




## Arity

* nominal (uncurryied) form

<details>

<summary>Nominal or curry?</summary>

- [x] nominal (uncurryied) form
- [ ] all curryied
- [ ] ~~mixed (it's mixed enough already)~~

__*Nominal form*__
- nominal form is the most moldable
- it's cheap to convert nominal into curryied
- there are a lot of helpers to aid conversion

__*Curryied form*__
- it's costly (reflection) to convert curryied into uncurryied
- keep nominal and curry on

</details>


## Parameters

- data last

<details>

<summary>Order of parameters?</summary>

- Functions First Data Last, *Fx/Tx*
- optional parameters (no! use specific func variant instead)
- variadics? no!
- data param is scalar|array (`...$param`)
- work with ~~individual data (scalars)~~ or array
- param is always array: one or many args end up in the array, `...$x`
- which means all manipulation is done on arrays

</details>


## Typing
- type annotated routines
- `strict_types` always on
- since `strict_types` is enforced by the client code, maybe additional type checks are in order?
- docblocks with quasi-Haskell signatures


**Composition**
- all unary or auto-curry support
- data-last approach
- no default parameters
- no optional/variadic parameter
- no-dark-things, if it can be helped (it cannot)



In case of named function, it is ref as a string, and 
that string can be bound to a const, 
allowing to call the func seemingly "normally" 
as opposed to calling it by quoting its name, call-as-string

```php
function named() {}

'named'(); // call-as-string

const named = 'named';
named(); // call-as-const
```



🙂
😐😕
🙁
🤮 😠🤪😵 💀🦨
👍 👎

Ω Å ㎏ ㎐ ㎒ ㎓
Ⅰ Ⅱ Ⅲ Ⅳ Ⅴ Ⅵ Ⅶ Ⅷ Ⅸ Ⅹ ⅰ ⅱ ⅲ ⅳ ⅴ ⅵ ⅶ ⅷ ⅸ ⅹ
∮ ∂ ℘ ℵ  ∆ ℾ ℽ ℿ ℼ ⅀ ∑ ∫ ϝ Ϝ ϗ ϰ ζ ώ ύ φ Φ ϕ
⨏ ⨑ ⨘ ⨖ ⨕ ∯ ∰


[^1]: If file "file1.php" contains a named function `f` and file "file2.php" contains a named function `g` and both files declare the namespace `\ns\fp`:
- in "file2.php", you can import the `f` function with `use function \ns\fp\f`
- and you can apply it (using its name/label), e.g. `f(12)`
- but if you want to pass it to another function
- this wont work, `f(g)`, coz it must be passed as string. 
- this won't work either, `f("g")`, coz the string has to incl namespace
- you must do this: `\ns\fp\f("g")`
- regardless of having imported it with: `use function \ns\fp\f`
- That's why: in the source file, "file1.php", declare a `const` with the same name as the function therein, e.g. named function `f`, and assing it the fully qualified name (all with the namespace prefix), e.g. `const f = "\ns\fp\f"`. Then, when you want to use it in another file, you import that const, as in: `use const \ns\fp\f`, instead of importing the function. Then you can apply it (using just the name) as in: `f(12)`; or you can pass it to some other function the same way (using just the name) as in: `f(g)`.
