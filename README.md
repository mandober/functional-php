# PHP Functional Prelude

**Routine impl**
What to use to implement these routines:
- named functions
- anonymous functions i.e. objects
  - closures
  - arrow functions

**Named function**
- `function nf() { ... }`
- must be passed around as stringified label, `"nf"`
- may be referenced by label on import, `use function \ns\nf`
- may be aliviated by binding its label to a constant:    
  `const nf = '\ns\nf'`, then `use const \ns\nf`    
  to fake the proper, non-stringy, function reference
- (not-necesseraly if bound to `const`)
- use closures
- ~~use static methods?~~
- ~~convert all callables into closures?~~
- ~~come as they are - use utilities to reshape em?~~
- ~~mix n' randomize after each 100 ticks?~~


**Typing**
- type annotated routines
- `strict_types` always on
- since `strict_types` is enforced by the client code, maybe additional type checks are in order?
- docblocks with quasi-Haskell signatures

**Arity**
- all routines are **strictly unary**
- or come what may but auto-curry?


**Parameters**
- general order of arguments is *Functions First Data Last*, Fx/Tx
- no optional parameters (use specific func variant instead)
- ~~how about them variadics? no? worse?~~
- no variadic parameter
- data param is scalar|array (`...$param`)
- so a func can work with indivudual data or a collection

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
