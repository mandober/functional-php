# PHP Functional Prelude


**Typing**
- `strict_types` always on
- type annotated
- phpdocs quasi-Haskell signatures

**Arity**
- unary functions throughout
- ~~or come what may but use auto-finkel?~~

**Functions**
- (i.e. the sort of callables to use throughout)
- use named functions → call-by-stringy
- (not-necesseraly if bound to `const`)
- use closures
- ~~use static methods?~~
- ~~convert all callables into closures?~~
- ~~come as they are - use utilities to reshape em?~~
- ~~mix n' randomize after each 100 ticks?~~

**Parameters**
- general order of arguments is *Functions First Data Last* (Fx/Tx)
- no optional parameters (use specific func variant instead)
- ~~how about them variadics? no? worse?~~
- no variadic parameter


To maximize composition
- all unary or auto-curry support
- data-last approach
- no default parameters
- no optional/variadic parameter
- no-dark-things, if it can be helped (it cannot)
