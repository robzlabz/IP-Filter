# IP Filter

IP Filter adalah class PHP yang digunakan untuk membatasi view / akses dari IP yang telah di daftar

## Cara Penggunaan

### Pertama 'Include IP.php'

```php
include 'IP.php';
```

### Gunakan fungsi static yang ada 
```php
IP::getip(); // return string, ip
IP::blocked(); // return boolean
IP::proxy(); // return boolean
```

## Contoh

### Full Blok

```php
if ( IP::blocked())
  die('IP Anda terdaftar pada IP yang di blokir');
```

### Part Blok

```php
if( ! IP::blocked()) : {
  #show main ads
} else { 
  #show other ads
}
```

### Apa datang dari proxy?

```php
if( IP::proxy()) {
  echo 'IP datang dari proxy';
}
```

### Berapa IP saya?
```php
echo IP::getip();
```


