# architect-tools
This is a collection of modular concepts useful for framework development.
- Trait: loader
In a flexible framework it's important to be able to register items(blocks of code, output templates, data, queries, etc) to the system so that they can be accessed elsewhere in the system. This generic concept is established as a trait that can be used inside multiple classes, standardizing the way information is registered, while still allowing individual methods to be easily overridden.
