# Simple `switch` vs Mapping benchmark
The purpose of this class is to show how much slower is the `switch` statement against an array map with the available values.

### Usage
Just execute: 
```
git clone https://github.com/erusso87/switch-vs-mapping.git
cd switch-vs-mapping
docker build . -t php-demo && docker run -t php-demo
```

#### Expected output
(docker build output) and...
```
Generating sample list...Done in 3.068s
Generating sample list...Done in 3.075s
Processing mapping with integers ...Done in 0.236s
Processing mapping with strings ...Done in 0.296s
Processing switch with integers ...Done in 0.957s
Processing switch with strings ...Done in 0.995s
Memory usage: 258.01 MB
```

###### NOTE: 
Pay attention to the memory usage, you can 'stuck' your machine.
