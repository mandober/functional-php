# PHP Functional Prelude

The generic term **callable** is used for anything that can be called, although it is often replaced with the term **function** (even though PHP has decorated the latter with its on semantic baggage... bargage? garbage!).

**HOF** or high-order function is a function that takes functions as arguments, returns functions or both. A language with**first-class functions** treats functions like the other values (can be passed in/out/around). This was only an afterthought in PHP and, as a consequence of forcing this feature in, a developer must manually stringify a functions name as that is the only way it can be referenced. Stringify the (named) function's name, then bind that string to a variable (cannot bind it to a `const`), then call it directly by appending the call operator to the variable, or use it (the string-bound variable or the literal string) with `call_user_func_array` or `call_user_func` builtins to call the named function.


therefore we're doomed to pass 

doesn't really support since proper functions, or **named function** as they are called in PHP, 


**Functionals** are high-order functions (*HOFs*) that take a function, analyse it and then return a function, seemingly as if the input function was remodelled. **Decorators** work with functions as well but return them unharmed, all dressed up.


## Specs

**Typing**
- strict_types always on
- type annotated (as much as possible)
- phpdocs show quasi-Haskell function signatures

**Arity**
- unary functions throughout
- or come what may, but use auto-currying (auto-flexing)?
- or maybe curry-all-but-the-last arg?

**Functions**
- (i.e. settle on the sort of functions)
- use named functions throughout?
- use closures?
- use static methods?
- convert all callables into closures?
- come as they are - use utilities to reshape em?
- mix n' randomize after each 100 ticks?

**Parameters**
- general order of arguments is *Functions First, Data Last* (Fx/Tx)
- no optional parameters (use specific variant instead)
- how about variadic functions? even considered? banned? or worse?



## Composition

To maximize composition
- all functions are unary or auto-curryied
- "data last" (the last function in the sequence binds the data)
- no default parameters
- no optional/variadic parameter
- no weird things passed around, if it can be helped (it cannot)



http://localhost:8080


Helpers
- println
- dump
- add
- sub
- arity

Commons
- id
- const
- fst (Kestrel, true)
- snd (Kite, false, zero)
- succ
- pred

Arithmetic
- even
- odd
- sum
- product

Application
- apply
- starling
- compose
- pipe

List Helpers
- head
- last
- tail
- init
- flat, flatten
- map
- flatmap
- filter
- zip
- partition

Folds
- foldl2 (without initial value for accumulator, 2-ary)
- foldl  (with initial value for accumulator, 3-ary)
- foldr2 (without initial value for accumulator, binary)
- foldr  (with initial value for accumulator, ternary)

Functionals
- trampoline
- curry
- uncurry
- flex
- partial
- flip


## foldl

foldl :: (a -> b) -> [a] -> b
foldl($function, $array) : array_element

$function :: a -> b -> b
$function is a binary function that receives:
- current element's value    
  Initially, it receives array's second element's value
- accumulator   
  Initially, accumulator contains array's first element's value
