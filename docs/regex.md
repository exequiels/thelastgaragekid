# Regex & preg_match Notes

## Basic Concepts

### 1. Capturing Groups with `$1`, `$2`, `$3`

```php
$text = "Hello my name is Exequiel";
$result = preg_replace('/is (.+)/', 'is $1 [captured]', $text);
echo $result;
// Output: Hello my name is Exequiel [captured]
```

**Explanation:**

- Parentheses `( )` create capturing groups
- `$1` = first group, `$2` = second group, etc.
- In example: `$1` contains "Exequiel"

---

### 2. `preg_replace_callback` with `$matches`

```php
$text = "My website is https://example.com";
$result = preg_replace_callback(
    '/https:\/\/([^ ]+)/',
    function($matches) {
        return '<a href="' . $matches[0] . '">' . $matches[1] . '</a>';
    },
    $text
);
echo $result;
// Output: My website is <a href="https://example.com">example.com</a>
```

**`$matches` structure:**

```php
array(2) {
  [0] => "https://example.com",  // Full match
  [1] => "example.com"           // First captured group
}
```

---

### 3. Single vs Multiple Matches

**`preg_match()` - First match only:**

```php
$text = "Links: https://example.com https://example2.com";
preg_match('/https:\/\/([^ ]+)/', $text, $matches);
// $matches contains only first URL
```

**`preg_match_all()` - All matches:**

```php
$text = "Links: https://example.com https://example2.com https://example3.com";
preg_match_all('/https:\/\/([^ ]+)/', $text, $matches);
print_r($matches);
```

**Output:**

```php
Array (
    [0] => Array (  // Full matches
        [0] => "https://example.com"
        [1] => "https://example2.com"
        [2] => "https://example3.com"
    )
    [1] => Array (  // Captured groups only
        [0] => "example.com"
        [1] => "example2.com"
        [2] => "example3.com"
    )
)
```

---

## Regex Pattern Breakdown

**Pattern:** `/https:\/\/([^ ]+)/`

- `https:\/\/` → Literal "https://"
- `([^ ]+)` → Capturing group:
  - `[^ ]` = Any character except space
  - `+` = One or more occurrences

---

## Essential Regex Symbols

| Symbol | Meaning              | Example                  |
| ------ | -------------------- | ------------------------ |
| `.`    | Any single character | `a.c` → "abc", "axc"     |
| `+`    | One or more          | `a+` → "a", "aaa"        |
| `*`    | Zero or more         | `a*` → "", "a", "aaa"    |
| `?`    | Zero or one          | `a?` → "", "a"           |
| `[ ]`  | Character set        | `[abc]` → "a", "b", "c"  |
| `[^ ]` | Negated set          | `[^abc]` → "d", "x", "1" |
| `( )`  | Capturing group      | `(abc)` → captures "abc" |
| `^`    | Start of string      | `^Hello` → "Hello world" |
| `$`    | End of string        | `world$` → "Hello world" |

---

## Quick Reference

```php
// Simple replacement
preg_replace('/pattern/', 'replacement', $text);

// Replacement with captured groups
preg_replace('/is (.*)/', 'is $1', $text);

// Complex replacement with callback
preg_replace_callback('/pattern/', function($matches) {
    return process($matches[1]);
}, $text);

// Find first match
preg_match('/pattern/', $text, $matches);

// Find all matches
preg_match_all('/pattern/', $text, $matches);
```

**Tools:** Use [regex101.com](https://regex101.com) for testing and debugging patterns.
