
Check if specific layout was set:
```php
<?= (in_array('bg-dark', $layout) ? ' dark' : '' ?>
```

Print classes from layout_map with others:
```php
<?php the_classes(['row', ...$layout_classes]) ?>
```