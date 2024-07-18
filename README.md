# API cek khodam
### URL : http://cek-khodam-api.kesug.com/khodam
### Doc : http://cek-khodam-api.kesug.com


| Metode  | Endpoint |                 Deskripsi                  |
| ------- | -------- | ------------------------------------------ |
| GET     | /khodam  | Mengambil daftar semua user dan khodamnya. |
| POST    | /khodam  | Mengecek Khodam anda.                      |


Contoh request :
```json
{
    "nama": "Furude Rika chwann",
}

```


Contoh body post return

```json
{
    "nama": "Furude Rika chwann",
    "khodam": "Wahyu Malaikat",
    "deskripsi": "Seseorang yang diberi wahyu untuk melawan agartha"
}

```


